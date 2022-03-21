<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Member;
use App\Http\Requests\MemberRequest;
use App\Exports\MemberExport;
use App\Imports\MemberImport; 
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateMemberRequest;
use App\Imports\TestImport;

// use PhpOffice\PhpSpreadsheet\Writer\Pdf;
// use DomPDF;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Member::orderBy('nama')->get();

        return view('member.index')->with([
            'items' => $items
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
     * @param  \App\Http\Requests\StorememberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $data = $request->all();

        Member::create($data);
        return redirect()->back()->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatememberRequest  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, $id)
    {
        $data = $request->all();
        $items = Member::findOrFail($id);
        $items->update($data);
        return redirect()->back()->with('message', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Member::findOrFail($id);
        $items->delete();
        return redirect()->back()->with('message', 'Data berhasil ditambahkan!');
    }

    public function exportToExcel(){
        return Excel::download(new MemberExport, 'member.xlsx');
        
    }

    public function importData(Request $request){
        Excel::import(new MemberImport, $request->file('file'));

        return back()->with('succes', 'Import data member berhasil!');
        
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_siswa di dalam folder public
		$file->move('file_siswa',$nama_file);

		// import data
		Excel::import(new MemberImport, public_path('/file_siswa/'.$nama_file));

		// notifikasi dengan session
		// Session::flash('sukses','Data Siswa Berhasil Diimport!');

		// alihkan halaman kembali
		return redirect('/siswa');

    }
}
