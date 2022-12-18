<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\College;
use App\Models\EduCenter;
use App\Models\Job;
use App\Models\Motel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(Scholarship $scholarship, College $college)
    {
        $this->scholarship = $scholarship;
        $this->college = $college;
    }

    public function searchScholarship(Request $request)
    {
        if ($request->scholarship_name) {
            $colleges = $this->college->all();
            $scholarships = Scholarship::where('name', 'LIKE', '%' . $request->scholarship_name . '%')->latest()->simplePaginate(5);
            return view('client.pages.scholarship.index', compact('scholarships', 'colleges'));
        }
        else
        {
            return redirect()->back()->with('message','Empty Search');
        }
    }

    public function searchMotel(Request $request)
    {
        if ($request->motel_name) {
            $motels = Motel::where('motel_name', 'LIKE', '%' . $request->motel_name . '%')->latest()->simplePaginate(5);
            return view('client.pages.motel.index', compact('motels'));
        }
        else
        {
            return redirect()->back()->with('message','Empty Search');
        }
    }
    public function searchEduCenter(Request $request)
    {
        if ($request->center_name) {
            $edu_centers = EduCenter::where('center_name', 'LIKE', '%' . $request->center_name . '%')->latest()->simplePaginate(5);
            return view('client.pages.edu_center.index', compact('edu_centers'));
        }
        else
        {
            return redirect()->back()->with('message','Empty Search');
        }
    }

    public function searchJob(Request $request)
    {
        if ($request->job_name) {
            $jobs = Job::where('name', 'LIKE', '%' . $request->job_name . '%')->latest()->simplePaginate(5);
            return view('client.pages.job.index', compact('jobs'));
        }
        else
        {
            return redirect()->back()->with('message','Empty Search');
        }
    }
}
