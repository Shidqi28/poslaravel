<h1>Ini Halaman Create</h1>
<form method="POST" action="{{ route('kategori.store') }}">
    @csrf
    <table cellspacing="10">
        <tr>
            <td>Nama Kategori</td>
            <td><input type="text" name="nama_kategori"></td>
        </tr>
        <tr>
            <td><button type="submit">Submit</button></td>
            <td><button type="reset">Reset</button></td>
        </tr>
    </table>
</form>