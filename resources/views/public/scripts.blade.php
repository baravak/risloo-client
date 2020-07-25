@section('scripts')
    <script src="/public/vendors/jquery-3.4.1.min.js"></script>
    <script src="/public/vendors/popper.min.js"></script>
    <script src="/public/vendors/bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).on("click","a.nav-link",function(e) {
            e.preventDefault();
            var id = $(this).attr("href");
            $('html, body').animate({
                scrollTop: $(id).offset().top
            }, 1000);
        });
    </script>
@endsection