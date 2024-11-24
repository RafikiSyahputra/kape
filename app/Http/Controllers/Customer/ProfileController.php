<?php

namespace App\Http\Controllers\Customer;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UpdateProfilRequest;

class ProfileController extends Controller
{
    //index
    public function index()
    {
        return view('customer.profile.index');
    }

    // Update Profile
    public function updateProfile(UpdateProfilRequest $request, $id)
    {
        $foto = $request->file('foto');
        if ($foto) {
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'public/images/foto_profile';
            $foto->storeAs($tujuan_upload, $nama_foto);
        }

        if ($request->password) {
            $password = Hash::make($request->password);
        }
        $profile = User::findOrFail($id);
        $profile->name      = $request->name;
        $profile->email     = $request->email;
        $profile->alamat    = $request->alamat;
        $profile->no_telp = '62' . ltrim($request->no_telp, '0'); // Tambahkan 62 di depan nomor
        $profile->foto      = $nama_foto ?? Auth::user()->foto;
        $profile->password  = $password ?? Auth::user()->password;
        $profile->save();

        Session::flash('success', 'Data profile berhasil diupdate !');
        return back();
    }
}
