<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EduCenter;
use App\Models\Image;
use Illuminate\Http\Request;

use App\Traits;

class EduCenterController extends Controller
{
    use Traits\StorageImageTrait;

    private $edu_center;
    private $image;

    public function __construct(EduCenter $edu_center, Image $image)
    {
        $this->edu_center = $edu_center;
        $this->image = $image;
    }

    public function index()
    {
        $edu_centers = $this->edu_center->latest()->simplePaginate(5);
        $images = $this->image->whereNotNull('edu_center_id')->get();
        return view('admin.pages.edu_center.index', compact('edu_centers', 'images'));
    }

    public function create()
    {
        return view('admin.pages.edu_center.add');
    }

    public function store(Request $request)
    {
        $dataCreate = [
            'center_name' => $request->center_name,
            'address' => $request->address,
            'center_phone' => $request->center_phone,
            'center_website' => $request->center_website,
            'description' => $request->description,
            'user_id' => session()->get('user_id'),
        ];

        $dataUploadImages = $this->storageTraitUpload($request, 'thumbnail_image_path', 'edu_center');
        if (!empty($dataUploadImages)) {
            $dataCreate['thumbnail_image_name'] = $dataUploadImages['file_name'];
            $dataCreate['thumbnail_image_path'] = $dataUploadImages['file_path'];
        }

        $edu_center = $this->edu_center->create($dataCreate);

        //Insert to edu_center_images
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItiem) {
                $dataImageDetail = $this->storageTraitUploadMultiple($fileItiem, 'edu_center');
                $edu_center->images()->create([
                    'image_path' => $dataImageDetail['file_path'],
                    'image_name' => $dataImageDetail['file_name']

                ]);
            }
        }

        return redirect()->route('edu_centers.index');
    }

    public function edit($id)
    {
        $edu_center = $this->edu_center->find($id);
        $images = $this->image->whereNotNull('edu_center_id')->get();

        return view('admin.pages.edu_center.edit', compact('edu_center', 'images'));
    }

    public function update($id, Request $request)
    {
        $this->edu_center->find($id)->update([
            'center_name' => $request->center_name,
            'address' => $request->address,
            'center_phone' => $request->center_phone,
            'center_website' => $request->center_website,
            'description' => $request->description,
            'user_id' => session()->get('user_id'),
        ]);
        return redirect()->route('edu_centers.index');
    }

    public function delete($id)
    {
        $this->edu_center->find($id)->delete();
        return redirect()->route('edu_centers.index');
    }
}
