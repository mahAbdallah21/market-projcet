<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $guarded = ['id'];



    protected $fillable = ['id','user_id' ,
    'product_id',
    'qty'];
    public function product(){
        return $this->belongsTo(product::class);

    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
