<h1>Data Produk Berhasil Disimpan</h1>
<table border="1" cellspacing="5">
    <tr>
        <td>Kode</td>
        <td>:</td> 
        <td>{{ $kode_produk }}</td>
    </tr>
    <tr>
        <td>Nama Produk</td>
        <td>:</td>
        <td>{{ $nama_produk }}</td>
    </tr>
    <tr>
        <td>Stok</td>
        <td>:</td>
        <td>{{ $stok }}</td>
    </tr>
    <tr>
        <td>Harga</td>
        <td>:</td>
        <td>{{ $harga }}</td>
    </tr>
    <tr>
        <td>Kategori</td>
        <td>:</td>
        <td>{{ $id_kategori }}</td>
    </tr>
</table>
<a href="{{ route('produk.create') }}">Kembali</a>