<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Task\StoreRequest;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
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
        //
    }


    public function store(StoreRequest $request, Checklist $checklist)
    {
        $position = $checklist->tasks()->max('position') + 1;
        $checklist->tasks()->create($request->validated() + ['position' => $position]);
        return redirect()->route('admin.checklist_groups.checklists.show', [$checklist->checklistGroup,$checklist])
            ->with('status', 'Task created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(Checklist $checklist, Task $task)
    {
        return view('admin.tasks.edit', compact('task', 'checklist'));
    }


    public function update(StoreRequest $request, Checklist $checklist, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('admin.checklist_groups.checklists.show', [
            $checklist->checklistGroup, $checklist
        ])->with('status', 'Updated!');
    }


    public function destroy(Checklist $checklist, Task $task)
    {
        $checklist->tasks()->where('position', '>', $task->position)
            ->update([
               'position' => \DB::raw('position - 1')
            ]);

        $task->delete();

        return redirect()->route('admin.checklist_groups.checklists.show', [
            $checklist->checklistGroup, $checklist
        ])->with('status', 'Deleted!');
    }
}
