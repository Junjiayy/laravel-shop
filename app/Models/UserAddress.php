<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAddress
 * @package App\Models
 */
class UserAddress extends Model
{
    /**
     * 可被允许批量填充的字段
     * @var array
     */
    protected $fillable = [
        'province', 'city', 'district', 'address', 'zip', 'contact_name', 'contact_phone',
        'last_used_at'
    ];
    /**
     * 自定义时间类型字段 (获取是为一个Carbon对象)
     * @var array
     */
    protected $dates = ['last_used_at'];

    /**
     * 当前地址所属用户
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 完整地址访问器，获取该地址的完整地址
     * @return string
     */
    public function getFullAddressAttribute()
    {
        return $this->province . ' ' . $this->city . ' ' . $this->district . ' ' . $this->address;
    }
}
