<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'username' => 'sometimes|required|string|max:150|unique:users,username,'.$this->id,
            'email' => 'sometimes|required|email|max:150|unique:users,email,'.$this->id,
            'firstname' => 'sometimes|required|string|max:100',
            'lastname' => 'sometimes|required|string|max:100',
            'middlename' => 'sometimes|required|string|max:20',
            'gender' => 'sometimes|required',
            'birthday' => 'sometimes|required',
            'birth_place' => 'sometimes|required',
            'mobile' => 'sometimes|required',
            'img' => 'nullable|image64:jpeg,jpg,png',
            'living_id' => 'sometimes|required',
            'ethnic_id' => 'sometimes|required',
            'sex_id' => 'sometimes|required',
            'civil_id' => 'sometimes|required',
            'religion_id' => 'sometimes|required',
            'course_id' => 'sometimes|required',
            'year_id' => 'sometimes|required',
            'languages' => 'required|array|min:1',
            'emergency.name' => 'sometimes|required',
            'emergency.relation' => 'sometimes|required',
            'emergency.address' => 'sometimes|required',
            'emergency.contact' => 'sometimes|required',
            'city.name' => 'sometimes|required',
            'city.telephone' => 'sometimes|nullable',
            'city.mobile' => 'sometimes|required',
            'province.name' => 'sometimes|required',
            'province.telephone' => 'sometimes|nullable',
            'province.mobile' => 'sometimes|nullable',
            'gradeschool.name' => 'sometimes|required',
            'gradeschool.address' => 'sometimes|required',
            'gradeschool.graduated' => 'sometimes|required',
            'gradeschool.gpa' => 'sometimes|required',
            'highschool.name' => 'sometimes|required',
            'highschool.address' => 'sometimes|required',
            'highschool.graduated' => 'sometimes|required',
            'highschool.gpa' => 'sometimes|required',
            'college.name' => 'sometimes|required',
            'college.address' => 'sometimes|required',
            'college.graduated' => 'sometimes|required',
            'college.gpa' => 'sometimes|required',
            'height' => 'sometimes|required',
            'weight' => 'sometimes|required',
            'disabilities' => 'sometimes|nullable',
            'doyous' => 'required|array|min:'.$this->d,
            'haveyous' => 'required|array|min:'.$this->h,
            'parent' => 'sometimes|required',
            'structure' => 'sometimes|required',
            'father.name' => 'sometimes|required',
            'father.religion' => 'sometimes|required',
            'father.occupation' => 'sometimes|required',
            'father.age' => 'sometimes|required',
            'father.living' => 'sometimes|required',
            'mother.name' => 'sometimes|required',
            'mother.religion' => 'sometimes|required',
            'mother.occupation' => 'sometimes|required',
            'mother.age' => 'sometimes|required',
            'mother.living' => 'sometimes|required',
            'helped' => 'sometimes|required',
            'support' => 'sometimes|required',
        ];


        foreach($this->choices as $key => $a) {
            if ( array_key_exists('id', $a) && $a['id'] ) { // if have an id, means an update, so add the id to ignore
                // $rules = array_merge($rules, ['lists.'.$key.'.name' => 'required|unique:subspecializations,name,'.$staff['id']]);
            } else {  // just check if the email it's not unique
                $rules = array_merge($rules, ['choices.'.$key.'.choice' => 'required']);
                $rules = array_merge($rules, ['choices.'.$key.'.reason' => 'required']);
            }
        }

        foreach($this->preferences as $key => $a) {
            if ( array_key_exists('id', $a) && $a['id'] ) { // if have an id, means an update, so add the id to ignore
                // $rules = array_merge($rules, ['lists.'.$key.'.name' => 'required|unique:subspecializations,name,'.$staff['id']]);
            } else {  // just check if the email it's not unique
                $rules = array_merge($rules, ['preferences.'.$key.'.name' => 'required']);
                $rules = array_merge($rules, ['preferences.'.$key.'.reason' => 'required']);
            }
        }

        return $rules;
    }
}
