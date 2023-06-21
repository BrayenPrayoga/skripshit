<!-- BEGIN: JS Assets-->
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>

<script src="{{ asset('js/app.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<!-- END: JS Assets-->

@if(Session::has('success'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            text: ' ',
            title: '{{Session::get("success")}}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php
        Session::forget('success');
    ?>
@endif
@if(Session::has('error'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'error',
            text: ' ',
            title: '{{Session::get("error")}}',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php
        Session::forget('error');
    ?>
@endif