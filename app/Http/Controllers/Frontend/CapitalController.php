<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCapitalRequest;
use App\Http\Requests\StoreCapitalRequest;
use App\Http\Requests\UpdateCapitalRequest;
use App\Models\Capital;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CapitalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('capital_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $capitals = Capital::all();

        return view('frontend.capitals.index', compact('capitals'));
    }

    public function create()
    {
        abort_if(Gate::denies('capital_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.capitals.create');
    }

    public function store(StoreCapitalRequest $request)
    {
        $capital = Capital::create($request->all());

        return redirect()->route('frontend.capitals.index');
    }

    public function edit(Capital $capital)
    {
        abort_if(Gate::denies('capital_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.capitals.edit', compact('capital'));
    }

    public function update(UpdateCapitalRequest $request, Capital $capital)
    {
        $capital->update($request->all());

        return redirect()->route('frontend.capitals.index');
    }

    public function show(Capital $capital)
    {
        abort_if(Gate::denies('capital_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.capitals.show', compact('capital'));
    }

    public function destroy(Capital $capital)
    {
        abort_if(Gate::denies('capital_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $capital->delete();

        return back();
    }

    public function massDestroy(MassDestroyCapitalRequest $request)
    {
        $capitals = Capital::find(request('ids'));

        foreach ($capitals as $capital) {
            $capital->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
