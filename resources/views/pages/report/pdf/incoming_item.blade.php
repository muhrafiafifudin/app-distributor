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

<h3 class="text-center" style="line-height: 10px; margin-top: 5rem">Laporan Barang Masuk</h3>
<p class="text-center">Dari Tanggal ; {{ $fromDate }} Sampai Tanggal : {{ $toDate }}</p>

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
            <td>{{ $incoming_item->stock }}</td>
            <td>{{ $incoming_item->created_at }}</td>
        </tr>
    @empty
        <tr>
            <td class="text-center" colspan="6">Tidak ada data yang tersedia.</td>
        </tr>
    @endforelse
</table>
