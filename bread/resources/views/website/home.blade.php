@extends('layout.mainlayout',['active_page' => 'home'])

@section('title',__('Home'))

@section('content')
    <div class="site-body">
        <div class="site-hero overflow-hidden position-relative d-md-block d-none">
            
            <img src="{{ url('images/upload/'.$setting->banner_image) }}" alt="">
            
        </div>
        <div class="container-xl">
            
            <div class="content mx-auto my-3 our_doctor">
                <div class="d-flex w-100 describe justify-content-between flex-sm-row flex-column py-3 align-items-sm-center">
                    <div class="consult ml-2">
                        <h2>{{ __('Every action counts') }}</h2>
                    </div>
                    <div class="btn-appointment  mt-sm-0 mt-3">
                        <a class="btn btn-link text-center mt-0 rounded-1" href="{{ url('show-doctors') }}" role="button">{{ __('Consult Now') }}</a>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 g-0 ">
                    @forelse ($doctors as $doctor)
                        <div class="col">
                            <div class="ml-2 mt-2">
                                <div class="card h-100 p-3 our_doctor_card rounded-3">
                                    <div class="d-flex">
                                        <div class="our_doctor_card_img me-3 position-relative">
                                            <img src="{{ $doctor->full_image }}" alt="">
                                            <p class="position-absolute">{{ $doctor->rate }}/5</p>
                                        </div>
                                        <div class="our_doctor_card_txt">
                                            <h6 class="mb-1">
                                                <a href="{{ url('doctor_profile/'.$doctor['id'].'/'.Str::slug($doctor['name'])) }}">{{ $doctor->name }}</a>
                                            </h6>
                                            <p>{{ $doctor['category']['name'] }}</p>
                                            <p>{{ $doctor->experience }} {{ __('years Experience') }}</p>
                                            <p>{{ $doctor->total_appointment }} {{ __('consults Appointment') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="w-100 text-center">
                            <i class='bx bxs-user-plus noData'></i>
                            <br>
                            <h6 class="mt-3">{{__('BREADS facilitates volunteering from multiple countries across its various projects. Volunteers can offer their time, talent, resources, and skills in different domains, including the centres for the Young at Risk and in BREADS itself.')}}</h6>

                        
                        </div>
                        
                    @endforelse
                </div>
            </div>

            <div class="content mx-auto Doc-Cards">
                
                </div>
            </div>
            <!-- Consult Top Doctor -->

            <div class="content mx-auto my-5">
                <div class="text-center mb-5">
                    <h3>{{ __('Read top articles from Breads') }}</h3>
                </div>

                <div class="single-item mb-5">
                    @foreach ($reviews as $review)
                        <div>
                            <div class="card comment-card  p-2 d-flex mx-auto flex-column m-2 rounded-3 shadow-sm">
                                <div class=" comentor-name mb-3 mt-2 ms-2 d-flex align-items-center">
                                    <img src="{{ $review->user['fullImage'] }}" class="avtar rounded-circle" alt="">
                                    <p class="ms-2">{{ $review->user['name'] }}</p>
                                </div>
                                <h6 class="m-2 ">{{ $review->review }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
    </div>
@endsection