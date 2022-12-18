<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

use App\Traits;

use App\Models\Motel;

class MotelController extends Controller
{
    use Traits\StorageImageTrait;

    private $motel;
    private $image;

    public function __construct(Motel $motel, Image $image)
    {
        $this->motel = $motel;
        $this->image = $image;
    }

    public function index()
    {
        $motels = $this->motel->latest()->simplePaginate(5);
        return view('admin.pages.motel.index', compact('motels'));
    }

    public function create()
    {
        return view('admin.pages.motel.add');
    }

    public function store(Request $request)
    {
        $dataCreate = [
            'motel_name' => $request->motel_name,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'price' => $request->price,
            'status' => $request->status,
            'address' => $request->address,
            'description' => $request->description,
            'user_id' => session()->get('user_id'),
        ];

        $dataUploadImages = $this->storageTraitUpload($request, 'thumbnail_image_path', 'motel');
        if (!empty($dataUploadImages)) {
            $dataCreate['thumbnail_image_name'] = $dataUploadImages['file_name'];
            $dataCreate['thumbnail_image_path'] = $dataUploadImages['file_path'];
        }

        $motel = $this->motel->create($dataCreate);

        //Insert to motel_images
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItiem) {
                $dataImageDetail = $this->storageTraitUploadMultiple($fileItiem, 'motel');
                $motel->images()->create([
                    'image_path' => $dataImageDetail['file_path'],
                    'image_name' => $dataImageDetail['file_name']

                ]);
            }
        }

        return redirect()->route('motels.index');
    }

    public function edit($id)
    {
        $motel = $this->motel->find($id);
        $images = $this->image->whereNotNull('motel_id')->get();

        return view('admin.pages.motel.edit', compact('motel', 'images'));
    }

    public function update($id, Request $request)
    {

        $dataCreate = [
            'motel_name' => $request->motel_name,
            'owner_name' => $request->owner_name,
            'owner_phone' => $request->owner_phone,
            'price' => $request->price,
            'status' => $request->status,
            'address' => $request->address,
            'description' => $request->description,
            'user_id' => session()->get('user_id'),
        ];

        $dataUploadImages = $this->storageTraitUpload($request, 'thumbnail_image_path', 'motel');
        if (!empty($dataUploadImages)) {
            $dataCreate['thumbnail_image_name'] = $dataUploadImages['file_name'];
            $dataCreate['thumbnail_image_path'] = $dataUploadImages['file_path'];
        }

        $this->motel->find($id)->update($dataCreate);
        $motel = $this->motel->find($id);

        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItiem) {
                $dataImageDetail = $this->storageTraitUploadMultiple($fileItiem, 'motel');
                $motel->images()->create([
                    'image_path' => $dataImageDetail['file_path'],
                    'image_name' => $dataImageDetail['file_name']

                ]);
            }
        }

        return redirect()->route('motels.index');
    }

    public function delete($id)
    {
        $this->motel->find($id)->delete();
        return redirect()->route('motels.index');
    }
}
