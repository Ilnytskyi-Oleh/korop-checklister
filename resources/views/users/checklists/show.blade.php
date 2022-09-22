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

            <table id="accordion" class="table table-hover text-nowrap">
                @foreach($checklist->tasks as $task)
                        <tr >
                            <td></td>
                            <td >
                                <a class="collapsed" data-toggle="collapse" href="#{{$task->name}}_{{$task->id}}" aria-expanded="false">
                                    {{ $task->name }}
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

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

