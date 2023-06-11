@extends('layout.mainlayout_admin',['activePage' => 'doctor'])

@section('title',__('Show Doctor'))
@section('content')

<section class="section">
    @include('layout.breadcrumb',[
        'title' => __('Counsellor Finance Details'),
        'url' => url('doctor'),
        'urlTitle' =>  __('Doctor'),
    ])
    <div class="section_body">
        <div class="card profile-widget mt-5">
            <div class="profile-widget-header">
                <a href="{{ $doctor->fullImage }}" data-fancybox="gallery2">
                    <img alt="image" src="{{ $doctor->fullImage }}" class="rounded-circle profile-widget-picture">
                </a>
                <div class="btn-group mb-2 dropleft float-right p-3">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ __('More Details') }}
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start">
                      <a class="dropdown-item" href="{{ url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/dashboard') }}">{{ __('Appointment') }}</a>
                      <a class="dropdown-item" href="{{ url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/schedule') }}">{{ __('Schedule Timing') }}</a>
                      <a class="dropdown-item" href="{{ url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/patients') }}">{{ __('Student') }}</a>
                    </div>
                </div>
            </div>
            <div class="profile-widget-description">
                <div class="profile-widget-name">{{ $doctor->name }}
                    <div class="text-muted d-inline font-weight-normal">
                        @if (isset($doctor->expertise))
                        <div class="slash"></div> 
                        {{ $doctor->expertise['name'] }}
                        @endif
                    </div>
                </div>
                {{ $doctor->desc }}
            </div>
        </div>
        
        @if ($doctor->based_on == 'subscription')
            <div class="card">
                <div class="card-header">
                    <h5>{{__('Based On ')}}{{ $doctor->based_on }}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('subscription name')}}</th>
                                    <th>{{__('Counsellor name')}}</th>
                                    
                                    <th>{{__('Status')}}</th>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
        @endif

       
        @endif
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Show settlement details')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body details_body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
            </div>
        </div>
    </div>
</div>
@endsection

