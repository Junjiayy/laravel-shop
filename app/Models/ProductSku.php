<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductSku
 * @package App\Models
 */
class ProductSku extends Model
{
    /**
     * 允许被批量填充的字段
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'price', 'stock'
    ];

    /**
     * 当前SKU所属的商品
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
