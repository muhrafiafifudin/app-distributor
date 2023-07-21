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
                                    {{-- <li class="nav-item">
                                        <a class="nav-link btn btn-active-light btn-color-gray-800 btn-active-color-primary rounded-bottom-0" data-bs-toggle="tab" href="#reject">Ditolak</a>
                                    </li> --}}
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
                                                        @if ($outgoing_item->status == 1)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $outgoing_item->code }}</td>
                                                                <td class="text-center">{{ $outgoing_item->user->name }}</td>
                                                                <td class="text-center">{{ $outgoing_item->created_at }}</td>
                                                                <td class="text-center">

                                                                    @if ($outgoing_item->status == 1)
                                                                        <span class="badge badge-primary">Menunggu</span>
                                                                    @elseif ($outgoing_item->status == 2)
                                                                        <span class="badge badge-warning">Proses</span>
                                                                    @elseif ($outgoing_item->status == 3)
                                                                        <span class="badge badge-success">Selesai</span>
                                                                    @else
                                                                        <span class="badge badge-danger">Ditolak</span>
                                                                    @endif

                                                                <td class="text-center">
                                                                    <form action="{{ route('outgoing-item.process-item', $outgoing_item->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="Lihat" data-bs-toggle="modal" data-bs-target="#modal_view_outgoing_{{ $outgoing_item->id }}">
                                                                            <!--begin::Svg Icon | path: icons/stockholm/General/Settings-1.svg-->
                                                                            <span class="svg-icon svg-icon-3">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </a>

                                                                        <button type="submit" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                            <!--begin::Svg Icon | path: icons/stockholm/Navigation/Arrow-right.svg-->
                                                                            <span class="svg-icon svg-icon-2">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" title="Proses" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                        <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </button>
                                                                    </form>
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
                                                        @if ($outgoing_item->status == 2)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $outgoing_item->code }}</td>
                                                                <td class="text-center">{{ $outgoing_item->user->name }}</td>
                                                                <td class="text-center">{{ $outgoing_item->created_at }}</td>
                                                                <td class="text-center">

                                                                    @if ($outgoing_item->status == 1)
                                                                        <span class="badge badge-primary">Menunggu</span>
                                                                    @elseif ($outgoing_item->status == 2)
                                                                        <span class="badge badge-warning">Proses</span>
                                                                    @elseif ($outgoing_item->status == 3)
                                                                        <span class="badge badge-success">Selesai</span>
                                                                    @else
                                                                        <span class="badge badge-danger">Ditolak</span>
                                                                    @endif

                                                                <td class="text-center">
                                                                    <form action="{{ route('outgoing-item.accept-item', $outgoing_item->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="Lihat" data-bs-toggle="modal" data-bs-target="#modal_view_outgoing_{{ $outgoing_item->id }}">
                                                                            <!--begin::Svg Icon | path: icons/stockholm/General/Settings-1.svg-->
                                                                            <span class="svg-icon svg-icon-3">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24"></rect>
                                                                                        <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                                                                                        <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </a>

                                                                        <button type="submit" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
                                                                            <!--begin::Svg Icon | path: icons/stockholm/Navigation/Arrow-right.svg-->
                                                                            <span class="svg-icon svg-icon-2">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" title="Proses" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                        <rect fill="#000000" opacity="0.5" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                                                        <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                                                                    </g>
                                                                                </svg>
                                                                            </span>
                                                                            <!--end::Svg Icon-->
                                                                        </button>
                                                                    </form>
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
                                                        @if ($outgoing_item->status == 3)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $outgoing_item->code }}</td>
                                                                <td class="text-center">{{ $outgoing_item->user->name }}</td>
                                                                <td class="text-center">{{ $outgoing_item->created_at }}</td>
                                                                <td class="text-center">

                                                                    @if ($outgoing_item->status == 1)
                                                                        <span class="badge badge-primary">Menunggu</span>
                                                                    @elseif ($outgoing_item->status == 2)
                                                                        <span class="badge badge-warning">Proses</span>
                                                                    @elseif ($outgoing_item->status == 3)
                                                                        <span class="badge badge-success">Selesai</span>
                                                                    @else
                                                                        <span class="badge badge-danger">Ditolak</span>
                                                                    @endif

                                                                <td class="text-center">
                                                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="Lihat" data-bs-toggle="modal" data-bs-target="#modal_view_outgoing_{{ $outgoing_item->id }}">
                                                                        <!--begin::Svg Icon | path: icons/stockholm/General/Settings-1.svg-->
                                                                        <span class="svg-icon svg-icon-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                                                                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--end::Table container-->
                                    </div>

                                    <div class="tab-pane fade" id="reject" role="tabpanel">
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
                                                        @if ($outgoing_item->status == 4)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $outgoing_item->code }}</td>
                                                                <td class="text-center">{{ $outgoing_item->user->name }}</td>
                                                                <td class="text-center">{{ $outgoing_item->created_at }}</td>
                                                                <td class="text-center">

                                                                    @if ($outgoing_item->status == 1)
                                                                        <span class="badge badge-primary">Menunggu</span>
                                                                    @elseif ($outgoing_item->status == 2)
                                                                        <span class="badge badge-warning">Proses</span>
                                                                    @elseif ($outgoing_item->status == 3)
                                                                        <span class="badge badge-success">Selesai</span>
                                                                    @else
                                                                        <span class="badge badge-danger">Ditolak</span>
                                                                    @endif

                                                                <td class="text-center">
                                                                    <a href="#" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" title="Lihat" data-bs-toggle="modal" data-bs-target="#modal_view_outgoing_{{ $outgoing_item->id }}">
                                                                        <!--begin::Svg Icon | path: icons/stockholm/General/Settings-1.svg-->
                                                                        <span class="svg-icon svg-icon-3">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                    <rect x="0" y="0" width="24" height="24"></rect>
                                                                                    <path d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z" fill="#000000"></path>
                                                                                    <path d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z" fill="#000000" opacity="0.3"></path>
                                                                                </g>
                                                                            </svg>
                                                                        </span>
                                                                        <!--end::Svg Icon-->
                                                                    </a>
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

                                @foreach ($outgoing_items as $outgoing_item)
                                    <!--begin::Modal - New Target-->
                                    <div class="modal fade" id="modal_view_outgoing_{{ $outgoing_item->id }}" tabindex="-1" aria-hidden="true">
                                        <!--begin::Modal dialog-->
                                        <div class="modal-dialog modal-dialog-centered mw-1000px">
                                            <!--begin::Modal content-->
                                            <div class="modal-content rounded">
                                                <!--begin::Modal header-->
                                                <div class="modal-header pb-0 border-0 justify-content-end">
                                                    <!--begin::Close-->
                                                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                        <!--begin::Svg Icon | path: icons/stockholm/Navigation/Close.svg-->
                                                        <span class="svg-icon svg-icon-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                                                    <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1" />
                                                                    <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)" x="0" y="7" width="16" height="2" rx="1" />
                                                                </g>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </div>
                                                    <!--end::Close-->
                                                </div>
                                                <!--begin::Modal header-->
                                                <!--begin::Modal body-->
                                                <div class="modal-body px-10 px-lg-15 pt-0 pb-15">
                                                    <!--begin::Heading-->
                                                    <div class="mb-10 text-center">
                                                        <h1 class="mb-3">DETAIL TRANSAKSI</h1>
                                                        <div class="text-gray-400 fw-bold fs-5">Informasi Mengenai Detail Transaksi</div>
                                                    </div>
                                                    <!--end::Heading-->
                                                    <!--begin::Scroll-->
                                                    <div class="scroll-y me-n7 pe-7" id="kt_modal_new_target_form" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                                                        <!--begin::Table container-->
                                                        <div class="table-responsive">
                                                            <!--begin::Table-->
                                                            <table id="view_outgoing_table" class="table table-striped border rounded gy-5 gs-7 dataTable no-footer">
                                                                <thead>
                                                                    <tr class="fw-bold fs-6 text-dark">
                                                                        <th class="text-center">No.</th>
                                                                        <th class="text-center">Kode Barang</th>
                                                                        <th class="text-center">Nama Barang</th>
                                                                        <th class="text-center">Total Barang</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @php $no = 1; @endphp
                                                                    @foreach ($outgoing_item->outgoing_item_detail as $outgoing_item_detail)
                                                                        <tr>
                                                                            <td class="text-center">{{ $no++ }}</td>
                                                                            <td class="text-center">{{ $outgoing_item_detail->item->code }}</td>
                                                                            <td class="text-center">{{ $outgoing_item_detail->item->item }}</td>
                                                                            <td class="text-center">{{ $outgoing_item_detail->item_qty }} pcs</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                            <!--end::Table-->
                                                        </div>
                                                        <!--end::Table container-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                </div>
                                                <!--end::Modal body-->
                                            </div>
                                            <!--end::Modal content-->
                                        </div>
                                        <!--end::Modal dialog-->
                                    </div>
                                    <!--end::Modal - New Target-->
                                @endforeach
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
    <script src="{{ asset('assets/js/pages/item/outgoing_item.js') }}"></script>

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
