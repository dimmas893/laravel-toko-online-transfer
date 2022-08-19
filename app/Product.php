<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $fillable = ['name','image','description','price','weigth','categories_id','stok','slug'];
    
        public function user(){
    	return $this->belongsTo(User::class);
    }

        public function reviews(){
    return $this->hasMany(Review::class)->where('status', 1);
    }
    
    public function wishlists(){
    return $this->hasMany(Wishlist::class);
    }
}
