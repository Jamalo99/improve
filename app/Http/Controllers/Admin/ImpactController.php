<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyImpactRequest;
use App\Http\Requests\StoreImpactRequest;
use App\Http\Requests\UpdateImpactRequest;
use App\Models\Impact;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImpactController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('impact_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impacts = Impact::all();

        return view('admin.impacts.index', compact('impacts'));
    }

    public function create()
    {
        abort_if(Gate::denies('impact_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.impacts.create');
    }

    public function store(StoreImpactRequest $request)
    {
        $impact = Impact::create($request->all());

        return redirect()->route('admin.impacts.index');
    }

    public function edit(Impact $impact)
    {
        abort_if(Gate::denies('impact_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.impacts.edit', compact('impact'));
    }

    public function update(UpdateImpactRequest $request, Impact $impact)
    {
        $impact->update($request->all());

        return redirect()->route('admin.impacts.index');
    }

    public function show(Impact $impact)
    {
        abort_if(Gate::denies('impact_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.impacts.show', compact('impact'));
    }

    public function destroy(Impact $impact)
    {
        abort_if(Gate::denies('impact_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $impact->delete();

        return back();
    }

    public function massDestroy(MassDestroyImpactRequest $request)
    {
        $impacts = Impact::find(request('ids'));

        foreach ($impacts as $impact) {
            $impact->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
