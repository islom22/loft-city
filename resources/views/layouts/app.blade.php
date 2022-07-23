<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('images/shortcut.svg') }}">

    <!-- Sweet Alert -->
    <link type="text/css" href="{{ asset('app/sweetalert2.min.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Notyf -->
    <link type="text/css" href="{{ asset('app/notyf.min.css') }}" rel="stylesheet">

    <!-- BsMultiSelect -->
    <link rel="stylesheet" href="{{ asset('app/BsMultiSelect.min.css') }}">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Volt CSS -->
    <link type="text/css" href="{{ asset('app/volt.css') }}" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        // CKEDITOR.config.toolbar = [
        // 	{ name: 'document', items : [ 'Undo','Redo'] },
        // ];
        // 	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Subscript','Superscript','Format' ] },
        // CKEDITOR.config.filebrowserBrowseUrl = '/browse.php';
        // CKEDITOR.config.extraPlugins = 'uploadimage';
        CKEDITOR.config.filebrowserUploadUrl = "{{ route('upload-image', ['_token' => csrf_token()]) }}";
        CKEDITOR.config.filebrowserUploadMethod = 'form';
    </script>

    <style>
        .table td,
        .table th {
            white-space: normal;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
        <div class="sidebar-inner px-4 pt-3">
            <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
                <div class="collapse-close d-md-none">
                    <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                        <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <ul class="nav flex-column pt-3 pt-md-0">
                {{-- <li class="nav-item {{ Route::currentRouteName() == 'applications.index' ? 'active' : '' }}">
                    <a href="{{ route('applications.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            {{-- <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>--}}
                            {{-- <i class="fas fa-sms me-2"></i>
                        </span>
                        <span class="sidebar-text">Applications</span>
                    </a>
                </li> --}} 
                <li class="nav-item {{ Route::currentRouteName() == 'products.index' ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <i class="fas fa-handshake me-2"></i>
                            {{-- <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>--}}
                         </span>
                        <span class="sidebar-text">Products</span>
                    </a>
                </li> 
                <li class="nav-item {{ Route::currentRouteName() == 'abouts.index' ? 'active' : '' }}">
                    <a href="{{ route('abouts.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <i class="fas fa-clipboard me-2"></i>
                            {{-- <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>--}}
                         </span>
                        <span class="sidebar-text">Abouts</span>
                    </a>
                </li> 
                <li class="nav-item {{ Route::currentRouteName() == 'reviews.index' ? 'active' : '' }}">
                    <a href="{{ route('reviews.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-city me-2"></i>
                        </span>
                        <span class="sidebar-text">Reviews</span>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteName() == 'orders.index' ? 'active' : '' }}">
                    <a href="{{ route('orders.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#9CA3AF" viewBox="0 0 448 512"><path d="M352 288h-32V224h32c52.94 0 96-43.06 96-96s-43.06-96-96-96s-96 43.06-96 96v32H192V128c0-52.94-43.06-96-96-96S0 75.06 0 128s43.06 96 96 96h32v64H96c-52.94 0-96 43.06-96 96s43.06 96 96 96s96-43.06 96-96v-32h64v32c0 52.94 43.06 96 96 96s96-43.06 96-96S404.9 288 352 288zM320 128c0-17.66 14.34-32 32-32s32 14.34 32 32s-14.34 32-32 32h-32V128zM128 384c0 17.66-14.34 32-32 32s-32-14.34-32-32s14.34-32 32-32h32V384zM128 160H96C78.34 160 64 145.7 64 128s14.34-32 32-32s32 14.34 32 32V160zM256 288H192V224h64V288zM352 416c-17.66 0-32-14.34-32-32v-32h32c17.66 0 32 14.34 32 32S369.7 416 352 416z"/></svg>
                        </span>
                        <span class="sidebar-text">Orders</span>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteName() == 'categories.index' ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#9CA3AF" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M512 448C512 483.3 483.3 512 448 512H64C28.65 512 0 483.3 0 448V224C0 188.7 28.65 160 64 160H448C483.3 160 512 188.7 512 224V448zM440 80C453.3 80 464 90.75 464 104C464 117.3 453.3 128 440 128H72C58.75 128 48 117.3 48 104C48 90.75 58.75 80 72 80H440zM392 0C405.3 0 416 10.75 416 24C416 37.25 405.3 48 392 48H120C106.7 48 96 37.25 96 24C96 10.75 106.7 0 120 0H392z"/></svg>
                        </span>
                        <span class="sidebar-text">Category</span>
                    </a>
                </li>

                <li class="nav-item {{ Route::currentRouteName() == 'files.index' ? 'active' : '' }}">
                    <a href="{{ route('files.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#9CA3AF" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M528 32H144c-26.51 0-48 21.49-48 48v256c0 26.51 21.49 48 48 48H528c26.51 0 48-21.49 48-48v-256C576 53.49 554.5 32 528 32zM223.1 96c17.68 0 32 14.33 32 32S241.7 160 223.1 160c-17.67 0-32-14.33-32-32S206.3 96 223.1 96zM494.1 311.6C491.3 316.8 485.9 320 480 320H192c-6.023 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.332-16.68l70-96C252.1 194.4 256.9 192 262 192c5.111 0 9.916 2.441 12.93 6.574l22.35 30.66l62.74-94.11C362.1 130.7 367.1 128 373.3 128c5.348 0 10.34 2.672 13.31 7.125l106.7 160C496.6 300 496.9 306.3 494.1 311.6zM456 432H120c-39.7 0-72-32.3-72-72v-240C48 106.8 37.25 96 24 96S0 106.8 0 120v240C0 426.2 53.83 480 120 480h336c13.25 0 24-10.75 24-24S469.3 432 456 432z"/></svg>
                        </span>
                        <span class="sidebar-text">File</span>
                    </a>
                </li>

                {{-- <li class="nav-item {{ Route::currentRouteName() == 'certificates.index' ? 'active' : '' }}">
                    <a href="{{ route('certificates.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="#9CA3AF" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 53.46L300.1 7.261C307 1.034 315.1-1.431 324.4 .8185C332.8 3.068 339.3 9.679 341.4 18.1L357.3 80.6L419.3 63.07C427.7 60.71 436.7 63.05 442.8 69.19C448.1 75.34 451.3 84.33 448.9 92.69L431.4 154.7L493.9 170.6C502.3 172.7 508.9 179.2 511.2 187.6C513.4 196 510.1 204.1 504.7 211L458.5 256L504.7 300.1C510.1 307 513.4 315.1 511.2 324.4C508.9 332.8 502.3 339.3 493.9 341.4L431.4 357.3L448.9 419.3C451.3 427.7 448.1 436.7 442.8 442.8C436.7 448.1 427.7 451.3 419.3 448.9L357.3 431.4L341.4 493.9C339.3 502.3 332.8 508.9 324.4 511.2C315.1 513.4 307 510.1 300.1 504.7L256 458.5L211 504.7C204.1 510.1 196 513.4 187.6 511.2C179.2 508.9 172.7 502.3 170.6 493.9L154.7 431.4L92.69 448.9C84.33 451.3 75.34 448.1 69.19 442.8C63.05 436.7 60.71 427.7 63.07 419.3L80.6 357.3L18.1 341.4C9.679 339.3 3.068 332.8 .8186 324.4C-1.431 315.1 1.034 307 7.261 300.1L53.46 256L7.261 211C1.034 204.1-1.431 196 .8186 187.6C3.068 179.2 9.679 172.7 18.1 170.6L80.6 154.7L63.07 92.69C60.71 84.33 63.05 75.34 69.19 69.19C75.34 63.05 84.33 60.71 92.69 63.07L154.7 80.6L170.6 18.1C172.7 9.679 179.2 3.068 187.6 .8185C196-1.431 204.1 1.034 211 7.261L256 53.46z"/></svg>
                        </span>
                        <span class="sidebar-text">Certificates</span>
                    </a>
                </li> --}}

                <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
                <li class="nav-item {{ Route::currentRouteName() == 'translations.index' ? 'active' : '' }}">
                    <a href="{{ route('translations.index') }}" class="nav-link">
                        <span class="sidebar-icon">
                            <i class="fas fa-language me-2"></i>
                            {{-- <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"></path><path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd"></path></svg>--}}
                        </span>
                        <span class="sidebar-text">Translations</span>
                    </a>
                </li>
                <li class="nav-item {{ Route::currentRouteName() == 'langs.index' ? 'active' : '' }}">
                    <span class="nav-link d-flex justify-content-between align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#submenu-app" aria-expanded="false">
                        <span>
                            <span class="sidebar-icon">
                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <span class="sidebar-text">Settings</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>
                    <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false" style="">
                        <ul class="flex-column nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('langs.index') }}">
                                    <span class="sidebar-text">Languages</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <main class="content">

        <nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
            <div class="container-fluid px-0">
                <div class="d-flex justify-content-end w-100" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="border-0" style="background-color: #fff;padding: 12px 20px;border-radius: 8px;">
                            <svg class="dropdown-icon text-danger me-2" fill="none" width="20" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="bg-white rounded shadow p-5 mb-4 mt-4">
            <div class="row">
                <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                    <p class="mb-0 text-center text-lg-start">© <span class="current-year"></span></p>
                </div>
                <div class="col-12 col-md-8 col-xl-6 text-center text-lg-start">

                </div>
            </div>
        </footer>
    </main>

    <!-- Sweet Alerts 2 -->
    <script src="{{ asset('app/sweetalert2.all.min.js') }}"></script>

    <!-- Moment JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

    <!-- Vanilla JS Datepicker -->
    <!-- <script src="../../vendor/vanillajs-datepicker/dist/js/datepicker.min.js"></script> -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Notyf -->
    <script src="{{ asset('app/notyf.min.js') }}"></script>

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <!-- Volt JS -->
    <script src="{{ asset('app/volt.js') }}"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- popperjs -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- BsMultiSelect -->
    <script type="text/javascript" src="{{ asset('app/BsMultiSelect.min.js') }}"></script>

    <!-- my scripts -->
    <script src="{{ asset('app/script.js') }}" type="text/javascript">

    </script>

    <script type="text/javascript">
        @if(Session::has('message'))
        const notyf = new Notyf({
            position: {
                x: 'right',
                y: 'top',
            },
            types: [{
                type: 'info',
                background: '#0948B3'
            }]
        });
        notyf.open({
            type: 'info',
            message: '{{ Session::get('message') }}'
        });
        @endif
    </script>

    @yield('scripts')

</body>

</html>
