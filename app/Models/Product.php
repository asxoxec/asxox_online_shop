<?php

namespace App\Models;

use App\Models\Detail;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product_Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;





    protected $dates = ['deleted_at'];
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function details()
    {
        return $this->belongsToMany(Detail::class,'detail__products','product_id','detail_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function product_image()
    {
        return $this->hasMany(Product_Image::class);
    }
}
