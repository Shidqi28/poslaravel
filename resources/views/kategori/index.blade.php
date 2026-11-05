<h1>Halaman Kategori</h1>

@if(@session('succes'))
<h4 style="color: green">{{session('succes')}}</h4>   
@endif

@if(@session('error'))
<h4 style="color: red">{{session('error')}}</h4>   
@endif

<a href="{{ route('kategori.create')}}">Tambah Data</a>
<form method="GET" action="{{route('kategori.index')}}">
    <input type="text" name="nama_kategori" value="{{ request('nama_kategori') }}">
    <button type="submit">Cari</button>
</form>

<table border="1" cellpadding="8" cellspacing="2">
<thead>
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
    @foreach ($kategori as $k)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$k->nama_kategori}}</td>
            <td>
                <div style="display: flex; gap: 5px">
                    <a href="{{ route('kategori.edit',['id'=>$k->id]) }}">Edit</a>
                    <a>|</a>
                    <form method="POST" action="{{route('kategori.delete',['id'=>$k->id])}}" onsubmit="return confirm ('Yakin Data Ini Akan Dihapus?')">
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
{{$kategori->links()}}