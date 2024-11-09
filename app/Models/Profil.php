<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'user_id','first_name','last_name','birthday','gender',
        'street_address','city','postal_code','country','lacale'
    ]; 
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
