<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    
    public function data()
    {
        $users = DB::table('users')->get();
        return view('user.user', compact('users'));
    }

    public function add()
    {
        return view('user.add');
    }

    public function addUser(Request $request)
    {
        // generate token 
        function quickRandom($length = 16)
        {
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
        }
        // check already exist
        $user = DB::table('users')->where('email', $request->email)->exists();
        
        if ($user == false) {
            # code...
            DB::table('users')->insert([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Crypt::encryptString($request->password) ,
                'remember_token' => quickRandom(),
            ]);
            return redirect('user')->with('status', 'user berhasil ditambah!');
        }else{
            return redirect('user')->with('status_gagal', $request->email.' sudah terdaftar! mohon masukan email baru');
        }
    }

    public function editUser($id)
    {
        // decrypt id user
        $decrypted_id = Crypt::decryptString($id);
        // ambil data sesuai id
        $users = DB::table('users')->where('id', $decrypted_id)->first();
        return view('user/edit',compact('users') );
    }

    public function editProses(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
        ]);
        return redirect('user')->with('status', 'user berhasil diupdate!');
    }

    public function editUserModal(Request $request)
    {
        $decrypted_id = Crypt::decryptString($request->id);

        DB::table('users')->where('id', $decrypted_id )->update([
            'email' => $request->email,
            'name' => $request->name,
            'password' => $request->password,
        ]);
        return redirect('user')->with('status', 'user berhasil diupdate!');
    }

    public function deleteUser(Request $request, $id)
    {
         // decrypt id user
        $decrypted_id = Crypt::decryptString($id);
        // delete
        DB::table('users')->where('id', $decrypted_id)->delete();
        return redirect('user')->with('status', 'user berhasil dihapus!');
    }
}
