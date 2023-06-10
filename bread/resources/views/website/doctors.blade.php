@extends('layout.mainlayout',['active_page' => 'doctors'])

@section('title',__('Doctors'))

@section('content')
    <div class="site-body">
        <div class="jumbo pt-3">
            <div class="jumbo_ban mx-auto">
                <h1 class="text-white text-center">{{__('Your Home For Counsellors')}}</h1>
                <h3 class="text-white text-center">{{__('Find Better.Appoint Better')}}</h3>
                <div class="content mx-auto doctor">
                    <div class="d-flex mx-auto flex-md-row flex-column serach-box pb-0">
                        <div class="location position-relative mb-md-0 mb-3 ">
                            <input type="search" class="form-control loc" id="autocomplete" onFocus="geolocate()" name="doctor_location" aria-describedby="helpId" placeholder="{{ __('Search Location') }}">
                            <i class='bx bx-map position-absolute bx_icons'></i>
                        </div>
                        <div class="location doc position-relative">
                            <input type="search" class="form-control docto" name="search_doctor" onkeyup="searchDoctor()" aria-describedby="helpId" placeholder="{{ __('Search doctors') }}">
                            <i class='bx bx-search position-absolute bx_icons'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        
        </div>
    </div>
@endsection

@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ App\Models\Setting::first()->map_key }}&sensor=false&libraries=places"></script>
    <script src="{{ url('assets/js/doctor_list.js') }}"></script>
@endsection