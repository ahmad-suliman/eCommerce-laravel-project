<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use App\Models\imageProduct;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    public function showProduct($catid = null)
    {
        $products = Product::when($catid, function ($query) use ($catid) {
            $query->where('category_id', $catid);
        })
            ->paginate(5);

        return view('product', compact('products'));
        //if (!$catid) {
        //$result = DB::table('products')->get();
        // $result = Product::paginate(5);
        //return view('product', ['products' => $result]);
        //  } else {
        // $result = DB::table('products')->where('category_id',$catid)->get();
        //    $result = Product::where('category_id', $catid)->get();
        //   return view('product', ['products' => $result]);
        //  }
    }
    public function addProduct()
    {
        $category = category::all();
        return view('/Product.addProduct', ['categories' => $category]);
    }
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => [
                'image',    // Ensures the uploaded file is an image
                'mimes:jpeg,png,jpg,gif', // Allowed image types
                'max:2048'
            ],
        ]);
        //edit product
        if ($request->id) {
            $currentproduct = product::find($request->id);
            $currentproduct->name =          $request->name;
            $currentproduct->description =   $request->description;
            $currentproduct->price =         $request->price;
            $currentproduct->quantity =      $request->quantity;
            $currentproduct->category_id =   $request->category_id;
            $photoPath = '';
            if ($request->has('photo')) {
                $photoPath = $request->photo->move('uploads', Str::uuid()->toString() . '_' . $request->photo->getClientOriginalName());
            }
            $currentproduct->imagepath = $photoPath;
            $currentproduct->save();
            return redirect('/product');
        } else {
            //add product
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->category_id = $request->category_id;
            $photoPath = '';
            if ($request->has('photo')) {
                $photoPath = $request->photo->move('uploads', Str::uuid()->toString() . '_' . $request->photo->getClientOriginalName());
            }
            $product->imagepath = $photoPath;
            $product->save();

            return redirect('/addProduct');
        }
    }
    public function deleteproduct($productId)
    {
        if ($productId) {
            $cureentProduct = Product::findOrFail($productId);
            $cureentProduct->delete();
            return redirect('/product');
        } else {
            abort('403');
        }
    }
    public function editproduct($productId)
    {
        $category = category::all();
        $product  = Product::findOrFail($productId);
        return view('product.editproduct', ['categories' => $category, 'product' => $product]);
    }
    public function singleProduct($productId)
    {
        $product = Product::with(['category', 'imageProduct'])->findOrFail($productId);
        $relatedProduct = Product::where('category_id', $product->category_id)->where('id', '!=', $productId)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        return view('product.singleProduct', compact('product','relatedProduct'));
    }

    public function addImages($productid)
    {
        $imageProduct = imageProduct::where('product_id', $productid)->get();
        return view('product.addImages', ['imageProduct' => $imageProduct, 'productId' => $productid]);
    }
    public function saveImage(Request $request)
    {
        $request->validate([
            'photo' => [
                'image',    // Ensures the uploaded file is an image
                'mimes:jpeg,png,jpg,gif', // Allowed image types
                'max:2048'
            ],
        ]);
        $newPhoto = new imageProduct();
        $newPhoto->product_id = $request->product_id;
        $photoPath = '';
        if ($request->has('photo')) {
            $photoPath = $request->photo->move('uploads', Str::uuid()->toString() . '_' . $request->photo->getClientOriginalName());
        }
        $newPhoto->imagepath = $photoPath;
        $newPhoto->save();
        return redirect()->back()->with('added', 'Image Added successfully');
    }
    public function deleteImage($image_id = null)
    {
        if ($image_id != null) {
            $current_image = imageProduct::findOrFail($image_id);

            $current_image->delete();
            return redirect()->back()->with('delete', 'Image deleted successfully');
        } else {
            abort('403');
        }
    }
}
