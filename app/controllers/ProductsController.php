<?php

class ProductsController extends BaseController 
{    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($slug = null)
    {
        $terms = ucfirst(str_replace('-', ' ', $slug));
        $products = Product::where('title', 'LIKE', "%{$terms}%")->paginate(10);
        
        return View::make('products.index', compact('terms', 'products'));
    }

	/**
	 * @return mixed
	 */
	public function search()
    {
        $slug = Str::slug(Input::get('terms'));
        return Redirect::route('products', $slug);
    }

	/**
	 * @param Product $product
	 * @return mixed
	 */
	public function show(Product $product)
	{
		$link = Link::findOrCreate($product, Sentry::getUser());

		return View::make('products.show', compact('link', 'product'));
	}

	/**
	 * @param $code
	 * @return mixed
	 */
	public function redirect($code)
	{
		$link = Link::whereCode($code)->first();
		$url = $link->product->url . '&r=' . $code;
		return Redirect::to($url);
	}
}