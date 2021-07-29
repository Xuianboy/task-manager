@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <a class="btn btn-primary m-3" href="{{route('tasks.create')}}">Create task</a>
            <div class="col-3">
              <a href="{{route('tasks.index',['page'=>$tasks->currentPage(),'username'=>$username == 'desc'?'asc':'desc'])}}">Username{{$username == 'desc'?'↑':'↓'}}</a>
            </div>
            <div class="col-3">
                <a href="{{route('tasks.index',['page'=>$tasks->currentPage(),'email'=>$email == 'desc'?'asc':'desc'])}}">Email{{$email == 'desc'?'↑':'↓'}}</a>
            </div>
            <div class="col-3">
                <a href="{{route('tasks.index',['page'=>$tasks->currentPage(),'status'=>$status == 'desc'?'asc':'desc'])}}">Status{{$status == 'desc'?'↑':'↓'}}</a>
            </div>
        @foreach($tasks as $task)
        <div class="card col-3 m-3 ">
            <div class="card-body ">
                <h4 class="card-title">{{ $task->username }}</h4>
                <h6 class="card-subtitle mb-2 text-muted">{{ $task->email }}</h6>
                <p class="card-text">
                    {{ $task->text }}
                </p>
                <a>{{ $task->status->name }}</a>
            </div>
        </div>
        @endforeach
        </div>
        <div class="d-flex justify-content-center mt-5">
            {{ $tasks->links() }}
        </div>
    </div>
@endsection
