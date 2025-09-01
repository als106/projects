<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Note;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

        
    public function index()
    {
        $numUsuarios = User::count();
        $numPedidos = Order::count();
        $numProductos = Product::count();
    
        $note = Note::first();
    
        if (!$note) {
            $note = new Note();
            $note->text = '';
            $note->save();
        }
    
        $notes = Note::all();
    
        return view('admin.index', compact('numUsuarios', 'numPedidos', 'numProductos', 'notes'));
    }
    
    public function getNote() {
        $note = Note::first();
    
        if (!$note) {
            $note = new Note();
            $note->text = '';
            $note->save();
        }
    
        return view('admin.note', ['note' => $note]);
    }
    
    public function updateNote(Request $request, $id) {
        $note = Note::findOrFail($id);
        $note->text = $request->note;
        $note->save();
    
        return redirect()->back()->with('message', 'La nota ha sido actualizada!');
    }
    
    public function create()
    {
        $note = new Note();
        $note->text = '';
        $note->save();
    
        return view('admin.index', ['note' => $note]);
    }
    
    
}


