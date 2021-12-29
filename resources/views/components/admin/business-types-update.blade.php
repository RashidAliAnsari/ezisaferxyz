<div wire:ignore.self class="modal" id="update-modal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <form wire:submit.prevent="update">
                <div class="modal-header">
                    <h6 class="modal-title">Update Business Type</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Business Type"
                                wire:model.debounce.500ms="form.business_type">
                            @error('form.business_type')<p class="help-block input-error modal-input-error">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-indigo" type="submit">Update</button> <button class="btn btn-light"
                        data-dismiss="modal" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
