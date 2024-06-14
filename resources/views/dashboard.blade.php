@extends('layouts.main')

@section('container')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="h-100">

                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-1">Dashboard Page</h4>
                        <p class="text-muted">Here's what's happening with your store today.</p>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <h6 class="mb-1 text-muted">Nothing Content!</h6>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="myChart"></canvas>
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
    'NEW_CUSTOMER',
    'LOYAL_CUSTOMER'
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

</script>
@endsection