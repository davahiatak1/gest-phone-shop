<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="shortcut icon" href="{{asset('images/logo/favicon.png')}}">

    <!-- plugins css -->
    <link rel="stylesheet" href="{{asset('vendors/bootstrap/dist/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/PACE/themes/blue/pace-theme-minimal.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" />

    <!-- page plugins css -->
    <link rel="stylesheet" href="{{asset('vendors/datatables/media/css/jquery.dataTables.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/selectize/dist/css/selectize.default.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" />
    <link rel="stylesheet" href="{{asset('vendors/summernote/dist/summernote.css')}}" />

    <!-- core css -->
    <link href="{{asset('css/ei-icon.css')}}" rel="stylesheet">
    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>

    <div class="app">
        <div class="layout">
            @auth
                @includeIf('partials.side-nav')
            @endauth

            <div class="page-container">
                @auth
                    @includeIf('partials.navbar')
                @endauth

                <button class="theme-toggle btn btn-rounded btn-icon">
                    <i class="ti-palette"></i>
                </button>

                <div class="main-content">
                    
                    @yield('content')
                    
                </div>

                @auth

                    @includeIf('products.create')
                    @includeIf('products.edit')
                    @includeIf('products.delete')

                    @includeIf('categories.create')
                    @includeIf('categories.edit')
                    @includeIf('categories.delete')

                    @includeIf('payment-methods.create')
                    @includeIf('payment-methods.edit')
                    @includeIf('payment-methods.delete')

                    @includeIf('unit-measures.create')
                    @includeIf('unit-measures.edit')
                    @includeIf('unit-measures.delete')

                    @includeIf('customers.create')
                    @includeIf('customers.edit')
                    @includeIf('customers.delete')

                    @includeIf('suppliers.create')
                    @includeIf('suppliers.edit')
                    @includeIf('suppliers.delete')

                    @includeIf('stocks.create')
                    @includeIf('stocks.edit')
                    @includeIf('stocks.delete')

                    @includeIf('sells.create')
                    @includeIf('sells.edit')
                    @includeIf('sells.delete')

                    @includeIf('expense-types.create')
                    @includeIf('expense-types.edit')
                    @includeIf('expense-types.delete')

                    @includeIf('expenses.create')
                    @includeIf('expenses.edit')
                    @includeIf('expenses.delete')

                    <footer class="content-footer">
                        <div class="footer">
                            <div class="copyright">
                                <span>Copyright © 2020 <b class="text-dark">ProConsulting</b></span>
                            </div>
                        </div>
                    </footer>
                @endauth

            </div>

        </div>
    </div>


    <script src="{{asset('js/vendor.js')}}"></script>
    <script src="{{asset('js/app.min.js')}}"></script>
    <script src="{{asset('vendors/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/notify.min.js')}}"></script>
    <script src="{{asset('vendors/selectize/dist/js/standalone/selectize.min.js')}}"></script>
    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('vendors/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
    <script src="{{asset('vendors/summernote/dist/summernote.min.js')}}"></script>

    @include('sweetalert::alert')

    @stack('scripts')




</body>
</html>
