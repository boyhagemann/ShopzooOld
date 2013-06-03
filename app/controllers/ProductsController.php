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
    
    public function search()
    {
        $slug = Str::slug(Input::get('terms'));
        return Redirect::route('products', $slug);
    }

	public function link(Product $product)
	{
		$code = Link::shorten($product, Sentry::getUser());
		var_dump($code); exit;
	}
}