@extends('layouts.master')

@section('title','Home')

@section('content')

    <div class="contaniner col-lg-12">
        @if($status=Session::get('success'))
            <div class="alert alert-danger">
                <p>{{ $status }}</p>
            </div>
        @endif
        <a href="users/create"  class='btn btn-primary mb-3'>Add Student</a>
        @if($status=session('status'))
            <div class="alert alert-danger text-center">{{ $status }}</div>
        @endif
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Hobbies</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @if($users->count())
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->class }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->imageUrl ? $user->imageUrl :"N\A" }}</td>
                        <td>{{ $user->hobbies ? $user->hobbies : "N\A" }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                            <form style='display:inline' action="users/{{ $user->id }}" method='post'>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE
                                </button>
                            </form>
                            <a href="{{ route('users.show', $user->id) }} " class='btn btn-success'>Show</a>  
                            
                        </td>
                        </tr>
                    @endforeach
               @else
               @endif
            </tbody>
        </table>
    </div>
@endsection