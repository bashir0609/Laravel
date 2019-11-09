@extends('layouts.app')
@section('breadcrumb')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('tech') }}">Home</a></li>
        <li class="breadcrumb-item active">Create</li>
    </ol>
</div>
@endsection
@section('message')
    <div class="container ">
        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                <strong>Success</strong> {{ session()->get('message') }}
            </div
        @endif
        <!-- Form Validation Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>  
@endsection
@section('content')
<div class="container">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header text-center">Add New Post</div>

            <div class="card-body">
                <form action="/multi" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" autocomplete="caption" autofocus>
                        </div>
                    </div>
                    <div class="form-group row pt-3">
                        <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                        <div class="col-md-6 ">
                        <input type="file" class="form-control-image" name="image" id="image">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Submit Image
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
