@extends('layouts.app')

@section('title')
    Transaksi
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
                    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">Transaksi
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
                                <span class="card-label fw-bolder fs-3 mb-1">Transaksi</span>
                                <span class="text-muted mt-1 fw-bold fs-7">Digunakan untuk melakukan transaksi</span>
                            </h3>
                            <div class="card-toolbar">
                                <div class="button-add">
                                    <a href="" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#modal_add_transaction">
                                    <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Tambah Barang</a>
                                </div>
                            </div>

                            <!--begin::Modal - New Target-->
                            <div class="modal fade" id="modal_add_transaction" tabindex="-1" aria-hidden="true">
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
                                                <h1 class="mb-3">TAMBAH BARANG</h1>
                                                <div class="text-gray-400 fw-bold fs-5">Form Untuk Menambah Data Barang</div>
                                            </div>
                                            <!--end::Heading-->
                                            <!--begin::Scroll-->
                                            <div class="scroll-y me-n7 pe-7" id="kt_modal_new_target_form" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_new_address_header" data-kt-scroll-wrappers="#kt_modal_new_address_scroll" data-kt-scroll-offset="300px">
                                                <!--begin::Table container-->
                                                <div class="table-responsive">
                                                    <!--begin::Table-->
                                                    <table id="item_transaction_table" class="table table-striped border rounded gy-5 gs-7 dataTable no-footer">
                                                        <thead>
                                                            <tr class="fw-bold fs-6 text-dark">
                                                                <th class="text-center" >No.</th>
                                                                <th class="text-center" >Kode Barang</th>
                                                                <th class="text-center" >Nama Barang</th>
                                                                <th class="text-center" >Status</th>
                                                                <th class="text-center" >Total Barang</th>
                                                                <th class="text-center" >Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $no = 1; @endphp
                                                            @foreach ($items as $item)
                                                                <tr>
                                                                    <td align="center" valign="middle">{{ $no++ }}</td>
                                                                    <td align="center" valign="middle">{{ $item->code }}</td>
                                                                    <td align="center" valign="middle">{{ $item->item }}</td>
                                                                    <td align="center" valign="middle">
                                                                        @if ($item->stock !== 0)
                                                                            <span class="badge badge-success">Tersedia</span>
                                                                        @else
                                                                            <span class="badge badge-danger">Tidak Tersedia</span>
                                                                        @endif
                                                                    </td>
                                                                    <td align="center" valign="middle">{{ $item->stock . ' pcs' }}</td>
                                                                    <td align="center" valign="middle">
                                                                        @if ($item->stock !== 0)
                                                                            <form action="{{ route('transaction.add-item') }}" method="POST">
                                                                                @csrf
                                                                                @method('POST')

                                                                                <input type="hidden" name="item_id" value="{{ $item->id }}">

                                                                                <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" title="Tambah">
                                                                                    <!--begin::Svg Icon | path: assets/media/icons/duotone/Interface/Plus-Square.svg-->
                                                                                    <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                            <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z" fill="#12131A"/>
                                                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z" fill="#12131A"/>
                                                                                        </svg>
                                                                                    </span>
                                                                                    <!--end::Svg Icon-->
                                                                                </button>
                                                                            </form>
                                                                        @else
                                                                            <a href="#" class="btn btn-bg-light btn-active-color-muted" disabled>
                                                                                <!--begin::Svg Icon | path: assets/media/icons/duotone/Interface/Plus-Square.svg-->
                                                                                <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M6.54184 2.36899C4.34504 2.65912 2.65912 4.34504 2.36899 6.54184C2.16953 8.05208 2 9.94127 2 12C2 14.0587 2.16953 15.9479 2.36899 17.4582C2.65912 19.655 4.34504 21.3409 6.54184 21.631C8.05208 21.8305 9.94127 22 12 22C14.0587 22 15.9479 21.8305 17.4582 21.631C19.655 21.3409 21.3409 19.655 21.631 17.4582C21.8305 15.9479 22 14.0587 22 12C22 9.94127 21.8305 8.05208 21.631 6.54184C21.3409 4.34504 19.655 2.65912 17.4582 2.36899C15.9479 2.16953 14.0587 2 12 2C9.94127 2 8.05208 2.16953 6.54184 2.36899Z" fill="#12131A"/>
                                                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 17C12.5523 17 13 16.5523 13 16V13H16C16.5523 13 17 12.5523 17 12C17 11.4477 16.5523 11 16 11H13V8C13 7.44772 12.5523 7 12 7C11.4477 7 11 7.44772 11 8V11H8C7.44772 11 7 11.4477 7 12C7 12.5523 7.44771 13 8 13H11V16C11 16.5523 11.4477 17 12 17Z" fill="#12131A"/>
                                                                                    </svg>
                                                                                </span>
                                                                                <!--end::Svg Icon-->
                                                                            </a>
                                                                        @endif
                                                                    </td>
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
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body py-3 pt-10">
                            <form action="">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table id="transaction_table" class="table table-striped border rounded gy-5 gs-7 dataTable no-footer">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-dark">
                                                <th>No.</th>
                                                <th>Kode</th>
                                                <th>Nama Barang</th>
                                                <th class="text-center">Total Barang</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($cartItems as $cartItem)
                                                <tr class="item-data">
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $cartItem->item->code }}</td>
                                                    <td>{{ $cartItem->item->item }}</td>
                                                    <td class="text-center">
                                                        <!--begin::Dialer-->
                                                        <div class="input-group w-md-300px" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="{{ $cartItem->item->stock }}" data-kt-dialer-step="1" data-kt-dialer-suffix=" pcs">

                                                            <!--begin::Decrease control-->
                                                            <button class="btn btn-icon btn-outline btn-outline-secondary" type="button" data-kt-dialer-control="decrease">
                                                                <i class="bi bi-dash fs-1"></i>
                                                            </button>
                                                            <!--end::Decrease control-->

                                                            <!--begin::Input control-->
                                                            <input type="text" class="form-control" readonly placeholder="Amount" value="{{ $cartItem->item_qty }}" data-kt-dialer-control="input"/>
                                                            <!--end::Input control-->

                                                            <!--begin::Increase control-->
                                                            <button class="btn btn-icon btn-outline btn-outline-secondary" type="button" data-kt-dialer-control="increase">
                                                                <i class="bi bi-plus fs-1"></i>
                                                            </button>
                                                            <!--end::Increase control-->
                                                        </div>
                                                        <!--end::Dialer-->

                                                        {{-- <!--begin::Dialer-->
                                                        <div class="position-relative w-lg-200px m-0-auto" id="kt_modal_create_project_budget_setup" data-kt-dialer="true" data-kt-dialer-min="1" data-kt-dialer-max="{{ $cartItem->item->stock }}" data-kt-dialer-step="1" data-kt-dialer-suffix=" pcs">
                                                            <!--begin::Decrease control-->
                                                            <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 start-0" data-kt-dialer-control="decrease">
                                                                <!--begin::Svg Icon | path: icons/stockholm/Code/Minus.svg-->
                                                                <span class="svg-icon svg-icon-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                                        <rect fill="#000000" x="6" y="11" width="12" height="2" rx="1" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button>
                                                            <!--end::Decrease control-->
                                                            <!--begin::Input control-->
                                                            <input type="text" class="form-control form-control-solid border-0 text-center" data-kt-dialer-control="input" placeholder="Amount" name="budget_setup" readonly="readonly" value="{{ $cartItem->item_qty }}" />
                                                            <!--end::Input control-->
                                                            <!--begin::Increase control-->
                                                            <button type="button" class="btn btn-icon btn-active-color-gray-700 position-absolute translate-middle-y top-50 end-0" data-kt-dialer-control="increase">
                                                                <!--begin::Svg Icon | path: icons/stockholm/Code/Plus.svg-->
                                                                <span class="svg-icon svg-icon-1">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                                        <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000" />
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                            </button>
                                                            <!--end::Increase control-->
                                                        </div>
                                                        <!--end::Dialer--> --}}
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="hidden" class="item-id" value="{{ $cartItem->item_id }}">

                                                        <button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm delete-data" title="Hapus">
                                                            <!--begin::Svg Icon | path: icons/stockholm/General/Trash.svg-->
                                                            <span class="svg-icon svg-icon-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                        <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero" />
                                                                        <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                                    </g>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->

                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-light-primary mt-10 mb-10">
                                        <!--begin::Svg Icon | path: icons/stockholm/Communication/Add-user.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->Tambah Barang
                                    </button>
                                </div>
                            </form>
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
    <script src="{{ asset('assets/js/pages/transaction/transaction.js') }}"></script>

    @if($message = Session::get('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.success("{{ $message }}");
            })
        </script>
    @endif

    @if($message = Session::get('warning'))
        <script type="text/javascript">
            $(document).ready(function() {
                toastr.warning("{{ $message }}");
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
