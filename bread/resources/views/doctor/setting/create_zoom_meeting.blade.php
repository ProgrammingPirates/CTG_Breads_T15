@extends('layout.mainlayout_admin',['activePage' => 'setting'])

@section('title',__('Create Meeting'))

@section('content')
<section class="section">
    @include('layout.breadcrumb',[
    'title' => __('Create Meeting'),
    ])

    @if (session('status'))
    @include('superAdmin.auth.status',[
    'status' => session('status')])
    @endif
    <div class="card">
        <form action="{{ url('store',$id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">{{__('Topic')}}</label>
                            <input type="text" name="topic"
                                class="form-control @error('topic') is-invalid @enderror"
                                value="{{ old('topic') }}">
                            @error('topic')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">{{__('Start Time')}}</label>
                            <input type="text" name="start_time"
                                class="form-control @error('start_time') is-invalid @enderror"
                                value="{{ old('start_time') }}" placeholder="2020-11-23T13:26:02.000Z">
                            @error('start_time')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">{{__('Agenda')}}</label>
                            <input type="text" name="agenda"
                                class="form-control @error('agenda') is-invalid @enderror"
                                value="{{ old('agenda') }}">
                            @error('agenda')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
