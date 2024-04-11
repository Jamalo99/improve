<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuestionAnswerRequest;
use App\Http\Requests\UpdateQuestionAnswerRequest;
use App\Models\Question;
use App\Models\QuestionAnswer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionAnswerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('question_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionAnswers = QuestionAnswer::with(['question'])->get();

        return view('admin.questionAnswers.index', compact('questionAnswers'));
    }

    public function edit(QuestionAnswer $questionAnswer)
    {
        abort_if(Gate::denies('question_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questionAnswer->load('question');

        return view('admin.questionAnswers.edit', compact('questionAnswer', 'questions'));
    }

    public function update(UpdateQuestionAnswerRequest $request, QuestionAnswer $questionAnswer)
    {
        $questionAnswer->update($request->all());

        return redirect()->route('admin.question-answers.index');
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
