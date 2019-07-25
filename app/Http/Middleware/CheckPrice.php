<?php

namespace App\Http\Middleware;

use App\Product;
use Closure;
use Scrapper;

class CheckPrice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $expired_products = Product::selectRaw('id, price, link_url, IF(DATE_ADD(created_at, INTERVAL 1 HOUR) > CURDATE(), 1, 0) AS is_expired')
                                ->get()
                                ->where('is_expired', 1);
        if(!empty($expired_products))
        {
            foreach($expired_products AS $product)
            {
                $id = $product->id;
                $link = $product->link_url;

                $crawler = Scrapper::request('GET', $link);
                $price = trim($crawler->filter('.price-wrapper')->text());

                $product->price = $price;
                $product->save();
            }
        }

        return $next($request);
    }
}
