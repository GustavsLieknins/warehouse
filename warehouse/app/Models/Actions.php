<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actions extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'product_id',
        'entity',
        'user_id',
    ];

    public static function log($action, $productId, $entity, $userId)
    {
        static::create([
            'action' => $action,
            'product_id' => $productId,
            'entity' => $entity,
            'user_id' => $userId,
        ]);
    }
}
