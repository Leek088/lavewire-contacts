<div class="card p-5">

    <div class="d-flex justify-content-between mb-3">
        <div>
            <h3>CONTACTS</h3>
        </div>
        <div class="d-flex gap-2 align-items-center">
            <span>Search:</span>
            <input wire:model.live ="search" type="text" class="form-control form-control-sm">
        </div>
    </div>

    <hr class="m-0 p-0 mb-1">
    @if ($contacts->count() === 0)
        <div class="opacity-50">No contacts found!</div>
    @else
        @foreach ($contacts as $contact)
            <div class="card bg-dark p-3 mb-1">
                <div class="row">
                    <div class="col">Name: {{ $contact->name }}</div>
                    <div class="col">Email: {{ $contact->email }}</div>
                    <div class="col">Phone: {{ $contact->phone }}</div>
                    <div class="col">
                        <a href="{{ route('contact.edit', ['id' => Crypt::encryptString($contact->id)]) }}"
                            class="btn btn-info btn-sm">edit</a>
                        <a href="{{ route('contact.delete', ['id' => Crypt::encryptString($contact->id)]) }}"
                            class="btn btn-danger btn-sm">delete</a>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $contacts->links() }}
    @endif
</div>
