<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todolist = Todolist::all();

        return view('todolist.index', compact('todolist'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tarea'=>'required',
            'descripcion'=>'required',
            'fecha_vencimiento'=>'required',
            'estado'=>'required'
        ]);

        $todolist = new Todolist([
            'tarea' => $request->get('tarea'),
            'descripcion' => $request->get('descripcion'),
            'fecha_vencimiento' => $request->get('fecha_vencimiento'),
            'estado' => $request->get('estado')
        ]);
        $todolist->save();
        return redirect('/todolist')->with('success', 'Task saved!');

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
        $todolist = Todolist::find($id);
        return view('todolist.edit', compact('todolist'));        
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
        $request->validate([
            'tarea'=>'required',
            'descripcion'=>'required',
            'fecha_vencimiento'=>'required',
            'estado'=>'required'
        ]);

        $todolist = Todolist::find($id);
        $todolist->tarea =  $request->get('descripcion');
        $todolist->descripcion =  $request->get('descripcion');
        $todolist->fecha_vencimiento = $request->get('fecha_vencimiento');
        $todolist->estado = $request->get('estado');
        $todolist->save();

        return redirect('/todolist')->with('success', 'Task updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todolist = Todolist::find($id);
        $todolist->delete();

        return redirect('/todolist')->with('success', 'Task deleted!');

    }
}
