<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
     use HasTranslations;
     protected $guarded = ['id'];



    protected $fillable = ['name', 'image','category_id' ,'is_showing' , 'is_popular','meta_title', 'meta_description'
    ,'mate_keywords'];

    public $translatable = ['name','meta_title'];

    public function sub_category(){
        return 	$this->hasMany(category::class);
    }

    public function main_category(){
       return  $this->belongsTo(category::class , 'category_id', 'id');
    }
}
