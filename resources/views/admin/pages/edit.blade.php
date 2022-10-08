@extends('layouts.main')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{__('Edit Page')}}</h1>
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
                @if(session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
                @endif
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
                    action="{{ route('admin.pages.update', $page) }}"
                    method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-label">{{ __('Page title') }}</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title',$page->title)  }}" placeholder="{{__('Name...')}}">
                    </div>
                    <div class="form-group">
                        <label for="content" class="form-label">{{ __('Page content') }}</label>
                        <textarea name="content" id="content"
                                  class="form-control"
                                  cols="30" rows="3">{!! old('content', $page->content)  !!} </textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-primary" value="{{__('Update page')}}">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    @include('admin.ckeditor')
@endsection
