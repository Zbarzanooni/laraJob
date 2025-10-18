<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion  " style="border: 1px solid rgba(0, 0, 0, 0.176) ;border-radius:0.375rem;  background-color : #ffffff" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav d-flex">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    استان
                    <div class="sb-sidenav-collapse-arrow align-items-end"><i class="fas fa-angle-down"></i></div>
                </a>
                <hr style = "color: rgba(0, 0, 0, 0.176)">
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @foreach($provinces as $province)
                            @if($province->priority > 5)
                        <div class="d-flex justify-content-start p-3" >
                            <input type="checkbox" value="{{$province->id}}" name="province_id" class="nav-link mx-2 province-checkbox" id="province_{{$province->id}}" style="accent-color: green; background-color: rgba(0, 0, 0, 0.176)" >
                            <label for=""> {{$province->name}}</label>
                        </div>
                            @endif
                        @endforeach
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#jobFilterType" aria-expanded="false" aria-controls="jobFilterType">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    نوع قرارداد
                    <div class="sb-sidenav-collapse-arrow align-items-end"><i class="fas fa-angle-down"></i></div>
                </a>
                <hr style = "color: rgba(0, 0, 0, 0.176)">
                <div class="collapse" id="jobFilterType" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @foreach(\App\Models\JobListing::getJobType() as $key => $type)
                            <div class="d-flex justify-content-start p-3" >
                                <input type="checkbox" name="job_type[]" class="nav-link mx-2 job-type-checkbox" value="{{$key}}"  style="accent-color: green; background-color: rgba(0, 0, 0, 0.176)" >
                                <label for="">  {{ $type }}</label>
                            </div>
                        @endforeach
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#experienceLevelFilter" aria-expanded="false" aria-controls="experienceLevelFilter">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    سابقه کار
                    <div class="sb-sidenav-collapse-arrow align-items-end"><i class="fas fa-angle-down"></i></div>
                </a>
                <hr style = "color: rgba(0, 0, 0, 0.176)">
                <div class="collapse" id="experienceLevelFilter" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @foreach(\App\Models\JobListing::getExperienceLevels() as $key => $type)
                            <div class="d-flex justify-content-start p-3" >
                                <input type="checkbox" name="job_type" class="nav-link mx-2 experience-checkbox" value="{{$key}}"   style="accent-color: green; background-color: rgba(0, 0, 0, 0.176)" >
                                <label for="">  {{ $type }}</label>
                            </div>
                        @endforeach
                    </nav>
                </div>
                <a class="nav-link" href="{{route('applicant.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    متقاضیان
                </a>
            </div>
        </div>
    </nav>
</div>
