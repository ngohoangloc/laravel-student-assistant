<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\EduCenter;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class EduCenterController extends Controller
{
    private $edu_enter;
    private $user;
    private $profile;

    public function __construct(EduCenter $edu_center, User $user, Profile $profile)
    {
        $this->edu_center = $edu_center;
        $this->user = $user;
        $this->profile = $profile;
    }

    public function index()
    {
        $edu_centers = $this->edu_center->latest()->simplePaginate(2);
        return view('client.pages.edu_center.index', compact('edu_centers'));
    }

    public function detail($id)
    {
        $edu_center = $this->edu_center->find($id);
        $user = $this->user->find($edu_center->user_id);
        $profile = $this->profile->find($user->profile)->first();
        return view('client.pages.edu_center.detail', compact('edu_center',  'user', 'profile'));
    }
}
