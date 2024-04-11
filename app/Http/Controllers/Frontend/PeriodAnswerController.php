<?php

namespace App\Http\Controllers\Frontend;

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

        return view('frontend.periodAnswers.index', compact('periodAnswers'));
    }

    public function edit(PeriodAnswer $periodAnswer)
    {
        abort_if(Gate::denies('period_answer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questions = Question::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $probabilities = Probability::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $impacts = Impact::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $periodAnswer->load('question', 'probability', 'impact');

        return view('frontend.periodAnswers.edit', compact('impacts', 'periodAnswer', 'probabilities', 'questions'));
    }

    public function update(Request $request)
    {

        $controlKeyId = $request->input('controlKey');
        $data = $request->input('periodAnswer');

        foreach ($data as $key => $question) {
            foreach ($question as $id => $value) {
                $periodAnswer = PeriodAnswer::firstOrNew([
                    'question_id' => $key,
                    'period' => $id
                ]);
        
                // Aggiorna i valori
                $periodAnswer->answer = $value['answer'];
                $periodAnswer->probability_id = $value['probability'];
                $periodAnswer->impact_id = $value['impact'];
        
                // Salva nel database
                $periodAnswer->save();
            };
        };

        return response()->json($request);
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
