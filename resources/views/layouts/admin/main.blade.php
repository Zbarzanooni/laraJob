<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.header')
<body class="sb-nav-fixed">
@include('layouts.admin.navbar')
<div id="layoutSidenav">
    @include('layouts.admin.sidebar')
    <div id="layoutSidenav_content">
{{--        @include('layouts.admin.body')--}}
        @yield('content')
        @include('layouts.admin.footer')
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
crossorigin="anonymous"></script>
<script src="{{asset('js/datatables-simple-demo.js')}}"></script>
<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(function() {
        $('.summernote').summernote();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable({

            processing: true,

            serverSide: true,

            ajax: "{{ route('data.tables.data') }}",

            columns: [
                { data: 'title', name: 'title' },
                { data: 'rolse', name: 'rolse' },
                { data: 'job_type', name: 'job_type' },
                { data: 'deadline', name: 'deadline' },
                { data: 'address', name: 'address' },
                { data: 'salary', name: 'salary' },
                { data: 'action', name: 'action' },
            ]

        });

    })

</script>

</body>
</html>
