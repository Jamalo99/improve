<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCadenceRequest;
use App\Http\Requests\StoreCadenceRequest;
use App\Http\Requests\UpdateCadenceRequest;
use App\Models\Cadence;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CadenceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cadence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cadences = Cadence::all();

        return view('frontend.cadences.index', compact('cadences'));
    }

    public function create()
    {
        abort_if(Gate::denies('cadence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.cadences.create');
    }

    public function store(StoreCadenceRequest $request)
    {
        $cadence = Cadence::create($request->all());

        return redirect()->route('frontend.cadences.index');
    }

    public function edit(Cadence $cadence)
    {
        abort_if(Gate::denies('cadence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.cadences.edit', compact('cadence'));
    }

    public function update(UpdateCadenceRequest $request, Cadence $cadence)
    {
        $cadence->update($request->all());

        return redirect()->route('frontend.cadences.index');
    }

    public function show(Cadence $cadence)
    {
        abort_if(Gate::denies('cadence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.cadences.show', compact('cadence'));
    }

    public function destroy(Cadence $cadence)
    {
        abort_if(Gate::denies('cadence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cadence->delete();

        return back();
    }

    public function massDestroy(MassDestroyCadenceRequest $request)
    {
        $cadences = Cadence::find(request('ids'));

        foreach ($cadences as $cadence) {
            $cadence->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
