<?php

namespace App\Http\Controllers;

use App\Models\outlet;
use App\Http\Requests\OutletRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OutletExport;
use App\Imports\OutletImport;


class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Outlet::orderBy('nama')->get();

        return view('outlet.index')->with([
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
     * @param  \App\Http\Requests\StoreOutletRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OutletRequest $request)
    {
        $data = $request->all();

        Outlet::create($data);
        return redirect()->back()->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function show(outlet $outlet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function edit(outlet $outlet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOutletRequest  $request
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function update(OutletRequest $request, $id)
    {
        $data = $request->all();
        $items = Outlet::findOrFail($id);
        $items->update($data);
        return redirect()->back()->with('message', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\outlet  $outlet
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Outlet::findOrFail($id);
        $items->delete();
        return redirect()->back()->with('message', 'Data berhasil ditambahkan!');
    }
    /**
    * @return \Illuminate\Support\Collection
    */

    public function exportData(){
        $date = date('Y-m-d');
        return Excel::download(new OutletExport, $date.'_outlet.xlsx');
    }

    public function importData(){
        Excel::import(new OutletImport, request()->file('import'));

        return redirect(request()->segment(1).'/outlet')->with('success','Import data paket berhasil');
    }
}

