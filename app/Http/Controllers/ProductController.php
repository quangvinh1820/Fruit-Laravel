<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function add_product()
    {
        $data = $this->categoryRepository->all();
        return view('admin.add_product', compact('data'));
    }

    public function store_product(Request $request)
    {
        $data = [
            'name' => $request->pro_name,
            'price' => $request->pro_price,
            'description' => $request->pro_des,
            'quanity' => $request->pro_quanity,
            'category_id' => $request->category,
        ];

        $image = $request->pro_img;

        if($image)
        {
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('product', $image_name);
            $data['image'] = $image_name;
        }

        $this->productRepository->create($data);

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function show_product()
    {
        $data = $this->productRepository->all();
        return view('admin.product', compact('data'));
    }

    public function product_delete($id)
    {
        $this->productRepository->delete($id);
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function product_update($id)
    {
        $data = $this->productRepository->find($id);
        $category = $this->categoryRepository->all();
        return view('admin.update_product', compact('data', 'category'));
    }

    public function update_produte(Request $request, $id)
    {
        $product = $this->productRepository->find($id);
        
        $product->name = $request->pro_name;
        $product->price = $request->pro_price;
        $product->description = $request->pro_des;
        $product->quanity = $request->pro_quanity;
        $product->category_id = $request->category;

        $image = $request->pro_img;

        if($image)
        {
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('product', $image_name);
            $product['image'] = $image_name;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product Updated Successfully');
    }
}
