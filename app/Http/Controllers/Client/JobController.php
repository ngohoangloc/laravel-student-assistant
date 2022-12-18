<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class JobController extends Controller
{
    private $job;
    private $user;
    private $profile;

    public function __construct(Job $job, User $user, Profile $profile)
    {
        $this->job = $job;
        $this->user = $user;
        $this->profile = $profile;
    }

    public function index()
    {
        $jobs = $this->job->latest()->simplePaginate(2);
        return view('client.pages.job.index', compact('jobs'));
    }

    public function detail($id)
    {
        $job = $this->job->find($id);
        $user = $this->user->find($job->user_id);
        $profile = $this->profile->find($user->profile)->first();
        return view('client.pages.job.detail', compact('job',  'user', 'profile'));
    }
}
