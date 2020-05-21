@extends('layouts.master')
@section('title','User: add')

@section('content')
    <hr>
<div class="container">
<a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
    <div class="row">

        <div class="col-md-5">
        <h4 class="text-center">Add User</h4>
        
        @if($status=session('status'))
            <div class="alert alert-danger">{{ $status}} </div>
        @endif

            
        @if($user)
        
        
        <form action="{{ asset('users') }}/{{ $user->id }}" method='post' enctype='multipart/form-data'>
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ $user->name }}" id="" class="form-control" placeholder='Enter Your Name'>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control"  placeholder='Enter Email'>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" name="class" id="class"  value="{{ $user->class }}" class="form-control"  placeholder='Enter Class'>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone No</label>
                <input type="text" name="phoneNumber" id="phone" value="{{ $user->phoneNumber }}" class="form-control"  placeholder='Enter Phone Number'>
            </div>
            <div class="form-group">
                <label for="name">Image</label>
                <input type="file" name="imageUrl" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">DOB</label>
                <input type="date" name="dob" id="email" value="{{ $user->dob }}" class="form-control" >
            </div>
            <div class="form-group">
                <label for="class">Hobbies</label>
                <input type="text" name="hobbies" id="class"  value="{{ $user->hobbies }}" class="form-control"  placeholder='Enter Hobbies'>
            </div>
            <div class="form-group">
                <input type="submit" value="Add" name='add' class="btn btn-success">
            </div>
        </form>
        @endif
                </div>
        <div class="col-md-5">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger mt-1">{{ $error }}</div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
