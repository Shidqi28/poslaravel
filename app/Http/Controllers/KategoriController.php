<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        // $nama_kategori = $request->nama_kategori;
        // $query = DB::table('kategori');
        // if($nama_kategori !=""){
        //     $query->where('nama_kategori', 'like', '%'.$nama_kategori.'%');
        // }
        // $kategori = $query->paginate(5);

        $nama_kategori = $request->nama_kategori;
        $query = Kategori::query();
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
        // DB::table('kategori')->where('id', $id)->update(
        // [
        //     'nama_kategori' => $nama_kategori
        // ]
        // );
        
        $kategori = Kategori::find($id);
        $kategori->update([
            'nama_kategori' => $nama_kategori
        ]);

        // $kategori = Kategori::where('id',$id)->update([
        //     'nama_kategori' => $nama_kategori
        // ]);

        return redirect()->route('kategori.index')->with('succes','Data Berhasil Diedit');
        } catch (Exception $e) {
            return redirect()->route('kategori.index')->with('error','Data Gagal Diedit');
        }
    }

    public function destroy ($id)
    {
        try {
        // DB::table('kategori')->where('id', $id)->delete();

        Kategori::where('id',$id)->delete();
        
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

            // DB::table('kategori')->insert(
            //     [
            //         'nama_kategori' => $nama_kategori
            //     ]
            // ); 

            Kategori::create([
                'nama_kategori' => $nama_kategori
            ]);

            return redirect()->route('kategori.index')->with('succes', 'Kategori Berhasil Disimpan');
        } catch (Exception $e) {
            return redirect()->route('kategori.index')->with('error', 'Kategori Gagal Disimpan');
        }
    }
}