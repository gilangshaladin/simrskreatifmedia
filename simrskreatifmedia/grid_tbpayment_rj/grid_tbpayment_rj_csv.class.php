<?php

class grid_tbpayment_rj_csv
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Tit_doc;
   var $Delim_dados;
   var $Delim_line;
   var $Delim_col;
   var $Csv_label;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $count_ger;

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("id");
   }

   //---- 
   function monta_csv()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if ($this->Ini->sc_export_ajax)
      {
          $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Csv_f);
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
      require_once($this->Ini->path_aplicacao . "grid_tbpayment_rj_total.class.php"); 
      $this->Tot      = new grid_tbpayment_rj_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['tot_geral'][1];
      }
      $this->Csv_password = "";
      $this->Arquivo   = "sc_csv";
      $this->Arquivo  .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip   = $this->Arquivo . "_grid_tbpayment_rj.zip";
      $this->Arquivo  .= "_grid_tbpayment_rj";
      $this->Arquivo  .= ".csv";
      $this->Tit_doc   = "grid_tbpayment_rj.csv";
      $this->Tit_zip   = "grid_tbpayment_rj.zip";
      $this->Label_CSV = "N";
      $this->Delim_dados = "\"";
      $this->Delim_col   = ";";
      $this->Delim_line  = "\r\n";
      $this->Tem_csv_res = false;
      if (isset($_REQUEST['nm_delim_line']) && !empty($_REQUEST['nm_delim_line']))
      {
          $this->Delim_line = str_replace(array(1,2,3), array("\r\n","\r","\n"), $_REQUEST['nm_delim_line']);
      }
      if (isset($_REQUEST['nm_delim_col']) && !empty($_REQUEST['nm_delim_col']))
      {
          $this->Delim_col = str_replace(array(1,2,3,4,5), array(";",",","\	","#",""), $_REQUEST['nm_delim_col']);
      }
      if (isset($_REQUEST['nm_delim_dados']) && !empty($_REQUEST['nm_delim_dados']))
      {
          $this->Delim_dados = str_replace(array(1,2,3,4), array('"',"'","","|"), $_REQUEST['nm_delim_dados']);
      }
      if (isset($_REQUEST['nm_label_csv']) && !empty($_REQUEST['nm_label_csv']))
      {
          $this->Label_CSV = $_REQUEST['nm_label_csv'];
      }
      if (!$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['grid_tbpayment_rj']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_return']);
          if ($this->Tem_csv_res) {
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
     global $nm_lang;
      global $nm_nada, $nm_lang;

      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $this->sc_proc_grid = false; 
      $nm_raiz_img  = ""; 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_name']);
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->id = $Busca_temp['id']; 
          $tmp_pos = strpos($this->id, "##@@");
          if ($tmp_pos !== false && !is_array($this->id))
          {
              $this->id = substr($this->id, 0, $tmp_pos);
          }
          $this->trancode = $Busca_temp['trancode']; 
          $tmp_pos = strpos($this->trancode, "##@@");
          if ($tmp_pos !== false && !is_array($this->trancode))
          {
              $this->trancode = substr($this->trancode, 0, $tmp_pos);
          }
          $this->nostruk = $Busca_temp['nostruk']; 
          $tmp_pos = strpos($this->nostruk, "##@@");
          if ($tmp_pos !== false && !is_array($this->nostruk))
          {
              $this->nostruk = substr($this->nostruk, 0, $tmp_pos);
          }
          $this->custcode = $Busca_temp['custcode']; 
          $tmp_pos = strpos($this->custcode, "##@@");
          if ($tmp_pos !== false && !is_array($this->custcode))
          {
              $this->custcode = substr($this->custcode, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      $this->Csv_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
      $csv_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
      if ($this->Label_CSV == "S")
      { 
          $this->NM_prim_col  = 0;
          $this->csv_registro = "";
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['field_order'] as $Cada_col)
          { 
              $SC_Label = (isset($this->New_label['id'])) ? $this->New_label['id'] : "ID"; 
              if ($Cada_col == "id" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['trancode'])) ? $this->New_label['trancode'] : "Tran Code"; 
              if ($Cada_col == "trancode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['nostruk'])) ? $this->New_label['nostruk'] : "No Struk"; 
              if ($Cada_col == "nostruk" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['custcode'])) ? $this->New_label['custcode'] : "Cust Code"; 
              if ($Cada_col == "custcode" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['dokter'])) ? $this->New_label['dokter'] : "Dokter"; 
              if ($Cada_col == "dokter" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['jmltagihan'])) ? $this->New_label['jmltagihan'] : "Jml Tagihan"; 
              if ($Cada_col == "jmltagihan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['jmlbayar'])) ? $this->New_label['jmlbayar'] : "Jml Bayar"; 
              if ($Cada_col == "jmlbayar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['deposit'])) ? $this->New_label['deposit'] : "Deposit"; 
              if ($Cada_col == "deposit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['potongan'])) ? $this->New_label['potongan'] : "Potongan"; 
              if ($Cada_col == "potongan" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['hrsdibayar'])) ? $this->New_label['hrsdibayar'] : "Hrs Dibayar"; 
              if ($Cada_col == "hrsdibayar" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['trandate'])) ? $this->New_label['trandate'] : "Tran Date"; 
              if ($Cada_col == "trandate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['terimadari'])) ? $this->New_label['terimadari'] : "Terima Dari"; 
              if ($Cada_col == "terimadari" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['jenispayment'])) ? $this->New_label['jenispayment'] : "Jenis Payment"; 
              if ($Cada_col == "jenispayment" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['instansipenjamin'])) ? $this->New_label['instansipenjamin'] : "Instansi Penjamin"; 
              if ($Cada_col == "instansipenjamin" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['bankdebit'])) ? $this->New_label['bankdebit'] : "Bank Debit"; 
              if ($Cada_col == "bankdebit" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['nokartu'])) ? $this->New_label['nokartu'] : "No Kartu"; 
              if ($Cada_col == "nokartu" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Jaminan / Polis"; 
              if ($Cada_col == "sc_field_0" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['lunas'])) ? $this->New_label['lunas'] : "Lunas"; 
              if ($Cada_col == "lunas" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['paiddate'])) ? $this->New_label['paiddate'] : "Paid Date"; 
              if ($Cada_col == "paiddate" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['nopayment'])) ? $this->New_label['nopayment'] : "No Payment"; 
              if ($Cada_col == "nopayment" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['deskripsi'])) ? $this->New_label['deskripsi'] : "deskripsi"; 
              if ($Cada_col == "deskripsi" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['subtotal'])) ? $this->New_label['subtotal'] : "subtotal"; 
              if ($Cada_col == "subtotal" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
              $SC_Label = (isset($this->New_label['terbilang'])) ? $this->New_label['terbilang'] : "terbilang"; 
              if ($Cada_col == "terbilang" && (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off"))
              {
                  $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
                  $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $SC_Label);
                  $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
                  $this->NM_prim_col++;
              }
          } 
          $this->csv_registro .= $this->Delim_line;
          fwrite($csv_f, $this->csv_registro);
      } 
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, str_replace (convert(char(10),tranDate,102), '.', '-') + ' ' + convert(char(8),tranDate,20), terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, str_replace (convert(char(10),paidDate,102), '.', '-') + ' ' + convert(char(8),paidDate,20), noPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, paidDate, noPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
       $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, convert(char(23),tranDate,121), terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, convert(char(23),paidDate,121), noPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, paidDate, noPayment from " . $this->Ini->nm_tabela; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, EXTEND(tranDate, YEAR TO FRACTION), terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, EXTEND(paidDate, YEAR TO FRACTION), noPayment from " . $this->Ini->nm_tabela; 
      } 
      else 
      { 
          $nmgp_select = "SELECT id, tranCode, noStruk, custCode, dokter, jmlTagihan, jmlBayar, deposit, potongan, hrsDibayar, tranDate, terimaDari, jenisPayment, instansiPenjamin, bankDebit, noKartu, `Jaminan/Polis` as sc_field_0, lunas, paidDate, noPayment from " . $this->Ini->nm_tabela; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['order_grid'];
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
         $this->csv_registro = "";
         $this->NM_prim_col  = 0;
         $this->id = $rs->fields[0] ;  
         $this->id = (string)$this->id;
         $this->trancode = $rs->fields[1] ;  
         $this->nostruk = $rs->fields[2] ;  
         $this->nostruk = (string)$this->nostruk;
         $this->custcode = $rs->fields[3] ;  
         $this->dokter = $rs->fields[4] ;  
         $this->jmltagihan = $rs->fields[5] ;  
         $this->jmltagihan = (string)$this->jmltagihan;
         $this->jmlbayar = $rs->fields[6] ;  
         $this->jmlbayar = (string)$this->jmlbayar;
         $this->deposit = $rs->fields[7] ;  
         $this->deposit = (string)$this->deposit;
         $this->potongan = $rs->fields[8] ;  
         $this->potongan = (string)$this->potongan;
         $this->hrsdibayar = $rs->fields[9] ;  
         $this->hrsdibayar = (string)$this->hrsdibayar;
         $this->trandate = $rs->fields[10] ;  
         $this->terimadari = $rs->fields[11] ;  
         $this->jenispayment = $rs->fields[12] ;  
         $this->instansipenjamin = $rs->fields[13] ;  
         $this->bankdebit = $rs->fields[14] ;  
         $this->nokartu = $rs->fields[15] ;  
         $this->sc_field_0 = $rs->fields[16] ;  
         $this->lunas = $rs->fields[17] ;  
         $this->paiddate = $rs->fields[18] ;  
         $this->nopayment = $rs->fields[19] ;  
         $this->sc_proc_grid = true; 
         $_SESSION['scriptcase']['grid_tbpayment_rj']['contr_erro'] = 'on';
  				$sSQL = "SELECT
						c.Nama,
						c.Jumlah,
						c.Biaya,
						c.Disc,
						c.Total
					FROM
						(
							SELECT
						  tranCode as Kode,
								tindakan AS Nama,
								(biaya * jumlah) - ((biaya * jumlah) * diskon / 100) AS Total
							FROM
								tbtindakanrawatjalan
							UNION ALL
								SELECT
							a.tranCode as Kode,
									b.namaItem AS Nama,
									(a.biaya * a.jumlah) - (
										(a.biaya * a.jumlah) * a.diskon / 100
									) AS Total
								FROM
									tbreseprawatjalan a
								LEFT JOIN tbobat b ON b.kodeItem = a.item
						) c
					WHERE
						c.Kode = '".$this->trancode ."'";

				 
      $nm_select = $sSQL; 
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

				if(!empty($this->rs )){
				
					foreach($this->rs  as $key => $value){
							$this->deskripsi  .= $value[0]."<br/>";
							$this->subtotal  .= "Rp. ".$value[1]."<br/>";
					}
				}else{
							$this->deskripsi  = '';
							$this->subtotal  = '';
				}
					
				


 
 


$nilai = $this->jmlbayar ;
        
        
$this->terbilang  = $this->terbilang($nilai, $style=3);
$_SESSION['scriptcase']['grid_tbpayment_rj']['contr_erro'] = 'off'; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         $this->csv_registro .= $this->Delim_line;
         fwrite($csv_f, $this->csv_registro);
         $rs->MoveNext();
      }
      fclose($csv_f);
      if ($this->Tem_csv_res)
      { 
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
          require_once($this->Ini->path_aplicacao . "grid_tbpayment_rj_res_csv.class.php");
          $this->Res = new grid_tbpayment_rj_res_csv();
          $this->prep_modulos("Res");
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_res_grid'] = true;
          $this->Res->monta_csv();
      } 
      if (!$this->Ini->sc_export_ajax) {
          $Mens_bar = $this->Ini->Nm_lang['lang_btns_export_finished'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
              $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
          }
          $this->pb->setProgressbarMessage($Mens_bar);
          $this->pb->addSteps($this->PB_dif);
      }
      if ($this->Csv_password != "" || $this->Tem_csv_res)
      { 
          $str_zip    = "";
          $Parm_pass  = ($this->Csv_password != "") ? " -p" : "";
          $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
          $Arq_input  = (FALSE !== strpos($this->Csv_f, ' ')) ? " \"" . $this->Csv_f . "\"" :  $this->Csv_f;
          if (is_file($Zip_f)) {
              unlink($Zip_f);
          }
          if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
          {
              chdir($this->Ini->path_third . "/zip/windows");
              $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Csv_password . " " . $Zip_f . " " . $Arq_input;
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
                $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
          }
          elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
          {
              chdir($this->Ini->path_third . "/zip/mac/bin");
              $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
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
          if ($this->Tem_csv_res)
          { 
              $str_zip    = "";
              $Arq_res    = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_res_file'];
              $Arq_input  = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Csv_password . " " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
              {
                  $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  $str_zip = "./7za " . $Parm_pass . $this->Csv_password . " a " . $Zip_f . " " . $Arq_input;
              }
              if (!empty($str_zip)) {
                  exec($str_zip);
              }
              // ----- ZIP log
              $fp = @fopen(trim(str_replace(array(".zip",'"'), array(".log",""), $Zip_f)), 'a');
              if ($fp)
              {
                  @fwrite($fp, $str_zip . "\r\n\r\n");
                  @fclose($fp);
              }
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_res_grid']);
              unlink($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_res_file']);
          }
          unlink($Arq_input);
          $this->Arquivo = $this->Arq_zip;
          $this->Csv_f   = $this->Zip_f;
          $this->Tit_doc = $this->Tit_zip;
      } 
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- id
   function NM_export_id()
   {
             nmgp_Form_Num_Val($this->id, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->id);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- trancode
   function NM_export_trancode()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->trancode);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- nostruk
   function NM_export_nostruk()
   {
             nmgp_Form_Num_Val($this->nostruk, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->nostruk);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- custcode
   function NM_export_custcode()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->custcode);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- dokter
   function NM_export_dokter()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->dokter);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- jmltagihan
   function NM_export_jmltagihan()
   {
             nmgp_Form_Num_Val($this->jmltagihan, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->jmltagihan);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- jmlbayar
   function NM_export_jmlbayar()
   {
             nmgp_Form_Num_Val($this->jmlbayar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->jmlbayar);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- deposit
   function NM_export_deposit()
   {
             nmgp_Form_Num_Val($this->deposit, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->deposit);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- potongan
   function NM_export_potongan()
   {
             nmgp_Form_Num_Val($this->potongan, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->potongan);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- hrsdibayar
   function NM_export_hrsdibayar()
   {
             nmgp_Form_Num_Val($this->hrsdibayar, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->hrsdibayar);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- trandate
   function NM_export_trandate()
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
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->trandate);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- terimadari
   function NM_export_terimadari()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->terimadari);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- jenispayment
   function NM_export_jenispayment()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->jenispayment);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- instansipenjamin
   function NM_export_instansipenjamin()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->instansipenjamin);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- bankdebit
   function NM_export_bankdebit()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->bankdebit);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- nokartu
   function NM_export_nokartu()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->nokartu);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->sc_field_0);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- lunas
   function NM_export_lunas()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->lunas);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- paiddate
   function NM_export_paiddate()
   {
             if (substr($this->paiddate, 10, 1) == "-") 
             { 
                 $this->paiddate = substr($this->paiddate, 0, 10) . " " . substr($this->paiddate, 11);
             } 
             if (substr($this->paiddate, 13, 1) == ".") 
             { 
                $this->paiddate = substr($this->paiddate, 0, 13) . ":" . substr($this->paiddate, 14, 2) . ":" . substr($this->paiddate, 17);
             } 
             $conteudo_x =  $this->paiddate;
             nm_conv_limpa_dado($conteudo_x, "YYYY-MM-DD HH:II:SS");
             if (is_numeric($conteudo_x) && strlen($conteudo_x) > 0) 
             { 
                 $this->nm_data->SetaData($this->paiddate, "YYYY-MM-DD HH:II:SS  ");
                 $this->paiddate = $this->nm_data->FormataSaida($this->nm_data->FormatRegion("DH", "ddmmaaaa;hhiiss"));
             } 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->paiddate);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- nopayment
   function NM_export_nopayment()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->nopayment);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- deskripsi
   function NM_export_deskripsi()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->deskripsi);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- subtotal
   function NM_export_subtotal()
   {
             nmgp_Form_Num_Val($this->subtotal, ".", ",", "2", "S", "1", "Rp", "V:3:3", "-"); 
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->subtotal);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
   }
   //----- terbilang
   function NM_export_terbilang()
   {
      $col_sep = ($this->NM_prim_col > 0) ? $this->Delim_col : "";
      $conteudo = str_replace($this->Delim_dados, $this->Delim_dados . $this->Delim_dados, $this->terbilang);
      $this->csv_registro .= $col_sep . $this->Delim_dados . $conteudo . $this->Delim_dados;
      $this->NM_prim_col++;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo $this->Ini->Nm_lang['lang_othr_grid_title'] ?> tbpayment :: CSV</TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT">
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?>" GMT">
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0">
 <META http-equiv="Pragma" content="no-cache">
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php
if ($_SESSION['scriptcase']['proc_mobile'])
{
?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}
?>
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
   <td class="scExportTitle" style="height: 25px">CSV</td>
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
<form name="Fdown" method="get" action="grid_tbpayment_rj_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="grid_tbpayment_rj"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['grid_tbpayment_rj']['csv_return']); ?>"> 
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
function kekata($x) {
$_SESSION['scriptcase']['grid_tbpayment_rj']['contr_erro'] = 'on';
  
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = $this->kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = $this->kekata($x/10)." puluh". $this->kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . $this->kekata($x - 100);
    } else if ($x <1000) {
        $temp = $this->kekata($x/100) . " ratus" . $this->kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . $this->kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = $this->kekata($x/1000) . " ribu" . $this->kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = $this->kekata($x/1000000) . " juta" . $this->kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = $this->kekata($x/1000000000) . " milyar" . $this->kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = $this->kekata($x/1000000000000) . " trilyun" . $this->kekata(fmod($x,1000000000000));
    }     
        return $temp;

$_SESSION['scriptcase']['grid_tbpayment_rj']['contr_erro'] = 'off';
}
function terbilang($x, $style=4) {
$_SESSION['scriptcase']['grid_tbpayment_rj']['contr_erro'] = 'on';
  
    if($x<0) {
        $hasil = "minus ". trim($this->kekata($x));
    } else {
        $hasil = trim($this->kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;

$_SESSION['scriptcase']['grid_tbpayment_rj']['contr_erro'] = 'off';
}
}

?>