<?php
namespace App\Repositories;

use App\Models\Category;

class EloquentCategoryRepository implements CategoryRepositoryInterface
{
    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($data, $id)
    {
        
    }

    public function delete($id)
    {
        return Category::destroy($id);
    }

    public function getAllCategoriesWithProductCount()
    {
        return Category::select('categories.cat_title', 'categories.id')
            ->selectRaw('COUNT(products.id) as product_count')
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->groupBy('categories.cat_title', 'categories.id')
            ->get(); 
    }
}