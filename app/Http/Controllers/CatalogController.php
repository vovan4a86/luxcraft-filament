<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $page = Page::getByPath(['catalog']);
        if (!$page) {
            return abort(404);
        }
        $page->h1 = $page->getH1();
        $categories = Category::query()->public()->whereParentId(1)->get();

        return view(
            'catalog.index',
            [
                'page' => $page,
                'h1' => $page->h1,
                'text' => $page->text,
                'categories' => $categories
            ]
        );
    }

    public function view($alias)
    {
        $path = explode('/', $alias);
        /* проверка на продукт в категории */
        $product = null;
        $end = array_pop($path);
        $category = Category::getByPath($path);
        if ($category && $category->published) {
            $product = Product::whereAlias($end)
                ->public()
                ->whereCategoryId($category->id)->first();
        }
        if ($product) {
            return $this->product($product);
        } else {
            array_push($path, $end);

            return $this->category($path + [$end]);
        }
    }

    public function category($path)
    {
        /** @var Category $category */
        $category = Category::getByPath($path);
        if (!$category || !$category->published) {
            abort(404, 'Страница не найдена');
        }
        $text = $category->text;
        if (!$text) {
            $page = Page::whereAlias('catalog')->first();
            $text = $page->text;
        }

        $bread = $category->getBread();
        $children = $category->children;
        $products = $category->products;
        $category->setSeo();

        $data = [
            'category' => $category,
            'text' => $text,
            'children' => $children,
            'bread' => $bread,
            'products' => $products,
            'h1' => $category->getH1(),
        ];

        return view('catalog.category', $data);
    }

    public function manufacturer($alias)
    {
        $manufacturer = Manufacturer::query()->where('alias', $alias)->first();
        if (!$manufacturer || !$manufacturer->published) {
            abort(404, 'Страница не найдена');
        }
        $bread = $manufacturer->getBread();
        $products = $manufacturer->products ?? [];
//        $category->setSeo();

        $data = [
            'manufacturer' => $manufacturer,
            'bread' => $bread,
            'products' => $products,
            'h1' => $manufacturer->getH1(),
        ];

        return view('catalog.manufacturer', $data);
    }

    public function product(Product $product)
    {
        $bread = $product->getBread();
        $product->setSeo();
        $product->ogGenerate();

        $images = $product->getMedia();

        return view(
            'catalog.product',
            [
                'bread' => $bread,
                'h1' => $product->getH1(),
                'product' => $product,
                'images' => $images
            ]
        );
    }
}
