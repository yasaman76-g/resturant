<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'route_id',
        'user_id',
        'status',
        'admin_id',
        'comment',
        'confirmed_time',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
