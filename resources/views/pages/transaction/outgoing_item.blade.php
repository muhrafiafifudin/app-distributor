@extends('layouts.app')

@section('title')
    Barang Keluar
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div class="toolbar" id="kt_toolbar">
            <!--begin::Container-->
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="d-flex align-items-center me-3">
                    <!--begin::Title-->
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Barang Keluar
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Halaman Transaksi</small>
                        <!--end::Description-->
                    </h1>
                    <!--end::Title-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    <!--begin::Col-->
                    <div class="card mb-5 mb-xl-8">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bolder fs-3 mb-1">Barang Keluar</span>
                                    <span class="text-muted mt-1 fw-bold fs-7">Menampilkan semua barang keluar yang ada</span>
                                </h3>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-3 pt-10">
                                <ul class="nav nav-tabs flex-nowrap text-nowrap">
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-active-light btn-color-gray-800 btn-active-color-primary rounded-bottom-0 active" data-bs-toggle="tab" href="#order">Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-active-light btn-color-gray-800 btn-active-color-primary rounded-bottom-0" data-bs-toggle="tab" href="#process">Proses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn btn-active-light btn-color-gray-800 btn-active-color-primary rounded-bottom-0" data-bs-toggle="tab" href="#finish">Selesai</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="order" role="tabpanel">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-striped border rounded gy-5 gs-7 dataTable no-footer outgoing_item_table">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-dark">
                                                        <th>No.</th>
                                                        <th>Kode</th>
                                                        <th class="text-center">User</th>
                                                        <th class="text-center">Tanggal</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1 @endphp
                                                    @foreach ($outgoing_items as $outgoing_item)
                                                        @if ($outgoing_item->status == 0)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $outgoing_item->code }}</td>
                                                                <td class="text-center">{{ $outgoing_item->user->name }}</td>
                                                                <td class="text-center">{{ $outgoing_item->created_at }}</td>
                                                                <td class="text-center">{{ $outgoing_item->status }}</td>
                                                                <td class="text-center">

                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table container-->
                                    </div>

                                    <div class="tab-pane fade" id="process" role="tabpanel">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-striped border rounded gy-5 gs-7 dataTable no-footer outgoing_item_table">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-dark">
                                                        <th>No.</th>
                                                        <th>Kode</th>
                                                        <th class="text-center">User</th>
                                                        <th class="text-center">Tanggal</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1 @endphp
                                                    @foreach ($outgoing_items as $outgoing_item)
                                                        @if ($outgoing_item->status == 0)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $outgoing_item->code }}</td>
                                                                <td class="text-center">{{ $outgoing_item->user->name }}</td>
                                                                <td class="text-center">{{ $outgoing_item->created_at }}</td>
                                                                <td class="text-center">{{ $outgoing_item->status }}</td>
                                                                <td class="text-center">

                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table container-->
                                    </div>

                                    <div class="tab-pane fade" id="finish" role="tabpanel">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table class="table table-striped border rounded gy-5 gs-7 dataTable no-footer outgoing_item_table">
                                                <thead>
                                                    <tr class="fw-bold fs-6 text-dark">
                                                        <th>No.</th>
                                                        <th>Kode</th>
                                                        <th class="text-center">User</th>
                                                        <th class="text-center">Tanggal</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $no = 1 @endphp
                                                    @foreach ($outgoing_items as $outgoing_item)
                                                        @if ($outgoing_item->status == 0)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $outgoing_item->code }}</td>
                                                                <td class="text-center">{{ $outgoing_item->user->name }}</td>
                                                                <td class="text-center">{{ $outgoing_item->created_at }}</td>
                                                                <td class="text-center">{{ $outgoing_item->status }}</td>
                                                                <td class="text-center">

                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table container-->
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@push('javascript')
    <script src="{{ asset('assets/js/pages/transaction/outgoing_item.js') }}"></script>

    @if($message = Session::get('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.success("{{ $message }}");
            })
        </script>
    @endif

    @if ($message = Session::get('error'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.error("{{ $message }}");
            })
        </script>
    @endif
@endpush
