<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="row">
                    <h1>Do you want to delete item??</h1>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button class="btn btn-primary" data-dismiss="modal" aria-label="Close">Cancel</button>
                <button class="btn btn-danger delete" data-model="{{$model}}">Delete</button>
            </div>
        </div>
    </div>
</div>