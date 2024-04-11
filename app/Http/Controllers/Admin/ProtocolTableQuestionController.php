<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProtocolTableQuestionRequest;
use App\Http\Requests\UpdateProtocolTableQuestionRequest;
use App\Models\Impact;
use App\Models\Probability;
use App\Models\Protocol;
use App\Models\ProtocolTableQuestion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProtocolTableQuestionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('protocol_table_question_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $protocolTableQuestions = ProtocolTableQuestion::with(['protocol', 'probability', 'impact'])->get();

        return view('admin.protocolTableQuestions.index', compact('protocolTableQuestions'));
    }

    public function edit(ProtocolTableQuestion $protocolTableQuestion)
    {
        abort_if(Gate::denies('protocol_table_question_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $protocols = Protocol::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $probabilities = Probability::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $impacts = Impact::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $protocolTableQuestion->load('protocol', 'probability', 'impact');

        return view('admin.protocolTableQuestions.edit', compact('impacts', 'probabilities', 'protocolTableQuestion', 'protocols'));
    }

    public function update(UpdateProtocolTableQuestionRequest $request, ProtocolTableQuestion $protocolTableQuestion)
    {
        $protocolTableQuestion->update($request->all());

        return redirect()->route('admin.protocol-table-questions.index');
    }

    public function destroy(ProtocolTableQuestion $protocolTableQuestion)
    {
        abort_if(Gate::denies('protocol_table_question_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $protocolTableQuestion->delete();

        return back();
    }

    public function massDestroy(MassDestroyProtocolTableQuestionRequest $request)
    {
        $protocolTableQuestions = ProtocolTableQuestion::find(request('ids'));

        foreach ($protocolTableQuestions as $protocolTableQuestion) {
            $protocolTableQuestion->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
