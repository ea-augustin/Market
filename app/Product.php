<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Cart;
use App\Image;


class Product extends Model
{
    //

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
        ,'description'
        ,'price'
        ,'stock'
        ,'status'
        
    ];

  public function carts()
   {
       return $this->morphedByMany(Cart::class,'productable')->withPivot('quantity');
   }
  

   public function orders()
   {
       return $this->morphedByMany(Order::class,'productable')->withPivot('quantity');
   }

   public function images(){
    return $this->morphMany(Image::class,'imageable');
   }

   public function scopeAvailable($query){   
   return $query->where('status','available');
   }

   public function getTotalAttribute(){

   return $this->price * $this->pivot->quantity;

   }

   

}
