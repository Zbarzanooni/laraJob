@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                   متقاضیان کار
                </div>
                <div class="card-body">
                    <table class="table table-bordered data-table" id="dataTable">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th>سمت شغل</th>
                            <th>نوع قرارداد</th>
                            <th>سن</th>
                            <th>تعداد متقاضی </th>
                            <th>مشاهده</th>
                        </tr>
                        </thead>

                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable({

            processing: true,

            serverSide: true,

            ajax: "{{ route('applicant.index') }}",

            columns: [
                { data: 'title', name: 'title' },
                { data: 'rolse', name: 'rolse' },
                { data: 'job_type', name: 'job_type' },
                { data: 'deadline', name: 'deadline' },
                { data: 'users_count', name: 'users_count' },
                { data: 'view', name: 'view' },

            ]

        });

    })

</script>
@endsection
