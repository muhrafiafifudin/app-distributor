@extends('layouts.header')

@section('title', 'Tambah Barang')
    
@section('sidebar')

<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Utama</li>
                <li>
                    <a href="/" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="/barang" class="waves-effect active"><i class="ion-android-archive"></i><span> Barang </span></a>
                </li>
                <li>
                    <a href="/penjualan" class="waves-effect"><i class="mdi mdi-cart"></i><span> Penjualan </span></a>
                </li>
                <li>
                    <a href="#" class="waves-effect"><i class="mdi mdi-cart"></i><span> Pembelian </span></a>
                </li>
                <li>
                    <a href="/operasional" class="waves-effect"><i class="mdi mdi-truck"></i><span> Operasional </span></a>
                </li>

                <li class="menu-title">Laporan</>

                <li>
                    <a href="#" class="waves-effect"><i class="mdi mdi-calendar-check"></i><span> Laporan Bulanan </span></a>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>

@endsection

@section('content')

<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Data Barang</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Utama</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Barang</a></li>
                            <li class="breadcrumb-item active">Tambah Barang</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Tambah Barang</h4>
                            <p class="text-muted m-b-30 ">Tambah barang baru.</p>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error) 
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form  method="post" action="{{ route('barang.update', $barang->id) }}">
                                
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Type something" value="{{ $barang->keterangan }}"/>
                                    <div class="invalid-feedback">
                                        @error('keterangan')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" placeholder="Type something" value="{{ $barang->nama_barang }}"/>
                                    @error('nama_barang')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="ukuran">Ukuran</label>
                                    <input type="text" name="ukuran" id="ukuran" class="form-control @error('ukuran') is-invalid @enderror" placeholder="Type something" value="{{ $barang->ukuran }}"/>
                                    @error('ukuran')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="spesifikasi">Spesifikasi</label>
                                    <input type="text" name="spesifikasi" id="spesifikasi" class="form-control @error('spesifikasi') is-invalid @enderror" placeholder="Type something" value="{{ $barang->spesifikasi }}"/>
                                    @error('spesifikasi')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_bal">Jumlah (Bal)</label>
                                    <div>
                                        <input data-parsley-type="digits" type="text" name="jumlah_bal" id="jumlah_ba"
                                                class="form-control @error('jumlah_bal') is-invalid @enderror" 
                                                placeholder="Enter only numbers" value="{{ $barang->jumlah_bal }}"/>
                                        @error('jumlah_bal')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_lbr">Jumlah (Lbr)</label>
                                    <div>
                                        <input data-parsley-type="number" type="text" name="jumlah_lbr" id="jumlah_lbr"
                                                class="form-control @error('jumlah_lbr') is-invalid @enderror" 
                                                placeholder="Enter only numbers" value="{{ $barang->jumlah_lbr }}"/>
                                        @error('jumlah_lbr')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_total">Jumlah (Total)</label>
                                    <div>
                                        <input data-parsley-type="number" type="text" name="jumlah_total" id="jumlah_total"
                                                class="form-control @error('jumlah_total') is-invalid @enderror" 
                                                placeholder="Enter only numbers" value="{{ $barang->jumlah_total }}"/>
                                        @error('jumlah_total')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                            Submit
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect" data-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->

    <footer class="footer">
            © 2018 - 2019 Lexa - <span class="d-none d-sm-inline-block"> Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</span>.
    </footer>
    
</div>

@endsection