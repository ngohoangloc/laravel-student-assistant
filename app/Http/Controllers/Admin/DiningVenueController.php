<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits;
use App\Models\Image;
use App\Models\DiningVenue;

class DiningVenueController extends Controller
{
    use Traits\StorageImageTrait;

    private $dining_venue;
    private $image;

    public function __construct(DiningVenue $dining_venue, Image $image)
    {
        $this->dining_venue = $dining_venue;
        $this->image = $image;
    }

    public function index()
    {
        $dining_venues = $this->dining_venue->latest()->simplePaginate(5);
        $images = $this->image->whereNotNull('dining_venue_id')->get();
        return view('admin.pages.dining_venue.index', compact('dining_venues', 'images'));
    }

    public function create()
    {
        return view('admin.pages.dining_venue.add');
    }

    public function store(Request $request)
    {
        $dataCreate = [
            'venue_name' => $request->venue_name,
            'address' => $request->address,
            'description' => $request->description,
            'user_id' => session()->get('user_id'),
        ];

        $dataUploadImages = $this->storageTraitUpload($request, 'thumbnail_image_path', 'dining_venue');
        if (!empty($dataUploadImages)) {
            $dataCreate['thumbnail_image_name'] = $dataUploadImages['file_name'];
            $dataCreate['thumbnail_image_path'] = $dataUploadImages['file_path'];
        }

        $dining_venue = $this->dining_venue->create($dataCreate);

        //Insert to dining_venue_images
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItiem) {
                $dataImageDetail = $this->storageTraitUploadMultiple($fileItiem, 'dining_venue');
                $dining_venue->images()->create([
                    'image_path' => $dataImageDetail['file_path'],
                    'image_name' => $dataImageDetail['file_name']

                ]);
            }
        }

        return redirect()->route('dining_venues.index');
    }

    public function edit($id)
    {
        $dining_venue = $this->dining_venue->find($id);
        $images = $this->image->whereNotNull('dining_venue_id')->get();

        return view('admin.pages.dining_venue.edit', compact('dining_venue', 'images'));
    }

    public function update($id, Request $request)
    {
        $dataCreate = [
            'venue_name' => $request->venue_name,
            'address' => $request->address,
            'description' => $request->description,
            'user_id' => session()->get('user_id'),
        ];

        $dataUploadImages = $this->storageTraitUpload($request, 'thumbnail_image_path', 'dining_venue');
        if (!empty($dataUploadImages)) {
            $dataCreate['thumbnail_image_name'] = $dataUploadImages['file_name'];
            $dataCreate['thumbnail_image_path'] = $dataUploadImages['file_path'];
        }

        $this->dining_venue->find($id)->update($dataCreate);
        $dining_venue = $this->dining_venue->find($id);

        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItiem) {
                $dataImageDetail = $this->storageTraitUploadMultiple($fileItiem, 'dining_venue');
                $dining_venue->images()->create([
                    'image_path' => $dataImageDetail['file_path'],
                    'image_name' => $dataImageDetail['file_name']

                ]);
            }
        }

        return redirect()->route('dining_venues.index');
    }

    public function delete($id)
    {
        $this->dining_venue->find($id)->delete();
        return redirect()->route('dining_venues.index');
    }
}
