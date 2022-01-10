<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Jobs\mqQueue;
use App\Models\Department;
use App\Jobs\ProcessPodcast;

class QueueTestController extends Controller
{

    /**
     * 测试redis队列使用
     * Created by zengyonghao at 2021/12/11 12:27 上午
     */
    public function testQueue(){
//        $a = Department::query()->find(103);

//        ProcessPodcast::dispatch();
        mqQueue::dispatch();

//        Department::query()->where(['id'=>161])->update(['name'=>'应用监控组2']);
        var_dump(3);exit;
    }

    /**
     * 一条数据库数据加1，用以测试
     * Created by zengyonghao at 2021/12/11 12:28 上午
     */
    protected function dataAddOne(){
        Department::query()->where(['id'=>161])->update(['name'=>'应用监控组2']);
        var_dump(1);exit;
    }

}
