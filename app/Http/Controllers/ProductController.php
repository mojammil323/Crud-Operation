<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class ProductController extends Controller
{
    //this method will show products page
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('products.list', [
            'products' => $products
        ]);

    }

    //this method will show create product page
    public function create()
    {
        return view('products.create');

    }

    //this method will  store a product in database
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
        ];

        if ($request->image != "") {
            $rules['image'] = 'image';

        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }

        if ($request->image != "") {
            //here we will insert product in database
            $product = new Product();
            $product->name = $request->name;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->save();

            //here we will inser the image
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;

            //save image to products directory
            $image->move(public_path('uploads/products'), $imageName);
            //save image name in database
            $product->image = $imageName;
            $product->save();

        }


        return redirect()->route('products.index')->with('success', 'Product Added Successfully');




    }

    //this method will show edit product page
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',[
            'product' => $product

        ]);
       

    }

    //this method will update a product page
    public function update()
    {

    }

    //this method will delete our product
    public function delete($id)
    {
        $isDelete = Product::destroy($id);
        if ($isDelete) {
            return redirect('products');
        } else {
            echo "somthing is going wrong";
        }
    }
}
