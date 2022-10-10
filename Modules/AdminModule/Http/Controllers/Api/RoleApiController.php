<?php


namespace Modules\AdminModule\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AdminModule\Services\Role\RoleService;
use Modules\AdminModule\Transformers\RoleResource;

class RoleApiController extends Controller
{
    protected $roleService;

    public function __construct()
    {
        $this->roleService = new RoleService();
    }

    public function index(Request $request)
    {
        $roles= $this->roleService->all($request->all());
        $roles = RoleResource::collection($roles['data'] ?? null)->response()->getData(true);
        return return_response(return_msg(true,"Success",$roles));
    }
    public function create(Request $request)
    {
        $data =$this->roleService->create($request->all());
        if($data['status']){
            $admin = new RoleResource($data['data']);
            return return_response(return_msg(true,"Success",$admin));
        }
        return return_response($data);
    }
    public function update(Request $request,$id)
    {
        $request->request->add(['id'=> $id]);
        $data = $this->roleService->update($request->all());
        if($data['status']){
            $admin = new RoleResource($data['data']);
            return return_response(return_msg(true,"Success",$admin));
        }
        return return_response($data);
    }
    public function find($id)
    {
        $data = $this->roleService->find($id);
        if($data['status']){
            $admin = new RoleResource($data['data']);
            return return_response(return_msg(true,"Success",$admin));
        }
        return return_response($data);
    }
    public function delete(Request $request,$id)
    {
        $request->request->add(['ids'=>[$id]]);
        $response = $this->roleService->delete($request->all());
        return return_response($response);
    }
}
