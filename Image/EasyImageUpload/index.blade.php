@extends('layouts.app')
@section('breadcrumb')
<div class="container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Home</li>
    </ol>
</div>
@endsection

@section('content')
<div class="container">
        <div class="card-body">
            <div class="card-text ">
                <a href=" {{ url('multi/create') }} ">Create</a>
            </div>
        </div>
        
    </hr>
    <div class="row ">        
        @foreach ($multis as $multi)
            <div class="col-4 pb-4 ">
                <img src="{{ Storage::url($multi->image) }}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption">A caption for the above image.</figcaption>
            </div>
        @endforeach
    </div>
</div>
@endsection
