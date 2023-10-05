@extends('dashboard.admin.layouts.master')
@section('title', 'Stores')
@section('header-title', 'Stores')


@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title d-sm-flex d-block">
                            <h5>Stores List</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a class="btn btn-danger" href="{{ route('store.trash') }}">Trashed </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @include('components.dashboard.admin.search')
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package theme-table table-product" id="table_id">
                                    <thead>
                                    <tr>
                                        <th>Logo Image</th>
                                        <th>Store Name</th>
                                        <th>Status</th>
                                        <th>Option</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse ($stores as $store)
                                        <tr>

                                            <td><img src="{{ asset('storage/' . $store->logo_image) }} " height="60px">
                                            </td>



                                            <td>{{ $store->name }}</td>


                                            <td class="{{ $store->is_active ? 'status-close' : 'status-danger' }}">
                                                <span>{{ $store->is_active ? 'Active' : 'Not Active' }}</span>
                                            </td>

                                            <td>
                                                <ul>

                                                    <li>
                                                        <form action="{{ route('store.edit', ['store' => $store]) }}"
                                                              method="GET">
                                                            <button type="submit" class="update-button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                <i class="ri-pencil-line"></i>
                                                            </button>
                                                        </form>
                                                    </li>

                                                    <li>
                                                        <form
                                                            action="{{ route('store.destroy',['store' => $store]) }}"
                                                            method="POST">
                                                            @method('DELETE')
                                                            @csrf

                                                            <button type="submit" class="delete-button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>


                                    @empty
                                        <tr>
                                            <td colspan="8">No Stores found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 15px ;direction: rtl">

                        {{ $stores->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
        <!-- Container-fluid Ends-->
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
@endsection
