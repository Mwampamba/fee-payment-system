  <footer class="main-footer">
        <strong>Copyright &copy; 2023</a>.</strong>
          UAUT Payment System.
          <div class="float-right d-none d-sm-inline-block">
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
<!-- ./wrapper -->
<!-- select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- jQuery -->
  <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('admin-assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('admin-assets/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- Sparkline -->
  <script src="{{ asset('admin-assets/plugins/sparklines/sparkline.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{ asset('admin-assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
  <script src="{{ asset('admin-assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('admin-assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('admin-assets/plugins/moment/moment.min.js')}}"></script>
  <script src="{{ asset('admin-assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
  <!-- Summernote -->
  <script src="{{ asset('admin-assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('admin-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('admin-assets/dist/js/adminlte.js')}}"></script>
  
  <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    function previewFile(input) {
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewImg').attr('src', reader.result);
            }
                reader.readAsDataURL(file);
            }
        }
  </script>
   
 <!-- Select2 options -->
  <script>
    $(document).ready( function(){
      $('#myDataTable').DataTable(); 
      $('.selector').select2(); 
    });
  </script>

<!-- Summernote JS  -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $(document).ready(function() {
        $("#summernoteDescription").summernote({
            height:300
          }
        );
        $('.dropdown-toggle').dropdown();
    });
</script>

   <!-- Toastr popup -->
  @if(Session::has('success'))
    <script>
      toastr.success("{!! Session::get('success') !!}");
    </script>
  @endif

  @if(Session::has('error'))
    <script>
      toastr.error("{!! Session::get('error') !!}");
    </script>
  @endif

</body>
</html>


