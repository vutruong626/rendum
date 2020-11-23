<div>
    <div class="w-100 text-center">
        <input type="datetime-local" class="btn btn-primary ml-2" id="check_time" onchange="getTime()" />
    </div>

    <!-- Modal -->
    <div class="modal fade" id="registerUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>Full name</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control">
                            <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="email" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
