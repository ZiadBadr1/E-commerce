@php
$productPrice = new App\ValueObjects\PriceValueObject($product->price);
@endphp

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

    <td>{{ $product->in_stock }}</td>

    <td class="td-price">{{ $productPrice->getPriceWithCurrency() }}</td>

    <td>{{ $product->discount_precentage }} %</td>

    <td class="td-price">{{ $productPrice->getPriceAfterDiscountWithCurrency($product->discount_precentage) }}</td>

    <td class="{{ $product->is_active ? 'status-close' : 'status-danger' }}">
        <span>{{ $product->is_active ? 'Active' : 'Not Active' }}</span>
    </td>

    <td>
        <ul>

            <li>
                <form action="{{ route('dashboard.seller.products.edit', ['product' => $product]) }}" method="GET">
                    <button type="submit" class="update-button" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                        <i class="ri-pencil-line"></i>
                    </button>
                </form>
            </li>

            <li>
                <form action="{{ route('dashboard.seller.products.destroy', ['product' => $product]) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="delete-button" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
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
