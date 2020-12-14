<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name','band_id','email','phonenumber','city','country'
        ];

        public function band(){
            return $this->belongsTo('App\Models\Band', 'band_id');
        }
}
