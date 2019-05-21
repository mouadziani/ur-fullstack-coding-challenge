<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $liked = (auth()->user()->shops()->where('shop_id', $this->id)->count() > 0) ? true : false;
        
        return [
            'id' => $this->id, 
            'name' => $this->name, 
            'image' => $this->image, 
            'distance' => $this->distance, 
            'likes' => $this->likes, 
            'dislikes' => $this->dislikes,
            'liked' => $liked
        ];
    }
}
