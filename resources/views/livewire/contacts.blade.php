<div class="card p-5">
    <p>Contacts</p>
    <hr class="m-0 p-0">
    @foreach ($contacts as $contact)
        <div class="card p-3 mb-1">
            <div class="row">
                <div class="col">Name: {{ $contact->name }}</div>
                <div class="col">Email: {{ $contact->email }}</div>
                <div class="col">Phone: {{ $contact->phone }}</div>
            </div>
        </div>
    @endforeach
</div>
