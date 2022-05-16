<?php

namespace App\Http\Controllers;

use App\Classes\ProductEnum;
use App\Http\Requests\CsvImportRequest;
use App\Product;

class MainController extends Controller
{
    /**
     * Вывод страницы с формой
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Парсинг файла и занесение данных в бд
     *
     * @param CsvImportRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function parseImport(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));
        $csv_data = array_slice($data, 1, count($data));
        $mainProductMass = [];

        foreach ($csv_data as $data) {
            $productInfo = '';
            foreach ($data as $productData) {
                $productInfo .= $productData;
            }
            $mainProductMass[] = explode(';', $productInfo);
        }

        foreach ($mainProductMass as $product) {
            $fillableData = [];
            $i = 0;
            foreach (ProductEnum::lists() as $list) {
                $fillableData[$list] = $product[$i];
                $i++;
            }
            Product::create($fillableData);
        }
        return redirect()->route('get.products');
    }

    /**
     * Вывод страницы со всеми продуктами
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProducts()
    {
        $products = Product::paginate(10);

        return view('index',compact('products'));
    }
}
