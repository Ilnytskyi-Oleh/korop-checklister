@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Edit Checklist')}}</h1>
                </div><!-- /.col -->
                @include('admin.checklists.parts.breadcrumb')
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
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
                        <input type="text" name="name" class="form-control" value="{{ old('name', $checklist->name)  }}" placeholder="{{__('Name...')}}">
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-primary" value="{{__('Update')}}">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
