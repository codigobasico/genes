<?php

namespace Modules\Base\Database\Seeders;

use App\Models\Common\Company;
use App\Models\Setting\Category;
//use App\Models\Common\Item;
use App\Models\Model;
//use App\Models\Auth\Permission;
use Modules\Base\Models\Ums;
use Illuminate\Database\Seeder;

class MasterBasic extends Seeder
{
    public function run()
    {
        
            Model::unguard();
            $this->createBasic();
            Model::reguard();
       
    }
    
    
    private function models(){
        return ['Ums'=>'\\Modules\\Base\\Models\\Ums',
            'Item'=>'\\Modules\\Base\\Models\\Item',
            'Centro'=>'\\Modules\\Base\\Models\\Centro',
            'Clipro'=>'\\Modules\\Base\\Models\\Clipro',
            'Persona'=>'\\Modules\\Base\\Models\\Persona',
            ];
    }
    
    
   private static function getCategoryDefault(){
       $compani=null;
       if(is_null(session('company_id'))){
           //$compani=null;
           $compani=Company::query()->first();
           if(is_null($compani))
                dd("ERROR:  No se encontro ninguna empresa");
            session()->put('company_id',$compani->id);
       }
           //$compani=Company::query()->first();
       
         
       //$cate=Category::all();
       //dd($cate);
       $cate=Category::where('type','item')->first();
       if (!is_null($cate)){
           return $cate->id;
       }else{
           dd("ERROR:  No se encontro la categoría de items");
       }
   }
    private function datosBase()
    {
       //dd(config('base.sizeField.items.codigo'));
        $cate=static::getCategoryDefault();
        return [
            'Ums'=>[ ['UND','UNIDAD','E'],
                 ['KG','KILOGRAMO','M'],
                  ['GR','GRAMO','M'],
                  ['LB','LIBRA','M'],
                 ['GL','GALON AMERICANO','V'],
                    ['LT','LITRO','V'],
                  ['CIL','CILINDRO','V'],
                ['CAJ','CAJA','E'],
            ['PAR','PAR','E'],
            ['JGO','JUEGO','E'],
             ['M','METRO','L'],
            ['CM','CENTIMETRO','L'],
            ['MM','MILIMETRO','L'],
            ['PULG','PULGADA','L'],
            ['PIE','PIE','L']            
             ],
            
          'Item'=>[
              ['14005689',"PERNO AC HEX 5/8\" x 3/4\"-UNC-G8-HF ",'','','UND',1,$cate,0],
              ['14005690',"MADERA PINO RADIATA 1/2\" x 2\" x 3/4\"",'','','UND',1,$cate,0],
              ['14005691',"GEAR ASS 123-7889",'CATERPILLAR','','UND',1,$cate,0],
              ['14005692',"DISOLVENTE INDUSTRIAL",'','','GL',1,$cate,0],
              ['14005693',"PEGAMENTO RAPIDO TRIZ 550-GM",'TRIZ','550-GM','UND',1,$cate,0],
              ['14005694',"CABLE ELECTRICO AWG 12 -220VAC X 3H ",'INDECO','','M',1,$cate,0],
              
          ],
            
            'Centro'=>[
              ['1203',"Centro Logistico 1203",session('company_id')],
              ['1504',"Centro Logistico 1504",session('company_id')],
              ['1703',"Centro Logistico 1703",session('company_id')]
          ], 
            
            'Clipro'=>[
              ['700001',"SOLTECNIA SAA ",'20600279825','AV LOS TOPACIOS 345 CALLAO','SOLTECNIA',1,0],
               ['700002',"GEPROIN SAC ",'20600279834','AV FERROLES 456 CALLAO','GEPROIN',1,0],
                ['700003',"SERVI NAVALES INDUSTRIALES SRL ",'20456273425','AV LOS FRUTALES 345 CALLAO','SERNAV',1,0],
          ['700004',"INVERSIONE SDO SANTOS SA ",'20800279455','AV SEPARADORA INDUSTRIAL 345 TP','SANROS',1,0],
               ['700005',"CASA DE IDEAS SRL ",'20300279831','AV FERROLES 456 CALLAO','CASA IDEAS',1,0],
                ['700006',"POLIMETALES SA ",'20342353429','AV GRUMETE MEDINA 345 CALLAO','SERNAV',1,0],
            
                ],  
       
             'Persona'=>[
              ['60001','RODRIGUEZ ','ROSAS','GABRIEL CARLOS','10','10115533','AV UNIVERSITARIA  345 CALLAO',0],
               ['60002','ARMAS ','TOLEDO','JOSE RAUL','10','10201403','JR SAN ANTONIO DE ABAN LOS IVOS',0],
                ['60003','GUTIERREZ ','CAMINOS','GERARDO','10','10455538','JR PASAJE NUEVA ROSITA 345',0],
          ['60004','PERALTA ','OJEDA','RICARDO EDUARDO','10','09254836','JR ACAPULCO 456 LIMA',0],
               ['60005','BUENAÑO ','MARTINEZ','JORGE LUIS','10','09254837','JR AYABACA 456 LIMA',0],
                ['60006','AGUIRRE ','ABANTO','CARLOS VALENTIN','10','08254854','JR LAS ROSAS  456 LIMA',0],
            
                ], 
            
            ];
        
        
    } 
    
    private function camposUms(){
        return [
            'Ums'=>['codum','unidad','dimension'],
        ];
    }
    
    
    private function campos(){
        return [
            'Ums'=>['codum','unidad','dimension'],
             'Item'=>['codigo','name','marca','modelo','codum','company_id','category_id','esrotativo'],
            'Centro'=>['codcen','nombre','company_id'],
            'Clipro'=>['codpro','despro','ruc','dir','nombrecomercial','company_id','essocio'],
   'Persona'=>['codtra','ap','am','nombres','tipodoc','numerodoc','domicilio','user_id'],
        ];
    }
    
    private function buildUms(){
        $campos=[];
        foreach($this->datosBase()['ums'] as $clave=>$lista){
               $campos[]=array_combine($this->camposUms()['ums'], $lista);
        }
        return $campos;
    }
    
    private function buildData($table){
        $campos=[];
        foreach($this->datosBase()[$table] as $clave=>$lista){
               VAR_DUMP($this->campos()[$table]); ECHO "<BR>";
               VAR_DUMP($lista);ECHO "<BR>";
               $campos[]=array_combine($this->campos()[$table], $lista);
        }
        return $campos;
    }
    
    
    
    private function createBasic(){
        //$role=Role::find(1);
      foreach($this->models() as $modelo=>$clase){
         foreach($this->buildData($modelo) as $clave=>$valores){            
            $clase::firstOrCreate($valores);
            $this->command->info('Creando registro en el modelo : '.$modelo.' => ');

        } 
      }
        
    }
    
    
    
    
    
    
  

}
