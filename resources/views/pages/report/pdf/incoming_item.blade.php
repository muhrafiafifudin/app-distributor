<style>
    body {
        padding-left: 30px;
        padding-right: 30px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    .text-center {
        text-align: center;
    }
</style>

<h2 class="text-center" style="line-height: 10px; margin-top: 3rem">PT. Aseli Garmen Indonesia</h2>
<h3 class="text-center" style="line-height: 10px; margin-top: 3rem">Laporan Barang Masuk</h3>
<p class="text-center" style="line-height: 5px">Dari Tanggal ; {{ $fromDate }} Sampai Tanggal : {{ $toDate }}</p>

<br>

<table width="100%">
    <tr>
        <th>No.</th>
        <th>Kode Barang</th>
        <th>Barang</th>
        <th>Supplier</th>
        <th>Stok</th>
        <th>Tanggal</th>
    </tr>
    @php $no = 1; @endphp
    @forelse ($incoming_items as $incoming_item)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $incoming_item->item->code }}</td>
            <td>{{ $incoming_item->item->item }}</td>
            <td>{{ $incoming_item->supplier->supplier }}</td>
            <td>{{ $incoming_item->qty }}</td>
            <td>{{ $incoming_item->created_at }}</td>
        </tr>
    @empty
        <tr>
            <td class="text-center" colspan="6">Tidak ada data yang tersedia.</td>
        </tr>
    @endforelse
</table>

<table width="100%" style="border: none; margin-top: 8rem">
    <tr style="border: none">
        <td width="25%" style="border: none; line-height:10px">
        </td>
        <td width="25%" style="border: none">
        </td>
        <td width="20%" style="border: none">
        </td>
        <td width="30%" style="border: none; line-height:10px">
            <p class="text-center">Surakarta, {{ $today }}</p>
            <p class="text-center">Admin</p>
            <br><br><br><br>
            <p class="text-center">.......................</p>
        </td>
    </tr>
</table>
