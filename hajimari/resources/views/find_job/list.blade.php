@extends('layouts.app')

@section('content')

  <section class="home-section section-hero overlay bg-image" style="background-image: url('images/hero_1.jpg');" id="home-section">

    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-12">
          <div class="mb-5 text-center">
            <h1 class="text-white font-weight-bold">The Easiest Way To Get Your Dream Job</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur perferendis.</p>
          </div>

          <form method="GET" action="{{route('find_job')}}" class="search-jobs-form">
            
            @include('find_job._form_search_job')
        

          </form>
          
        </div>
      </div>
    </div>

    <a href="#next" class="scroll-button smoothscroll">
      <span class=" icon-keyboard_arrow_down"></span>
    </a>

  </section>
  
  

  

  <section class="site-section">
    <div class="container">

      <div class="row mb-5 justify-content-center">
        <div class="col-md-7 text-center">
          <h2 class="section-title mb-2">Có {{$listJob->total()}} việc làm tiếng Nhật</h2>
        </div>
      </div>
      
      <ul class="job-listings mb-5">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Ngành nghề</th>
              <th scope="col">Vị trí tuyển dụng</th>
              <th scope="col">Địa điểm</th>
              <th scope="col">Yêu cầu</th>
              <th scope="col">Mức lương</th>
            </tr>
          </thead>
          <tbody id="listJobs">
            @foreach($listJob as $job)
            <tr>
              <td>{{$job['job_category_name']}}</td>
              <td>{{$job['name']}}</td>
              <td>
                <?php 
                    if($job['location']){
                      $location = \App\Area::where('id',$job['location'])->pluck('name');
                    }
                ?>
                {{$location?$location[0]:''}}
              </td>
              <td>{{$job['lang_id']?"N".$job['lang_id']:''}}</td>
              <td>{{$job['salary_from']}} - {{$job['salary_to']}}$</td>
            </tr>
            @endforeach
          </tbody>
        </table>


      </ul>

      <div class="row text-center">
        <input type="button" class="btn btn-danger offset-md-6 see-more" name="" value="Xem thêm" pageLength="{{$listJob->lastPage()}}">
      </div>
      
     {{--  <div class="row pagination-wrap">
        <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
          <span>Showing 1-7 Of 43,167 Jobs</span>
        </div>
        <div class="col-md-6 text-center text-md-right">
          <div class="custom-pagination ml-auto">
            <a href="#" class="prev">Prev</a>
            <div class="d-inline-block">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            </div>
            <a href="#" class="next">Next</a>
          </div>
        </div>
      </div> --}}

      {{ $listJob->appends(Request::all())->links() }}

    </div>
  </section>

@endsection