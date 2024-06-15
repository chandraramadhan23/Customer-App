@extends('layouts.main')

@section('container')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="h-100">

                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-1">Dashboard Page</h2>
                        <p class="text-muted">Welcome to Dashboard Page.</p>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="myChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="row">
                                    <div id="cardCustomer" class="card px-4 py-4 waves-effect waves-primary">
                                        <h3 class="mb-3">Total Customers</h3>
                                        <h6>New Customer : {{ $totalNewCustomer }}</h6>
                                        <h6>Loyal Customer : {{ $totalLoyalCustomer }}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="cardUser" class="card px-4 py-4 waves-effect waves-primary">
                                        <h3 class="mb-3">Total User</h3>
                                        <h6>Total user : {{ $totalUser }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @include('partials.footer')
</div>

@endsection


@section('chart')
<script>

    const ctx = document.getElementById('myChart');

    const data = {
    labels: [
    'New Customer',
    'Loyal Customer'
    ],
    datasets: [{
        label: 'My First Dataset',
        data: [{{ $totalNewCustomer }}, {{ $totalLoyalCustomer }}],
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        ],
        hoverOffset: 4
    }]
    };

    new Chart(ctx, {
        type: 'doughnut',
        data: data 
    });



    // Card customer & user
    $(document).on('click', '#cardCustomer', function() {
        window.location.href='/customer';
    })

    $(document).on('click', '#cardUser', function() {
        window.location.href='/user';
    })

</script>
@endsection