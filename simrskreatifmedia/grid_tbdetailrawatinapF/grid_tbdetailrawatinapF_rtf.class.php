<?php

class grid_tbdetailrawatinapF_rtf
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Texto_tag;
   var $Arquivo;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("id");
      $this->Texto_tag = "";
   }

   //---- 
   function monta_rtf()
   {
      $this->inicializa_vars();
      $this->gera_texto_tag();
      $this->grava_arquivo_rtf();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Rtf_f);
          $this->Arr_result['title_export'] = NM_charset_to_utf8($this->Tit_doc);
          $Temp = ob_get_clean();
          if ($Temp !== false && trim($Temp) != "")
          {
              $this->Arr_result['htmOutput'] = NM_charset_to_utf8($Temp);
          }
          $oJson = new Services_JSON();
          echo $oJson->encode($this->Arr_result);
          exit;
      }
      else
      {
          $this->progress_bar_end();
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "grid_tbdetailrawatinapF_total.class.php"); 
      $this->Tot      = new grid_tbdetailrawatinapF_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_tbdetailrawatinapF']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_grid_tbdetailrawatinapF";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "grid_tbdetailrawatinapF.rtf";
   }
   //---- 
   function prep_modulos($modulo)
   {
      $this->$modulo->Ini    = $this->Ini;
      $this->$modulo->Db     = $this->Db;
      $this->$modulo->Erro   = $this->Erro;
      $this->$modulo->Lookup = $this->Lookup;
   }


   //----- 
   function gera_texto_tag()
   {
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['rtf_name']);
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailrawatinapF']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailrawatinapF']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['grid_tbdetailrawatinapF']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->trancode = $Busca_temp['trancode']; 
          $tmp_pos = strpos($this->trancode, "##@@");
          if ($tmp_pos !== false && !is_array($this->trancode))
          {
              $this->trancode = substr($this->trancode, 0, $tmp_pos);
          }
          $this->dokter = $Busca_temp['dokter']; 
          $tmp_pos = strpos($this->dokter, "##@@");
          if ($tmp_pos !== false && !is_array($this->dokter))
          {
              $this->dokter = substr($this->dokter, 0, $tmp_pos);
          }
          $this->selesai = $Busca_temp['selesai']; 
          $tmp_pos = strpos($this->selesai, "##@@");
          if ($tmp_pos !== false && !is_array($this->selesai))
          {
              $this->selesai = substr($this->selesai, 0, $tmp_pos);
          }
          $this->tglkeluar = $Busca_temp['tglkeluar']; 
          $tmp_pos = strpos($this->tglkeluar, "##@@");
          if ($tmp_pos !== false && !is_array($this->tglkeluar))
          {
              $this->tglkeluar = substr($this->tglkeluar, 0, $tmp_pos);
          }
          $this->jeniskeluar = $Busca_temp['jeniskeluar']; 
          $tmp_pos = strpos($this->jeniskeluar, "##@@");
          if ($tmp_pos !== false && !is_array($this->jeniskeluar))
          {
              $this->jeniskeluar = substr($this->jeniskeluar, 0, $tmp_pos);
          }
          $this->carakeluar = $Busca_temp['carakeluar']; 
          $tmp_pos = strpos($this->carakeluar, "##@@");
          if ($tmp_pos !== false && !is_array($this->carakeluar))
          {
              $this->carakeluar = substr($this->carakeluar, 0, $tmp_pos);
          }
          $this->alasankeluar = $Busca_temp['alasankeluar']; 
          $tmp_pos = strpos($this->alasankeluar, "##@@");
          if ($tmp_pos !== false && !is_array($this->alasankeluar))
          {
              $this->alasankeluar = substr($this->alasankeluar, 0, $tmp_pos);
          }
          $this->custcode = $Busca_temp['custcode']; 
          $tmp_pos = strpos($this->custcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->custcode))
          {
              $this->custcode = substr($this->custcode, 0, $tmp_pos);
          }
          $this->resikojatuh = $Busca_temp['resikojatuh']; 
          $tmp_pos = strpos($this->resikojatuh, "##@@");
          if ($tmp_pos !== false && !is_array($this->resikojatuh))
          {
              $this->resikojatuh = substr($this->resikojatuh, 0, $tmp_pos);
          }
          $this->sc_field_0 = $Busca_temp['sc_field_0']; 
          $tmp_pos = strpos($this->sc_field_0, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_0))
          {
              $this->sc_field_0 = substr($this->sc_field_0, 0, $tmp_pos);
          }
          $this->ruanginap = $Busca_temp['ruanginap']; 
          $tmp_pos = strpos($this->ruanginap, "##@@");
          if ($tmp_pos !== false && !is_array($this->ruanginap))
          {
              $this->ruanginap = substr($this->ruanginap, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Kode Transaksi"; 
          if ($Cada_col == "trancode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "No. RM"; 
          if ($Cada_col == "custcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Nama Pasien"; 
          if ($Cada_col == "sc_field_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['dokter'])) ? $this->New_label['dokter'] : "Dokter"; 
          if ($Cada_col == "dokter" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ruanginap'])) ? $this->New_label['ruanginap'] : "Ruang / Bed"; 
          if ($Cada_col == "ruanginap" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['selesai'])) ? $this->New_label['selesai'] : "Selesai"; 
          if ($Cada_col == "selesai" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tglkeluar'])) ? $this->New_label['tglkeluar'] : "Tgl Keluar"; 
          if ($Cada_col == "tglkeluar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['carakeluar'])) ? $this->New_label['carakeluar'] : "Cara Keluar"; 
          if ($Cada_col == "carakeluar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jenis'])) ? $this->New_label['jenis'] : "Jenis Bayar"; 
          if ($Cada_col == "jenis" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
      } 
      $this->Texto_tag .= "</tr>\r\n";
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT tranCode, custCode, dokter, selesai, str_replace (convert(char(10),tglKeluar,102), '.', '-') + ' ' + convert(char(8),tglKeluar,20), caraKeluar from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tranCode, custCode, dokter, selesai, tglKeluar, caraKeluar from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT tranCode, custCode, dokter, selesai, convert(char(23),tglKeluar,121), caraKeluar from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tranCode, custCode, dokter, selesai, tglKeluar, caraKeluar from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT tranCode, custCode, dokter, selesai, EXTEND(tglKeluar, YEAR TO FRACTION), caraKeluar from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT tranCode, custCode, dokter, selesai, tglKeluar, caraKeluar from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_pesq'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_resumo']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_resumo'])) 
      { 
          if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_pesq'])) 
          { 
              $nmgp_select .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_resumo']; 
              $nmgp_select_count .= " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_resumo']; 
          } 
          else
          { 
              $nmgp_select .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_resumo'] . ")"; 
              $nmgp_select_count .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['where_resumo'] . ")"; 
          } 
      } 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select_count;
      $rt = $this->Db->Execute($nmgp_select_count);
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->count_ger = $rt->fields[0];
      $rt->Close();
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Texto_tag .= "<tr>\r\n";
         $this->trancode = $rs->fields[0] ;  
         $this->custcode = $rs->fields[1] ;  
         $this->dokter = $rs->fields[2] ;  
         $this->selesai = $rs->fields[3] ;  
         $this->tglkeluar = $rs->fields[4] ;  
         $this->carakeluar = $rs->fields[5] ;  
         //----- lookup - dokter
         $this->look_dokter = $this->dokter; 
         $this->Lookup->lookup_dokter($this->look_dokter, $this->dokter) ; 
         $this->look_dokter = ($this->look_dokter == "&nbsp;") ? "" : $this->look_dokter; 
         //----- lookup - selesai
         $this->look_selesai = $this->selesai; 
         $this->Lookup->lookup_selesai($this->look_selesai); 
         $this->look_selesai = ($this->look_selesai == "&nbsp;") ? "" : $this->look_selesai; 
         $this->sc_proc_grid = true; 
         //----- lookup - sc_field_0
         $this->Lookup->lookup_sc_field_0($this->sc_field_0, $this->custcode, $this->array_sc_field_0); 
         $this->sc_field_0 = str_replace("<br>", " ", $this->sc_field_0); 
         $this->sc_field_0 = ($this->sc_field_0 == "&nbsp;") ? "" : $this->sc_field_0; 
         //----- lookup - ruanginap
         $this->Lookup->lookup_ruanginap($this->ruanginap, $this->trancode, $this->array_ruanginap); 
         $this->ruanginap = str_replace("<br>", " ", $this->ruanginap); 
         $this->ruanginap = ($this->ruanginap == "&nbsp;") ? "" : $this->ruanginap; 
         $_SESSION['scriptcase']['grid_tbdetailrawatinapF']['contr_erro'] = 'on';
 $check_sql = "SELECT pembayaran"
   . " FROM tbadmrawatinap"
   . " WHERE tranCode = '" . $this->trancode  . "'";
 
      $nm_select = $check_sql; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select; 
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->rs = array();
      if ($rx = $this->Db->Execute($nm_select)) 
      { 
          $y = 0; 
          $nm_count = $rx->FieldCount();
          while (!$rx->EOF)
          { 
                 for ($x = 0; $x < $nm_count; $x++)
                 { 
                        $this->rs[$y] [$x] = $rx->fields[$x];
                 }
                 $y++; 
                 $rx->MoveNext();
          } 
          $rx->Close();
      } 
      elseif (isset($GLOBALS["NM_ERRO_IBASE"]) && $GLOBALS["NM_ERRO_IBASE"] != 1)  
      { 
          $this->rs = false;
          $this->rs_erro = $this->Db->ErrorMsg();
      } 
;

if (isset($this->rs[0][0]))     
{
    $cara_bayar = $this->rs[0][0];
}
		else     
{
	$cara_bayar = '-';
}

$this->jenis  = $cara_bayar;
$_SESSION['scriptcase']['grid_tbdetailrawatinapF']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->Texto_tag .= "</tr>\r\n";
         $rs->MoveNext();
      }
      $this->Texto_tag .= "</table>\r\n";
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- trancode
   function NM_export_trancode()
   {
         $this->trancode = html_entity_decode($this->trancode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->trancode = strip_tags($this->trancode);
         if (!NM_is_utf8($this->trancode))
         {
             $this->trancode = sc_convert_encoding($this->trancode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->trancode = str_replace('<', '&lt;', $this->trancode);
         $this->trancode = str_replace('>', '&gt;', $this->trancode);
         $this->Texto_tag .= "<td>" . $this->trancode . "</td>\r\n";
   }
   //----- custcode
   function NM_export_custcode()
   {
         $this->custcode = html_entity_decode($this->custcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->custcode = strip_tags($this->custcode);
         if (!NM_is_utf8($this->custcode))
         {
             $this->custcode = sc_convert_encoding($this->custcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->custcode = str_replace('<', '&lt;', $this->custcode);
         $this->custcode = str_replace('>', '&gt;', $this->custcode);
         $this->Texto_tag .= "<td>" . $this->custcode . "</td>\r\n";
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_0 = str_replace('<', '&lt;', $this->sc_field_0);
         $this->sc_field_0 = str_replace('>', '&gt;', $this->sc_field_0);
         $this->Texto_tag .= "<td>" . $this->sc_field_0 . "</td>\r\n";
   }
   //----- dokter
   function NM_export_dokter()
   {
         $this->look_dokter = html_entity_decode($this->look_dokter, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_dokter = strip_tags($this->look_dokter);
         if (!NM_is_utf8($this->look_dokter))
         {
             $this->look_dokter = sc_convert_encoding($this->look_dokter, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_dokter = str_replace('<', '&lt;', $this->look_dokter);
         $this->look_dokter = str_replace('>', '&gt;', $this->look_dokter);
         $this->Texto_tag .= "<td>" . $this->look_dokter . "</td>\r\n";
   }
   //----- ruanginap
   function NM_export_ruanginap()
   {
         if (!NM_is_utf8($this->ruanginap))
         {
             $this->ruanginap = sc_convert_encoding($this->ruanginap, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ruanginap = str_replace('<', '&lt;', $this->ruanginap);
         $this->ruanginap = str_replace('>', '&gt;', $this->ruanginap);
         $this->Texto_tag .= "<td>" . $this->ruanginap . "</td>\r\n";
   }
   //----- selesai
   function NM_export_selesai()
   {
         $this->look_selesai = html_entity_decode($this->look_selesai, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_selesai = strip_tags($this->look_selesai);
         if (!NM_is_utf8($this->look_selesai))
         {
             $this->look_selesai = sc_convert_encoding($this->look_selesai, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->look_selesai = str_replace('<', '&lt;', $this->look_selesai);
         $this->look_selesai = str_replace('>', '&gt;', $this->look_selesai);
         $this->Texto_tag .= "<td>" . $this->look_selesai . "</td>\r\n";
   }
   //----- tglkeluar
   function NM_export_tglkeluar()
   {
             if (substr($this->tglkeluar, 10, 1) == "-") 
             { 
                 $this->tglkeluar = substr($this->tglkeluar, 0, 10) . " " . substr($this->tglkeluar, 11);
             } 
             if (substr($this->tglkeluar, 13, 1) == ".") 
             { 
                $this->tglkeluar = substr($this->tglkeluar, 0, 13) . ":" . substr($this->tglkeluar, 14, 2) . ":" . substr($this->tglkeluar, 17);
             } 
             $conteudo_x =  $this->tglkeluar;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->tglkeluar, "YYYY-MM-DD HH:II:SS  ");
                 $this->tglkeluar = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
         if (!NM_is_utf8($this->tglkeluar))
         {
             $this->tglkeluar = sc_convert_encoding($this->tglkeluar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tglkeluar = str_replace('<', '&lt;', $this->tglkeluar);
         $this->tglkeluar = str_replace('>', '&gt;', $this->tglkeluar);
         $this->Texto_tag .= "<td>" . $this->tglkeluar . "</td>\r\n";
   }
   //----- carakeluar
   function NM_export_carakeluar()
   {
         $this->carakeluar = html_entity_decode($this->carakeluar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->carakeluar = strip_tags($this->carakeluar);
         if (!NM_is_utf8($this->carakeluar))
         {
             $this->carakeluar = sc_convert_encoding($this->carakeluar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->carakeluar = str_replace('<', '&lt;', $this->carakeluar);
         $this->carakeluar = str_replace('>', '&gt;', $this->carakeluar);
         $this->Texto_tag .= "<td>" . $this->carakeluar . "</td>\r\n";
   }
   //----- jenis
   function NM_export_jenis()
   {
         $this->jenis = html_entity_decode($this->jenis, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jenis = strip_tags($this->jenis);
         if (!NM_is_utf8($this->jenis))
         {
             $this->jenis = sc_convert_encoding($this->jenis, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jenis = str_replace('<', '&lt;', $this->jenis);
         $this->jenis = str_replace('>', '&gt;', $this->jenis);
         $this->Texto_tag .= "<td>" . $this->jenis . "</td>\r\n";
   }

   //----- 
   function grava_arquivo_rtf()
   {
      global $nm_lang, $doc_wrap;
      $this->Rtf_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $rtf_f       = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      require_once($this->Ini->path_third      . "/rtf_new/document_generator/cl_xml2driver.php"); 
      $text_ok  =  "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n"; 
      $text_ok .=  "<DOC config_file=\"" . $this->Ini->path_third . "/rtf_new/doc_config.inc\" >\r\n"; 
      $text_ok .=  $this->Texto_tag; 
      $text_ok .=  "</DOC>\r\n"; 
      $xml = new nDOCGEN($text_ok,"RTF"); 
      fwrite($rtf_f, $xml->get_result_file());
      fclose($rtf_f);
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
   function progress_bar_end()
   {
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF'][$path_doc_md5][1] = $this->Tit_doc;
      $Mens_bar = $this->Ini->Nm_lang['lang_othr_file_msge'];
      if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
          $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
      }
      $this->pb->setProgressbarMessage($Mens_bar);
      $this->pb->setDownloadLink($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $this->pb->setDownloadMd5($path_doc_md5);
      $this->pb->completed();
   }
   //---- 
   function monta_html()
   {
      global $nm_url_saida, $nm_lang;
      include($this->Ini->path_btn . $this->Ini->Str_btn_grid);
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbdetailrawatinapF'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_titl'] ?> - Pelayanan Resep Rawat Inap :: RTF</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
  <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
  <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
  <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
  <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
  <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <?php
 if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts))
 {
 ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->str_google_fonts ?>" />
 <?php
 }
 ?>
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_css ?>" /> 
</HEAD>
<BODY class="scExportPage">
<?php echo $this->Ini->Ajax_result_set ?>
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">RTF</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
     <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
     <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "", "only_text", "text_right", "", "", "", "", "", "", "");
 ?>
    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="grid_tbdetailrawatinapF_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_tbdetailrawatinapF"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="volta_grid"> 
</FORM> 
</BODY>
</HTML>
<?php
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
