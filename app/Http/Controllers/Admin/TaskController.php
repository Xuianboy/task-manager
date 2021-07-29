<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $tasks = Task::get();
        return view('tasks.admin.index', compact('tasks'));
    }
    public function edit(Task $task){
        return view('tasks.admin.edit',['task'=>$task,'statuses'=>TaskStatus::get()]);
    }
    public function update(Task $task, Request $request){
        $task->update($request->all());
        return redirect('/admin/tasks');
    }
    public function delete(Task $task){
        $task->delete();
        return back();
    }
}
