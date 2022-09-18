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

        return $view->with('checklistGroups', $checklistGroups);
    }
}
