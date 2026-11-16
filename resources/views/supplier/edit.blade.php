<h1>Ini Halaman Edit</h1>
<form method="POST" action="{{ route('supplier.update',['id'=>$supplier->id]) }}">
    @csrf
    @method('PUT')
    <table cellspacing="10">
        <tr>
            <td>Kode Supplier</td>
            <td><input type="text" name="kode_supplier" value="{{ $supplier-> kode_supplier }}"></td>
        </tr>
        <tr>
            <td>Nama Supplier</td>
            <td><input type="text" name="nama_supplier" value="{{ $supplier-> nama_supplier }}"></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" value="{{ $supplier-> alamat }}"></td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td><input type="text" name="no_telp" value="{{ $supplier-> no_telp }}"></td>
        </tr>
        <tr>
            <td><button type="submit">Submit</button></td>
            <td><button type="reset">Reset</button></td>
        </tr>
    </table>
</form>