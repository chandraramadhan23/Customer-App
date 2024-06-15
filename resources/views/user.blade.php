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
                        <button id="addUserButton" type="button" class="btn btn-primary btn-animation waves-effect waves-light mb-3" data-text="click me!"><span>Add User</span></button>
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
                                            {{-- <th data-ordering="false">ID</th> --}}
                                            <th data-ordering="false">ID</th>
                                            <th data-ordering="false">username</th>
                                            <th data-ordering="false">name</th>
                                            {{-- <th data-ordering="false">Password</th> --}}
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
    <!-- Modal add User -->
    @include('modals.modalAddUser')
    @include('modals.modalEditUser')

    <script>
        $(document).on('click', '#addUserButton', function() {
                $('#formAddUser').modal('show')
            })

            $(document).on('click', '#submitAddUser', function() {
                let name = $('#name').val()
                let username = $('#username').val()
                let password = $('#password').val()

                $.ajax({
                type: 'post',
                url: '/addUser',
                data: {
                    name: name,
                    username: username,
                    password: password,
                },
                success: function() {
                    alert('Berhasil!')
                    window.location.reload()
                }
            })
            })
    </script>
@endsection




<!-- Show Table - Datatable -->
@section('table')
    <script>
        let table = $('#tableUser').DataTable({
            searching: true,
            serverSide: true,
            ajax: {
                type: 'get',
                url: '/showTableUser',
            },
            columns: [
                {data: 'id'},
                {data: 'username'},
                {data: 'name'},
                {
                    render:function(data, type, row) {
                        return `
                            <button class='btn btn-info edit' data-id='${row.id}'>Edit</button>
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
            url: '/showEdit/' + id,
            success: function(response) {
                $('#editModal').empty().append(`
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name :</label>
                        <input type="text" class="form-control" id="nameEdit" value='${response.name}'>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Username :</label>
                        <input class="form-control" id="usernameEdit" value='${response.username}'>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Password :</label>
                        <input class="form-control" id="passwordEdit" value='${response.name}'>
                    </div>
                    <button type="button" class="btn btn-primary" id="submitEditUser" data-id='${response.id}'>Submit</button>
                `)
            }
        })

        $(document).on('click', '#submitEditUser', function() {
            let id = $(this).data('id')
            let name = $('#nameEdit').val()
            let username = $('#usernameEdit').val()
            let password = $('#passwordEdit').val()

            $.ajax({
                type: 'post',
                url: '/edit/' + id,
                data: {
                    name: name,
                    username: username,
                    password: password,
                },
                success: function() {
                    window.location.reload();
                }
            })
        })

        $('#formEditUser').modal('show')

        }) 



        // Delete
        $(document).on('click', '.delete', function(){

        let id = $(this).data('id')

        $.ajax({
            type: 'post',
            url: '/delete/' + id,
            success: function() {
                if (confirm('Are you sure?')) {
                    table.ajax.reload();
                }
              }
            })
        }) 
    </script>
@endsection