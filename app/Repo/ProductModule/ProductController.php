<?php

namespace App\Repo\ProductModule;

use App\Http\Controllers\Controller;
use App\Repo\ProductModule\ProductsRepo as Products;
use App\Repo\StoreModule\StoresRepo as Stores;
use App\Repo\ProductModule\ProductFormRequest;
use Request;

class ProductController extends Controller {

    private $products, $stores;

    public function __construct(Products $products, Stores $stores)
    {
        $this->products = $products;
        $this->stores = $stores;
    }

    public function getIndex()
    {
        $model = $this->products->with(['stores'])->all();

        return view('jrs.product.product',compact(['model']));
    }

    public function getShow($id = 1)
    {
        $model = $this->products->find($id);

        $data['stores'] = $this->stores->all();

        return view('jrs.product.show-product',compact(['model','data']));
    }

    public function getRemove($id = 1)
    {
        $model = $this->products->find($id);

        return view('jrs.product.remove-product',compact(['model','data']));
    }

    public function getCreateProduct()
    {
        $data['stores'] = $this->stores->all();

        return view('jrs.product.create-product',compact(['model','data']));
    }

    public function postCrudProduct(ProductFormRequest $request)
    {
        $request = Request::all();

        $this->products->jrsCRUD($request);

        return redirect('/product');
    }
}
