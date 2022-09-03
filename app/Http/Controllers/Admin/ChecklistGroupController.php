<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChecklistGroup\StoreRequest;
use App\Models\ChecklistGroup;
use Illuminate\Http\Request;

class ChecklistGroupController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.checklist_groups.create');
    }



    public function store(StoreRequest $request)
    {
        ChecklistGroup::create($request->validated());
        return redirect('/')->with('status', 'Checklist Group Added!');
    }


    public function show(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklist_groups.show', compact('checklistGroup'));
    }


    public function edit(ChecklistGroup $checklistGroup)
    {
        return view('admin.checklist_groups.edit', compact('checklistGroup'));
    }


    public function update(StoreRequest $request, ChecklistGroup $checklistGroup)
    {
        $checklistGroup->update($request->validated());

        return redirect()->route('admin.checklist_groups.show', $checklistGroup)->with('status', 'Updated');
    }


    public function destroy(ChecklistGroup $checklistGroup)
    {
        $checklistGroup->delete();
        return redirect()->to('/')->with('status', 'Deleted!');
    }
}
