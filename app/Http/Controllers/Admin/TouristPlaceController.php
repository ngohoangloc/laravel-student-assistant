<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits;
use App\Models\Image;
use App\Models\TouristPlace;

class TouristPlaceController extends Controller
{
    use Traits\StorageImageTrait;

    private $tourist_place;
    private $image;

    public function __construct(TouristPlace $tourist_place, Image $image)
    {
        $this->tourist_place = $tourist_place;
        $this->image = $image;
    }

    public function index()
    {
        $tourist_places = $this->tourist_place->latest()->simplePaginate(5);
        $images = $this->image->whereNotNull('tourist_place_id')->get();
        return view('admin.pages.tourist_place.index', compact('tourist_places', 'images'));
    }

    public function create()
    {
        return view('admin.pages.tourist_place.add');
    }

    public function store(Request $request)
    {
        $dataCreate = [
            'place_name' => $request->place_name,
            'address' => $request->address,
            'description' => $request->description,
            'user_id' => session()->get('user_id'),
        ];

        $dataUploadImages = $this->storageTraitUpload($request, 'thumbnail_image_path', 'tourist_place');
        if (!empty($dataUploadImages)) {
            $dataCreate['thumbnail_image_name'] = $dataUploadImages['file_name'];
            $dataCreate['thumbnail_image_path'] = $dataUploadImages['file_path'];
        }

        $tourist_place = $this->tourist_place->create($dataCreate);

        //Insert to tourist_place_images
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItiem) {
                $dataImageDetail = $this->storageTraitUploadMultiple($fileItiem, 'tourist_place');
                $tourist_place->images()->create([
                    'image_path' => $dataImageDetail['file_path'],
                    'image_name' => $dataImageDetail['file_name']

                ]);
            }
        }

        return redirect()->route('tourist_places.index');
    }

    public function edit($id)
    {
        $tourist_place = $this->tourist_place->find($id);
        $images = $this->image->whereNotNull('tourist_place_id')->get();

        return view('admin.pages.tourist_place.edit', compact('tourist_place', 'images'));
    }

    public function update($id, Request $request)
    {
        $dataCreate = [
            'place_name' => $request->venue_name,
            'address' => $request->address,
            'description' => $request->description,
            'user_id' => session()->get('user_id'),
        ];

        $dataUploadImages = $this->storageTraitUpload($request, 'thumbnail_image_path', 'tourist_place');
        if (!empty($dataUploadImages)) {
            $dataCreate['thumbnail_image_name'] = $dataUploadImages['file_name'];
            $dataCreate['thumbnail_image_path'] = $dataUploadImages['file_path'];
        }

        $this->tourist_place->find($id)->update($dataCreate);
        $tourist_place = $this->tourist_place->find($id);

        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItiem) {
                $dataImageDetail = $this->storageTraitUploadMultiple($fileItiem, 'tourist_place');
                $tourist_place->images()->create([
                    'image_path' => $dataImageDetail['file_path'],
                    'image_name' => $dataImageDetail['file_name']

                ]);
            }
        }

        return redirect()->route('tourist_places.index');
    }

    public function delete($id)
    {
        $this->tourist_place->find($id)->delete();
        return redirect()->route('tourist_places.index');
    }
}
