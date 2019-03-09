<?php
namespace Modules\Base\Interfaces;

Interface  Idocument {
    
    public function changeStatus();
    public function toTrash();
     public function hasChilds();
     public function isHeader();
     
}