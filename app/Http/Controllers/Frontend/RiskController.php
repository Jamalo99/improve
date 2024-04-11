<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRiskRequest;
use App\Http\Requests\UpdateRiskRequest;
use App\Models\ControlKey;
use App\Models\Impact;
use App\Models\Probability;
use App\Models\Risk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RiskController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('risk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $risks = Risk::with(['control_key', 'probability', 'impact'])->get();

        return view('frontend.risks.index', compact('risks'));
    }

    public function edit(Risk $risk)
    {
        abort_if(Gate::denies('risk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $control_keys = ControlKey::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $probabilities = Probability::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $impacts = Impact::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $risk->load('control_key', 'probability', 'impact');

        return view('frontend.risks.edit', compact('control_keys', 'impacts', 'probabilities', 'risk'));
    }

    public function update(Request $request, Risk $risk)
    {
        $requestData = $request->all();

        $risk->update([
            'impact_id' => $requestData['impact'],
            'probability_id' => $requestData['probability']
        ]);

        return response()->json([]);
    }


    public function destroy(Risk $risk)
    {
        abort_if(Gate::denies('risk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $risk->delete();

        return back();
    }

    public function massDestroy(MassDestroyRiskRequest $request)
    {
        $risks = Risk::find(request('ids'));

        foreach ($risks as $risk) {
            $risk->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
