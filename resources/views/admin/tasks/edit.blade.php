@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Edit Task')}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{--                            <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                        <li class="breadcrumb-item active">{{__('Main')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
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
                    action="{{ route('admin.checklists.tasks.update', [$checklist, $task]) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('Task name') }}</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$task->name)  }}" placeholder="{{__('Name...')}}">
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('Task description') }}</label>
                        <textarea name="description" id="description"
                                  class="form-control"
                                  cols="30" rows="3">{{ old('description', $task->description) }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-primary" value="{{__('Update task')}}">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
