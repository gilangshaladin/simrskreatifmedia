<?php

class pdfreport_sticker_makan_batch_rtf
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
      require_once($this->Ini->path_aplicacao . "pdfreport_sticker_makan_batch_total.class.php"); 
      $this->Tot      = new pdfreport_sticker_makan_batch_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['tot_geral'][1];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['pdfreport_sticker_makan_batch']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption('volta_grid');
          $this->pb->setTotalSteps($this->count_ger);
      }
      $this->Arquivo    = "sc_rtf";
      $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arquivo   .= "_pdfreport_sticker_makan_batch";
      $this->Arquivo   .= ".rtf";
      $this->Tit_doc    = "pdfreport_sticker_makan_batch.rtf";
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['rtf_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['rtf_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['rtf_name'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['rtf_name']);
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->sc_field_1 = $Busca_temp['sc_field_1']; 
          $tmp_pos = strpos($this->sc_field_1, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_1))
          {
              $this->sc_field_1 = substr($this->sc_field_1, 0, $tmp_pos);
          }
          $this->makan = $Busca_temp['makan']; 
          $tmp_pos = strpos($this->makan, "##@@");
          if ($tmp_pos !== false && !is_array($this->makan))
          {
              $this->makan = substr($this->makan, 0, $tmp_pos);
          }
          $this->b_gelar = $Busca_temp['b_gelar']; 
          $tmp_pos = strpos($this->b_gelar, "##@@");
          if ($tmp_pos !== false && !is_array($this->b_gelar))
          {
              $this->b_gelar = substr($this->b_gelar, 0, $tmp_pos);
          }
          $this->sc_field_0 = $Busca_temp['sc_field_0']; 
          $tmp_pos = strpos($this->sc_field_0, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_0))
          {
              $this->sc_field_0 = substr($this->sc_field_0, 0, $tmp_pos);
          }
          $this->ruangan = $Busca_temp['ruangan']; 
          $tmp_pos = strpos($this->ruangan, "##@@");
          if ($tmp_pos !== false && !is_array($this->ruangan))
          {
              $this->ruangan = substr($this->ruangan, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Texto_tag .= "<table>\r\n";
      $this->Texto_tag .= "<tr>\r\n";
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['makan'])) ? $this->New_label['makan'] : "Makan"; 
          if ($Cada_col == "makan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['b_gelar'])) ? $this->New_label['b_gelar'] : "Gelar"; 
          if ($Cada_col == "b_gelar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $SC_Label = (isset($this->New_label['ruangan'])) ? $this->New_label['ruangan'] : "Ruangan"; 
          if ($Cada_col == "ruangan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['sc_field_1'])) ? $this->New_label['sc_field_1'] : "No Bed"; 
          if ($Cada_col == "sc_field_1" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['diet'])) ? $this->New_label['diet'] : "Diet"; 
          if ($Cada_col == "diet" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['gizi'])) ? $this->New_label['gizi'] : "Gizi"; 
          if ($Cada_col == "gizi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['mp'])) ? $this->New_label['mp'] : "MP"; 
          if ($Cada_col == "mp" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['lh'])) ? $this->New_label['lh'] : "LH"; 
          if ($Cada_col == "lh" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ln'])) ? $this->New_label['ln'] : "LN"; 
          if ($Cada_col == "ln" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['syr'])) ? $this->New_label['syr'] : "Syr"; 
          if ($Cada_col == "syr" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['ekstra'])) ? $this->New_label['ekstra'] : "Ekstra"; 
          if ($Cada_col == "ekstra" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['buah'])) ? $this->New_label['buah'] : "Buah"; 
          if ($Cada_col == "buah" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['tgl'])) ? $this->New_label['tgl'] : "Tgl"; 
          if ($Cada_col == "tgl" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $SC_Label = str_replace('<', '&lt;', $SC_Label);
              $SC_Label = str_replace('>', '&gt;', $SC_Label);
              $this->Texto_tag .= "<td>" . $SC_Label . "</td>\r\n";
          }
          $SC_Label = (isset($this->New_label['jenis'])) ? $this->New_label['jenis'] : "jenis"; 
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
          $SC_Label = (isset($this->New_label['nama_jenis'])) ? $this->New_label['nama_jenis'] : "nama_jenis"; 
          if ($Cada_col == "nama_jenis" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
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
          $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, str_replace (convert(char(10),a.tgl_kirim,102), '.', '-') + ' ' + convert(char(8),a.tgl_kirim,20) as tgl from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, a.tgl_kirim as tgl from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, convert(char(23),a.tgl_kirim,121) as tgl from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, a.tgl_kirim as tgl from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, EXTEND(a.tgl_kirim, YEAR TO DAY) as tgl from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT a.jadwal as makan, b.gelar as b_gelar, b.nama_pasien as sc_field_0, b.kamar_kelas as ruangan, b.bed as sc_field_1, b.diet as diet, b.gizi as gizi, b.mp as mp, b.lh as lh, b.ln as ln, b.syr as syr, b.ekstra as ekstra, b.buah as buah, a.tgl_kirim as tgl from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['order_grid'];
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
         $this->makan = $rs->fields[0] ;  
         $this->b_gelar = $rs->fields[1] ;  
         $this->sc_field_0 = $rs->fields[2] ;  
         $this->ruangan = $rs->fields[3] ;  
         $this->sc_field_1 = $rs->fields[4] ;  
         $this->diet = $rs->fields[5] ;  
         $this->gizi = $rs->fields[6] ;  
         $this->mp = $rs->fields[7] ;  
         $this->lh = $rs->fields[8] ;  
         $this->ln = $rs->fields[9] ;  
         $this->syr = $rs->fields[10] ;  
         $this->ekstra = $rs->fields[11] ;  
         $this->buah = $rs->fields[12] ;  
         $this->tgl = $rs->fields[13] ;  
         $this->sc_proc_grid = true; 
         //----- lookup - jenis
         $this->Lookup->lookup_jenis($this->jenis, $this->barang, $this->array_jenis); 
         $this->jenis = str_replace("<br>", " ", $this->jenis); 
         $this->jenis = ($this->jenis == "&nbsp;") ? "" : $this->jenis; 
         //----- lookup - nama_jenis
         $this->Lookup->lookup_nama_jenis($this->nama_jenis, $this->jenis, $this->array_nama_jenis); 
         $this->nama_jenis = str_replace("<br>", " ", $this->nama_jenis); 
         $this->nama_jenis = ($this->nama_jenis == "&nbsp;") ? "" : $this->nama_jenis; 
         $_SESSION['scriptcase']['pdfreport_sticker_makan_batch']['contr_erro'] = 'on';
 $this->sc_field_0  = substr($this->sc_field_0 ,0,20);
$_SESSION['scriptcase']['pdfreport_sticker_makan_batch']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['field_order'] as $Cada_col)
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
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- makan
   function NM_export_makan()
   {
         $this->makan = html_entity_decode($this->makan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->makan = strip_tags($this->makan);
         if (!NM_is_utf8($this->makan))
         {
             $this->makan = sc_convert_encoding($this->makan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->makan = str_replace('<', '&lt;', $this->makan);
         $this->makan = str_replace('>', '&gt;', $this->makan);
         $this->Texto_tag .= "<td>" . $this->makan . "</td>\r\n";
   }
   //----- b_gelar
   function NM_export_b_gelar()
   {
         $this->b_gelar = html_entity_decode($this->b_gelar, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->b_gelar = strip_tags($this->b_gelar);
         if (!NM_is_utf8($this->b_gelar))
         {
             $this->b_gelar = sc_convert_encoding($this->b_gelar, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->b_gelar = str_replace('<', '&lt;', $this->b_gelar);
         $this->b_gelar = str_replace('>', '&gt;', $this->b_gelar);
         $this->Texto_tag .= "<td>" . $this->b_gelar . "</td>\r\n";
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
         $this->sc_field_0 = html_entity_decode($this->sc_field_0, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_0 = strip_tags($this->sc_field_0);
         if (!NM_is_utf8($this->sc_field_0))
         {
             $this->sc_field_0 = sc_convert_encoding($this->sc_field_0, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_0 = str_replace('<', '&lt;', $this->sc_field_0);
         $this->sc_field_0 = str_replace('>', '&gt;', $this->sc_field_0);
         $this->Texto_tag .= "<td>" . $this->sc_field_0 . "</td>\r\n";
   }
   //----- ruangan
   function NM_export_ruangan()
   {
         $this->ruangan = html_entity_decode($this->ruangan, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ruangan = strip_tags($this->ruangan);
         if (!NM_is_utf8($this->ruangan))
         {
             $this->ruangan = sc_convert_encoding($this->ruangan, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ruangan = str_replace('<', '&lt;', $this->ruangan);
         $this->ruangan = str_replace('>', '&gt;', $this->ruangan);
         $this->Texto_tag .= "<td>" . $this->ruangan . "</td>\r\n";
   }
   //----- sc_field_1
   function NM_export_sc_field_1()
   {
         $this->sc_field_1 = html_entity_decode($this->sc_field_1, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->sc_field_1 = strip_tags($this->sc_field_1);
         if (!NM_is_utf8($this->sc_field_1))
         {
             $this->sc_field_1 = sc_convert_encoding($this->sc_field_1, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->sc_field_1 = str_replace('<', '&lt;', $this->sc_field_1);
         $this->sc_field_1 = str_replace('>', '&gt;', $this->sc_field_1);
         $this->Texto_tag .= "<td>" . $this->sc_field_1 . "</td>\r\n";
   }
   //----- diet
   function NM_export_diet()
   {
         $this->diet = html_entity_decode($this->diet, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->diet = strip_tags($this->diet);
         if (!NM_is_utf8($this->diet))
         {
             $this->diet = sc_convert_encoding($this->diet, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->diet = str_replace('<', '&lt;', $this->diet);
         $this->diet = str_replace('>', '&gt;', $this->diet);
         $this->Texto_tag .= "<td>" . $this->diet . "</td>\r\n";
   }
   //----- gizi
   function NM_export_gizi()
   {
         $this->gizi = html_entity_decode($this->gizi, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->gizi = strip_tags($this->gizi);
         if (!NM_is_utf8($this->gizi))
         {
             $this->gizi = sc_convert_encoding($this->gizi, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->gizi = str_replace('<', '&lt;', $this->gizi);
         $this->gizi = str_replace('>', '&gt;', $this->gizi);
         $this->Texto_tag .= "<td>" . $this->gizi . "</td>\r\n";
   }
   //----- mp
   function NM_export_mp()
   {
         $this->mp = html_entity_decode($this->mp, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->mp = strip_tags($this->mp);
         if (!NM_is_utf8($this->mp))
         {
             $this->mp = sc_convert_encoding($this->mp, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->mp = str_replace('<', '&lt;', $this->mp);
         $this->mp = str_replace('>', '&gt;', $this->mp);
         $this->Texto_tag .= "<td>" . $this->mp . "</td>\r\n";
   }
   //----- lh
   function NM_export_lh()
   {
         $this->lh = html_entity_decode($this->lh, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->lh = strip_tags($this->lh);
         if (!NM_is_utf8($this->lh))
         {
             $this->lh = sc_convert_encoding($this->lh, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->lh = str_replace('<', '&lt;', $this->lh);
         $this->lh = str_replace('>', '&gt;', $this->lh);
         $this->Texto_tag .= "<td>" . $this->lh . "</td>\r\n";
   }
   //----- ln
   function NM_export_ln()
   {
         $this->ln = html_entity_decode($this->ln, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ln = strip_tags($this->ln);
         if (!NM_is_utf8($this->ln))
         {
             $this->ln = sc_convert_encoding($this->ln, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ln = str_replace('<', '&lt;', $this->ln);
         $this->ln = str_replace('>', '&gt;', $this->ln);
         $this->Texto_tag .= "<td>" . $this->ln . "</td>\r\n";
   }
   //----- syr
   function NM_export_syr()
   {
         $this->syr = html_entity_decode($this->syr, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->syr = strip_tags($this->syr);
         if (!NM_is_utf8($this->syr))
         {
             $this->syr = sc_convert_encoding($this->syr, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->syr = str_replace('<', '&lt;', $this->syr);
         $this->syr = str_replace('>', '&gt;', $this->syr);
         $this->Texto_tag .= "<td>" . $this->syr . "</td>\r\n";
   }
   //----- ekstra
   function NM_export_ekstra()
   {
         $this->ekstra = html_entity_decode($this->ekstra, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->ekstra = strip_tags($this->ekstra);
         if (!NM_is_utf8($this->ekstra))
         {
             $this->ekstra = sc_convert_encoding($this->ekstra, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->ekstra = str_replace('<', '&lt;', $this->ekstra);
         $this->ekstra = str_replace('>', '&gt;', $this->ekstra);
         $this->Texto_tag .= "<td>" . $this->ekstra . "</td>\r\n";
   }
   //----- buah
   function NM_export_buah()
   {
         $this->buah = html_entity_decode($this->buah, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->buah = strip_tags($this->buah);
         if (!NM_is_utf8($this->buah))
         {
             $this->buah = sc_convert_encoding($this->buah, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->buah = str_replace('<', '&lt;', $this->buah);
         $this->buah = str_replace('>', '&gt;', $this->buah);
         $this->Texto_tag .= "<td>" . $this->buah . "</td>\r\n";
   }
   //----- tgl
   function NM_export_tgl()
   {
             $conteudo_x =  $this->tgl;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->tgl, "YYYY-MM-DD  ");
                 $this->tgl = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DT", "ddmmaaaa"));
             } 
         if (!NM_is_utf8($this->tgl))
         {
             $this->tgl = sc_convert_encoding($this->tgl, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->tgl = str_replace('<', '&lt;', $this->tgl);
         $this->tgl = str_replace('>', '&gt;', $this->tgl);
         $this->Texto_tag .= "<td>" . $this->tgl . "</td>\r\n";
   }
   //----- jenis
   function NM_export_jenis()
   {
         if (!NM_is_utf8($this->jenis))
         {
             $this->jenis = sc_convert_encoding($this->jenis, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->jenis = str_replace('<', '&lt;', $this->jenis);
         $this->jenis = str_replace('>', '&gt;', $this->jenis);
         $this->Texto_tag .= "<td>" . $this->jenis . "</td>\r\n";
   }
   //----- nama_jenis
   function NM_export_nama_jenis()
   {
         if (!NM_is_utf8($this->nama_jenis))
         {
             $this->nama_jenis = sc_convert_encoding($this->nama_jenis, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->nama_jenis = str_replace('<', '&lt;', $this->nama_jenis);
         $this->nama_jenis = str_replace('>', '&gt;', $this->nama_jenis);
         $this->Texto_tag .= "<td>" . $this->nama_jenis . "</td>\r\n";
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['rtf_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch']['rtf_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['pdfreport_sticker_makan_batch'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_chart_titl'] ?> - inventaris :: RTF</TITLE>
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
<form name="Fdown" method="get" action="pdfreport_sticker_makan_batch_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="pdfreport_sticker_makan_batch"> 
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
