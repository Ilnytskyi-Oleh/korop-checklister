<?php

namespace App\Http\ViewComposers;


use App\Models\ChecklistGroup;
use Illuminate\View\View;

class SidebarComposer
{
    public function compose(View $view)
    {
        $checklistGroups = ChecklistGroup::with('checklists')->get();

        return $view->with('checklistGroups', $checklistGroups);
    }
}
