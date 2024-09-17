<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png?v=1') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Custom fonts for this template-->
    <link href="{{ asset('adminAssets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">
    <link href="{{ asset('adminAssets/css/sb-admin-2.css') }}" rel="stylesheet">

    <style>
        .note-editable, #description{
            font-family: 'Poppins';
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background: #22323c;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo_light.png') }}" class="w-100 py-3" style="max-width: 180px;" alt="" srcset="">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Escritorio</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administrar
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Productos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Productos:</h6>
                        <a class="collapse-item" href="{{ url('products/create') }}">Cargar un Producto</a>
                        <a class="collapse-item" href="{{ url('products/filter') }}">Todos los Productos</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCat"
                    aria-expanded="true" aria-controls="collapseCat">
                    <i class="fas fa-fw fa-grip-vertical"></i>
                    <span>Categorías</span>
                </a>
                <div id="collapseCat" class="collapse" aria-labelledby="headingCat" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Categorías:</h6>
                        <a class="collapse-item" href="{{ url('categories/create') }}">Crear una Categoría</a>
                        <a class="collapse-item" href="{{ url('categories') }}">Todos las Categorías</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrands"
                    aria-expanded="true" aria-controls="collapseBrands">
                    <i class="fas fa-fw fa-tag"></i>
                    <span>Marcas</span>
                </a>
                <div id="collapseBrands" class="collapse" aria-labelledby="headingBrands" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Marcas:</h6>
                        <a class="collapse-item" href="{{ url('brands/create') }}">Cargar una Marca</a>
                        <a class="collapse-item" href="{{ url('brands') }}">Todos las Marcas</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('orders') }}">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Órdenes</span>
                </a>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('messages') }}">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span>Mensajes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUsers" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Usuarios:</h6>
                        <a class="collapse-item" href="{{ route('users.create') }}">Registrar Usuario</a>
                        <a class="collapse-item" href="{{ route('users.index') }}">Todos los Usuarios</a>
                    </div>
                </div>
            </li>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <a href="{{ url('/') }}" target="_blank" class="btn btn-primary btn-sm">
                                <i class="fas fa-home"></i> Página Principal
                            </a>
                        </div>
                    </div>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw text-primary"></i>
                                <!-- Counter - Alerts -->
                                @if(!(intval($unreadNotifications) == 0))
                                    <span class="badge badge-danger badge-counter">{{ $unreadNotifications }}</span>
                                @endif
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    <i class="fas fa-bell fa-fw"></i> Notificaciones
                                </h6>
                                @forelse($notifications as $notification)
                                <a class="dropdown-item d-flex align-items-center" 
                                    href="{{ $notification['url'] }}">
                                    <div class="mr-3">
                                        <div class="icon-circle {{ $notification['type'] == 'conection' ? 'bg-primary' : 'bg-success' }}">
                                            @if($notification['type'] == 'conection')
                                                <i class="fas fa-user-plus text-white"></i>
                                            @else
                                                <i class="fas fa-file-alt text-white"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small">{{ $notification['created_at']->diffForHumans() }} @if(!$notification['is_read']) <span class="badge badge-danger small ml-1">No Leido</span> @endif</div>
                                        <span class="font-weight-bold">{{ $notification['title'] }}</span>
                                    </div>
                                </a>
                                @empty
                                <div class="row">
                                    <div class="col-md-12 pt-3 pb-2 text-center">
                                        <h6>No hay notificaciones disponibles</h6>
                                    </div>
                                </div>
                                @endforelse

                                <a class="dropdown-item text-center text-uppercase font-weight-bold" href="{{ url('orders') }}">
                                    <span style="font-size: 11px; font-weight:900;">Todas las Órdenes</span> 
                                </a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw text-primary"></i>
                                <!-- Counter - Messages -->
                                @if(!(intval($unreadMessages) == 0))
                                    <span class="badge badge-danger badge-counter">{{ $unreadMessages }}</span>
                                @endif
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    <i class="fas fa-envelope fa-fw"></i> Mensajes
                                </h6>
                                @forelse($messages as $message)
                                    <a class="dropdown-item d-flex align-items-center" href="{{ url('messages/' . $message->id) }}">
                                        <div>                                         
                                            <div class="text-truncate font-weight-bold">{{ $message->name }}</div>
                                            <div class="text-truncate">{{ Str::limit($message->subject, 70) }}</div>
                                            <div class="small">
                                                {{ $message->created_at->diffForHumans() }}
                                                @if(!$message->is_read)
                                                    <span class="badge badge-danger small ml-1">No Leído</span>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="row">
                                        <div class="col-md-12 pt-3 pb-2 text-center">
                                            <h6>No hay notificaciones disponibles</h6>
                                        </div>
                                    </div>
                                @endforelse
                                <a class="dropdown-item text-center font-weight-bold" href="{{ url('messages') }}">Ver todos los mensajes</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('adminAssets/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <form method="POST" action="{{ route('logout') }}" id="logout">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="javascript:void(0);" onclick="document.getElementById('logout').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('adminAssets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminAssets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('adminAssets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('adminAssets/js/sb-admin-2.min.js') }}"></script>


    <script src="{{ asset('adminAssets/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts 
        <script src="{{ asset('adminAssets/js/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('adminAssets/js/demo/chart-pie-demo.js') }}"></script>
    -->

    @yield('charts')

    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>
    <script src="{{ asset('adminAssets/js/script.js') }}"></script>

    @if(session()->has('error'))
        <script>
            var colorError = '#dc3545';
            Swal.fire({
                icon:'error', 
                title:'Ha ocurrido un error!', 
                text: "{{ session('error') }}", 
                confirmButtonText: "OK", 
                confirmButtonColor: colorError
            })
        </script>
    @endif
    
    @if(session()->has('message'))
        <script>
            var colorSuccess = '#28a745';
            Swal.fire({
                icon:'success', 
                title:'', 
                text: "{{ session('message') }}", 
                confirmButtonText: 'OK', 
                confirmButtonColor: colorSuccess
            })
        </script>
    @endif
</body>

</html>