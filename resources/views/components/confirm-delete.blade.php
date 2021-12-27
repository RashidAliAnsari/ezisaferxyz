<div wire:ignore.self class="modal" id="confirm-delete" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <form wire:submit.prevent="store">
                <div class="modal-header">
                    <h6 class="modal-title">Delete Confirm</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-indigo" wire:click.prevent="destroy()">Yes, Delete</button> <button
                        class="btn btn-light" data-dismiss="modal" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
