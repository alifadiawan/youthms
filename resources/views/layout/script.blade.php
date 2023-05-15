<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

<script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>

<script src="{{ asset('https://kit.fontawesome.com/e4a753eb05.js') }}" crossorigin="anonymous"></script>

<!-- include libraries(jQuery, bootstrap) -->
{{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<!-- Portofolio Carousel -->                 
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}


<!-- Data AOS Animatins -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>


<!-- Summernote scirpt -->
<script>
    $(document).ready(function() {
        var isi = $('#isi').val();
        $('#tampilan_isi').html(isi);
        $('#summernote').summernote();
    });
</script>

<script>
    /*** add active class and stay opened when selected ***/
    var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $('ul.nav-sidebar a').filter(function() {
        if (this.href) {
            return this.href == url || url.href.indexOf(this.href) == 0;
        }
    }).addClass('active');

    // for the treeview
    $('ul.nav-treeview a').filter(function() {
        if (this.href) {
            return this.href == url || url.href.indexOf(this.href) == 0;
        }
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>



{{-- <script src="{{ asset('dist/js/pages/dashboard3.js')}}"></script> --}}
