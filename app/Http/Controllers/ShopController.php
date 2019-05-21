<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Http\Resources\ShopResource;

class ShopController extends Controller
{
    /**
     * Display a listing of the shops.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'shops' => ShopResource::collection(Shop::all())
        ], 200);
    }

    /**
     * Increment likes of the specified shop in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);

        $shop->increment('likes');
        if($shop->dislikes > 0) 
            $shop->decrement('dislikes');
        $shop->users()->attach(auth()->id());
        
        return response()->json([
            'shop' => ShopResource::make($shop)
        ], 201);
    }

    /**
     * Increment dislikes of the specified shop in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dislike(Request $request, $id)
    {
        $shop = Shop::findOrFail($id);

        $shop->increment('dislikes');
        if($shop->likes > 0)  
            $shop->decrement('likes');
        $shop->users()->detach(auth()->id());
        
        return response()->json([
            'shop' => ShopResource::make($shop)
        ], 201);
    }

    /**
     * Display a listing of the preferred shops.
     *
     * @return \Illuminate\Http\Response
     */
    public function prefrredShop()
    {
        return response()->json([
            'shops' => ShopResource::collection(auth()->user()->shops()->get())
        ], 201);
    }

    /**
     * Remove the specified shop form preferred shops of connected user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removePreferred($id)
    {
        $shop = Shop::findOrFail($id);

        if($shop->likes > 0)  
            $shop->decrement('likes');
        $shop->users()->detach(auth()->id());
        
        return response()->json([
            'shop' => ShopResource::make($shop)
        ], 201);
    }
}
