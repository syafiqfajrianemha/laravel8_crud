<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $path = 'images';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = 10;
        $products = Product::paginate($limit);
        $no = $limit * ($products->currentPage() - 1);

        return view('product.index', compact('products', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric',
            'image'         => 'required|mimes:png,jpg,jpeg',
            'category_id'   => 'required|numeric'
        ]);

        $image = $request->file('image');
        $imageName = $image->storeAs(
            $this->path,
            time() . '.' . $image->getClientOriginalExtension(),
            'public'
        );

        Product::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'image'         => $imageName,
            'category_id'   => $request->category_id
        ]);

        return redirect()->route('product.index')->with('message', 'Product has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required|numeric',
            'image'         => 'mimes:png,jpg,jpeg',
            'category_id'   => 'required|numeric'
        ]);

        $product = Product::find($id);
        $imageName = $product->image;

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $imageName);
            $image = $request->file('image');
            $imageName = $image->storeAs(
                $this->path,
                time() . '.' . $image->getClientOriginalExtension(),
                'public'
            );
        }

        $product->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'price'         => $request->price,
            'image'         => $imageName,
            'category_id'   => $request->category_id
        ]);

        return redirect()->route('product.index')->with('message', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        Storage::delete('public/' . $product->image);
        Product::destroy($product->id);

        return redirect()->route('product.index')->with('message', 'Product has been deleted');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if ($keyword == null) {
            return redirect()->route('product.index');
        }
        $limit = 10;
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')->paginate($limit);
        $no = $limit * ($products->currentPage() - 1);

        return view('product.search', compact('products', 'no'));
    }
}
