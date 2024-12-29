@extends('layouts.app')

@section('content')
   <div class="container d-flex">
       <div class="col-md-12 d-flex  justify-content-center">
           <div class="card m-5 " style="width: 600px">
               <img src="{{Storage::url('image/images.png') }}" alt="" class="card-img-top">
               <div class="card-body">
                   <h3>{{$job->profile->name}}</h3>
                   <h5>{{$job->title}}</h5>
                   <p>{{$job->description}}</p>
                   <p>{{$job->deadline}}</p>
                   <p>{{$job->address}}</p>
                   <p>{{number_format($job->salary, 2)}}</p>
                   <p>{{$job->job_type}}</p>
               </div>
               <div class="card-footer ">
                   <form action="{{route('applicant.sendResume')}}" method="post">@csrf
                   <button type="submit" class="btn btn-success d-flex justify-content-center m-1" id="send-resume">ارسال رزومه </button>
                   </form>
               </div>
           </div>
       </div>
   </div>
@endsection
<script>
    $(form).on('submit', function(event){


        var url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                var row = '<tr>';
                row += '<th scope="row">'+response.id+'</th>';
                row += '<td>'+response.title+'</td>';
                row += '<td>'+response.title+'</td>';
                row += '</tr>';

                $(table).find('tbody').prepend(row);


                $(form).trigger("reset");
                $(modal).modal('hide');
            },
            error: function(response) {
            }
        });
    });
</script>
