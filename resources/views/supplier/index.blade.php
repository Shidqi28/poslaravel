<h1>Halaman Supplier</h1>

@if(@session('succes'))
<h4 style="color: green">{{session('succes')}}</h4>
@endif

@if(@session('error'))
<h4 style="color: red">{{session('error')}}</h4>
@endif

<a href="{{ route('supplier.create')}}">Tambah Data</a>
<form method="GET" action="{{route('supplier.index')}}">
    <input type="text" name="nama_supplier" value="{{ request('nama_supplier') }}">
    <button type="submit">Cari</button>
</form>

<table border="1" cellpadding="8" cellspacing="2">
<thead>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama Supplier</th>
        <th>Alamat</th>
        <th>No. Telp</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach ($supplier as $s)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$s->kode_supplier}}</td>
            <td>{{$s->nama_supplier}}</td>
            <td>{{$s->alamat}}</td>
            <td>{{$s->no_telp}}</td>
            <td>
                <div style="display: flex; gap: 5px">
                    <a href="{{ route('supplier.edit',['id'=>$s->id]) }}">Edit</a>
                    <a>|</a>
                    <form method="POST" action="{{route('supplier.delete',['id'=>$s->id])}}" onsubmit="return confirm ('Yakin Data Ini Akan Dihapus?')">
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
{{$supplier->links()}}