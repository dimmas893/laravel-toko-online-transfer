<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
  
    protected $fillable = ['product_id','user_id','no_rekening','comment','status','viewed'];
    public function user(){
    return $this->belongsTo(User::class);
  }

  public function product(){
    return $this->belongsTo(Product::class);
  }
}
