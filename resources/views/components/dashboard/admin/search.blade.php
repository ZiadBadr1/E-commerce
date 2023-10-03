<form action="{{ URL::current() }}" method="get" class="form-inline mb-3" >
    <div class="form-group mx-2 flex-grow-1">
        <input class="form-control w-100" name="name" type="text" placeholder="Name" value="{{ request('name') }}">
    </div>

    <div class="form-group mx-2 flex-grow-1">
        <select class="form-control w-100" name="is_active">
            <option value="">ALL</option>
            <option value="1" @selected(request('is_active')=='1')>Active</option>
            <option value="archived"@selected(request('is_active')=='archived')>Archived</option>
        </select>
    </div>

    <button class="btn btn-dark mx-2">Filter</button>
</form>
