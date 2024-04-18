<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $company_id = $request->input('company_id');
        $query = Product::query();

        if(!empty($keyword)){
            $query->where('product_name', 'LIKE', "%{$keyword}%");
        }

        if(!empty($company_id)){
            $query->where('company_id', 'LIKE', "%{$company_id}%");
        }
        $products = $query->latest()->paginate(10);
        $companies = Company::all();
        return view('product.index', compact('products','companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();

        return view('product.create')
            ->with('companies', $companies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $inputs = $request->validate([
                'product_name' => 'required | max:255',
                'price' => 'required | max:255',
                'stock' => 'required | max:255',
                'comment' => 'nullable | max:1000',
                'img_path' => 'image | max:1024'
            ]);
    
            $product = new Product();
            $company = new Company();
    
            $product->company_id = $request->company_id;
            $product->product_name = $request->product_name;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->comment = $request->comment;
    
            $company->company_name = $request->company_name;
            
            if(request('img_path')){
                $original = request()->file('img_path')->getClientOriginalName();
                $name = date('Ymd_His') . '_' . $original;
                request()->file('img_path')->move('storage/img_paths', $name);
                $product->img_path = $name;
            }
    
        }catch(\Exception $e){
            $e->getMessage();
            session()->flash('flash_message', '更新が失敗しました');
        }
        $product->save();
        return redirect()->route('product.create')->with('message', '投稿を作成しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $companies = Company::all();

        return view('product.edit', compact('product'))
            ->with('companies', $companies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        try{
            $inputs = $request->validate([
                'product_name' => 'required | max:255',
                'company_id' => 'required | max:255',
                'price' => 'required | max:255',
                'stock' => 'required | max:255',
                'comment' => 'nullable | max:1000',
                'img_path' => 'image | max:1024'
            ]);
            $company = new Company();
            $company->company_name = $request->company_name;
    
            $product->company_id = $request->company_id;
            $product->product_name = $request->product_name;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->comment = $request->comment;
            
            if(request('img_path')){
                $original = request()->file('img_path')->getClientOriginalName();
                $name = date('Ymd_His') . '_' . $original;
                request()->file('img_path')->move('storage/img_paths', $name);
                $product->img_path = $name;
            }
    
    
        }catch(\Exception $e){
            $e->getMessage();
            session()->flash('flash_message', '更新が失敗しました');
        }
        $product->save();
        return redirect()->route('product.edit', $product)->with('message', '投稿を更新しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('message', '投稿を削除しました。');
    }
}