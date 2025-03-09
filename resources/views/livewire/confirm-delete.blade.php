<div>
    <div class="text-center">
        <p>Do you really want to delete this contact?</p>
        <p>Nome: <strong class="text-white">{{ $contact->name }}</strong></p>
        <p>E-mail: <strong class="text-white">{{ $contact->email }}</strong></p>
        <p>Phone: <strong class="text-white">{{ $contact->phone }}</strong></p>
        <button wire:click="cancel" class="btn btn-primary px-5">No</button>
        <button wire:click="delete" class="btn btn-warning px-5">Yes</button>
    </div>
</div>
