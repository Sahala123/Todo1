<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Todo;

class TodoController extends Controller
{
    
    function index()
    {
        $todos=Todo::get();
        return view('add',['todos'=>$todos]);
    }
    
    function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'description'=>'required',
            
        ]);
        
        if($validator->fails())
        {
            return redirect('/add')
            ->withInput()
            ->withErrors($validator);
        }
        $todo=new Todo;
        $todo->description=$request->description;
        $todo->save();
        
        return redirect('/add')->withSuccess("Todo List Saved Succesfully..");
    }
    function editView(Request $request)
    {
        $todo=Todo::find($request->id);
        return view('edit',['todo'=>$todo]);
    }
    function update(Request $request)
    {
        $todo=Todo::find($request->id);
        $todo->description=$request->description;
        $todo->save();
        
        return redirect('/todo/edit/'.$request->id)->withSuccess("Employee Details Updated...");
        
    }
    function destroy($id)
    {
      $todo=Todo::find($id);
      $todo->delete();
      return back()->withSuccess("Deleted Succesfully..");
    }
    
}
