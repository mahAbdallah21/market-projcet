<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class sideShow extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $guarded = ['id'];



   protected $fillable = ['id','title','is_showing','image' , 'description'];

   public $translatable = ['title','description'];
}
