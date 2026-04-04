<?php

namespace App\Http\Controllers;

use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    // 1. Bazadan bütün məhsulları götürürük
    // Ən son əlavə olunanın birinci görünməsi üçün 'latest()' istifadə edirik
    $products = \App\Models\Product::latest()->get();
    
    // 2. Məlumatları 'welcome' (mia) səhifəsinə ötürürük
    // 'compact' funksiyası 'products' dəyişənini Blade-ə bağlayır
    return view('welcome', compact('products'));
}

    // Admin Panel - Sənin üçün
    public function admin() {
    $products = \App\Models\Product::latest()->get();
    $employees = \App\Models\Employee::all(); // Əgər buranı istifadə edirsənsə
    return view('admin', compact('products', 'employees'));
}

   

public function store(Request $request) {
    try {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'image' => 'required|image',
        ]);

        $uploadedFileUrl = \CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary::upload(
            $request->file('image')->getRealPath()
        )->getSecurePath();

        \App\Models\Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'type' => $request->type,
            'image' => $uploadedFileUrl,
            'in_stock' => $request->has('in_stock') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'Oldu! 🌸');

    } catch (\Exception $e) {
        // Bu sətir 500 xətası əvəzinə bizə xətanın adını yazacaq
        return dd($e->getMessage()); 
    }
}


    // Məhsulu Silmək
    public function destroy($id) {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Məhsul silindi!');
    }


    // Əvvəlcə yuxarıda Employee modelini çağırırıq:
        // use App\Models\Employee; 

        public function storeEmployee(Request $request) {
            $request->validate(['name' => 'required', 'position' => 'required']);
            \App\Models\Employee::create($request->all());
            return redirect()->back()->with('success', 'İşçi əlavə edildi! ✨');
        }

        public function destroyEmployee($id) {
    $employee = \App\Models\Employee::find($id);
    if ($employee) {
        $employee->delete();
    }
    return redirect()->back()->with('success', 'İşçi silindi!');
}
}
