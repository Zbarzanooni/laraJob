@extends('layouts.user.app')

@section('content')
    <div class="container ">
            <div class="row">
                <div class="col  m-4 align-content-center">
                    <h4> فیلتر </h4>
                    <form action="" id="filters-form">
                        @csrf
                        <div class="row">

                            <div class="col-md-3">
                                <input type="text" class="filter form-control" name="job-name"
                                       placeholder="عنوان شغلی ..">
                            </div>
                            <div class="col-md-3">
                                <select name="job_type" id="job_type" class="filter form-control">
                                    <option disabled selected hidden> نوع قرارداد:</option>
                                    @foreach(\App\Models\JobListing::getJobType() as $key => $type)
                                        <option value="{{ $key }}" {{ request('job_type') == $key ? 'selected' : '' }}>
                                            {{ $type }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="experience_level" id="experience_level" class="filter form-control">
                                    <option disabled selected hidden>سطح تجربه</option>
                                    @foreach(\App\Models\JobListing::getExperienceLevels() as $key => $label)
                                        <option
                                            value="{{ $key }}" {{ request('experience_level') == $key ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
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
                </div>
            </div>
            <div class="row" id="jobs-container" >
                    <div class="col-md-3 mb-0">
                        @include('layouts.user.sidebar')
                    </div>
                <div class="col-md-9">
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
                    url:  @json(route('home')),
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

        });
    </script>
@endsection
