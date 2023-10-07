<form action="{{ URL::current() }}" method="get" class="form-inline mb-3" >
    <div class="form-group mx-2 flex-grow-1">
        <input class="form-control w-100" name="name" type="text" placeholder="Name" value="{{ request('name') }}">
    </div>
    <button class="btn btn-dark mx-2">Filter</button>
</form>
