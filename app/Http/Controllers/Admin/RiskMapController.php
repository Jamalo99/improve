<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRiskMapRequest;
use App\Http\Requests\StoreRiskMapRequest;
use App\Http\Requests\UpdateRiskMapRequest;
use App\Models\Capital;
use App\Models\ControlKey;
use App\Models\Impact;
use App\Models\Macroprocess;
use App\Models\Probability;
use App\Models\RiskMap;
use App\Models\Workspace;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RiskMapController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('risk_map_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riskMaps = RiskMap::with(['workspace', 'capital', 'macroprocess', 'probability', 'impact', 'controlkeys'])->get();

        return view('admin.riskMaps.index', compact('riskMaps'));
    }

    public function create()
    {
        abort_if(Gate::denies('risk_map_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workspaces = Workspace::pluck('owner', 'id')->prepend(trans('global.pleaseSelect'), '');

        $capitals = Capital::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $macroprocesses = Macroprocess::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $probabilities = Probability::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $impacts = Impact::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $controlkeys = ControlKey::pluck('title', 'id');

        return view('admin.riskMaps.create', compact('capitals', 'controlkeys', 'impacts', 'macroprocesses', 'probabilities', 'workspaces'));
    }

    public function store(StoreRiskMapRequest $request)
    {
        $riskMap = RiskMap::create($request->all());
        $riskMap->controlkeys()->sync($request->input('controlkeys', []));

        return redirect()->route('admin.risk-maps.index');
    }

    public function edit(RiskMap $riskMap)
    {
        abort_if(Gate::denies('risk_map_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workspaces = Workspace::pluck('owner', 'id')->prepend(trans('global.pleaseSelect'), '');

        $capitals = Capital::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $macroprocesses = Macroprocess::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $probabilities = Probability::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $impacts = Impact::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $controlkeys = ControlKey::pluck('title', 'id');

        $riskMap->load('workspace', 'capital', 'macroprocess', 'probability', 'impact', 'controlkeys');

        return view('admin.riskMaps.edit', compact('capitals', 'controlkeys', 'impacts', 'macroprocesses', 'probabilities', 'riskMap', 'workspaces'));
    }

    public function update(UpdateRiskMapRequest $request, RiskMap $riskMap)
    {
        $riskMap->update($request->all());
        $riskMap->controlkeys()->sync($request->input('controlkeys', []));

        return redirect()->route('admin.risk-maps.index');
    }

    public function show(RiskMap $riskMap)
    {
        abort_if(Gate::denies('risk_map_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riskMap->load('workspace', 'capital', 'macroprocess', 'probability', 'impact', 'controlkeys');

        return view('admin.riskMaps.show', compact('riskMap'));
    }

    public function destroy(RiskMap $riskMap)
    {
        abort_if(Gate::denies('risk_map_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riskMap->delete();

        return back();
    }

    public function massDestroy(MassDestroyRiskMapRequest $request)
    {
        $riskMaps = RiskMap::find(request('ids'));

        foreach ($riskMaps as $riskMap) {
            $riskMap->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
