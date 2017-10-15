<script src="{{ URL::asset('/vendor/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::asset('/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ URL::asset('/vendor/metisMenu/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ URL::asset('/js/sb-admin-2.js')}}"></script>
<script src="{{ URL::asset('/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
<script src=" {{ URL::asset('/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ URL::asset('js/sb-admin-2.js') }}"></script>

<script src="{{ URL::asset('/vendor/raphael/raphael.min.js') }}"></script>
<script src="{{ URL::asset('/vendor/morrisjs/morris.min.js') }}"></script>
<script src="{{ URL::asset('/data/morris-data.js') }}"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>