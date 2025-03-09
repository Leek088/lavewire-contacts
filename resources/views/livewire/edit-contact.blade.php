<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div class="card p-5">
                <h3>EDIT CONTACT</h3>
                <hr>
                <form wire:submit="updateContact">
                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input wire:model="name" type="text" class="form-control">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input wire:model="email" type="email" class="form-control">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone">Phone</label>
                        <input wire:model="phone" type="phone" class="form-control">
                        @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-between">
                        <a wire:click="cancel" class="btn btn-secondary px-5">Cancel</a>
                        <button class="btn btn-secondary px-5">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
