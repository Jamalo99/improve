<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFraudQuestionRequest;
use App\Http\Requests\StoreFraudQuestionRequest;
use App\Http\Requests\UpdateFraudQuestionRequest;
use App\Models\FraudQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FraudQuestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fraud_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fraudQuestions = FraudQuestion::all();

        return view('frontend.fraudQuestions.index', compact('fraudQuestions'));
    }

    public function create()
    {
        abort_if(Gate::denies('fraud_question_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.fraudQuestions.create');
    }

    public function store(StoreFraudQuestionRequest $request)
    {
        $fraudQuestion = FraudQuestion::create($request->all());

        return redirect()->route('frontend.fraud-questions.index');
    }

    public function edit(FraudQuestion $fraudQuestion)
    {
        abort_if(Gate::denies('fraud_question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.fraudQuestions.edit', compact('fraudQuestion'));
    }

    public function update(UpdateFraudQuestionRequest $request, FraudQuestion $fraudQuestion)
    {
        $fraudQuestion->update($request->all());

        return redirect()->route('frontend.fraud-questions.index');
    }

    public function show(FraudQuestion $fraudQuestion)
    {
        abort_if(Gate::denies('fraud_question_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.fraudQuestions.show', compact('fraudQuestion'));
    }

    public function destroy(FraudQuestion $fraudQuestion)
    {
        abort_if(Gate::denies('fraud_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fraudQuestion->delete();

        return back();
    }

    public function massDestroy(MassDestroyFraudQuestionRequest $request)
    {
        $fraudQuestions = FraudQuestion::find(request('ids'));

        foreach ($fraudQuestions as $fraudQuestion) {
            $fraudQuestion->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
