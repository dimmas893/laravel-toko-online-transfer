<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistCntroller extends Controller
{
        protected $product=null;
    public function __construct(Product $product){
        $this->product=$product;}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        
        $wishlists = Wishlist::with(['product', 'user'])->where('user_id', Auth::user()->id)->get();
        return view('wishlist.index', compact('wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            
            $produk = Product::with(['user'])->firstOrFail(); 
            $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $produk->id)->first();
            if($wishlist == null){
                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::user()->id;
                $wishlist->product_id = $request->product_id;
                $wishlist->save();
            }
            return redirect()->route('wishlists.index')->with('success','Data Berhasil Di Tambahkan !!');
        }
        return 0;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $item = Wishlist::findorFail($id);
        $item->delete();

        return redirect()->route('wishlists.index')->with('success','Data Berhasil Di Delete !!');
    }

}
