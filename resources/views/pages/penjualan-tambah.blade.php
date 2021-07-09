@extends('layouts.header')

@section('title', 'Tambah Transaksi')

@section('sidebar')

<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Utama</li>
                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="/barang" class="waves-effect"><i class="ion-android-archive"></i><span> Barang </span></a>
                </li>
                <li>
                    <a href="/penjualan" class="waves-effect active"><i class="mdi mdi-cart"></i><span> Penjualan </span></a>
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
                        <h4 class="page-title">Transaksi</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Utama</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Transaksi</a></li>
                            <li class="breadcrumb-item active">Tambah Penjualan</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Transaksi Penjualan</h4>
                            <p class="text-muted m-b-30">Tambah Transaksi Penjualan</p>
                            
                            <form  method="post" action="{{ route('penjualan.create') }}">

                                @csrf

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-1 col-form-label"><strong>Barang</strong></label>
                                    
                                    <select class="form-control col-sm-2">
                                        <option>Keterangan</option>
                                        @foreach ($barangs as $item)
                                            <option value="{{ $item->id }}">{{ $item->keterangan }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control col-sm-2 ml-1">
                                        <option>Nama Barang</option>
                                        @foreach ($barangs as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control col-sm-2 ml-1">
                                        <option>Ukuran</option>
                                        @foreach ($barangs as $item)
                                            <option value="{{ $item->id }}">{{ $item->ukuran }}</option>
                                        @endforeach
                                    </select>
                                    <select class="form-control col-sm-2 ml-1">
                                        <option>Spesifikasi</option>
                                        @foreach ($barangs as $item)
                                            <option value="{{ $item->id }}">{{ $item->spesifikasi }}</option>
                                        @endforeach
                                    </select>
                                    <input class="form-control col-sm-1 ml-1" type="number" value="" id="example-number-input">
                                    <button type="button" class="btn btn-primary waves-effect waves-light col-sm-1 ml-1">Tambah</button>
                                </div>

                            </form>

                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="text-left"><strong>Keterangan</strong></th>
                                                    <th class="text-left"><strong>Nama Barang</strong></th>
                                                    <th class="text-center"><strong>Harga</strong></th>
                                                    <th class="text-center"><strong>Qty</strong></th>
                                                    <th class="text-right"><strong>Subtotal</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <form method="post" action="">
                                                            <button type="submit" class="btn waves-effect waves-light ion-close">
                                                        </form>
                                                    </td>
                                                    <td class="text-left">POLOS TANPA PRINT</td>
                                                    <td class="text-left">PUTIH DOF</td>
                                                    <td class="text-center">25000</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">25000</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <form method="post" action="">
                                                            <button type="submit" class="btn waves-effect waves-light ion-close">
                                                        </form>
                                                    </td>
                                                    <td class="text-left">POLOS TANPA PRINT</td>
                                                    <td class="text-left">PUTIH DOF</td>
                                                    <td class="text-center">25000</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">25000</td>
                                                </tr>   
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <strong>2</strong>
                                                    </td>
                                                    <td class="text-right">
                                                    <strong>50000</strong> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <br>
                                            <br>
                                            <a href="#" class="btn btn-success waves-effect waves-light">Pesan</a>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->

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