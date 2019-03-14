<?php

namespace Modules\Base\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends ModelBase
{
    protected $table = 'personas';
   protected $fillable=['codtra','ap','am','nombres','tipodoc','numerodoc','domicilio','user_id'];
    protected $primaryKey = 'codtra';
  public $incrementing = false;
   public $timestamps = false;
   //protected $dates = ['deleted_at'];
  
    //override porque estos valores no dependen de lninguna compania
  public function scopeCompanyId($query, $company_id)
    {
        
      return true;
    }
}          