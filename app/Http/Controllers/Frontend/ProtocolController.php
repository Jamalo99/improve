<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProtocolRequest;
use App\Http\Requests\StoreProtocolRequest;
use App\Http\Requests\UpdateProtocolRequest;
use App\Models\Capital;
use App\Models\Macroprocess;
use App\Models\Protocol;
use App\Models\Status;
use App\Models\Workspace;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProtocolController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('protocol_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $protocols = Protocol::with(['workspace', 'capital', 'macroprocess', 'status'])->get();

        return view('frontend.protocols.index', compact('protocols'));
    }

    public function create()
    {
        abort_if(Gate::denies('protocol_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workspaces = Workspace::pluck('owner', 'id')->prepend(trans('global.pleaseSelect'), '');

        $capitals = Capital::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $macroprocesses = Macroprocess::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.protocols.create', compact('capitals', 'macroprocesses', 'statuses', 'workspaces'));
    }

    public function store(StoreProtocolRequest $request)
    {
        $protocol = Protocol::create($request->all());

        return redirect()->route('frontend.protocols.index');
    }

    public function edit(Protocol $protocol)
    {
        abort_if(Gate::denies('protocol_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workspaces = Workspace::pluck('owner', 'id')->prepend(trans('global.pleaseSelect'), '');

        $capitals = Capital::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $macroprocesses = Macroprocess::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $protocol->load('workspace', 'capital', 'macroprocess', 'status');

        return view('frontend.protocols.edit', compact('capitals', 'macroprocesses', 'protocol', 'statuses', 'workspaces'));
    }

    public function update(UpdateProtocolRequest $request, Protocol $protocol)
    {
        $protocol->update($request->all());

        return redirect()->route('frontend.protocols.index');
    }

    public function show(Protocol $protocol)
    {
        abort_if(Gate::denies('protocol_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $protocol->load('workspace', 'capital', 'macroprocess', 'status');

        return view('frontend.protocols.show', compact('protocol'));
    }

    public function destroy(Protocol $protocol)
    {
        abort_if(Gate::denies('protocol_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $protocol->delete();

        return back();
    }

    public function massDestroy(MassDestroyProtocolRequest $request)
    {
        $protocols = Protocol::find(request('ids'));

        foreach ($protocols as $protocol) {
            $protocol->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
