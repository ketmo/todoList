<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Input, Redirect; 
use App\Todo;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        // \Debugbar::info($books);
        return view('layouts/todo',[
            'todos' => $todos
        ]);
        // return view('layouts/todo');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function postTodo(Request $request, $name)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
        ]);

        if($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        // dd($request);
        $todo = new Todo; //ORM
        $todo->title = $request->name;
        $todo->save();

        return redirect('/');
    }

    public function deleteTodo(Todo $todo)
    {
        // dd($todo);
        $todo->delete();
        return redirect('/');
    }

}
