<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use App\Models\Question;
use App\Models\Section;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActivityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('activity_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activities = Activity::with(['section'])->get();

        return view('frontend.activities.index', compact('activities'));
    }

    public function edit(Activity $activity)
    {
        abort_if(Gate::denies('activity_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sections = Section::pluck('section_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $activity->load('section');

        return view('frontend.activities.edit', compact('activity', 'sections'));
    }

    public function update(Request $request)
    {
        $activities = $request->input('activities');
        $controlKeyId = $request->input('controlKey');

        $sectionRef = Section::join('control_keys', 'control_keys.id', '=', 'sections.control_key_id')
        ->where('control_key_id', $controlKeyId)->where('sections.display_order', 30)->pluck('sections.id')->first();

        foreach($activities as $data){
            if($data['id'] === null){
                Activity::create([
                    'activity' => $data['activityName'],
                    'description_activity' => $data['descActivity'],
                    'description_control' => $data['descControl'],
                    'ctr' => $data['ctr'],
                    'section_id' => $sectionRef
                ]);
            } else {

                $activity = Activity::find($data['id']);
        
                if ($activity) {
                    $activity->update([
                        'activity' => $data['activityName'],
                        'description_activity' => $data['descActivity'],
                        'description_control' => $data['descControl'],
                        'ctr' => $data['ctr'],
                    ]);
                } else {
                    return response()->json(['message' => 'Not found'], 404);
                }
            }
        }

        return response()->json();
    }

    public function destroy(Request $request)
    {
        abort_if(Gate::denies('activity_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $activityId = $request->input('activity');
        $controlKeyId = $request->input('controlKey');

        $activity = Activity::find($activityId);

        if ($activity) {
            
            $activity->delete();
    
            return response()->json(['message' => 'Activity deleted successfully']);
        } else {
            return response()->json(['message' => 'Activity not found'], Response::HTTP_NOT_FOUND);
        }

    }

    public function massDestroy(MassDestroyActivityRequest $request)
    {
        $activities = Activity::find(request('ids'));

        foreach ($activities as $activity) {
            $activity->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
