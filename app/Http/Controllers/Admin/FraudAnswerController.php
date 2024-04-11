<?php

namespace App\Http\Controllers\Admin;

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

        return view('admin.fraudAnswers.index', compact('fraudAnswers'));
    }

    public function edit(FraudAnswer $fraudAnswer)
    {
        abort_if(Gate::denies('fraud_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $protocols = Protocol::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fraud_questions = FraudQuestion::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $fraudAnswer->load('question', 'protocol', 'fraud_question');

        return view('admin.fraudAnswers.edit', compact('fraudAnswer', 'fraud_questions', 'protocols', 'questions'));
    }

    public function update(UpdateFraudAnswerRequest $request, FraudAnswer $fraudAnswer)
    {
        $fraudAnswer->update($request->all());

        return redirect()->route('admin.fraud-answers.index');
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
