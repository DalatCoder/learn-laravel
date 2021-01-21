<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class TodosController extends Controller
{
    public function index()
    {
        // Fetch all todos from database
        // display them in the index page

        $todos = Todo::all();

        return view('todos.index')->with('todos', $todos);
    }

    public function show($todoId)
    {
        $todo = Todo::find($todoId);
        return view('todos.show')->with('todo', $todo);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        return redirect('/todos');
    }

    public function edit($todoId)
    {
        $todo = Todo::find($todoId);

        return view('todos.edit')->with('todo', $todo);
    }

    public function update()
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();
        $todo_id = $data['todo_id'];

        $todo = Todo::find($todo_id);

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        return redirect('/todos');
    }

    public function destroy($todoId)
    {
        $todo = Todo::find($todoId);
        $todo->delete();

        return redirect('/todos');
    }
}
