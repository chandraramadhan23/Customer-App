{{-- Modal Add Customer --}}
<div class="modal fade" id="formAddUser" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Add New User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name :</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Username :</label>
                        <input class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Password :</label>
                        <input class="form-control" id="password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitAddUser">Submit</button>
            </div>
        </div>
    </div>
</div>