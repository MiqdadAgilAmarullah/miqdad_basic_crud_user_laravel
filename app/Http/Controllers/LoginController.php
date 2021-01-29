<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\User;
class LoginController extends Controller
{
    public function loginProses(Request $request)
    {
        $user = USER::where('email', $request->email)->first();
        if ($user) {
            $pass_decrypted = Crypt::decryptString( $user->password);
            if ($request->password == $pass_decrypted ) {
                session([
                    'name' => $user->name,
                    'email' => $user->email,
                ]);
                return redirect('/dashboard');
            }
            return redirect('/')->with('message', 'maaf, password salah !');
        }else{
            return redirect('/')->with('message', $request->email.' tidak terdafar !');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('name');
        return redirect("/");
    }
}
