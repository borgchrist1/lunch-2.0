<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rou


Route::get('/', function() {
    
    $resturants = [];
    $current;
    $type;
    $dish;
    $crawler = Goutte::request('GET', 'https://www.lindholmen.se/pa-omradet/dagens-lunch');
    $crawler->filter('.title a, .dish-name, .icon-dish, .table-list__column--price')->each(function ($node) use(&$resturants, &$current, &$type, &$dish) {
       
        if($node->attr('href')){  
            $resturant = ['name' => $node->text(), 'menu' => []];
            $current = array_push($resturants, $resturant) - 1;
        } else if($node->attr('class') === 'dish-name'){
            $dish = $node->text();  
        } else if(strpos($node->text(), 'kr')){
            $price = $node->text();
            $arr = ['type' => $type, 'dish' => $dish, 'price' => $price];
            //$resturants[$current]['menu_option'] = [];
            array_push($resturants[$current]['menu'], $arr);
        } else {
            $type = $node->text();
        }
     });

    return response()->json($resturants)->header('Access-Controll-Allow-Origin', '*');
});

