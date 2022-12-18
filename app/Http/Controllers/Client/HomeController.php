<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\EduCenter;
use App\Models\Profile;
use App\Models\Scholarship;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $college;
    private $scholarship;
    private $edu_center;
    private $user;
    private $profile;

    public function __construct(Scholarship $scholarship, College $college, User $user, Profile $profile, EduCenter $edu_center)
    {
        $this->scholarship = $scholarship;
        $this->college = $college;
        $this->user = $user;
        $this->profile = $profile;
        $this->edu_center = $edu_center;
    }

    public function index()
    {
        $scholarships = $this->scholarship->latest()->get();
        $edu_centers = $this->edu_center->latest()->get();
        return view('client.pages.home', compact('scholarships', 'edu_centers'));
    }
}
