<?php

namespace App\Http\Controllers\Dashboard\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class SellerCategoriesController extends Controller
{
    public function index()
    {
        $request = request();
        $categories = Category::with('parent')->where('is_active','=','1')->filter($request->query())->paginate(5);
        return view('dashboard.seller.categories.index', compact('categories'));
    }

    public function AskToAddCategory()
    {
    }
}
