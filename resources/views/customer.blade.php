@extends('layouts.main')

@section('container')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="h-100">

                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="mb-1">Data Customer Page</h4>
                        <p class="text-muted">Here's what's happening with your store today.</p>

                        <button id="addCustomerButton" type="button" class="btn btn-primary btn-animation waves-effect waves-light mb-3" data-text="click me!"><span>Add Customer</span></button>

                        {{-- <div class="alert alert-success shadow" role="alert">
                            <b>New customers</b> have been <b>successfully</b> added!
                        </div> --}}

                    </div>
                </div>

                <div class="row"></div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">List Customer</h5>
                            </div>
                            <div class="card-body">
                                <table id="tableCustomer" class="table table-bordered nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            {{-- <th data-ordering="false">No</th> --}}
                                            <th data-ordering="false">User ID</th>
                                            <th data-ordering="false">Name</th>
                                            <th data-ordering="false">Email</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
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

@push('tableCustomer')
    <script>
        $('#tableCustomer').DataTable({
            searching: true,
            serverSide: true,
            ajax: {
                type: 'get',
                url: '/showTableCustomer',
            },
            columns: [
                {data: 'user_id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'status'},
            ]
        })
    </script>
@endpush