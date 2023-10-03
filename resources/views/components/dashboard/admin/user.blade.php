<tr>
    {{-- <td>
        <div class="table-image">
            @if ($product->images->count() > 0)
                <img src="{{ asset('storage/' . $product->images->first()->url) }}" class="img-fluid" alt="">
            @endif
        </div>
    </td> --}}

    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td class="{{ $user->is_active ? 'status-close' : 'status-danger' }}">
        <span>{{ $user->is_active ? 'Active' : 'Not Active' }}</span>
    </td>
    <td>{{ $user->phone_number }}</td>
    <td class="status-close"><span>{{ ucwords($user->type) }}</span></td>
    <td>{{ $user->created_at->format('Y-m-d') }}</td>
    <td>{{ $user->updated_at->format('Y-m-d') }}</td>

    <td>
        <ul>

            <li>
                <form action="{{ route('admin.users.edit', ['user' => $user]) }}" method="GET">
                    <button type="submit" class="update-button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalToggle">
                        <i class="ri-pencil-line"></i>
                    </button>
                </form>
            </li>

            <li>
                <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="delete-button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalToggle">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </form>
            </li>
        </ul>
    </td>
</tr>

<style>
    .delete-button {
        background-color: #e74c3c;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .delete-button:hover {
        background-color: #c0392b;
    }

    .update-button {
        background-color: #27ae60;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .update-button:hover {
        background-color: #219a52;
    }
</style>
