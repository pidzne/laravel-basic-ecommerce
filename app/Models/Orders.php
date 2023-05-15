<?php

namespace App\Models;

use App\Models\OrderDetails;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Orders extends Model
{
    
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'po_number',
        'order_name',
        'order_email',
        'order_phone',
        'order_address',
        'order_ward',
        'order_district',
        'order_city',
        'order_message',
        'order_total',
        'order_date',
        'order_shipping_cost',
        'order_status',
        'order_cancel',
        'payment_method',
    ];
}
