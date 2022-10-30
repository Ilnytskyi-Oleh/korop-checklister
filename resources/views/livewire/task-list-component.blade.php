<div>

    <table id="accordion" class="table table-hover text-nowrap">
        @foreach($checklist->tasks->where('user_id', NULL) as $task)
            <tr >
                <td>
                    <input wire:click="complete_task({{$task->id}})"
                           @if(in_array($task->id, $completed_tasks_id)) checked="checked" @endif
                           type="radio">
                </td>
                <td >
                    <a class="collapsed" data-toggle="collapse" href="#{{$task->name}}_{{$task->id}}" aria-expanded="false">
                        {{ $task->name ?? ' ' }}
                    </a>
                </td>
                <td></td>
            </tr>
            <tr id="{{$task->name}}_{{$task->id}}" class="collapse" data-parent="#accordion" style="">
                <td></td>
                <td  colspan="2">{!! $task->description !!}</td>
            </tr>
        @endforeach
    </table>
</div>
