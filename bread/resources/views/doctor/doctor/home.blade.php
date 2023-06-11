@extends('layout.mainlayout_admin',['activePage' => 'home'])

@section('title',__('Counseller Home'))
@section('content')
<section class="section">
    @include('layout.breadcrumb',[
        'title' => __('Counseller Dashboard'),
    ])
    <div class="row">
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{__('Total Student')}}</h4>
                    </div>
                    <div class="card-body">
                        <h3>{{ $totalUser }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-folder"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{__('Total Appointment')}}</h4>
                    </div>
                    <div class="card-body">
                        <h3>{{ $totalAppointment }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file-pdf"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>{{__('Total Review')}}</h4>
                    </div>
                    <div class="card-body">
                        <h3>{{ $totalReview }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-7">
            <div class="card card-chart">
                <div class="card-header">{{__("Today's appointment")}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="w-100 display table datatable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th>{{__('appointment id')}}</th>
                                   
                                    <th>{{__('date')}}</th>
                                    
                                    <th>{{__('change status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($today_Appointments as $appointment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $appointment->appointment_id }}</td>
                                        <td>{{ $appointment->date }}<span class="d-block text-info">{{ $appointment->time }}</span></td>
                                        
                                        <td>
                                            @if($appointment->appointment_status == 'pending' || $appointment->appointment_status == 'PENDING')
                                                <span class="badge badge-pill bg-warning-light">{{__('Pending')}}</span>
                                            @endif
                                            @if($appointment->appointment_status == 'approved' || $appointment->appointment_status == 'APPROVED')
                                                <span class="badge badge-pill bg-success-light">{{__('Approved')}}</span>
                                            @endif
                                            @if($appointment->appointment_status == 'canceled' || $appointment->appointment_status == 'CANCELED')
                                                <span class="badge badge-pill bg-danger-light">{{__('Cancelled')}}</span>
                                            @endif
                                            @if($appointment->appointment_status == 'completed' || $appointment->appointment_status == 'COMPLETED')
                                                <span class="badge badge-pill bg-default-light">{{__('Completed')}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($appointment->appointment_status == 'approved' ||  $appointment->appointment_status == 'completed')
                                                <a href="{{ url('completeAppointment/'.$appointment->id) }}" class="btn btn-sm bg-info-light {{ $appointment->appointment_status == 'completed' ? 'disabled' : '' }}">
                                                    <i class="fas fa-check"></i> {{__('Completed')}}
                                                </a>
                                            @elseif($appointment->appointment_status == 'pending' || $appointment->appointment_status == 'canceled')
                                                <a href="{{ url('acceptAppointment/'.$appointment->id) }}" class="btn btn-sm bg-success-light {{ $appointment->appointment_status != 'pending' ? 'disabled' : '' }}">
                                                    <i class="fas fa-check"></i> {{__('Accept')}}
                                                </a>
                                                <a href="{{ url('cancelAppointment/'.$appointment->id) }}" class="btn btn-sm bg-danger-light {{ $appointment->appointment_status != 'pending' ? 'disabled' : '' }}">
                                                    <i class="fas fa-times"></i>{{__(' Cancel')}}
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Sales Chart -->
        </div>
        <div class="col-md-12 col-lg-5">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title">{{__('Appointments')}}</h4>
                </div>
                <div class="card-body">
                    <canvas id="orderChart"></canvas>
                    <input type="hidden" name="years" value="{{ $orderCharts['label'] }}">
                    <input type="hidden" name="data" value="{{ $orderCharts['data'] }}">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Latest Customers -->
            <div class="card card-table">
                <div class="card-header">
                    <h4 class="card-title">{{__('Latest Customers')}}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="w-100 display table datatable text-center">
                            <thead>
                                <tr>
                                    <th>{{__('Student Name')}}</th>
                                    <th>{{__('Phone')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th>{{__('Gender')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allUsers as $allUser)
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="{{ url('patient/'.$allUser->id) }}" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="{{ $allUser->fullImage }}" alt="User Image"></a>
                                                <a href="{{ url('patient/'.$allUser->id) }}">{{ $allUser->name }} </a>
                                            </h2>
                                        </td>
                                        <td>
                                            <a href="tel:{{$allUser->phone}}">{{$allUser->phone}}</a>
                                        </td>
                                        <td>
                                            <a href="mailto:{{ $allUser->email }}">
                                                <span class="text_transform_none">{{ $allUser->email }}</span>
                                            </a>
                                        </td>
                                        <td>{{ $allUser->gender }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Latest Customers -->
        </div>
    </div>

</section>
@endsection

@section('js')
    <script src="{{url('assets_admin/js/chart.min.js')}}"></script>
    <script src="{{url('assets_admin/js/chart.js')}}"></script>
@endsection
