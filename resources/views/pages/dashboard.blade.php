@extends('layouts.app')

@section('title')
    Dashboard
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Dashboard
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
                    <!--end::Separator-->
                    <!--begin::Description-->
                    <small class="text-muted fs-7 fw-bold my-1 ms-1">#XRS-45670</small>
                    <!--end::Description--></h1>
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
                <!--begin::Text Information-->
                <div class="card  card-stretch shadow mb-5">
                    <div class="card-header">
                        <h3 class="card-title">Selamat Datang di Sistem inventory RAW Material Warehouse PT. Aseli Garmen Indonesia</h3>
                    </div>
                    <div class="card-body">
                        Raw Material Warehouse (Ruang Persediaan). Jenis pergudangan ini berfungsi untuk menyimpan setiap material yang dibutuhkan oleh proses produksi. Gudang tipe ini terbagi menjadi dua tipe ruangan, yaitu di dalam gedung pabrik atau ruangan produksi (indoor) dan ada beberapa material yang disimpan di luar gedung (outdoor).
                    </div>
                </div>
                <!--end::Text Information-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
@endsection
