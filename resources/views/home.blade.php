@extends('layouts.app')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="row">
                <div class= "col  m-4 align-content-center">
                        <h4> فیلتر </h4>
                        <form action="">
                            @csrf
                          <div class="row">
                              <div class="col-md-3">
                                  <input type="text" class="form-control" name="job-name" placeholder="عنوان شغلی .." >
                              </div>
                              <div class="col-md-3">
                                  <select name="job-type" id="job_type" class="form-control">
                                      <option disabled selected hidden> نوع قرارداد:</option>
                                      @foreach(\App\Models\JobListing::getJobType() as $key => $type)
                                          <option value="{{ $key }}"  {{ request('experience_level') == $key ? 'selected' : '' }}>
                                              {{ $type }}
                                          </option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-3">
                                  <select name="experience_level" id="experience_level" class="form-control">
                                      <option disabled selected hidden>سطح تجربه</option>
                                      @foreach(\App\Models\JobListing::getExperienceLevels() as $key => $label)
                                          <option value="{{ $key }}" {{ request('experience_level') == $key ? 'selected' : '' }}>
                                              {{ $label }}
                                          </option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="col-md-3">
                                  <a href="" class="btn btn-success">جستجو در مشاغل </a>
                              </div>
                          </div>
                        </form>
                </div>
            </div>
            @foreach($jobs as $job)
                <div class="col-md-3 p-4 m-4">
                    <div class="card" style="width: 18rem"   >
                        <a href=""><img src="{{$job->image ? Storage::url('image/images.png'): Storage::url($job->image)}}" alt=""  class="card-img-top"  ></a>
                        <div class="card-body  ">
                            <h5>{{$job->title}}</h5>
                            <p> {!! $job->rolse !!}</p>
                            <p>{{$job->address}}</p>
                            <p>   حقوق :  {{number_format($job->salary , 2)}}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <p>{{$job->job_type}}</p>
                            <a href="{{route('home.show',$job->slug)}}" class="btn btn-success"> ارسال رزومه </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
