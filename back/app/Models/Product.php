<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'titulo',
        'precio',
        'masVendido',
        'imagen1',
        'imagen2',
        'imagen3',
        'imagen4',
        'item1',
        'item2',
        'item3',
        'item4',
        'item5',
        'item6',
        'item7',
        'item8',
        'item9',
        'item10',
        'precioAnterior',
        'stock',
        'category_id',
        'sub_category_id'
    ];
    protected $hidden = ['created_at', 'updated_at'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
}
