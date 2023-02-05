<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Resources\UserResource;

class StudentController extends Controller
{
    public function index(Request $request){
        if($request->search){
            $data = UserResource::collection(
                User::query()
                ->with('profile','info','student','scholastic','health','family','education','languages')
                ->when($request->keyword, function ($query, $keyword) {
                    $query->whereHas('profile',function ($query) use ($keyword) {
                        $query->where(\DB::raw('concat(firstname," ",lastname)'), 'LIKE', "%{$keyword}%")
                        ->orWhere(\DB::raw('concat(lastname," ",firstname)'), 'LIKE', "%{$keyword}%");
                    })->orWhere(function ($query) use ($keyword) {
                        $query->where('username', 'LIKE', "%{$keyword}%")->where('role','Student');
                    });
                })
                ->where('role','Student')
                ->paginate($request->count)
                ->withQueryString()
            );
            return $data;
        }else{
            return inertia('Modules/Students/Index');
        }
    }

    public function create(){
        return inertia('Modules/Students/Create');
    }

    public function store(StudentRequest $request){
        $data = \DB::transaction(function () use ($request){
            $data = User::create(array_merge($request->all(), ['role' => 'Student','password' => bcrypt('adzuagcams')]));
            $data->profile()->create($request->all());
            $address = [
                'city' => $request->city,
                'province' => $request->province,
            ];

            $information = [
                'emergency' => $request->emergency,
                'address' => $address
            ];
            $data->info()->create(array_merge($request->all(),['information' =>  json_encode($information)]));
            $data->student()->create(array_merge($request->all(),['status_id' => 98]));

            $schools = [
                'gradeschool' => $request->gradeschool,
                'highschool' => $request->highschool,
                'college' => $request->college,
            ];

            $awards = [];

            $data->scholastic()->create(array_merge($request->all(),['schools' =>  json_encode($schools),'awards' =>  json_encode($awards)]));

            $data->health()->create(array_merge($request->all(),[
                'doyous' =>  json_encode($request->doyous),
                'haveyous' =>  json_encode($request->haveyous)
            ]));
            $data->family()->create(array_merge($request->all(),[
                'father' =>  json_encode($request->father),
                'mother' =>  json_encode($request->mother),
                'spouse' =>  json_encode($request->spouse),
                'siblings' =>  json_encode($request->siblings),
                'childrens' =>  json_encode($request->childrens)
            ]));
            $data->education()->create(array_merge($request->all(),[
                'choices' =>  json_encode($request->choices),
                'decided' =>  json_encode($request->decided),
                'preferences' =>  json_encode($request->preferences)
            ]));

            foreach($request->languages as $language) {
                $data->languages()->create(array_merge($request->all(), ['language_id' => $language['id']]));
            }

            if($request->img != ''){
                $data1 = $request['img'];
                $img = explode(',', $data1);
                $ini =substr($img[0], 11);
                $type = explode(';', $ini);
                if($type[0] == 'png'){
                    $image = str_replace('data:image/png;base64,', '', $data1);
                }else{
                    $image = str_replace('data:image/jpeg;base64,', '', $data1);
                }
                $image = str_replace(' ', '+', $image);
                $imageName = $request->username.'.'.$type[0];
                
                if(\File::put(public_path('images/avatars'). '/' . $imageName, base64_decode($image))){
                    $data->avatar = $imageName;
                    $data->save();
                    
                    return $data;
                }
            }

            return $data;
        });
    }

    public function show($id){
        $user = User::with('profile','info','student','scholastic','health','family','education','languages')
        ->where('id',\Auth::user()->id)->first();
        $user = new UserResource($user);

        return inertia('Modules/Students/Profile',['u' => $user]);
    }
}
