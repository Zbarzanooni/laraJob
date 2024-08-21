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
                            <th width="105px" name="action">Action</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

