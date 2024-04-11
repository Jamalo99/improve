<?php

namespace App\Http\Controllers\Frontend;

use Gate;
use App\Models\Question;
use App\Models\ControlKey;
use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\UpdateQuestionAnswerRequest;
use App\Http\Requests\MassDestroyQuestionAnswerRequest;

class QuestionAnswerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionAnswers = QuestionAnswer::with(['question'])->get();

        return view('frontend.questionAnswers.index', compact('questionAnswers'));
    }

    public function edit(QuestionAnswer $questionAnswer)
    {
        abort_if(Gate::denies('question_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questionAnswer->load('question');

        return view('frontend.questionAnswers.edit', compact('questionAnswer', 'questions'));
    }

    public function update(Request $request)
    {
        $requestData = $request->input('simplyAnswer');
        $controlKeyId = $request->input('controlKey');

        foreach ($requestData as $id => $data) {

            $answer = QuestionAnswer::where('question_id', $id)->first();
            if ($answer) {
                $answer->update(['answer' => $data]);
            } else {
                QuestionAnswer::create([
                    'question_id' => $id,
                    'answer' => $data
                ]);
            }
        }

        //update controlKey
        $controlKey = ControlKey::find($controlKeyId);
        if ($controlKey) {
            $controlKey->touch();
        }

        return response()->json();
    }

    public function destroy(QuestionAnswer $questionAnswer)
    {
        abort_if(Gate::denies('question_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionAnswer->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionAnswerRequest $request)
    {
        $questionAnswers = QuestionAnswer::find(request('ids'));

        foreach ($questionAnswers as $questionAnswer) {
            $questionAnswer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
