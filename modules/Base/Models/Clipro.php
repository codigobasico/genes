<?php

namespace Modules\Base\Models;

use Illuminate\Database\Eloquent\Model;

class Clipro extends ModelBase
{
    protected $table = 'clipro';
   protected $fillable=['codpro','despro','ruc','dir','nombrecomercial','company_id','essocio'];
    protected $primaryKey = 'codpro';
  public $incrementing = false;
   public $timestamps = false;
   //protected $dates = ['deleted_at'];
  
   
}
