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
        $products = Product::where('title', 'LIKE', "%{$terms}%")->paginate(16);
        $v = Validator::make(Input::all(), Product::$rules);

		if($v->fails()) {
			return Redirect::route('x')->withErrors($v->getErrors());
		}
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
		$user				= Sentry::getUser();
		$link 				= Link::findOrCreate($product, $user);
		$reccomendations	= Reccomendation::whereUserId($user->id)->whereStatus('draft')->get();
		$url				= URL::route('products.redirect', $link->code);

		return View::make('products.show', compact('link', 'product', 'url', 'reccomendations'));
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