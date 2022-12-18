<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Motel;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class MotelController extends Controller
{
    private $motel;
    private $user;
    private $profile;

    public function __construct(Motel $motel, User $user, Profile $profile)
    {
        $this->motel = $motel;
        $this->user = $user;
        $this->profile = $profile;
    }

    public function index()
    {
        $motels = $this->motel->latest()->simplePaginate(2);
        return view('client.pages.motel.index', compact('motels'));
    }

    public function detail($id)
    {
        $motel = $this->motel->find($id);
        $user = $this->user->find($motel->user_id);
        $profile = $this->profile->find($user->profile)->first();
        return view('client.pages.motel.detail', compact('motel',  'user', 'profile'));
    }
}
