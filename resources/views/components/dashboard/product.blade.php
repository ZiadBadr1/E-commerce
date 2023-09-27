<tr>
    <td>
        <div class="table-image">
            @if ($product->images->count() > 0)
                <img src="{{ asset('storage/' . $product->images->first()->url) }}" class="img-fluid" alt="">
            @endif
        </div>
    </td>

    <td>{{ $product->name }}</td>

    <td>{{ $product->category->name }}</td>

    <td>{{ $product->store->name }}</td>

    <td>{{ $product->in_stock }}</td>

    <td class="td-price">{{ (new App\ValueObjects\PriceValueObject($product->price))->getPrice() }}</td>

    <td class="{{ $product->is_active ? 'status-close' : 'status-danger' }}">
        <span>{{ $product->is_active ? 'Active' : 'Not Active' }}</span>
    </td>

    <td>
        <ul>
            <li>
                <a href="order-detail.html">
                    <i class="ri-eye-line"></i>
                </a>
            </li>

            <li>
                <a href="javascript:void(0)">
                    <i class="ri-pencil-line"></i>
                </a>
            </li>

            <li>
                <form action="{{ route('products.destroy', ['product' => $product]) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="custom-button" data-bs-toggle="modal"
                        data-bs-target="#exampleModalToggle">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                </form>
            </li>
        </ul>
    </td>
</tr>

<style>
    .custom-button {
        background-color: #e74c3c;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .custom-button:hover {
        background-color: #c0392b;
    }
</style>
