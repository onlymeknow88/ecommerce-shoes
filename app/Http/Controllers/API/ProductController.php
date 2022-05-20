<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function addProduct(Request $request){

        $data = $request->except('image');

        $product = Product::create($data);

        if($request->hasFile('image'))
        {
            $url = $request->file('image')->store('public/gallery');

            ProductGallery::create([
                'products_id' => $product->id,
                'url' => $url
            ]);

        }

        return ResponseFormatter::success(
            $product,
            'Simpan berhasil'
        );

    }

    public function getShoesPopular() {

            $min = 4.5;
            $limit = 3;

            $popular = Product::with(['category','galleries'])
                            ->where('rating', '>=', $min)
                            ->orderBy('rating', 'desc')
                            ->limit($limit)
                            ->get();

            if($popular)
                return ResponseFormatter::success(
                    $popular,
                    'Data produk berhasil diambil'
                );
            else
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada',
                    404
                );
    }

    public function All() {
        $products = Product::with(['category','galleries']);

        return ResponseFormatter::success(
            $products->get(),
            'Data berhasil diambil'
        );
    }
}
