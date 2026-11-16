<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index(Request $request)
    {
        $nama_supplier = $request->nama_supplier;
        $query = DB::table('supplier');
        if($nama_supplier !=""){
            $query->where('nama_supplier', 'like', '%'.$nama_supplier.'%');
        }
        $supplier = $query->paginate(5);

        return view('supplier.index',compact('supplier'));
    }

    public function edit($id)
    {   
        $supplier = DB::table('supplier')->where('id',$id)->first();
        return view('supplier.edit',compact('supplier'));
    }

    public function update($id, Request $request)
    {
        $kode_supplier = $request->kode_supplier;
        $nama_supplier = $request->nama_supplier;
        $alamat = $request->alamat;
        $no_telp = $request->no_telp;
        try{
            DB::table('supplier')->where('id', $id)->update(
                [
                    'kode_supplier' => $kode_supplier,
                    'nama_supplier' => $nama_supplier,
                    'alamat' => $alamat,
                    'no_telp' => $no_telp
                ]
            );
            return redirect()->route('supplier.index')->with('succes','Data Berhasil Diedit');
        } catch (Exception $e) {
            return redirect()->route('supplier.index')->with('error','Data Gagal Diedit');
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('supplier')->where('id', $id)->delete();
            return redirect()->route('supplier.index')->with('succes','Data Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('supplier.index')->with('error','Data Gagal Dihapus');
        }
    }

    public function create()
    {
        return view('supplier.create');
    }   

    public function store(Request $request)
    {
        $kode_supplier = $request->input('kode_supplier');
        $nama_supplier = $request->input('nama_supplier');
        $alamat = $request->input('alamat');
        $no_telp = $request->input('no_telp');

        try {

            DB::table('supplier')->insert(
                [
                    'kode_supplier' => $kode_supplier,
                    'nama_supplier' => $nama_supplier,
                    'alamat' => $alamat,
                    'no_telp' => $no_telp
                ]
            );
            return redirect()->route('supplier.index')->with('succes', 'Supplier Berhasil Disimpan');
        } catch (Exception $e){
            return redirect()->route('supplier.index')->with('error', 'Supplier Berhasil Disimpan');
        }
    }
}
