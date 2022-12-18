<?php
namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\TouristPlace;
use App\Models\User;

class TouristPlaceController extends Controller
{
    private $tourisPlace;
    private $user;
    private $profile;


    public function __construct(TouristPlace $tourisPlace, User $user, Profile $profile)
    {
        $this->tourisPlace = $tourisPlace;
        $this->user = $user;
        $this->profile = $profile;

    }

    public function index()
    {
        $tP = $this->tourisPlace->all();

        return view('client.pages.tourist_place.index', compact('tP') );
    }

    public function detail($id)
    {
        $tp = $this->tourisPlace->find($id);
        $user = $this->user->find($tp->user_id);
        $profile = $this->profile->find($user->profile)->first();
        return view('client.pages.tourist_place.detail', compact('tp', 'user', 'profile'));
    }


}
