<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Actions\StoreActions\DeleteStoreAction;
use App\Actions\StoreActions\ForceDeleteStoreAction;
use App\Actions\StoreActions\IndexStoreAction;
use App\Enums\PaginationPerPage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Store\UpdateStoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class AdminStoreController extends Controller
{
    public function index(IndexStoreAction $indexStoreAction)
    {
        $stores = $indexStoreAction->execute();
        return view('dashboard.admin.store.index',compact('stores'));
    }

    public function edit(Store $store)
    {
        return view('dashboard.admin.store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->validated());

        return Redirect::route('admin.store.index')->with('success', 'User updated successfully.');
    }

    public function destroy(Store $store, DeleteStoreAction $deleteStoreAction)
    {
        $deleteStoreAction->execute($store);

        return redirect(route('admin.store.index'))->with('success', 'store deleted successfully');
    }
    public function restore($slug)
    {
        $store = Store::onlyTrashed()->where('slug', $slug)->firstOrFail();
        $store->restore();
        return redirect()->route('admin.store.index');

    }
    public function trash()
    {
        $request = request();
        $stores = Store::onlyTrashed()->filter($request->query())->paginate(5);
        return view('dashboard.admin.store.trash',compact('stores'));

    }
    public function forceDelete(string $slug, ForceDeleteStoreAction $forceDeleteStoreAction)
    {
        $store = Store::onlyTrashed()->where('slug', $slug)->firstOrFail();
        $forceDeleteStoreAction->execute($store);

        return redirect()->route('admin.store.index')->with('success', 'store deleted forever');
    }
}
