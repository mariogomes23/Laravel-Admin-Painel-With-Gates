<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;

    }
    //======================================
    public function index()
    {
        $roles =$this->role->paginate();
        return View("admin.index",["roles"=>$roles]);
    }

      //======================================
    public function create()
    {
        $roles =$this->role->get();
        return View("admin.create",["roles"=>$roles]);
    }

      //======================================
    public function edit($id)
    {
        $roles =$this->role->findOrFail($id);
        return View("admin.edit",["roles"=>$roles]);
    }

      //======================================
    public function show($id)
    {
        $roles =$this->role->findOrFail($id);
        return View("admin.show",["roles"=>$roles]);
    }


      //======================================
    public function destroy($id)
    {
        $roles =$this->role->findOrFail($id);
        $roles->delete();
        return redirect()->route("role.index")->with("message","delete with success");
    }

      //======================================
    public function  store(Request $request)
    {
        $roles =$this->role->create([
            "name"=>$request->name
        ]);

        return redirect()->route("role.index")->with("message","create with success");
    }

      //======================================
    public function  update(Request $request,$id)
    {
        $roles = $this->role->findOrFail($id);
        $roles->update([
            "name"=>$request->name
        ]);

        return redirect()->route("role.index")->with("message","update with success");
    }
}
