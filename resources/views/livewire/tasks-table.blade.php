<div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('List of Tasks') }}</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" >
                            <tbody wire:sortable="updateTaskOrder">
                            @foreach($tasks as $task)
                                <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                                    <td wire:sortable.handle>{{ $loop->iteration }}</td>
                                    <td wire:sortable.handle>{{ $task->name }}</td>
                                    <td wire:sortable.handle>{!!   Str::limit($task->description, 20) !!}</td>
                                    <td class="text-right">
                                        <a !wire:sortable.handle href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}"
                                           class="btn btn-outline-primary">Edit</a>
                                        <button !wire:sortable.handle
                                            onclick="confirm('Are u sure?') ? document.getElementById('delete-task-{{$task->id}}').submit() : false"
                                            class="btn btn-outline-danger w-auto ml-auto mr-3"> Delete</button>

                                        <form action="{{ route('admin.checklists.tasks.destroy', [$checklist, $task]) }}" id="delete-task-{{$task->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>


