<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskListComponent extends Component
{
    public $checklist;
    public $completed_tasks_id = [];

    public function mount()
    {
        $this->completed_tasks_id =  Task::where('checklist_id', $this->checklist->id)
            ->where('user_id', auth()->id())
            ->whereNotNull('completed_at')
            ->pluck('task_id')
            ->toArray();
    }

    public function render()
    {
        return view('livewire.task-list-component');
    }

    public function complete_task($task_id)
    {
        $task = Task::find($task_id);

        if($task){
            $user_task = Task::where('task_id', $task_id)->first();
            if($user_task){
                if(is_null($user_task->completed_at)){
                    $user_task->update(['completed_at' => now()]);
                }
            } else {
                $user_task = $task->replicate();
                $user_task->user_id =  auth()->id();
                $user_task->task_id = $task->id;
                $user_task->completed_at = now();
                $user_task->save();
            }
        }
    }
}
