<?php

class grid_belum_bayar_copy_total
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;

   var $nm_data;

   //----- 
   function __construct($sc_page)
   {
      $this->sc_page = $sc_page;
      $this->nm_data = new nm_data("id");
      if (isset($_SESSION['sc_session'][$this->sc_page]['grid_belum_bayar_copy']['campos_busca']) && !empty($_SESSION['sc_session'][$this->sc_page]['grid_belum_bayar_copy']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_belum_bayar_copy']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->kode = $Busca_temp['kode']; 
          $tmp_pos = strpos($this->kode, "##@@");
          if ($tmp_pos !== false && !is_array($this->kode))
          {
              $this->kode = substr($this->kode, 0, $tmp_pos);
          }
          $this->struk = $Busca_temp['struk']; 
          $tmp_pos = strpos($this->struk, "##@@");
          if ($tmp_pos !== false && !is_array($this->struk))
          {
              $this->struk = substr($this->struk, 0, $tmp_pos);
          }
          $this->dpjp = $Busca_temp['dpjp']; 
          $tmp_pos = strpos($this->dpjp, "##@@");
          if ($tmp_pos !== false && !is_array($this->dpjp))
          {
              $this->dpjp = substr($this->dpjp, 0, $tmp_pos);
          }
          $this->pasien = $Busca_temp['pasien']; 
          $tmp_pos = strpos($this->pasien, "##@@");
          if ($tmp_pos !== false && !is_array($this->pasien))
          {
              $this->pasien = substr($this->pasien, 0, $tmp_pos);
          }
      } 
   }

   //---- 
   function quebra_geral_sc_free_total($res_limit=false)
   {
      global $nada, $nm_lang , $dpjp;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_belum_bayar_copy']['contr_total_geral'] == "OK") 
      { 
          return; 
      } 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_belum_bayar_copy']['tot_geral'] = array() ;  
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nm_comando = "select count(*) from (SELECT 	z.Kode as Kode, 	z.Struk as Struk, 	z.Dokter as DPJP, 	z.RM as Pasien, 	z.Selesai as Selesai, 	z.TglKeluar as TglKeluar, 	z.CaraKeluar as CaraKeluar, 	z.Jenis as Jenis  FROM 	( 	SELECT 		a.tranCode AS Kode, 		a.noStruk AS Struk, 		a.dokter AS Dokter, 		a.custCode AS RM, 		a.selesai AS Selesai, 		a.tglKeluar AS TglKeluar, 		a.caraKeluar AS CaraKeluar, 		'Poli' AS Jenis  	FROM 		tbdetailrawatjalan a 		LEFT JOIN tbantrian b ON b.struckNo = a.noStruk  	WHERE 		a.selesai = 'Y'  		AND b.STATUS = 'Selesai' UNION ALL 	SELECT 		a.tranCode AS Kode, 		a.noStruk AS Struk, 		a.dokter AS Dokter, 		a.custCode AS RM, 		a.selesai AS Selesai, 		a.tglKeluar AS TglKeluar, 		a.caraKeluar AS CaraKeluar, 		'Rawat Inap' AS Jenis  	FROM 		tbdetailrawatinap a 		LEFT JOIN tbadmrawatinap b ON b.tranCode = a.tranCode  	WHERE 		b.STATUS = 'Selesai' UNION ALL 	SELECT 		a.tranCode AS Kode, 		a.noStruk AS Struk, 		a.dokter AS Dokter, 		a.custCode AS RM, 		a.selesai AS Selesai, 		a.tglKeluar AS TglKeluar, 		a.caraKeluar AS CaraKeluar, 		'IGD' AS Jenis  	FROM 		tbdetailigd a 		LEFT JOIN tbantrian b ON b.struckNo = a.noStruk  	WHERE 		a.selesai = 'Y'  		AND b.STATUS = 'Selesai' UNION ALL 	SELECT 		trancode AS Kode, 		struk AS Struk, 		doccode AS Dokter, 		custcode AS RM, 		STATUS AS Selesai, 		finishdate AS TglKeluar, 		'BAYAR' AS CaraKeluar, 		'Lab' AS Jenis  	FROM 		tbtranlab  	WHERE 		STATUS != '2' UNION ALL 	SELECT 		trancode AS Kode, 		struk AS Struk, 		doccode AS Dokter, 		custcode AS RM, 		STATUS AS Selesai, 		finishdate AS TglKeluar, 		'BAYAR' AS CaraKeluar, 		'Radiologi' AS Jenis  	FROM 		tbtranrad  	WHERE 	STATUS != '2'  	) z ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_belum_bayar_copy']['where_pesq']; 
      } 
      else 
      { 
          $nm_comando = "select count(*) from (SELECT 	z.Kode as Kode, 	z.Struk as Struk, 	z.Dokter as DPJP, 	z.RM as Pasien, 	z.Selesai as Selesai, 	z.TglKeluar as TglKeluar, 	z.CaraKeluar as CaraKeluar, 	z.Jenis as Jenis  FROM 	( 	SELECT 		a.tranCode AS Kode, 		a.noStruk AS Struk, 		a.dokter AS Dokter, 		a.custCode AS RM, 		a.selesai AS Selesai, 		a.tglKeluar AS TglKeluar, 		a.caraKeluar AS CaraKeluar, 		'Poli' AS Jenis  	FROM 		tbdetailrawatjalan a 		LEFT JOIN tbantrian b ON b.struckNo = a.noStruk  	WHERE 		a.selesai = 'Y'  		AND b.STATUS = 'Selesai' UNION ALL 	SELECT 		a.tranCode AS Kode, 		a.noStruk AS Struk, 		a.dokter AS Dokter, 		a.custCode AS RM, 		a.selesai AS Selesai, 		a.tglKeluar AS TglKeluar, 		a.caraKeluar AS CaraKeluar, 		'Rawat Inap' AS Jenis  	FROM 		tbdetailrawatinap a 		LEFT JOIN tbadmrawatinap b ON b.tranCode = a.tranCode  	WHERE 		b.STATUS = 'Selesai' UNION ALL 	SELECT 		a.tranCode AS Kode, 		a.noStruk AS Struk, 		a.dokter AS Dokter, 		a.custCode AS RM, 		a.selesai AS Selesai, 		a.tglKeluar AS TglKeluar, 		a.caraKeluar AS CaraKeluar, 		'IGD' AS Jenis  	FROM 		tbdetailigd a 		LEFT JOIN tbantrian b ON b.struckNo = a.noStruk  	WHERE 		a.selesai = 'Y'  		AND b.STATUS = 'Selesai' UNION ALL 	SELECT 		trancode AS Kode, 		struk AS Struk, 		doccode AS Dokter, 		custcode AS RM, 		STATUS AS Selesai, 		finishdate AS TglKeluar, 		'BAYAR' AS CaraKeluar, 		'Lab' AS Jenis  	FROM 		tbtranlab  	WHERE 		STATUS != '2' UNION ALL 	SELECT 		trancode AS Kode, 		struk AS Struk, 		doccode AS Dokter, 		custcode AS RM, 		STATUS AS Selesai, 		finishdate AS TglKeluar, 		'BAYAR' AS CaraKeluar, 		'Radiologi' AS Jenis  	FROM 		tbtranrad  	WHERE 	STATUS != '2'  	) z ) nm_sel_esp " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_belum_bayar_copy']['where_pesq']; 
      } 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
      if (!$rt = $this->Db->Execute($nm_comando)) 
      { 
         $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
         exit ; 
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_belum_bayar_copy']['tot_geral'][0] = "" . $this->Ini->Nm_lang['lang_msgs_totl'] . ""; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_belum_bayar_copy']['tot_geral'][1] = $rt->fields[0] ; 
      $rt->Close(); 
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_belum_bayar_copy']['contr_total_geral'] = "OK";
   } 

   function nm_conv_data_db($dt_in, $form_in, $form_out)
   {
       $dt_out = $dt_in;
       if (strtoupper($form_in) == "DB_FORMAT")
       {
           if ($dt_out == "null" || $dt_out == "")
           {
               $dt_out = "";
               return $dt_out;
           }
           $form_in = "AAAA-MM-DD";
       }
       if (strtoupper($form_out) == "DB_FORMAT")
       {
           if (empty($dt_out))
           {
               $dt_out = "null";
               return $dt_out;
           }
           $form_out = "AAAA-MM-DD";
       }
       nm_conv_form_data($dt_out, $form_in, $form_out);
       return $dt_out;
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";
      $mask_num = false;
      for ($x=0; $x < strlen($trab_mask); $x++)
      {
          if (substr($trab_mask, $x, 1) == "#")
          {
              $mask_num = true;
              break;
          }
      }
      if ($mask_num )
      {
          $ver_duas = explode(";", $trab_mask);
          if (isset($ver_duas[1]) && !empty($ver_duas[1]))
          {
              $cont1 = count(explode("#", $ver_duas[0])) - 1;
              $cont2 = count(explode("#", $ver_duas[1])) - 1;
              if ($cont2 >= $tam_campo)
              {
                  $trab_mask = $ver_duas[1];
              }
              else
              {
                  $trab_mask = $ver_duas[0];
              }
          }
          $tam_mask = strlen($trab_mask);
          $xdados = 0;
          for ($x=0; $x < $tam_mask; $x++)
          {
              if (substr($trab_mask, $x, 1) == "#" && $xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_campo, $xdados, 1);
                  $xdados++;
              }
              elseif ($xdados < $tam_campo)
              {
                  $trab_saida .= substr($trab_mask, $x, 1);
              }
          }
          if ($xdados < $tam_campo)
          {
              $trab_saida .= substr($trab_campo, $xdados);
          }
          $nm_campo = $trab_saida;
          return;
      }
      for ($ix = strlen($trab_mask); $ix > 0; $ix--)
      {
           $char_mask = substr($trab_mask, $ix - 1, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               $trab_saida = $char_mask . $trab_saida;
           }
           else
           {
               if ($tam_campo != 0)
               {
                   $trab_saida = substr($trab_campo, $tam_campo - 1, 1) . $trab_saida;
                   $tam_campo--;
               }
               else
               {
                   $trab_saida = "0" . $trab_saida;
               }
           }
      }
      if ($tam_campo != 0)
      {
          $trab_saida = substr($trab_campo, 0, $tam_campo) . $trab_saida;
          $trab_mask  = str_repeat("z", $tam_campo) . $trab_mask;
      }
   
      $iz = 0; 
      for ($ix = 0; $ix < strlen($trab_mask); $ix++)
      {
           $char_mask = substr($trab_mask, $ix, 1);
           if ($char_mask != "x" && $char_mask != "z")
           {
               if ($char_mask == "." || $char_mask == ",")
               {
                   $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
               }
               else
               {
                   $iz++;
               }
           }
           elseif ($char_mask == "x" || substr($trab_saida, $iz, 1) != "0")
           {
               $ix = strlen($trab_mask) + 1;
           }
           else
           {
               $trab_saida = substr($trab_saida, 0, $iz) . substr($trab_saida, $iz + 1);
           }
      }
      $nm_campo = $trab_saida;
   } 
}

?>
