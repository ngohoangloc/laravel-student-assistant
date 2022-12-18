<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    private $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function index() {
        $jobs = $this->job->latest()->simplePaginate(5);
        return view('admin.pages.job.index', compact('jobs'));
    }

    public function create()
    {
        return view('admin.pages.job.add');
    }

    public function store(Request $request)
    {
        $this->job->create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'job_type' => $request->job_type,
            'job_level' => $request->job_level,
            'salary' => $request->salary,
            'user_id' => session()->get('user_id'),
            'job_description' => $request->job_description,
            'job_requirement' => $request->job_requirement,

        ]);
        return redirect()->route('jobs.index');
    }

    public function edit($id)
    {
        $job = $this->job->find($id);

        return view('admin.pages.job.edit',compact('job'));
    }

    public function update($id, Request $request)
    {
        $this->job->find($id)->update([
            'name' => $request->name,
            'company' => $request->company_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'job_type' => $request->job_type,
            'job_level' => $request->job_level,
            'salary' => $request->salary,
            'user_id' => session()->get('user_id'),
            'job_description' => $request->job_description,
            'job_requirement' => $request->job_requirement,
        ]);
        return redirect()->route('jobs.index');
    }

    public function delete($id)
    {
        $this->job->find($id)->delete();
        return redirect()->route('jobs.index');
    }
}
