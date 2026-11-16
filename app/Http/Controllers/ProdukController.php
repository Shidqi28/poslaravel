<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        // $nama_produk = $request->nama_produk;
        // $id_kategori = $request->id_kategori;

        // $query = DB::table('produk')
        //     ->join('kategori', 'produk.id_kategori', '=', 'kategori.id');
        //     // ->select('produk.*', 'kategori.nama_kategori');
        // if ($nama_produk != "") {
        //     $query->where('produk.nama_produk', 'like', '%' . $nama_produk . '%');
        // }
        // if ($id_kategori != "") {
        //     $query->where('produk.id_kategori', $id_kategori);
        // }
        // $produk = $query->paginate(5);

        // $kategori = DB::table('kategori')->get();

        $nama_produk = $request->nama_produk;
        $query = Produk::query();
        $query -> with('kategori');
        if($nama_produk !=""){
            $query->where('nama_produk', 'like', '%'.$nama_produk.'%');
        }
        $produk = $query->paginate(5);

        return view('produk.index', compact('produk'));
    }

    public function edit($id)
    {
        $produk = DB::table('produk')->where('id', $id)->first();
        $kategori = DB::table('kategori')->get();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function update($id, Request $request)
    {
        $kode_produk = $request->kode_produk;
        $nama_produk = $request->nama_produk;
        $stok = $request->stok;
        $harga = $request->harga;
        $id_kategori = $request->id_kategori;
        try {
            // DB::table('produk')->where('id', $id)->update(
            //     [
            //         'kode_produk' => $kode_produk,
            //         'nama_produk' => $nama_produk,
            //         'stok' => $stok,
            //         'harga' => $harga,
            //         'id_kategori' => $id_kategori
            //     ]
            // );

            $produk = Produk::find($id);
                $produk->update([
                'kode_produk' => $kode_produk,
                'nama_produk' => $nama_produk,
                'stok' => $stok,
                'harga' => $harga,
                'id_kategori' => $id_kategori
                ]);

            return redirect()->route('produk.index')->with('succes', 'Data Berhasil Diedit');
        } catch (Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Data Gagal Diedit');
        }
    }

    public function destroy($id)
    {
        try {
            // DB::table('produk')->where('id', $id)->delete();

            Produk::where('id',$id)->delete();

            return redirect()->route('produk.index')->with('succes', 'Data Berhasil Dihapus');
        } catch (Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Data Gagal Dihapus');
        }
    }

    public function create()
    {
        $kategori = DB::table('kategori')->get();
        return view('produk.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $kode_produk = $request->input('kode_produk');
        $nama_produk = $request->input('nama_produk');
        $stok = $request->input('stok');
        $harga = $request->input('harga');
        $id_kategori = $request->input('id_kategori');

        $request->validate([
            'kode_produk' => 'required|unique:produk,kode_produk|max:4',
            'harga' => 'required|numeric',
            'stok' => 'numeric'
        ],[
            'kode_produk.required' => 'Kode Produk Harap Di Isi',
            'kode_produk.max' => 'Kode Produk Maksimal 4',
            'kode_produk.unique' => 'Kode Produk Sudah Ada',
            'harga.required' => 'Harga Harap Di Isi',
            'harga.numeric' => 'Harga Wajib Angka',
            'stok.numeric' => 'Stok Wajib Angka'
        ]);

        try {
            // DB::table('produk')->insert(
            //     [
            //         'kode_produk' => $kode_produk,
            //         'nama_produk' => $nama_produk,
            //         'stok' => $stok,
            //         'harga' => $harga,
            //         'id_kategori' => $id_kategori
            //     ]
            // );

            Produk::create([
                'kode_produk' => $kode_produk,
                'nama_produk' => $nama_produk,
                'stok' => $stok,
                'harga' => $harga,
                'id_kategori' => $id_kategori,
            ]);

            return redirect()->route('produk.index')->with('succes', 'Produk Berhasil Disimpan');
        } catch (Exception $e) {
            return redirect()->route('produk.index')->with('error', 'Produk Gagal Disimpan');
        }
    }
}
