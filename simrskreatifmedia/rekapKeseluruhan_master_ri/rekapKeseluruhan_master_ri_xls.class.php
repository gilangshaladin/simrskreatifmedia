<?php

class rekapKeseluruhan_master_ri_xls
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;
   var $Xls_dados;
   var $Xls_workbook;
   var $Xls_col;
   var $Xls_row;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $NM_ctrl_style = array();
   var $Arquivo;
   var $Tit_doc;
   var $count_ger;
   var $sum_tag;
   //---- 
   function __construct()
   {
   }

   //---- 
   function monta_xls()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida']) {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xls_f);
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
      else { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $this->Use_phpspreadsheet = (phpversion() >=  "7.3.9" && is_dir($this->Ini->path_third . '/phpspreadsheet')) ? true : false;
      $this->Xls_tot_col = 0;
      $this->Xls_row     = 0;
      $this->New_Xls_row = 1;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
      { 
          if ($this->Use_phpspreadsheet) {
              require_once $this->Ini->path_third . '/phpspreadsheet/vendor/autoload.php';
          } 
          else { 
              set_include_path(get_include_path() . PATH_SEPARATOR . $this->Ini->path_third . '/phpexcel/');
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel.php';
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel/IOFactory.php';
              require_once $this->Ini->path_third . '/phpexcel/PHPExcel/Cell/AdvancedValueBinder.php';
          } 
      } 
      $orig_form_dt = strtoupper($_SESSION['scriptcase']['reg_conf']['date_format']);
      $this->SC_date_conf_region = "";
      for ($i = 0; $i < 8; $i++)
      {
          if ($i > 0 && substr($orig_form_dt, $i, 1) != substr($this->SC_date_conf_region, -1, 1)) {
              $this->SC_date_conf_region .= $_SESSION['scriptcase']['reg_conf']['date_sep'];
          }
          $this->SC_date_conf_region .= substr($orig_form_dt, $i, 1);
      }
      $this->Xls_tp = ".xlsx";
      if (isset($_REQUEST['nmgp_tp_xls']) && !empty($_REQUEST['nmgp_tp_xls']))
      {
          $this->Xls_tp = "." . $_REQUEST['nmgp_tp_xls'];
      }
      $this->groupby_show = "N";
      if (isset($_REQUEST['nmgp_tot_xls']) && !empty($_REQUEST['nmgp_tot_xls']))
      {
          $this->groupby_show = $_REQUEST['nmgp_tot_xls'];
      }
      $this->Xls_col      = 0;
      $this->Tem_xls_res  = false;
      $this->Xls_password = "";
      $this->nm_data      = new nm_data("id");
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
      { 
          $this->Tem_xls_res  = true;
          if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
          { 
              $this->Tem_xls_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false || strpos(" " . $_REQUEST['SC_module_export'], "chart") !== false) ? true : false;
          } 
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['SC_Ind_Groupby'] == "sc_free_total")
          {
              $this->Tem_xls_res  = false;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['SC_Gb_Free_cmp']))
          {
              $this->Tem_xls_res  = false;
          }
          if ($this->Tem_xls_res)
          { 
              require_once($this->Ini->path_aplicacao . "rekapKeseluruhan_master_ri_res_xls.class.php");
              $this->Res_xls = new rekapKeseluruhan_master_ri_res_xls();
              $this->prep_modulos("Res_xls");
          } 
          $this->Arquivo    = "sc_xls";
          $this->Arquivo   .= "_" . date("YmdHis") . "_" . rand(0, 1000);
          $this->Arq_zip    = $this->Arquivo . "_rekapKeseluruhan_master_ri.zip";
          $this->Arquivo   .= "_rekapKeseluruhan_master_ri" . $this->Xls_tp;
          $this->Tit_doc    = "rekapKeseluruhan_master_ri" . $this->Xls_tp;
          $this->Tit_zip    = "rekapKeseluruhan_master_ri.zip";
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          if ($this->Use_phpspreadsheet) {
              $this->Xls_dados = new PhpOffice\PhpSpreadsheet\Spreadsheet();
              \PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
          }
          else {
              PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );
              $this->Xls_dados = new PHPExcel();
          }
          $this->Xls_dados->setActiveSheetIndex(0);
          $this->Nm_ActiveSheet = $this->Xls_dados->getActiveSheet();
          $this->Nm_ActiveSheet->setTitle($this->Ini->Nm_lang['lang_othr_grid_titl']);
          if ($_SESSION['scriptcase']['reg_conf']['css_dir'] == "RTL")
          {
              $this->Nm_ActiveSheet->setRightToLeft(true);
          }
      }
      require_once($this->Ini->path_aplicacao . "rekapKeseluruhan_master_ri_total.class.php"); 
      $this->Tot = new rekapKeseluruhan_master_ri_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['SC_Ind_Groupby'];
      $this->Tot->$Gb_geral();
      $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['tot_geral'][1];
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['rekapKeseluruhan_master_ri']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_return']);
          if ($this->Tem_xls_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot );
      }
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
   function grava_arquivo()
   {
      global $nm_nada, $nm_lang;

      $GLOBALS["script_case_init"] = $this->Ini->sc_page;
      $pos      = strrpos($this->Ini->link_billInap_cons_emb, '/');
      $link_xls = substr($this->Ini->link_billInap_cons_emb, 0, $pos) . "/billInap_xls.class.php";
      if (!is_file($this->Ini->link_billInap_cons_emb) || !is_file($link_xls))
      {
          $this->NM_cmp_hidden['detailinap'] = "off";
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida'] = true;
          $_SESSION['scriptcase']['billInap']['protect_modal'] = $this->Ini->sc_page;
          include_once ($this->Ini->link_billInap_cons_emb);
          $this->billInap = new billInap_apl ;
          $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida'] = false;
          unset($_SESSION['scriptcase']['billInap']['protect_modal']);
      }
      $pos      = strrpos($this->Ini->link_billInap_cons_emb, '/');
      $link_xml = substr($this->Ini->link_billInap_cons_emb, 0, $pos) . "/billInap_xml.class.php";
      if (!is_file($this->Ini->link_billInap_cons_emb) || !is_file($link_xml))
      {
          $this->NM_cmp_hidden['detailinap'] = "off";
      }
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida'] = true;
          $_SESSION['scriptcase']['billInap']['protect_modal'] = $this->Ini->sc_page;
          include_once ($this->Ini->link_billInap_cons_emb);
          $this->billInap = new billInap_apl ;
          $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida'] = false;
          unset($_SESSION['scriptcase']['billInap']['protect_modal']);
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_name']);
          $this->Xls_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['rekapKeseluruhan_master_ri']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['rekapKeseluruhan_master_ri']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['rekapKeseluruhan_master_ri']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['field_order'] as $Cada_cmp)
      {
          if (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
          {
              $this->Xls_tot_col++;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->trandate = $Busca_temp['trandate']; 
          $tmp_pos = strpos($this->trandate, "##@@");
          if ($tmp_pos !== false && !is_array($this->trandate))
          {
              $this->trandate = substr($this->trandate, 0, $tmp_pos);
          }
          $this->trandate_2 = $Busca_temp['trandate_input_2']; 
          $this->dokter = $Busca_temp['dokter']; 
          $tmp_pos = strpos($this->dokter, "##@@");
          if ($tmp_pos !== false && !is_array($this->dokter))
          {
              $this->dokter = substr($this->dokter, 0, $tmp_pos);
          }
          $this->jenispayment = $Busca_temp['jenispayment']; 
          $tmp_pos = strpos($this->jenispayment, "##@@");
          if ($tmp_pos !== false && !is_array($this->jenispayment))
          {
              $this->jenispayment = substr($this->jenispayment, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida_label']) && $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida_label'])
      { 
          $this->count_span = 0;
          $this->Xls_row++;
          $this->proc_label();
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
          return;
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), tranCode, custCode, dokter, jenisPayment, sum(if(jmlTagihan<=jmlBayar,jmlTagihan,jmlBayar)) as tag, noStruk, IF
	( jenisPayment = 'KARTU DEBIT' OR jenisPayment = 'KARTU KREDIT',bankDebit,'' ) AS 'Debit/Kredit',
	noKartu,
		instansiPenjamin,
		paidDate,
		kasir,
		noPayment,
		'Rawat Inap' as kategori from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT tranDate, tranCode, custCode, dokter, jenisPayment, sum(if(jmlTagihan<=jmlBayar,jmlTagihan,jmlBayar)) as tag, noStruk, IF
	( jenisPayment = 'KARTU DEBIT' OR jenisPayment = 'KARTU KREDIT',bankDebit,'' ) AS 'Debit/Kredit',
	noKartu,
		instansiPenjamin,
		paidDate,
		kasir,
		noPayment,
		'Rawat Inap' as kategori from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT convert(char(23),tranDate,121), tranCode, custCode, dokter, jenisPayment, sum(if(jmlTagihan<=jmlBayar,jmlTagihan,jmlBayar)) as tag, noStruk, IF
	( jenisPayment = 'KARTU DEBIT' OR jenisPayment = 'KARTU KREDIT',bankDebit,'' ) AS 'Debit/Kredit',
	noKartu,
		instansiPenjamin,
		paidDate,
		kasir,
		noPayment,
		'Rawat Inap' as kategori from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT tranDate, tranCode, custCode, dokter, jenisPayment, sum(if(jmlTagihan<=jmlBayar,jmlTagihan,jmlBayar)) as tag, noStruk, IF
	( jenisPayment = 'KARTU DEBIT' OR jenisPayment = 'KARTU KREDIT',bankDebit,'' ) AS 'Debit/Kredit',
	noKartu,
		instansiPenjamin,
		paidDate,
		kasir,
		noPayment,
		'Rawat Inap' as kategori from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT EXTEND(tranDate, YEAR TO FRACTION), tranCode, custCode, dokter, jenisPayment, sum(if(jmlTagihan<=jmlBayar,jmlTagihan,jmlBayar)) as tag, noStruk, IF
	( jenisPayment = 'KARTU DEBIT' OR jenisPayment = 'KARTU KREDIT',bankDebit,'' ) AS 'Debit/Kredit',
	noKartu,
		instansiPenjamin,
		paidDate,
		kasir,
		noPayment,
		'Rawat Inap' as kategori from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT tranDate, tranCode, custCode, dokter, jenisPayment, sum(if(jmlTagihan<=jmlBayar,jmlTagihan,jmlBayar)) as tag, noStruk, IF
	( jenisPayment = 'KARTU DEBIT' OR jenisPayment = 'KARTU KREDIT',bankDebit,'' ) AS 'Debit/Kredit',
	noKartu,
		instansiPenjamin,
		paidDate,
		kasir,
		noPayment,
		'Rawat Inap' as kategori from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['where_pesq'];
      $nmgp_select .= " group by tranCode"; 
      $nmgp_select_count .= " group by tranCode"; 
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['order_grid'];
      $nmgp_select .= $nmgp_order_by; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select;
      $rs = $this->Db->Execute($nmgp_select);
      if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1)
      {
         $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
         exit;
      }
      $this->SC_seq_register = 0;
      $prim_reg = true;
      $prim_gb  = true;
      $nm_houve_quebra = "N";
      $this->New_Xls_row = $this->Xls_row;
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         $prim_reg = false;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         $this->Xls_col = 0;
         if ($this->New_Xls_row > $this->Xls_row) {
             $this->Xls_row = $this->New_Xls_row;
         }
         $this->Xls_row++;
         $this->trandate = $rs->fields[0] ;  
         $this->trancode = $rs->fields[1] ;  
         $this->custcode = $rs->fields[2] ;  
         $this->dokter = $rs->fields[3] ;  
         $this->jenispayment = $rs->fields[4] ;  
         $this->tag = $rs->fields[5] ;  
         $this->tag =  str_replace(",", ".", $this->tag);
         $this->tag = (string)$this->tag;
         $this->nostruk = $rs->fields[6] ;  
         $this->nostruk = (string)$this->nostruk;
         $this->kategori = $rs->fields[7] ;  
         $this->Orig_trandate = $this->trandate;
         $this->Orig_trancode = $this->trancode;
         $this->Orig_custcode = $this->custcode;
         $this->Orig_dokter = $this->dokter;
         $this->Orig_jenispayment = $this->jenispayment;
         $this->Orig_tag = $this->tag;
         $this->Orig_nostruk = $this->nostruk;
         $this->Orig_kategori = $this->kategori;
     if ($this->groupby_show == "S") {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
         { 
             if ($prim_gb) {
                 $this->count_span = 0;
                 $this->proc_label();
             }
             if ($prim_gb || $nm_houve_quebra == "S") {
                 $this->xls_sub_cons_copy_label($this->Xls_row);
                 $this->Xls_row++;
             }
         }
         elseif ($prim_gb || $nm_houve_quebra == "S")
         {
             $this->count_span = 0;
             $this->proc_label();
         }
     }
     else {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
         { 
             if ($prim_gb)
             {
                 $this->count_span = 0;
                 $this->proc_label();
                 $this->xls_sub_cons_copy_label($this->Xls_row);
                 $this->Xls_row++;
             }
         }
         elseif ($prim_gb)
         {
             $this->count_span = 0;
             $this->proc_label();
         }
     }
     $prim_gb = false;
     $nm_houve_quebra = "N";
         //----- lookup - custcode
         $this->look_custcode = $this->custcode; 
         $this->Lookup->lookup_custcode($this->look_custcode, $this->custcode) ; 
         $this->look_custcode = ($this->look_custcode == "&nbsp;") ? "" : $this->look_custcode; 
         //----- lookup - dokter
         $this->look_dokter = $this->dokter; 
         $this->Lookup->lookup_dokter($this->look_dokter, $this->dokter) ; 
         $this->look_dokter = ($this->look_dokter == "&nbsp;") ? "" : $this->look_dokter; 
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
                { 
                    $NM_func_exp = "NM_sub_cons_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
                else 
                { 
                    $NM_func_exp = "NM_export_" . $Cada_col;
                    $this->$NM_func_exp();
                } 
            } 
         } 
         if (!isset($this->NM_cmp_hidden["detailinap"]) || $this->NM_cmp_hidden["detailinap"] != "off")
         { 
             $this->xls_set_style();
             $this->NM_export_detailinap();
             if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
             { 
                 $this->Xls_row++;
                 $this->arr_export['lines'][$this->Xls_row] = $this->Rows_sub_detailinap['label'];
                 foreach ($this->Rows_sub_detailinap['lines'] as $line => $cols)
                 {
                     $this->Xls_row++;
                     $this->arr_export['lines'][$this->Xls_row] = $cols;
                 }
             }
             else 
             { 
                 if ($this->New_Xls_row > $this->Xls_row) {
                     $this->Xls_row = $this->New_Xls_row;
                 }
                 $_SESSION['scriptcase']['export_return']['label'] = $this->Rows_sub_detailinap['label'];
                 foreach ($this->Rows_sub_detailinap['lines'] as $line)
                 {
                     $this->Xls_col = 0;
                     $this->Xls_row++;
                     $this->xls_sub_cons_lines($line);
                 }
             }
         } 
         if (isset($this->NM_Row_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
         { 
             foreach ($this->NM_Row_din as $row => $height) 
             { 
                 $this->Nm_ActiveSheet->getRowDimension($row)->setRowHeight($height);
             } 
         } 
         $rs->MoveNext();
      }
      $this->xls_set_style();
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'] && $prim_reg)
      { 
          $this->proc_label();
          $this->xls_sub_cons_copy_label($this->Xls_row);
          $nm_grid_sem_reg = $this->Ini->Nm_lang['lang_errm_empt']; 
          if (!NM_is_utf8($nm_grid_sem_reg ))
          {
              $nm_grid_sem_reg  = sc_convert_encoding($nm_grid_sem_reg , "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->Xls_row++;
          $this->arr_export['lines'][$this->Xls_row][1]['data']   = $nm_grid_sem_reg;
          $this->arr_export['lines'][$this->Xls_row][1]['align']  = "right";
          $this->arr_export['lines'][$this->Xls_row][1]['type']   = "char";
          $this->arr_export['lines'][$this->Xls_row][1]['format'] = "";
      }
      if (isset($this->NM_Col_din) && !$_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
      { 
          foreach ($this->NM_Col_din as $col => $width)
          { 
              $this->Nm_ActiveSheet->getColumnDimension($col)->setWidth($width / 5);
          } 
      } 
      if ($this->groupby_show == "S") {
          if ($this->New_Xls_row > $this->Xls_row) {
              $this->Xls_row = $this->New_Xls_row;
          }
          $this->Xls_col = 0;
          $this->Xls_row++;
          $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['SC_Ind_Groupby'] . "_bot";
          $this->$Gb_geral();
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
      { 
          if ($this->Tem_xls_res)
          { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_res_grid'] = true;
              if (!$this->Ini->sc_export_ajax) {
                  $this->PB_dif = intval ($this->PB_dif / 2);
                  $Mens_bar  = $this->Ini->Nm_lang['lang_othr_prcs'];
                  $Mens_smry = $this->Ini->Nm_lang['lang_othr_smry_titl'];
                  if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                      $Mens_bar  = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
                      $Mens_smry = sc_convert_encoding($Mens_smry, "UTF-8", $_SESSION['scriptcase']['charset']);
                  }
                  $this->pb->setProgressbarMessage($Mens_bar . ": " . $Mens_smry);
                  $this->pb->addSteps($this->PB_dif);
              }
              $this->Res_xls->monta_xls();
              if ($this->Use_phpspreadsheet) {
                  $Xls_res = \PhpOffice\PhpSpreadsheet\IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_res_sheet']);
              }
              else {
                  $Xls_res = PHPExcel_IOFactory::load($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_res_sheet']);
              }
              foreach($Xls_res->getAllSheets() as $sheet)
              {
                  $this->Xls_dados->addExternalSheet($sheet);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_res_sheet']);
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = $this->Ini->Nm_lang['lang_btns_export_finished'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Use_phpspreadsheet) {
              if ($this->Xls_tp == ".xlsx") {
                  $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xlsx($this->Xls_dados);
              } 
              else {
                  $objWriter = new PhpOffice\PhpSpreadsheet\Writer\Xls($this->Xls_dados);
              } 
          } 
          else {
              if ($this->Xls_tp == ".xlsx") {
                  $objWriter = new PHPExcel_Writer_Excel2007($this->Xls_dados);
              } 
              else {
                  $objWriter = new PHPExcel_Writer_Excel5($this->Xls_dados);
              } 
          } 
          $objWriter->save($this->Xls_f);
          if ($this->Xls_password != "")
          { 
              $str_zip   = "";
              $Zip_f     = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input = (FALSE !== strpos($this->Xls_f, ' ')) ? " \"" . $this->Xls_f . "\"" :  $this->Xls_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe -P -j " . $this->Xls_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  if (FALSE !== strpos(strtolower(php_uname()), 'i686')) 
                  {
                      chdir($this->Ini->path_third . "/zip/linux-i386/bin");
                  }
                  else
                  {
                     chdir($this->Ini->path_third . "/zip/linux-amd64/bin");
                  }
                  $str_zip = "./7za -p" . $this->Xls_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za -p" . $this->Xls_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
              $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'w');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
              unlink($Arq_input);
              $this->Arquivo = $this->Arq_zip;
              $this->Xls_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
          } 
      } 
      else 
      { 
          $_SESSION['scriptcase']['export_return'] = $this->arr_export;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
      if (method_exists($this->billInap, "close_emb")) 
      {
          $this->billInap->close_emb();
      }
   }
   function proc_label()
   { 
      foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['field_order'] as $Cada_col)
      { 
          $SC_Label = (isset($this->New_label['trandate'])) ? $this->New_label['trandate'] : "Tgl. Transaksi"; 
          if ($Cada_col == "trandate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "center";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Kode Pelayanan"; 
          if ($Cada_col == "trancode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "Pasien"; 
          if ($Cada_col == "custcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['dokter'])) ? $this->New_label['dokter'] : "DPJP"; 
          if ($Cada_col == "dokter" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['jenispayment'])) ? $this->New_label['jenispayment'] : "Jenis Payment"; 
          if ($Cada_col == "jenispayment" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['tag'])) ? $this->New_label['tag'] : "Tag"; 
          if ($Cada_col == "tag" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['nostruk'])) ? $this->New_label['nostruk'] : "No Struk"; 
          if ($Cada_col == "nostruk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "right";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['kategori'])) ? $this->New_label['kategori'] : "Kategori"; 
          if ($Cada_col == "kategori" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
          {
              $this->count_span++;
              $current_cell_ref = $this->calc_cell($this->Xls_col);
              if (!NM_is_utf8($SC_Label))
              {
                  $SC_Label = sc_convert_encoding($SC_Label, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
              { 
                  $this->arr_export['label'][$this->Xls_col]['data']     = $SC_Label;
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->arr_export['label'][$this->Xls_col]['bold']     = "s";
              }
              else
              { 
                  if ($this->Use_phpspreadsheet) {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                  }
                  else {
                      $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                  }
                  $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $SC_Label);
                  $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                  $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
              }
              $this->Xls_col++;
          }
          $SC_Label = (isset($this->New_label['detailinap'])) ? $this->New_label['detailinap'] : "DetailInap"; 
          if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
          {
              $this->arr_span['detailinap'] = $this->count_span;
              $this->Emb_label_cols_detailinap = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida'] = true;
              $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida_label'] = true;
              $GLOBALS["script_case_init"] = $this->Ini->sc_page;
              $GLOBALS["nmgp_parms"] = "nmgp_opcao?#?xls?@?";
              if (method_exists($this->billInap, "controle"))
              {
                  $this->billInap->controle();
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
                  {
                      $this->Ini->conectDB();
                      $this->Db = $this->Ini->Db;
                      if ($this->Tot) {
                          $this->Tot->Db = $this->Db;
                      }
                  }
                  if (isset($_SESSION['scriptcase']['export_return']))
                  {
                     foreach ($_SESSION['scriptcase']['export_return']['label'] as $col => $dados)
                     {
                         if (isset($dados['col_span_i'])) {
                             $this->Emb_label_cols_detailinap += $dados['col_span_i'];
                         }
                         elseif (isset($dados['col_span_f'])) {
                             $this->Emb_label_cols_detailinap += $dados['col_span_f'];
                         }
                         else {
                             $this->Emb_label_cols_detailinap++;
                         }
                     }
                  }
              }
              $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida'] = false;
              $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida_label'] = false;
          }
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida'])
      { 
          if (!isset($this->NM_cmp_hidden[$detailinap]) || $this->NM_cmp_hidden[$detailinap] != "off")
          {
              while ($this->count_span < $this->Emb_label_cols_detailinap)
              {
                  $this->arr_export['label'][$this->Xls_col]['data']     = " ";
                  $this->arr_export['label'][$this->Xls_col]['align']    = "left";
                  $this->arr_export['label'][$this->Xls_col]['autosize'] = "s";
                  $this->count_span++;
                  $this->Xls_col++;
              }
          }
      }
      $this->Xls_col = 0;
      $this->Xls_row++;
   } 
   //----- trandate
   function NM_export_trandate()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "CENTER"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
      if (!empty($this->trandate))
      {
             if (substr($this->trandate, 10, 1) == "-") 
             { 
                 $this->trandate = substr($this->trandate, 0, 10) . " " . substr($this->trandate, 11);
             } 
             if (substr($this->trandate, 13, 1) == ".") 
             { 
                $this->trandate = substr($this->trandate, 0, 13) . ":" . substr($this->trandate, 14, 2) . ":" . substr($this->trandate, 17);
             } 
             $conteudo_x =  $this->trandate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->trandate, "YYYY-MM-DD HH:II:SS  ");
                 $this->trandate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      }
         if (!NM_is_utf8($this->trandate))
         {
             $this->trandate = sc_convert_encoding($this->trandate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->trandate, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->trandate, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- trancode
   function NM_export_trancode()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->trancode = html_entity_decode($this->trancode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->trancode = strip_tags($this->trancode);
         if (!NM_is_utf8($this->trancode))
         {
             $this->trancode = sc_convert_encoding($this->trancode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->trancode, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->trancode, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- custcode
   function NM_export_custcode()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_custcode = html_entity_decode($this->look_custcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_custcode = strip_tags($this->look_custcode);
         if (!NM_is_utf8($this->look_custcode))
         {
             $this->look_custcode = sc_convert_encoding($this->look_custcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_custcode, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_custcode, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- dokter
   function NM_export_dokter()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->look_dokter = html_entity_decode($this->look_dokter, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_dokter = strip_tags($this->look_dokter);
         if (!NM_is_utf8($this->look_dokter))
         {
             $this->look_dokter = sc_convert_encoding($this->look_dokter, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_dokter, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->look_dokter, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- jenispayment
   function NM_export_jenispayment()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->jenispayment = html_entity_decode($this->jenispayment, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jenispayment = strip_tags($this->jenispayment);
         if (!NM_is_utf8($this->jenispayment))
         {
             $this->jenispayment = sc_convert_encoding($this->jenispayment, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->jenispayment, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->jenispayment, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- tag
   function NM_export_tag()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         if (!NM_is_utf8($this->tag))
         {
             $this->tag = sc_convert_encoding($this->tag, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if (is_numeric($this->tag))
         {
             $this->NM_ctrl_style[$current_cell_ref]['format'] = '#,##0';
         }
         $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $this->tag);
         $this->Xls_col++;
   }
   //----- nostruk
   function NM_export_nostruk()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "RIGHT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->nostruk = html_entity_decode($this->nostruk, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nostruk = strip_tags($this->nostruk);
         if (!NM_is_utf8($this->nostruk))
         {
             $this->nostruk = sc_convert_encoding($this->nostruk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nostruk, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->nostruk, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- kategori
   function NM_export_kategori()
   {
         $current_cell_ref = $this->calc_cell($this->Xls_col);
         if (!isset($this->NM_ctrl_style[$current_cell_ref])) {
             $this->NM_ctrl_style[$current_cell_ref]['ini'] = $this->Xls_row;
             $this->NM_ctrl_style[$current_cell_ref]['align'] = "LEFT"; 
         }
         $this->NM_ctrl_style[$current_cell_ref]['end'] = $this->Xls_row;
         $this->kategori = html_entity_decode($this->kategori, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kategori = strip_tags($this->kategori);
         if (!NM_is_utf8($this->kategori))
         {
             $this->kategori = sc_convert_encoding($this->kategori, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         if ($this->Use_phpspreadsheet) {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->kategori, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
         }
         else {
             $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $this->kategori, PHPExcel_Cell_DataType::TYPE_STRING);
         }
         $this->Xls_col++;
   }
   //----- detailinap
   function NM_export_detailinap()
   {
         $GLOBALS["script_case_init"] = $this->Ini->sc_page;
         $GLOBALS["nmgp_parms"] = "nmgp_opcao?#?xls?@?tran_ri?#?" . str_replace("'", "@aspass@", $this->Orig_trancode) . "?@?";
         $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida'] = true;
         $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['nolabel'] = true;
         if (method_exists($this->billInap, "controle"))
         {
             $this->billInap->controle();
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
             {
                 $this->Ini->conectDB();
                 $this->Db = $this->Ini->Db;
                 if ($this->Tot) {
                     $this->Tot->Db = $this->Db;
                 }
             }
             if (isset($_SESSION['scriptcase']['export_return']))
             {
                 $this->Rows_sub_detailinap = $_SESSION['scriptcase']['export_return'];
                 return;
             }
         }
         $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida'] = false;
   }
   //----- trandate
   function NM_sub_cons_trandate()
   {
      if (!empty($this->trandate))
      {
         if (substr($this->trandate, 10, 1) == "-") 
         { 
             $this->trandate = substr($this->trandate, 0, 10) . " " . substr($this->trandate, 11);
         } 
         if (substr($this->trandate, 13, 1) == ".") 
         { 
            $this->trandate = substr($this->trandate, 0, 13) . ":" . substr($this->trandate, 14, 2) . ":" . substr($this->trandate, 17);
         } 
         $conteudo_x =  $this->trandate;
         nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
         if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
         { 
             $this->nm_data->SetaData($this->trandate, "YYYY-MM-DD HH:II:SS  ");
             $this->trandate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
         } 
      }
         if (!NM_is_utf8($this->trandate))
         {
             $this->trandate = sc_convert_encoding($this->trandate, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->trandate;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "center";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- trancode
   function NM_sub_cons_trancode()
   {
         $this->trancode = html_entity_decode($this->trancode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->trancode = strip_tags($this->trancode);
         if (!NM_is_utf8($this->trancode))
         {
             $this->trancode = sc_convert_encoding($this->trancode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->trancode;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- custcode
   function NM_sub_cons_custcode()
   {
         $this->look_custcode = html_entity_decode($this->look_custcode, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_custcode = strip_tags($this->look_custcode);
         if (!NM_is_utf8($this->look_custcode))
         {
             $this->look_custcode = sc_convert_encoding($this->look_custcode, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_custcode;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- dokter
   function NM_sub_cons_dokter()
   {
         $this->look_dokter = html_entity_decode($this->look_dokter, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->look_dokter = strip_tags($this->look_dokter);
         if (!NM_is_utf8($this->look_dokter))
         {
             $this->look_dokter = sc_convert_encoding($this->look_dokter, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->look_dokter;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- jenispayment
   function NM_sub_cons_jenispayment()
   {
         $this->jenispayment = html_entity_decode($this->jenispayment, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->jenispayment = strip_tags($this->jenispayment);
         if (!NM_is_utf8($this->jenispayment))
         {
             $this->jenispayment = sc_convert_encoding($this->jenispayment, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->jenispayment;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- tag
   function NM_sub_cons_tag()
   {
         if (!NM_is_utf8($this->tag))
         {
             $this->tag = sc_convert_encoding($this->tag, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->tag;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "#,##0";
         $this->Xls_col++;
   }
   //----- nostruk
   function NM_sub_cons_nostruk()
   {
         $this->nostruk = html_entity_decode($this->nostruk, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->nostruk = strip_tags($this->nostruk);
         if (!NM_is_utf8($this->nostruk))
         {
             $this->nostruk = sc_convert_encoding($this->nostruk, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->nostruk;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- kategori
   function NM_sub_cons_kategori()
   {
         $this->kategori = html_entity_decode($this->kategori, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
         $this->kategori = strip_tags($this->kategori);
         if (!NM_is_utf8($this->kategori))
         {
             $this->kategori = sc_convert_encoding($this->kategori, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $this->kategori;
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
         $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
         $this->Xls_col++;
   }
   //----- detailinap
   function NM_sub_cons_detailinap()
   {
         $this->Rows_sub_detailinap = array();
         $GLOBALS["script_case_init"] = $this->Ini->sc_page;
         $GLOBALS["nmgp_parms"] = "nmgp_opcao?#?xls?@?tran_ri?#?" . str_replace("'", "@aspass@", $this->Orig_trancode) . "?@?";
         $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida'] = true;
         if (method_exists($this->billInap, "controle"))
         {
             $this->billInap->controle();
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
             {
                 $this->Ini->conectDB();
                 $this->Db = $this->Ini->Db;
                 if ($this->Tot) {
                     $this->Tot->Db = $this->Db;
                 }
             }
             if (isset($_SESSION['scriptcase']['export_return']))
             {
                 $this->row_sub = 1;
             $this->Rows_sub_detailinap = $_SESSION['scriptcase']['export_return'];
             return;
             }
         }
         $_SESSION['sc_session'][$this->Ini->sc_page]['billInap']['embutida'] = false;
         $this->Xls_col++;
   }
   function xls_sub_cons_copy_label($row)
   {
       if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['nolabel']) || $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['nolabel'])
       {
           foreach ($this->arr_export['label'] as $col => $dados)
           {
               $this->arr_export['lines'][$row][$col] = $dados;
           }
       }
   }
   function xls_set_style()
   {
       if (!empty($this->NM_ctrl_style))
       {
           foreach ($this->NM_ctrl_style as $col => $dados)
           {
               $cell_ref = $col . $dados['ini'] . ":" . $col . $dados['end'];
               if ($this->Use_phpspreadsheet) {
                   if ($dados['align'] == "LEFT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                   }
                   elseif ($dados['align'] == "RIGHT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                   }
               }
               else {
                   if ($dados['align'] == "LEFT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                   }
                   elseif ($dados['align'] == "RIGHT") {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($cell_ref)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                   }
               }
               if (isset($dados['format'])) {
                   $this->Nm_ActiveSheet->getStyle($cell_ref)->getNumberFormat()->setFormatCode($dados['format']);
               }
           }
           $this->NM_ctrl_style = array();
       }
   }
   function xls_sub_cons_label($lines)
   {
         foreach ($lines as $col => $dados)
         {
             if (isset($dados['col_span_i'])) {
                 $this->Xls_col += $dados['col_span_i'];
             }
             $current_cell_ref = $this->calc_cell($this->Xls_col);
             if ($this->Use_phpspreadsheet) {
                 if ($dados['align'] == 'center') {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                 }
                 elseif ($dados['align'] == 'left') {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                 }
                 else {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                 }
             }
             else {
                 if ($dados['align'] == 'center') {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                 }
                 elseif ($dados['align'] == 'left') {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                 }
                 else {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                 }
             }
             $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $dados['data']);
             $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
             if ($dados['autosize'] == 's') {
                 $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
             }
             if (isset($dados['col_span_f'])) {
                 $this->Xls_col += $dados['col_span_f'];
             }
             else {
                 $this->Xls_col++;
             }
         }
   }
   function xls_sub_cons_lines($lines)
   {
         foreach ($lines as $icol => $dados)
         {
             if (isset($dados['col_span_i'])) {
                 $this->Xls_col += $dados['col_span_i'];
             }
             $current_cell_ref = $this->calc_cell($this->Xls_col);
             if ($this->Use_phpspreadsheet) {
                 if ($dados['align'] == 'center') {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                 }
                 elseif ($dados['align'] == 'left') {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                 }
                 else {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                 }
             }
             else {
                 if ($dados['align'] == 'center') {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                 }
                 elseif ($dados['align'] == 'left') {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                 }
                 else {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                 }
             }
             if ($dados['type'] == 'img') {
                 if (is_file($dados['data']))
                 { 
                     $sc_obj_img = new nm_trata_img($dados['data']);
                     $nm_image_altura  = $sc_obj_img->getHeight();
                     $nm_image_largura = $sc_obj_img->getWidth();
                     if ($this->Use_phpspreadsheet) {
                         $objDrawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                     }
                     else {
                         $objDrawing = new PHPExcel_Worksheet_Drawing();
                     }
                     if (!empty($dados['name'])) {
                         $objDrawing->setName($dados['name']);
                     } 
                     $objDrawing->setPath($dados['data']);
                     $objDrawing->setHeight($nm_image_altura);
                     $col = $current_cell_ref;
                     $objDrawing->setCoordinates($col . $this->Xls_row);
                     $objDrawing->setWorksheet($this->Nm_ActiveSheet);
                     if (!isset($this->NM_Col_din[$col]) || $this->NM_Col_din[$col] < $nm_image_largura)
                     { 
                         $this->NM_Col_din[$col] = $nm_image_largura;
                     } 
                     if (!isset($this->NM_Row_din[$this->Xls_row]) || $this->NM_Row_din[$this->Xls_row] < $nm_image_altura)
                     { 
                         $this->NM_Row_din[$this->Xls_row] = $nm_image_altura;
                     } 
                 } 
                 else 
                 { 
                     if ($this->Use_phpspreadsheet) {
                         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                     }
                     else {
                         $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                     }
                     $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, ' ');
                 } 
             } 
             elseif ($dados['type'] == 'data') {
                 if (empty($dados['data']) || $dados['data'] == "0000-00-00") {
                     if ($this->Use_phpspreadsheet) {
                         $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $dados['data'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                     }
                     else {
                         $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $dados['data'], PHPExcel_Cell_DataType::TYPE_STRING);
                     }
                 }
                 else {
                     $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $dados['data']);
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($dados['format']);
                 }
             } 
             elseif ($dados['type'] == 'num') {
                 if (is_numeric($dados['data'])) {
                     $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($dados['format']);
                 }
                 $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $dados['data']);
             } 
             else { 
                 if ($this->Use_phpspreadsheet) {
                     $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $dados['data'], \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
                 }
                 else {
                    $this->Nm_ActiveSheet->setCellValueExplicit($current_cell_ref . $this->Xls_row, $dados['data'], PHPExcel_Cell_DataType::TYPE_STRING);
                 }
             } 
             if (isset($dados['bold'])){ 
                 $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
             } 
             if ($dados['autosize'] == 's') {
                 $this->Nm_ActiveSheet->getColumnDimension($current_cell_ref)->setAutoSize(true);
             }
             if (isset($dados['col_span_f'])) {
                 $this->Xls_col += $dados['col_span_f'];
             }
             else {
                 $this->Xls_col++;
             }
         }
         if ($this->Xls_row > $this->New_Xls_row) {
             $this->New_Xls_row = $this->Xls_row;
         }
         if (isset($dados['row_span_f'])) {
             $this->Xls_row += $dados['row_span_f'];
         }
   }
   function quebra_geral_sc_free_total_bot()
   {
       if ($this->groupby_show != "S") {
           return;
       }
       $this->Tot->quebra_geral_sc_free_total();
       $prim_cmp = true;
       $mens_tot = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['tot_geral'][0] . "(" . $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['tot_geral'][1] . ")";
       foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['field_order'] as $Cada_cmp)
       {
           if ($Cada_cmp == "tag" && (!isset($this->NM_cmp_hidden['tag']) || $this->NM_cmp_hidden['tag'] != "off"))
           {
               $Format_Num = "#,##0";
               $Vl_Tot     = $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['tot_geral'][2];
               $prim_cmp = false;
               if (!NM_is_utf8($Vl_Tot)) {
                   $Vl_Tot = sc_convert_encoding($Vl_Tot, "UTF-8", $_SESSION['scriptcase']['charset']);
               }
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida']) {
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $Vl_Tot;
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "right";
                   if (is_numeric($Vl_Tot)) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "num";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = $Format_Num;
                   }
                   else {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                   }
                   $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
               }
               else {
                   $current_cell_ref = $this->calc_cell($this->Xls_col);
                   if ($this->Use_phpspreadsheet) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                   }
                   else {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
                   }
                   if (is_numeric($Vl_Tot)) {
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getNumberFormat()->setFormatCode($Format_Num);
                   }
                   $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $Vl_Tot);
                   $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
               }
               $this->Xls_col++;
           }
           elseif (!isset($this->NM_cmp_hidden[$Cada_cmp]) || $this->NM_cmp_hidden[$Cada_cmp] != "off")
           {
               if ($prim_cmp)
               {
                   $mens_tot = html_entity_decode($mens_tot, ENT_COMPAT, $_SESSION['scriptcase']['charset']);
                   $mens_tot = strip_tags($mens_tot);
                   if (!NM_is_utf8($mens_tot)) {
                       $mens_tot = sc_convert_encoding($mens_tot, "UTF-8", $_SESSION['scriptcase']['charset']);
                   }
                   if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = $mens_tot;
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['bold']   = "";
                   }
                   else {
                       $current_cell_ref = $this->calc_cell($this->Xls_col);
                       if ($this->Use_phpspreadsheet) {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                       }
                       else {
                           $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                       }
                       $this->Nm_ActiveSheet->setCellValue($current_cell_ref . $this->Xls_row, $mens_tot);
                       $this->Nm_ActiveSheet->getStyle($current_cell_ref . $this->Xls_row)->getFont()->setBold(true);
                   }
               }
               elseif ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida']) {
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
                       $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
               }
               $this->Xls_col++;
               $prim_cmp = false;
           }
       }
       if ($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['embutida']) {
           $this->Xls_row++;
           $this->Xls_col = 1;
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['data']   = "";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['align']  = "left";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['type']   = "char";
           $this->arr_export['lines'][$this->Xls_row][$this->Xls_col]['format'] = "";
       }
   }

   function calc_cell($col)
   {
       $arr_alfa = array("","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
       $val_ret = "";
       $result = $col + 1;
       while ($result > 26)
       {
           $cel      = $result % 26;
           $result   = $result / 26;
           if ($cel == 0)
           {
               $cel    = 26;
               $result--;
           }
           $val_ret = $arr_alfa[$cel] . $val_ret;
       }
       $val_ret = $arr_alfa[$result] . $val_ret;
       return $val_ret;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_file']);
      if (is_file($this->Xls_f))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_file'] = $this->Xls_f;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Detail Keseluruhan Kasir :: Excel</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XLS</td>
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
<form name="Fdown" method="get" action="rekapKeseluruhan_master_ri_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="rekapKeseluruhan_master_ri"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['rekapKeseluruhan_master_ri']['xls_return']); ?>"> 
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
