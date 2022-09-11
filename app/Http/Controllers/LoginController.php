<?php

namespace App\Http\Controllers;

use App\Models\AdminlogModel;
use App\Models\SiswalogModel;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }
    public function loginAdmin()
    {
        return view('login.loginAdmin');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $admin = AdminlogModel::where('username', $credentials['username'])->first();
        $siswa = SiswalogModel::where('username', $credentials['username'])->where('password', md5($credentials['password']))->first();
        // dd($siswa);
        if ($siswa) {
            Auth::guard('websiswa')->login($siswa);
            return redirect()->intended('/');
        }
        if ($admin) {
            if (Auth::guard('webadmin')->attempt(['username' => $request->username, 'password' => $request->password])) {
                $request->session()->regenerate();

                return redirect()->intended('/admin');
            }
        }

        return back()->with('failed', 'Login failed!');
    }
    public function create()
    {
        AdminlogModel::create([
            'username' => 'Admin',
            'password' => bcrypt('adminelibsmk7'),
            'login_terakhir' => date('Y-m-d H:i:s'),
            'level' => '1'
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
