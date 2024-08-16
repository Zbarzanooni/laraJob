@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    تمامی مشاغل
                </div>
                <div class="card-body">
                    <table class="table table-bordered data-table" id="dataTable">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>سمت شغل</th>
                            <th>نوع قرارداد</th>
                            <th>سن</th>
                            <th>ادرس</th>
                            <th>حقوق</th>
                            <th width="105px">Action</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $('#dataTable').DataTable({

            processing: true,

            serverSide: true,

            ajax: "{{ route('data.tables.data') }}",

            columns: [
                { data: 'title', name: 'title' },
                { data: 'rolse', name: 'rolse' },
                // Define more columns as per your table structure

            ]

        });
    });
</script>
