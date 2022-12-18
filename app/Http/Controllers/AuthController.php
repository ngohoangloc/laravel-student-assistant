<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Major;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private $user;
    private $college;
    private $profile;

    public function __construct(User $user, College $college, Profile $profile)
    {
        $this->user = $user;
        $this->college = $college;
        $this->profile = $profile;
    }


    public function login()
    {
        if (session()->has('user'))
            return redirect('/');
        else
            return view('auth.login');
    }

    public function checkLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'username' => $validated['username'],
            'password' => $validated['password'],
        ];

        $user = $this->user->where('username', $credentials['username'])->first();

        if (!empty($user))
            if (Hash::check($credentials['password'], $user->password)) {
                session()->put('user', $user->username);
                session()->put('user_id', $user->id);
                session()->put('role', $user->role_id);

                return redirect('/')->with('success', 'Đăng nhập thành công!');
            } else {
                return redirect('/login')->with('warning', 'Mật khẩu không chính xác!');
            }
        else {
            return redirect('/login')->with('warning', 'Tài khoản không tồn tại!');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login')->with('warning', 'Đã đăng xuất tài khoản!');
    }

    public function showRegister()
    {
        $colleges = $this->college->all();
        if (session()->has('user'))
            return redirect('/');
        else
            return view('auth.register', compact('colleges'));
    }

    public function register(Request $request)
    {

        $validated = $request->validate([
            'email' => 'required|unique:users|email:rfc,dns',
            'name' => 'required|max:50',
            'username' => 'required|unique:users,username|max:20|min:5',
            'major' => 'required',
            'password' => 'required|min:5|max:20',
            'password_confirm' => 'required|same:password',
        ]);

        $credentials = [
            'email' => $validated['email'],
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'role_id' => 2,
        ];

        $user = $this->user->create($credentials);

        $this->profile->create([
            'name' => $validated['name'],
            'major_id' => $validated['major'],
            'user_id' => $user->id,
        ]);

        return redirect('/login')->with('success', 'Đăng ký thành công!');;
    }

    public function showMajorsInCollege(Request $request)
    {
        if ($request->ajax()) {
            $majors = Major::whereCollegeId($request->college_id)->select('id', 'name')->get();
            return response()->json($majors);
        }
    }
}
