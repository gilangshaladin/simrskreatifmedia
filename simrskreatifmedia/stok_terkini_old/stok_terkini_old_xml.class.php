<?php

class stok_terkini_old_xml
{
   var $Db;
   var $Erro;
   var $Ini;
   var $Lookup;
   var $nm_data;

   var $Arquivo;
   var $Arquivo_view;
   var $Tit_doc;
   var $sc_proc_grid; 
   var $NM_cmp_hidden = array();
   var $count_ger;

   //---- 
   function __construct()
   {
      $this->nm_data   = new nm_data("id");
   }

   //---- 
   function monta_xml()
   {
      $this->inicializa_vars();
      $this->grava_arquivo();
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida'])
      {
          if ($this->Ini->sc_export_ajax)
          {
              $this->Arr_result['file_export']  = NM_charset_to_utf8($this->Xml_f);
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
      else
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['opcao'] = "";
      }
   }

   //----- 
   function inicializa_vars()
   {
      global $nm_lang;
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->New_Format  = true;
      $this->Xml_tag_label = true;
      $this->Tem_xml_res = false;
      $this->Xml_password = "";
      if (isset($_REQUEST['nm_xml_tag']) && !empty($_REQUEST['nm_xml_tag']))
      {
          $this->New_Format = ($_REQUEST['nm_xml_tag'] == "tag") ? true : false;
      }
      if (isset($_REQUEST['nm_xml_label']) && !empty($_REQUEST['nm_xml_label']))
      {
          $this->Xml_tag_label = ($_REQUEST['nm_xml_label'] == "S") ? true : false;
      }
      $this->Tem_xml_res  = true;
      if (isset($_REQUEST['SC_module_export']) && $_REQUEST['SC_module_export'] != "")
      { 
          $this->Tem_xml_res = (strpos(" " . $_REQUEST['SC_module_export'], "resume") !== false) ? true : false;
      } 
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['SC_Ind_Groupby'] == "sc_free_total")
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['SC_Ind_Groupby'] == "sc_free_group_by" && empty($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['SC_Gb_Free_cmp']))
      {
          $this->Tem_xml_res  = false;
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_label']))
      {
          $this->Xml_tag_label = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_label'];
          $this->New_Format    = true;
      }
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      require_once($this->Ini->path_aplicacao . "stok_terkini_old_total.class.php"); 
      $this->Tot      = new stok_terkini_old_total($this->Ini->sc_page);
      $this->prep_modulos("Tot");
      $Gb_geral = "quebra_geral_" . $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['SC_Ind_Groupby'];
      if (method_exists($this->Tot,$Gb_geral))
      {
          $this->Tot->$Gb_geral();
          $this->count_ger = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['tot_geral'][1];
      }
      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida'] && !$this->Ini->sc_export_ajax) {
          require_once($this->Ini->path_lib_php . "/sc_progress_bar.php");
          $this->pb = new scProgressBar();
          $this->pb->setRoot($this->Ini->root);
          $this->pb->setDir($_SESSION['scriptcase']['stok_terkini_old']['glo_nm_path_imag_temp'] . "/");
          $this->pb->setProgressbarMd5($_GET['pbmd5']);
          $this->pb->initialize();
          $this->pb->setReturnUrl("./");
          $this->pb->setReturnOption($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_return']);
          if ($this->Tem_xml_res) {
              $PB_plus = intval ($this->count_ger * 0.04);
              $PB_plus = ($PB_plus < 2) ? 2 : $PB_plus;
          }
          else {
              $PB_plus = intval ($this->count_ger * 0.02);
              $PB_plus = ($PB_plus < 1) ? 1 : $PB_plus;
          }
          $PB_tot = $this->count_ger + $PB_plus;
          $this->PB_dif = $PB_tot - $this->count_ger;
          $this->pb->setTotalSteps($PB_tot);
      }
      $this->nm_data    = new nm_data("id");
      $this->Arquivo      = "sc_xml";
      $this->Arquivo     .= "_" . date("YmdHis") . "_" . rand(0, 1000);
      $this->Arq_zip      = $this->Arquivo . "_stok_terkini_old.zip";
      $this->Arquivo     .= "_stok_terkini_old";
      $this->Arquivo_view = $this->Arquivo . "_view.xml";
      $this->Arquivo     .= ".xml";
      $this->Tit_doc      = "stok_terkini_old.xml";
      $this->Tit_zip      = "stok_terkini_old.zip";
      $this->Grava_view   = false;
      if (strtolower($_SESSION['scriptcase']['charset']) != strtolower($_SESSION['scriptcase']['charset_html']))
      {
          $this->Grava_view = true;
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
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_name']))
      {
          $this->Arquivo = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_name'];
          $this->Arq_zip = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_name'];
          $this->Tit_doc = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_name'];
          $Pos = strrpos($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_name'], ".");
          if ($Pos !== false) {
              $this->Arq_zip = substr($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_name'], 0, $Pos);
          }
          $this->Arq_zip .= ".zip";
          $this->Tit_zip  = $this->Arq_zip;
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_name']);
      }
      if (!$this->Grava_view)
      {
          $this->Arquivo_view = $this->Arquivo;
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['stok_terkini_old']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['stok_terkini_old']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['stok_terkini_old']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['usr_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['usr_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['usr_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['php_cmp_sel']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['php_cmp_sel']))
      {
          foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['php_cmp_sel'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->NM_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
          }
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['where_pesq_filtro'];
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['campos_busca']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['campos_busca']))
      { 
          $Busca_temp = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['campos_busca'];
          if ($_SESSION['scriptcase']['charset'] != "UTF-8")
          {
              $Busca_temp = NM_conv_charset($Busca_temp, $_SESSION['scriptcase']['charset'], "UTF-8");
          }
          $this->namaitem = $Busca_temp['namaitem']; 
          $tmp_pos = strpos($this->namaitem, "##@@");
          if ($tmp_pos !== false && !is_array($this->namaitem))
          {
              $this->namaitem = substr($this->namaitem, 0, $tmp_pos);
          }
          $this->hargajual = $Busca_temp['hargajual']; 
          $tmp_pos = strpos($this->hargajual, "##@@");
          if ($tmp_pos !== false && !is_array($this->hargajual))
          {
              $this->hargajual = substr($this->hargajual, 0, $tmp_pos);
          }
          $this->sc_field_0 = $Busca_temp['sc_field_0']; 
          $tmp_pos = strpos($this->sc_field_0, "##@@");
          if ($tmp_pos !== false && !is_array($this->sc_field_0))
          {
              $this->sc_field_0 = substr($this->sc_field_0, 0, $tmp_pos);
          }
      } 
      $this->arr_export = array('label' => array(), 'lines' => array());
      $this->arr_span   = array();

      if (!$_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida'])
      { 
          $xml_charset = $_SESSION['scriptcase']['charset'];
          $this->Xml_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
          $this->Zip_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arq_zip;
          $xml_f = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo, "w");
          fwrite($xml_f, "<?xml version=\"1.0\" encoding=\"$xml_charset\" ?>\r\n");
          fwrite($xml_f, "<root>\r\n");
          if ($this->Grava_view)
          {
              $xml_charset_v = $_SESSION['scriptcase']['charset_html'];
              $xml_v         = fopen($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view, "w");
              fwrite($xml_v, "<?xml version=\"1.0\" encoding=\"$xml_charset_v\" ?>\r\n");
              fwrite($xml_v, "<root>\r\n");
          }
      }
      $this->nm_field_dinamico = array();
      $this->nm_order_dinamico = array();
      $nmgp_select_count = "SELECT count(*) AS countTest from (SELECT 	b.namaItem, 	b.hargaJual, 	sum( x.masuk - x.jumlah )  FROM 	( 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhpigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbdetailresepokvk  	GROUP BY 		item UNION ALL 	SELECT 		itemcode AS item, 		jumlah, 		0 AS masuk  	FROM 		tbitemdrugsell  	GROUP BY 		itemcode UNION ALL 	SELECT 		kodeItem AS item, 		0 AS jumlah, 		sum( currentStock ) AS masuk  	FROM 		tbstockobat  	GROUP BY 		kodeItem  	) x 	LEFT JOIN tbobat b ON b.kodeItem = x.item  GROUP BY 	x.item  ORDER BY 	sum( x.masuk - x.jumlah ) DESC) nm_sel_esp"; 
      if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
      { 
          $nmgp_select = "SELECT namaItem, hargaJual, `sum( x.masuk - x.jumlah )` as sc_field_0 from (SELECT 	b.namaItem, 	b.hargaJual, 	sum( x.masuk - x.jumlah )  FROM 	( 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhpigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbdetailresepokvk  	GROUP BY 		item UNION ALL 	SELECT 		itemcode AS item, 		jumlah, 		0 AS masuk  	FROM 		tbitemdrugsell  	GROUP BY 		itemcode UNION ALL 	SELECT 		kodeItem AS item, 		0 AS jumlah, 		sum( currentStock ) AS masuk  	FROM 		tbstockobat  	GROUP BY 		kodeItem  	) x 	LEFT JOIN tbobat b ON b.kodeItem = x.item  GROUP BY 	x.item  ORDER BY 	sum( x.masuk - x.jumlah ) DESC) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
      { 
          $nmgp_select = "SELECT namaItem, hargaJual, `sum( x.masuk - x.jumlah )` as sc_field_0 from (SELECT 	b.namaItem, 	b.hargaJual, 	sum( x.masuk - x.jumlah )  FROM 	( 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhpigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbdetailresepokvk  	GROUP BY 		item UNION ALL 	SELECT 		itemcode AS item, 		jumlah, 		0 AS masuk  	FROM 		tbitemdrugsell  	GROUP BY 		itemcode UNION ALL 	SELECT 		kodeItem AS item, 		0 AS jumlah, 		sum( currentStock ) AS masuk  	FROM 		tbstockobat  	GROUP BY 		kodeItem  	) x 	LEFT JOIN tbobat b ON b.kodeItem = x.item  GROUP BY 	x.item  ORDER BY 	sum( x.masuk - x.jumlah ) DESC) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
      { 
          $nmgp_select = "SELECT namaItem, hargaJual, `sum( x.masuk - x.jumlah )` as sc_field_0 from (SELECT 	b.namaItem, 	b.hargaJual, 	sum( x.masuk - x.jumlah )  FROM 	( 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhpigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbdetailresepokvk  	GROUP BY 		item UNION ALL 	SELECT 		itemcode AS item, 		jumlah, 		0 AS masuk  	FROM 		tbitemdrugsell  	GROUP BY 		itemcode UNION ALL 	SELECT 		kodeItem AS item, 		0 AS jumlah, 		sum( currentStock ) AS masuk  	FROM 		tbstockobat  	GROUP BY 		kodeItem  	) x 	LEFT JOIN tbobat b ON b.kodeItem = x.item  GROUP BY 	x.item  ORDER BY 	sum( x.masuk - x.jumlah ) DESC) nm_sel_esp"; 
      } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
      { 
          $nmgp_select = "SELECT namaItem, hargaJual, `sum( x.masuk - x.jumlah )` as sc_field_0 from (SELECT 	b.namaItem, 	b.hargaJual, 	sum( x.masuk - x.jumlah )  FROM 	( 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhpigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbdetailresepokvk  	GROUP BY 		item UNION ALL 	SELECT 		itemcode AS item, 		jumlah, 		0 AS masuk  	FROM 		tbitemdrugsell  	GROUP BY 		itemcode UNION ALL 	SELECT 		kodeItem AS item, 		0 AS jumlah, 		sum( currentStock ) AS masuk  	FROM 		tbstockobat  	GROUP BY 		kodeItem  	) x 	LEFT JOIN tbobat b ON b.kodeItem = x.item  GROUP BY 	x.item  ORDER BY 	sum( x.masuk - x.jumlah ) DESC) nm_sel_esp"; 
       } 
      elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
      { 
          $nmgp_select = "SELECT namaItem, hargaJual, `sum( x.masuk - x.jumlah )` as sc_field_0 from (SELECT 	b.namaItem, 	b.hargaJual, 	sum( x.masuk - x.jumlah )  FROM 	( 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhpigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbdetailresepokvk  	GROUP BY 		item UNION ALL 	SELECT 		itemcode AS item, 		jumlah, 		0 AS masuk  	FROM 		tbitemdrugsell  	GROUP BY 		itemcode UNION ALL 	SELECT 		kodeItem AS item, 		0 AS jumlah, 		sum( currentStock ) AS masuk  	FROM 		tbstockobat  	GROUP BY 		kodeItem  	) x 	LEFT JOIN tbobat b ON b.kodeItem = x.item  GROUP BY 	x.item  ORDER BY 	sum( x.masuk - x.jumlah ) DESC) nm_sel_esp"; 
       } 
      else 
      { 
          $nmgp_select = "SELECT namaItem, hargaJual, `sum( x.masuk - x.jumlah )` as sc_field_0 from (SELECT 	b.namaItem, 	b.hargaJual, 	sum( x.masuk - x.jumlah )  FROM 	( 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbreseprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatjalan  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhpigd  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbbhprawatinap  	GROUP BY 		item UNION ALL 	SELECT 		item, 		jumlah, 		0 AS masuk  	FROM 		tbdetailresepokvk  	GROUP BY 		item UNION ALL 	SELECT 		itemcode AS item, 		jumlah, 		0 AS masuk  	FROM 		tbitemdrugsell  	GROUP BY 		itemcode UNION ALL 	SELECT 		kodeItem AS item, 		0 AS jumlah, 		sum( currentStock ) AS masuk  	FROM 		tbstockobat  	GROUP BY 		kodeItem  	) x 	LEFT JOIN tbobat b ON b.kodeItem = x.item  GROUP BY 	x.item  ORDER BY 	sum( x.masuk - x.jumlah ) DESC) nm_sel_esp"; 
      } 
      $nmgp_select .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['where_pesq'];
      $nmgp_select_count .= " " . $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['where_pesq'];
      $nmgp_order_by = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['order_grid'];
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
      $this->xml_registro = "";
      $PB_tot = (isset($this->count_ger) && $this->count_ger > 0) ? "/" . $this->count_ger : "";
      while (!$rs->EOF)
      {
         $this->SC_seq_register++;
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida'] && !$this->Ini->sc_export_ajax) {
             $Mens_bar = $this->Ini->Nm_lang['lang_othr_prcs'];
             if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                 $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
             }
             $this->pb->setProgressbarMessage($Mens_bar . ": " . $this->SC_seq_register . $PB_tot);
             $this->pb->addSteps(1);
         }
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida'])
         { 
             $this->xml_registro .= "<" . $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro = "<stok_terkini_old>\r\n";
         }
         else
         {
             $this->xml_registro = "<stok_terkini_old";
         }
         $this->namaitem = $rs->fields[0] ;  
         $this->hargajual = $rs->fields[1] ;  
         $this->hargajual =  str_replace(",", ".", $this->hargajual);
         $this->hargajual = (string)$this->hargajual;
         $this->sc_field_0 = $rs->fields[2] ;  
         $this->sc_field_0 = (strpos(strtolower($this->sc_field_0), "e")) ? (float)$this->sc_field_0 : $this->sc_field_0; 
         $this->sc_field_0 = (string)$this->sc_field_0;
         $this->sc_proc_grid = true; 
         foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['field_order'] as $Cada_col)
         { 
            if (!isset($this->NM_cmp_hidden[$Cada_col]) || $this->NM_cmp_hidden[$Cada_col] != "off")
            { 
                $NM_func_exp = "NM_export_" . $Cada_col;
                $this->$NM_func_exp();
            } 
         } 
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida'])
         { 
             $this->xml_registro .= "</" . $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida_tit'] . ">\r\n";
         }
         elseif ($this->New_Format)
         {
             $this->xml_registro .= "</stok_terkini_old>\r\n";
         }
         else
         {
             $this->xml_registro .= " />\r\n";
         }
         if (!$_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida'])
         { 
             fwrite($xml_f, $this->xml_registro);
             if ($this->Grava_view)
             {
                fwrite($xml_v, $this->xml_registro);
             }
         }
         $rs->MoveNext();
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['embutida'])
      { 
          if (!$this->New_Format)
          {
              $this->xml_registro = "";
          }
          $_SESSION['scriptcase']['export_return'] = $this->xml_registro;
      }
      else
      { 
          fwrite($xml_f, "</root>");
          fclose($xml_f);
          if ($this->Grava_view)
          {
             fwrite($xml_v, "</root>");
             fclose($xml_v);
          }
          if ($this->Tem_xml_res)
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
              require_once($this->Ini->path_aplicacao . "stok_terkini_old_res_xml.class.php");
              $this->Res = new stok_terkini_old_res_xml();
              $this->prep_modulos("Res");
              $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_res_grid'] = true;
              $this->Res->monta_xml();
          } 
          if (!$this->Ini->sc_export_ajax) {
              $Mens_bar = $this->Ini->Nm_lang['lang_btns_export_finished'];
              if ($_SESSION['scriptcase']['charset'] != "UTF-8") {
                  $Mens_bar = sc_convert_encoding($Mens_bar, "UTF-8", $_SESSION['scriptcase']['charset']);
              }
              $this->pb->setProgressbarMessage($Mens_bar);
              $this->pb->addSteps($this->PB_dif);
          }
          if ($this->Xml_password != "" || $this->Tem_xml_res)
          { 
              $str_zip    = "";
              $Parm_pass  = ($this->Xml_password != "") ? " -p" : "";
              $Zip_f      = (FALSE !== strpos($this->Zip_f, ' ')) ? " \"" . $this->Zip_f . "\"" :  $this->Zip_f;
              $Arq_input  = (FALSE !== strpos($this->Xml_f, ' ')) ? " \"" . $this->Xml_f . "\"" :  $this->Xml_f;
              if (is_file($Zip_f)) {
                  unlink($Zip_f);
              }
              if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
              {
                  chdir($this->Ini->path_third . "/zip/windows");
                  $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
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
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
              }
              elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
              {
                  chdir($this->Ini->path_third . "/zip/mac/bin");
                  $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
              $this->Xml_f   = $this->Zip_f;
              $this->Tit_doc = $this->Tit_zip;
              if ($this->Tem_xml_res)
              { 
                  $str_zip   = "";
                  $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_res_file']['xml'];
                  $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
                  unlink($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_res_file']['xml']);
              }
              if ($this->Grava_view)
              {
                  $str_zip    = "";
                  $xml_view_f = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo_view;
                  $zip_view_f = str_replace(".zip", "_view.zip", $this->Zip_f);
                  $zip_arq_v  = str_replace(".zip", "_view.zip", $this->Arq_zip);
                  $Zip_f      = (FALSE !== strpos($zip_view_f, ' ')) ? " \"" . $zip_view_f . "\"" :  $zip_view_f;
                  $Arq_input  = (FALSE !== strpos($xml_view_ff, ' ')) ? " \"" . $xml_view_f . "\"" :  $xml_view_f;
                  if (is_file($Zip_f)) {
                      unlink($Zip_f);
                  }
                  if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                  {
                      chdir($this->Ini->path_third . "/zip/windows");
                      $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
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
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                  }
                  elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                  {
                      chdir($this->Ini->path_third . "/zip/mac/bin");
                      $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
                  unlink($Arq_input);
                  $this->Arquivo_view = $zip_arq_v;
                  if ($this->Tem_xml_res)
                  { 
                      $str_zip   = "";
                      $Arq_res   = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_res_file']['view'];
                      $Arq_input = (FALSE !== strpos($Arq_res, ' ')) ? " \"" . $Arq_res . "\"" :  $Arq_res;
                      if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
                      {
                          $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $this->Xml_password . " " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
                      }
                      elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
                      {
                          $str_zip = "./7za " . $Parm_pass . $this->Xml_password . " a " . $Zip_f . " " . $Arq_input;
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
                      unlink($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_res_file']['view']);
                  }
              } 
              else 
              {
                  $this->Arquivo_view = $this->Arq_zip;
              } 
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_res_grid']);
          } 
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['export_sel_columns']['field_order']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['field_order'] = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['export_sel_columns']['field_order'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['export_sel_columns']['field_order']);
      }
      if(isset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['export_sel_columns']['usr_cmp_sel']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['usr_cmp_sel'] = $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['export_sel_columns']['usr_cmp_sel'];
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['export_sel_columns']['usr_cmp_sel']);
      }
      $rs->Close();
   }
   //----- namaitem
   function NM_export_namaitem()
   {
         if ($_SESSION['scriptcase']['charset'] == "UTF-8" && !NM_is_utf8($this->namaitem))
         {
             $this->namaitem = sc_convert_encoding($this->namaitem, "UTF-8", $_SESSION['scriptcase']['charset']);
         }
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['namaitem'])) ? $this->New_label['namaitem'] : "Nama Item"; 
          }
          else
          {
              $SC_Label = "namaitem"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->namaitem) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->namaitem) . "\"";
         }
   }
   //----- hargajual
   function NM_export_hargajual()
   {
             nmgp_Form_Num_Val($this->hargajual, ".", ",", "0", "S", "2", "Rp", "V:3:12", "-"); 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['hargajual'])) ? $this->New_label['hargajual'] : "Harga Jual (28%)"; 
          }
          else
          {
              $SC_Label = "hargajual"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->hargajual) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->hargajual) . "\"";
         }
   }
   //----- sc_field_0
   function NM_export_sc_field_0()
   {
             nmgp_Form_Num_Val($this->sc_field_0, $_SESSION['scriptcase']['reg_conf']['grup_num'], $_SESSION['scriptcase']['reg_conf']['dec_num'], "0", "S", "2", "", "N:" . $_SESSION['scriptcase']['reg_conf']['neg_num'] , $_SESSION['scriptcase']['reg_conf']['simb_neg'], $_SESSION['scriptcase']['reg_conf']['num_group_digit']) ; 
          if ($this->Xml_tag_label)
          {
              $SC_Label = (isset($this->New_label['sc_field_0'])) ? $this->New_label['sc_field_0'] : "Stok Akhir"; 
          }
          else
          {
              $SC_Label = "sc_field_0"; 
          }
          $this->clear_tag($SC_Label); 
         if ($this->New_Format)
         {
             $this->xml_registro .= " <" . $SC_Label . ">" . $this->trata_dados($this->sc_field_0) . "</" . $SC_Label . ">\r\n";
         }
         else
         {
             $this->xml_registro .= " " . $SC_Label . " =\"" . $this->trata_dados($this->sc_field_0) . "\"";
         }
   }

   //----- 
   function trata_dados($conteudo)
   {
      $str_temp =  $conteudo;
      $str_temp =  str_replace("<br />", "",  $str_temp);
      $str_temp =  str_replace("&", "&amp;",  $str_temp);
      $str_temp =  str_replace("<", "&lt;",   $str_temp);
      $str_temp =  str_replace(">", "&gt;",   $str_temp);
      $str_temp =  str_replace("'", "&apos;", $str_temp);
      $str_temp =  str_replace('"', "&quot;",  $str_temp);
      $str_temp =  str_replace('(', "_",  $str_temp);
      $str_temp =  str_replace(')', "",  $str_temp);
      return ($str_temp);
   }

   function clear_tag(&$conteudo)
   {
      $out = (is_numeric(substr($conteudo, 0, 1)) || substr($conteudo, 0, 1) == "") ? "_" : "";
      $str_temp = "abcdefghijklmnopqrstuwxyz0123456789";
      for ($i = 0; $i < strlen($conteudo); $i++)
      {
          $char = substr($conteudo, $i, 1);
          $ok = false;
          for ($z = 0; $z < strlen($str_temp); $z++)
          {
              if (strtolower($char) == substr($str_temp, $z, 1))
              {
                  $ok = true;
                  break;
              }
          }
          $out .= ($ok) ? $char : "_";
      }
      $conteudo = $out;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old'][$path_doc_md5][1] = $this->Tit_doc;
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
      unset($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_file']);
      if (is_file($this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_file'] = $this->Ini->root . $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      }
      $path_doc_md5 = md5($this->Ini->path_imag_temp . "/" . $this->Arquivo);
      $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old'][$path_doc_md5][0] = $this->Ini->path_imag_temp . "/" . $this->Arquivo;
      $_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old'][$path_doc_md5][1] = $this->Tit_doc;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE>Stok Terkini Farmasi :: XML</TITLE>
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
   <td class="scExportTitle" style="height: 25px">XML</td>
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
<form name="Fview" method="get" action="<?php echo $this->Ini->path_imag_temp . "/" . $this->Arquivo_view ?>" target="_blank" style="display: none"> 
</form>
<form name="Fdown" method="get" action="stok_terkini_old_download.php" target="_blank" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="stok_terkini_old"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<FORM name="F0" method=post action="./" style="display: none"> 
<INPUT type="hidden" name="script_case_init" value="<?php echo NM_encode_input($this->Ini->sc_page); ?>"> 
<INPUT type="hidden" name="script_case_session" value="<?php echo NM_encode_input(session_id()); ?>"> 
<INPUT type="hidden" name="nmgp_opcao" value="<?php echo NM_encode_input($_SESSION['sc_session'][$this->Ini->sc_page]['stok_terkini_old']['xml_return']); ?>"> 
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
