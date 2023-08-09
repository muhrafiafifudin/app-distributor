@extends('layouts.app')

@section('title')
    Laporan Barang Masuk
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Laporan Barang Masuk
                        <!--begin::Separator-->
                        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                        <!--end::Separator-->
                        <!--begin::Description-->
                        <small class="text-muted fs-7 fw-bold my-1 ms-1">Halaman Laporan Barang Masuk</small>
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
                                <span class="card-label fw-bolder fs-3 mb-1">Laporan Barang Masuk</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Menampilkan semua laporan barang masuk yang ada</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3 pt-10">
                            <div class="row mb-10 flex-center mt-10">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-1 text-end">
                                    <label class="fs-6 fw-bold mb-2 py-3">Dari</label>
                                </div>
                                <div class="col-lg-2">
                                    <input class="form-control form-control-solid date-picker" placeholder="Pilih Tanggal" id="fromDate" />
                                </div>
                                <div class="col-lg-1 text-end">
                                    <label class="fs-6 fw-bold mb-2 py-3">Sampai</label>
                                </div>
                                <div class="col-lg-2">
                                    <input class="form-control form-control-solid date-picker" placeholder="Pilih Tanggal" id="toDate" />
                                </div>
                                <div class="col-lg-1 text-end">
                                    <label class="fs-6 fw-bold mb-2 py-3">Barang</label>
                                </div>
                                <div class="col-lg-2">
                                    <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Pilih Barang" id="itemId">
                                        <option value="">Pilih Barang</option>
                                        <option value="0">Semua Barang</option>

                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}">{{ $item->item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-1">
                                    <a href="" class="btn btn-primary" onclick="this.href='print-pdf-masuk/' + document.getElementById('fromDate').value + '/' + document.getElementById('toDate').value + '/' + document.getElementById('itemId').value" target="_blank">Print</a>
                                </div>
                                <div class="col-lg-1"></div>
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
    <script src="{{ asset('assets/js/pages/main/item.js') }}"></script>

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
