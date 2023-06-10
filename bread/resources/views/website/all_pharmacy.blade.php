@extends('layout.mainlayout',['active_page' => 'pharmacy'])

@section('title',__('Pharmacy'))

@section('content')
    <div class="jumbo pt-3">
        <div class="jumbo_ban mx-auto">
            <h1 class="text-white text-center">{{__('Your Home For Counsellor')}}</h1>
            <h3 class="text-white text-center">{{__('Find Better.Appoint Better')}}</h3>
            <div class="content mx-auto doctor">
                <div class="d-flex mx-auto flex-md-row flex-column serach-box pb-0">
                    <div class="location position-relative mb-md-0 mb-3 ">
                        <input type="search" class="form-control loc" id="autocomplete"  onFocus="geolocate()" aria-describedby="helpId" placeholder="{{ __('Search Location') }}">
                        <i class='bx bx-map bx_icons position-absolute'></i>
                    </div>
                    <div class="location  doc position-relative">
                        <input type="search" class="form-control docto" name="search_pharmacy" onkeypress="searchPharmacy()" aria-describedby="helpId" placeholder="{{ __('Search pharmacies') }}">
                        <i class='bx bx-search bx_icons position-absolute'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
@endsection

@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ App\Models\Setting::first()->map_key }}&sensor=false&libraries=places"></script>
    <script src="{{ url('assets/js/pharmacy_list.js') }}"></script>
@endsection