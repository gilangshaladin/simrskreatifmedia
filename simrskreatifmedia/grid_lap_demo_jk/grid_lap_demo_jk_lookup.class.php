<?php
class grid_lap_demo_jk_lookup
{
//  
   function lookup_sex(&$sex) 
   {
      $conteudo = "" ; 
      if ($sex == "L")
      { 
          $conteudo = "Laki-laki";
      } 
      if ($sex == "P")
      { 
          $conteudo = "Perempuan";
      } 
      if (!empty($conteudo)) 
      { 
          $sex = $conteudo; 
      } 
   }  
//  
   function lookup_sex_sex(&$sex) 
   {
      $conteudo = "" ; 
      if ($sex == "L")
      { 
          $conteudo = "Laki-Laki";
      } 
      if ($sex == "P")
      { 
          $conteudo = "Perempuan";
      } 
      if (!empty($conteudo)) 
      { 
          $sex = $conteudo; 
      } 
   }  
}
?>
