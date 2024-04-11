<?php

namespace App\Http\Controllers\Frontend;

use Gate;
use Carbon\Carbon;
use App\Models\Risk;
use App\Models\Impact;
use App\Models\Status;
use App\Models\Cadence;
use App\Models\Capital;
use App\Models\Section;
use App\Models\Activity;
use App\Models\Question;
use App\Models\Workspace;
use App\Models\ControlKey;
use App\Models\Probability;
use App\Models\Macroprocess;
use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreControlKeyRequest;
use App\Http\Requests\UpdateControlKeyRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyControlKeyRequest;
use App\Models\FraudAnswer;
use App\Models\FraudQuestion;
use App\Models\PeriodAnswer;

class ControlKeyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('control_key_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $controlKeys = ControlKey::with(['workspace', 'capital', 'macroprocess', 'status', 'cadence'])->get();
        foreach ($controlKeys as $key => $item) {
            $controlKeys[$key]['created_at_formatted'] = $item->created_at->format('d/m/Y');
            $controlKeys[$key]['updated_at_formatted'] = $item->updated_at->format('d/m/Y');
            $controlKeys[$key]['deadline'] = $item->updated_at->addYear(1)->format('d/m/Y');
        }

        return view('frontend.controlKeys.index', compact('controlKeys'));
    }

    public function create()
    {
        abort_if(Gate::denies('control_key_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $capitals = Capital::pluck('name_' . session('language'), 'id')->prepend(trans('global.pleaseSelect'), '');

        $macroprocesses = Macroprocess::pluck('name_' . session('language'), 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('name_' . session('language'), 'id')->prepend(trans('global.pleaseSelect'), '');

        $cadences = Cadence::pluck('name_' . session('language'), 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.controlKeys.create', compact('cadences', 'capitals', 'macroprocesses', 'statuses'));
    }

    public function store(Request $request)
    {
        $controlKey = $request->all();
        $controlKey['workspace_id'] = Workspace::where('workspaces.user_id', Auth::user()->id)->value('id');

        $existingControlKey = ControlKey::where('index', $controlKey['index'])
            ->where('capital_id', $controlKey['capital_id'])
            ->where('macroprocess_id', $controlKey['macroprocess_id'])
            ->get();

        if ($existingControlKey->isNotEmpty()) {
            return redirect()->back()->withErrors(['index' => 'Index already exists'])->withInput();
        }

        $controlKey = ControlKey::create($controlKey);

        Risk::create([
            'control_key_id' => $controlKey->id
        ]);

        $originalSections = Section::where('original', true)
            ->select('id', 'title_en', 'title_it', 'title_de', 'title_fr', 'display_order')
            ->with('questions')
            ->get()
            ->toArray();

        DB::beginTransaction();

        try {
            foreach ($originalSections as $section) {
                $newSection = new Section([
                    'control_key_id' => $controlKey->id,
                    'title_en' => $section['title_en'],
                    'title_it' => $section['title_it'],
                    'title_de' => $section['title_de'],
                    'title_fr' => $section['title_fr'],
                    'display_order' => $section['display_order'],
                    'original' => false
                ]);
                $newSection->save();

                foreach ($section['questions'] as $question) {
                    $newQuestion = new Question([
                        'section_id' => $newSection->id,
                        'title_en' => $question['title_en'],
                        'title_it' => $question['title_it'],
                        'title_de' => $question['title_de'],
                        'title_fr' => $question['title_fr'],
                        'display_order' => $question['display_order'],
                        'original' => false
                    ]);
                    $newQuestion->save();
                }
            }

            //Create a fraud answer

            $fraudQuestions = FraudQuestion::get()
                ->toArray();

            foreach ($fraudQuestions as $id => $fraudQuestion) {
                $newFraudAnswer = new FraudAnswer([
                    'question_id' => Question::join('sections', 'sections.id', '=', 'questions.section_id')
                        ->join('control_keys', 'control_keys.id', '=', 'sections.control_key_id')
                        ->where('sections.control_key_id', $controlKey->id)
                        ->where('questions.display_order', 80)->pluck('questions.id')->first(),
                    'fraud_question_id' => $fraudQuestion['id']
                ]);

                $newFraudAnswer->save();
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }




        return redirect()->route('frontend.control-keys.edit', ['control_key' => $controlKey->id]);
    }

    public function edit(ControlKey $controlKey)
    {
        abort_if(Gate::denies('control_key_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workspaces = Workspace::where('workspaces.user_id', Auth::user()->id)->pluck('owner', 'id');

        /*  $sections = Section::join('control_keys', 'control_keys.id', '=', 'sections.control_key_id')
            ->join('workspaces', 'workspaces.id', '=', 'control_keys.workspace_id')
            ->where('control_key_id', $controlKey->id)
            ->get();

        dd($sections); */

        $capitals = Capital::pluck('name_' . session('language'), 'id')->prepend(trans('global.pleaseSelect'), '');

        $macroprocesses = Macroprocess::pluck('name_' . session('language'), 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('name_' . session('language'), 'id')->prepend(trans('global.pleaseSelect'), '');

        $cadences = Cadence::pluck('name_' . session('language'), 'id')->prepend(trans('global.pleaseSelect'), '');

        $impacts = Impact::pluck('name_' . session('language'), 'id')->prepend(trans('global.pleaseSelect'), '');

        $probabilities = Probability::pluck('name_' . session('language'), 'id')->prepend(trans('global.pleaseSelect'), '');;

        $risk = Risk::where('control_key_id', $controlKey->id)->first();

        $sections = Section::where('control_key_id', $controlKey->id)
            ->select('id', 'title_en', 'title_it', 'title_de', 'title_fr', 'display_order')
            ->with('questions')
            ->get()
            ->toArray();

        $simplyAnswer = QuestionAnswer::join('questions', 'questions.id', '=', 'question_answers.question_id')
            ->join('sections', 'sections.id', '=', 'questions.section_id')
            ->join('control_keys', 'control_keys.id', '=', 'sections.control_key_id')
            ->where('control_key_id', $controlKey->id)
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item['question_id'] => $item];
            })
            ->toArray();

        $activities = Activity::join('sections', 'sections.id', '=', 'activities.section_id')
            ->join('control_keys', 'control_keys.id', '=', 'sections.control_key_id')
            ->where('sections.control_key_id', $controlKey->id)->select('activities.*')->get();

        $periodAnswer = PeriodAnswer::join('questions', 'questions.id', '=', 'period_answers.question_id')
            ->join('sections', 'sections.id', '=', 'questions.section_id')
            ->join('control_keys', 'control_keys.id', '=', 'sections.control_key_id')
            ->where('control_key_id', $controlKey->id)->get();

        $fraudAnswers = FraudAnswer::join('questions', 'questions.id', '=', 'fraud_answers.question_id')
            ->join('sections', 'sections.id', '=', 'questions.section_id')
            ->join('control_keys', 'control_keys.id', '=', 'sections.control_key_id')
            ->join('fraud_questions', 'fraud_questions.id', '=', 'fraud_answers.fraud_question_id')
            ->where('sections.control_key_id', $controlKey->id)->select('fraud_questions.*', 'fraud_answers.*')->get();

        if ($fraudAnswers->isEmpty()) {
            $fraudAnswers = FraudQuestion::get();
        }

        $controlKey->load('workspace', 'capital', 'macroprocess', 'status', 'cadence');

        return view('frontend.controlKeys.edit', compact('fraudAnswers', 'periodAnswer', 'activities', 'simplyAnswer', 'sections', 'risk', 'impacts', 'probabilities', 'cadences', 'capitals', 'controlKey', 'macroprocesses', 'statuses', 'workspaces'));
    }

    public function update(Request $request, ControlKey $controlKey)
    {
        $request = $request->all();
        $request['workspace_id'] = auth()->user()->workspaces()->first()->id;
        $request['updated_at'] = Carbon::now();
        $controlKey->update($request);

        return response()->json([]);
    }

    public function show(ControlKey $controlKey)
    {
        abort_if(Gate::denies('control_key_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $controlKey->load('workspace', 'capital', 'macroprocess', 'status', 'cadence');

        return view('frontend.controlKeys.show', compact('controlKey'));
    }

    public function destroy(ControlKey $controlKey)
    {
        abort_if(Gate::denies('control_key_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $controlKey->delete();

        return back();
    }

    public function massDestroy(MassDestroyControlKeyRequest $request)
    {
        $controlKeys = ControlKey::find(request('ids'));

        foreach ($controlKeys as $controlKey) {
            $controlKey->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
