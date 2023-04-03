<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;

    }
    //======================================
    public function index()
    {
        $permissions =$this->permission->paginate();
        return View("permission.index",["permissions"=>$permissions]);
    }

      //======================================
    public function create()
    {
        $permissions =$this->permission->get();
        return View("permission.create",["permission"=>$permissions]);
    }

      //======================================
    public function edit($id)
    {
        $permissions =$this->permission->findOrFail($id);
        return View("permission.edit",["permission"=>$permissions]);
    }

      //======================================
    public function show($id)
    {
        $permissions =$this->permission->findOrFail($id);
        return View("permission.show",["permission"=>$permissions]);
    }


      //======================================
    public function destroy($id)
    {
        $permissions =$this->permission->findOrFail($id);
        $permissions->delete();
        return redirect()->route("permission.destroy")->with("message","delete with success");
    }

      //======================================
    public function  store(Request $request)
    {
        $permissions =$this->permission->create(["name"=>$request->name]);


        return redirect()->route("permission.index")->with("message","create with success");
    }

      //======================================
    public function  update(Request $request,$id)
    {
        $permissions =$this->permission->findOrFail($id);
        $permissions->update([
            "name"=>$request->name
        ]);

        return redirect()->route("permission.index")->with("message","update with success");
    }
}
