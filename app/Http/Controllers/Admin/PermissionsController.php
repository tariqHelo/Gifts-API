<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Models\Permission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
    public function index()
    {   //dd(20);
      abort_if(Gate::denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
       // abort_if(Gate::denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all();

        return view('admin.permissions.create',[
            'permissions' => $permissions ,
            'permission' => new Permission(),
        ]);
    }

    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        \Session::flash("msg", "تم إضافة الصلاحية بنجاح");
        return redirect()->route('permissions.index');

    }

    public function edit(Permission $permission)
    {
      // abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(StorePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        \Session::flash("msg", "تم الصلاحية رول ($permission->title) بنجاح");
        return redirect()->route('permissions.index');

    }

    public function show(Permission $permission)
    {
        abort_if(Gate::denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.permissions.show', compact('permission'));
    }

    public function destroy(Permission $permission)
    {
        abort_if(Gate::denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permission->delete();
        session()->flash("msg", "w: تم الحذف بنجاح");
        return back();

    }
}
