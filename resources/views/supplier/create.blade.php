<h1>Ini Halaman Create</h1>
<form method="POST" action="{{ route('supplier.store') }}">
    @csrf
    <table cellspacing="10">
        <tr>
            <td>Kode Supplier</td>
            <td><input type="text" name="kode_supplier"></td>
        </tr>
        <tr>
            <td>Nama Supplier</td>
            <td><input type="text" name="nama_supplier"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat"></td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td><input type="text" name="no_telp"></td>
        </tr>
        <tr>
            <td><button type="submit">Submit</button></td>
            <td><button type="reset">Reset</button></td>
        </tr>
    </table>
</form>