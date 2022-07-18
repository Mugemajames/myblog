<?php

namespace App\Models;
use Conner\Likeable\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use ESolution\DBEncryption\Traits\EncryptedAttribute;

class content extends Model
{
    use HasFactory,Likeable;
    public function user(){
    return $this->belongsTo('App\User');
    }
    protected $table = 'contents';

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image',
    ];
    // protected  $casts=[
    //    'title'=>'encrypted'
    //  ];
    public function titlencreption($value){
        $this->attributes['title']=Crypt::encrypt($value);

    }

}
