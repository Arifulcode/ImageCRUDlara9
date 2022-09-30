<?php

namespace App\Http\Controllers;

use App\Models\ImageCrud;
use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Session\Session;
use Session;
use File;

class ImageCrudController extends Controller
{
    public function AllProducts(){
        $products = ImageCrud::all();
        return view('product', compact('products'));
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

    public function EditProduct($id){
        $product = ImageCrud::FindOrFail($id);
        // return $product;
        return view('edit_product', compact('product'));
    }

    public function UpdateProduct(Request $request , $id){

        $product = ImageCrud::findOrFail($id);
        // return $product;

        $request->validate([
            'name' => 'required',
        ]);

        $imageName = '';
        $deleteOldImage= 'images/products/'.$product->image;

        if($image = $request->file('image')){
            if (file_exists($deleteOldImage)) {
                File::delete($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/products', $imageName);
        }else{
            $imageName=$product->image;
        }

        ImageCrud::where('id',$id)->update([
            'name'=>$request->name,
            'image'=>$imageName,
        ]);
        Session::flash('msg','Product updated successfully.');
        return redirect()->back();

    }

    public function DeleteProduct($id){
        $product = ImageCrud::FindOrFail($id);
         $deleteOldImage= 'images/products/'.$product->image;

        if (file_exists($deleteOldImage)) {
            File::delete($deleteOldImage);
        }
        $product->delete();
        Session::flash('msg','Product deleted successfully.');
        return redirect()->back();
    }





}