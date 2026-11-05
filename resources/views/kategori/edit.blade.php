<h1>Ini Halaman Edit</h1>
<form method="POST" action="{{ route('kategori.update',['id'=>$kategori->id]) }}">
    @csrf
    @method('PUT')
    <table cellspacing="10">
        <tr>
            <td>Nama Kategori</td>
            <td><input type="text" name="nama_kategori" value="{{ $kategori -> nama_kategori }}"></td>
        </tr>
        <tr>
            <td><button type="submit">Submit</button></td>
            <td><button type="reset">Reset</button></td>
        </tr>
    </table>
</form>