@extends('layouts.app')

@section('title', 'Add New Customer')

    @section('content')
        @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <h1>Add New Customer</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="/customer" method="POST" >
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                        <div>{{ $errors->first('name') }}</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                        <div>{{ $errors->first('email') }}</div>
                    </div>
                    
                    @csrf
        
                    <button type="submit" class="btn btn-primary">Add Customer</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <ul>
                    @foreach ($customers as $customer)
                        <li>{{ $customer->name }} <span class="text-muted">{{$customer->email}} </span>  </li>                    
                    @endforeach
                </ul>
            </div>
        </div>
@endsection
