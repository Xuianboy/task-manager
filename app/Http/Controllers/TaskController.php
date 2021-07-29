<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $username = $request->username ??null;
        $email = $request->email ??null;
        $status = $request->status ??null;
        $tasks = new Task;
        if($username){
            $tasks = $tasks->orderBy('username',$username);
        }
        if($email){
            $tasks = $tasks->orderBy('email',$email);
        }
        if($status){
            $tasks = $tasks->whereHas('status',function ($query) use($status) {
                $query->orderBy('name',$status);
            });
        }
        $tasks= $tasks->paginate(3)->appends(['username' => $username,'email' => $email, 'status' => $status]);
       return view('tasks.index',compact('tasks','username','email','status'));
    }
    public function create(){
        return view('tasks.create');
    }
    public function store(Request $request){
        Task::create($request->all());
        return redirect('/');
    }
}
