<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DiningVenue;
use App\Models\Profile;
use App\Models\User;

class DiningVenueController extends Controller
{
    private $diningVenue;
    private $user;
    private $profile;


    public function __construct(DiningVenue $diningVenue, User $user, Profile $profile)
    {
        $this->diningVenue = $diningVenue;
        $this->user = $user;
        $this->profile = $profile;
    }

    public function index()
    {
        $dV = $this->diningVenue->all();

        return view('client.pages.dining_venue.index', compact('dV'));
    }

    public function detail($id)
    {
        $dv = $this->diningVenue->find($id);
        $user = $this->user->find($dv->user_id);
        $profile = $this->profile->find($user->profile)->first();
        return view('client.pages.dining_venue.detail', compact('dv',  'user', 'profile'));
    }
}
