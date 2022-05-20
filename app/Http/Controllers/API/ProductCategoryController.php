<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    public function addCategory(Request $request){

        $data = $request->all();


        $category = ProductCategory::create($data);

        return ResponseFormatter::success(
            $category,
            'Simpan berhasil'
        );

    }

    public function getAll(){
        $categories = ProductCategory::all();

        return ResponseFormatter::success(
            $categories,
            'Data berhasil diambil'
        );
    }
}
