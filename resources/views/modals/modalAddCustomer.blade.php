{{-- Modal Add Customer --}}
<div class="modal fade" id="formAddCustomer" tabindex="-1" aria-labelledby="varyingcontentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="varyingcontentModalLabel">Add New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="text-warning">
                        Menambah customer baru akan mengirimkan email secara otomatis!
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Name :</label>
                        <input type="text" class="form-control" id="name" name="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Email :</label>
                        <input class="form-control" id="email">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="sumitAddCustomer">Submit</button>
            </div>
        </div>
    </div>
</div>