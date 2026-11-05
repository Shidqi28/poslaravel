<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $nama_kategori = $request->nama_kategori;
        $query = DB::table('kategori');
        if($nama_kategori !=""){
            $query->where('nama_kategori', 'like', '%'.$nama_kategori.'%');
        }
        $kategori = $query->paginate(5);

        return view('kategori.index',compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = DB::table('kategori')->where('id',$id)->first();
        return view('kategori.edit', compact('kategori'));
    }

    public function update($id,Request $request)
    {
        $nama_kategori = $request->nama_kategori;
        try{
        DB::table('kategori')->where('id', $id)->update(
        [
            'nama_kategori' => $nama_kategori
        ]
        );
        return redirect()->route('kategori.index')->with('succes','Data Berhasil Diedit');
        } catch (Exception $e) {
            return redirect()->route('kategori.index')->with('error','Data Gagal Diedit');
        }
    }

    public function destroy ($id)
    {
        try {
        DB::table('kategori')->where('id', $id)->delete();
        return redirect()->route('kategori.index')->with('succes','Data Berhasil Dihapus');
        } catch (Exception $e){
        return redirect()->route('kategori.index')->with('error','Data Gagal Dihapus');
        }
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $nama_kategori = $request->input('nama_kategori');

        try {

            DB::table('kategori')->insert(
                [
                    'nama_kategori' => $nama_kategori
                ]
            ); 
            return redirect()->route('kategori.index')->with('succes', 'Kategori Berhasil Disimpan');
        } catch (Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Kategori Gagal Disimpan');
        }
    }
}