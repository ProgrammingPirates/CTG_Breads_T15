@extends('layout.mainlayout_admin',['activePage' => 'subscription_history'])

@section('title',__('Subscription History'))

@section('content')

<section class="section">
    @include('layout.breadcrumb',[
        'title' => __('Subscription History'),
    ])
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0">
                    
                    <tbody>
                  
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
