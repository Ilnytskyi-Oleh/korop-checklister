<?php

namespace App\Http\ViewComposers;


use App\Models\ChecklistGroup;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $checklistGroup = ChecklistGroup::with('checklists')->get();

        return $view->with('checklistGroups', $checklistGroup);
    }
}
