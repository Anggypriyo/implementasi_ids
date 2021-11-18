        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>



                        <li class="sidebar-item {{request ()->is('blank_page') ? 'active' :'' }}">
                            <a href="/blank_page" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>




                        
                        <li class="sidebar-item {{request ()->is('customer')||request ()->is('tambahCustomer1') ||request ()->is('tambahCustomer2') ? 'active' :'' }}  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="smile" width="20"></i>
                                <span>Customer</span>
                            </a>

                            <ul class="submenu {{request ()->is('customer')||request ()->is('tambahCustomer1') || request ()->is('tambahCustomer2') ? 'active' :'' }}">
                            <!-- <ul class=submenu active"> -->

                                <li  class="submenu-item {{request ()->is('customer') ? 'active' :'' }}">
                                    <a href="{{url('/customer')}}">DataCustomer</a>
                                </li>

                                <li class="submenu-item {{request ()->is('tambahCustomer1') ? 'active' :'' }}">
                                    <a href="{{url('/tambahCustomer1')}}">Tambah Customer 1</a>
                                </li>
                                <li class="submenu-item {{request ()->is('tambahCustomer2') ? 'active' :'' }}">
                                    <a href="{{url('/tambahCustomer2')}}">Tambah Customer 2</a>
                                </li>


                            </ul>

                        </li>
                        
                        <li class="sidebar-item {{request ()->is('barang')||request ()->is('scan') ? 'active' :'' }}  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="briefcase" width="20"></i>
                                <span>Barang</span>
                            </a>

                            <ul class="submenu {{request ()->is('barang')||request ()->is('scan') ? 'active' :'' }}">
                            <!-- <ul class=submenu active"> -->

                                <li  class="submenu-item {{request ()->is('barang') ? 'active' :'' }}">
                                    <a href="{{url('/barang')}}">Data Barang</a>
                                </li>

                                <li class="submenu-item {{request ()->is('scan') ? 'active' :'' }}">
                                    <a href="{{url('/scan')}}">Scan Barang</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item {{request ()->is('toko')||request ()->is('scan_toko') ? 'active' :'' }}  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="map" width="20"></i>
                                <span>Toko</span>
                            </a>

                            <ul class="submenu {{request ()->is('toko')||request ()->is('scan_toko') ? 'active' :'' }}">
                            <!-- <ul class=submenu active"> -->

                                <li  class="submenu-item {{request ()->is('toko') ? 'active' :'' }}">
                                    <a href="{{url('/toko')}}">Data Toko</a>
                                </li>

                                <li class="submenu-item {{request ()->is('scan_toko') ? 'active' :'' }}">
                                    <a href="{{url('/scan_toko')}}">Scan Toko</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>