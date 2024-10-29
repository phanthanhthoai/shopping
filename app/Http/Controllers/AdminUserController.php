<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user,Role $role){
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        Paginator::useBootstrap();
        $users = $this ->user->latest()->paginate(5);
        return view('admin.user.index',compact('users'));
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->user);
    }
    public function create()
    {
        $roles =$this->role->all();
        return view('admin.user.add',compact('roles'));
    }
    public function save(Request $request)
    {
        try{
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email'=> $request->email,
                'password' => Hash::make($request->password),
            ]);
            $roleId = $request->role_id;
            DB::table('role_user')->insert([
                'role_id'=> $roleId,
                'user_id'=> $user->id
            ]);
            DB::commit();
            return redirect()->route('users.index');
        } catch(Exception $exception){
            DB::rollBack();
            Log::error('Message :'.$exception->getMessage().'---Line'.$exception->getLine());
        }
        
    }
    public function edit($id){
        $roles =$this->role->all();
        $user = $this->user->find($id);
        $roleUser = DB::table('role_user')->where('user_id','=',$id)->get();
        return view('admin.user.edit',compact('roles','user','roleUser'));
    }
    public function update($id,Request $request)
    {
        try{
            DB::beginTransaction();
            $user = $this->user->find($id)->update([
                'name' => $request->name,
                'email'=> $request->email,
                'password' => Hash::make($request->password),
            ]);
            $roleid= $request->role_id;
            DB::table('role_user')->where('user_id','=',$id)->update([
                'role_id'=> $roleid
            ]);
            DB::commit();
            return redirect()->route('users.index');
        } catch(Exception $exception){
            DB::rollBack();
            Log::error('Message :'.$exception->getMessage().'---Line'.$exception->getLine());
        }
    }
}
