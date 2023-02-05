<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Label84\HoursHelper\Facades\HoursHelper;
use App\Http\Requests\AppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Http\Resources\CalendarResource;

class AppointmentController extends Controller
{
    public function index(Request $request){
        if($request->lists == 'Calendar'){
            $query = Appointment::query();
            $query->with('status','method','purpose','student.profile','counselor.profile');
            if(\Auth::user()->role == 'Student'){
                $query->where('student_id',\Auth::user()->id);
            }
            $data =$query->get();
            $data = CalendarResource::collection($data);
            return $data;
        }else if($request->lists){
            $query = Appointment::query();
            $query->with('status','method','purpose','student.profile','counselor.profile','note');
            if(\Auth::user()->role == 'Student'){
                $query->where('student_id',\Auth::user()->id);
                ($request->status == 115) ? $query->where('status_id',$request->status) : '';
                $query->orderBy('id','desc');
            }
            if(\Auth::user()->role == 'Staff'){
                if($request->status == 'secretary'){

                }else{
                    $query->where('counselor_id',\Auth::user()->id);
                    ($request->status != '') ? $query->where('status_id',$request->status) : '';
                }
                ($request->status == 114 || $request->status == 115) ? $query->orderBy('date','asc') : $query->orderBy('date','desc');
            }
            if($request->count == 0){
                $data = $query->get();
            }else{
                $data = $query->paginate($request->count);
            }
            $data = AppointmentResource::collection($data);
            return $data;
        }else{
            return inertia('Modules/Appointments/Index');
        }
    }

    public function store(AppointmentRequest $request){
        $data = \DB::transaction(function () use ($request){
            $data = Appointment::create(array_merge($request->all(), ['student_id' => \Auth::user()->id, 'status_id' => 114]));
            return $data;
        });

        return back()->with([
            'message' => 'Appointment created successfully. Thanks',
            'data' => new AppointmentResource($data),
            'type' => 'bxs-check-circle'
        ]); 
    }

    public function update(Request $request){
        $data = \DB::transaction(function () use ($request){
            $data = Appointment::findOrFail($request->id);
            if($request->type == 'Approve'){
                $data->status_id = 115;
            }else if($request->type == 'Cancel'){
                $data->status_id = 117;
            }else if($request->type == 'Complete'){
                $validated = $request->validate([
                    'concern' => 'required',
                    'intervention' => 'required',
                ]);
                $data->note()->create($request->all());
                $data->status_id = 116;
            }
            $data->save();

            $data = Appointment::findOrFail($request->id);
            return $data;
        });

        return back()->with([
            'message' => 'Appointment updated successfully. Thanks',
            'data' => new AppointmentResource($data),
            'type' => 'bxs-check-circle'
        ]); 
    }

    public function show(){
        return inertia('Modules/Appointments/Calendar');
    }
}
