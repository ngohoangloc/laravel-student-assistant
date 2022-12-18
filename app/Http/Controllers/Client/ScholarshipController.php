<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Scholarship;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    private $college;
    private $scholarship;
    private $user;
    private $profile;

    public function __construct(Scholarship $scholarship, College $college, User $user, Profile $profile)
    {
        $this->scholarship = $scholarship;
        $this->college = $college;
        $this->user = $user;
        $this->profile = $profile;
    }

    public function index()
    {
        $colleges = $this->college->all();
        $scholarships = $this->scholarship->latest()->simplePaginate(2);
        return view('client.pages.scholarship.index', compact('scholarships', 'colleges'));
    }

    public function detail($id)
    {
        $scholarship = $this->scholarship->find($id);
        $college = $this->college->find($scholarship->college_id);
        $user = $this->user->find($scholarship->user_id);
        $profile = $this->profile->find($user->profile)->first();
        return view('client.pages.scholarship.detail', compact('scholarship', 'college', 'user', 'profile'));
    }
}
