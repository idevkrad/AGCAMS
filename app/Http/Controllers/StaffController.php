<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\StaffResource;

class StaffController extends Controller
{
    public function index(Request $request){
        if($request->search){
            $data = StaffResource::collection(
                User::query()
                ->with('roles.role','roles.college','profile')
                ->when($request->keyword, function ($query, $keyword) {
                    $query->whereHas('profile',function ($query) use ($keyword) {
                        $query->where(\DB::raw('concat(firstname," ",lastname)'), 'LIKE', "%{$keyword}%")
                        ->orWhere(\DB::raw('concat(lastname," ",firstname)'), 'LIKE', "%{$keyword}%");
                    })->orWhere(function ($query) use ($keyword) {
                        $query->where('username', 'LIKE', "%{$keyword}%")->whereNotIn('role',['Super Administrator']);
                    });
                })
                ->whereNotIn('role',['Super Administrator'])
                ->paginate($request->count)
                ->withQueryString()
            );
            return $data;
        }else{
            return inertia('Modules/Staffs/Index');
        }
    }

    public function store(Request $request){
        $data = \DB::transaction(function () use ($request){
            $data = User::create(array_merge($request->all(), ['role' => 'Staff','password' => bcrypt('adzuagcams')]));
            $data->profile()->create($request->all());
            foreach($request->roles as $role) {
                if($role['id'] == 3){
                    foreach($request->colleges as $college) {
                        $data->roles()->create(array_merge($request->all(), ['role_id' => $role['id'], 'college_id' => $college['id']]));
                    }
                }else{
                    $data->roles()->create(array_merge($request->all(), ['role_id' => $role['id']]));
                }
            }
            return $data;
        });

        return back()->with([
            'message' => 'User created successfully. Thanks',
            'data' => new StaffResource($data),
            'type' => 'bxs-check-circle'
        ]); 
    }
}
