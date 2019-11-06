@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header text-center">Add New Post</div>

            <div class="card-body">
                <form action="/p" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="caption" class="col-md-4 col-form-label text-md-right">Post Caption</label>

                        <div class="col-md-6">
                            <input id="caption" type="text" class="form-control" name="caption" value="{{ old('caption') }}" autocomplete="caption" autofocus>
                        </div>
                    </div>
                    <div class="form-group row pt-3">
                        <label for="image" class="col-md-4 col-form-label text-md-right">Post Image</label>

                        <div class="col-md-6 ">
                        <input type="file" class="form-control-file" name="image" id="image">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Add Post
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection
