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
                <a href=" {{ url('tech/create') }} ">Create</a>
            </div>
        </div>
    </hr>
    <div class="row ">        
        @foreach ($techs as $tech)
            <div class="col-4 pb-4 ">
                <img src="{{ Storage::url($tech->image) }}" class="figure-img img-fluid rounded" >
                <p >{{ $tech->title }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
