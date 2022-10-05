<?php

namespace App\Repositories;

use App\Http\Requests\ProductRequest;
use App\Interfaces\IProductRepository;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductRepository extends BaseRepository implements IProductRepository
{
    protected $model;

    public function __construct(Product $model)
    {
        parent::_construct($model);
    }


    public function CreateProduct($request)
    {
        try {
            DB::beginTransaction();
            $image_path = null;

            if ($request->hasFile('featured_image')) {
                $file = $request->file('featured_image');
                $image_path = $file->storeAs('product', $request->name . "." . $file->getClientOriginalExtension(), 'public');
            }


            $product = $this->model;

            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->stock = $request->stock;
            $product->price = $request->price;
            $product->discounted_price = $request->discounted_price;
            $product->description = $request->description;
            $product->image_path = $image_path;
            $product->save();

            if ($request->hasFile('others_images')) {
                foreach ($request->file('others_images') as $img) {
                    $others = new OtherImage();
                    $others->product_id = $product->id;
                    $others->image_path = $img->store("product", "public");
                    $others->save();
                }
            }

            foreach ($request->product_size as $s) {
                $size = new Size();
                $size->product_id = $product->id;
                $size->name = $s;
                $size->save();
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }


    public function GetLatestProduct()
    {
        return $this->model->orderBy("created_at")->take(12)->get();
    }

    public function GetSpecialProduct()
    {
        return $this->model->where('discounted_price', '>', 5)->get();
    }


    public function GetRandomProduct()
    {
    }
}