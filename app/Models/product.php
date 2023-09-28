<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded = ['id'];



   protected $fillable = ['id','name', 'price','category_id' ,'is_show' , 'description'];

   public $translatable = ['name','description'];

   public function category(){

    return $this->belongsTo(category::class);
   }
   public function product_images(){
    return $this->hasMany(product_images::class);
   }

}
