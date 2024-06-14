@extends('layouts.main')

@section('container')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="h-100">

                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-1">User Page</h4>
                        <p class="text-muted">Here's what's happening with your store today.</p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <h6 class="mb-1 text-muted">Nothing Content!</h6>
                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('partials.footer')
</div>

@endsection