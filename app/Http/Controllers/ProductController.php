<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\EditProductRequest;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $products = Product::orderby('id','desc')->paginate(5);

        return view('product.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $data = $request->all();

        // dd(e($request->Description));

        if ($request->hasFile('Photo')) {
            
            $photo = $request->Photo;

            $photo_name = $photo->getClientOriginalName();

            $photo->move('photo',$photo_name);

        }

        $data['Photo']= 'photo/' .$photo_name;

        $data['Description'] = e($request->Description);


        Product::create($data);

        session()->flash('notification', 'create new successful!');

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show',['product' =>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('product.edit',['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, $id)
    {
        $product = Product::where('id',$id);

        // dd(e($request->Description));

        if (!empty($request->Photo)) {
            if ($request->hasFile('Photo')) {
            
                $photo = $request->Photo;

                $photo_name = $photo->getClientOriginalName();

                $photo->move('photo',$photo_name);

            }
            $request->Photo = 'photo/' .$photo_name;

            $product->update(['Name' => $request->Name,'Description' => e($request->Description),'Photo' => $request->Photo,'Price' => $request->Price]);
        }
        else{
            $product->update(['Name' => $request->Name,'Description' => e($request->Description),'Price' => $request->Price]);
        }

        session()->flash('notification', 'update successful!');

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        session()->flash('notification', 'delete successful!');

        return redirect()->back();
    }
}
