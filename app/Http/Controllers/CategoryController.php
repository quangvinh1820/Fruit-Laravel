<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function category()
    {
        $data = $this->categoryRepository->getAllCategoriesWithProductCount();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = ['cat_title' => $request->category];
        $this->categoryRepository->create($data);
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function cat_delete($id)
    {
        $this->categoryRepository->delete($id);
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function cat_update(Request $request, $id)
    {
        $category = $this->categoryRepository->find($id); 
        $category->cat_title = $request->cat_name;
        $category->save();
        return redirect()->back()->with('message', 'Category Updated Successfully');
    }
}
