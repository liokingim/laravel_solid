<?php

namespace App\Solid;

use Exception;

/**
 * 2: Open-Closed Principle (OCP)
 */
class AreaCalculator
{
    // public function totalArea(array $shapes)
    // ShapeInterface 인터페이스를 추가하여 수정
    public function totalArea(ShapeInterface ...$shapes)
    // public function totalArea(array $rectangles)
    {
        $area = 0;

        // 다른 형태일때 문제가 발생하므로 수정
        // foreach ($rectangles as $rectangle) {
        //     $area += $rectangle->width * $rectangle->height;
        // }

        // 각 형태의 면적을 가져오도록 수정
        // foreach ($shapes as $shape) {
        //     $area += $shape->area();
        // }

        // ShapeInterface 인터페이스를 추가하여 수정
        // foreach ($shapes as $shape) {
        //     if ($shape instanceof ShapeInterface) {
        //         $area += $shape->area();
        //     } else {
        //         throw new Exception(
        //             get_class($shape). " should implement App\Solid\ShapeInterface."
        //         );
        //     }
        // }

        // 매개변수를 배열로 받으면 체크를 삭제할 수 있다.
        foreach ($shapes as $shape) {
            $area += $shape->area();
        }

        return $area;
    }
}
