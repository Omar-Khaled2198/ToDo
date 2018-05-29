<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ToDo;

class ToDoController extends Controller
{
    public function index()
    {
        $data=ToDo::all();

        return view("todo")->with("data",$data);
    }
}
