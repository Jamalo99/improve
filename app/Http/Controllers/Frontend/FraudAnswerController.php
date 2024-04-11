<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFraudAnswerRequest;
use App\Http\Requests\UpdateFraudAnswerRequest;
use App\Models\FraudAnswer;
use App\Models\FraudQuestion;
use App\Models\Protocol;
use App\Models\Question;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FraudAnswerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fraud_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fraudAnswers = FraudAnswer::with(['question', 'protocol', 'fraud_question'])->get();

        return view('frontend.fraudAnswers.index', compact('fraudAnswers'));
    }

    public function edit(FraudAnswer $fraudAnswer)
    {
        abort_if(Gate::denies('fraud_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $protocols = Protocol::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fraud_questions = FraudQuestion::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fraudAnswer->load('question', 'protocol', 'fraud_question');

        return view('frontend.fraudAnswers.edit', compact('fraudAnswer', 'fraud_questions', 'protocols', 'questions'));
    }

    public function update(Request $request)
    {
        $fraudAnswer = $request->input('fraudAnswer');
        $controlKeyId = $request->input('controlKey');

        if ($request->has('controlKey')) {
            foreach ($fraudAnswer as $answer) {
                $fraudData = FraudAnswer::find($answer['answer_id']);
        
                if ($fraudData) {
                    $fraudData->update([
                        'answer' => $answer['answer']
                    ]);
                } else {
                    return response()->json(['message' => 'Not found'], 404);
                }
            };
        };

        return response()->json($request);
    }

    public function destroy(FraudAnswer $fraudAnswer)
    {
        abort_if(Gate::denies('fraud_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fraudAnswer->delete();

        return back();
    }

    public function massDestroy(MassDestroyFraudAnswerRequest $request)
    {
        $fraudAnswers = FraudAnswer::find(request('ids'));

        foreach ($fraudAnswers as $fraudAnswer) {
            $fraudAnswer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
