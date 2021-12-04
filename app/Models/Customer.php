<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Customer extends Model
{
    use Searchable;
    use SoftDeletes;

    protected $table = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'created_at'
    ];

    /**
     * 获取与模型关联的索引的名称。
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'customer_index';
    }

    /**
     * 获取模型的可索引的数据。即哪些字段可以搜索
     *
     * @return array
     */
    public function toSearchableArray()
    {
//        $array = $this->toArray();
//        return $array;
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }


}
