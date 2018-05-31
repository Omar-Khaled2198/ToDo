<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ToDo;

class ToDoController extends Controller
{
    public function index()
    {
        $data = ToDo::all();
        return view("todo")->with("data",$data);
    }

    public function insert(Request $request)
    {
        $todo=new ToDo;
        $todo->todo=$request->todo;
        $todo->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        $todo=ToDo::find($id);
        $todo->delete();        
        return redirect()->back();
    }

    public function state($id)
    {
        $todo=ToDo::find($id);
        if($todo->completed)
           $todo->completed=0;
        else
           $todo->completed=1;
        $todo->save();
        return redirect()->back();
    }

    
}
