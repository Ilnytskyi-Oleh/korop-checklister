@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Users')}}</h1>
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
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Created At</th>
                                <th >Name</th>
                                <th>Email</th>
                                <th >Website</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                    <td> {{ $user->name }}</td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>{{ $user->website }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $users->links() }}
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

