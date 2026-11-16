<h1>Data Produk Berhasil Disimpan</h1>
<table border="1" cellspacing="5">
    <tr>
        <td>Kode</td>
        <td>:</td> 
        <td>{{ $kode_supplier }}</td>
    </tr>
    <tr>
        <td>Nama Supplier</td>
        <td>:</td>
        <td>{{ $nama_supplier }}</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{ $alamat }}</td>
    </tr>
    <tr>
        <td>No. Telp</td>
        <td>:</td>
        <td>{{ $no_telp }}</td>
    </tr>
</table>
<a href="{{ route('supplier.create') }}">Kembali</a>