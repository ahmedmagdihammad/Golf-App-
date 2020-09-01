<?php

namespace App\Http\Controllers\Admin\Products;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\PriceProduct;
use App\Pricelist;
use App\Product;
use App\Category;
use Auth;

class PriceProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $priceproducts = PriceProduct::all();
        $products = Product::all();
        $pricelist = Pricelist::find($id);

        $categories = PriceProduct::all();
        foreach ($categories as $priceproduct) {
            $categories = Category::where('id', $priceproduct->product['category_id'])->get();
            # code...
        }
            return view('pages/products/priceProducts', compact('pricelist', 'priceproducts', 'id', 'categories', 'products'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $products = Product::all();
        $pricelist = Pricelist::find($id);
        $categories = Category::all();
        return view('pages/products/addPriceProduct', compact('products', 'pricelist', 'pricelist', 'id', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $c = 0;
        $data = $request->all();
        while(isset($data['product_id'][$c])){
            $PriceProduct = new PriceProduct();
            $PriceProduct->pricelist_id = $data['pricelist_id'][$c];
            $PriceProduct->product_id = $data['product_id'][$c];
            $PriceProduct->base_price = $data['base_price'][$c];
            $PriceProduct->coupon_price = $data['coupon_price'][$c];
            $PriceProduct->created_by = Auth::user()->id;
            $PriceProduct->save();
            $c++;
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
