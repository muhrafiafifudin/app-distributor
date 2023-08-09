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
<h3 class="text-center" style="line-height: 10px; margin-top: 3rem">Laporan Barang Keluar</h3>
<p class="text-center" style="line-height: 5px">Dari Tanggal ; {{ $fromDate }} Sampai Tanggal : {{ $toDate }}</p>

<br>

<table width="100%">
    <tr>
        <th>No.</th>
        <th>Kode Barang</th>
        <th>Barang</th>
        <th>Qty</th>
        <th>Tanggal</th>
    </tr>
    @php $no = 1; @endphp
    @forelse ($outgoing_items as $outgoing_item)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $outgoing_item->item->code }}</td>
            <td>{{ $outgoing_item->item->item }}</td>
            <td>{{ $outgoing_item->item_qty }}</td>
            <td>{{ $outgoing_item->created_at }}</td>
        </tr>
    @empty
        <tr>
            <td class="text-center" colspan="5">Tidak ada data yang tersedia.</td>
        </tr>
    @endforelse
</table>

<table width="100%" style="border: none; margin-top: 8rem">
    <tr style="border: none">
        <td width="25%" style="border: none; line-height:10px">
            <p class="text-center" style="color: white !important">Surakarta, {{ $today }}</p>
            <p class="text-center">Pemilik</p>
            <br><br><br><br>
            <p class="text-center">Pemilik</p>
        </td>
        <td width="25%" style="border: none">
        </td>
        <td width="20%" style="border: none">
        </td>
        <td width="30%" style="border: none; line-height:10px">
            <p class="text-center">Surakarta, {{ $today }}</p>
            <p class="text-center">Admin</p>
            <br><br><br><br>
            <p class="text-center">Admin</p>
        </td>
    </tr>
</table>
