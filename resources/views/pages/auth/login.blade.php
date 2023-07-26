@extends('layouts.auth')

@section('title')
    Login
@endsection

@section('content')
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-size1: 100% 50%; background-image: url(assets/media/svg/illustrations/progress.svg)">
        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Logo-->
            {{-- <a href="index.html" class="mb-12">
                <img alt="Logo" src="{{ asset('assets/media/logos/logo-2-dark.svg') }}" class="h-45px" />
            </a> --}}
            <!--end::Logo-->
            <!--begin::Wrapper-->
            <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Form-->
                <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}" method="POST" >
                    @csrf
                    @method('POST')

                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">MASUK</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">
                            Silahkan login untuk melanjutkan
                        </div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->

                    @error('validation')
                        <!--begin::Alert-->
                        <div class="alert alert-danger d-flex align-items-center p-4 mb-5">
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-column">
                                <!--begin::Content-->
                                <span>{{ $message }}</span>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Close-->
                            <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                <!--begin::Svg Icon | path: assets/media/icons/stockholm/Navigation/Close.svg-->
                                <span class="svg-icon svg-icon-danger svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)" fill="#000000">
                                            <rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>
                                            <rect fill="#000000" opacity="0.5" transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000) " x="0" y="7" width="16" height="2" rx="1"/>
                                        </g>
                                </svg></span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--end::Close-->
                        </div>
                        <!--end::Alert-->
                    @enderror

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="text" name="email" autocomplete="off" placeholder="Masukkan email" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" placeholder="********" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary fw-bolder me-3 my-2">
                            <span class="indicator-label">Sign In</span>
                            <span class="indicator-progress">Silahkan tunggu...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <!--end::Submit button-->
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->
    </div>
@endsection
