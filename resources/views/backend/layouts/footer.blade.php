 <!-- Vendor JS -->
 <script src="{{ asset('/backend/js/vendors.min.js') }}"></script>
 <script src="{{ asset('/assets/icons/feather-icons/feather.min.js') }}"></script>
 <script src="{{ asset('/assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
 <script src="{{ asset('/assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
 <script src="{{ asset('/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
 <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
 <script src="{{ asset('/backend/js/pages/data-table.js') }}"></script>

 <!-- Sunny Admin App -->
 <script src="{{ asset('/backend/js/template.js') }}"></script>
 <script src="{{ asset('/backend/js/pages/dashboard.js') }}"></script>





 <!-- Option 1: Bootstrap Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


  {{-- Toastr JS CDN --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))

            var type = ("{{ Session::get('alert-type') }}");

            var message = ("{{ Session::get('message') }}");
            switch (type) {
            case 'success':
            toastr.success(message);
            break;
            case 'warning':
            toastr.warning(message);
            break;
            case 'error':
            toastr.error(message);
            break;
            case 'info':
            toastr.info(message);
            break;
            }

        @endif
    </script>
