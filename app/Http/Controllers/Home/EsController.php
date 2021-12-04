<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Customer;

//laravel-scout 测试使用
class EsController extends Controller
{
    public $client = null;

    public function test(){
        $customer = Customer::query()->where(['id'=>30])->get();
        var_dump($customer->toArray());
    }

    public function get(){
        $c = Customer::search('95')->get();
//        var_dump($c);
        print($c->toJson());
//        print($c);
    }

    public function delete(){
        $c = Customer::find(87);
        $c->delete();
        return 11;
    }

}
