<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Conection;

class UsersController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')->get();

        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function show($id){
        $user = User::find($id);

        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $conection = new Conection();
        $conection->name = $request->name;
        $conection->email = $request->email;
        $conection->company = $request->company;
        $conection->telephone = $request->telephone;
        $conection->identification = $request->identification;
        $conection->user_id = $user->id;
        $conection->shippingAddress = $request->shippingAddress;
        $conection->billingAddress = $request->billingAddress;
        $conection->is_read = true;
        $conection->save();

        return redirect('admin/users')->with('message', 'Usuario registrado con éxito!');
    }

    public function edit($id){
        $user = User::find($id);
        $conection = $user->conection;

        return view('admin.users.edit', [
            'user' => $user, 
            'conection' => $conection
        ]);
    }

    public function update($id, Request $request){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        if($request->password){
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $conection = $user->conection;
        $conection->name = $request->name;
        $conection->company = $request->company;
        $conection->identification = $request->identification;
        $conection->email = $request->email;
        $conection->telephone = $request->telephone;
        $conection->shippingAddress = $request->shippingAddress;
        $conection->billingAddress = $request->billingAddress;
        $conection->is_read = true;
        $conection->save();

        return redirect()->back()->with('message', 'Usuario modificado con exito!');
    }

    public function destroy($id, Request $request){
        $user = User::find($id);
        $user->is_active = !$user->is_active;
        $user->save();

        if(!$user->is_active){
            return redirect()->back()->with('message', 'Usuario desactivado con exito');
        }
        return redirect()->back()->with('message', 'Usuario activado con exito');

    }

    public function handle(Request $request){
        $usersId = $request->usersId;

        if(isset($usersId)){
            for($i = 0; $i < count($usersId); $i++){
                $user = User::find($usersId[$i]);
                $user->is_active = !$user->is_active;
                $user->save();
            }
        }

        return redirect()->back()->with('message', 'Usuarios modificados con exito');
    }
}
