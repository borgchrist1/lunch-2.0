<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Weidner\Goutte\GoutteFacade;

class HomeController extends Controller
{
    public function Index()
    {
        $resturants = [];
        $current;
        $type;
        $dish;
        
        $crawler = \Goutte::request('GET', 'https://www.lindholmen.se/pa-omradet/dagens-lunch');
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
        return view ('welcome', compact('resturants'));
    }
}
