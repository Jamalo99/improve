<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWorkspaceRequest;
use App\Http\Requests\StoreWorkspaceRequest;
use App\Http\Requests\UpdateWorkspaceRequest;
use App\Models\User;
use App\Models\Workspace;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkspaceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('workspace_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workspaces = Workspace::with(['user_reference'])->get();

        return view('frontend.workspaces.index', compact('workspaces'));
    }

    public function create()
    {
        abort_if(Gate::denies('workspace_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_references = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.workspaces.create', compact('user_references'));
    }

    public function store(StoreWorkspaceRequest $request)
    {
        $workspace = Workspace::create($request->all());

        return redirect()->route('frontend.workspaces.index');
    }

    public function edit(Workspace $workspace)
    {
        abort_if(Gate::denies('workspace_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_references = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $workspace->load('user_reference');

        return view('frontend.workspaces.edit', compact('user_references', 'workspace'));
    }

    public function update(UpdateWorkspaceRequest $request, Workspace $workspace)
    {
        $workspace->update($request->all());

        return redirect()->route('frontend.workspaces.index');
    }

    public function show(Workspace $workspace)
    {
        abort_if(Gate::denies('workspace_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workspace->load('user_reference');

        return view('frontend.workspaces.show', compact('workspace'));
    }

    public function destroy(Workspace $workspace)
    {
        abort_if(Gate::denies('workspace_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workspace->delete();

        return back();
    }

    public function massDestroy(MassDestroyWorkspaceRequest $request)
    {
        $workspaces = Workspace::find(request('ids'));

        foreach ($workspaces as $workspace) {
            $workspace->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
