<h1>Ini Halaman Edit</h1>
<form method="POST" action="{{ route('produk.update', ['id' => $produk->id]) }}">
    @csrf
    @method('PUT')
    <table cellspacing="10">
        <tr>
            <td>Kode Produk</td>
            <td><input type="text" name="kode_produk" value="{{ $produk->kode_produk }}"></td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td><input type="text" name="nama_produk" value="{{ $produk->nama_produk }}"></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="text" name="stok" value="{{ $produk->stok }}"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" value="{{ $produk->harga }}"></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>
                <select name="id_kategori">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}" {{ $produk->id_kategori == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td><button type="submit">Submit</button></td>
            <td><button type="reset">Reset</button></td>
        </tr>
    </table>
</form>
