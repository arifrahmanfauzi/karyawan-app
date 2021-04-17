<?php

use Illuminate\Support\Facades\Route;
use App\Models\Karyawan;
use App\Models\Cuti;
use App\Http\Resources\KaryawanResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', function () {
    /*
     *   end point ini untuk API format json
    */

    // return Karyawan::with('cuti')->get();
    $karyawan =  KaryawanResource::collection(Karyawan::with('cuti')->get());
    return response()->json($karyawan, 200);
});

Route::get('/bio', function () {
    return $karyawan = Karyawan::all(['nama','nomor_induk']);
});

Route::get('/cuti/data', function () {
    /*
     *   end point ini untuk API format json
    */

    return response()->json(Cuti::with('karyawan')->get(), 200);
});

Route::post('/cuti', function (Request $request) {
    $cuti = new Cuti;
    $cuti->nomor_induk = $request->nomor_induk;
    $cuti->tanggal_cuti = $request->tanggal_cuti;
    $cuti->lama_cuti = $request->lama_cuti;
    $cuti->keterangan = $request->keterangan;
    $cuti->save();
    
    return response()->json(['success'=> true], 200);
})->name('post.cuti');

Route::get('/pernah-cuti', function () {
    $pernah_cuti = DB::table('view_pernah_cuti')->get();

    return $pernah_cuti;
});

Route::post('/delete/{id}', function ($id) {
    /*
    * delete data karyawan with AJAX
    */
    $delete = Karyawan::find($id)->delete();

    if ($delete) {
        return response()->json(['status'=>'success'], 200);
    } else {
        return response()->json(['status'=>'failed'], 200);
    }
});

Route::get('/karyawan-bergabung', function () {
    $karyawan = Karyawan::select('*')->orderBy('tanggal_bergabung')->limit(3)->get();

    return response()->json($karyawan, 200);
});


Route::post('/dashboard', function (Request $request) {
    $karyawan = new Karyawan;
    $karyawan->nama = $request->nama;
    $karyawan->nomor_induk = $request->nomor_induk;
    $karyawan->alamat = $request->alamat;
    $karyawan->tanggal_lahir = $request->tanggal_lahir;
    $karyawan->tanggal_bergabung = $request->tanggal_bergabung;
    $karyawan->save();

    return redirect('/dashboard')->with('status', 'Data berhasil dimasukkan!');
})->name('post.karyawan');

Route::patch('/update/{id}', function ($id, Request $request) {
    $karyawan = Karyawan::find($id);
    $karyawan->nama = $request->nama;
    $karyawan->nomor_induk = $request->nomor_induk;
    $karyawan->alamat = $request->alamat;
    $karyawan->tanggal_lahir = $request->tanggal_lahir;
    $karyawan->tanggal_bergabung = $request->tanggal_bergabung;
    $karyawan->save();

    if ($karyawan) {
        return response()->json(['status'=>'success'], 200);
    } else {
        return response()->json(['status'=>'failed'], 200);
    }
});

Route::get('/dashboard', function () {
    $karyawan =  KaryawanResource::collection(Karyawan::with('cuti')->get());
    
    $karyawan_pertama = Karyawan::select('*')->orderBy('tanggal_bergabung')->limit(3)->get();
    return view('dashboard', ['karyawan' => $karyawan, 'karyawan_bergabung'=>$karyawan_pertama]);
})->middleware(['auth'])->name('dashboard');

Route::get('/cuti', function () {
    $karyawan = Karyawan::with('cuti')->get();
    $pernah_cuti = DB::table('view_pernah_cuti')->get();
    $pernah_cuti_lebih = DB::table('view_pernah_cuti_lebih')->get();
    $sisa_cuti = DB::table('view_sisa_cuti')->get(['nama','sisa_cuti','nomor_induk']);
    return view('cuti', ['karyawan'=> $karyawan, 'pernah_cuti'=>$pernah_cuti, 'pernah_cuti_lebih'=>$pernah_cuti_lebih,'sisa_cuti'=>$sisa_cuti]);
})->middleware(['auth'])->name('cuti');

require __DIR__.'/auth.php';
