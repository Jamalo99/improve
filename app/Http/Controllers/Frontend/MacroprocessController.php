<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMacroprocessRequest;
use App\Http\Requests\StoreMacroprocessRequest;
use App\Http\Requests\UpdateMacroprocessRequest;
use App\Models\Capital;
use App\Models\Macroprocess;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MacroprocessController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('macroprocess_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $macroprocesses = Macroprocess::with(['capital'])->get();

        return view('frontend.macroprocesses.index', compact('macroprocesses'));
    }

    public function create()
    {
        abort_if(Gate::denies('macroprocess_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $capitals = Capital::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.macroprocesses.create', compact('capitals'));
    }

    public function store(StoreMacroprocessRequest $request)
    {
        $macroprocess = Macroprocess::create($request->all());

        return redirect()->route('frontend.macroprocesses.index');
    }

    public function edit(Macroprocess $macroprocess)
    {
        abort_if(Gate::denies('macroprocess_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $capitals = Capital::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $macroprocess->load('capital');

        return view('frontend.macroprocesses.edit', compact('capitals', 'macroprocess'));
    }

    public function update(UpdateMacroprocessRequest $request, Macroprocess $macroprocess)
    {
        $macroprocess->update($request->all());

        return redirect()->route('frontend.macroprocesses.index');
    }

    public function show(Macroprocess $macroprocess)
    {
        abort_if(Gate::denies('macroprocess_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $macroprocess->load('capital');

        return view('frontend.macroprocesses.show', compact('macroprocess'));
    }

    public function destroy(Macroprocess $macroprocess)
    {
        abort_if(Gate::denies('macroprocess_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $macroprocess->delete();

        return back();
    }

    public function massDestroy(MassDestroyMacroprocessRequest $request)
    {
        $macroprocesses = Macroprocess::find(request('ids'));

        foreach ($macroprocesses as $macroprocess) {
            $macroprocess->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function fetchMacroprocess (Request $request){

        $data = Macroprocess::where('capital_id', $request->capital_id)->pluck('name_'.session('language'), 'id');
 
        return response()->json([$data]);

    }
}
