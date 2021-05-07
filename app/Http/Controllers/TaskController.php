<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
class TaskController extends Controller
{
    public function add(Request $request){
        $validator = Validator::make($request->all(),
            ['content'=>'required|max:255']);
        if($validator->fails()){
            return redirect('/')->withInput()->withErrors($validator);
        }
        $content = $request->content;
        $task = new Task();
        $task->content = $content;
        $task->save();
        return redirect('/');
    }
    public function getTasks(){
        $tasks = Task::orderBy('created_at','asc')->get(); 
        return view('task',['tasks'=>$tasks]);
    }
    public function delete($id){
        Task::where('id',$id)->delete();
        return redirect('/');
    }
}
