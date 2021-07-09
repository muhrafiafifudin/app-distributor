<div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu mt-5" id="side-menu">
                <li class="menu-title">Utama</li>
                
                <li class="{{ request()->is('/') ? 'active' : ''}}">
                <a href="/" class="waves-effect ">
                        <i class="mdi mdi-view-dashboard"></i><span> Dashboard </span>
                    </a>
                </li>
                @if (auth()->user()->level==1)
                    <li class="{{ request()->is('/') ? 'active' : ''}}">
                        <a href="/registrasi" class="waves-effect"><i class="ion-ios7-people"></i><span>Registrasi</span></a>
                    </li>
                @else (auth()->user()->level==2)
                <li class="{{ request()->is('/') ? 'active' : ''}}">
                    <a href="/barang" class="waves-effect"><i class="ion-android-archive"></i><span> Barang </span></a>
                </li>
                
                <li class="{{ request()->is('/') ? 'active' : ''}}">
                    <a href="/penjualan" class="waves-effect"><i class="mdi mdi-cart"></i><span> Penjualan </span></a>
                </li>
                <li class="{{ request()->is('/') ? 'active' : ''}}">
                    <a href="#" class="waves-effect"><i class="mdi mdi-cart"></i><span> Pembelian </span></a>
                </li>
                <li class="{{ request()->is('/') ? 'active' : ''}}">
                    <a href="/operasional" class="waves-effect"><i class="mdi mdi-truck"></i><span> Operasional </span></a>
                </li>
                @endif 

                <li class="menu-title">Laporan</>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-calendar-check"></i><span> Laporan <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                        <li><a href="/laporan-barang">Laporan Barang</a></li>
                        <li><a href="#">Laporan Penjualan</a></li>
                        <li><a href="#">Laporan Pembelian</a></li>
                        <li><a href="/laporan-operasional">Laporan Operasional</a></li>
                    </ul>
                </li>
                

            </ul>

</div>