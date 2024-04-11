<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyControlKeyRequest;
use App\Http\Requests\StoreControlKeyRequest;
use App\Http\Requests\UpdateControlKeyRequest;
use App\Models\Cadence;
use App\Models\Capital;
use App\Models\ControlKey;
use App\Models\Macroprocess;
use App\Models\Status;
use App\Models\Workspace;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ControlKeyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('control_key_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $controlKeys = ControlKey::with(['workspace', 'capital', 'macroprocess', 'status', 'cadence'])->get();

        return view('admin.controlKeys.index', compact('controlKeys'));
    }

    public function create()
    {
        abort_if(Gate::denies('control_key_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workspaces = Workspace::pluck('owner', 'id')->prepend(trans('global.pleaseSelect'), '');

        $capitals = Capital::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $macroprocesses = Macroprocess::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cadences = Cadence::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.controlKeys.create', compact('cadences', 'capitals', 'macroprocesses', 'statuses', 'workspaces'));
    }

    public function store(StoreControlKeyRequest $request)
    {
        $controlKey = ControlKey::create($request->all());

        return redirect()->route('admin.control-keys.index');
    }

    public function edit(ControlKey $controlKey)
    {
        abort_if(Gate::denies('control_key_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workspaces = Workspace::pluck('owner', 'id')->prepend(trans('global.pleaseSelect'), '');

        $capitals = Capital::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $macroprocesses = Macroprocess::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $statuses = Status::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cadences = Cadence::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $controlKey->load('workspace', 'capital', 'macroprocess', 'status', 'cadence');

        return view('admin.controlKeys.edit', compact('cadences', 'capitals', 'controlKey', 'macroprocesses', 'statuses', 'workspaces'));
    }

    public function update(UpdateControlKeyRequest $request, ControlKey $controlKey)
    {
        $controlKey->update($request->all());

        return redirect()->route('admin.control-keys.index');
    }

    public function show(ControlKey $controlKey)
    {
        abort_if(Gate::denies('control_key_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $controlKey->load('workspace', 'capital', 'macroprocess', 'status', 'cadence');

        return view('admin.controlKeys.show', compact('controlKey'));
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
