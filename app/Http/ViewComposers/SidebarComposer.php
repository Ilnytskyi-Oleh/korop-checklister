<?php

namespace App\Http\ViewComposers;


use App\Models\Checklist;
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
        $userChecklists = Checklist::where('user_id', auth()->id())->get();


        foreach ($checklistGroups as $group){

            $group_updated_at = $userChecklists->where('checklist_group_id', $group->id)->max('updated_at');

            $group['is_new'] = $group->created_at->greaterThan($group_updated_at);
            $group['is_updated'] = !($group['is_new']) && $group->updated_at->greaterThan($group_updated_at);
            foreach ($group->checklists as $checklist){
                $checklist_updated_at = $userChecklists->where('checklist_id', $checklist->id)->max('updated_at');
                $checklist['is_new'] = !$group['is_new']
                                        && $checklist->created_at->greaterThan( $checklist_updated_at);
                $checklist['is_updated'] = !$group['is_updated'] && !$group['is_new'] &&
                                            !($checklist['is_new'])
                                            && $checklist->updated_at->greaterThan( $checklist_updated_at);
                $checklist['tasks'] = 1;
                $checklist['completed_tasks'] = 0;
            }
            $groups[]= $group;
        }

        return $view->with('checklistGroups', $groups);
    }
}
