<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Alert;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'nama_supplier' => 'required',
            'no_telepon' => 'required|numeric',
            'alamat' => 'required',
            'harga' => 'required|numeric',
            'ket' => 'required',
        ]);

        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->no_telepon = $request->no_telepon;
        $supplier->alamat = $request->alamat;
        $supplier->harga = $request->harga;
        $supplier->ket = $request->ket;
        $supplier->save();
        Alert::success('Success', 'Data saved successfully');
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi data
        $validated = $request->validate([
            'nama_supplier' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'harga' => 'required',
            'ket' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->no_telepon = $request->no_telepon;
        $supplier->alamat = $request->alamat;
        $supplier->harga = $request->harga;
        $supplier->ket = $request->ket;
        $supplier->save();
        Alert::success('Success', 'Data changed successfully');
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Supplier::destroy($id)) {
            return redirect()->back();
        }
        Alert::success('Success', 'Data deleted successfully');
        return redirect()->route('supplier.index');

        $supplier->delete();
        return redirect()->route('supplier.index');
    }
}
