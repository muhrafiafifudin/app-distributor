@extends('layouts.header')

@section('title', 'Transaksi')

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
                            <li class="breadcrumb-item active">Detail Transaksi</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-20">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        <h3 class="mt-0 text-center">
                                            <img src="assets/images/logo.png" alt="logo" height="24"/>
                                        </h3>
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr class="table-borderless">
                                                    <th colspan="3" class="text-left">
                                                        <h4 class="font-14"><strong>No. Transaksi : 12</strong></h4>
                                                    </th>
                                                    <th colspan="2" class="text-right">
                                                        <h4 class="font-14"><strong>12/05/2021 20:50:05</strong></h4>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="5" class="text-center">
                                                        <h3 class="font-14"><strong>Detail Transaksi</strong></h3>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td><strong>No.</strong></td>
                                                    <td class="text-center"><strong>Nama Barang</strong></td>
                                                    <td class="text-center"><strong>Harga</strong></td>
                                                    <td class="text-center"><strong>Qty</strong></td>
                                                    <td class="text-right"><strong>Subtotal</strong></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>BS-200</td>
                                                    <td class="text-center">$10.99</td>
                                                    <td class="text-center">$10.99</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$10.99</td>
                                                </tr>
                                                <tr>
                                                    <td>BS-400</td>
                                                    <td class="text-center">$20.00</td>
                                                    <td class="text-center">$60.00</td>
                                                    <td class="text-center">3</td>
                                                    <td class="text-right">$10.99</td>
                                                </tr>
                                                <tr>
                                                    <td>BS-1000</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">$600.00</td>
                                                    <td class="text-center">1</td>
                                                    <td class="text-right">$10.99</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center"></td>
                                                    <td class="text-center"></td>
                                                    <td class="text-center">
                                                        <strong>Total</strong>
                                                    </td>
                                                    <td class="text-center">
                                                        <strong>4</strong>
                                                    </td>
                                                    <td class="text-right">
                                                    <strong>$685.99 </strong> 
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                            <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
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