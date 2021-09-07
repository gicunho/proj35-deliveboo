<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        # Con la risorsa e le relazioni
        return CategoryResource::collection(Category::all());
    }
}
