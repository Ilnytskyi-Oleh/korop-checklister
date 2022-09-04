@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $checklist->name }}</h1>
                </div><!-- /.col -->
                @include('admin.checklists.parts.breadcrumb')
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Small boxes (Stat box) -->
            <div class="row mb-4">
                <button
                    onclick="confirm('Are u sure?') ? document.getElementById('delete-form').submit() : false"
                    class="btn btn-outline-danger w-auto ml-auto mr-3"> Delete</button>

                <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}" id="delete-form" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <div class="row mb-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form
                    action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{ $checklist->name ?? old('name','')  }}" placeholder="{{__('Name...')}}">
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-primary" value="{{__('Update')}}">
                    </div>
                </form>
            </div>

                <hr>

            <div class="row">

                @if(isset($checklist->tasks[0]))
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
                                    <table class="table table-hover text-nowrap">
                                        <tbody>
                                        @foreach($checklist->tasks as $task)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $task->name }}</td>
                                                <td>{{ Str::limit($task->description, 20) }}</td>
                                                <td class="text-right">
                                                    <a href="{{ route('admin.checklists.tasks.edit', [$checklist, $task]) }}"
                                                    class="btn btn-outline-primary">Edit</a>
                                                    <button
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

                @endif

                @if ($errors->storetask->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->storetask->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form
                    action="{{ route('admin.checklists.tasks.store', [$checklist]) }}"
                    method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('Task name') }}</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name','')  }}" placeholder="{{__('Name...')}}">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('Task description') }}</label>
                        <textarea name="description" id="description"
                                  class="form-control"
                                  cols="30" rows="3">{{ old('description', '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-primary" value="{{__('Add task')}}">
                    </div>
                </form>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
