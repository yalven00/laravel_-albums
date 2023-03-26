<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

     protected $table = "albums";


  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    /**
     * @var int
     */

    protected $fillable = [

        'cover',
        'title',
        'object',
        'city',
        'description',
        'image_id',
        'hidden',
        'user_id',
    ];

    /**
     * 
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_id',
    ];



 public function user(){

 return $this->belongsTo(User::class);

 }


 public function images(){

  return $this->hasMany(Image::class, 'image_id');
    
 }


}
