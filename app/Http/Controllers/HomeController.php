<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Label84\HoursHelper\Facades\HoursHelper;
use App\Http\Resources\NameResource;
use App\Http\Resources\UserResource;

class HomeController extends Controller
{
    public function index(){
        $user = [];
        if(\Auth::user()->role == 'Student'){
            $user = User::with('profile','info','student','scholastic','health','family','education','languages')
            ->where('id',\Auth::user()->id)->first();
            $user = new UserResource($user);

            $pending = Appointment::where('student_id',\Auth::user()->id)->where('status_id',114)->count();
            $upcoming = Appointment::where('student_id',\Auth::user()->id)->where('status_id',115)->count();
            $completed = Appointment::where('student_id',\Auth::user()->id)->where('status_id',116)->count();
            $total = $pending+$upcoming+$completed;
            $counts = [
                'Total Appointments' => $total,
                'Pending Appointments' => $pending,
                'Upcoming Appointments' => $upcoming
            ];

            return inertia('Home/Index',['user' => $user, 'counts' => $counts]);
        }
        else if(\Auth::user()->role == 'Staff'){
            $is_secretary = false;
            foreach(\Auth::user()->staffs as $staff){
                if($staff->role_id == 4){
                    $is_secretary = true;
                }
            }

            if($is_secretary){
                $pending = Appointment::where('status_id',114)->count();
                $upcoming = Appointment::where('status_id',115)->count();
                $completed = Appointment::where('status_id',116)->count();
                $total = $pending+$upcoming+$completed;
    
                $counts = [
                    'Total Appointments' => $total,
                    'Pending Appointments' => $pending,
                    'Upcoming Appointments' => $upcoming
                ];

                return inertia('Home/Secretary',['user' => $counts]);
            }else{
                $pending = Appointment::where('counselor_id',\Auth::user()->id)->where('status_id',114)->count();
                $upcoming = Appointment::where('counselor_id',\Auth::user()->id)->where('status_id',115)->count();
                $completed = Appointment::where('counselor_id',\Auth::user()->id)->where('status_id',116)->count();
                $total = $pending+$upcoming+$completed;
    
                $counts = [
                    'Total Appointments' => $total,
                    'Pending Appointments' => $pending,
                    'Upcoming Appointments' => $upcoming
                ];
                return inertia('Home/Counselor',['user' => $counts]);
            }
        }
    }

    public function show(Request $request){
        $user_id = $request->counselor;
        $date = $request->date;
        $hours = HoursHelper::create('08:00', '16:00', 60, 'g:i A',[['12:00', '12:59']]);
        
        foreach($hours as $time){
            $d8 = $date.' '.date("H:i:s",strtotime($time));
            $count = Appointment::where('counselor_id',$user_id)->where('date',$d8)->count();
            if($count > 0){
                $status = 0;
            }else{
                $status = 1;
            }

            $data[] = array(
                "time" => $time,
                "value" => $d8,
                "status" => $status
            );
        }

        return $data;
    }

    
}
