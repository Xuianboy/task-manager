@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-primary m-3" href="{{route('tasks.create')}}">Create task</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Text</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
        @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{$task->id}}</th>
                        <td>{{$task->username}}</td>
                        <td>{{$task->email}}</td>
                        <td>{{$task->text}}</td>
                        <td>{{$task->status->name}}</td>
                        <td>
                            <a href="{{route('admin.tasks.edit',['task'=>$task->id])}}">Edit</a>
                            <form action="{{ route('admin.tasks.delete', ['task' => $task->id]) }}" method="post">
                                <input class="btn btn-default" type="submit" value="Delete" />
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                    </tr>
        @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-5">
        </div>
    </div>
@endsection
