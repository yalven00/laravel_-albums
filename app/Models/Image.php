<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

 protected $table = 'images';

   /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'image_path',
        'published',
        'user_id',
    ];



 public function user(){

 return $this->belongsTo(User::class);

 }


 public function albums(){

 return $this->belongsTo(Album::class);

 }







}
