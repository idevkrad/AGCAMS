<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\Dropdown;
use App\Models\College;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Inertia\Middleware;
use App\Http\Resources\LoginResource;
use App\Http\Resources\NameResource;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => (\Auth::check()) ? new LoginResource(\Auth::user()) : '',
            'flash' => [
                'message' => session('message'),
                'datares' => session('data'),
                'type' => session('type')
            ],
            'dropdowns' => Dropdown::all(),
            'colleges' => College::all(),
            'courses' => Course::all(),
            'questions' => Question::all(),
            'counselors' => NameResource::collection(User::with('profile')->whereHas('staffs',function ($query) {$query->whereIn('role_id',[2,3]);})->get())
        ]);
    }
}
