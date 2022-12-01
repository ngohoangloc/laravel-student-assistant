<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.pages.scholarship.index', compact('scholarships', 'colleges'));
    }

    public function create()
    {
        $colleges = $this->college->all();
        return view('admin.pages.scholarship.add', compact('colleges'));
    }

    public function store(Request $request)
    {
        $this->scholarship->create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'value' => $request->value,
            'description' => $request->description,
            'documents' => $request->documents,
            'application_deadline' => $request->application_deadline,
            'user_id' => 1,
            'college_id' => $request->college_id,
        ]);
        return redirect()->route('scholarships.index');
    }

    public function edit($id)
    {
        $scholarship = $this->scholarship->find($id);
        $colleges = $this->college->all();

        return view('admin.pages.scholarship.edit',compact('scholarship', 'colleges'));
    }

    public function update($id, Request $request)
    {
        $this->scholarship->find($id)->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'value' => $request->value,
            'description' => $request->description,
            'documents' => $request->documents,
            'application_deadline' => $request->application_deadline,
            'user_id' => 1,
            'college_id' => $request->college_id,
        ]);
        return redirect()->route('scholarships.index');
    }

    public function delete($id)
    {
        $this->scholarship->find($id)->delete();
        return redirect()->route('scholarships.index');
    }
}
