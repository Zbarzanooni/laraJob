<div class="row" id="listing_jobs">
@forelse($jobs as $job)
    <div class="col-md-3 p-4 m-4">
        <div class="card" style="width: 18rem">
            <a href="">
                <img src="{{ $job->image ? Storage::url($job->image) : Storage::url('image/images.png') }}" class="card-img-top" alt="">
            </a>
            <div class="card-body">
                <h5>{{ $job->title }}</h5>
                <p>{!! $job->rolse !!}</p>
                <p>{{ $job->address }}</p>
                <p>حقوق : {{ number_format($job->salary, 2) }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <p>{{ $job->job_type }}</p>
                <a href="{{ route('home.show', $job->slug) }}" class="btn btn-success">ارسال رزومه</a>
            </div>
        </div>
    </div>
@empty
    <p class="text-center">هیچ شغلی یافت نشد.</p>
    @endforelse
    </div>
