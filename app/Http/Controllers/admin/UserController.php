<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\model\Roles;
use App\model\User_Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $data = User::paginate(10);
        return view("admin.user.index",compact("data"));
    }
    public function create(){
        $roles = Roles::all();
        return view("admin.user.create",compact('roles'));
    }
    public function store(RegisterRequest $request){
    $user = [
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'telephone'=>$request->telephone,
        'address'=>$request->address,
    ];
    $id = User::insertGetId($user);
    $roles = $request->role;
    if(!empty($roles)){
        foreach ($roles as $item){
            User_Role::insert([
                'user_id'=>$id,
                "role_id"=>$item
            ]);
        }
    }
    return redirect()->route("user.index");
}
    public function edit($id){

       $user = User::findOrfail($id);

       $role_user = User_Role::where("user_id",$id)->get();

       $roles = Roles::all();

        return view("admin.user.edit",compact('user','roles','role_user'));
    }

    public function update(RegisterRequest $request,$id)
    {
    $user = User::findOrFail($id);
    $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone,
            'address' => $request->address,
        ];
       if($user->update($data)){
           $rol = $request->role;
           if (!empty($rol)) {
               foreach ($rol as $item) {
                   User_Role::where('role_id', $item)->updateOrCreate([
                       'user_id' => $id,
                       "role_id" => $item
                   ]);
               }
           }
       }
        return redirect()->route("user.index");
    }
    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        User_Role::where("user_id",$id)->delete();
        return redirect()->back();
    }
}

