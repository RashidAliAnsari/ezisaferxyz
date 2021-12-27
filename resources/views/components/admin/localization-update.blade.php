<div wire:ignore.self class="modal" id="update-modal">
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <form wire:submit.prevent="updateKey">
                <div class="modal-header">
                    <h6 class="modal-title">Updae Translation Key</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Key"
                                wire:model.debounce.500ms="form.key">
                            @error('form.key')<p class="help-block input-error modal-input-error">
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


<div wire:ignore.self class="modal" id="update-modal-values">
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <form wire:submit.prevent="updateValue">
                <div class="modal-header">
                    <h6 class="modal-title">Update Translation Values</h6><button aria-label="Close"
                        class="close" data-dismiss="modal" type="button"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <div class="form-group mt-5">
                            <input type="text" class="form-control" placeholder="Enter English Value"
                                wire:model.debounce.500ms="form.value_en">
                            @error('form.value_en')<p class="help-block input-error modal-input-error">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mt-5">
                            <input type="text" class="form-control" placeholder="Enter Malay Value"
                                wire:model.debounce.500ms="form.value_ms">
                            @error('form.value_ms')<p class="help-block input-error modal-input-error">
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
