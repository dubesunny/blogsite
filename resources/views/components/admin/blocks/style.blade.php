   @stack('up-style')
   <!-- Custom fonts for this template-->
   <link href="{{ asset('admin/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
   <link
       href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
       rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('admin/assets/vendor/toastr/toastr.min.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="{{ asset('admin/assets/vendor/summernote-0.9.0-dist/summernote-bs4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('admin/assets/vendor/dropify/css/dropify.min.css') }}">
   <style>
    .sort{
        display: inline-flex;
        flex-direction: column;
        line-height: 1;
        gap: 0;
    }
    .fa-sort-up{
        font-size: 0.7rem;
        margin-bottom: -4px;
    }
    .fa-sort-up:hover{
          color: #000;
    }
    .fa-sort-down{
        font-size: 0.7rem;
        margin-top: -4px;
    }
    .fa-sort-down:hover{
        color: #000;
    }
   </style>
   @stack('style')
