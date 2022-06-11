<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Laundry - @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  </head>
<body>

    <div class="container-scroller">
        <!-- partial:partials -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <a class="sidebar-brand brand-logo h3 text-white" href="#">
                {{-- <img src="assets/images/logo.svg" alt="logo" /> --}}
                Laundry
            </a>
            <a class="sidebar-brand brand-logo-mini h1 text-white" href="#">
                L
                {{-- <img src="assets/images/logo-mini.svg" alt="logo" /> --}}
            </a>
          </div>
          <ul class="nav">
            <li class="nav-item profile">
              <div class="profile-desc">
                <div class="profile-pic">
                  <div class="count-indicator">
                    
                    {{-- <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt=""> --}}
                    @if (!empty(auth()->user()->avatar))
                    <img class="img-xs rounded-circle" src="{{ url("storage/".auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">
                    @else
                      <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face15.jpg')}}" alt="{{ auth()->user()->name }}">
                    @endif
                  </div>
                  <div class="profile-name">
                    <h5 class="mb-0 font-weight-normal">Miguel Leite</h5>
                    <span>Administrador</span>
                  </div>
                </div>
                <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                  <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-primary"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1 text-small">Definições de conta</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-onepassword  text-info"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject ellipsis mb-1 text-small">Alterar senha</p>
                    </div>
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item nav-category">
                <span class="nav-link">Menu</span>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('pages.home') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('pages.userList') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Usuarios</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('pages.categoryList') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-format-list-bulleted-type"></i>
                </span>
                <span class="menu-title">Categoria</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('pages.fabricList') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Tecidos</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('pages.serviceList') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-bullhorn"></i>
                </span>
                <span class="menu-title">Serviços</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('pages.clothingList') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-hanger"></i>
                </span>
                <span class="menu-title">Vestuario</span>
              </a>
            </li>
            <li class="nav-item menu-items">
              <a class="nav-link" href="{{ route('pages.toWashList') }}">
                <span class="menu-icon">
                  <i class="mdi mdi-import"></i>
                </span>
                <span class="menu-title">Encomenda</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
          <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="#"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
              <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
              </button>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                    <div class="navbar-profile">
                      @if (!empty(auth()->user()->avatar))
                      <img class="img-xs rounded-circle" src="{{ url("storage/".auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">
                      @else
                        <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face15.jpg')}}" alt="{{ auth()->user()->name }}">
                      @endif
                      <p class="mb-0 d-none d-sm-block navbar-profile-name">{{ auth()->user()->name }}</p>
                      <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                    <h6 class="p-3 mb-0">Perfil</h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-settings text-success"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Configurações</p>
                      </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                      <div class="preview-thumbnail">
                        <div class="preview-icon bg-dark rounded-circle">
                          <i class="mdi mdi-logout text-danger"></i>
                        </div>
                      </div>
                      <div class="preview-item-content">
                        <p class="preview-subject mb-1">Sair</p>
                      </div>
                    </a>
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
              </button>
            </div>
          </nav>
          <!-- partial -->
          <div class="main-panel">
            <div class="content-wrapper">

                @yield('content')

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                    Copyright © Laundry 2022 - Todos os direitos reservados
                </span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>

    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- endinject -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/chart.js') }}"></script>
    <script src="{{ asset('assets/js/file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>