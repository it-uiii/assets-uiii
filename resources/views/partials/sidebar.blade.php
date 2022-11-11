<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-bars"></i>
                    <p>
                        MENU
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @can('letter-list')
                    {{-- <li class="nav-item">
                        <a class="nav-link">
                            <i class="fas fa-envelope nav-icon"></i>
                            <p>
                                Surat
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('outgoing-letter-list')
                            <li class="nav-item">
                                <a href="{{ route('outgoing-letters.index') }}" class="nav-link">
                                    <i class="fa-sharp fa-solid fa-arrow-up nav-icon"></i>
                                    <p>Surat Keluar</p>
                                </a>
                            </li>
                            @endcan
                            @can('entry-letter-list')
                            <li class="nav-item">
                                <a href="{{ route('entry-letters.index') }}" class="nav-link">
                                    <i class="fa-sharp fa-solid fa-arrow-down nav-icon"></i>
                                    <p>Surat Masuk</p>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li> --}}
                    @endcan
                    @can('performance-report-list')
                    {{-- <li class="nav-item">
                        <a class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Laporan Kinerja
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('performance-reports.index') }}" class="nav-link">
                                    <i class="fas fa-file nav-icon"></i>
                                    <p>Managemen Laporan</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    @endcan
                    @can('post-list')
                    {{-- <li class="nav-item">
                        <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Blogs
                            <span class="right badge badge-danger">New</span>
                        </p>
                        </a>
                    </li> --}}
                    @endcan
                    @can('asset-list')
                    <li class="nav-item">
                        <a href="{{ route('assets.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>
                            Data Barang
                        </p>
                        </a>
                    </li>
                    @endcan
                    @can('logistic-list')
                    <li class="nav-item">
                        <a href="{{ route('logistics.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-truck-fast"></i>
                        <p>
                            Logistik
                        </p>
                        </a>
                    </li>
                    @endcan
                    @can('supplier-list')
                    <li class="nav-item">
                        <a href="{{ route('suppliers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-boxes-packing"></i>
                        <p>
                            Suppliers
                        </p>
                        </a>
                    </li>
                    @endcan
                    @can('location-list')
                    <li class="nav-item">
                        <a href="{{ route('locations.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-location-pin"></i>
                        <p>
                            Lokasi
                        </p>
                        </a>
                    </li>
                    @endcan
                    @can('sumber-list')
                    <li class="nav-item">
                        <a href="{{ route('sourceincome.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-hand-holding-heart"></i>
                        <p>
                            Sumber Perolehan
                        </p>
                        </a>
                    </li>
                    @endcan
                    @can('golongan-list')
                    <li class="nav-item">
                        <a href="{{ route('itemgroups.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            Golongan Barang
                        </p>
                        </a>
                    </li>
                    @endcan
                    @can('human-list')
                    {{-- <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Managemen SDM
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('employees.index') }}" class="nav-link">
                                    <i class="fas fa-archive nav-icon"></i>
                                    <p>Employees</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    @endcan
                    @can('admin-list')
                    {{-- <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="nav-icon fas fa-wrench"></i>
                            <p>
                                Settings
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('user-list')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                            @endcan
                            @can('position-list')
                                <li class="nav-item">
                                    <a href="{{ route('positions.index') }}" class="nav-link">
                                        <i class="fas fa-user-tie nav-icon"></i>
                                        <p>Jabatan</p>
                                    </a>
                                </li>
                            @endcan
                            @can('role-list')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link">
                                        <i class="fas fa-user-tag nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            @endcan
                            @can('permission-list')
                                <li class="nav-item">
                                    <a href="{{ route('permissions.index') }}" class="nav-link">
                                        <i class="fas fa-user-lock nav-icon"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li> --}}
                    @endcan
                </ul>
            </li>
            {{-- @foreach ($menu as $item => $value)
                <li class="nav-item">
                    <a href="" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        {{ $value->menu_name }}
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    @foreach ($submenu as $key)
                    @if ($value->menu_id == $key->menu_id)
                    <li class="nav-item">
                        <a href="/permissions" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ $key->sub_name }}</p>
                        </a>
                    </li>
                    @endif
                    @endforeach
                    </ul>
                </li>
            @endforeach --}}
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
