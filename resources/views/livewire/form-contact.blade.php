<div class="card p-5">
    <h3>NEW CONTACT</h3>
    <hr>
    <form wire:submit="newContact">
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
        <div class="text-end">
            <button class="btn btn-secondary px-5">Save</button>
        </div>
    </form>

    <script>
        window.addEventListener('notification', event => {
            Swal.fire({
                icon: event.detail.icon,
                title: event.detail.title,
                position: event.detail.position,
            });
        });
    </script>

</div>
