<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(){
        $todoAllData = Todo::latest()->get();
        return view('todo', compact('todoAllData'));
    }

    public function add(Request $request): RedirectResponse
    {
        Todo::create($request->only('todo'));
        return redirect()->route('zihad')->with(['success' => 'Your memo is successfully inserted into Database!']);
    }

    public function destroy(int $id)
    {
        Todo::where('id', $id)->delete();
        return redirect()->route('zihad')->with(['success' => 'Your memo is successfully Deleted from Database!']);
    }

    public function update(Request $request): RedirectResponse
    {
        Todo::where('id', $request->id)->update($request->only('todo'));
        return redirect()->route('zihad')->with(['success' => 'Your memo is Updated successfully!']);
    }

}
