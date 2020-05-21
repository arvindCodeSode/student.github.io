@extends('layouts.master')
@section('title','User: Profile')

@section('content')
<div class="jumbotron">
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
        <div class="col-md-3 offset-md-5">
        <h1>Welcome </h1>
            @if($user)
               <h3>{{ $user->name }}</h3>
            @endif
        </div>
</div>
@endsection