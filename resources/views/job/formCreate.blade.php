@extends('layouts.admin.main')

@section('content')

    <div class=" p-5">
        <form action="{{route('store.post.job')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="form-group">
                <label for="">عنوان شغل</label>
                <input type="text" name="title" class="form-control">
            </div>
            @if($errors->has('title'))
                <span class="text-danger">{{$errors->first('title')}}</span>
            @endif
            <div class="form-group">
                <label for=""> عکس </label>
                <input type="file" name="image" class="form-control">
            </div>
            @if($errors->has('image'))
                <span class="text-danger">{{$errors->first('image')}}</span>
            @endif
            <div class="form-group">
                <label for="">سمت شغلی</label>
                <input type="text" name="rolse" class="form-control ">
            </div>
            @if($errors->has('rolse'))
                <span class="text-danger">{{$errors->first('rolse')}}</span>
            @endif
            <div class="form-group">
                <label for="">توضیحات</label>
                <textarea  id="summernote" name="description" class="form-control summernote"></textarea>
            </div>
            @if($errors->has('description'))
                <span class="text-danger">{{$errors->first('description')}}</span>
            @endif
            <div class="form-group">
                <label for=""> حقوق </label>
                <input type="text" name="salary" class="form-control">
            </div>
            @if($errors->has('salary'))
                <span class="text-danger">{{$errors->first('salary')}}</span>
            @endif
            <div class="form-group">
                <label for=""> ادرس </label>
                <div class="form-group">
                    <select id="province" name="province_id">
                        <option value="">انتخاب استان</option>
                        @foreach($provinces as $province)
                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                    <select id="city" name="city_id">
                        <option value="">انتخاب شهر</option>
                    </select>
                </div>
                <input type="text" name="address" class="form-control">
            </div>
            @if($errors->has('address'))
                <span class="text-danger">{{$errors->first('address')}}</span>
            @endif
            <div class="form-group">
                <label for=""> تاریخ اتمام </label>
                <input type="date" name="date" class="form-control">
            </div>
            @if($errors->has('date'))
                <span class="text-danger">{{$errors->first('date')}}</span>
            @endif
            <div class="form-group">
                <h6> نوع قرارداد </h6>
                <div>
                    <input type="radio" id="fullTime" name="job_type"  value="fullTime">
                    <label for="">تمام وقت </label>
                </div>
                <div>
                    <input type="radio" id="partTime" name="job_type" value="partTime">
                    <label for="">پاره وقت</label>
                </div>
                <div>
                    <input type="radio" id="telecommuting" name="job_type" value="telecommuting">
                    <label for="">دورکاری</label>
                </div>
            </div>
            @if($errors->has('job_type'))
                <span class="text-danger">{{$errors->first('job_type')}}</span>
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-success">ثبت </button>
            </div>
        </form>
    </div>


@endsection
@section('script')
    <script type="text/javascript">

            $('#province').on('change' , function (e) {
                e.preventDefault();
                $.ajax({
                    method: 'get',
                    async: false,
                    url: '{{route('getCities')}}',
                    data: {
                        'province_id': $(this).val(),
                    },
                    success: function (result) {
                        let cities = $('#city');
                        if (result.status) {
                            let options = '';
                            $.each(result.data, function (key, data) {
                                options += '<option value=' + key + '>' + data + '</option>';
                            });

                            cities.empty();
                            cities.append("<option value=''>---انتخاب شهر---</option>");
                            cities.append(options);
                            cities.parents('.form-group').show();

                            // defineRoute($('.project-selector').val());
                        }
                    }
        });
        });

    </script>
@endsection
