<?php

namespace Modules\Base\Models\Auth;
use App\Models\Auth\User as UserOriginal;
use Auth;
class User extends UserOriginal
{
    
    public function centros()
    {
        return $this->belongsToMany('Modules\Base\Models\Centro', 'usuarios_centros', 'user_id', 'codcen');
    }
    
    public function centrosAccess()
    {
        return $this->hasMany('Modules\Base\Models\Centro', 'user_id');
    }

    public function userOriginal(){
       return $this->hasOne('App\Models\Auth\User','id','id'); 
    }
    
    public static function getUser(){
        return static::find(Auth::getUser()->id);
    }
    


    
}
