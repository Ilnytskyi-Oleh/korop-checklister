<?php

namespace App\Http\ViewComposers;


use App\Models\ChecklistGroup;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $checklistGroups = ChecklistGroup::with(['checklists' => function($query){
            $query->whereNull('user_id');
        }])->get();

        $groups = [];
        $last_Action = auth()->user()->last_action_at;
        if(is_null($last_Action)) {
            $last_Action = now()->subYears(5);
        }
        foreach ($checklistGroups as $group){
            $group['is_new'] = $group->created_at->greaterThan($last_Action);
            $group['is_updated'] = !($group['is_new']) && $group->updated_at->greaterThan($last_Action);
            foreach ($group->checklists as $checklist){
                $checklist['is_new'] = !$group['is_new']
                                        && $checklist->created_at->greaterThan($last_Action);
                $checklist['is_updated'] = !$group['is_updated'] &&
                                            !($checklist['is_new'])
                                            && $checklist->updated_at->greaterThan($last_Action);
                $checklist['tasks'] = 1;
                $checklist['completed_tasks'] = 0;
            }

            $groups[]= $group;
        }

        return $view->with('checklistGroups', $groups);
    }
}
