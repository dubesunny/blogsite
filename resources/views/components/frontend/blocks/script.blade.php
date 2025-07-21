@stack('up-script')
<!-- Font Awesome icons (free version)-->
<script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/all.js') }}" crossorigin="anonymous"></script>
<!-- Bootstrap core JS-->
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendor/toastr/toastr.min.js') }}"></script>
<!-- Core theme JS-->
<script src="{{ asset('frontend/js/scripts.js') }}"></script>
<script src="{{ asset('frontend/js/custom.js') }}"></script>
<script>
    @if (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
    @endif

    @if (Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
    @endif
</script>
@stack('script')
