<?php

namespace App\Http\Controllers;

use App\Http\Requests\PembeliRequest;
use App\Models\Pembeli;
use App\Models\Member;

class PembeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pembeli::join('member', 'pembeli.id_member', '=', 'member.id')->select('pembeli.*', 'member.nama','member.alamat','member.tlp')->orderBy('member.nama')->get();

        $member = Member::orderBy('nama')->get();

        return view('pembeli.index')->with([
            'items' => $items,
            'member' => $member
        ]);
    }
    
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePembeliRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembeliRequest $request)
    {
        $data = $request->all();

        Pembeli::create($data);
        return redirect()->back()->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function show(Pembeli $pembeli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembeli $pembeli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembeli$pembeliRequest  $request
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function update(PembeliRequest $request, $id)
    {
        $data = $request->all();
        $items = Pembeli::findOrFail($id);
        $items->update($data);
        return redirect()->back()->with('message', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembeli  $pembeli
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Pembeli::findOrFail($id);
        $items->delete();
        return redirect()->back()->with('message', 'Data berhasil ditambahkan!');
    }
//     public function exportData()
// 	{
//         $date = date('Y-m-d');
// 		return Excel::download(new PembeliExport, $date.'Pembeli.xlsx');
// 	}
//     public function import_excel(Request $request) 
// {
// 	// validasi
// 	$this->validate($request, [
// 		'file' => 'required|mimes:csv,xls,xlsx'
// 	]);

// 	// menangkap file excel
// 	$file = $request->file('file');

// 	// membuat nama file unik
// 	$nama_file = rand().$file->getClientOriginalName();

// 	// upload ke folder file_siswa di dalam folder public
// 	$file->move('Pembeli_import',$nama_file);

// 	// import data
// 	Excel::import(new PembeliImport, public_path('/Pembeli_import/'.$nama_file));

// 	// notifikasi dengan session
// 	// Session::flash('sukses','Data Siswa Berhasil Diimport!');

// 	// alihkan halaman kembali
// 	return redirect()->back();
// } 
}
