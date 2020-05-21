@extends('layouts.master')
@section('title','User: Add Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-5 md-offset-3">
            <h4 class="text-center">Add Profile</h4>
            @if($status=session('status'))
                <div class="alert alert-danger">{{ $status}} </div>
            @endif
        <form action="{{ asset('users/pro') }}" method='post' enctype='multipart/form-data'>
            @csrf
            
            <div class="form-group">
                <input type="submit" value="Save" name='add' class="btn btn-primary">
            </div>
        </form>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger mt-1">{{ $error }}</div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
