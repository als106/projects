<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Shoppingcart;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(){
        $users = User::paginate(4);
        return view('user.index', ['users' => $users]);
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('user.show', ['user' => $user]);
    }
    public function create(){
        $users = User::all();
        return view('user.create' , compact('users'));
    }
    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->save();
        $cart = new Shoppingcart();
        $cart->user_id = $user->id;
        $cart->save();
        session()->flash('message', 'Usuario creado correctamente');
        return redirect()->action([UserController::class, 'index']);
    }
    
    public function edit($id){
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }
    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        session()->flash('message', 'Usuario actualizado correctamente');
        return redirect()->action([UserController::class, 'index']);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $orders = Order::where('user_id', '=', $user->id)->first();
        $countOrd = Order::where('user_id', '=', $user->id)->count();
        $shoppingcart = Shoppingcart::where('user_id', '=', $user->id)->first();
        $count = Shoppingcart::where('user_id', '=', $user->id)->count();
        
        if ($count > 0) {
            $shoppingcart->delete();
        }
        
        try {
            $user->delete();
            session()->flash('message', "Usuario eliminado correctamente");
        } catch (\Exception $e) {
            session()->flash('error', "No se puede eliminar el usuario porque tiene pedidos");
        }
        
        return redirect()->back();
    }
    public function sortUsers(){
        $users = User::orderBy('name')->paginate(4);
        return view('user.index', ['users' => $users]);
    }
    public function getUserOrders($id){
        $user = User::findOrFail($id);
        $orders = Order::where('user_id', '=', $user->id)->first();
        if ($orders == null) {
            session()->flash('error', "No hay pedidos para este usuario");
            return redirect()->route('Inicio')->with('status', 'Usuario actualizado correctamente');
        }
        return view('user.orders')->with('orders', $orders);
    }
    public function changePassword($id){
        $user = User::findOrFail($id);

        return view('user.changePass', ['user' => $user]);
    }

    public function updatePassword(Request $request, $id){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = User::findOrFail($id);   
        if(!Hash::check($request->old_password, $user->password)){
            return back()->with("error", "La contraseña antigua no coincide!");
        }
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Contraseña actualizada correctamente!");
    }

    public function profile($id){
        $user = auth()->user();
        return view('user.profile', ['user' => $user]);
    }
    public function changeProfile($id){
        $user = auth()->user();
        return view('user.editProfile', ['user' => $user]);
    }

    public function updateProfile(Request $request , $id)
    {   
        $user = auth()->user();
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|unique:users,email',
        ]);
        
        $request->name = $request->name ?? $user->name;
        $request->email = $request->email ?? $user->email;
        

        //$user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
    
        return redirect()->route('profile', $user->id)->with('status', 'Usuario actualizado correctamente');
    }
    
}
