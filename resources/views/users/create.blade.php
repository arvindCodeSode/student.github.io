@extends('layouts.master')
@section('title','User: add')

@section('content')
    <hr>
<div class="container">
    <div class="row">
        <div class="col-md-5">
        <h4 class="text-center">Add User</h4>
        @if($status=session('status'))
            <div class="alert alert-danger">{{ $status}} </div>
        @endif
        <form action="{{ asset('users/') }}" method='post' enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" id="" class="form-control" placeholder='Enter Your Name'>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control"  placeholder='Enter Email'>
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <input type="text" name="class" id="class"  value="{{ old('class') }}" class="form-control"  placeholder='Enter Class'>
            </div>
            <div class="form-group">
                <label for="phoneNumber">Phone No</label>
                <input type="text" name="phoneNumber" id="phone" value="{{ old('phoneNumber') }}" class="form-control"  placeholder='Enter Phone Number'>
            </div>
            <div class="form-group">
                <label for="name">Image</label>
                <input type="file" name="imageUrl" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">DOB</label>
                <input type="date" name="dob" id="email" value="{{ old('dob') }}" class="form-control" >
            </div>
            <div class="form-group">
                <label for="class">Hobbies</label>
                <input type="text" name="hobbies" id="class"  value="{{ old('hobbies') }}" class="form-control"  placeholder='Enter Hobbies'>
            </div>
            <div class="form-group">
                <input type="submit" value="Add" name='add' class="btn btn-success">
            </div>
        </form>
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
