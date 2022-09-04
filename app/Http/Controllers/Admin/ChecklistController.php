<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Checklist\StoreRequest;
use App\Models\Checklist;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklists.create', compact('checklistGroup'));
    }


    public function store(ChecklistGroup $checklistGroup, StoreRequest $request)
    {
        $checklistGroup->checklists()->create($request->validated());
//        Checklist::create($request->validated() + ['checklist_group_id' => $checklistGroup->id]);
        return redirect('/')->with('status', 'Checklist Added!');
    }


    public function show(ChecklistGroup $checklistGroup, Checklist $checklist)
    {

        $checklist = $checklist->load('tasks');
        return view('admin.checklists.show', compact('checklistGroup', 'checklist'));
    }



    public function update(StoreRequest $request, ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->update($request->validated());

        return redirect()->route('admin.checklist_groups.checklists.show', [$checklistGroup, $checklist])
            ->with('status', 'Updated');
    }


    public function destroy(ChecklistGroup $checklistGroup, Checklist $checklist)
    {
        $checklist->delete();
        return redirect()->to('/')->with('status', 'Deleted!');
    }
}
