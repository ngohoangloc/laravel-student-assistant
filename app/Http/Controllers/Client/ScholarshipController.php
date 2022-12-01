<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\College;
use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    private $college;
    private $scholarship;

    public function __construct(Scholarship $scholarship, College $college)
    {
        $this->scholarship = $scholarship;
        $this->college = $college;
    }

    public function index() {
        $colleges = $this->college->all();
        $scholarships = $this->scholarship->latest()->paginate(5);
        return view('client.pages.scholarship', compact('scholarships', 'colleges'));
    }
}
