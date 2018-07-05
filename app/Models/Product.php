<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    /**
     * 允许被批量填充的字段
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'on_sale',
        'rating', 'sold_count', 'review_count', 'price'
    ];

    /**
     * 修改字段的数据类型
     * @var array
     */
    protected $casts = [
        'on_sale' => 'boolean'
    ];

    /**
     * 当前商品所拥有的所有SKU
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skus()
    {
        return $this->hasMany(ProductSku::class);
    }
}
