<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Band extends Model
{
    use HasFactory;

    protected $tabel = "bands";

    protected $fillable = [
        'band_image','band_name', 'music_genres','description','biography','video_1','video_2','video_3','bg_color','text_color'
    ];

        public static function bandSearch($name) {
            return Band::where('band_name', 'LIKE', "%$name%")->orWhere('band_name', 'LIKE', "%$name%")->get();
        }
        
        public function users(){
            return $this->belongsToMany(User::class);
        }           
}
