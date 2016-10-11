<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class Point {
    public $x;
    public $y;
    public $time;

    /**
     * Point constructor.
     * @param $x
     * @param $y
     * @param $time
     */
    public function __construct($x, $y, $time)
    {
        $this->x = $x;
        $this->y = $y;
        $this->time = $time;
    }

}

class ApiController extends Controller
{
    private $maxHeight = 0;
    private $maxWIdth = 0;
    private $GRAVITY = 10;

    public function calculate()
    {
        $speedStart = Input::get('speedStart');
        $angleStart = Input::get('angleStart');

        $x = 0;
        $y = 0;
        $go = true;
        $time = 0;

        $data = [];
        while($go){


            $x = $speedStart * $time * cos(deg2rad($angleStart));
            $y = $speedStart * $time * sin(deg2rad ($angleStart)) - (0.5 * $this->GRAVITY * $time * $time);

            if($time > 0 && $y <= 0){
                $go = false;
            }

            $point = new Point($x, $y, $time);
            echo collect($point);
            flush(); ob_flush();

            $data[]  = $point;
            $time = $time + 0.01;
        }

//        return $data;

    }

}
