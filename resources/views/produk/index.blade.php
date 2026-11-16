<h1>Halaman Produk</h1>

@if(@session('succes'))
<h4 style="color: green">{{session('succes')}}</h4>
@endif

@if(@session('error'))
<h4 style="color: red">{{session('error')}}</h4>
@endif

<a href="{{ route('produk.create')}}">Tambah Data</a>
<form method="GET" action="{{route('produk.index')}}">
    <input type="text" name="nama_produk" value="{{ request('nama_produk') }}">
    {{-- <select name="id_kategori">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                    @endforeach
    </select> --}}
    <button type="submit">Cari</button>
</form>

<table border="1" cellpadding="8" cellspacing="2">
<thead>
    <tr>
        <th>No</th>
        <th>Kode Produk</th>
        <th>Nama Produk</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Kategori</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach ($produk as $p)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$p->kode_produk}}</td>
        <td>{{$p->nama_produk}}</td>
        <td>{{$p->stok}}</td>
        <td>{{$p->harga}}</td>
        <td>{{$p->kategori->nama_kategori}}</td>
        <td>
                <div style="display: flex; gap: 5px">
                    <a href="{{ route('produk.edit',['id'=>$p->id]) }}">Edit</a>
                    <a>|</a>
                    <form method="POST" action="{{route('produk.delete',['id'=>$p->id])}}" onsubmit="return confirm ('Yakin Data Ini Akan Dihapus?')">
                        @method('DELETE')
                        @csrf
                        <button type="submit" style="background: none; border: none; cursor: pointer">Hapus</button>
                    </form>
                </div>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
{{$produk->links()}}