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

<h3 class="text-center" style="line-height: 10px; margin-top: 5rem">Laporan Barang Keluar</h3>
<p class="text-center">Dari Tanggal ; {{ $fromDate }} Sampai Tanggal : {{ $toDate }}</p>

<br>

<table width="100%">
    <tr>
        <th>No.</th>
        <th>Kode Transaksi</th>
        <th>Pegawai</th>
        <th>Tanggal</th>
    </tr>
    @php $no = 1; @endphp
    @forelse ($outgoing_items as $outgoing_item)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $outgoing_item->code }}</td>
            <td>{{ $outgoing_item->user->user }}</td>
            <td>{{ $outgoing_item->created_at }}</td>
        </tr>
    @empty
        <tr>
            <td class="text-center" colspan="4">Tidak ada data yang tersedia.</td>
        </tr>
    @endforelse
</table>
