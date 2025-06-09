<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use App\Models\ProductType;
use Illuminate\Http\Request;

class FuncController extends Controller
{
    public function calculateProductionQuantity(int $product_type_id, int $material_type_id, int $quantity, float $p1, float $p2): int
    {
        try {
            //проверяем на нулевые значния
            if ($quantity <= 0 || $p1 <= 0 || $p2 <= 0) {
                return -1;
            }
            //получаем тип продукции
            $productType = ProductType::find($product_type_id);
            if (!$productType) {
                return -1;
            }
            //получаем тип материала
            $materialType = MaterialType::find($material_type_id);
            if (!$materialType) {
                return -1;
            }
            //коэффициент на единицу продукции
            $coefficient = $productType->coefficient;
            //проверяем процент потерь
            $loss = $materialType->defective;
            //расчитываем объем материала на единицу продукции
            $material_per_unit = $p1 * $p2 * $coefficient;
            if ($material_per_unit <= 0) {
                return -1;
            }
            $effective_material = $quantity * (1 - $loss);
            //получаем конечное количество
            return (int) floor($effective_material / $material_per_unit);
        } catch (\Exception $e) {
            return -1;
        }
    }
}

