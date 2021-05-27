<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name') }}</title>

    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- boot --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> --}}

    {{-- font aw --}}
    {{-- <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"
        integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />

    <!-- Fontfaces CSS-->
    <link href="{{ asset('lms/css/font-face.css') }}" rel="stylesheet" media="all">
    {{-- <link href="{{ asset('lms/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('lms/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all"> --}}
    <link href="{{ asset('lms/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('lms/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('lms/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('lms/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('lms/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('lms/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('lms/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('lms/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('lms/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('lms/vendor/icofont/icofont.min.css') }}" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{ asset('lms/css/theme.css') }}" rel="stylesheet" media="all">

    {{-- datatables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/date-1.0.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/date-1.0.3/datatables.min.js"></script>
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> --}}
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.css" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css"> --}}

    {{-- ijabo --}}
    <link rel="stylesheet" href="{{ asset('lms/ijaboCropTool/ijaboCropTool.min.css') }}">

    
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- jquery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}

    {{-- <script>
        $(document).ready(function(){
            $('#dash').click(function(){
                $('li').removeClass('active');
                $('#ldash').addClass('active');
            });

            $('#dg').click(function(){
                $('li').removeClass('active');
                $('#ldg').addClass('active');
            });
        });
    </script> --}}
</head>

<body class="animsition">
    <div class="page-wrapper">
        @if (Auth::user()->hasRole('admin'))
        @include('layouts.navigation', ['cekJurusan' => $cekJurusan, 'cekKelas' => $jmlKelas])
        @elseif (Auth::user()->hasRole('guru'))
        @include('layouts.nav-guru')
        @elseif (Auth::user()->hasRole('siswa'))
        @include('layouts.nav-siswa')
        @endif

        <main>
            {{ $slot }}
        </main>
    </div>

    {{-- </div> --}}

    <!-- Jquery JS-->
    <script src="{{ asset('lms/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('lms/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('lms/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('lms/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('lms/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lms/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('lms/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('lms/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('lms/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('lms/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('lms/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('lms/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('lms/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('lms/js/main.js') }}"></script>

    {{-- boot --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script> --}}

    {{-- datatable --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.js">
    </script> --}}
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script> --}}

    {{-- ijabo --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  --}}
    <script type="text/javascript" src="{{ asset('lms/ijaboCropTool/jquery-1.7.1.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('lms/ijaboCropTool/ijaboCropTool.min.js') }}"></script> 

    {{-- datatable --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/date-1.0.3/datatables.min.js"></script>
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.min.js">
    </script> --}}
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script> --}}

    {{-- jquery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    
    {{-- cropper --}}
    {{-- <script src="https://unpkg.com/cropperjs"></script> --}}

    <script>
        $(document).ready(function() {
            $('#table').DataTable( {
                "scrollX": true,
                "lengthMenu": [ [5, 10, 25, -1], [5, 10, 25, "All"] ],
                dom: 'Bflrtip',
                buttons: [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    // {
                    //     extend: 'pdfHtml5',
                    //     exportOptions: {
                    //         columns: ':visible:not(.not-export-col)'
                    //     }
                    // },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible:not(.not-export-col)'
                        }
                    },
                    // 'colvis'
                ]
                // buttons: [ 'pdf', 'excel' ]
            } );
        });
        // $(document).ready(function () {
        //     $('#table').DataTable({
        //         "scrollX": true
                
        //     });
        // });

        // $(document).off('focusin.modal');
    </script>

<script>
    $(document).ready(function() {
        $('#tabel').DataTable({
            "scrollX": true,
            "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
            dom: 'Bflrtip',
            buttons: [
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    }
                },
                // {
                //     extend: 'pdfHtml5',
                //     exportOptions: {
                //         columns: ':visible:not(.not-export-col)'
                //     }
                // },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible:not(.not-export-col)'
                    }
                },
                // 'colvis'
            ]
            // buttons: [ 'csv', 'excel' ]
        });
    });
    // $(document).ready(function () {
    //     $('#table').DataTable({
    //         "scrollX": true
            
    //     });
    // });

    // $(document).off('focusin.modal');
</script>

    {{-- <script>
        Livewire.on('crop');
    </script> --}}

    {{-- @livewireScripts --}}
    
    <script>
        $('#foto').ijaboCropTool({
        //    preview : '',
           setRatio:1,
           allowedExtensions: ['jpg', 'jpeg','png'],
           buttonsText:['CROP','QUIT'],
           buttonsColor:['#30bf7d','#ee5155', -15],
           processUrl:'{{ route("pcrop") }}',
           withCSRF:['_token','{{ csrf_token() }}'],
           onSuccess:function(message, element, status){
            alert(message);
            location.reload();
           },
           onError:function(message, element, status){
             alert(message);
           }
        });
   </script>

   {{-- @livewireScripts --}}
    {{-- @include('layouts.modals') --}}
    @livewireScripts
</body>

</html>