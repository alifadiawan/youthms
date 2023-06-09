<aside class="main-sidebar sidebar-dark-primary elevation-4"
    style="background-color: #1864BA;">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('youth-logo.svg') }}" alt="Youthms Logo" class="m-3 brand-images">
    </a>

    <x-notify::notify />

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline mt-3">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control " type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-primary">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                {{-- <li class="nav-header">MENU</li> --}}
                <li class="nav-item">

                    <a href="/dashboard" class="nav-link">

                        <i class="nav-icon fa-solid fa-chart-simple"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/member" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Member
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="/employee" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Employee
                        </p>
                    </a>
                </li>
 -->                <li class="nav-item">
                    <a href="/user" class="nav-link">
                        <i class="nav-icon fa-solid fa-user-gear"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('blogs.index')}}" class="nav-link">
                        <i class=" nav-icon fa-brands fa-readme"></i>
                        <p>
                            Blog
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/services" class="nav-link">
                        <i class="nav-icon fa-solid fa-cubes"></i>
                        <p>
                            Services
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('services.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Services</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('services.ilustrasi')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Services Illustration</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('store.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-store"></i>
                        <p>
                            Store
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('store.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('paket.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Paket</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/transaksi" class="nav-link">
                        <i class="nav-icon fa-solid fa-cart-shopping"></i>
                        <p>
                            Transaksi
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('transaksi.index') }}" class="nav-link">
                            {{-- <a href="{{ route('transaksi.history') }}" class="nav-link"> --}}
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Transaksi
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('requestuser.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Status Kredit
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pembayaran.index') }}" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    List Pembayaran
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="/chat" class="nav-link">
                        <i class="nav-icon fa-solid fa-comment-dots"></i>
                        <p>
                            Chat
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('portfolio.index')}}" class="nav-link">
                        <i class="nav-icon fa-solid fa-briefcase"></i>
                        <p>
                            Portofolio
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('portfolio.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Portofolio</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('portofolio.ilustrasi')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Porto Page Illustration</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/landing-page" class="nav-link">
                        <i class="nav-icon fa-solid fa-display"></i>
                        <p>
                            Landing Page
                        </p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('landing.illustration') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Illustration</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('landing.data') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Testimonial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('landing.text') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Welcome</p>
                            </a>
                        </li>
                    </ul>
                </li>


                {{-- <li class="nav-item menu-open">
            <a href="{{url('landing-page')}}" class="nav-link">
                <i class="nav-icon fa-solid fa-display"></i>
              <p>
                Landing Page
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
            </ul>
          </li> --}}


                {{-- <li class="nav-header">LABELS</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Important</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Warning</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Informational</p>
              </a>
            </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
