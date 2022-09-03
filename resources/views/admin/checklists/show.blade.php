@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Checklist')}}</h1>
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
                <a href="{{ route('admin.checklist_groups.checklists.edit', [$checklistGroup, $checklist]) }}" class="btn btn-outline-secondary w-auto"> Edit</a>
                <button
                    onclick="confirm('Are u sure?') ? document.getElementById('delete-form').submit() : false"
                    class="btn btn-outline-danger w-auto ml-auto"> Delete</button>

                <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}" id="delete-form" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
            <div class="row ">
                <table class="table">
                    <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{ $checklist->name }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
