<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProbabilityRequest;
use App\Http\Requests\StoreProbabilityRequest;
use App\Http\Requests\UpdateProbabilityRequest;
use App\Models\Probability;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProbabilityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('probability_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $probabilities = Probability::all();

        return view('frontend.probabilities.index', compact('probabilities'));
    }

    public function create()
    {
        abort_if(Gate::denies('probability_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.probabilities.create');
    }

    public function store(StoreProbabilityRequest $request)
    {
        $probability = Probability::create($request->all());

        return redirect()->route('frontend.probabilities.index');
    }

    public function edit(Probability $probability)
    {
        abort_if(Gate::denies('probability_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.probabilities.edit', compact('probability'));
    }

    public function update(UpdateProbabilityRequest $request, Probability $probability)
    {
        $probability->update($request->all());

        return redirect()->route('frontend.probabilities.index');
    }

    public function show(Probability $probability)
    {
        abort_if(Gate::denies('probability_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.probabilities.show', compact('probability'));
    }

    public function destroy(Probability $probability)
    {
        abort_if(Gate::denies('probability_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $probability->delete();

        return back();
    }

    public function massDestroy(MassDestroyProbabilityRequest $request)
    {
        $probabilities = Probability::find(request('ids'));

        foreach ($probabilities as $probability) {
            $probability->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
