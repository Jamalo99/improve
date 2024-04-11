<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPeriodAnswerRequest;
use App\Http\Requests\UpdatePeriodAnswerRequest;
use App\Models\Impact;
use App\Models\PeriodAnswer;
use App\Models\Probability;
use App\Models\Question;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PeriodAnswerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('period_answer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $periodAnswers = PeriodAnswer::with(['question', 'probability', 'impact'])->get();

        return view('admin.periodAnswers.index', compact('periodAnswers'));
    }

    public function edit(PeriodAnswer $periodAnswer)
    {
        abort_if(Gate::denies('period_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $probabilities = Probability::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $impacts = Impact::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $periodAnswer->load('question', 'probability', 'impact');

        return view('admin.periodAnswers.edit', compact('impacts', 'periodAnswer', 'probabilities', 'questions'));
    }

    public function update(UpdatePeriodAnswerRequest $request, PeriodAnswer $periodAnswer)
    {
        $periodAnswer->update($request->all());

        return redirect()->route('admin.period-answers.index');
    }

    public function destroy(PeriodAnswer $periodAnswer)
    {
        abort_if(Gate::denies('period_answer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $periodAnswer->delete();

        return back();
    }

    public function massDestroy(MassDestroyPeriodAnswerRequest $request)
    {
        $periodAnswers = PeriodAnswer::find(request('ids'));

        foreach ($periodAnswers as $periodAnswer) {
            $periodAnswer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
