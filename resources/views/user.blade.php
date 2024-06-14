@extends('layouts.main')

@section('container')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="h-100">

                <div class="row">
                    <div class="col-12">
                        <h4 class="mb-1">Data Customer Page</h4>
                        <p class="text-muted">Here's what's happening with your store today.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">List User</h5>
                            </div>
                            <div class="card-body">
                                <table id="tableUser" class="table table-bordered nowrap table-striped align-middle" style="width:100%">
                                    <thead>
                                        <tr>
                                            {{-- <th data-ordering="false">No</th> --}}
                                            <th data-ordering="false">ID</th>
                                            <th data-ordering="false">Username</th>
                                            <th data-ordering="false">Password</th>
                                            {{-- <th>Action</th> --}}
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

@push('tableUser')
    <script>
        $('#tableUser').DataTable({
            searching: true,
            serverSide: true,
            ajax: {
                type: 'get',
                url: '/showTableUser',
            },
            columns: [
                {data: 'id'},
                {data: 'username'},
                {data: 'password'},
            ]
        })
    </script>
@endpush