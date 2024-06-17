@extends('layouts.main')

@section('container')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="h-100">

                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="mb-1">Customer Page</h2>
                        <p class="text-muted">Welcome to Customer Page.</p>

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
                                <table id="tableCustomer" class="table table-hover nowrap align-middle" style="width:100%">
                                    <thead>
                                        <tr class="table-light">
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









@section('modal')
    @include('modals.modalAddCustomer')
    @include('modals.modalEditCustomer')
    @include('modals.modalError')
    
    <!-- Modal add Customer -->
    <script>
        $(document).on('click', '#addCustomerButton', function() {
                $('#formAddCustomer').modal('show')
            })

            $(document).on('click', '#submitAddCustomer', function() {
                const name = $('#name').val()
                const email = $('#email').val()

                $.ajax({
                type: 'post',
                url: '/addCustomer',
                data: {
                    name: name,
                    email: email,
                },
                success: function() {
                    Swal.fire({
                    title: 'Success!',
                    text: 'Data berhasil ditambah',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                    })
                    setTimeout(function(){
                        window.location.reload()
                    }, 1000)
                }
            })
            })
    </script>
@endsection




@section('table')
    <script>
        let table = $('#tableCustomer').DataTable({
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
                {
                    render:function(data, type, row) {
                        return `
                            <button class='btn btn-success edit' data-id='${row.id}'>Update</button>
                            <button class='btn btn-danger delete' data-id='${row.id}'>Delete</button>
                        `
                    }
                }
            ]
        })




        // Edit
        $(document).on('click', '.edit', function(){

        let id = $(this).data('id')

        $.ajax({
            type: 'get',
            url: '/showEditCustomer/' + id,
            success: function(response) {
                $('#editModal').empty().append(`
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name :</label>
                        <input type="text" class="form-control" id="nameEdit" value='${response.name}'>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Email :</label>
                        <input class="form-control" id="emailEdit" value='${response.email}'>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Status :</label>
                        <select class="form-control" id="statusEdit">
                            <option value='NEW CUSTOMER'>New Customer</option>
                            <option value='LOYAL CUSTOMER'>Loyal Customer</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" id="submitEdiCustomer" data-id='${response.id}'>Submit</button>
                `)
            }
        })

        // $(document).off('click', '#submitEdiCustomer')

        $(document).on('click', '#submitEdiCustomer', function() {
            let id = $(this).data('id')
            let name = $('#nameEdit').val()
            let email = $('#emailEdit').val()
            let status = $('#statusEdit').val()

            $.ajax({
                type: 'post',
                url: '/editCustomer/' + id,
                data: {
                    name: name,
                    email: email,
                    status: status,
                },
                success: function() {
                    Swal.fire({
                    title: 'Success!',
                    text: 'Data berhasil diubah',
                    icon: 'success',
                    confirmButtonText: 'Cool'
                    })
                    setTimeout(function(){
                        window.location.reload()
                    }, 1500)
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "There was an error and can not update.",
                        icon: "error"
                    });
                }
            })
        })

        $('#formEditCustomer').modal('show')

        }) 




        // Delete
        $(document).on('click', '.delete', function(){

        let id = $(this).data('id')

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to delete this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'post',
                    url: '/deleteCustomer/' + id,
                    success: function() {
                        Swal.fire({
                        title: "Deleted!",
                        text: "Customer has been deleted.",
                        icon: "success"
                        });

                        table.ajax.reload();
                    },
                    error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "There was an error deleting the customer.",
                        icon: "error"
                    });
                    }
                });
            } else {
                table.ajax.reload();
            }
        })
        }) 
    </script>
@endsection