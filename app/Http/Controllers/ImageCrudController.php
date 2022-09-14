<?php

namespace App\Http\Controllers;

use App\Models\ImageCrud;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Session\Session;
use Session;

class ImageCrudController extends Controller
{
    public function AllProducts(){
        return view('product');
    }
    public function AddNewProduct(){
        return view('add_new_product');
    }
    public function StoreProduct(Request $request){

        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
        ]);

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/products', $imageName);
        }
        ImageCrud::create([
            'name'=>$request->name,
            'image'=>$imageName,
        ]);
        Session::flash('msg','Product created successfully.');
        return redirect()->back();

    }



}
