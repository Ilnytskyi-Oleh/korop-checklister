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
        foreach ($checklistGroups as $group){
            $group['is_new'] = true;
            $group['is_updated'] = false;
            foreach ($group->checklists as $checklist){
                $checklist['is_new'] = false;
                $checklist['is_updated'] = false;
                $checklist['tasks'] = 1;
                $checklist['completed_tasks'] = 0;
            }

            $groups[]= $group;
        }

        return $view->with('checklistGroups', $groups);
    }
}
