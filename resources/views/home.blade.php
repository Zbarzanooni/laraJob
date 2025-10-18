@extends('layouts.user.app')

@section('content')
    <div class="container ">
            <div class="row">
                <div class="col  m-4 align-content-center">
                    <form action="" id="filters-form">
                        @csrf
                        <div class="row">

                            <div class="col-md-3">
                                <input type="text" class="filter form-control" name="job-name"
                                       placeholder="عنوان شغلی ..">
                            </div>
                            <div class="col-md-3">
                                <select id="province" name="province_id" class="filter form-control">
                                    <option value="">انتخاب استان</option>
                                    @foreach($provinces as $province)
                                        <option
                                            value="{{ $province->id }}" {{ (isset($job->province_id) and ($job->province_id == $province->id)) ? 'selected' : ''}} >{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select id="province" name="province_id" class="filter form-control">
                                    <option value="">انتخاب استان</option>
                                    @foreach($provinces as $province)
                                        <option
                                            value="{{ $province->id }}" {{ (isset($job->province_id) and ($job->province_id == $province->id)) ? 'selected' : ''}} >{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" href="" class="btn btn-success">جستجو در مشاغل</button>
                            </div>
                        </div>
                    </form>
                    <div id="active-filters" class="mt-3 d-flex flex-wrap gap-2"></div>

                </div>
            </div>
            <div class="row" id="jobs-container" >
                    <div class="col-md-3 mt-3 p-2">
                        @include('layouts.user.sidebar')
                    </div>
                <div class="col-md-9" id="main-content">
                    @include('partials.jobs_list', ['jobs' => $jobs])
                </div>
            </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            function submitFilters() {
                let formData = $('#filters-form').serialize;
                $.ajax({
                    url: @json(route('getFilter')),
                    method: 'GET',
                    data: formData,
                    success: function (response) {
                        $('#jobs-container').html(response.html);
                    },
                    error: function (xhr) {
                        console.log('AJAX error:', xhr);
                    }
                });
            }
            $('#filters-form').on('change', '.filter', function (e) {
                e.preventDefault();
                submitFilters();
            });

            $('.sb-sidenav-menu-nested').on('change', 'input[type="checkbox"]', function(){

                let job_type = $('.job-type-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                let province_id = $('.province-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                let experience_level = $('.experience-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();

                $('#jobs-container').css('opacity', '0.5'); // blur-like effect ساده

                $.ajax({
                    url: '/getFilter',
                    type: 'GET',
                    data: {
                        province_id: province_id,
                        job_type: job_type,
                        experience_level: experience_level
                    },
                    success: function(response) {
                        $('#main-content').html(response.html);
                        $('#jobs-container').css('opacity', '1'); // برگشت حالت عادی
                    }
                });
            });
        });
    </script>
@endsection
