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
        <form action="{{ url('store_key') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">{{__('ZOOM API URL')}}</label>
                            <input type="text" name="zoom_api_url"
                                class="form-control @error('zoom_api_url') is-invalid @enderror"
                                value="{{ old('zoom_api_url',$data->zoom_api_url ?? '') }}">
                            @error('zoom_api_url')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">{{__('ZOOM API KEY')}}</label>
                            <input type="text" name="zoom_api_key"
                                class="form-control @error('zoom_api_key') is-invalid @enderror"
                                value="{{ old('zoom_api_key',$data->zoom_api_key ?? '') }}">
                            @error('zoom_api_key')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="col-form-label">{{__('ZOOM API SECRET')}}</label>
                            <input type="text" name="zoom_api_secret"
                                class="form-control @error('zoom_api_secret') is-invalid @enderror"
                                value="{{ old('zoom_api_secret',$data->zoom_api_secret ?? '') }}">
                            @error('zoom_api_secret')
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
