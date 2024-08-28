@extends('layouts.admin.main')
@section('content')
    <div class="container">
        <div class="col-md-12">
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
                            <th width="105px" name="action">Action</th>
                        </tr>
                        </thead>

                    </table>

                </div>
                @foreach($jobs as $job)
                    <div class="modal fade" id="exampleModal{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">حذف اطلاعات</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ایا از عملایات حذف اطمینان دارید؟؟
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن </button>
                                    <form action="{{route('destroy.job',[$job->id])}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"> حذف </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<script>

</script>
