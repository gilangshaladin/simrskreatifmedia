<?php
//
class form_tbcustomer_apl
{
   var $has_where_params = false;
   var $NM_is_redirected = false;
   var $NM_non_ajax_info = false;
   var $formatado = false;
   var $NM_ajax_flag    = false;
   var $NM_ajax_opcao   = '';
   var $NM_ajax_retorno = '';
   var $NM_ajax_info    = array('result'            => '',
                                'param'             => array(),
                                'autoComp'          => '',
                                'rsSize'            => '',
                                'msgDisplay'        => '',
                                'errList'           => array(),
                                'fldList'           => array(),
                                'varList'           => array(),
                                'focus'             => '',
                                'navStatus'         => array(),
                                'navSummary'        => array(),
                                'redir'             => array(),
                                'blockDisplay'      => array(),
                                'fieldDisplay'      => array(),
                                'fieldLabel'        => array(),
                                'readOnly'          => array(),
                                'btnVars'           => array(),
                                'ajaxAlert'         => array(),
                                'ajaxMessage'       => array(),
                                'ajaxJavascript'    => array(),
                                'buttonDisplay'     => array(),
                                'buttonDisplayVert' => array(),
                                'calendarReload'    => false,
                                'quickSearchRes'    => false,
                                'displayMsg'        => false,
                                'displayMsgTxt'     => '',
                                'dyn_search'        => array(),
                                'empty_filter'      => '',
                                'event_field'       => '',
                                'fieldsWithErrors'  => array(),
                               );
   var $NM_ajax_force_values = false;
   var $Nav_permite_ava     = true;
   var $Nav_permite_ret     = true;
   var $Apl_com_erro        = false;
   var $app_is_initializing = false;
   var $Ini;
   var $Erro;
   var $Db;
   var $id;
   var $custcode;
   var $name;
   var $salut;
   var $salut_1;
   var $address;
   var $city;
   var $city_1;
   var $postcode;
   var $birthdate;
   var $birthdate_dia;
   var $birthdate_mes;
   var $birthdate_ano;
   var $phone;
   var $hp;
   var $spouse;
   var $sex;
   var $sex_1;
   var $type;
   var $type_1;
   var $typename;
   var $typename_1;
   var $hta;
   var $hta_hora;
   var $lasthta;
   var $lasthta_hora;
   var $bbtb;
   var $partus;
   var $partus_hora;
   var $deleted;
   var $hamil;
   var $email;
   var $blood;
   var $blood_1;
   var $location;
   var $mother;
   var $father;
   var $job;
   var $job_1;
   var $education;
   var $education_1;
   var $religion;
   var $religion_1;
   var $birthplace;
   var $kelurahan;
   var $kelurahan_1;
   var $kecamatan;
   var $kecamatan_1;
   var $rt;
   var $rw;
   var $member;
   var $idno;
   var $jenis;
   var $expdate;
   var $photoname;
   var $isdead;
   var $isdead_1;
   var $tlc;
   var $bu;
   var $lastupdated;
   var $nip;
   var $instno;
   var $kelompokcode;
   var $kelompok;
   var $penanggung;
   var $registerdate;
   var $cardno;
   var $statusbl;
   var $nm_data;
   var $nmgp_opcao;
   var $nmgp_opc_ant;
   var $sc_evento;
   var $nmgp_clone;
   var $nmgp_return_img = array();
   var $nmgp_dados_form = array();
   var $nmgp_dados_select = array();
   var $nm_location;
   var $nm_flag_iframe;
   var $nm_flag_saida_novo;
   var $nmgp_botoes = array();
   var $nmgp_url_saida;
   var $nmgp_form_show;
   var $nmgp_form_empty;
   var $nmgp_cmp_readonly = array();
   var $nmgp_cmp_hidden = array();
   var $form_paginacao = 'parcial';
   var $lig_edit_lookup      = false;
   var $lig_edit_lookup_call = false;
   var $lig_edit_lookup_cb   = '';
   var $lig_edit_lookup_row  = '';
   var $is_calendar_app = false;
   var $Embutida_call  = false;
   var $Embutida_ronly = false;
   var $Embutida_proc  = false;
   var $Embutida_form  = false;
   var $Grid_editavel  = false;
   var $url_webhelp = '';
   var $nm_todas_criticas;
   var $Campos_Mens_erro;
   var $nm_new_label = array();
   var $record_insert_ok = false;
   var $record_delete_ok = false;
//
//----- 
   function ini_controle()
   {
        global $nm_url_saida, $teste_validade, $script_case_init, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      if ($this->NM_ajax_flag)
      {
          if (isset($this->NM_ajax_info['param']['address']))
          {
              $this->address = $this->NM_ajax_info['param']['address'];
          }
          if (isset($this->NM_ajax_info['param']['birthdate']))
          {
              $this->birthdate = $this->NM_ajax_info['param']['birthdate'];
          }
          if (isset($this->NM_ajax_info['param']['birthdate_ano']))
          {
              $this->birthdate_ano = $this->NM_ajax_info['param']['birthdate_ano'];
          }
          if (isset($this->NM_ajax_info['param']['birthdate_dia']))
          {
              $this->birthdate_dia = $this->NM_ajax_info['param']['birthdate_dia'];
          }
          if (isset($this->NM_ajax_info['param']['birthdate_mes']))
          {
              $this->birthdate_mes = $this->NM_ajax_info['param']['birthdate_mes'];
          }
          if (isset($this->NM_ajax_info['param']['birthplace']))
          {
              $this->birthplace = $this->NM_ajax_info['param']['birthplace'];
          }
          if (isset($this->NM_ajax_info['param']['blood']))
          {
              $this->blood = $this->NM_ajax_info['param']['blood'];
          }
          if (isset($this->NM_ajax_info['param']['bu']))
          {
              $this->bu = $this->NM_ajax_info['param']['bu'];
          }
          if (isset($this->NM_ajax_info['param']['city']))
          {
              $this->city = $this->NM_ajax_info['param']['city'];
          }
          if (isset($this->NM_ajax_info['param']['csrf_token']))
          {
              $this->csrf_token = $this->NM_ajax_info['param']['csrf_token'];
          }
          if (isset($this->NM_ajax_info['param']['custcode']))
          {
              $this->custcode = $this->NM_ajax_info['param']['custcode'];
          }
          if (isset($this->NM_ajax_info['param']['education']))
          {
              $this->education = $this->NM_ajax_info['param']['education'];
          }
          if (isset($this->NM_ajax_info['param']['email']))
          {
              $this->email = $this->NM_ajax_info['param']['email'];
          }
          if (isset($this->NM_ajax_info['param']['father']))
          {
              $this->father = $this->NM_ajax_info['param']['father'];
          }
          if (isset($this->NM_ajax_info['param']['hp']))
          {
              $this->hp = $this->NM_ajax_info['param']['hp'];
          }
          if (isset($this->NM_ajax_info['param']['hta']))
          {
              $this->hta = $this->NM_ajax_info['param']['hta'];
          }
          if (isset($this->NM_ajax_info['param']['id']))
          {
              $this->id = $this->NM_ajax_info['param']['id'];
          }
          if (isset($this->NM_ajax_info['param']['idno']))
          {
              $this->idno = $this->NM_ajax_info['param']['idno'];
          }
          if (isset($this->NM_ajax_info['param']['isdead']))
          {
              $this->isdead = $this->NM_ajax_info['param']['isdead'];
          }
          if (isset($this->NM_ajax_info['param']['job']))
          {
              $this->job = $this->NM_ajax_info['param']['job'];
          }
          if (isset($this->NM_ajax_info['param']['kecamatan']))
          {
              $this->kecamatan = $this->NM_ajax_info['param']['kecamatan'];
          }
          if (isset($this->NM_ajax_info['param']['kelurahan']))
          {
              $this->kelurahan = $this->NM_ajax_info['param']['kelurahan'];
          }
          if (isset($this->NM_ajax_info['param']['lastupdated']))
          {
              $this->lastupdated = $this->NM_ajax_info['param']['lastupdated'];
          }
          if (isset($this->NM_ajax_info['param']['mother']))
          {
              $this->mother = $this->NM_ajax_info['param']['mother'];
          }
          if (isset($this->NM_ajax_info['param']['name']))
          {
              $this->name = $this->NM_ajax_info['param']['name'];
          }
          if (isset($this->NM_ajax_info['param']['nm_form_submit']))
          {
              $this->nm_form_submit = $this->NM_ajax_info['param']['nm_form_submit'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ancora']))
          {
              $this->nmgp_ancora = $this->NM_ajax_info['param']['nmgp_ancora'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_dyn_search']))
          {
              $this->nmgp_arg_dyn_search = $this->NM_ajax_info['param']['nmgp_arg_dyn_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_arg_fast_search']))
          {
              $this->nmgp_arg_fast_search = $this->NM_ajax_info['param']['nmgp_arg_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_cond_fast_search']))
          {
              $this->nmgp_cond_fast_search = $this->NM_ajax_info['param']['nmgp_cond_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_fast_search']))
          {
              $this->nmgp_fast_search = $this->NM_ajax_info['param']['nmgp_fast_search'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_num_form']))
          {
              $this->nmgp_num_form = $this->NM_ajax_info['param']['nmgp_num_form'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_opcao']))
          {
              $this->nmgp_opcao = $this->NM_ajax_info['param']['nmgp_opcao'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_ordem']))
          {
              $this->nmgp_ordem = $this->NM_ajax_info['param']['nmgp_ordem'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_parms']))
          {
              $this->nmgp_parms = $this->NM_ajax_info['param']['nmgp_parms'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_refresh_fields']))
          {
              $this->nmgp_refresh_fields = $this->NM_ajax_info['param']['nmgp_refresh_fields'];
          }
          if (isset($this->NM_ajax_info['param']['nmgp_url_saida']))
          {
              $this->nmgp_url_saida = $this->NM_ajax_info['param']['nmgp_url_saida'];
          }
          if (isset($this->NM_ajax_info['param']['penanggung']))
          {
              $this->penanggung = $this->NM_ajax_info['param']['penanggung'];
          }
          if (isset($this->NM_ajax_info['param']['phone']))
          {
              $this->phone = $this->NM_ajax_info['param']['phone'];
          }
          if (isset($this->NM_ajax_info['param']['registerdate']))
          {
              $this->registerdate = $this->NM_ajax_info['param']['registerdate'];
          }
          if (isset($this->NM_ajax_info['param']['religion']))
          {
              $this->religion = $this->NM_ajax_info['param']['religion'];
          }
          if (isset($this->NM_ajax_info['param']['rt']))
          {
              $this->rt = $this->NM_ajax_info['param']['rt'];
          }
          if (isset($this->NM_ajax_info['param']['rw']))
          {
              $this->rw = $this->NM_ajax_info['param']['rw'];
          }
          if (isset($this->NM_ajax_info['param']['salut']))
          {
              $this->salut = $this->NM_ajax_info['param']['salut'];
          }
          if (isset($this->NM_ajax_info['param']['script_case_init']))
          {
              $this->script_case_init = $this->NM_ajax_info['param']['script_case_init'];
          }
          if (isset($this->NM_ajax_info['param']['sex']))
          {
              $this->sex = $this->NM_ajax_info['param']['sex'];
          }
          if (isset($this->NM_ajax_info['param']['spouse']))
          {
              $this->spouse = $this->NM_ajax_info['param']['spouse'];
          }
          if (isset($this->nmgp_refresh_fields))
          {
              $this->nmgp_refresh_fields = explode('_#fld#_', $this->nmgp_refresh_fields);
              $this->nmgp_opcao          = 'recarga';
          }
          if (!isset($this->nmgp_refresh_row))
          {
              $this->nmgp_refresh_row = '';
          }
      }

      $this->sc_conv_var = array();
      if (!empty($_FILES))
      {
          foreach ($_FILES as $nmgp_campo => $nmgp_valores)
          {
               if (isset($this->sc_conv_var[$nmgp_campo]))
               {
                   $nmgp_campo = $this->sc_conv_var[$nmgp_campo];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_campo)]))
               {
                   $nmgp_campo = $this->sc_conv_var[strtolower($nmgp_campo)];
               }
               $tmp_scfile_name     = $nmgp_campo . "_scfile_name";
               $tmp_scfile_type     = $nmgp_campo . "_scfile_type";
               $this->$nmgp_campo = is_array($nmgp_valores['tmp_name']) ? $nmgp_valores['tmp_name'][0] : $nmgp_valores['tmp_name'];
               $this->$tmp_scfile_type   = is_array($nmgp_valores['type'])     ? $nmgp_valores['type'][0]     : $nmgp_valores['type'];
               $this->$tmp_scfile_name   = is_array($nmgp_valores['name'])     ? $nmgp_valores['name'][0]     : $nmgp_valores['name'];
          }
      }
      $Sc_lig_md5 = false;
      if (!empty($_POST))
      {
          foreach ($_POST as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                      $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (!empty($_GET))
      {
          foreach ($_GET as $nmgp_var => $nmgp_val)
          {
               if (substr($nmgp_var, 0, 11) == "SC_glo_par_")
               {
                   $nmgp_var = substr($nmgp_var, 11);
                   $nmgp_val = $_SESSION[$nmgp_val];
               }
              if ($nmgp_var == "nmgp_parms" && substr($nmgp_val, 0, 8) == "@SC_par@")
              {
                  $SC_Ind_Val = explode("@SC_par@", $nmgp_val);
                  if (count($SC_Ind_Val) == 4 && isset($_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]]))
                  {
                      $nmgp_val = $_SESSION['sc_session'][$SC_Ind_Val[1]][$SC_Ind_Val[2]]['Lig_Md5'][$SC_Ind_Val[3]];
                      $Sc_lig_md5 = true;
                  }
                  else
                  {
                       $_SESSION['sc_session']['SC_parm_violation'] = true;
                  }
              }
               if (isset($this->sc_conv_var[$nmgp_var]))
               {
                   $nmgp_var = $this->sc_conv_var[$nmgp_var];
               }
               elseif (isset($this->sc_conv_var[strtolower($nmgp_var)]))
               {
                   $nmgp_var = $this->sc_conv_var[strtolower($nmgp_var)];
               }
               $nmgp_val = NM_decode_input($nmgp_val);
               $this->$nmgp_var = $nmgp_val;
          }
      }
      if (isset($SC_lig_apl_orig) && !$Sc_lig_md5 && (!isset($nmgp_parms) || ($nmgp_parms != "SC_null" && substr($nmgp_parms, 0, 8) != "OrScLink")))
      {
          $_SESSION['sc_session']['SC_parm_violation'] = true;
      }
      if (isset($nmgp_parms) && $nmgp_parms == "SC_null")
      {
          $nmgp_parms = "";
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['embutida_parms']))
      { 
          $this->nmgp_parms = $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['embutida_parms'];
          unset($_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['embutida_parms']);
      } 
      if (isset($this->nmgp_parms) && !empty($this->nmgp_parms)) 
      { 
          if (isset($_SESSION['nm_aba_bg_color'])) 
          { 
              unset($_SESSION['nm_aba_bg_color']);
          }   
          $nmgp_parms = NM_decode_input($nmgp_parms);
          $nmgp_parms = str_replace("@aspass@", "'", $this->nmgp_parms);
          $nmgp_parms = str_replace("*scout", "?@?", $nmgp_parms);
          $nmgp_parms = str_replace("*scin", "?#?", $nmgp_parms);
          $todox = str_replace("?#?@?@?", "?#?@ ?@?", $nmgp_parms);
          $todo  = explode("?@?", $todox);
          $ix = 0;
          while (!empty($todo[$ix]))
          {
             $cadapar = explode("?#?", $todo[$ix]);
             if (1 < sizeof($cadapar))
             {
                if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                {
                    $cadapar[0] = substr($cadapar[0], 11);
                    $cadapar[1] = $_SESSION[$cadapar[1]];
                }
                 if (isset($this->sc_conv_var[$cadapar[0]]))
                 {
                     $cadapar[0] = $this->sc_conv_var[$cadapar[0]];
                 }
                 elseif (isset($this->sc_conv_var[strtolower($cadapar[0])]))
                 {
                     $cadapar[0] = $this->sc_conv_var[strtolower($cadapar[0])];
                 }
                 nm_limpa_str_form_tbcustomer($cadapar[1]);
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
             }
             $ix++;
          }
          if (isset($this->NM_where_filter_form))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['where_filter_form'] = $this->NM_where_filter_form;
              unset($_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['total']);
          }
          if (isset($this->sc_redir_atualiz))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['sc_redir_atualiz'] = $this->sc_redir_atualiz;
          }
          if (isset($this->sc_redir_insert))
          {
              $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['sc_redir_insert'] = $this->sc_redir_insert;
          }
      } 
      elseif (isset($script_case_init) && !empty($script_case_init) && isset($_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['parms']))
      {
          if ((!isset($this->nmgp_opcao) || ($this->nmgp_opcao != "incluir" && $this->nmgp_opcao != "alterar" && $this->nmgp_opcao != "excluir" && $this->nmgp_opcao != "novo" && $this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")) && (!isset($this->NM_ajax_opcao) || $this->NM_ajax_opcao == ""))
          {
              $todox = str_replace("?#?@?@?", "?#?@ ?@?", $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['parms']);
              $todo  = explode("?@?", $todox);
              $ix = 0;
              while (!empty($todo[$ix]))
              {
                 $cadapar = explode("?#?", $todo[$ix]);
                 if (substr($cadapar[0], 0, 11) == "SC_glo_par_")
                 {
                     $cadapar[0] = substr($cadapar[0], 11);
                     $cadapar[1] = $_SESSION[$cadapar[1]];
                 }
                 if ($cadapar[1] == "@ ") {$cadapar[1] = trim($cadapar[1]); }
                 $Tmp_par = $cadapar[0];
                 $this->$Tmp_par = $cadapar[1];
                 $ix++;
              }
          }
      } 

      if (isset($this->nm_run_menu) && $this->nm_run_menu == 1)
      { 
          $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['nm_run_menu'] = 1;
      } 
      if (($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao) || (isset($this->nmgp_opcao) && $this->nmgp_opcao == "igual"))
      { }
      else
      {
          $aDtParts = explode(' ', $this->hta);
          $this->hta      = $aDtParts[0];
          $this->hta_hora = $aDtParts[1];
      }
      if (!$this->NM_ajax_flag && 'autocomp_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          $this->NM_ajax_flag = true;
      }

      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          = substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      if (isset($this->nm_evt_ret_edit) && '' != $this->nm_evt_ret_edit)
      {
          $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['lig_edit_lookup']     = true;
          $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['lig_edit_lookup_cb']  = $this->nm_evt_ret_edit;
          $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['lig_edit_lookup_row'] = isset($this->nm_evt_ret_row) ? $this->nm_evt_ret_row : '';
      }
      if (isset($_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['lig_edit_lookup']) && $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['lig_edit_lookup'])
      {
          $this->lig_edit_lookup     = true;
          $this->lig_edit_lookup_cb  = $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['lig_edit_lookup_cb'];
          $this->lig_edit_lookup_row = $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['lig_edit_lookup_row'];
      }
      if (!$this->Ini)
      { 
          $this->Ini = new form_tbcustomer_ini(); 
          $this->Ini->init();
          $this->nm_data = new nm_data("id");
          $this->app_is_initializing = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['initialize'];
      } 
      else 
      { 
         $this->nm_data = new nm_data("id");
      } 
      $_SESSION['sc_session'][$script_case_init]['form_tbcustomer']['upload_field_info'] = array();

      unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue']);
      $this->Change_Menu = false;
      $run_iframe = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe']) && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "R")) ? true : false;
      if (!$run_iframe && isset($_SESSION['scriptcase']['menu_atual']) && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_call'] && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['sc_outra_jan']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['sc_outra_jan']))
      {
          $this->sc_init_menu = "x";
          if (isset($_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbcustomer']))
          {
              $this->sc_init_menu = $_SESSION['scriptcase'][$_SESSION['scriptcase']['menu_atual']]['sc_init']['form_tbcustomer'];
          }
          elseif (isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']]))
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']] as $init => $resto)
              {
                  if ($this->Ini->sc_page == $init)
                  {
                      $this->sc_init_menu = $init;
                      break;
                  }
              }
          }
          if ($this->Ini->sc_page == $this->sc_init_menu && !isset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbcustomer']))
          {
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbcustomer']['link'] = $this->Ini->sc_protocolo . $this->Ini->server . $this->Ini->path_link . "" . SC_dir_app_name('form_tbcustomer') . "/";
               $_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu]['form_tbcustomer']['label'] = "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Master Pasien";
               $this->Change_Menu = true;
          }
          elseif ($this->Ini->sc_page == $this->sc_init_menu)
          {
              $achou = false;
              foreach ($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu] as $apl => $parms)
              {
                  if ($apl == "form_tbcustomer")
                  {
                      $achou = true;
                  }
                  elseif ($achou)
                  {
                      unset($_SESSION['scriptcase']['menu_apls'][$_SESSION['scriptcase']['menu_atual']][$this->sc_init_menu][$apl]);
                      $this->Change_Menu = true;
                  }
              }
          }
      }
      if (!function_exists("nmButtonOutput"))
      {
          include_once($this->Ini->path_lib_php . "nm_gp_config_btn.php");
      }
      include("../_lib/css/" . $this->Ini->str_schema_all . "_form.php");
      $this->Ini->Str_btn_form    = trim($str_button);
      include($this->Ini->path_btn . $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form . $_SESSION['scriptcase']['reg_conf']['css_dir'] . '.php');
      $this->Db = $this->Ini->Db; 
      $this->Ini->str_google_fonts = isset($str_google_fonts)?$str_google_fonts:'';
      $this->Ini->Img_sep_form    = "/" . trim($str_toolbar_separator);
      $this->Ini->Color_bg_ajax   = "" == trim($str_ajax_bg)         ? "#000" : $str_ajax_bg;
      $this->Ini->Border_c_ajax   = "" == trim($str_ajax_border_c)   ? ""     : $str_ajax_border_c;
      $this->Ini->Border_s_ajax   = "" == trim($str_ajax_border_s)   ? ""     : $str_ajax_border_s;
      $this->Ini->Border_w_ajax   = "" == trim($str_ajax_border_w)   ? ""     : $str_ajax_border_w;
      $this->Ini->Block_img_exp   = "" == trim($str_block_exp)       ? ""     : $str_block_exp;
      $this->Ini->Block_img_col   = "" == trim($str_block_col)       ? ""     : $str_block_col;
      $this->Ini->Msg_ico_title   = "" == trim($str_msg_ico_title)   ? ""     : $str_msg_ico_title;
      $this->Ini->Msg_ico_body    = "" == trim($str_msg_ico_body)    ? ""     : $str_msg_ico_body;
      $this->Ini->Err_ico_title   = "" == trim($str_err_ico_title)   ? ""     : $str_err_ico_title;
      $this->Ini->Err_ico_body    = "" == trim($str_err_ico_body)    ? ""     : $str_err_ico_body;
      $this->Ini->Cal_ico_back    = "" == trim($str_cal_ico_back)    ? ""     : $str_cal_ico_back;
      $this->Ini->Cal_ico_for     = "" == trim($str_cal_ico_for)     ? ""     : $str_cal_ico_for;
      $this->Ini->Cal_ico_close   = "" == trim($str_cal_ico_close)   ? ""     : $str_cal_ico_close;
      $this->Ini->Tab_space       = "" == trim($str_tab_space)       ? ""     : $str_tab_space;
      $this->Ini->Bubble_tail     = "" == trim($str_bubble_tail)     ? ""     : $str_bubble_tail;
      $this->Ini->Label_sort_pos  = "" == trim($str_label_sort_pos)  ? ""     : $str_label_sort_pos;
      $this->Ini->Label_sort      = "" == trim($str_label_sort)      ? ""     : $str_label_sort;
      $this->Ini->Label_sort_asc  = "" == trim($str_label_sort_asc)  ? ""     : $str_label_sort_asc;
      $this->Ini->Label_sort_desc = "" == trim($str_label_sort_desc) ? ""     : $str_label_sort_desc;
      $this->Ini->Img_status_ok   = "" == trim($str_img_status_ok)   ? ""     : $str_img_status_ok;
      $this->Ini->Img_status_err  = "" == trim($str_img_status_err)  ? ""     : $str_img_status_err;
      $this->Ini->Css_status      = "scFormInputError";
      $this->Ini->Error_icon_span = "" == trim($str_error_icon_span) ? false  : "message" == $str_error_icon_span;
      $this->Ini->Img_qs_search        = "" == trim($img_qs_search)        ? "scriptcase__NM__qs_lupa.png"  : $img_qs_search;
      $this->Ini->Img_qs_clean         = "" == trim($img_qs_clean)         ? "scriptcase__NM__qs_close.png" : $img_qs_clean;
      $this->Ini->Str_qs_image_padding = "" == trim($str_qs_image_padding) ? "0"                            : $str_qs_image_padding;
      $this->Ini->App_div_tree_img_col = trim($app_div_str_tree_col);
      $this->Ini->App_div_tree_img_exp = trim($app_div_str_tree_exp);
      $this->Ini->form_table_width     = isset($str_form_table_width) && '' != trim($str_form_table_width) ? $str_form_table_width : '';


      $this->arr_buttons['sc_btn_0']['hint']             = "";
      $this->arr_buttons['sc_btn_0']['type']             = "button";
      $this->arr_buttons['sc_btn_0']['value']            = "Cetak Identitas Pasien";
      $this->arr_buttons['sc_btn_0']['display']          = "only_text";
      $this->arr_buttons['sc_btn_0']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_0']['style']            = "default";
      $this->arr_buttons['sc_btn_0']['image']            = "";

      $this->arr_buttons['sc_btn_1']['hint']             = "";
      $this->arr_buttons['sc_btn_1']['type']             = "button";
      $this->arr_buttons['sc_btn_1']['value']            = "Cetak Kartu";
      $this->arr_buttons['sc_btn_1']['display']          = "only_text";
      $this->arr_buttons['sc_btn_1']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_1']['style']            = "default";
      $this->arr_buttons['sc_btn_1']['image']            = "";

      $this->arr_buttons['sc_btn_2']['hint']             = "";
      $this->arr_buttons['sc_btn_2']['type']             = "button";
      $this->arr_buttons['sc_btn_2']['value']            = "Buat RM Bayi (L)";
      $this->arr_buttons['sc_btn_2']['display']          = "only_text";
      $this->arr_buttons['sc_btn_2']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_2']['style']            = "default";
      $this->arr_buttons['sc_btn_2']['image']            = "";

      $this->arr_buttons['sc_btn_3']['hint']             = "";
      $this->arr_buttons['sc_btn_3']['type']             = "button";
      $this->arr_buttons['sc_btn_3']['value']            = "Buat RM Bayi (P)";
      $this->arr_buttons['sc_btn_3']['display']          = "only_text";
      $this->arr_buttons['sc_btn_3']['display_position'] = "text_right";
      $this->arr_buttons['sc_btn_3']['style']            = "default";
      $this->arr_buttons['sc_btn_3']['image']            = "";


      $_SESSION['scriptcase']['error_icon']['form_tbcustomer']  = "<img src=\"" . $this->Ini->path_icones . "/scriptcase__NM__btn__NM__scriptcase9_Rhino__NM__nm_scriptcase9_Rhino_error.png\" style=\"border-width: 0px\" align=\"top\">&nbsp;";
      $_SESSION['scriptcase']['error_close']['form_tbcustomer'] = "<td>" . nmButtonOutput($this->arr_buttons, "berrm_clse", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "document.getElementById('id_error_display_fixed').style.display = 'none'; document.getElementById('id_error_message_fixed').innerHTML = ''; return false", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "") . "</td>";

      $this->Embutida_proc = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_proc']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_proc'] : $this->Embutida_proc;
      $this->Embutida_form = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_form']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_form'] : $this->Embutida_form;
      $this->Embutida_call = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_call']) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_call'] : $this->Embutida_call;

       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['table_refresh'] = false;

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_grid_edit']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_grid_edit'])
      {
          $this->Grid_editavel = ('on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_grid_edit']) ? true : false;
      }
      if (isset($this->Grid_editavel) && $this->Grid_editavel)
      {
          $this->Embutida_form  = true;
          $this->Embutida_ronly = true;
      }
      $this->Embutida_multi = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_multi']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_multi'])
      {
          $this->Grid_editavel  = false;
          $this->Embutida_form  = false;
          $this->Embutida_ronly = false;
          $this->Embutida_multi = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_tp_pag']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_tp_pag'])
      {
          $this->form_paginacao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_tp_pag'];
      }

      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_form']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_form'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_form'] = $this->Embutida_form;
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_grid_edit'] = $this->Grid_editavel ? 'on' : 'off';
      }
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_grid_edit']) || '' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_grid_edit'])
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_grid_edit'] = $this->Embutida_call;
      }

      $this->Ini->cor_grid_par = $this->Ini->cor_grid_impar;
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $this->nmgp_url_saida  = $nm_url_saida;
      $this->nmgp_form_show  = "on";
      $this->nmgp_form_empty = false;
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_valida.php", "C", "NM_Valida") ; 
      $teste_validade = new NM_Valida ;

      $this->loadFieldConfig();

      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['first_time'])
      {
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['insert']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['new']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['update']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['delete']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['first']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['back']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['forward']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['last']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['qsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['dynsearch']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['summary']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['navpage']);
          unset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['goto']);
      }
      $this->NM_cancel_return_new = (isset($this->NM_cancel_return_new) && $this->NM_cancel_return_new == 1) ? "1" : "";
      $this->NM_cancel_insert_new = ((isset($this->NM_cancel_insert_new) && $this->NM_cancel_insert_new == 1) || $this->NM_cancel_return_new == 1) ? "document.F5.action='" . $nm_url_saida . "';" : "";
      if (isset($this->NM_btn_insert) && '' != $this->NM_btn_insert && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['insert']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['insert']))
      {
          if ('N' == $this->NM_btn_insert)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['insert'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['insert'] = 'on';
          }
      }
      if (isset($this->NM_btn_new) && 'N' == $this->NM_btn_new)
      {
          $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['new'] = 'off';
      }
      if (isset($this->NM_btn_update) && '' != $this->NM_btn_update && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['update']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['update']))
      {
          if ('N' == $this->NM_btn_update)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['update'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['update'] = 'on';
          }
      }
      if (isset($this->NM_btn_delete) && '' != $this->NM_btn_delete && (!isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['delete']) || '' == $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['delete']))
      {
          if ('N' == $this->NM_btn_delete)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['delete'] = 'off';
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['delete'] = 'on';
          }
      }
      if (isset($this->NM_btn_navega) && '' != $this->NM_btn_navega)
      {
          if ('N' == $this->NM_btn_navega)
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['first']     = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['back']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['forward']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['last']      = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['qsearch']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['dynsearch'] = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['summary']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['navpage']   = 'off';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['goto']      = 'off';
              $this->Nav_permite_ava = false;
              $this->Nav_permite_ret = false;
          }
          else
          {
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['first']     = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['back']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['forward']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['last']      = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['qsearch']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['dynsearch'] = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['summary']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['navpage']   = 'on';
              $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['goto']      = 'on';
          }
      }

      $this->nmgp_botoes['cancel'] = "on";
      $this->nmgp_botoes['exit'] = "on";
      $this->nmgp_botoes['qsearch'] = "on";
      $this->nmgp_botoes['new'] = "on";
      $this->nmgp_botoes['insert'] = "on";
      $this->nmgp_botoes['copy'] = "off";
      $this->nmgp_botoes['update'] = "on";
      $this->nmgp_botoes['delete'] = "on";
      $this->nmgp_botoes['first'] = "off";
      $this->nmgp_botoes['back'] = "off";
      $this->nmgp_botoes['forward'] = "off";
      $this->nmgp_botoes['last'] = "off";
      $this->nmgp_botoes['summary'] = "off";
      $this->nmgp_botoes['navpage'] = "off";
      $this->nmgp_botoes['goto'] = "off";
      $this->nmgp_botoes['qtline'] = "off";
      $this->nmgp_botoes['sc_btn_0'] = "on";
      $this->nmgp_botoes['sc_btn_1'] = "on";
      $this->nmgp_botoes['sc_btn_2'] = "on";
      $this->nmgp_botoes['sc_btn_3'] = "on";
      if (isset($this->NM_btn_cancel) && 'N' == $this->NM_btn_cancel)
      {
          $this->nmgp_botoes['cancel'] = "off";
      }
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_orig'] = "";
      if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_pesq']))
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_pesq'] = "";
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_pesq_filtro'] = "";
      }
      $this->sc_where_orig   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_orig'];
      $this->sc_where_atual  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_pesq'];
      $this->sc_where_filtro = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_pesq_filtro'];
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6)) {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['buttonStatus'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['iframe_filtro']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['iframe_filtro'] == "S")
      {
          $this->nmgp_botoes['exit'] = "off";
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['btn_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['btn_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['btn_display'] as $NM_cada_btn => $NM_cada_opc)
          {
              $this->nmgp_botoes[$NM_cada_btn] = $NM_cada_opc;
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['insert']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['new']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['new'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['new'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['update']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['delete']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['delete'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['first']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['first'] != '')
      {
          $this->nmgp_botoes['first'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['first'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['back']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['back'] != '')
      {
          $this->nmgp_botoes['back'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['back'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['forward']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['forward'] != '')
      {
          $this->nmgp_botoes['forward'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['forward'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['last']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['last'] != '')
      {
          $this->nmgp_botoes['last'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['last'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['qsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['qsearch'] != '')
      {
          $this->nmgp_botoes['qsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['qsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['dynsearch']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['dynsearch'] != '')
      {
          $this->nmgp_botoes['dynsearch'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['dynsearch'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['summary']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['summary'] != '')
      {
          $this->nmgp_botoes['summary'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['summary'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['navpage']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['navpage'] != '')
      {
          $this->nmgp_botoes['navpage'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['navpage'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['goto']) && $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['goto'] != '')
      {
          $this->nmgp_botoes['goto'] = $_SESSION['scriptcase']['sc_apl_conf_lig']['form_tbcustomer']['goto'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_insert']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_insert'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_update']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_update'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_delete']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_delete'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_btn_nav']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_btn_nav'] != '')
      {
          $this->nmgp_botoes['first']   = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['back']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['forward'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_btn_nav'];
          $this->nmgp_botoes['last']    = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['embutida_liga_form_btn_nav'];
      }

      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard'] && !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['maximized']) {
          $tmpDashboardApp = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['dashboard_app'];
          if (isset($_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbcustomer'])) {
              $tmpDashboardButtons = $_SESSION['scriptcase']['dashboard_toolbar'][$tmpDashboardApp]['form_tbcustomer'];

              $this->nmgp_botoes['update']     = $tmpDashboardButtons['form_update']    ? 'on' : 'off';
              $this->nmgp_botoes['new']        = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['insert']     = $tmpDashboardButtons['form_insert']    ? 'on' : 'off';
              $this->nmgp_botoes['delete']     = $tmpDashboardButtons['form_delete']    ? 'on' : 'off';
              $this->nmgp_botoes['copy']       = $tmpDashboardButtons['form_copy']      ? 'on' : 'off';
              $this->nmgp_botoes['first']      = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['back']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['last']       = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['forward']    = $tmpDashboardButtons['form_navigate']  ? 'on' : 'off';
              $this->nmgp_botoes['navpage']    = $tmpDashboardButtons['form_navpage']   ? 'on' : 'off';
              $this->nmgp_botoes['goto']       = $tmpDashboardButtons['form_goto']      ? 'on' : 'off';
              $this->nmgp_botoes['qtline']     = $tmpDashboardButtons['form_lineqty']   ? 'on' : 'off';
              $this->nmgp_botoes['summary']    = $tmpDashboardButtons['form_summary']   ? 'on' : 'off';
              $this->nmgp_botoes['qsearch']    = $tmpDashboardButtons['form_qsearch']   ? 'on' : 'off';
              $this->nmgp_botoes['dynsearch']  = $tmpDashboardButtons['form_dynsearch'] ? 'on' : 'off';
          }
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['insert']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['insert'] != '')
      {
          $this->nmgp_botoes['new']    = $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['insert'];
          $this->nmgp_botoes['insert'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['insert'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['update']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['update'] != '')
      {
          $this->nmgp_botoes['update'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['update'];
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['delete']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['delete'] != '')
      {
          $this->nmgp_botoes['delete'] = $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['delete'];
      }

      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['field_display']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['field_display']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['field_display'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_hidden[$NM_cada_field] = $NM_cada_opc;
              $this->NM_ajax_info['fieldDisplay'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['field_readonly']) && !empty($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['field_readonly']))
      {
          foreach ($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['field_readonly'] as $NM_cada_field => $NM_cada_opc)
          {
              $this->nmgp_cmp_readonly[$NM_cada_field] = "on";
              $this->NM_ajax_info['readOnly'][$NM_cada_field] = $NM_cada_opc;
          }
      }
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['exit']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['exit'] != '')
      {
          $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page]       = $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['exit'];
          $_SESSION['scriptcase']['sc_force_url_saida'][$this->Ini->sc_page] = true;
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']))
      {
          $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form'];
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['custcode'] != "null"){$this->custcode = $this->nmgp_dados_form['custcode'];} 
          if (!isset($this->postcode)){$this->postcode = $this->nmgp_dados_form['postcode'];} 
          if (!isset($this->type)){$this->type = $this->nmgp_dados_form['type'];} 
          if (!isset($this->typename)){$this->typename = $this->nmgp_dados_form['typename'];} 
          if ($this->nmgp_opcao == "incluir" && $this->nmgp_dados_form['hta'] != "null"){
              $aDtParts = explode(' ', $this->nmgp_dados_form['hta']);
              $this->hta = $this->nm_conv_data_db($aDtParts[0], 'yyyy-mm-dd', $this->field_config['hta']['date_format']);
              $this->hta_hora = $aDtParts[1];
              $aDtParts = explode(';', $this->hta);
              $this->hta = $aDtParts[0];
          }
          if (!isset($this->lasthta)){$this->lasthta = $this->nmgp_dados_form['lasthta'];} 
          if (!isset($this->bbtb)){$this->bbtb = $this->nmgp_dados_form['bbtb'];} 
          if (!isset($this->partus)){$this->partus = $this->nmgp_dados_form['partus'];} 
          if (!isset($this->deleted)){$this->deleted = $this->nmgp_dados_form['deleted'];} 
          if (!isset($this->hamil)){$this->hamil = $this->nmgp_dados_form['hamil'];} 
          if (!isset($this->location)){$this->location = $this->nmgp_dados_form['location'];} 
          if (!isset($this->member)){$this->member = $this->nmgp_dados_form['member'];} 
          if (!isset($this->jenis)){$this->jenis = $this->nmgp_dados_form['jenis'];} 
          if (!isset($this->expdate)){$this->expdate = $this->nmgp_dados_form['expdate'];} 
          if (!isset($this->photoname)){$this->photoname = $this->nmgp_dados_form['photoname'];} 
          if (!isset($this->tlc)){$this->tlc = $this->nmgp_dados_form['tlc'];} 
          if (!isset($this->nip)){$this->nip = $this->nmgp_dados_form['nip'];} 
          if (!isset($this->instno)){$this->instno = $this->nmgp_dados_form['instno'];} 
          if (!isset($this->kelompokcode)){$this->kelompokcode = $this->nmgp_dados_form['kelompokcode'];} 
          if (!isset($this->kelompok)){$this->kelompok = $this->nmgp_dados_form['kelompok'];} 
          if (!isset($this->cardno)){$this->cardno = $this->nmgp_dados_form['cardno'];} 
          if (!isset($this->statusbl)){$this->statusbl = $this->nmgp_dados_form['statusbl'];} 
      }
      $glo_senha_protect = (isset($_SESSION['scriptcase']['glo_senha_protect'])) ? $_SESSION['scriptcase']['glo_senha_protect'] : "S";
      $this->aba_iframe = false;
      if (isset($_SESSION['scriptcase']['sc_aba_iframe']))
      {
          foreach ($_SESSION['scriptcase']['sc_aba_iframe'] as $aba => $apls_aba)
          {
              if (in_array("form_tbcustomer", $apls_aba))
              {
                  $this->aba_iframe = true;
                  break;
              }
          }
      }
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['iframe_menu'] && (!isset($_SESSION['scriptcase']['menu_mobile']) || empty($_SESSION['scriptcase']['menu_mobile'])))
      {
          $this->aba_iframe = true;
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_gp_limpa.php", "F", "nm_limpa_valor") ; 
      $this->Ini->sc_Include($this->Ini->path_libs . "/nm_gc.php", "F", "nm_gc") ; 
      $_SESSION['scriptcase']['sc_tab_meses']['int'] = array(
                                      $this->Ini->Nm_lang['lang_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_mnth_june'],
                                      $this->Ini->Nm_lang['lang_mnth_july'],
                                      $this->Ini->Nm_lang['lang_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_meses']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_mnth_janu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_febr'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_marc'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_apri'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_mayy'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_june'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_july'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_augu'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_sept'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_octo'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_nove'],
                                      $this->Ini->Nm_lang['lang_shrt_mnth_dece']);
      $_SESSION['scriptcase']['sc_tab_dias']['int'] = array(
                                      $this->Ini->Nm_lang['lang_days_sund'],
                                      $this->Ini->Nm_lang['lang_days_mond'],
                                      $this->Ini->Nm_lang['lang_days_tued'],
                                      $this->Ini->Nm_lang['lang_days_wend'],
                                      $this->Ini->Nm_lang['lang_days_thud'],
                                      $this->Ini->Nm_lang['lang_days_frid'],
                                      $this->Ini->Nm_lang['lang_days_satd']);
      $_SESSION['scriptcase']['sc_tab_dias']['abr'] = array(
                                      $this->Ini->Nm_lang['lang_shrt_days_sund'],
                                      $this->Ini->Nm_lang['lang_shrt_days_mond'],
                                      $this->Ini->Nm_lang['lang_shrt_days_tued'],
                                      $this->Ini->Nm_lang['lang_shrt_days_wend'],
                                      $this->Ini->Nm_lang['lang_shrt_days_thud'],
                                      $this->Ini->Nm_lang['lang_shrt_days_frid'],
                                      $this->Ini->Nm_lang['lang_shrt_days_satd']);
      nm_gc($this->Ini->path_libs);
      $this->Ini->Gd_missing  = true;
      if(function_exists("getProdVersion"))
      {
         $_SESSION['scriptcase']['sc_prod_Version'] = str_replace(".", "", getProdVersion($this->Ini->path_libs));
         if(function_exists("gd_info"))
         {
            $this->Ini->Gd_missing = false;
         }
      }
      $this->Ini->sc_Include($this->Ini->path_lib_php . "/nm_trata_img.php", "C", "nm_trata_img") ; 
      if (isset($_GET['nm_cal_display']))
      {
          if ($this->Embutida_proc)
          { 
              include_once($this->Ini->path_embutida . 'form_tbcustomer/form_tbcustomer_calendar.php');
          }
          else
          { 
              include_once($this->Ini->path_aplicacao . 'form_tbcustomer_calendar.php');
          }
          exit;
      }

      if (is_file($this->Ini->path_aplicacao . 'form_tbcustomer_help.txt'))
      {
          $arr_link_webhelp = file($this->Ini->path_aplicacao . 'form_tbcustomer_help.txt');
          if ($arr_link_webhelp)
          {
              foreach ($arr_link_webhelp as $str_link_webhelp)
              {
                  $str_link_webhelp = trim($str_link_webhelp);
                  if ('form:' == substr($str_link_webhelp, 0, 5))
                  {
                      $arr_link_parts = explode(':', $str_link_webhelp);
                      if ('' != $arr_link_parts[1] && is_file($this->Ini->root . $this->Ini->path_help . $arr_link_parts[1]))
                      {
                          $this->url_webhelp = $this->Ini->path_help . $arr_link_parts[1];
                      }
                  }
              }
          }
      }

      if (is_dir($this->Ini->path_aplicacao . 'img'))
      {
          $Res_dir_img = @opendir($this->Ini->path_aplicacao . 'img');
          if ($Res_dir_img)
          {
              while (FALSE !== ($Str_arquivo = @readdir($Res_dir_img))) 
              {
                 if (@is_file($this->Ini->path_aplicacao . 'img/' . $Str_arquivo) && '.' != $Str_arquivo && '..' != $this->Ini->path_aplicacao . 'img/' . $Str_arquivo)
                 {
                     @unlink($this->Ini->path_aplicacao . 'img/' . $Str_arquivo);
                 }
              }
          }
          @closedir($Res_dir_img);
          rmdir($this->Ini->path_aplicacao . 'img');
      }

      if ($this->Embutida_proc)
      { 
          require_once($this->Ini->path_embutida . 'form_tbcustomer/form_tbcustomer_erro.class.php');
      }
      else
      { 
          require_once($this->Ini->path_aplicacao . "form_tbcustomer_erro.class.php"); 
      }
      $this->Erro      = new form_tbcustomer_erro();
      $this->Erro->Ini = $this->Ini;
      $this->proc_fast_search = false;
      if ($this->nmgp_opcao == "fast_search")  
      {
          $this->SC_fast_search($this->nmgp_fast_search, $this->nmgp_cond_fast_search, $this->nmgp_arg_fast_search);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] = "inicio";
          $this->nmgp_opcao = "inicio";
          $this->proc_fast_search = true;
      } 
      if ($nm_opc_lookup != "lookup" && $nm_opc_php != "formphp")
      { 
         if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao']))
         { 
             if ($this->id != "")   
             { 
                 $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] = "igual" ;  
             }   
         }   
      } 
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao']) && empty($this->nmgp_refresh_fields))
      {
          $this->nmgp_opcao = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'];  
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] = "" ;  
          if ($this->nmgp_opcao == "edit_novo")  
          {
             $this->nmgp_opcao = "novo";
             $this->nm_flag_saida_novo = "S";
          }
      } 
      $this->nm_Start_new = false;
      if (isset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['start']) && $_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['start'] == 'new')
      {
          $this->nmgp_opcao = "novo";
          $this->nm_Start_new = true;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] = "novo";
          unset($_SESSION['scriptcase']['sc_apl_conf']['form_tbcustomer']['start']);
      }
      if ($this->nmgp_opcao == "igual")  
      {
          $this->nmgp_opc_ant = $this->nmgp_opcao;
      } 
      else
      {
          $this->nmgp_opc_ant = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opc_ant'];
      } 
      if ($this->nmgp_opcao == "novo")  
      {
          $this->nmgp_botoes['sc_btn_0'] = "off";
          $this->nmgp_botoes['sc_btn_1'] = "off";
          $this->nmgp_botoes['sc_btn_2'] = "off";
          $this->nmgp_botoes['sc_btn_3'] = "off";
      }
      elseif ($this->nmgp_opcao == "incluir")  
      {
          $this->nmgp_botoes['sc_btn_0'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['botoes']['sc_btn_0'];
          $this->nmgp_botoes['sc_btn_1'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['botoes']['sc_btn_1'];
          $this->nmgp_botoes['sc_btn_2'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['botoes']['sc_btn_2'];
          $this->nmgp_botoes['sc_btn_3'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['botoes']['sc_btn_3'];
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "muda_form")  
      {
          $this->nmgp_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['botoes'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['final'];
      }
      else
      {
      }
      $this->nm_flag_iframe = false;
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form'])) 
      {
         $this->nmgp_dados_form = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form'];
      }
      if ($this->nmgp_opcao == "edit_novo")  
      {
          $this->nmgp_opcao = "novo";
          $this->nm_flag_saida_novo = "S";
      }
//
      $this->NM_case_insensitive = false;
      $this->sc_evento = $this->nmgp_opcao;
      if (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
      if (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
      if (isset($this->name)) { $this->nm_limpa_alfa($this->name); }
      if (isset($this->salut)) { $this->nm_limpa_alfa($this->salut); }
      if (isset($this->address)) { $this->nm_limpa_alfa($this->address); }
      if (isset($this->city)) { $this->nm_limpa_alfa($this->city); }
      if (isset($this->phone)) { $this->nm_limpa_alfa($this->phone); }
      if (isset($this->hp)) { $this->nm_limpa_alfa($this->hp); }
      if (isset($this->spouse)) { $this->nm_limpa_alfa($this->spouse); }
      if (isset($this->sex)) { $this->nm_limpa_alfa($this->sex); }
      if (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
      if (isset($this->blood)) { $this->nm_limpa_alfa($this->blood); }
      if (isset($this->mother)) { $this->nm_limpa_alfa($this->mother); }
      if (isset($this->father)) { $this->nm_limpa_alfa($this->father); }
      if (isset($this->job)) { $this->nm_limpa_alfa($this->job); }
      if (isset($this->education)) { $this->nm_limpa_alfa($this->education); }
      if (isset($this->religion)) { $this->nm_limpa_alfa($this->religion); }
      if (isset($this->birthplace)) { $this->nm_limpa_alfa($this->birthplace); }
      if (isset($this->kelurahan)) { $this->nm_limpa_alfa($this->kelurahan); }
      if (isset($this->kecamatan)) { $this->nm_limpa_alfa($this->kecamatan); }
      if (isset($this->rt)) { $this->nm_limpa_alfa($this->rt); }
      if (isset($this->rw)) { $this->nm_limpa_alfa($this->rw); }
      if (isset($this->idno)) { $this->nm_limpa_alfa($this->idno); }
      if (isset($this->isdead)) { $this->nm_limpa_alfa($this->isdead); }
      if (isset($this->bu)) { $this->nm_limpa_alfa($this->bu); }
      if (isset($this->penanggung)) { $this->nm_limpa_alfa($this->penanggung); }
      if ($nm_opc_form_php == "formphp")
      { 
          if ($nm_call_php == "sc_btn_2")
          { 
              $this->sc_btn_sc_btn_2();
          } 
          if ($nm_call_php == "sc_btn_3")
          { 
              $this->sc_btn_sc_btn_3();
          } 
          $this->NM_close_db(); 
          exit;
      } 
      $Campos_Crit       = "";
      $Campos_erro       = "";
      $Campos_Falta      = array();
      $Campos_Erros      = array();
      $dir_raiz          = strrpos($_SERVER['PHP_SELF'],"/") ;  
      $dir_raiz          =  substr($_SERVER['PHP_SELF'], 0, $dir_raiz + 1) ;  
      $this->nm_location = $this->Ini->sc_protocolo . $this->Ini->server . $dir_raiz; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opc_edit'] = true;  
     if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_select'])) 
     {
        $this->nmgp_dados_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_select'];
     }
   }

   function loadFieldConfig()
   {
      $this->field_config = array();
      //-- birthdate
      $this->field_config['birthdate']                 = array();
      $this->field_config['birthdate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['birthdate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['birthdate']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'birthdate');
      //-- lastupdated
      $this->field_config['lastupdated']                 = array();
      $this->field_config['lastupdated']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['lastupdated']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['lastupdated']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'lastupdated');
      //-- registerdate
      $this->field_config['registerdate']                 = array();
      $this->field_config['registerdate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['registerdate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['registerdate']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'registerdate');
      //-- hta
      $this->field_config['hta']                 = array();
      $this->field_config['hta']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['hta']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['hta']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['hta']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'hta');
      //-- id
      $this->field_config['id']               = array();
      $this->field_config['id']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['id']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['id']['symbol_dec'] = '';
      $this->field_config['id']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['id']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- lasthta
      $this->field_config['lasthta']                 = array();
      $this->field_config['lasthta']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['lasthta']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['lasthta']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['lasthta']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'lasthta');
      //-- partus
      $this->field_config['partus']                 = array();
      $this->field_config['partus']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'] . ';' . $_SESSION['scriptcase']['reg_conf']['time_format'];
      $this->field_config['partus']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['partus']['time_sep']     = $_SESSION['scriptcase']['reg_conf']['time_sep'];
      $this->field_config['partus']['date_display'] = "ddmmaaaa;hhiiss";
      $this->new_date_format('DH', 'partus');
      //-- deleted
      $this->field_config['deleted']               = array();
      $this->field_config['deleted']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['deleted']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['deleted']['symbol_dec'] = '';
      $this->field_config['deleted']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['deleted']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- hamil
      $this->field_config['hamil']               = array();
      $this->field_config['hamil']['symbol_grp'] = $_SESSION['scriptcase']['reg_conf']['grup_num'];
      $this->field_config['hamil']['symbol_fmt'] = $_SESSION['scriptcase']['reg_conf']['num_group_digit'];
      $this->field_config['hamil']['symbol_dec'] = '';
      $this->field_config['hamil']['symbol_neg'] = $_SESSION['scriptcase']['reg_conf']['simb_neg'];
      $this->field_config['hamil']['format_neg'] = $_SESSION['scriptcase']['reg_conf']['neg_num'];
      //-- expdate
      $this->field_config['expdate']                 = array();
      $this->field_config['expdate']['date_format']  = $_SESSION['scriptcase']['reg_conf']['date_format'];
      $this->field_config['expdate']['date_sep']     = $_SESSION['scriptcase']['reg_conf']['date_sep'];
      $this->field_config['expdate']['date_display'] = "ddmmaaaa";
      $this->new_date_format('DT', 'expdate');
   }

   function controle()
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;


      $this->ini_controle();

      if ('' != $_SESSION['scriptcase']['change_regional_old'])
      {
          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_old'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $this->nm_tira_formatacao();

          $_SESSION['scriptcase']['str_conf_reg'] = $_SESSION['scriptcase']['change_regional_new'];
          $this->Ini->regionalDefault($_SESSION['scriptcase']['str_conf_reg']);
          $this->loadFieldConfig();
          $guarda_formatado = $this->formatado;
          $this->nm_formatar_campos();
          $this->formatado = $guarda_formatado;

          $_SESSION['scriptcase']['change_regional_old'] = '';
          $_SESSION['scriptcase']['change_regional_new'] = '';
      }

      if ($nm_form_submit == 1 && ($this->nmgp_opcao == 'inicio' || $this->nmgp_opcao == 'igual'))
      {
          $this->nm_tira_formatacao();
      }
      if (!$this->NM_ajax_flag || 'alterar' != $this->nmgp_opcao || 'submit_form' != $this->NM_ajax_opcao)
      {
      }
//
//-----> 
//
      if ($this->NM_ajax_flag && 'validate_' == substr($this->NM_ajax_opcao, 0, 9))
      {
          if ('validate_custcode' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'custcode');
          }
          if ('validate_name' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'name');
          }
          if ('validate_salut' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'salut');
          }
          if ('validate_birthplace' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'birthplace');
          }
          if ('validate_birthdate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'birthdate');
          }
          if ('validate_sex' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'sex');
          }
          if ('validate_address' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'address');
          }
          if ('validate_rt' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rt');
          }
          if ('validate_rw' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'rw');
          }
          if ('validate_city' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'city');
          }
          if ('validate_kecamatan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kecamatan');
          }
          if ('validate_kelurahan' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'kelurahan');
          }
          if ('validate_hp' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hp');
          }
          if ('validate_blood' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'blood');
          }
          if ('validate_spouse' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'spouse');
          }
          if ('validate_idno' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'idno');
          }
          if ('validate_religion' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'religion');
          }
          if ('validate_job' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'job');
          }
          if ('validate_father' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'father');
          }
          if ('validate_mother' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'mother');
          }
          if ('validate_penanggung' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'penanggung');
          }
          if ('validate_bu' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'bu');
          }
          if ('validate_education' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'education');
          }
          if ('validate_lastupdated' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'lastupdated');
          }
          if ('validate_registerdate' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'registerdate');
          }
          if ('validate_phone' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'phone');
          }
          if ('validate_email' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'email');
          }
          if ('validate_hta' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'hta');
          }
          if ('validate_isdead' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'isdead');
          }
          if ('validate_id' == $this->NM_ajax_opcao)
          {
              $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros, 'id');
          }
          form_tbcustomer_pack_ajax_response();
          exit;
      }
      if ($this->NM_ajax_flag && 'event_' == substr($this->NM_ajax_opcao, 0, 6))
      {
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if ('event_different_address_onchange' == $this->NM_ajax_opcao)
          {
              $this->different_address_onChange();
          }
          if ('event_type_onchange' == $this->NM_ajax_opcao)
          {
              $this->type_onChange();
          }
          form_tbcustomer_pack_ajax_response();
          exit;
      }
      if (isset($this->sc_inline_call) && 'Y' == $this->sc_inline_call)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inline_form_seq'] = $this->sc_seq_row;
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
      }
      if ($this->nmgp_opcao == "recarga" || $this->nmgp_opcao == "recarga_mobile" || $this->nmgp_opcao == "muda_form") 
      {
      if (empty($this->birthdate)) 
      { 
          $s_date_info_pos  = strtolower(str_replace('aaaa', 'yyyy', $this->field_config['birthdate']['date_format']));
          $i_date_pos_day   = strpos($s_date_info_pos, 'dd');
          $i_date_pos_month = strpos($s_date_info_pos, 'mm');
          $i_date_pos_year  = strpos($s_date_info_pos, 'yyyy');
          $i_arr_date_pos   = array($i_date_pos_day => 'd', $i_date_pos_month => 'm', $i_date_pos_year => 'y');
          ksort($i_arr_date_pos);
          foreach ($i_arr_date_pos as $IX => $Part_date)
          {
              if ($Part_date == "d")
              {
                  $this->birthdate .= $this->birthdate_dia ; 
              }
              if ($Part_date == "m")
              {
                  $this->birthdate .= $this->birthdate_mes ; 
              }
              if ($Part_date == "y")
              {
                  $this->birthdate .= $this->birthdate_ano ; 
              }
          }
      } 
          $this->nm_tira_formatacao();
          $this->nm_converte_datas();
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_select']['custcode']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->custcode = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_select']['custcode'];
          } 
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_select']['hta']) && !isset($this->nmgp_refresh_fields))
          { 
              $this->hta = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_select']['hta'];
          } 
          $nm_sc_sv_opcao = $this->nmgp_opcao; 
          $this->nmgp_opcao = "nada"; 
          $this->nm_acessa_banco();
          if ($this->NM_ajax_flag)
          {
              $this->ajax_return_values();
              form_tbcustomer_pack_ajax_response();
              exit;
          }
          $this->nm_formatar_campos();
          $this->nmgp_opcao = $nm_sc_sv_opcao; 
          $this->nm_gera_html();
          $this->NM_close_db(); 
          $this->nmgp_opcao = ""; 
          exit; 
      }
      if ($this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "excluir") 
      {
          $this->Valida_campos($Campos_Crit, $Campos_Falta, $Campos_Erros) ; 
          $_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'off';
          if ($Campos_Crit != "") 
          {
              $Campos_Crit = $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . $Campos_Crit ; 
          }
          if ($Campos_Crit != "" || !empty($Campos_Falta) || $this->Campos_Mens_erro != "")
          {
              if ($this->NM_ajax_flag)
              {
                  form_tbcustomer_pack_ajax_response();
                  exit;
              }
              $campos_erro = $this->Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, 4);
              $this->Campos_Mens_erro = ""; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $campos_erro); 
              $this->nmgp_opc_ant = $this->nmgp_opcao ; 
              if ($this->nmgp_opcao == "incluir" && $nm_apl_dependente == 1) 
              { 
                  $this->nm_flag_saida_novo = "S";; 
              }
              if ($this->nmgp_opcao == "incluir") 
              { 
                  $GLOBALS["erro_incl"] = 1; 
              }
              $this->nmgp_opcao = "nada" ; 
          }
      }
      elseif (isset($nm_form_submit) && 1 == $nm_form_submit && $this->nmgp_opcao != "menu_link" && $this->nmgp_opcao != "recarga_mobile")
      {
      }
//
      if ($this->nmgp_opcao != "nada")
      {
          $this->nm_acessa_banco();
      }
      else
      {
           if ($this->nmgp_opc_ant == "incluir") 
           { 
               $this->nm_proc_onload(false);
           }
           else
           { 
              $this->nm_guardar_campos();
           }
      }
      if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form" && !$this->Apl_com_erro)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['recarga'] = $this->nmgp_opcao;
          if ($this->sc_evento == "update")
          {
              $this->NM_close_db(); 
              $this->nmgp_redireciona(2); 
          }
          if ($this->sc_evento == "insert" || ($this->nmgp_opc_ant == "novo" && $this->nmgp_opcao == "novo" && $this->sc_evento == "novo"))
          {
              $this->NM_close_db(); 
              $this->nmgp_redireciona(2); 
          }
          if ($this->sc_evento == "delete")
          {
              $this->NM_close_db(); 
              $this->nmgp_redireciona(2); 
          }
      }
      if ($this->NM_ajax_flag && 'navigate_form' == $this->NM_ajax_opcao)
      {
          $this->ajax_return_values();
          $this->ajax_add_parameters();
          form_tbcustomer_pack_ajax_response();
          exit;
      }
      $this->nm_formatar_campos();
      if ($this->NM_ajax_flag)
      {
          $this->NM_ajax_info['result'] = 'OK';
          if ('alterar' == $this->NM_ajax_info['param']['nmgp_opcao'])
          {
              $this->NM_ajax_info['msgDisplay'] = NM_charset_to_utf8($this->Ini->Nm_lang['lang_othr_ajax_frmu']);
          }
          form_tbcustomer_pack_ajax_response();
          exit;
      }
      $this->nm_gera_html();
      $this->NM_close_db(); 
      $this->nmgp_opcao = ""; 
      if ($this->Change_Menu)
      {
          $apl_menu  = $_SESSION['scriptcase']['menu_atual'];
          $Arr_rastro = array();
          if (isset($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) && count($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu]) > 1)
          {
              foreach ($_SESSION['scriptcase']['menu_apls'][$apl_menu][$this->sc_init_menu] as $menu => $apls)
              {
                 $Arr_rastro[] = "'<a href=\"" . $apls['link'] . "?script_case_init=" . $this->sc_init_menu . "&script_case_session=" . session_id() . "\" target=\"#NMIframe#\">" . $apls['label'] . "</a>'";
              }
              $ult_apl = count($Arr_rastro) - 1;
              unset($Arr_rastro[$ult_apl]);
              $rastro = implode(",", $Arr_rastro);
?>
  <script type="text/javascript">
     link_atual = new Array (<?php echo $rastro ?>);
     parent.writeFastMenu(link_atual);
  </script>
<?php
          }
          else
          {
?>
  <script type="text/javascript">
     parent.clearFastMenu();
  </script>
<?php
          }
      }
   }
  function html_export_print($nm_arquivo_html, $nmgp_password)
  {
      $Html_password = "";
          $Arq_base  = $this->Ini->root . $this->Ini->path_imag_temp . $nm_arquivo_html;
          $Parm_pass = ($Html_password != "") ? " -p" : "";
          $Zip_name = "sc_prt_" . date("YmdHis") . "_" . rand(0, 1000) . "form_tbcustomer.zip";
          $Arq_htm = $this->Ini->path_imag_temp . "/" . $Zip_name;
          $Arq_zip = $this->Ini->root . $Arq_htm;
          $Zip_f     = (FALSE !== strpos($Arq_zip, ' ')) ? " \"" . $Arq_zip . "\"" :  $Arq_zip;
          $Arq_input = (FALSE !== strpos($Arq_base, ' ')) ? " \"" . $Arq_base . "\"" :  $Arq_base;
           if (is_file($Arq_zip)) {
               unlink($Arq_zip);
           }
           $str_zip = "";
           if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
           {
               chdir($this->Ini->path_third . "/zip/windows");
               $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j " . $Html_password . " " . $Zip_f . " " . $Arq_input;
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
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
           }
           elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
           {
               chdir($this->Ini->path_third . "/zip/mac/bin");
               $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $Arq_input;
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
           foreach ($this->Ini->Img_export_zip as $cada_img_zip)
           {
               $str_zip      = "";
              $cada_img_zip = '"' . $cada_img_zip . '"';
               if (FALSE !== strpos(strtolower(php_uname()), 'windows')) 
               {
                   $str_zip = "zip.exe " . strtoupper($Parm_pass) . " -j -u " . $Html_password . " " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'linux')) 
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
               }
               elseif (FALSE !== strpos(strtolower(php_uname()), 'darwin'))
               {
                   $str_zip = "./7za " . $Parm_pass . $Html_password . " a " . $Zip_f . " " . $cada_img_zip;
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
           }
           if (is_file($Arq_zip)) {
               unlink($Arq_base);
           } 
          $path_doc_md5 = md5($Arq_htm);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer'][$path_doc_md5][0] = $Arq_htm;
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer'][$path_doc_md5][1] = $Zip_name;
?>
<HTML<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Master Pasien") ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_export<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="../_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" /> 
  <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" /> 
  <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
</HEAD>
<BODY class="scExportPage">
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: top">
 <table class="scExportTable" align="center">
  <tr>
   <td class="scExportTitle" style="height: 25px">PRINT</td>
  </tr>
  <tr>
   <td class="scExportLine" style="width: 100%">
    <table style="border-collapse: collapse; border-width: 0; width: 100%"><tr><td class="scExportLineFont" style="padding: 3px 0 0 0" id="idMessage">
    <?php echo $this->Ini->Nm_lang['lang_othr_file_msge'] ?>
    </td><td class="scExportLineFont" style="text-align:right; padding: 3px 0 0 0">
   <?php echo nmButtonOutput($this->arr_buttons, "bexportview", "document.Fview.submit()", "document.Fview.submit()", "idBtnView", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bdownload", "document.Fdown.submit()", "document.Fdown.submit()", "idBtnDown", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

   <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "document.F0.submit()", "document.F0.submit()", "idBtnBack", "", "", "", "absmiddle", "", "0", $this->Ini->path_botoes, "", "", "", "", "");?>

    </td></tr></table>
   </td>
  </tr>
 </table>
</td></tr></table>
<form name="Fview" method="get" action="<?php echo  $this->form_encode_input($Arq_htm) ?>" target="_self" style="display: none"> 
</form>
<form name="Fdown" method="get" action="form_tbcustomer_download.php" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="nm_tit_doc" value="form_tbcustomer"> 
<input type="hidden" name="nm_name_doc" value="<?php echo $path_doc_md5 ?>"> 
</form>
<form name="F0" method=post action="./" target="_self" style="display: none"> 
<input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
<input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<input type="hidden" name="nmgp_opcao" value="<?php echo $this->nmgp_opcao ?>"> 
</form> 
         </BODY>
         </HTML>
<?php
          exit;
  }
//
//--------------------------------------------------------------------------------------
   function NM_has_trans()
   {
       return !in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access);
   }
//
//--------------------------------------------------------------------------------------
   function NM_commit_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->CommitTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_rollback_db()
   {
       if ($this->Ini->sc_tem_trans_banco && !$this->Embutida_proc)
       { 
           $this->Db->RollbackTrans(); 
           $this->Ini->sc_tem_trans_banco = false;
       } 
   }
//
//--------------------------------------------------------------------------------------
   function NM_close_db()
   {
       if ($this->Db && !$this->Embutida_proc)
       { 
           $this->Db->Close(); 
       } 
   }
   function sc_btn_sc_btn_2() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
     ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

      if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
      {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }

?>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript">
      var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
      var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_userSweetAlertDisplayed = false;
    </SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<?php
include_once("form_tbcustomer_sajax_js.php");
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
    <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 </head>
  <body class="scFormPage">
      <table class="scFormTabela" align="center"><tr><td>
<?php
      $varloc_btn_php = array();
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->name) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['name']))
          {
              $varloc_btn_php['name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['name'];
          }
          if (!isset($this->address) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['address']))
          {
              $varloc_btn_php['address'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['address'];
          }
          if (!isset($this->city) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['city']))
          {
              $varloc_btn_php['city'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['city'];
          }
          if (!isset($this->phone) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['phone']))
          {
              $varloc_btn_php['phone'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['phone'];
          }
          if (!isset($this->hp) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['hp']))
          {
              $varloc_btn_php['hp'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['hp'];
          }
          if (!isset($this->name) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['name']))
          {
              $varloc_btn_php['name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['name'];
          }
          if (!isset($this->spouse) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['spouse']))
          {
              $varloc_btn_php['spouse'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['spouse'];
          }
          if (!isset($this->religion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['religion']))
          {
              $varloc_btn_php['religion'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['religion'];
          }
          if (!isset($this->kelurahan) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['kelurahan']))
          {
              $varloc_btn_php['kelurahan'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['kelurahan'];
          }
          if (!isset($this->kecamatan) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['kecamatan']))
          {
              $varloc_btn_php['kecamatan'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['kecamatan'];
          }
          if (!isset($this->rt) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['rt']))
          {
              $varloc_btn_php['rt'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['rt'];
          }
          if (!isset($this->rw) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['rw']))
          {
              $varloc_btn_php['rw'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['rw'];
          }
      }
      $nm_f_saida = "./";
      $this->birthdate = ""; 
      $this->birthdate .= $this->birthdate_mes ; 
      $this->birthdate .= $this->birthdate_dia ; 
      $this->birthdate .= $this->birthdate_ano ; 
      nm_limpa_data($this->lastupdated, $this->field_config['lastupdated']['date_sep']) ; 
      nm_limpa_data($this->registerdate, $this->field_config['registerdate']['date_sep']) ; 
      nm_limpa_data($this->hta, $this->field_config['hta']['date_sep']) ; 
      nm_limpa_hora($this->hta_hora, $this->field_config['hta']['time_sep']) ; 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'on';
  $check_sql = "SELECT max(custCode) FROM tbcustomer";
 
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
$ids = $this->rs[0][0]+'1';

if ($ids < '10'){
$this->custcode = "00000$ids";
}
elseif ($ids < '100'){
$this->custcode = "0000$ids";
}
elseif ($ids < '1000'){
$this->custcode = "000$ids";
}
elseif ($ids < '10000'){
$this->custcode = "00$ids";
}
elseif ($ids < '100000'){
$this->custcode = "0$ids";
}
elseif ($ids < '1000000'){
$this->custcode = "$ids";
}

$datenow = date('Y-m-d');

$insert_table  = 'tbcustomer';      
$insert_fields = array(   
     'custCode' => "'$this->custcode'",
     'name' => "'BY NY $this->name '",
	 'salut' => "'AN.'",
     'address' => "'$this->address'",
	 'city' => "'$this->city'",
     'birthDate' => "'$datenow'",
	 'phone' => "'$this->phone'",
     'hp' => "'$this->hp'",
	 'mother' => "'$this->name'",
     'father' => "'$this->spouse'",
	 'religion' => "'$this->religion'",
     'birthplace' => "'JAKARTA'",
	 'kelurahan' => "'$this->kelurahan'",
     'kecamatan' => "'$this->kecamatan'",
 	 'rt' => "'$this->rt'",
     'rw' => "'$this->rw'",
	 'registerDate' => "'$datenow'",
	 'sex' => "'L'",
 );

$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';


     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_tbcustomer_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"/>
      <input type=hidden name="id" value="<?php echo $this->form_encode_input($this->id) ?>"/>
      <input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($nmgp_opcao_saida_php); ?>"/>
      <input type=hidden name="nmgp_opc_ant" value="<?php echo $this->form_encode_input($nmgp_opc_ant_saida_php); ?>"/>
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>" onclick="window.close()"/>
      </form>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
   function sc_btn_sc_btn_3() 
   {
        global $nm_url_saida, $teste_validade, 
               $glo_senha_protect, $nm_apl_dependente, $nm_form_submit, $sc_check_excl, $nm_opc_form_php, $nm_call_php, $nm_opc_lookup;
 
     ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
 <head>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

      if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
      {
?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
      }

?>
        <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
    <SCRIPT type="text/javascript">
      var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
      var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
      var sc_userSweetAlertDisplayed = false;
    </SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
<?php
include_once("form_tbcustomer_sajax_js.php");
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
    <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
    <link rel="stylesheet" type="text/css" href="../_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 </head>
  <body class="scFormPage">
      <table class="scFormTabela" align="center"><tr><td>
<?php
      $varloc_btn_php = array();
      $nmgp_opcao_saida_php = "igual";
      $nmgp_opc_ant_saida_php = "";
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opc_ant'] == "novo" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opc_ant'] == "incluir")
      {
          $nmgp_opc_ant_saida_php = "novo";
          $nmgp_opcao_saida_php   = "recarga";
      }
      else
      {
          if (!isset($this->name) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['name']))
          {
              $varloc_btn_php['name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['name'];
          }
          if (!isset($this->address) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['address']))
          {
              $varloc_btn_php['address'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['address'];
          }
          if (!isset($this->city) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['city']))
          {
              $varloc_btn_php['city'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['city'];
          }
          if (!isset($this->phone) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['phone']))
          {
              $varloc_btn_php['phone'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['phone'];
          }
          if (!isset($this->hp) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['hp']))
          {
              $varloc_btn_php['hp'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['hp'];
          }
          if (!isset($this->name) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['name']))
          {
              $varloc_btn_php['name'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['name'];
          }
          if (!isset($this->spouse) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['spouse']))
          {
              $varloc_btn_php['spouse'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['spouse'];
          }
          if (!isset($this->religion) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['religion']))
          {
              $varloc_btn_php['religion'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['religion'];
          }
          if (!isset($this->kelurahan) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['kelurahan']))
          {
              $varloc_btn_php['kelurahan'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['kelurahan'];
          }
          if (!isset($this->kecamatan) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['kecamatan']))
          {
              $varloc_btn_php['kecamatan'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['kecamatan'];
          }
          if (!isset($this->rt) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['rt']))
          {
              $varloc_btn_php['rt'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['rt'];
          }
          if (!isset($this->rw) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['rw']))
          {
              $varloc_btn_php['rw'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form']['rw'];
          }
      }
      $nm_f_saida = "./";
      $this->birthdate = ""; 
      $this->birthdate .= $this->birthdate_mes ; 
      $this->birthdate .= $this->birthdate_dia ; 
      $this->birthdate .= $this->birthdate_ano ; 
      nm_limpa_data($this->lastupdated, $this->field_config['lastupdated']['date_sep']) ; 
      nm_limpa_data($this->registerdate, $this->field_config['registerdate']['date_sep']) ; 
      nm_limpa_data($this->hta, $this->field_config['hta']['date_sep']) ; 
      nm_limpa_hora($this->hta_hora, $this->field_config['hta']['time_sep']) ; 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      $this->nm_converte_datas();
      foreach ($varloc_btn_php as $cmp => $val_cmp)
      {
          $this->$cmp = $val_cmp;
      }
      $_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'on';
  $check_sql = "SELECT max(custCode) FROM tbcustomer";
 
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
$ids = $this->rs[0][0]+'1';

if ($ids < '10'){
$this->custcode = "00000$ids";
}
elseif ($ids < '100'){
$this->custcode = "0000$ids";
}
elseif ($ids < '1000'){
$this->custcode = "000$ids";
}
elseif ($ids < '10000'){
$this->custcode = "00$ids";
}
elseif ($ids < '100000'){
$this->custcode = "0$ids";
}
elseif ($ids < '1000000'){
$this->custcode = "$ids";
}

$datenow = date('Y-m-d');

$insert_table  = 'tbcustomer';      
$insert_fields = array(   
     'custCode' => "'$this->custcode'",
     'name' => "'BY NY $this->name '",
	 'salut' => "'AN.'",
     'address' => "'$this->address'",
	 'city' => "'$this->city'",
     'birthDate' => "'$datenow'",
	 'phone' => "'$this->phone'",
     'hp' => "'$this->hp'",
	 'mother' => "'$this->name'",
     'father' => "'$this->spouse'",
	 'religion' => "'$this->religion'",
     'birthplace' => "'JAKARTA'",
	 'kelurahan' => "'$this->kelurahan'",
     'kecamatan' => "'$this->kecamatan'",
	 'rt' => "'$this->rt'",
     'rw' => "'$this->rw'",
	 'registerDate' => "'$datenow'",
	 'sex' => "'P'",
 );

$insert_sql = 'INSERT INTO ' . $insert_table
    . ' ('   . implode(', ', array_keys($insert_fields))   . ')'
    . ' VALUES ('    . implode(', ', array_values($insert_fields)) . ')';


     $nm_select = $insert_sql; 
         $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_select;
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
         $rf = $this->Db->Execute($nm_select);
         if ($rf === false)
         {
             $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg());
             $this->NM_rollback_db(); 
             if ($this->NM_ajax_flag)
             {
                form_tbcustomer_pack_ajax_response();
             }
             exit;
         }
         $rf->Close();
      ;
$_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'off'; 
    echo ob_get_clean();
?>
      </td></tr><tr><td align="center">
      <form name="FPHP" method="post" 
                        action="<?php echo $nm_f_saida ?>" 
                        target="_self">
      <input type=hidden name="nmgp_opcao" value=""/>
      <input type=hidden name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>"/>
      <input type=hidden name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>"/>
      <input type=hidden name="id" value="<?php echo $this->form_encode_input($this->id) ?>"/>
      <input type=hidden name="nmgp_opcao" value="<?php echo $this->form_encode_input($nmgp_opcao_saida_php); ?>"/>
      <input type=hidden name="nmgp_opc_ant" value="<?php echo $this->form_encode_input($nmgp_opc_ant_saida_php); ?>"/>
      <input type=submit name="nmgp_bok" value="<?php echo $this->Ini->Nm_lang['lang_btns_cfrm'] ?>" onclick="window.close()"/>
      </form>
      </td></tr></table>
      </body>
      </html>
<?php
       if (isset($this->redir_modal) && !empty($this->redir_modal))
       {
           echo "<script type=\"text/javascript\">" . $this->redir_modal . "</script>";
           $this->redir_modal = "";
       }
   }
//
//--------------------------------------------------------------------------------------
   function Formata_Erros($Campos_Crit, $Campos_Falta, $Campos_Erros, $mode = 3) 
   {
       switch ($mode)
       {
           case 1:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 2:
               $campos_erro = array();
               if (!empty($Campos_Crit))
               {
                   $campos_erro[] = $Campos_Crit;
               }
               if (!empty($Campos_Falta))
               {
                   $campos_erro[] = $this->Formata_Campos_Falta($Campos_Falta, true);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_erro[] = $this->Campos_Mens_erro;
               }
               return implode('<br />', $campos_erro);
               break;

           case 3:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;

           case 4:
               $campos_erro = array();
               if (!empty($Campos_Erros))
               {
                   $campos_erro[] = $this->Formata_Campos_Erros_SweetAlert($Campos_Erros);
               }
               if (!empty($this->Campos_Mens_erro))
               {
                   $campos_mens_erro = str_replace(array('<br />', '<br>', '<BR />'), array('<BR>', '<BR>', '<BR>'), $this->Campos_Mens_erro);
                   $campos_mens_erro = explode('<BR>', $campos_mens_erro);
                   foreach ($campos_mens_erro as $msg_erro)
                   {
                       if ('' != $msg_erro && !in_array($msg_erro, $campos_erro))
                       {
                           $campos_erro[] = $msg_erro;
                       }
                   }
               }
               return implode('<br />', $campos_erro);
               break;
       }
   }

   function Formata_Campos_Falta($Campos_Falta, $table = false) 
   {
       $Campos_Falta = array_unique($Campos_Falta);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_reqd'] . ' ' . implode('; ', $Campos_Falta);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Falta);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Falta as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_reqd'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Crit($Campos_Crit, $table = false) 
   {
       $Campos_Crit = array_unique($Campos_Crit);

       if (!$table)
       {
           return $this->Ini->Nm_lang['lang_errm_flds'] . ' ' . implode('; ', $Campos_Crit);
       }

       $aCols  = array();
       $iTotal = sizeof($Campos_Crit);
       $iCols  = 6 > $iTotal ? 1 : (11 > $iTotal ? 2 : (16 > $iTotal ? 3 : 4));
       $iItems = ceil($iTotal / $iCols);
       $iNowC  = 0;
       $iNowI  = 0;

       foreach ($Campos_Crit as $campo)
       {
           $aCols[$iNowC][] = $campo;
           if ($iItems == ++$iNowI)
           {
               $iNowC++;
               $iNowI = 0;
           }
       }

       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';
       $sError .= '<tr>';
       $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Ini->Nm_lang['lang_errm_flds'] . '</td>';
       foreach ($aCols as $aCol)
       {
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', $aCol) . '</td>';
       }
       $sError .= '</tr>';
       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros($Campos_Erros) 
   {
       $sError  = '<table style="border-collapse: collapse; border-width: 0px">';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= '<tr>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0; vertical-align: top; white-space: nowrap">' . $this->Recupera_Nome_Campo($campo) . ':</td>';
           $sError .= '<td class="scFormErrorMessageFont" style="padding: 0 6px; vertical-align: top; white-space: nowrap">' . implode('<br />', array_unique($erros)) . '</td>';
           $sError .= '</tr>';
       }

       $sError .= '</table>';

       return $sError;
   }

   function Formata_Campos_Erros_SweetAlert($Campos_Erros) 
   {
       $sError  = '';

       foreach ($Campos_Erros as $campo => $erros)
       {
           $sError .= $this->Recupera_Nome_Campo($campo) . ': ' . implode('<br />', array_unique($erros)) . '<br />';
       }

       return $sError;
   }

   function Recupera_Nome_Campo($campo) 
   {
       switch($campo)
       {
           case 'custcode':
               return "No. RM";
               break;
           case 'name':
               return "Nama";
               break;
           case 'salut':
               return "Panggilan";
               break;
           case 'birthplace':
               return "Tempat Lahir";
               break;
           case 'birthdate':
               return "Tanggal Lahir";
               break;
           case 'sex':
               return "Jenis Kelamin";
               break;
           case 'address':
               return "Alamat";
               break;
           case 'rt':
               return "RT";
               break;
           case 'rw':
               return "RW";
               break;
           case 'city':
               return "Kota";
               break;
           case 'kecamatan':
               return "Kecamatan";
               break;
           case 'kelurahan':
               return "Kelurahan";
               break;
           case 'hp':
               return "Handphone";
               break;
           case 'blood':
               return "Gol. Darah";
               break;
           case 'spouse':
               return "Nama Pasangan";
               break;
           case 'idno':
               return "No. ID (KTP/SIM)";
               break;
           case 'religion':
               return "Agama";
               break;
           case 'job':
               return "Pekerjaan";
               break;
           case 'father':
               return "Nama Ayah";
               break;
           case 'mother':
               return "Nama Ibu";
               break;
           case 'penanggung':
               return "Nama Penanggung";
               break;
           case 'bu':
               return "Perusahaan";
               break;
           case 'education':
               return "Pendidikan";
               break;
           case 'lastupdated':
               return "Last Updated";
               break;
           case 'registerdate':
               return "Register Date";
               break;
           case 'phone':
               return "Telepon";
               break;
           case 'email':
               return "Email";
               break;
           case 'hta':
               return "HTA";
               break;
           case 'isdead':
               return "Meninggal ?";
               break;
           case 'id':
               return "ID";
               break;
           case 'postcode':
               return "Kode Pos";
               break;
           case 'type':
               return "Jenis Pembayaran";
               break;
           case 'typename':
               return "Jaminan";
               break;
           case 'lasthta':
               return "Last Hta";
               break;
           case 'bbtb':
               return "Bbtb";
               break;
           case 'partus':
               return "Partus";
               break;
           case 'deleted':
               return "Deleted";
               break;
           case 'hamil':
               return "Hamil";
               break;
           case 'location':
               return "Location";
               break;
           case 'member':
               return "No. Member";
               break;
           case 'jenis':
               return "Jenis";
               break;
           case 'expdate':
               return "Tgl. Exp";
               break;
           case 'photoname':
               return "Photo Name";
               break;
           case 'tlc':
               return "Tlc";
               break;
           case 'nip':
               return "Nip";
               break;
           case 'instno':
               return "Inst No";
               break;
           case 'kelompokcode':
               return "Kelompok Code";
               break;
           case 'kelompok':
               return "Kelompok";
               break;
           case 'cardno':
               return "No. Member";
               break;
           case 'statusbl':
               return "Status BL";
               break;
       }

       return $campo;
   }

   function dateDefaultFormat()
   {
       if (isset($this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']))
       {
           $sDate = str_replace('yyyy', 'Y', $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_format']);
           $sDate = str_replace('mm',   'm', $sDate);
           $sDate = str_replace('dd',   'd', $sDate);
           return substr(chunk_split($sDate, 1, $this->Ini->Nm_conf_reg[$this->Ini->str_conf_reg]['data_sep']), 0, -1);
       }
       elseif ('en_us' == $this->Ini->str_lang)
       {
           return 'm/d/Y';
       }
       else
       {
           return 'd/m/Y';
       }
   } // dateDefaultFormat

//
//--------------------------------------------------------------------------------------
   function Valida_campos(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros, $filtro = '') 
   {
     global $nm_browser, $teste_validade;
//---------------------------------------------------------
     $this->sc_force_zero = array();

     if ('' == $filtro && isset($this->nm_form_submit) && '1' == $this->nm_form_submit && $this->scCsrfGetToken() != $this->csrf_token)
     {
          $this->Campos_Mens_erro .= (empty($this->Campos_Mens_erro)) ? "" : "<br />";
          $this->Campos_Mens_erro .= "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          if ($this->NM_ajax_flag)
          {
              if (!isset($this->NM_ajax_info['errList']['geral_form_tbcustomer']) || !is_array($this->NM_ajax_info['errList']['geral_form_tbcustomer']))
              {
                  $this->NM_ajax_info['errList']['geral_form_tbcustomer'] = array();
              }
              $this->NM_ajax_info['errList']['geral_form_tbcustomer'][] = "CSRF: " . $this->Ini->Nm_lang['lang_errm_ajax_csrf'];
          }
     }
      if ('' == $filtro || 'custcode' == $filtro)
        $this->ValidateField_custcode($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'name' == $filtro)
        $this->ValidateField_name($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'salut' == $filtro)
        $this->ValidateField_salut($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'birthplace' == $filtro)
        $this->ValidateField_birthplace($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'birthdate' == $filtro)
        $this->ValidateField_birthdate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'sex' == $filtro)
        $this->ValidateField_sex($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'address' == $filtro)
        $this->ValidateField_address($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rt' == $filtro)
        $this->ValidateField_rt($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'rw' == $filtro)
        $this->ValidateField_rw($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'city' == $filtro)
        $this->ValidateField_city($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kecamatan' == $filtro)
        $this->ValidateField_kecamatan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'kelurahan' == $filtro)
        $this->ValidateField_kelurahan($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hp' == $filtro)
        $this->ValidateField_hp($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'blood' == $filtro)
        $this->ValidateField_blood($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'spouse' == $filtro)
        $this->ValidateField_spouse($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'idno' == $filtro)
        $this->ValidateField_idno($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'religion' == $filtro)
        $this->ValidateField_religion($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'job' == $filtro)
        $this->ValidateField_job($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'father' == $filtro)
        $this->ValidateField_father($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'mother' == $filtro)
        $this->ValidateField_mother($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'penanggung' == $filtro)
        $this->ValidateField_penanggung($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'bu' == $filtro)
        $this->ValidateField_bu($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'education' == $filtro)
        $this->ValidateField_education($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'lastupdated' == $filtro)
        $this->ValidateField_lastupdated($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'registerdate' == $filtro)
        $this->ValidateField_registerdate($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'phone' == $filtro)
        $this->ValidateField_phone($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'email' == $filtro)
        $this->ValidateField_email($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'hta' == $filtro)
        $this->ValidateField_hta($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'isdead' == $filtro)
        $this->ValidateField_isdead($Campos_Crit, $Campos_Falta, $Campos_Erros);
      if ('' == $filtro || 'id' == $filtro)
        $this->ValidateField_id($Campos_Crit, $Campos_Falta, $Campos_Erros);
//-- converter datas   
          $this->nm_converte_datas();
//---
      if (!empty($Campos_Crit) || !empty($Campos_Falta) || !empty($this->Campos_Mens_erro))
      {
          if (!empty($this->sc_force_zero))
          {
              foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
              {
                  eval('$this->' . $sc_force_zero_field . ' = "";');
                  unset($this->sc_force_zero[$i_force_zero]);
              }
          }
      }
   }

    function ValidateField_custcode(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->custcode) > 8) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. RM " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['custcode']))
              {
                  $Campos_Erros['custcode'] = array();
              }
              $Campos_Erros['custcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['custcode']) || !is_array($this->NM_ajax_info['errList']['custcode']))
              {
                  $this->NM_ajax_info['errList']['custcode'] = array();
              }
              $this->NM_ajax_info['errList']['custcode'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 8 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'custcode';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_custcode

    function ValidateField_name(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->name = sc_strtoupper($this->name); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->name) > 40) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['name']))
              {
                  $Campos_Erros['name'] = array();
              }
              $Campos_Erros['name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['name']) || !is_array($this->NM_ajax_info['errList']['name']))
              {
                  $this->NM_ajax_info['errList']['name'] = array();
              }
              $this->NM_ajax_info['errList']['name'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 40 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'name';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_name

    function ValidateField_salut(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->salut == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'salut';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_salut

    function ValidateField_birthplace(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->birthplace = sc_strtoupper($this->birthplace); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->birthplace) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Tempat Lahir " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['birthplace']))
              {
                  $Campos_Erros['birthplace'] = array();
              }
              $Campos_Erros['birthplace'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['birthplace']) || !is_array($this->NM_ajax_info['errList']['birthplace']))
              {
                  $this->NM_ajax_info['errList']['birthplace'] = array();
              }
              $this->NM_ajax_info['errList']['birthplace'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'birthplace';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_birthplace

    function ValidateField_birthdate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if (empty($this->birthdate)) 
      { 
         $s_date_info_pos  = strtolower(str_replace('aaaa', 'yyyy', $this->field_config['birthdate']['date_format']));
         $i_date_pos_day   = strpos($s_date_info_pos, 'dd');
         $i_date_pos_month = strpos($s_date_info_pos, 'mm');
         $i_date_pos_year  = strpos($s_date_info_pos, 'yyyy');
         $i_arr_date_pos   = array($i_date_pos_day => 'd', $i_date_pos_month => 'm', $i_date_pos_year => 'y');
         ksort($i_arr_date_pos);
         foreach ($i_arr_date_pos as $IX => $Part_date)
         {
             if ($Part_date == "d")
             {
                 $this->birthdate .= $this->birthdate_dia ; 
             }
             if ($Part_date == "m")
             {
                 $this->birthdate .= $this->birthdate_mes ; 
             }
             if ($Part_date == "y")
             {
                 $this->birthdate .= $this->birthdate_ano ; 
             }
         }
      } 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['birthdate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['birthdate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['birthdate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['birthdate']['date_sep']) ; 
          if (trim($this->birthdate) != "")  
          { 
              if ($teste_validade->Data($this->birthdate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Tanggal Lahir; " ; 
                  if (!isset($Campos_Erros['birthdate']))
                  {
                      $Campos_Erros['birthdate'] = array();
                  }
                  $Campos_Erros['birthdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['birthdate']) || !is_array($this->NM_ajax_info['errList']['birthdate']))
                  {
                      $this->NM_ajax_info['errList']['birthdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['birthdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['birthdate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'birthdate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_birthdate

    function ValidateField_sex(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->sex == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'sex';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_sex

    function ValidateField_address(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->address = sc_strtoupper($this->address); 
      if ($this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['address']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['address'] == "on")) 
      { 
          if ($this->address == "")  
          { 
              $hasError = true;
              $Campos_Falta[] =  "Alamat" ; 
              if (!isset($Campos_Erros['address']))
              {
                  $Campos_Erros['address'] = array();
              }
              $Campos_Erros['address'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
                  if (!isset($this->NM_ajax_info['errList']['address']) || !is_array($this->NM_ajax_info['errList']['address']))
                  {
                      $this->NM_ajax_info['errList']['address'] = array();
                  }
                  $this->NM_ajax_info['errList']['address'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          } 
      } 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->address) > 200) 
          { 
              $hasError = true;
              $Campos_Crit .= "Alamat " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['address']))
              {
                  $Campos_Erros['address'] = array();
              }
              $Campos_Erros['address'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['address']) || !is_array($this->NM_ajax_info['errList']['address']))
              {
                  $this->NM_ajax_info['errList']['address'] = array();
              }
              $this->NM_ajax_info['errList']['address'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 200 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'address';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_address

    function ValidateField_rt(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->rt = sc_strtoupper($this->rt); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->rt) > 3) 
          { 
              $hasError = true;
              $Campos_Crit .= "RT " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['rt']))
              {
                  $Campos_Erros['rt'] = array();
              }
              $Campos_Erros['rt'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['rt']) || !is_array($this->NM_ajax_info['errList']['rt']))
              {
                  $this->NM_ajax_info['errList']['rt'] = array();
              }
              $this->NM_ajax_info['errList']['rt'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rt';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rt

    function ValidateField_rw(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->rw = sc_strtoupper($this->rw); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->rw) > 3) 
          { 
              $hasError = true;
              $Campos_Crit .= "RW " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['rw']))
              {
                  $Campos_Erros['rw'] = array();
              }
              $Campos_Erros['rw'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['rw']) || !is_array($this->NM_ajax_info['errList']['rw']))
              {
                  $this->NM_ajax_info['errList']['rw'] = array();
              }
              $this->NM_ajax_info['errList']['rw'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 3 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'rw';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_rw

    function ValidateField_city(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->city == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['city']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['city'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Kota" ; 
          if (!isset($Campos_Erros['city']))
          {
              $Campos_Erros['city'] = array();
          }
          $Campos_Erros['city'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['city']) || !is_array($this->NM_ajax_info['errList']['city']))
          {
              $this->NM_ajax_info['errList']['city'] = array();
          }
          $this->NM_ajax_info['errList']['city'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->city) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']) && !in_array($this->city, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['city']))
              {
                  $Campos_Erros['city'] = array();
              }
              $Campos_Erros['city'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['city']) || !is_array($this->NM_ajax_info['errList']['city']))
              {
                  $this->NM_ajax_info['errList']['city'] = array();
              }
              $this->NM_ajax_info['errList']['city'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'city';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_city

    function ValidateField_kecamatan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->kecamatan == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['kecamatan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['kecamatan'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Kecamatan" ; 
          if (!isset($Campos_Erros['kecamatan']))
          {
              $Campos_Erros['kecamatan'] = array();
          }
          $Campos_Erros['kecamatan'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['kecamatan']) || !is_array($this->NM_ajax_info['errList']['kecamatan']))
          {
              $this->NM_ajax_info['errList']['kecamatan'] = array();
          }
          $this->NM_ajax_info['errList']['kecamatan'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->kecamatan) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']) && !in_array($this->kecamatan, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['kecamatan']))
              {
                  $Campos_Erros['kecamatan'] = array();
              }
              $Campos_Erros['kecamatan'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['kecamatan']) || !is_array($this->NM_ajax_info['errList']['kecamatan']))
              {
                  $this->NM_ajax_info['errList']['kecamatan'] = array();
              }
              $this->NM_ajax_info['errList']['kecamatan'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kecamatan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kecamatan

    function ValidateField_kelurahan(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->kelurahan == "" && $this->nmgp_opcao != "excluir" && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['kelurahan']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['php_cmp_required']['kelurahan'] == "on"))
      {
          $hasError = true;
          $Campos_Falta[] = "Kelurahan" ; 
          if (!isset($Campos_Erros['kelurahan']))
          {
              $Campos_Erros['kelurahan'] = array();
          }
          $Campos_Erros['kelurahan'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
          if (!isset($this->NM_ajax_info['errList']['kelurahan']) || !is_array($this->NM_ajax_info['errList']['kelurahan']))
          {
              $this->NM_ajax_info['errList']['kelurahan'] = array();
          }
          $this->NM_ajax_info['errList']['kelurahan'][] = $this->Ini->Nm_lang['lang_errm_ajax_rqrd'];
      }
          if (!empty($this->kelurahan) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']) && !in_array($this->kelurahan, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']))
          {
              $hasError = true;
              $Campos_Crit .= $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($Campos_Erros['kelurahan']))
              {
                  $Campos_Erros['kelurahan'] = array();
              }
              $Campos_Erros['kelurahan'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
              if (!isset($this->NM_ajax_info['errList']['kelurahan']) || !is_array($this->NM_ajax_info['errList']['kelurahan']))
              {
                  $this->NM_ajax_info['errList']['kelurahan'] = array();
              }
              $this->NM_ajax_info['errList']['kelurahan'][] = $this->Ini->Nm_lang['lang_errm_ajax_data'];
          }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'kelurahan';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_kelurahan

    function ValidateField_hp(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->hp) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Handphone " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['hp']))
              {
                  $Campos_Erros['hp'] = array();
              }
              $Campos_Erros['hp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['hp']) || !is_array($this->NM_ajax_info['errList']['hp']))
              {
                  $this->NM_ajax_info['errList']['hp'] = array();
              }
              $this->NM_ajax_info['errList']['hp'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->hp ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->hp, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Handphone " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['hp']))
              {
                  $Campos_Erros['hp'] = array();
              }
              $Campos_Erros['hp'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['hp']) || !is_array($this->NM_ajax_info['errList']['hp']))
              {
                  $this->NM_ajax_info['errList']['hp'] = array();
              }
              $this->NM_ajax_info['errList']['hp'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hp';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hp

    function ValidateField_blood(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->blood == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'blood';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_blood

    function ValidateField_spouse(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->spouse = sc_strtoupper($this->spouse); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->spouse) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama Pasangan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['spouse']))
              {
                  $Campos_Erros['spouse'] = array();
              }
              $Campos_Erros['spouse'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['spouse']) || !is_array($this->NM_ajax_info['errList']['spouse']))
              {
                  $this->NM_ajax_info['errList']['spouse'] = array();
              }
              $this->NM_ajax_info['errList']['spouse'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'spouse';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_spouse

    function ValidateField_idno(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->idno) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. ID (KTP/SIM) " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['idno']))
              {
                  $Campos_Erros['idno'] = array();
              }
              $Campos_Erros['idno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['idno']) || !is_array($this->NM_ajax_info['errList']['idno']))
              {
                  $this->NM_ajax_info['errList']['idno'] = array();
              }
              $this->NM_ajax_info['errList']['idno'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->idno ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->idno, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "No. ID (KTP/SIM) " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['idno']))
              {
                  $Campos_Erros['idno'] = array();
              }
              $Campos_Erros['idno'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['idno']) || !is_array($this->NM_ajax_info['errList']['idno']))
              {
                  $this->NM_ajax_info['errList']['idno'] = array();
              }
              $this->NM_ajax_info['errList']['idno'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'idno';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_idno

    function ValidateField_religion(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->religion == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'religion';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_religion

    function ValidateField_job(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->job == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'job';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_job

    function ValidateField_father(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->father = sc_strtoupper($this->father); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->father) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama Ayah " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['father']))
              {
                  $Campos_Erros['father'] = array();
              }
              $Campos_Erros['father'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['father']) || !is_array($this->NM_ajax_info['errList']['father']))
              {
                  $this->NM_ajax_info['errList']['father'] = array();
              }
              $this->NM_ajax_info['errList']['father'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'father';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_father

    function ValidateField_mother(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->mother = sc_strtoupper($this->mother); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->mother) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama Ibu " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['mother']))
              {
                  $Campos_Erros['mother'] = array();
              }
              $Campos_Erros['mother'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['mother']) || !is_array($this->NM_ajax_info['errList']['mother']))
              {
                  $this->NM_ajax_info['errList']['mother'] = array();
              }
              $this->NM_ajax_info['errList']['mother'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'mother';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_mother

    function ValidateField_penanggung(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      $this->penanggung = sc_strtoupper($this->penanggung); 
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->penanggung) > 25) 
          { 
              $hasError = true;
              $Campos_Crit .= "Nama Penanggung " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['penanggung']))
              {
                  $Campos_Erros['penanggung'] = array();
              }
              $Campos_Erros['penanggung'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['penanggung']) || !is_array($this->NM_ajax_info['errList']['penanggung']))
              {
                  $this->NM_ajax_info['errList']['penanggung'] = array();
              }
              $this->NM_ajax_info['errList']['penanggung'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 25 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'penanggung';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_penanggung

    function ValidateField_bu(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->bu) > 50) 
          { 
              $hasError = true;
              $Campos_Crit .= "Perusahaan " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['bu']))
              {
                  $Campos_Erros['bu'] = array();
              }
              $Campos_Erros['bu'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['bu']) || !is_array($this->NM_ajax_info['errList']['bu']))
              {
                  $this->NM_ajax_info['errList']['bu'] = array();
              }
              $this->NM_ajax_info['errList']['bu'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 50 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'bu';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_bu

    function ValidateField_education(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->education == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'education';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_education

    function ValidateField_lastupdated(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->lastupdated, $this->field_config['lastupdated']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['lastupdated']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['lastupdated']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['lastupdated']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['lastupdated']['date_sep']) ; 
          if (trim($this->lastupdated) != "")  
          { 
              if ($teste_validade->Data($this->lastupdated, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Last Updated; " ; 
                  if (!isset($Campos_Erros['lastupdated']))
                  {
                      $Campos_Erros['lastupdated'] = array();
                  }
                  $Campos_Erros['lastupdated'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['lastupdated']) || !is_array($this->NM_ajax_info['errList']['lastupdated']))
                  {
                      $this->NM_ajax_info['errList']['lastupdated'] = array();
                  }
                  $this->NM_ajax_info['errList']['lastupdated'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['lastupdated']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'lastupdated';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_lastupdated

    function ValidateField_registerdate(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->registerdate, $this->field_config['registerdate']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['registerdate']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['registerdate']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['registerdate']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['registerdate']['date_sep']) ; 
          if (trim($this->registerdate) != "")  
          { 
              if ($teste_validade->Data($this->registerdate, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "Register Date; " ; 
                  if (!isset($Campos_Erros['registerdate']))
                  {
                      $Campos_Erros['registerdate'] = array();
                  }
                  $Campos_Erros['registerdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['registerdate']) || !is_array($this->NM_ajax_info['errList']['registerdate']))
                  {
                      $this->NM_ajax_info['errList']['registerdate'] = array();
                  }
                  $this->NM_ajax_info['errList']['registerdate'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['registerdate']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'registerdate';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_registerdate

    function ValidateField_phone(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (NM_utf8_strlen($this->phone) > 20) 
          { 
              $hasError = true;
              $Campos_Crit .= "Telepon " . $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr']; 
              if (!isset($Campos_Erros['phone']))
              {
                  $Campos_Erros['phone'] = array();
              }
              $Campos_Erros['phone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
              if (!isset($this->NM_ajax_info['errList']['phone']) || !is_array($this->NM_ajax_info['errList']['phone']))
              {
                  $this->NM_ajax_info['errList']['phone'] = array();
              }
              $this->NM_ajax_info['errList']['phone'][] = $this->Ini->Nm_lang['lang_errm_mxch'] . " 20 " . $this->Ini->Nm_lang['lang_errm_nchr'];
          } 
      } 
      $Teste_trab = "01234567890123456789";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8")
      {
          $Teste_trab = NM_conv_charset($Teste_trab, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
;
      $Teste_trab = $Teste_trab . chr(10) . chr(13) ; 
      $Teste_compara = $this->phone ; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $Teste_critica = 0 ; 
          for ($x = 0; $x < mb_strlen($this->phone, $_SESSION['scriptcase']['charset']); $x++) 
          { 
               for ($y = 0; $y < mb_strlen($Teste_trab, $_SESSION['scriptcase']['charset']); $y++) 
               { 
                    if (sc_substr($Teste_compara, $x, 1) == sc_substr($Teste_trab, $y, 1) ) 
                    { 
                        break ; 
                    } 
               } 
               if (sc_substr($Teste_compara, $x, 1) != sc_substr($Teste_trab, $y, 1) )  
               { 
                  $Teste_critica = 1 ; 
               } 
          } 
          if ($Teste_critica == 1) 
          { 
              $hasError = true;
              $Campos_Crit .= "Telepon " . $this->Ini->Nm_lang['lang_errm_ivch']; 
              if (!isset($Campos_Erros['phone']))
              {
                  $Campos_Erros['phone'] = array();
              }
              $Campos_Erros['phone'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
              if (!isset($this->NM_ajax_info['errList']['phone']) || !is_array($this->NM_ajax_info['errList']['phone']))
              {
                  $this->NM_ajax_info['errList']['phone'] = array();
              }
              $this->NM_ajax_info['errList']['phone'][] = $this->Ini->Nm_lang['lang_errm_ivch'];
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'phone';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_phone

    function ValidateField_email(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->nmgp_opcao != "excluir") 
      { 
          if (trim($this->email) != "")  
          { 
              if ($teste_validade->Email($this->email) == false)  
              { 
                  $hasError = true;
                      $Campos_Crit .= "Email; " ; 
                  if (!isset($Campos_Erros['email']))
                  {
                      $Campos_Erros['email'] = array();
                  }
                  $Campos_Erros['email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                      if (!isset($this->NM_ajax_info['errList']['email']) || !is_array($this->NM_ajax_info['errList']['email']))
                      {
                          $this->NM_ajax_info['errList']['email'] = array();
                      }
                      $this->NM_ajax_info['errList']['email'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'email';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_email

    function ValidateField_hta(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      nm_limpa_data($this->hta, $this->field_config['hta']['date_sep']) ; 
      $trab_dt_min = ""; 
      $trab_dt_max = ""; 
      if ($this->nmgp_opcao != "excluir") 
      { 
          $guarda_datahora = $this->field_config['hta']['date_format']; 
          if (false !== strpos($guarda_datahora, ';')) $this->field_config['hta']['date_format'] = substr($guarda_datahora, 0, strpos($guarda_datahora, ';'));
          $Format_Data = $this->field_config['hta']['date_format']; 
          nm_limpa_data($Format_Data, $this->field_config['hta']['date_sep']) ; 
          if (trim($this->hta) != "")  
          { 
              if ($teste_validade->Data($this->hta, $Format_Data, $trab_dt_min, $trab_dt_max) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HTA; " ; 
                  if (!isset($Campos_Erros['hta']))
                  {
                      $Campos_Erros['hta'] = array();
                  }
                  $Campos_Erros['hta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hta']) || !is_array($this->NM_ajax_info['errList']['hta']))
                  {
                      $this->NM_ajax_info['errList']['hta'] = array();
                  }
                  $this->NM_ajax_info['errList']['hta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
          $this->field_config['hta']['date_format'] = $guarda_datahora; 
       } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hta';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
      nm_limpa_hora($this->hta_hora, $this->field_config['hta_hora']['time_sep']) ; 
      if ($this->nmgp_opcao != "excluir") 
      {
          $Format_Hora = $this->field_config['hta_hora']['date_format']; 
          nm_limpa_hora($Format_Hora, $this->field_config['hta_hora']['time_sep']) ; 
          if (trim($this->hta_hora) != "")  
          { 
              if ($teste_validade->Hora($this->hta_hora, $Format_Hora) == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "HTA; " ; 
                  if (!isset($Campos_Erros['hta_hora']))
                  {
                      $Campos_Erros['hta_hora'] = array();
                  }
                  $Campos_Erros['hta_hora'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['hta']) || !is_array($this->NM_ajax_info['errList']['hta']))
                  {
                      $this->NM_ajax_info['errList']['hta'] = array();
                  }
                  $this->NM_ajax_info['errList']['hta'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
      if (isset($Campos_Erros['hta']) && isset($Campos_Erros['hta_hora']))
      {
          $this->removeDuplicateDttmError($Campos_Erros['hta'], $Campos_Erros['hta_hora']);
          if (empty($Campos_Erros['hta_hora']))
          {
              unset($Campos_Erros['hta_hora']);
          }
          if (isset($this->NM_ajax_info['errList']['hta']))
          {
              $this->NM_ajax_info['errList']['hta'] = array_unique($this->NM_ajax_info['errList']['hta']);
          }
      }
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'hta_hora';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_hta_hora

    function ValidateField_isdead(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->isdead == "" && $this->nmgp_opcao != "excluir")
      { 
      } 
      if ($this->isdead === "" || is_null($this->isdead))  
      { 
          $this->isdead = 0;
          $this->sc_force_zero[] = 'isdead';
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'isdead';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_isdead

    function ValidateField_id(&$Campos_Crit, &$Campos_Falta, &$Campos_Erros)
    {
        global $teste_validade;
        $hasError = false;
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      if ($this->nmgp_opcao == "incluir")
      { 
          if ($this->id != '')  
          { 
              $iTestSize = 15;
              if (strlen($this->id) > $iTestSize)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ID: " . $this->Ini->Nm_lang['lang_errm_size']; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = $this->Ini->Nm_lang['lang_errm_size'];
              } 
              if ($teste_validade->Valor($this->id, 15, 0, 0, 0, "N") == false)  
              { 
                  $hasError = true;
                  $Campos_Crit .= "ID; " ; 
                  if (!isset($Campos_Erros['id']))
                  {
                      $Campos_Erros['id'] = array();
                  }
                  $Campos_Erros['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
                  if (!isset($this->NM_ajax_info['errList']['id']) || !is_array($this->NM_ajax_info['errList']['id']))
                  {
                      $this->NM_ajax_info['errList']['id'] = array();
                  }
                  $this->NM_ajax_info['errList']['id'][] = "" . $this->Ini->Nm_lang['lang_errm_ajax_data'] . "";
              } 
          } 
      } 
        if ($hasError) {
            global $sc_seq_vert;
            $fieldName = 'id';
            if (isset($sc_seq_vert) && '' != $sc_seq_vert) {
                $fieldName .= $sc_seq_vert;
            }
            $this->NM_ajax_info['fieldsWithErrors'][] = $fieldName;
        }
    } // ValidateField_id

    function removeDuplicateDttmError($aErrDate, &$aErrTime)
    {
        if (empty($aErrDate) || empty($aErrTime))
        {
            return;
        }

        foreach ($aErrDate as $sErrDate)
        {
            foreach ($aErrTime as $iErrTime => $sErrTime)
            {
                if ($sErrDate == $sErrTime)
                {
                    unset($aErrTime[$iErrTime]);
                }
            }
        }
    } // removeDuplicateDttmError

   function nm_guardar_campos()
   {
    global
           $sc_seq_vert;
    $this->nmgp_dados_form['custcode'] = $this->custcode;
    $this->nmgp_dados_form['name'] = $this->name;
    $this->nmgp_dados_form['salut'] = $this->salut;
    $this->nmgp_dados_form['birthplace'] = $this->birthplace;
    $this->nmgp_dados_form['birthdate'] = (strlen(trim($this->birthdate)) > 19) ? str_replace(".", ":", $this->birthdate) : trim($this->birthdate);
    $this->nmgp_dados_form['sex'] = $this->sex;
    $this->nmgp_dados_form['address'] = $this->address;
    $this->nmgp_dados_form['rt'] = $this->rt;
    $this->nmgp_dados_form['rw'] = $this->rw;
    $this->nmgp_dados_form['city'] = $this->city;
    $this->nmgp_dados_form['kecamatan'] = $this->kecamatan;
    $this->nmgp_dados_form['kelurahan'] = $this->kelurahan;
    $this->nmgp_dados_form['hp'] = $this->hp;
    $this->nmgp_dados_form['blood'] = $this->blood;
    $this->nmgp_dados_form['spouse'] = $this->spouse;
    $this->nmgp_dados_form['idno'] = $this->idno;
    $this->nmgp_dados_form['religion'] = $this->religion;
    $this->nmgp_dados_form['job'] = $this->job;
    $this->nmgp_dados_form['father'] = $this->father;
    $this->nmgp_dados_form['mother'] = $this->mother;
    $this->nmgp_dados_form['penanggung'] = $this->penanggung;
    $this->nmgp_dados_form['bu'] = $this->bu;
    $this->nmgp_dados_form['education'] = $this->education;
    $this->nmgp_dados_form['lastupdated'] = (strlen(trim($this->lastupdated)) > 19) ? str_replace(".", ":", $this->lastupdated) : trim($this->lastupdated);
    $this->nmgp_dados_form['registerdate'] = (strlen(trim($this->registerdate)) > 19) ? str_replace(".", ":", $this->registerdate) : trim($this->registerdate);
    $this->nmgp_dados_form['phone'] = $this->phone;
    $this->nmgp_dados_form['email'] = $this->email;
    $this->nmgp_dados_form['hta'] = (strlen(trim($this->hta)) > 19) ? str_replace(".", ":", $this->hta) : trim($this->hta);
    $this->nmgp_dados_form['isdead'] = $this->isdead;
    $this->nmgp_dados_form['id'] = $this->id;
    $this->nmgp_dados_form['postcode'] = $this->postcode;
    $this->nmgp_dados_form['type'] = $this->type;
    $this->nmgp_dados_form['typename'] = $this->typename;
    $this->nmgp_dados_form['lasthta'] = $this->lasthta;
    $this->nmgp_dados_form['bbtb'] = $this->bbtb;
    $this->nmgp_dados_form['partus'] = $this->partus;
    $this->nmgp_dados_form['deleted'] = $this->deleted;
    $this->nmgp_dados_form['hamil'] = $this->hamil;
    $this->nmgp_dados_form['location'] = $this->location;
    $this->nmgp_dados_form['member'] = $this->member;
    $this->nmgp_dados_form['jenis'] = $this->jenis;
    $this->nmgp_dados_form['expdate'] = $this->expdate;
    $this->nmgp_dados_form['photoname'] = $this->photoname;
    $this->nmgp_dados_form['tlc'] = $this->tlc;
    $this->nmgp_dados_form['nip'] = $this->nip;
    $this->nmgp_dados_form['instno'] = $this->instno;
    $this->nmgp_dados_form['kelompokcode'] = $this->kelompokcode;
    $this->nmgp_dados_form['kelompok'] = $this->kelompok;
    $this->nmgp_dados_form['cardno'] = $this->cardno;
    $this->nmgp_dados_form['statusbl'] = $this->statusbl;
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form'] = $this->nmgp_dados_form;
   }
   function nm_tira_formatacao()
   {
      global $nm_form_submit;
         $this->Before_unformat = array();
         $this->formatado = false;
      $this->Before_unformat['lastupdated'] = $this->lastupdated;
      nm_limpa_data($this->lastupdated, $this->field_config['lastupdated']['date_sep']) ; 
      $this->Before_unformat['registerdate'] = $this->registerdate;
      nm_limpa_data($this->registerdate, $this->field_config['registerdate']['date_sep']) ; 
      $this->Before_unformat['hta'] = $this->hta;
      nm_limpa_data($this->hta, $this->field_config['hta']['date_sep']) ; 
      nm_limpa_hora($this->hta_hora, $this->field_config['hta']['time_sep']) ; 
      $this->Before_unformat['id'] = $this->id;
      nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      $this->Before_unformat['lasthta'] = $this->lasthta;
      nm_limpa_data($this->lasthta, $this->field_config['lasthta']['date_sep']) ; 
      nm_limpa_hora($this->lasthta_hora, $this->field_config['lasthta']['time_sep']) ; 
      $this->Before_unformat['partus'] = $this->partus;
      nm_limpa_data($this->partus, $this->field_config['partus']['date_sep']) ; 
      nm_limpa_hora($this->partus_hora, $this->field_config['partus']['time_sep']) ; 
      $this->Before_unformat['deleted'] = $this->deleted;
      nm_limpa_numero($this->deleted, $this->field_config['deleted']['symbol_grp']) ; 
      $this->Before_unformat['hamil'] = $this->hamil;
      nm_limpa_numero($this->hamil, $this->field_config['hamil']['symbol_grp']) ; 
      $this->Before_unformat['expdate'] = $this->expdate;
      nm_limpa_data($this->expdate, $this->field_config['expdate']['date_sep']) ; 
   }
   function sc_add_currency(&$value, $symbol, $pos)
   {
       if ('' == $value)
       {
           return;
       }
       $value = (1 == $pos || 3 == $pos) ? $symbol . ' ' . $value : $value . ' ' . $symbol;
   }
   function sc_remove_currency(&$value, $symbol_dec, $symbol_tho, $symbol_mon)
   {
       $value = preg_replace('~&#x0*([0-9a-f]+);~i', '', $value);
       $sNew  = str_replace($symbol_mon, '', $value);
       if ($sNew != $value)
       {
           $value = str_replace(' ', '', $sNew);
           return;
       }
       $aTest = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '-', $symbol_dec, $symbol_tho);
       $sNew  = '';
       for ($i = 0; $i < strlen($value); $i++)
       {
           if ($this->sc_test_currency_char($value[$i], $aTest))
           {
               $sNew .= $value[$i];
           }
       }
       $value = $sNew;
   }
   function sc_test_currency_char($char, $test)
   {
       $found = false;
       foreach ($test as $test_char)
       {
           if ($char === $test_char)
           {
               $found = true;
           }
       }
       return $found;
   }
   function nm_clear_val($Nome_Campo)
   {
      if ($Nome_Campo == "id")
      {
          nm_limpa_numero($this->id, $this->field_config['id']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "deleted")
      {
          nm_limpa_numero($this->deleted, $this->field_config['deleted']['symbol_grp']) ; 
      }
      if ($Nome_Campo == "hamil")
      {
          nm_limpa_numero($this->hamil, $this->field_config['hamil']['symbol_grp']) ; 
      }
   }
   function nm_formatar_campos($format_fields = array())
   {
      global $nm_form_submit;
     if (isset($this->formatado) && $this->formatado)
     {
         return;
     }
     $this->formatado = true;
      if ((!empty($this->birthdate) && 'null' != $this->birthdate) || (!empty($format_fields) && isset($format_fields['birthdate'])))
      {
          nm_volta_data($this->birthdate, $this->field_config['birthdate']['date_format']) ; 
      }
      elseif ('null' == $this->birthdate || '' == $this->birthdate)
      {
          $this->birthdate = '';
      }
      if ((!empty($this->lastupdated) && 'null' != $this->lastupdated) || (!empty($format_fields) && isset($format_fields['lastupdated'])))
      {
          nm_volta_data($this->lastupdated, $this->field_config['lastupdated']['date_format']) ; 
          nmgp_Form_Datas($this->lastupdated, $this->field_config['lastupdated']['date_format'], $this->field_config['lastupdated']['date_sep']) ;  
      }
      elseif ('null' == $this->lastupdated || '' == $this->lastupdated)
      {
          $this->lastupdated = '';
      }
      if ((!empty($this->registerdate) && 'null' != $this->registerdate) || (!empty($format_fields) && isset($format_fields['registerdate'])))
      {
          nm_volta_data($this->registerdate, $this->field_config['registerdate']['date_format']) ; 
          nmgp_Form_Datas($this->registerdate, $this->field_config['registerdate']['date_format'], $this->field_config['registerdate']['date_sep']) ;  
      }
      elseif ('null' == $this->registerdate || '' == $this->registerdate)
      {
          $this->registerdate = '';
      }
      if ((!empty($this->hta) && 'null' != $this->hta) || (!empty($format_fields) && isset($format_fields['hta'])))
      {
          $nm_separa_data = strpos($this->field_config['hta']['date_format'], ";") ;
          $guarda_format_hora = $this->field_config['hta']['date_format'];
          $this->field_config['hta']['date_format'] = substr($this->field_config['hta']['date_format'], 0, $nm_separa_data) ;
          $separador = strpos($this->hta, " ") ; 
          $this->hta_hora = substr($this->hta, $separador + 1) ; 
          $this->hta = substr($this->hta, 0, $separador) ; 
          nm_volta_data($this->hta, $this->field_config['hta']['date_format']) ; 
          nmgp_Form_Datas($this->hta, $this->field_config['hta']['date_format'], $this->field_config['hta']['date_sep']) ;  
          $this->field_config['hta']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_volta_hora($this->hta_hora, $this->field_config['hta']['date_format']) ; 
          nmgp_Form_Hora($this->hta_hora, $this->field_config['hta']['date_format'], $this->field_config['hta']['time_sep']) ;  
          $this->field_config['hta']['date_format'] = $guarda_format_hora ;
      }
      elseif ('null' == $this->hta || '' == $this->hta)
      {
          $this->hta_hora = '';
          $this->hta = '';
      }
      if ('' !== $this->id || (!empty($format_fields) && isset($format_fields['id'])))
      {
          nmgp_Form_Num_Val($this->id, $this->field_config['id']['symbol_grp'], $this->field_config['id']['symbol_dec'], "0", "S", $this->field_config['id']['format_neg'], "", "", "-", $this->field_config['id']['symbol_fmt']) ; 
      }
   }
   function nm_gera_mask(&$nm_campo, $nm_mask)
   { 
      $trab_campo = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $new_campo = '';
          $a_mask_ord  = array();
          $i_mask_size = -1;

          foreach (explode(';', $nm_mask) as $str_mask)
          {
              $a_mask_ord[ $this->nm_conta_mask_chars($str_mask) ] = $str_mask;
          }
          ksort($a_mask_ord);

          foreach ($a_mask_ord as $i_size => $s_mask)
          {
              if (-1 == $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
              elseif (strlen($nm_campo) >= $i_size && strlen($nm_campo) > $i_mask_size)
              {
                  $i_mask_size = $i_size;
              }
          }
          $nm_mask = $a_mask_ord[$i_mask_size];

          for ($i = 0; $i < strlen($nm_mask); $i++)
          {
              $test_mask = substr($nm_mask, $i, 1);
              
              if ('9' == $test_mask || 'a' == $test_mask || '*' == $test_mask)
              {
                  $new_campo .= substr($nm_campo, 0, 1);
                  $nm_campo   = substr($nm_campo, 1);
              }
              else
              {
                  $new_campo .= $test_mask;
              }
          }

                  $nm_campo = $new_campo;

          return;
      }

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
              if ($cont1 < $cont2 && $tam_campo <= $cont2 && $tam_campo > $cont1)
              {
                  $trab_mask = $ver_duas[1];
              }
              elseif ($cont1 > $cont2 && $tam_campo <= $cont2)
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
   function nm_conta_mask_chars($sMask)
   {
       $iLength = 0;

       for ($i = 0; $i < strlen($sMask); $i++)
       {
           if (in_array($sMask[$i], array('9', 'a', '*')))
           {
               $iLength++;
           }
       }

       return $iLength;
   }
   function nm_tira_mask(&$nm_campo, $nm_mask, $nm_chars = '')
   { 
      $mask_dados = $nm_campo;
      $trab_mask  = $nm_mask;
      $tam_campo  = strlen($nm_campo);
      $tam_mask   = strlen($nm_mask);
      $trab_saida = "";

      if (false !== strpos($nm_mask, '9') || false !== strpos($nm_mask, 'a') || false !== strpos($nm_mask, '*'))
      {
          $raw_campo = $this->sc_clear_mask($nm_campo, $nm_chars);
          $raw_mask  = $this->sc_clear_mask($nm_mask, $nm_chars);
          $new_campo = '';

          $test_mask = substr($raw_mask, 0, 1);
          $raw_mask  = substr($raw_mask, 1);

          while ('' != $raw_campo)
          {
              $test_val  = substr($raw_campo, 0, 1);
              $raw_campo = substr($raw_campo, 1);
              $ord       = ord($test_val);
              $found     = false;

              switch ($test_mask)
              {
                  case '9':
                      if (48 <= $ord && 57 >= $ord)
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case 'a':
                      if ((65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;

                  case '*':
                      if ((48 <= $ord && 57 >= $ord) || (65 <= $ord && 90 >= $ord) || (97 <= $ord && 122 >= $ord))
                      {
                          $new_campo .= $test_val;
                          $found      = true;
                      }
                      break;
              }

              if ($found)
              {
                  $test_mask = substr($raw_mask, 0, 1);
                  $raw_mask  = substr($raw_mask, 1);
              }
          }

          $nm_campo = $new_campo;

          return;
      }

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
          for ($x=0; $x < strlen($mask_dados); $x++)
          {
              if (is_numeric(substr($mask_dados, $x, 1)))
              {
                  $trab_saida .= substr($mask_dados, $x, 1);
              }
          }
          $nm_campo = $trab_saida;
          return;
      }
      if ($tam_mask > $tam_campo)
      {
         $mask_desfaz = "";
         for ($mask_ind = 0; $tam_mask > $tam_campo; $mask_ind++)
         {
              $mask_char = substr($trab_mask, $mask_ind, 1);
              if ($mask_char == "z")
              {
                  $tam_mask--;
              }
              else
              {
                  $mask_desfaz .= $mask_char;
              }
              if ($mask_ind == $tam_campo)
              {
                  $tam_mask = $tam_campo;
              }
         }
         $trab_mask = $mask_desfaz . substr($trab_mask, $mask_ind);
      }
      $mask_saida = "";
      for ($mask_ind = strlen($trab_mask); $mask_ind > 0; $mask_ind--)
      {
          $mask_char = substr($trab_mask, $mask_ind - 1, 1);
          if ($mask_char == "x" || $mask_char == "z")
          {
              if ($tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
              }
          }
          else
          {
              if ($mask_char != substr($mask_dados, $tam_campo - 1, 1) && $tam_campo > 0)
              {
                  $mask_saida = substr($mask_dados, $tam_campo - 1, 1) . $mask_saida;
                  $mask_ind--;
              }
          }
          $tam_campo--;
      }
      if ($tam_campo > 0)
      {
         $mask_saida = substr($mask_dados, 0, $tam_campo) . $mask_saida;
      }
      $nm_campo = $mask_saida;
   }

   function sc_clear_mask($value, $chars)
   {
       $new = '';

       for ($i = 0; $i < strlen($value); $i++)
       {
           if (false === strpos($chars, $value[$i]))
           {
               $new .= $value[$i];
           }
       }

       return $new;
   }
//
   function nm_limpa_alfa(&$str)
   {
       if (get_magic_quotes_gpc())
       {
           if (is_array($str))
           {
               $x = 0;
               foreach ($str as $cada_str)
               {
                   $str[$x] = stripslashes($str[$x]);
                   $x++;
               }
           }
           else
           {
               $str = stripslashes($str);
           }
       }
   }
//
//-- 
   function nm_converte_datas($use_null = true, $bForce = false)
   {
      $guarda_format_hora = $this->field_config['birthdate']['date_format'];
      if ($this->birthdate != "")  
      { 
          nm_conv_data($this->birthdate, $this->field_config['birthdate']['date_format']) ; 
          $this->birthdate_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->birthdate_hora = substr($this->birthdate_hora, 0, -4);
          }
          $this->birthdate .= " " . $this->birthdate_hora ; 
      } 
      if ($this->birthdate == "" && $use_null)  
      { 
          $this->birthdate = "null" ; 
      } 
      $this->field_config['birthdate']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['lastupdated']['date_format'];
      if ($this->lastupdated != "")  
      { 
          nm_conv_data($this->lastupdated, $this->field_config['lastupdated']['date_format']) ; 
          $this->lastupdated_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->lastupdated_hora = substr($this->lastupdated_hora, 0, -4);
          }
          $this->lastupdated .= " " . $this->lastupdated_hora ; 
      } 
      if ($this->lastupdated == "" && $use_null)  
      { 
          $this->lastupdated = "null" ; 
      } 
      $this->field_config['lastupdated']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['registerdate']['date_format'];
      if ($this->registerdate != "")  
      { 
          nm_conv_data($this->registerdate, $this->field_config['registerdate']['date_format']) ; 
          $this->registerdate_hora = "00:00:00:000" ; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->registerdate_hora = substr($this->registerdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->registerdate_hora = substr($this->registerdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->registerdate_hora = substr($this->registerdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->registerdate_hora = substr($this->registerdate_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->registerdate_hora = substr($this->registerdate_hora, 0, -4);
          }
          $this->registerdate .= " " . $this->registerdate_hora ; 
      } 
      if ($this->registerdate == "" && $use_null)  
      { 
          $this->registerdate = "null" ; 
      } 
      $this->field_config['registerdate']['date_format'] = $guarda_format_hora;
      $guarda_format_hora = $this->field_config['hta']['date_format'];
      if ($this->hta != "")  
      { 
          $nm_separa_data = strpos($this->field_config['hta']['date_format'], ";") ;
          $this->field_config['hta']['date_format'] = substr($this->field_config['hta']['date_format'], 0, $nm_separa_data) ;
          nm_conv_data($this->hta, $this->field_config['hta']['date_format']) ; 
          if ('pdo_sqlsrv' == strtolower($this->Ini->nm_tpbanco) || 'pdo_dblib' == strtolower($this->Ini->nm_tpbanco))
          {
              $this->hta = str_replace('-', '', $this->hta);
          }
          $this->field_config['hta']['date_format'] = substr($guarda_format_hora, $nm_separa_data + 1) ;
          nm_conv_hora($this->hta_hora, $this->field_config['hta']['date_format']) ; 
          if ($this->hta_hora == "" )  
          { 
              $this->hta_hora = "00:00:00:000" ; 
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4) . "." . substr($this->hta_hora, -3);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $this->hta_hora = substr($this->hta_hora, 0, -4);
          }
          if ($this->hta != "")  
          { 
              $this->hta .= " " . $this->hta_hora ; 
          }
      } 
      if ($this->hta == "" && $use_null)  
      { 
          $this->hta = "null" ; 
      } 
      $this->field_config['hta']['date_format'] = $guarda_format_hora;
   }
   function nm_conv_data_db($dt_in, $form_in, $form_out, $replaces = array())
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
       nm_conv_form_data($dt_out, $form_in, $form_out, $replaces);
       return $dt_out;
   }

   function returnWhere($aCond, $sOp = 'AND')
   {
       $aWhere = array();
       foreach ($aCond as $sCond)
       {
           $this->handleWhereCond($sCond);
           if ('' != $sCond)
           {
               $aWhere[] = $sCond;
           }
       }
       if (empty($aWhere))
       {
           return '';
       }
       else
       {
           return ' WHERE (' . implode(') ' . $sOp . ' (', $aWhere) . ')';
       }
   } // returnWhere

   function handleWhereCond(&$sCond)
   {
       $sCond = trim($sCond);
       if ('where' == strtolower(substr($sCond, 0, 5)))
       {
           $sCond = trim(substr($sCond, 5));
       }
   } // handleWhereCond

   function ajax_return_values()
   {
          $this->ajax_return_values_custcode();
          $this->ajax_return_values_name();
          $this->ajax_return_values_salut();
          $this->ajax_return_values_birthplace();
          $this->ajax_return_values_birthdate();
          $this->ajax_return_values_sex();
          $this->ajax_return_values_address();
          $this->ajax_return_values_rt();
          $this->ajax_return_values_rw();
          $this->ajax_return_values_city();
          $this->ajax_return_values_kecamatan();
          $this->ajax_return_values_kelurahan();
          $this->ajax_return_values_hp();
          $this->ajax_return_values_blood();
          $this->ajax_return_values_spouse();
          $this->ajax_return_values_idno();
          $this->ajax_return_values_religion();
          $this->ajax_return_values_job();
          $this->ajax_return_values_father();
          $this->ajax_return_values_mother();
          $this->ajax_return_values_penanggung();
          $this->ajax_return_values_bu();
          $this->ajax_return_values_education();
          $this->ajax_return_values_lastupdated();
          $this->ajax_return_values_registerdate();
          $this->ajax_return_values_phone();
          $this->ajax_return_values_email();
          $this->ajax_return_values_hta();
          $this->ajax_return_values_isdead();
          $this->ajax_return_values_id();
          if ('navigate_form' == $this->NM_ajax_opcao)
          {
              $this->NM_ajax_info['clearUpload']      = 'S';
              $this->NM_ajax_info['navStatus']['ret'] = $this->Nav_permite_ret ? 'S' : 'N';
              $this->NM_ajax_info['navStatus']['ava'] = $this->Nav_permite_ava ? 'S' : 'N';
              $this->NM_ajax_info['fldList']['id']['keyVal'] = form_tbcustomer_pack_protect_string($this->nmgp_dados_form['id']);
          }
   } // ajax_return_values

          //----- custcode
   function ajax_return_values_custcode($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("custcode", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->custcode);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['custcode'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- name
   function ajax_return_values_name($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("name", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->name);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['name'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- salut
   function ajax_return_values_salut($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("salut", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->salut);
              $aLookup = array();
              $this->_tmp_lookup_salut = $this->salut;

$aLookup[] = array(form_tbcustomer_pack_protect_string('AN.') => form_tbcustomer_pack_protect_string("AN."));
$aLookup[] = array(form_tbcustomer_pack_protect_string('NN.') => form_tbcustomer_pack_protect_string("NN."));
$aLookup[] = array(form_tbcustomer_pack_protect_string('NY.') => form_tbcustomer_pack_protect_string("NY."));
$aLookup[] = array(form_tbcustomer_pack_protect_string('SDR.') => form_tbcustomer_pack_protect_string("SDR."));
$aLookup[] = array(form_tbcustomer_pack_protect_string('TN.') => form_tbcustomer_pack_protect_string("TN."));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = 'AN.';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = 'NN.';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = 'NY.';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = 'SDR.';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_salut'][] = 'TN.';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"salut\"";
          if (isset($this->NM_ajax_info['select_html']['salut']) && !empty($this->NM_ajax_info['select_html']['salut']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['salut'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->salut == $sValue)
                  {
                      $this->_tmp_lookup_salut = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['salut'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['salut']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['salut']['valList'][$i] = form_tbcustomer_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['salut']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['salut']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['salut']['labList'] = $aLabel;
          }
   }

          //----- birthplace
   function ajax_return_values_birthplace($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("birthplace", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->birthplace);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['birthplace'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- birthdate
   function ajax_return_values_birthdate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("birthdate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->birthdate);
              $aLookup = array();
          $old_birthdate = $this->birthdate;
          nmgp_Form_Datas($this->birthdate, $this->field_config['birthdate']['date_format'], $this->field_config['birthdate']['date_sep']);

          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['birthdate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );

          $this->birthdate = $old_birthdate;

          $s_date_info_pos  = strtolower(str_replace('aaaa', 'yyyy', $this->field_config['birthdate']['date_format']));
          $i_date_pos_day   = strpos($s_date_info_pos, 'dd');
          $i_date_pos_month = strpos($s_date_info_pos, 'mm');
          $i_date_pos_year  = strpos($s_date_info_pos, 'yyyy');
          $old_birthdate = $this->birthdate;
          nmgp_Form_Datas($this->birthdate, $this->field_config['birthdate']['date_format'], $this->field_config['birthdate']['date_sep']);

          $this->birthdate_dia = substr($this->birthdate, $i_date_pos_day, 2);
          $this->NM_ajax_info['fldList']['birthdate_dia'] = array(
               'type'    => 'text',
               'valList' => array($this->birthdate_dia),
               );
          $this->birthdate_mes = substr($this->birthdate, $i_date_pos_month, 2);
          $this->NM_ajax_info['fldList']['birthdate_mes'] = array(
               'type'    => 'text',
               'valList' => array($this->birthdate_mes),
               );
          $this->birthdate_ano = substr($this->birthdate, $i_date_pos_year, 4);
          $this->NM_ajax_info['fldList']['birthdate_ano'] = array(
               'type'    => 'text',
               'valList' => array($this->birthdate_ano),
               );

          $this->birthdate = $old_birthdate;
          }
   }

          //----- sex
   function ajax_return_values_sex($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("sex", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->sex);
              $aLookup = array();
              $this->_tmp_lookup_sex = $this->sex;

$aLookup[] = array(form_tbcustomer_pack_protect_string('L') => form_tbcustomer_pack_protect_string("Laki-laki"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('P') => form_tbcustomer_pack_protect_string("Perempuan"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_sex'][] = 'L';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_sex'][] = 'P';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"sex\"";
          if (isset($this->NM_ajax_info['select_html']['sex']) && !empty($this->NM_ajax_info['select_html']['sex']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['sex'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->sex == $sValue)
                  {
                      $this->_tmp_lookup_sex = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['sex'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['sex']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['sex']['valList'][$i] = form_tbcustomer_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['sex']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['sex']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['sex']['labList'] = $aLabel;
          }
   }

          //----- address
   function ajax_return_values_address($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("address", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->address);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['address'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- rt
   function ajax_return_values_rt($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rt", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rt);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rt'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- rw
   function ajax_return_values_rw($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("rw", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->rw);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['rw'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- city
   function ajax_return_values_city($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("city", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->city);
              $aLookup = array();
              $this->_tmp_lookup_city = $this->city;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_birthdate = $this->birthdate;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_registerdate = $this->registerdate;
   $old_value_hta = $this->hta;
   $old_value_hta_hora = $this->hta_hora;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_registerdate = $this->registerdate;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_hta_hora = $this->hta_hora;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT name, name FROM kota ORDER BY id";

   $this->birthdate = $old_value_birthdate;
   $this->lastupdated = $old_value_lastupdated;
   $this->registerdate = $old_value_registerdate;
   $this->hta = $old_value_hta;
   $this->hta_hora = $old_value_hta_hora;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbcustomer_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbcustomer_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"city\"";
          if (isset($this->NM_ajax_info['select_html']['city']) && !empty($this->NM_ajax_info['select_html']['city']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['city'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->city == $sValue)
                  {
                      $this->_tmp_lookup_city = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['city'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['city']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['city']['valList'][$i] = form_tbcustomer_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['city']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['city']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['city']['labList'] = $aLabel;
          }
   }

          //----- kecamatan
   function ajax_return_values_kecamatan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kecamatan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kecamatan);
              $aLookup = array();
              $this->_tmp_lookup_kecamatan = $this->kecamatan;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'] = array(); 
}
$aLookup[] = array(form_tbcustomer_pack_protect_string('') => form_tbcustomer_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_birthdate = $this->birthdate;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_registerdate = $this->registerdate;
   $old_value_hta = $this->hta;
   $old_value_hta_hora = $this->hta_hora;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_registerdate = $this->registerdate;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_hta_hora = $this->hta_hora;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT    b.name, b.name FROM    kota a INNER JOIN kecamatan b ON b.regency_id = a.id where a.name = '$this->city'";

   $this->birthdate = $old_value_birthdate;
   $this->lastupdated = $old_value_lastupdated;
   $this->registerdate = $old_value_registerdate;
   $this->hta = $old_value_hta;
   $this->hta_hora = $old_value_hta_hora;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbcustomer_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbcustomer_pack_protect_string(NM_charset_to_utf8($rs->fields[1]))));
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"kecamatan\"";
          if (isset($this->NM_ajax_info['select_html']['kecamatan']) && !empty($this->NM_ajax_info['select_html']['kecamatan']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['kecamatan'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->kecamatan == $sValue)
                  {
                      $this->_tmp_lookup_kecamatan = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['kecamatan'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['kecamatan']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['kecamatan']['valList'][$i] = form_tbcustomer_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['kecamatan']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['kecamatan']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['kecamatan']['labList'] = $aLabel;
          }
   }

          //----- kelurahan
   function ajax_return_values_kelurahan($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("kelurahan", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->kelurahan);
              $aLookup = array();
              $this->_tmp_lookup_kelurahan = $this->kelurahan;

 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'] = array(); 
}
$aLookup[] = array(form_tbcustomer_pack_protect_string('') => form_tbcustomer_pack_protect_string(' '));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'][] = '';
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 

   $old_value_birthdate = $this->birthdate;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_registerdate = $this->registerdate;
   $old_value_hta = $this->hta;
   $old_value_hta_hora = $this->hta_hora;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_registerdate = $this->registerdate;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_hta_hora = $this->hta_hora;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT    b.name FROM    kecamatan a INNER JOIN kelurahan b ON b.district_id = a.id where a.name = '$this->kecamatan' order by b.id";

   $this->birthdate = $old_value_birthdate;
   $this->lastupdated = $old_value_lastupdated;
   $this->registerdate = $old_value_registerdate;
   $this->hta = $old_value_hta;
   $this->hta_hora = $old_value_hta_hora;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array(form_tbcustomer_pack_protect_string(NM_charset_to_utf8($rs->fields[0])) => str_replace('<', '&lt;', form_tbcustomer_pack_protect_string(NM_charset_to_utf8($rs->fields[0]))));
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"kelurahan\"";
          if (isset($this->NM_ajax_info['select_html']['kelurahan']) && !empty($this->NM_ajax_info['select_html']['kelurahan']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['kelurahan'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->kelurahan == $sValue)
                  {
                      $this->_tmp_lookup_kelurahan = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['kelurahan'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
               'optList' => $aLookup,
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['kelurahan']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['kelurahan']['valList'][$i] = form_tbcustomer_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['kelurahan']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['kelurahan']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['kelurahan']['labList'] = $aLabel;
          }
   }

          //----- hp
   function ajax_return_values_hp($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hp", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hp);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hp'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- blood
   function ajax_return_values_blood($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("blood", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->blood);
              $aLookup = array();
              $this->_tmp_lookup_blood = $this->blood;

$aLookup[] = array(form_tbcustomer_pack_protect_string('A') => form_tbcustomer_pack_protect_string("A"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('B') => form_tbcustomer_pack_protect_string("B"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('AB') => form_tbcustomer_pack_protect_string("AB"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('O') => form_tbcustomer_pack_protect_string("O"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('Tidak Tahu') => form_tbcustomer_pack_protect_string("Tidak Tahu"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = 'A';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = 'B';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = 'AB';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = 'O';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_blood'][] = 'Tidak Tahu';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"blood\"";
          if (isset($this->NM_ajax_info['select_html']['blood']) && !empty($this->NM_ajax_info['select_html']['blood']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['blood'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->blood == $sValue)
                  {
                      $this->_tmp_lookup_blood = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['blood'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['blood']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['blood']['valList'][$i] = form_tbcustomer_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['blood']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['blood']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['blood']['labList'] = $aLabel;
          }
   }

          //----- spouse
   function ajax_return_values_spouse($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("spouse", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->spouse);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['spouse'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- idno
   function ajax_return_values_idno($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("idno", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->idno);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['idno'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- religion
   function ajax_return_values_religion($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("religion", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->religion);
              $aLookup = array();
              $this->_tmp_lookup_religion = $this->religion;

$aLookup[] = array(form_tbcustomer_pack_protect_string('ISLAM') => form_tbcustomer_pack_protect_string("ISLAM"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('BUDHA') => form_tbcustomer_pack_protect_string("BUDHA"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('HINDU') => form_tbcustomer_pack_protect_string("HINDU"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('KATOLIK') => form_tbcustomer_pack_protect_string("KATOLIK"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('KRISTEN') => form_tbcustomer_pack_protect_string("KRISTEN"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('LAIN-LAIN') => form_tbcustomer_pack_protect_string("LAIN-LAIN"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'ISLAM';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'BUDHA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'HINDU';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'KATOLIK';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'KRISTEN';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_religion'][] = 'LAIN-LAIN';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"religion\"";
          if (isset($this->NM_ajax_info['select_html']['religion']) && !empty($this->NM_ajax_info['select_html']['religion']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['religion'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->religion == $sValue)
                  {
                      $this->_tmp_lookup_religion = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['religion'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['religion']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['religion']['valList'][$i] = form_tbcustomer_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['religion']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['religion']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['religion']['labList'] = $aLabel;
          }
   }

          //----- job
   function ajax_return_values_job($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("job", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->job);
              $aLookup = array();
              $this->_tmp_lookup_job = $this->job;

$aLookup[] = array(form_tbcustomer_pack_protect_string('BURUH') => form_tbcustomer_pack_protect_string("BURUH"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('DIBAWAH UMUR') => form_tbcustomer_pack_protect_string("DIBAWAH UMUR"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('IBU RT') => form_tbcustomer_pack_protect_string("IBU RT"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('KARYAWAN SWASTA') => form_tbcustomer_pack_protect_string("KARYAWAN SWASTA"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('LAIN-LAIN') => form_tbcustomer_pack_protect_string("LAIN-LAIN"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('MAHASISWA/I') => form_tbcustomer_pack_protect_string("MAHASISWA/I"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('PEDAGANG') => form_tbcustomer_pack_protect_string("PEDAGANG"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('PELAJAR') => form_tbcustomer_pack_protect_string("PELAJAR"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('PETANI') => form_tbcustomer_pack_protect_string("PETANI"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'BURUH';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'DIBAWAH UMUR';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'IBU RT';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'KARYAWAN SWASTA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'LAIN-LAIN';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'MAHASISWA/I';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'PEDAGANG';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'PELAJAR';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_job'][] = 'PETANI';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"job\"";
          if (isset($this->NM_ajax_info['select_html']['job']) && !empty($this->NM_ajax_info['select_html']['job']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['job'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->job == $sValue)
                  {
                      $this->_tmp_lookup_job = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['job'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['job']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['job']['valList'][$i] = form_tbcustomer_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['job']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['job']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['job']['labList'] = $aLabel;
          }
   }

          //----- father
   function ajax_return_values_father($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("father", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->father);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['father'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- mother
   function ajax_return_values_mother($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("mother", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->mother);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['mother'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- penanggung
   function ajax_return_values_penanggung($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("penanggung", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->penanggung);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['penanggung'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- bu
   function ajax_return_values_bu($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("bu", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->bu);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['bu'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- education
   function ajax_return_values_education($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("education", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->education);
              $aLookup = array();
              $this->_tmp_lookup_education = $this->education;

$aLookup[] = array(form_tbcustomer_pack_protect_string('SMA') => form_tbcustomer_pack_protect_string("SMA"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('SMP') => form_tbcustomer_pack_protect_string("SMP"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('SD') => form_tbcustomer_pack_protect_string("SD"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('Belum/Tidak Tamat SD') => form_tbcustomer_pack_protect_string("Belum/Tidak Tamat SD"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('Diploma') => form_tbcustomer_pack_protect_string("Diploma"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('Sarjana') => form_tbcustomer_pack_protect_string("Sarjana"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('Pasca Sarjana') => form_tbcustomer_pack_protect_string("Pasca Sarjana"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('Tidak Sekolah') => form_tbcustomer_pack_protect_string("Tidak Sekolah"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'SMA';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'SMP';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'SD';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'Belum/Tidak Tamat SD';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'Diploma';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'Sarjana';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'Pasca Sarjana';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_education'][] = 'Tidak Sekolah';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"education\"";
          if (isset($this->NM_ajax_info['select_html']['education']) && !empty($this->NM_ajax_info['select_html']['education']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['education'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->education == $sValue)
                  {
                      $this->_tmp_lookup_education = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['education'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['education']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['education']['valList'][$i] = form_tbcustomer_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['education']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['education']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['education']['labList'] = $aLabel;
          }
   }

          //----- lastupdated
   function ajax_return_values_lastupdated($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("lastupdated", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->lastupdated);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['lastupdated'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- registerdate
   function ajax_return_values_registerdate($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("registerdate", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->registerdate);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['registerdate'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- phone
   function ajax_return_values_phone($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("phone", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->phone);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['phone'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->form_encode_input($sTmpValue)),
              );
          }
   }

          //----- email
   function ajax_return_values_email($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("email", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->email);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['email'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($sTmpValue),
              );
          }
   }

          //----- hta
   function ajax_return_values_hta($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("hta", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->hta);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['hta'] = array(
                       'row'    => '',
               'type'    => 'text',
               'valList' => array($this->hta . ' ' . $this->hta_hora),
              );
          }
   }

          //----- isdead
   function ajax_return_values_isdead($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("isdead", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->isdead);
              $aLookup = array();
              $this->_tmp_lookup_isdead = $this->isdead;

$aLookup[] = array(form_tbcustomer_pack_protect_string('1') => form_tbcustomer_pack_protect_string("Ya"));
$aLookup[] = array(form_tbcustomer_pack_protect_string('0') => form_tbcustomer_pack_protect_string("Tidak"));
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_isdead'][] = '1';
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_isdead'][] = '0';
          $aLookupOrig = $aLookup;
          $sSelComp = "name=\"isdead\"";
          if (isset($this->NM_ajax_info['select_html']['isdead']) && !empty($this->NM_ajax_info['select_html']['isdead']))
          {
              $sSelComp = $this->NM_ajax_info['select_html']['isdead'];
          }
          $sLookup = '';
          if (empty($aLookup))
          {
              $aLookup[] = array('' => '');
          }
          foreach ($aLookup as $aOption)
          {
              foreach ($aOption as $sValue => $sLabel)
              {

                  if ($this->isdead == $sValue)
                  {
                      $this->_tmp_lookup_isdead = $sLabel;
                  }

                  $sOpt     = ($sValue !== $sLabel) ? $sValue : $sLabel;
                  $sLookup .= "<option value=\"" . $sOpt . "\">" . $sLabel . "</option>";
              }
          }
          $aLookup  = $sLookup;
          $this->NM_ajax_info['fldList']['isdead'] = array(
                       'row'    => '',
               'type'    => 'select',
               'valList' => array($sTmpValue),
              );
          $aLabel     = array();
          $aLabelTemp = array();
          foreach ($this->NM_ajax_info['fldList']['isdead']['valList'] as $i => $v)
          {
              $this->NM_ajax_info['fldList']['isdead']['valList'][$i] = form_tbcustomer_pack_protect_string($v);
          }
          foreach ($aLookupOrig as $aValData)
          {
              if (in_array(key($aValData), $this->NM_ajax_info['fldList']['isdead']['valList']))
              {
                  $aLabelTemp[key($aValData)] = current($aValData);
              }
          }
          foreach ($this->NM_ajax_info['fldList']['isdead']['valList'] as $iIndex => $sValue)
          {
              $aLabel[$iIndex] = (isset($aLabelTemp[$sValue])) ? $aLabelTemp[$sValue] : $sValue;
          }
          $this->NM_ajax_info['fldList']['isdead']['labList'] = $aLabel;
          }
   }

          //----- id
   function ajax_return_values_id($bForce = false)
   {
          if ('navigate_form' == $this->NM_ajax_opcao || 'backup_line' == $this->NM_ajax_opcao || (isset($this->nmgp_refresh_fields) && in_array("id", $this->nmgp_refresh_fields)) || $bForce)
          {
              $sTmpValue = NM_charset_to_utf8($this->id);
              $aLookup = array();
          $aLookupOrig = $aLookup;
          $this->NM_ajax_info['fldList']['id'] = array(
                       'row'    => '',
               'type'    => 'label',
               'valList' => array($sTmpValue),
              );
          }
   }

    function fetchUniqueUploadName($originalName, $uploadDir, $fieldName)
    {
        $originalName = trim($originalName);
        if ('' == $originalName)
        {
            return $originalName;
        }
        if (!@is_dir($uploadDir))
        {
            return $originalName;
        }
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['upload_dir'][$fieldName] = array();
            $resDir = @opendir($uploadDir);
            if (!$resDir)
            {
                return $originalName;
            }
            while (false !== ($fileName = @readdir($resDir)))
            {
                if (@is_file($uploadDir . $fileName))
                {
                    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['upload_dir'][$fieldName][] = $fileName;
                }
            }
            @closedir($resDir);
        }
        if (!in_array($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['upload_dir'][$fieldName]))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['upload_dir'][$fieldName][] = $originalName;
            return $originalName;
        }
        else
        {
            $newName = $this->fetchFileNextName($originalName, $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['upload_dir'][$fieldName]);
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['upload_dir'][$fieldName][] = $newName;
            return $newName;
        }
    } // fetchUniqueUploadName

    function fetchFileNextName($uniqueName, $uniqueList)
    {
        $aPathinfo     = pathinfo($uniqueName);
        $fileExtension = $aPathinfo['extension'];
        $fileName      = $aPathinfo['filename'];
        $foundName     = false;
        $nameIt        = 1;
        if ('' != $fileExtension)
        {
            $fileExtension = '.' . $fileExtension;
        }
        while (!$foundName)
        {
            $testName = $fileName . '(' . $nameIt . ')' . $fileExtension;
            if (in_array($testName, $uniqueList))
            {
                $nameIt++;
            }
            else
            {
                $foundName = true;
                return $testName;
            }
        }
    } // fetchFileNextName

   function ajax_add_parameters()
   {
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_0_var_custcode'] = $this->form_encode_input($this->nmgp_dados_form['custcode']);
       $this->NM_ajax_info['btnVars']['var_btn_sc_btn_1_var_custcode'] = $this->form_encode_input($this->nmgp_dados_form['custcode']);
   } // ajax_add_parameters
  function nm_proc_onload($bFormat = true)
  {
      if (!$this->NM_ajax_flag || !isset($this->nmgp_refresh_fields)) {
      $_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'on';
  if(empty($this->custcode )){
	$check_sql = "SELECT max(custCode) FROM tbcustomer";
	 
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
	$ids = $this->rs[0][0]+'1';

	if ($ids < '10'){
	$this->custcode  = "00000$ids";
	}
	elseif ($ids < '100'){
	$this->custcode  = "0000$ids";
	}
	elseif ($ids < '1000'){
	$this->custcode  = "000$ids";
	}
	elseif ($ids < '10000'){
	$this->custcode  = "00$ids";
	}
	elseif ($ids < '100000'){
	$this->custcode  = "0$ids";
	}
	elseif ($ids < '1000000'){
	$this->custcode  = "$ids";
	}
}
$_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'off'; 
      }
      if (empty($this->hta))
      {
          $this->hta_hora = $this->hta;
      }
      if (empty($this->lasthta))
      {
          $this->lasthta_hora = $this->lasthta;
      }
      if (empty($this->partus))
      {
          $this->partus_hora = $this->partus;
      }
      $this->nm_guardar_campos();
      if ($bFormat) $this->nm_formatar_campos();
  }
//
//----------------------------------------------------
//-----> 
//----------------------------------------------------
//----------- 

   function controle_navegacao()
   {
      global $sc_where;

          if (false && !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total']))
          {
               $sc_where_pos = " WHERE ((id < $this->id))";
               if ('' != $sc_where)
               {
                   if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
                   {
                       $sc_where = substr(trim($sc_where), 6);
                   }
                   if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
                   {
                       $sc_where = substr(trim($sc_where), 4);
                   }
                   $sc_where_pos .= ' AND (' . $sc_where . ')';
                   $sc_where = ' WHERE ' . $sc_where;
               }
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total'] = $rsc->fields[0];
               $rsc->Close(); 
               if ('' != $this->id)
               {
               $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
               $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
               $rsc = $this->Db->Execute($nmgp_sel_count); 
               if ($rsc === false && !$rsc->EOF)  
               { 
                   $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                   exit; 
               }  
               $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] = $rsc->fields[0];
               if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] < 0)
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] = 0;
               }
               $rsc->Close(); 
               }
               else
               {
                   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] = 0;
               }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['qt_reg_grid'] = 1;
          if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] = 0;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['final']  = 0;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] = $this->NM_ajax_info['param']['nmgp_opcao'];
          if (in_array($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'], array('incluir', 'alterar', 'excluir')))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] = '';
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] == 'inicio')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] = 0;
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] == 'retorna')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] = 0 ;
              }
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] == 'avanca' && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total'] > $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['final']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['final'];
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] == 'final')
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total'] - $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['qt_reg_grid'];
              if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] < 0)
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] = 0;
              }
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['final'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'] + $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['qt_reg_grid'];
          $this->Nav_permite_ret = 0 != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['inicio'];
          $this->Nav_permite_ava = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total'] != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['final'];
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] = '';

   }
   function return_after_insert()
   {
      global $sc_where;
      $sc_where_pos = " WHERE ((id < $this->id))";
      if ('' != $sc_where)
      {
          if ('where ' == strtolower(substr(trim($sc_where), 0, 6)))
          {
              $sc_where = substr(trim($sc_where), 6);
          }
          if ('and ' == strtolower(substr(trim($sc_where), 0, 4)))
          {
              $sc_where = substr(trim($sc_where), 4);
          }
          $sc_where_pos .= ' AND (' . $sc_where . ')';
          $sc_where = ' WHERE ' . $sc_where;
      }
      if ('' != $this->id)
      {
          $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . $sc_where_pos;
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count;
          $rsc = $this->Db->Execute($nmgp_sel_count);
          if ($rsc === false && !$rsc->EOF)
          {
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
              exit;
          }
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['reg_start'] = $rsc->fields[0];
          $rsc->Close();
      }
   }

   function temRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'SELECT COUNT(*) AS countTest FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       if ($rsc === false && !$rsc->EOF)
       {
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg());
           exit; 
       }
       $iTotal = $rsc->fields[0];
       $rsc->Close();
       return 0 < $iTotal;
   } // temRegistros

   function deletaRegistros($sWhere)
   {
       if ('' == $sWhere)
       {
           return false;
       }
       $nmgp_sel_count = 'DELETE FROM ' . $this->Ini->nm_tabela . ' WHERE ' . $sWhere;
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_sel_count; 
       $rsc = $this->Db->Execute($nmgp_sel_count); 
       $bResult = $rsc;
       $rsc->Close();
       return $bResult == true;
   } // deletaRegistros
    function handleDbErrorMessage(&$dbErrorMessage, $dbErrorCode)
    {
        if (1267 == $dbErrorCode) {
            $dbErrorMessage = $this->Ini->Nm_lang['lang_errm_db_invalid_collation'];
        }
    }


   function nm_acessa_banco() 
   { 
      global  $nm_form_submit, $teste_validade, $sc_where;
 
      $NM_val_null = array();
      $NM_val_form = array();
      $this->sc_erro_insert = "";
      $this->sc_erro_update = "";
      $this->sc_erro_delete = "";
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
    if ("incluir" == $this->nmgp_opcao) {
      $this->sc_evento = $this->nmgp_opcao;
      $_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'on';
  $check_sql = "SELECT max(custCode) FROM tbcustomer";
 
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
$ids = $this->rs[0][0]+'1';

if ($ids < '10'){
$this->custcode  = "00000$ids";
}
elseif ($ids < '100'){
$this->custcode  = "0000$ids";
}
elseif ($ids < '1000'){
$this->custcode  = "000$ids";
}
elseif ($ids < '10000'){
$this->custcode  = "00$ids";
}
elseif ($ids < '100000'){
$this->custcode  = "0$ids";
}
elseif ($ids < '1000000'){
$this->custcode  = "$ids";
}
$_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $this->nmgp_opcao ; 
          if ($this->nmgp_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          else
          { 
              $this->sc_evento = ""; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->NM_rollback_db(); 
          $this->Campos_Mens_erro = ""; 
      }
      $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
      $salva_opcao = $this->nmgp_opcao; 
      if ($this->sc_evento != "novo" && $this->sc_evento != "incluir") 
      { 
          $this->sc_evento = ""; 
      } 
      if (!in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) && !$this->Ini->sc_tem_trans_banco && in_array($this->nmgp_opcao, array('excluir', 'incluir', 'alterar')))
      { 
          $this->Ini->sc_tem_trans_banco = $this->Db->BeginTrans(); 
      } 
      $NM_val_form['custcode'] = $this->custcode;
      $NM_val_form['name'] = $this->name;
      $NM_val_form['salut'] = $this->salut;
      $NM_val_form['birthplace'] = $this->birthplace;
      $NM_val_form['birthdate'] = $this->birthdate;
      $NM_val_form['sex'] = $this->sex;
      $NM_val_form['address'] = $this->address;
      $NM_val_form['rt'] = $this->rt;
      $NM_val_form['rw'] = $this->rw;
      $NM_val_form['city'] = $this->city;
      $NM_val_form['kecamatan'] = $this->kecamatan;
      $NM_val_form['kelurahan'] = $this->kelurahan;
      $NM_val_form['hp'] = $this->hp;
      $NM_val_form['blood'] = $this->blood;
      $NM_val_form['spouse'] = $this->spouse;
      $NM_val_form['idno'] = $this->idno;
      $NM_val_form['religion'] = $this->religion;
      $NM_val_form['job'] = $this->job;
      $NM_val_form['father'] = $this->father;
      $NM_val_form['mother'] = $this->mother;
      $NM_val_form['penanggung'] = $this->penanggung;
      $NM_val_form['bu'] = $this->bu;
      $NM_val_form['education'] = $this->education;
      $NM_val_form['lastupdated'] = $this->lastupdated;
      $NM_val_form['registerdate'] = $this->registerdate;
      $NM_val_form['phone'] = $this->phone;
      $NM_val_form['email'] = $this->email;
      $NM_val_form['hta'] = $this->hta;
      $NM_val_form['isdead'] = $this->isdead;
      $NM_val_form['id'] = $this->id;
      $NM_val_form['postcode'] = $this->postcode;
      $NM_val_form['type'] = $this->type;
      $NM_val_form['typename'] = $this->typename;
      $NM_val_form['lasthta'] = $this->lasthta;
      $NM_val_form['bbtb'] = $this->bbtb;
      $NM_val_form['partus'] = $this->partus;
      $NM_val_form['deleted'] = $this->deleted;
      $NM_val_form['hamil'] = $this->hamil;
      $NM_val_form['location'] = $this->location;
      $NM_val_form['member'] = $this->member;
      $NM_val_form['jenis'] = $this->jenis;
      $NM_val_form['expdate'] = $this->expdate;
      $NM_val_form['photoname'] = $this->photoname;
      $NM_val_form['tlc'] = $this->tlc;
      $NM_val_form['nip'] = $this->nip;
      $NM_val_form['instno'] = $this->instno;
      $NM_val_form['kelompokcode'] = $this->kelompokcode;
      $NM_val_form['kelompok'] = $this->kelompok;
      $NM_val_form['cardno'] = $this->cardno;
      $NM_val_form['statusbl'] = $this->statusbl;
      if ($this->id === "" || is_null($this->id))  
      { 
          $this->id = 0;
      } 
      if ($this->deleted === "" || is_null($this->deleted))  
      { 
          $this->deleted = 0;
          $this->sc_force_zero[] = 'deleted';
      } 
      if ($this->hamil === "" || is_null($this->hamil))  
      { 
          $this->hamil = 0;
          $this->sc_force_zero[] = 'hamil';
      } 
      if ($this->isdead === "" || is_null($this->isdead))  
      { 
          $this->isdead = 0;
          $this->sc_force_zero[] = 'isdead';
      } 
      $nm_bases_lob_geral = array_merge($this->Ini->nm_bases_oracle, $this->Ini->nm_bases_ibase, $this->Ini->nm_bases_informix, $this->Ini->nm_bases_mysql, $this->Ini->nm_bases_access, $this->Ini->nm_bases_sqlite, array('pdo_ibm'));
      if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir") 
      {
          $this->custcode_before_qstr = $this->custcode;
          $this->custcode = substr($this->Db->qstr($this->custcode), 1, -1); 
          if ($this->custcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->custcode = "null"; 
              $NM_val_null[] = "custcode";
          } 
          $this->name_before_qstr = $this->name;
          $this->name = substr($this->Db->qstr($this->name), 1, -1); 
          if ($this->name == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->name = "null"; 
              $NM_val_null[] = "name";
          } 
          $this->salut_before_qstr = $this->salut;
          $this->salut = substr($this->Db->qstr($this->salut), 1, -1); 
          if ($this->salut == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->salut = "null"; 
              $NM_val_null[] = "salut";
          } 
          $this->address_before_qstr = $this->address;
          $this->address = substr($this->Db->qstr($this->address), 1, -1); 
          if ($this->address == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->address = "null"; 
              $NM_val_null[] = "address";
          } 
          $this->city_before_qstr = $this->city;
          $this->city = substr($this->Db->qstr($this->city), 1, -1); 
          if ($this->city == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->city = "null"; 
              $NM_val_null[] = "city";
          } 
          $this->postcode_before_qstr = $this->postcode;
          $this->postcode = substr($this->Db->qstr($this->postcode), 1, -1); 
          if ($this->postcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->postcode = "null"; 
              $NM_val_null[] = "postcode";
          } 
          if ($this->birthdate == "")  
          { 
              $this->birthdate = "null"; 
              $NM_val_null[] = "birthdate";
          } 
          $this->phone_before_qstr = $this->phone;
          $this->phone = substr($this->Db->qstr($this->phone), 1, -1); 
          if ($this->phone == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->phone = "null"; 
              $NM_val_null[] = "phone";
          } 
          $this->hp_before_qstr = $this->hp;
          $this->hp = substr($this->Db->qstr($this->hp), 1, -1); 
          if ($this->hp == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->hp = "null"; 
              $NM_val_null[] = "hp";
          } 
          $this->spouse_before_qstr = $this->spouse;
          $this->spouse = substr($this->Db->qstr($this->spouse), 1, -1); 
          if ($this->spouse == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->spouse = "null"; 
              $NM_val_null[] = "spouse";
          } 
          $this->sex_before_qstr = $this->sex;
          $this->sex = substr($this->Db->qstr($this->sex), 1, -1); 
          if ($this->sex == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->sex = "null"; 
              $NM_val_null[] = "sex";
          } 
          $this->type_before_qstr = $this->type;
          $this->type = substr($this->Db->qstr($this->type), 1, -1); 
          if ($this->type == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->type = "null"; 
              $NM_val_null[] = "type";
          } 
          $this->typename_before_qstr = $this->typename;
          $this->typename = substr($this->Db->qstr($this->typename), 1, -1); 
          if ($this->typename == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->typename = "null"; 
              $NM_val_null[] = "typename";
          } 
          if ($this->hta == "")  
          { 
              $this->hta = "null"; 
              $NM_val_null[] = "hta";
          } 
          if ($this->lasthta == "")  
          { 
              $this->lasthta = "null"; 
              $NM_val_null[] = "lasthta";
          } 
          $this->bbtb_before_qstr = $this->bbtb;
          $this->bbtb = substr($this->Db->qstr($this->bbtb), 1, -1); 
          if ($this->bbtb == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bbtb = "null"; 
              $NM_val_null[] = "bbtb";
          } 
          if ($this->partus == "")  
          { 
              $this->partus = "null"; 
              $NM_val_null[] = "partus";
          } 
          $this->email_before_qstr = $this->email;
          $this->email = substr($this->Db->qstr($this->email), 1, -1); 
          if ($this->email == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->email = "null"; 
              $NM_val_null[] = "email";
          } 
          $this->blood_before_qstr = $this->blood;
          $this->blood = substr($this->Db->qstr($this->blood), 1, -1); 
          if ($this->blood == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->blood = "null"; 
              $NM_val_null[] = "blood";
          } 
          $this->location_before_qstr = $this->location;
          $this->location = substr($this->Db->qstr($this->location), 1, -1); 
          if ($this->location == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->location = "null"; 
              $NM_val_null[] = "location";
          } 
          $this->mother_before_qstr = $this->mother;
          $this->mother = substr($this->Db->qstr($this->mother), 1, -1); 
          if ($this->mother == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->mother = "null"; 
              $NM_val_null[] = "mother";
          } 
          $this->father_before_qstr = $this->father;
          $this->father = substr($this->Db->qstr($this->father), 1, -1); 
          if ($this->father == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->father = "null"; 
              $NM_val_null[] = "father";
          } 
          $this->job_before_qstr = $this->job;
          $this->job = substr($this->Db->qstr($this->job), 1, -1); 
          if ($this->job == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->job = "null"; 
              $NM_val_null[] = "job";
          } 
          $this->education_before_qstr = $this->education;
          $this->education = substr($this->Db->qstr($this->education), 1, -1); 
          if ($this->education == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->education = "null"; 
              $NM_val_null[] = "education";
          } 
          $this->religion_before_qstr = $this->religion;
          $this->religion = substr($this->Db->qstr($this->religion), 1, -1); 
          if ($this->religion == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->religion = "null"; 
              $NM_val_null[] = "religion";
          } 
          $this->birthplace_before_qstr = $this->birthplace;
          $this->birthplace = substr($this->Db->qstr($this->birthplace), 1, -1); 
          if ($this->birthplace == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->birthplace = "null"; 
              $NM_val_null[] = "birthplace";
          } 
          $this->kelurahan_before_qstr = $this->kelurahan;
          $this->kelurahan = substr($this->Db->qstr($this->kelurahan), 1, -1); 
          if ($this->kelurahan == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->kelurahan = "null"; 
              $NM_val_null[] = "kelurahan";
          } 
          $this->kecamatan_before_qstr = $this->kecamatan;
          $this->kecamatan = substr($this->Db->qstr($this->kecamatan), 1, -1); 
          if ($this->kecamatan == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->kecamatan = "null"; 
              $NM_val_null[] = "kecamatan";
          } 
          $this->rt_before_qstr = $this->rt;
          $this->rt = substr($this->Db->qstr($this->rt), 1, -1); 
          if ($this->rt == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->rt = "null"; 
              $NM_val_null[] = "rt";
          } 
          $this->rw_before_qstr = $this->rw;
          $this->rw = substr($this->Db->qstr($this->rw), 1, -1); 
          if ($this->rw == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->rw = "null"; 
              $NM_val_null[] = "rw";
          } 
          $this->member_before_qstr = $this->member;
          $this->member = substr($this->Db->qstr($this->member), 1, -1); 
          if ($this->member == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->member = "null"; 
              $NM_val_null[] = "member";
          } 
          $this->idno_before_qstr = $this->idno;
          $this->idno = substr($this->Db->qstr($this->idno), 1, -1); 
          if ($this->idno == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->idno = "null"; 
              $NM_val_null[] = "idno";
          } 
          $this->jenis_before_qstr = $this->jenis;
          $this->jenis = substr($this->Db->qstr($this->jenis), 1, -1); 
          if ($this->jenis == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->jenis = "null"; 
              $NM_val_null[] = "jenis";
          } 
          if ($this->expdate == "")  
          { 
              $this->expdate = "null"; 
              $NM_val_null[] = "expdate";
          } 
          $this->photoname_before_qstr = $this->photoname;
          $this->photoname = substr($this->Db->qstr($this->photoname), 1, -1); 
          if ($this->photoname == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->photoname = "null"; 
              $NM_val_null[] = "photoname";
          } 
          $this->tlc_before_qstr = $this->tlc;
          $this->tlc = substr($this->Db->qstr($this->tlc), 1, -1); 
          if ($this->tlc == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->tlc = "null"; 
              $NM_val_null[] = "tlc";
          } 
          $this->bu_before_qstr = $this->bu;
          $this->bu = substr($this->Db->qstr($this->bu), 1, -1); 
          if ($this->bu == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->bu = "null"; 
              $NM_val_null[] = "bu";
          } 
          if ($this->lastupdated == "")  
          { 
              $this->lastupdated = "null"; 
              $NM_val_null[] = "lastupdated";
          } 
          $this->nip_before_qstr = $this->nip;
          $this->nip = substr($this->Db->qstr($this->nip), 1, -1); 
          if ($this->nip == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->nip = "null"; 
              $NM_val_null[] = "nip";
          } 
          $this->instno_before_qstr = $this->instno;
          $this->instno = substr($this->Db->qstr($this->instno), 1, -1); 
          if ($this->instno == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->instno = "null"; 
              $NM_val_null[] = "instno";
          } 
          $this->kelompokcode_before_qstr = $this->kelompokcode;
          $this->kelompokcode = substr($this->Db->qstr($this->kelompokcode), 1, -1); 
          if ($this->kelompokcode == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->kelompokcode = "null"; 
              $NM_val_null[] = "kelompokcode";
          } 
          $this->kelompok_before_qstr = $this->kelompok;
          $this->kelompok = substr($this->Db->qstr($this->kelompok), 1, -1); 
          if ($this->kelompok == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->kelompok = "null"; 
              $NM_val_null[] = "kelompok";
          } 
          $this->penanggung_before_qstr = $this->penanggung;
          $this->penanggung = substr($this->Db->qstr($this->penanggung), 1, -1); 
          if ($this->penanggung == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->penanggung = "null"; 
              $NM_val_null[] = "penanggung";
          } 
          if ($this->registerdate == "")  
          { 
              $this->registerdate = "null"; 
              $NM_val_null[] = "registerdate";
          } 
          $this->cardno_before_qstr = $this->cardno;
          $this->cardno = substr($this->Db->qstr($this->cardno), 1, -1); 
          if ($this->cardno == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->cardno = "null"; 
              $NM_val_null[] = "cardno";
          } 
          $this->statusbl_before_qstr = $this->statusbl;
          $this->statusbl = substr($this->Db->qstr($this->statusbl), 1, -1); 
          if ($this->statusbl == "" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))  
          { 
              $this->statusbl = "null"; 
              $NM_val_null[] = "statusbl";
          } 
      }
      if ($this->nmgp_opcao == "alterar") 
      {
          $SC_fields_update = array(); 
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id ";
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              if ($this->NM_ajax_flag)
              {
                 form_tbcustomer_pack_ajax_response();
              }
              exit; 
          }  
          $bUpdateOk = true;
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $bUpdateOk = false;
              $this->sc_evento = 'update';
          } 
          $aUpdateOk = array();
          $bUpdateOk = $bUpdateOk && empty($aUpdateOk);
          if ($bUpdateOk)
          { 
              $rs1->Close(); 
              $this->lastupdated =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->lastupdated_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $NM_val_form['lastupdated'] = $this->lastupdated;
              $this->NM_ajax_changed['lastupdated'] = true;
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', name = '$this->name', salut = '$this->salut', address = '$this->address', city = '$this->city', birthDate = #$this->birthdate#, phone = '$this->phone', hp = '$this->hp', spouse = '$this->spouse', sex = '$this->sex', hta = #$this->hta#, email = '$this->email', blood = '$this->blood', mother = '$this->mother', father = '$this->father', job = '$this->job', education = '$this->education', religion = '$this->religion', birthplace = '$this->birthplace', kelurahan = '$this->kelurahan', kecamatan = '$this->kecamatan', rt = '$this->rt', rw = '$this->rw', idNo = '$this->idno', isDead = $this->isdead, bu = '$this->bu', lastUpdated = #$this->lastupdated#, penanggung = '$this->penanggung', registerDate = #$this->registerdate#"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', name = '$this->name', salut = '$this->salut', address = '$this->address', city = '$this->city', birthDate = " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", phone = '$this->phone', hp = '$this->hp', spouse = '$this->spouse', sex = '$this->sex', hta = " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", email = '$this->email', blood = '$this->blood', mother = '$this->mother', father = '$this->father', job = '$this->job', education = '$this->education', religion = '$this->religion', birthplace = '$this->birthplace', kelurahan = '$this->kelurahan', kecamatan = '$this->kecamatan', rt = '$this->rt', rw = '$this->rw', idNo = '$this->idno', isDead = $this->isdead, bu = '$this->bu', lastUpdated = " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", penanggung = '$this->penanggung', registerDate = " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ""; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', name = '$this->name', salut = '$this->salut', address = '$this->address', city = '$this->city', birthDate = " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", phone = '$this->phone', hp = '$this->hp', spouse = '$this->spouse', sex = '$this->sex', hta = " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", email = '$this->email', blood = '$this->blood', mother = '$this->mother', father = '$this->father', job = '$this->job', education = '$this->education', religion = '$this->religion', birthplace = '$this->birthplace', kelurahan = '$this->kelurahan', kecamatan = '$this->kecamatan', rt = '$this->rt', rw = '$this->rw', idNo = '$this->idno', isDead = $this->isdead, bu = '$this->bu', lastUpdated = " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", penanggung = '$this->penanggung', registerDate = " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ""; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', name = '$this->name', salut = '$this->salut', address = '$this->address', city = '$this->city', birthDate = EXTEND('$this->birthdate', YEAR TO FRACTION), phone = '$this->phone', hp = '$this->hp', spouse = '$this->spouse', sex = '$this->sex', hta = EXTEND('$this->hta', YEAR TO FRACTION), email = '$this->email', blood = '$this->blood', mother = '$this->mother', father = '$this->father', job = '$this->job', education = '$this->education', religion = '$this->religion', birthplace = '$this->birthplace', kelurahan = '$this->kelurahan', kecamatan = '$this->kecamatan', rt = '$this->rt', rw = '$this->rw', idNo = '$this->idno', isDead = $this->isdead, bu = '$this->bu', lastUpdated = EXTEND('$this->lastupdated', YEAR TO FRACTION), penanggung = '$this->penanggung', registerDate = EXTEND('$this->registerdate', YEAR TO FRACTION)"; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', name = '$this->name', salut = '$this->salut', address = '$this->address', city = '$this->city', birthDate = " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", phone = '$this->phone', hp = '$this->hp', spouse = '$this->spouse', sex = '$this->sex', hta = " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", email = '$this->email', blood = '$this->blood', mother = '$this->mother', father = '$this->father', job = '$this->job', education = '$this->education', religion = '$this->religion', birthplace = '$this->birthplace', kelurahan = '$this->kelurahan', kecamatan = '$this->kecamatan', rt = '$this->rt', rw = '$this->rw', idNo = '$this->idno', isDead = $this->isdead, bu = '$this->bu', lastUpdated = " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", penanggung = '$this->penanggung', registerDate = " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ""; 
              } 
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', name = '$this->name', salut = '$this->salut', address = '$this->address', city = '$this->city', birthDate = " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", phone = '$this->phone', hp = '$this->hp', spouse = '$this->spouse', sex = '$this->sex', hta = " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", email = '$this->email', blood = '$this->blood', mother = '$this->mother', father = '$this->father', job = '$this->job', education = '$this->education', religion = '$this->religion', birthplace = '$this->birthplace', kelurahan = '$this->kelurahan', kecamatan = '$this->kecamatan', rt = '$this->rt', rw = '$this->rw', idNo = '$this->idno', isDead = $this->isdead, bu = '$this->bu', lastUpdated = " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", penanggung = '$this->penanggung', registerDate = " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ""; 
              } 
              else 
              { 
                  $comando = "UPDATE " . $this->Ini->nm_tabela . " SET ";  
                  $SC_fields_update[] = "custCode = '$this->custcode', name = '$this->name', salut = '$this->salut', address = '$this->address', city = '$this->city', birthDate = " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", phone = '$this->phone', hp = '$this->hp', spouse = '$this->spouse', sex = '$this->sex', hta = " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", email = '$this->email', blood = '$this->blood', mother = '$this->mother', father = '$this->father', job = '$this->job', education = '$this->education', religion = '$this->religion', birthplace = '$this->birthplace', kelurahan = '$this->kelurahan', kecamatan = '$this->kecamatan', rt = '$this->rt', rw = '$this->rw', idNo = '$this->idno', isDead = $this->isdead, bu = '$this->bu', lastUpdated = " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", penanggung = '$this->penanggung', registerDate = " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ""; 
              } 
              if (isset($NM_val_form['postcode']) && $NM_val_form['postcode'] != $this->nmgp_dados_select['postcode']) 
              { 
                  $SC_fields_update[] = "postCode = '$this->postcode'"; 
              } 
              if (isset($NM_val_form['type']) && $NM_val_form['type'] != $this->nmgp_dados_select['type']) 
              { 
                  $SC_fields_update[] = "type = '$this->type'"; 
              } 
              if (isset($NM_val_form['typename']) && $NM_val_form['typename'] != $this->nmgp_dados_select['typename']) 
              { 
                  $SC_fields_update[] = "typeName = '$this->typename'"; 
              } 
              if (isset($NM_val_form['lasthta']) && $NM_val_form['lasthta'] != $this->nmgp_dados_select['lasthta']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "lastHta = #$this->lasthta#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "lastHta = EXTEND('" . $this->lasthta . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "lastHta = " . $this->Ini->date_delim . $this->lasthta . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['bbtb']) && $NM_val_form['bbtb'] != $this->nmgp_dados_select['bbtb']) 
              { 
                  $SC_fields_update[] = "bbtb = '$this->bbtb'"; 
              } 
              if (isset($NM_val_form['partus']) && $NM_val_form['partus'] != $this->nmgp_dados_select['partus']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "partus = #$this->partus#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "partus = EXTEND('" . $this->partus . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "partus = " . $this->Ini->date_delim . $this->partus . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['deleted']) && $NM_val_form['deleted'] != $this->nmgp_dados_select['deleted']) 
              { 
                  $SC_fields_update[] = "deleted = $this->deleted"; 
              } 
              if (isset($NM_val_form['hamil']) && $NM_val_form['hamil'] != $this->nmgp_dados_select['hamil']) 
              { 
                  $SC_fields_update[] = "hamil = $this->hamil"; 
              } 
              if (isset($NM_val_form['location']) && $NM_val_form['location'] != $this->nmgp_dados_select['location']) 
              { 
                  $SC_fields_update[] = "location = '$this->location'"; 
              } 
              if (isset($NM_val_form['member']) && $NM_val_form['member'] != $this->nmgp_dados_select['member']) 
              { 
                  $SC_fields_update[] = "member = '$this->member'"; 
              } 
              if (isset($NM_val_form['jenis']) && $NM_val_form['jenis'] != $this->nmgp_dados_select['jenis']) 
              { 
                  $SC_fields_update[] = "jenis = '$this->jenis'"; 
              } 
              if (isset($NM_val_form['expdate']) && $NM_val_form['expdate'] != $this->nmgp_dados_select['expdate']) 
              { 
                  if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
                  { 
                      $SC_fields_update[] = "expDate = #$this->expdate#"; 
                  } 
                  elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
                  { 
                      $SC_fields_update[] = "expDate = EXTEND('" . $this->expdate . "', YEAR TO FRACTION)"; 
                  } 
                  else
                  { 
                      $SC_fields_update[] = "expDate = " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ""; 
                  } 
              } 
              if (isset($NM_val_form['photoname']) && $NM_val_form['photoname'] != $this->nmgp_dados_select['photoname']) 
              { 
                  $SC_fields_update[] = "photoName = '$this->photoname'"; 
              } 
              if (isset($NM_val_form['tlc']) && $NM_val_form['tlc'] != $this->nmgp_dados_select['tlc']) 
              { 
                  $SC_fields_update[] = "tlc = '$this->tlc'"; 
              } 
              if (isset($NM_val_form['nip']) && $NM_val_form['nip'] != $this->nmgp_dados_select['nip']) 
              { 
                  $SC_fields_update[] = "nip = '$this->nip'"; 
              } 
              if (isset($NM_val_form['instno']) && $NM_val_form['instno'] != $this->nmgp_dados_select['instno']) 
              { 
                  $SC_fields_update[] = "instNo = '$this->instno'"; 
              } 
              if (isset($NM_val_form['kelompokcode']) && $NM_val_form['kelompokcode'] != $this->nmgp_dados_select['kelompokcode']) 
              { 
                  $SC_fields_update[] = "kelompokCode = '$this->kelompokcode'"; 
              } 
              if (isset($NM_val_form['kelompok']) && $NM_val_form['kelompok'] != $this->nmgp_dados_select['kelompok']) 
              { 
                  $SC_fields_update[] = "kelompok = '$this->kelompok'"; 
              } 
              if (isset($NM_val_form['cardno']) && $NM_val_form['cardno'] != $this->nmgp_dados_select['cardno']) 
              { 
                  $SC_fields_update[] = "cardNo = '$this->cardno'"; 
              } 
              if (isset($NM_val_form['statusbl']) && $NM_val_form['statusbl'] != $this->nmgp_dados_select['statusbl']) 
              { 
                  $SC_fields_update[] = "statusBL = '$this->statusbl'"; 
              } 
              $aDoNotUpdate = array();
              $comando .= implode(",", $SC_fields_update);  
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              else  
              {
                  $comando .= " WHERE id = $this->id ";  
              }  
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $useUpdateProcedure = false;
              if (!empty($SC_fields_update) || $useUpdateProcedure)
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
                  $rs = $this->Db->Execute($comando);  
                  if ($rs === false) 
                  { 
                      if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                      {
                          $dbErrorMessage = $this->Db->ErrorMsg();
                          $dbErrorCode = $this->Db->ErrorNo();
                          $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_updt'], $dbErrorMessage, true);
                          if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                          { 
                              $this->sc_erro_update = $dbErrorMessage;
                              $this->NM_rollback_db(); 
                              if ($this->NM_ajax_flag)
                              {
                                  form_tbcustomer_pack_ajax_response();
                              }
                              exit;  
                          }   
                      }   
                  }   
              }   
              if (in_array(strtolower($this->Ini->nm_tpbanco), $nm_bases_lob_geral))
              { 
              }   
              $this->custcode = $this->custcode_before_qstr;
              $this->name = $this->name_before_qstr;
              $this->salut = $this->salut_before_qstr;
              $this->address = $this->address_before_qstr;
              $this->city = $this->city_before_qstr;
              $this->postcode = $this->postcode_before_qstr;
              $this->phone = $this->phone_before_qstr;
              $this->hp = $this->hp_before_qstr;
              $this->spouse = $this->spouse_before_qstr;
              $this->sex = $this->sex_before_qstr;
              $this->type = $this->type_before_qstr;
              $this->typename = $this->typename_before_qstr;
              $this->bbtb = $this->bbtb_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->blood = $this->blood_before_qstr;
              $this->location = $this->location_before_qstr;
              $this->mother = $this->mother_before_qstr;
              $this->father = $this->father_before_qstr;
              $this->job = $this->job_before_qstr;
              $this->education = $this->education_before_qstr;
              $this->religion = $this->religion_before_qstr;
              $this->birthplace = $this->birthplace_before_qstr;
              $this->kelurahan = $this->kelurahan_before_qstr;
              $this->kecamatan = $this->kecamatan_before_qstr;
              $this->rt = $this->rt_before_qstr;
              $this->rw = $this->rw_before_qstr;
              $this->member = $this->member_before_qstr;
              $this->idno = $this->idno_before_qstr;
              $this->jenis = $this->jenis_before_qstr;
              $this->photoname = $this->photoname_before_qstr;
              $this->tlc = $this->tlc_before_qstr;
              $this->bu = $this->bu_before_qstr;
              $this->nip = $this->nip_before_qstr;
              $this->instno = $this->instno_before_qstr;
              $this->kelompokcode = $this->kelompokcode_before_qstr;
              $this->kelompok = $this->kelompok_before_qstr;
              $this->penanggung = $this->penanggung_before_qstr;
              $this->cardno = $this->cardno_before_qstr;
              $this->statusbl = $this->statusbl_before_qstr;
              $this->sc_evento = "update"; 
              $this->nmgp_opcao = "igual"; 
              $this->nm_flag_iframe = true;
              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['db_changed'] = true;


              if     (isset($NM_val_form) && isset($NM_val_form['id'])) { $this->id = $NM_val_form['id']; }
              elseif (isset($this->id)) { $this->nm_limpa_alfa($this->id); }
              if     (isset($NM_val_form) && isset($NM_val_form['custcode'])) { $this->custcode = $NM_val_form['custcode']; }
              elseif (isset($this->custcode)) { $this->nm_limpa_alfa($this->custcode); }
              if     (isset($NM_val_form) && isset($NM_val_form['name'])) { $this->name = $NM_val_form['name']; }
              elseif (isset($this->name)) { $this->nm_limpa_alfa($this->name); }
              if     (isset($NM_val_form) && isset($NM_val_form['salut'])) { $this->salut = $NM_val_form['salut']; }
              elseif (isset($this->salut)) { $this->nm_limpa_alfa($this->salut); }
              if     (isset($NM_val_form) && isset($NM_val_form['address'])) { $this->address = $NM_val_form['address']; }
              elseif (isset($this->address)) { $this->nm_limpa_alfa($this->address); }
              if     (isset($NM_val_form) && isset($NM_val_form['city'])) { $this->city = $NM_val_form['city']; }
              elseif (isset($this->city)) { $this->nm_limpa_alfa($this->city); }
              if     (isset($NM_val_form) && isset($NM_val_form['phone'])) { $this->phone = $NM_val_form['phone']; }
              elseif (isset($this->phone)) { $this->nm_limpa_alfa($this->phone); }
              if     (isset($NM_val_form) && isset($NM_val_form['hp'])) { $this->hp = $NM_val_form['hp']; }
              elseif (isset($this->hp)) { $this->nm_limpa_alfa($this->hp); }
              if     (isset($NM_val_form) && isset($NM_val_form['spouse'])) { $this->spouse = $NM_val_form['spouse']; }
              elseif (isset($this->spouse)) { $this->nm_limpa_alfa($this->spouse); }
              if     (isset($NM_val_form) && isset($NM_val_form['sex'])) { $this->sex = $NM_val_form['sex']; }
              elseif (isset($this->sex)) { $this->nm_limpa_alfa($this->sex); }
              if     (isset($NM_val_form) && isset($NM_val_form['email'])) { $this->email = $NM_val_form['email']; }
              elseif (isset($this->email)) { $this->nm_limpa_alfa($this->email); }
              if     (isset($NM_val_form) && isset($NM_val_form['blood'])) { $this->blood = $NM_val_form['blood']; }
              elseif (isset($this->blood)) { $this->nm_limpa_alfa($this->blood); }
              if     (isset($NM_val_form) && isset($NM_val_form['mother'])) { $this->mother = $NM_val_form['mother']; }
              elseif (isset($this->mother)) { $this->nm_limpa_alfa($this->mother); }
              if     (isset($NM_val_form) && isset($NM_val_form['father'])) { $this->father = $NM_val_form['father']; }
              elseif (isset($this->father)) { $this->nm_limpa_alfa($this->father); }
              if     (isset($NM_val_form) && isset($NM_val_form['job'])) { $this->job = $NM_val_form['job']; }
              elseif (isset($this->job)) { $this->nm_limpa_alfa($this->job); }
              if     (isset($NM_val_form) && isset($NM_val_form['education'])) { $this->education = $NM_val_form['education']; }
              elseif (isset($this->education)) { $this->nm_limpa_alfa($this->education); }
              if     (isset($NM_val_form) && isset($NM_val_form['religion'])) { $this->religion = $NM_val_form['religion']; }
              elseif (isset($this->religion)) { $this->nm_limpa_alfa($this->religion); }
              if     (isset($NM_val_form) && isset($NM_val_form['birthplace'])) { $this->birthplace = $NM_val_form['birthplace']; }
              elseif (isset($this->birthplace)) { $this->nm_limpa_alfa($this->birthplace); }
              if     (isset($NM_val_form) && isset($NM_val_form['kelurahan'])) { $this->kelurahan = $NM_val_form['kelurahan']; }
              elseif (isset($this->kelurahan)) { $this->nm_limpa_alfa($this->kelurahan); }
              if     (isset($NM_val_form) && isset($NM_val_form['kecamatan'])) { $this->kecamatan = $NM_val_form['kecamatan']; }
              elseif (isset($this->kecamatan)) { $this->nm_limpa_alfa($this->kecamatan); }
              if     (isset($NM_val_form) && isset($NM_val_form['rt'])) { $this->rt = $NM_val_form['rt']; }
              elseif (isset($this->rt)) { $this->nm_limpa_alfa($this->rt); }
              if     (isset($NM_val_form) && isset($NM_val_form['rw'])) { $this->rw = $NM_val_form['rw']; }
              elseif (isset($this->rw)) { $this->nm_limpa_alfa($this->rw); }
              if     (isset($NM_val_form) && isset($NM_val_form['idno'])) { $this->idno = $NM_val_form['idno']; }
              elseif (isset($this->idno)) { $this->nm_limpa_alfa($this->idno); }
              if     (isset($NM_val_form) && isset($NM_val_form['isdead'])) { $this->isdead = $NM_val_form['isdead']; }
              elseif (isset($this->isdead)) { $this->nm_limpa_alfa($this->isdead); }
              if     (isset($NM_val_form) && isset($NM_val_form['bu'])) { $this->bu = $NM_val_form['bu']; }
              elseif (isset($this->bu)) { $this->nm_limpa_alfa($this->bu); }
              if     (isset($NM_val_form) && isset($NM_val_form['penanggung'])) { $this->penanggung = $NM_val_form['penanggung']; }
              elseif (isset($this->penanggung)) { $this->nm_limpa_alfa($this->penanggung); }

              $this->nm_formatar_campos();
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
              }

              $aOldRefresh               = $this->nmgp_refresh_fields;
              $this->nmgp_refresh_fields = array_diff(array('custcode', 'name', 'salut', 'birthplace', 'birthdate', 'sex', 'address', 'rt', 'rw', 'city', 'kecamatan', 'kelurahan', 'hp', 'blood', 'spouse', 'idno', 'religion', 'job', 'father', 'mother', 'penanggung', 'bu', 'education', 'lastupdated', 'registerdate', 'phone', 'email', 'hta', 'isdead', 'id'), $aDoNotUpdate);
              $this->ajax_return_values();
              $this->nmgp_refresh_fields = $aOldRefresh;

              $this->nm_tira_formatacao();
              $this->nm_converte_datas();
          }  
      }  
      if ($this->nmgp_opcao == "incluir") 
      { 
          $NM_cmp_auto = "";
          $NM_seq_auto = "";
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
          { 
              $NM_seq_auto = "NULL, ";
              $NM_cmp_auto = "id, ";
          } 
              $this->registerdate =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
              $this->registerdate_hora =  date('Y') . "-" . date('m')  . "-" . date('d') . " " . date('H') . ":" . date('i') . ":" . date('s');
          $bInsertOk = true;
          $aInsertOk = array(); 
          $bInsertOk = $bInsertOk && empty($aInsertOk);
          if (!isset($_POST['nmgp_ins_valid']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['insert_validation'] != $_POST['nmgp_ins_valid'])
          {
              $bInsertOk = false;
              $this->Erro->mensagem(__FILE__, __LINE__, 'security', $this->Ini->Nm_lang['lang_errm_inst_vald']);
              if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
              {
                  $this->nmgp_opcao = 'refresh_insert';
                  if ($this->NM_ajax_flag)
                  {
                      form_tbcustomer_pack_ajax_response();
                      exit;
                  }
              }
          }
          if ($bInsertOk)
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL) VALUES ('$this->custcode', '$this->name', '$this->salut', '$this->address', '$this->city', '$this->postcode', #$this->birthdate#, '$this->phone', '$this->hp', '$this->spouse', '$this->sex', '$this->type', '$this->typename', #$this->hta#, #$this->lasthta#, '$this->bbtb', #$this->partus#, $this->deleted, $this->hamil, '$this->email', '$this->blood', '$this->location', '$this->mother', '$this->father', '$this->job', '$this->education', '$this->religion', '$this->birthplace', '$this->kelurahan', '$this->kecamatan', '$this->rt', '$this->rw', '$this->member', '$this->idno', '$this->jenis', #$this->expdate#, '$this->photoname', $this->isdead, '$this->tlc', '$this->bu', #$this->lastupdated#, '$this->nip', '$this->instno', '$this->kelompokcode', '$this->kelompok', '$this->penanggung', #$this->registerdate#, '$this->cardno', '$this->statusbl')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->name', '$this->salut', '$this->address', '$this->city', '$this->postcode', " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->phone', '$this->hp', '$this->spouse', '$this->sex', '$this->type', '$this->typename', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->lasthta . $this->Ini->date_delim1 . ", '$this->bbtb', " . $this->Ini->date_delim . $this->partus . $this->Ini->date_delim1 . ", $this->deleted, $this->hamil, '$this->email', '$this->blood', '$this->location', '$this->mother', '$this->father', '$this->job', '$this->education', '$this->religion', '$this->birthplace', '$this->kelurahan', '$this->kecamatan', '$this->rt', '$this->rw', '$this->member', '$this->idno', '$this->jenis', " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->photoname', $this->isdead, '$this->tlc', '$this->bu', " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", '$this->nip', '$this->instno', '$this->kelompokcode', '$this->kelompok', '$this->penanggung', " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ", '$this->cardno', '$this->statusbl')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
              { 
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->name', '$this->salut', '$this->address', '$this->city', '$this->postcode', " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->phone', '$this->hp', '$this->spouse', '$this->sex', '$this->type', '$this->typename', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->lasthta . $this->Ini->date_delim1 . ", '$this->bbtb', " . $this->Ini->date_delim . $this->partus . $this->Ini->date_delim1 . ", $this->deleted, $this->hamil, '$this->email', '$this->blood', '$this->location', '$this->mother', '$this->father', '$this->job', '$this->education', '$this->religion', '$this->birthplace', '$this->kelurahan', '$this->kecamatan', '$this->rt', '$this->rw', '$this->member', '$this->idno', '$this->jenis', " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->photoname', $this->isdead, '$this->tlc', '$this->bu', " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", '$this->nip', '$this->instno', '$this->kelompokcode', '$this->kelompok', '$this->penanggung', " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ", '$this->cardno', '$this->statusbl')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->name', '$this->salut', '$this->address', '$this->city', '$this->postcode', " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->phone', '$this->hp', '$this->spouse', '$this->sex', '$this->type', '$this->typename', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->lasthta . $this->Ini->date_delim1 . ", '$this->bbtb', " . $this->Ini->date_delim . $this->partus . $this->Ini->date_delim1 . ", $this->deleted, $this->hamil, '$this->email', '$this->blood', '$this->location', '$this->mother', '$this->father', '$this->job', '$this->education', '$this->religion', '$this->birthplace', '$this->kelurahan', '$this->kecamatan', '$this->rt', '$this->rw', '$this->member', '$this->idno', '$this->jenis', " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->photoname', $this->isdead, '$this->tlc', '$this->bu', " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", '$this->nip', '$this->instno', '$this->kelompokcode', '$this->kelompok', '$this->penanggung', " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ", '$this->cardno', '$this->statusbl')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->name', '$this->salut', '$this->address', '$this->city', '$this->postcode', EXTEND('$this->birthdate', YEAR TO FRACTION), '$this->phone', '$this->hp', '$this->spouse', '$this->sex', '$this->type', '$this->typename', EXTEND('$this->hta', YEAR TO FRACTION), EXTEND('$this->lasthta', YEAR TO FRACTION), '$this->bbtb', EXTEND('$this->partus', YEAR TO FRACTION), $this->deleted, $this->hamil, '$this->email', '$this->blood', '$this->location', '$this->mother', '$this->father', '$this->job', '$this->education', '$this->religion', '$this->birthplace', '$this->kelurahan', '$this->kecamatan', '$this->rt', '$this->rw', '$this->member', '$this->idno', '$this->jenis', EXTEND('$this->expdate', YEAR TO FRACTION), '$this->photoname', $this->isdead, '$this->tlc', '$this->bu', EXTEND('$this->lastupdated', YEAR TO FRACTION), '$this->nip', '$this->instno', '$this->kelompokcode', '$this->kelompok', '$this->penanggung', EXTEND('$this->registerdate', YEAR TO FRACTION), '$this->cardno', '$this->statusbl')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->name', '$this->salut', '$this->address', '$this->city', '$this->postcode', " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->phone', '$this->hp', '$this->spouse', '$this->sex', '$this->type', '$this->typename', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->lasthta . $this->Ini->date_delim1 . ", '$this->bbtb', " . $this->Ini->date_delim . $this->partus . $this->Ini->date_delim1 . ", $this->deleted, $this->hamil, '$this->email', '$this->blood', '$this->location', '$this->mother', '$this->father', '$this->job', '$this->education', '$this->religion', '$this->birthplace', '$this->kelurahan', '$this->kecamatan', '$this->rt', '$this->rw', '$this->member', '$this->idno', '$this->jenis', " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->photoname', $this->isdead, '$this->tlc', '$this->bu', " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", '$this->nip', '$this->instno', '$this->kelompokcode', '$this->kelompok', '$this->penanggung', " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ", '$this->cardno', '$this->statusbl')"; 
              }
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->name', '$this->salut', '$this->address', '$this->city', '$this->postcode', " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->phone', '$this->hp', '$this->spouse', '$this->sex', '$this->type', '$this->typename', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->lasthta . $this->Ini->date_delim1 . ", '$this->bbtb', " . $this->Ini->date_delim . $this->partus . $this->Ini->date_delim1 . ", $this->deleted, $this->hamil, '$this->email', '$this->blood', '$this->location', '$this->mother', '$this->father', '$this->job', '$this->education', '$this->religion', '$this->birthplace', '$this->kelurahan', '$this->kecamatan', '$this->rt', '$this->rw', '$this->member', '$this->idno', '$this->jenis', " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->photoname', $this->isdead, '$this->tlc', '$this->bu', " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", '$this->nip', '$this->instno', '$this->kelompokcode', '$this->kelompok', '$this->penanggung', " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ", '$this->cardno', '$this->statusbl')"; 
              }
              elseif ($this->Ini->nm_tpbanco == 'pdo_ibm')
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->name', '$this->salut', '$this->address', '$this->city', '$this->postcode', " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->phone', '$this->hp', '$this->spouse', '$this->sex', '$this->type', '$this->typename', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->lasthta . $this->Ini->date_delim1 . ", '$this->bbtb', " . $this->Ini->date_delim . $this->partus . $this->Ini->date_delim1 . ", $this->deleted, $this->hamil, '$this->email', '$this->blood', '$this->location', '$this->mother', '$this->father', '$this->job', '$this->education', '$this->religion', '$this->birthplace', '$this->kelurahan', '$this->kecamatan', '$this->rt', '$this->rw', '$this->member', '$this->idno', '$this->jenis', " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->photoname', $this->isdead, '$this->tlc', '$this->bu', " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", '$this->nip', '$this->instno', '$this->kelompokcode', '$this->kelompok', '$this->penanggung', " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ", '$this->cardno', '$this->statusbl')"; 
              }
              else
              {
                  $comando = "INSERT INTO " . $this->Ini->nm_tabela . " (" . $NM_cmp_auto . "custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL) VALUES (" . $NM_seq_auto . "'$this->custcode', '$this->name', '$this->salut', '$this->address', '$this->city', '$this->postcode', " . $this->Ini->date_delim . $this->birthdate . $this->Ini->date_delim1 . ", '$this->phone', '$this->hp', '$this->spouse', '$this->sex', '$this->type', '$this->typename', " . $this->Ini->date_delim . $this->hta . $this->Ini->date_delim1 . ", " . $this->Ini->date_delim . $this->lasthta . $this->Ini->date_delim1 . ", '$this->bbtb', " . $this->Ini->date_delim . $this->partus . $this->Ini->date_delim1 . ", $this->deleted, $this->hamil, '$this->email', '$this->blood', '$this->location', '$this->mother', '$this->father', '$this->job', '$this->education', '$this->religion', '$this->birthplace', '$this->kelurahan', '$this->kecamatan', '$this->rt', '$this->rw', '$this->member', '$this->idno', '$this->jenis', " . $this->Ini->date_delim . $this->expdate . $this->Ini->date_delim1 . ", '$this->photoname', $this->isdead, '$this->tlc', '$this->bu', " . $this->Ini->date_delim . $this->lastupdated . $this->Ini->date_delim1 . ", '$this->nip', '$this->instno', '$this->kelompokcode', '$this->kelompok', '$this->penanggung', " . $this->Ini->date_delim . $this->registerdate . $this->Ini->date_delim1 . ", '$this->cardno', '$this->statusbl')"; 
              }
              $comando = str_replace("N'null'", "null", $comando) ; 
              $comando = str_replace("'null'", "null", $comando) ; 
              $comando = str_replace("#null#", "null", $comando) ; 
              $comando = str_replace($this->Ini->date_delim . "null" . $this->Ini->date_delim1, "null", $comando) ; 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                $comando = str_replace("EXTEND('', YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO FRACTION)", "null", $comando) ; 
                $comando = str_replace("EXTEND('', YEAR TO DAY)", "null", $comando) ; 
                $comando = str_replace("EXTEND(null, YEAR TO DAY)", "null", $comando) ; 
              }  
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = $comando; 
              $rs = $this->Db->Execute($comando); 
              if ($rs === false)  
              { 
                  if (FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "MAIL SENT") && FALSE === strpos(strtoupper($this->Db->ErrorMsg()), "WARNING"))
                  {
                      $dbErrorMessage = $this->Db->ErrorMsg();
                      $dbErrorCode = $this->Db->ErrorNo();
                      $this->handleDbErrorMessage($dbErrorMessage, $dbErrorCode);
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_inst'], $dbErrorMessage, true);
                      if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler'])
                      { 
                          $this->sc_erro_insert = $dbErrorMessage;
                          $this->nmgp_opcao     = 'refresh_insert';
                          $this->NM_rollback_db(); 
                          if ($this->NM_ajax_flag)
                          {
                              form_tbcustomer_pack_ajax_response();
                              exit; 
                          }
                      }  
                  }  
              }  
              if ('refresh_insert' != $this->nmgp_opcao)
              {
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access) || in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase)) 
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select @@identity"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_tbcustomer_pack_ajax_response();
                      }
                      exit; 
                  } 
                  $this->id =  $rsy->fields[0];
                 $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_id()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT dbinfo('sqlca.sqlerrd1') FROM " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select .currval from dual"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
              { 
                  $str_tabela = "SYSIBM.SYSDUMMY1"; 
                  if($this->Ini->nm_con_use_schema == "N") 
                  { 
                          $str_tabela = "SYSDUMMY1"; 
                  } 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "SELECT IDENTITY_VAL_LOCAL() FROM " . $str_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select CURRVAL('')"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select gen_id(, 0) from " . $this->Ini->nm_tabela; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sqlite))
              { 
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select last_insert_rowid()"; 
                  $rsy = $this->Db->Execute($_SESSION['scriptcase']['sc_sql_ult_comando']); 
                  if ($rsy === false && !$rsy->EOF)  
                  { 
                      $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
                      exit; 
                  } 
                  $this->id = $rsy->fields[0];
                  $rsy->Close(); 
              } 
              }

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total']);
              }

              $this->sc_evento = "insert"; 
              $this->custcode = $this->custcode_before_qstr;
              $this->name = $this->name_before_qstr;
              $this->salut = $this->salut_before_qstr;
              $this->address = $this->address_before_qstr;
              $this->city = $this->city_before_qstr;
              $this->postcode = $this->postcode_before_qstr;
              $this->phone = $this->phone_before_qstr;
              $this->hp = $this->hp_before_qstr;
              $this->spouse = $this->spouse_before_qstr;
              $this->sex = $this->sex_before_qstr;
              $this->type = $this->type_before_qstr;
              $this->typename = $this->typename_before_qstr;
              $this->bbtb = $this->bbtb_before_qstr;
              $this->email = $this->email_before_qstr;
              $this->blood = $this->blood_before_qstr;
              $this->location = $this->location_before_qstr;
              $this->mother = $this->mother_before_qstr;
              $this->father = $this->father_before_qstr;
              $this->job = $this->job_before_qstr;
              $this->education = $this->education_before_qstr;
              $this->religion = $this->religion_before_qstr;
              $this->birthplace = $this->birthplace_before_qstr;
              $this->kelurahan = $this->kelurahan_before_qstr;
              $this->kecamatan = $this->kecamatan_before_qstr;
              $this->rt = $this->rt_before_qstr;
              $this->rw = $this->rw_before_qstr;
              $this->member = $this->member_before_qstr;
              $this->idno = $this->idno_before_qstr;
              $this->jenis = $this->jenis_before_qstr;
              $this->photoname = $this->photoname_before_qstr;
              $this->tlc = $this->tlc_before_qstr;
              $this->bu = $this->bu_before_qstr;
              $this->nip = $this->nip_before_qstr;
              $this->instno = $this->instno_before_qstr;
              $this->kelompokcode = $this->kelompokcode_before_qstr;
              $this->kelompok = $this->kelompok_before_qstr;
              $this->penanggung = $this->penanggung_before_qstr;
              $this->cardno = $this->cardno_before_qstr;
              $this->statusbl = $this->statusbl_before_qstr;
              if (empty($this->sc_erro_insert)) {
                  $this->record_insert_ok = true;
              } 
              if ('refresh_insert' != $this->nmgp_opcao && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['sc_redir_insert']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['sc_redir_insert'] != "S"))
              {
              $this->nmgp_opcao   = "igual"; 
              $this->nmgp_opc_ant = "igual"; 
              $this->nmgp_botoes['sc_btn_0'] = "on";
              $this->nmgp_botoes['sc_btn_1'] = "on";
              $this->nmgp_botoes['sc_btn_2'] = "on";
              $this->nmgp_botoes['sc_btn_3'] = "on";
              $this->return_after_insert();
              }
              $this->nm_flag_iframe = true;
          } 
          if ($this->lig_edit_lookup)
          {
              $this->lig_edit_lookup_call = true;
          }
      } 
      if ($this->nmgp_opcao == "excluir") 
      { 
          $this->id = substr($this->Db->qstr($this->id), 1, -1); 

          $bDelecaoOk = true;
          $sMsgErro   = '';

          if ($bDelecaoOk)
          {

          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          else  
          {
              $_SESSION['scriptcase']['sc_sql_ult_comando'] = "select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id"; 
              $rs1 = $this->Db->Execute("select count(*) AS countTest from " . $this->Ini->nm_tabela . " where id = $this->id "); 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          if ($rs1 === false)  
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dbas'], $this->Db->ErrorMsg()); 
              exit; 
          }  
          $tmp_result = (int) $rs1->fields[0]; 
          if ($tmp_result != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_dele_nfnd']); 
              $this->nmgp_opcao = "nada"; 
              $this->sc_evento = 'delete';
          } 
          else 
          { 
              $rs1->Close(); 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              else  
              {
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = "DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "; 
                  $rs = $this->Db->Execute("DELETE FROM " . $this->Ini->nm_tabela . " where id = $this->id "); 
              }  
              if ($rs === false) 
              { 
                  $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dele'], $this->Db->ErrorMsg(), true); 
                  if (isset($_SESSION['scriptcase']['erro_handler']) && $_SESSION['scriptcase']['erro_handler']) 
                  { 
                      $this->sc_erro_delete = $this->Db->ErrorMsg();  
                      $this->NM_rollback_db(); 
                      if ($this->NM_ajax_flag)
                      {
                          form_tbcustomer_pack_ajax_response();
                          exit; 
                      }
                  } 
              } 
              $this->sc_evento = "delete"; 
              if (empty($this->sc_erro_delete)) {
                  $this->record_delete_ok = true;
              }
              $this->nmgp_opcao = "avanca"; 
              $this->nm_flag_iframe = true;

              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['db_changed'] = true;

              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total']))
              {
                  unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total']);
              }

              if ($this->lig_edit_lookup)
              {
                  $this->lig_edit_lookup_call = true;
              }
          }

          }
          else
          {
              $this->sc_evento = "delete"; 
              $this->nmgp_opcao = "igual"; 
              $this->Erro->mensagem(__FILE__, __LINE__, "critica", $sMsgErro); 
          }

      }  
      if (!empty($this->sc_force_zero))
      {
          foreach ($this->sc_force_zero as $i_force_zero => $sc_force_zero_field)
          {
              eval('if ($this->' . $sc_force_zero_field . ' == 0) {$this->' . $sc_force_zero_field . ' = "";}');
          }
      }
      $this->sc_force_zero = array();
      if (!empty($NM_val_null))
      {
          foreach ($NM_val_null as $i_val_null => $sc_val_null_field)
          {
              eval('$this->' . $sc_val_null_field . ' = "";');
          }
      }
    if ("insert" == $this->sc_evento && $this->nmgp_opcao != "nada") {
        $_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'on';
  $redir_app = 'pdfreport_kartu';
$redir_target = '_blank';
$redir_param = array('var_custCode' => $this->custcode );
 if (!isset($this->Campos_Mens_erro) || empty($this->Campos_Mens_erro))
 {
$this->nmgp_redireciona_form($redir_app, $this->nm_location, $redir_param, "$redir_target", "ret_self", 440, 630);
 };
$_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'off'; 
    }
      if (!empty($this->Campos_Mens_erro)) 
      {
          $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
          $this->Campos_Mens_erro = ""; 
          $this->nmgp_opc_ant = $salva_opcao ; 
          if ($salva_opcao == "incluir") 
          { 
              $GLOBALS["erro_incl"] = 1; 
          }
          if ($this->nmgp_opcao == "alterar" || $this->nmgp_opcao == "incluir" || $this->nmgp_opcao == "excluir") 
          {
              $this->nmgp_opcao = "nada"; 
          } 
          $this->sc_evento = ""; 
          $this->NM_rollback_db(); 
          return; 
      }
      if ($salva_opcao == "incluir" && $GLOBALS["erro_incl"] != 1) 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['parms'] = "id?#?$this->id?@?"; 
      }
      $this->NM_commit_db(); 
      if ($this->sc_evento != "insert" && $this->sc_evento != "update" && $this->sc_evento != "delete")
      { 
          $this->id = null === $this->id ? null : substr($this->Db->qstr($this->id), 1, -1); 
      } 
      if (isset($this->NM_where_filter))
      {
          $this->NM_where_filter = str_replace("@percent@", "%", $this->NM_where_filter);
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter'] = trim($this->NM_where_filter);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total']))
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total']);
          }
      }
      $sc_where_filter = '';
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter_form'])
      {
          $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter_form'];
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter'] && $sc_where_filter != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter'])
      {
          if (empty($sc_where_filter))
          {
              $sc_where_filter = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter'];
          }
          else
          {
              $sc_where_filter .= " and (" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter'] . ")";
          }
      }
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "inicio")
      { 
          $this->nmgp_opcao = "igual"; 
      } 
      $GLOBALS["NM_ERRO_IBASE"] = 0;  
//---------- 
      if ($this->nmgp_opcao != "novo" && $this->nmgp_opcao != "nada" && $this->nmgp_opcao != "refresh_insert") 
      { 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['parms'] = ""; 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 1;  
          } 
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
          { 
              $nmgp_select = "SELECT id, custCode, name, salut, address, city, postCode, str_replace (convert(char(10),birthDate,102), '.', '-') + ' ' + convert(char(8),birthDate,20), phone, hp, spouse, sex, type, typeName, str_replace (convert(char(10),hta,102), '.', '-') + ' ' + convert(char(8),hta,20), str_replace (convert(char(10),lastHta,102), '.', '-') + ' ' + convert(char(8),lastHta,20), bbtb, str_replace (convert(char(10),partus,102), '.', '-') + ' ' + convert(char(8),partus,20), deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, str_replace (convert(char(10),expDate,102), '.', '-') + ' ' + convert(char(8),expDate,20), photoName, isDead, tlc, bu, str_replace (convert(char(10),lastUpdated,102), '.', '-') + ' ' + convert(char(8),lastUpdated,20), nip, instNo, kelompokCode, kelompok, penanggung, str_replace (convert(char(10),registerDate,102), '.', '-') + ' ' + convert(char(8),registerDate,20), cardNo, statusBL from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          { 
              $nmgp_select = "SELECT id, custCode, name, salut, address, city, postCode, convert(char(23),birthDate,121), phone, hp, spouse, sex, type, typeName, convert(char(23),hta,121), convert(char(23),lastHta,121), bbtb, convert(char(23),partus,121), deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, convert(char(23),expDate,121), photoName, isDead, tlc, bu, convert(char(23),lastUpdated,121), nip, instNo, kelompokCode, kelompok, penanggung, convert(char(23),registerDate,121), cardNo, statusBL from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          { 
              $nmgp_select = "SELECT id, custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL from " . $this->Ini->nm_tabela ; 
          } 
          elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          { 
              $nmgp_select = "SELECT id, custCode, name, salut, address, city, postCode, EXTEND(birthDate, YEAR TO FRACTION), phone, hp, spouse, sex, type, typeName, EXTEND(hta, YEAR TO FRACTION), EXTEND(lastHta, YEAR TO FRACTION), bbtb, EXTEND(partus, YEAR TO FRACTION), deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, EXTEND(expDate, YEAR TO FRACTION), photoName, isDead, tlc, bu, EXTEND(lastUpdated, YEAR TO FRACTION), nip, instNo, kelompokCode, kelompok, penanggung, EXTEND(registerDate, YEAR TO FRACTION), cardNo, statusBL from " . $this->Ini->nm_tabela ; 
          } 
          else 
          { 
              $nmgp_select = "SELECT id, custCode, name, salut, address, city, postCode, birthDate, phone, hp, spouse, sex, type, typeName, hta, lastHta, bbtb, partus, deleted, hamil, email, blood, location, mother, father, job, education, religion, birthplace, kelurahan, kecamatan, rt, rw, member, idNo, jenis, expDate, photoName, isDead, tlc, bu, lastUpdated, nip, instNo, kelompokCode, kelompok, penanggung, registerDate, cardNo, statusBL from " . $this->Ini->nm_tabela ; 
          } 
          $aWhere = array();
          $aWhere[] = $sc_where_filter;
          if ($this->nmgp_opcao == "igual" || (($_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_adm_clientes']['run_iframe'] == "R") && ($this->sc_evento == "insert" || $this->sc_evento == "update")) )
          { 
              if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              else  
              {
                  $aWhere[] = "id = $this->id"; 
              }  
              if (!empty($sc_where_filter))  
              {
                  $teste_select = $nmgp_select . $this->returnWhere($aWhere);
                  $_SESSION['scriptcase']['sc_sql_ult_comando'] = $teste_select; 
                  $rs = $this->Db->Execute($teste_select); 
                  if ($rs->EOF)
                  {
                     $aWhere = array($sc_where_filter);
                  }  
                  $rs->Close(); 
              }  
          } 
          $nmgp_select .= $this->returnWhere($aWhere) . ' ';
          $sc_order_by = "";
          $sc_order_by = "id";
          $sc_order_by = str_replace("order by ", "", $sc_order_by);
          $sc_order_by = str_replace("ORDER BY ", "", trim($sc_order_by));
          if (!empty($sc_order_by))
          {
              $nmgp_select .= " order by $sc_order_by "; 
          }
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "R")
          {
              if ($this->sc_evento == "insert" || $this->sc_evento == "update")
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['select'] = $nmgp_select;
                  $this->nm_gera_html();
              } 
              elseif (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['select']))
              { 
                  $nmgp_select = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['select'];
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['select'] = ""; 
              } 
          } 
          $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
          $rs = $this->Db->Execute($nmgp_select) ; 
          if ($rs === false && !$rs->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
          { 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_nfnd_extr'], $this->Db->ErrorMsg()); 
              exit ; 
          }  
          if ($rs->EOF) 
          { 
              $this->NM_ajax_info['navSummary']['reg_ini'] = 0; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = 0; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = 0; 
              if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter']))
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['update']  = $this->nmgp_botoes['update']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['delete']  = $this->nmgp_botoes['delete']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['insert']  = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_1'] = $this->nmgp_botoes['sc_btn_1'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_2'] = $this->nmgp_botoes['sc_btn_2'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['sc_btn_3'] = $this->nmgp_botoes['sc_btn_3'] = "off";
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['empty_filter'] = true;
                  return; 
              }
              if ($this->nmgp_botoes['insert'] != "on")
              {
                  $this->nmgp_form_empty        = true;
                  $this->NM_ajax_info['buttonDisplay']['first']   = $this->nmgp_botoes['first']   = "off";
                  $this->NM_ajax_info['buttonDisplay']['back']    = $this->nmgp_botoes['back']    = "off";
                  $this->NM_ajax_info['buttonDisplay']['forward'] = $this->nmgp_botoes['forward'] = "off";
                  $this->NM_ajax_info['buttonDisplay']['last']    = $this->nmgp_botoes['last']    = "off";
              }
              $this->nmgp_opcao = "novo"; 
              $this->nm_flag_saida_novo = "S"; 
              $rs->Close(); 
              $this->NM_ajax_info['buttonDisplay']['sc_btn_0'] = $this->nmgp_botoes['sc_btn_0'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_1'] = $this->nmgp_botoes['sc_btn_1'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_2'] = $this->nmgp_botoes['sc_btn_2'] = "off";
              $this->NM_ajax_info['buttonDisplay']['sc_btn_3'] = $this->nmgp_botoes['sc_btn_3'] = "off";
              if ($this->aba_iframe)
              {
                  $this->NM_ajax_info['buttonDisplay']['exit'] = $this->nmgp_botoes['exit'] = 'off';
              }
          } 
          else 
          { 
              $this->NM_ajax_info['navSummary']['reg_ini'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_qtd'] = 1; 
              $this->NM_ajax_info['navSummary']['reg_tot'] = 1; 
          } 
          if ($rs === false && $GLOBALS["NM_ERRO_IBASE"] == 1) 
          { 
              $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->Erro->mensagem (__FILE__, __LINE__, "critica", $this->Ini->Nm_lang['lang_errm_nfnd_extr']); 
              $this->nmgp_opcao = "novo"; 
          }  
          if ($this->nmgp_opcao != "novo") 
          { 
              $this->id = $rs->fields[0] ; 
              $this->nmgp_dados_select['id'] = $this->id;
              $this->custcode = $rs->fields[1] ; 
              $this->nmgp_dados_select['custcode'] = $this->custcode;
              $this->name = $rs->fields[2] ; 
              $this->nmgp_dados_select['name'] = $this->name;
              $this->salut = $rs->fields[3] ; 
              $this->nmgp_dados_select['salut'] = $this->salut;
              $this->address = $rs->fields[4] ; 
              $this->nmgp_dados_select['address'] = $this->address;
              $this->city = $rs->fields[5] ; 
              $this->nmgp_dados_select['city'] = $this->city;
              $this->postcode = $rs->fields[6] ; 
              $this->nmgp_dados_select['postcode'] = $this->postcode;
              $this->birthdate = $rs->fields[7] ; 
              if (substr($this->birthdate, 10, 1) == "-") 
              { 
                 $this->birthdate = substr($this->birthdate, 0, 10) . " " . substr($this->birthdate, 11);
              } 
              if (substr($this->birthdate, 13, 1) == ".") 
              { 
                 $this->birthdate = substr($this->birthdate, 0, 13) . ":" . substr($this->birthdate, 14, 2) . ":" . substr($this->birthdate, 17);
              } 
              $this->nmgp_dados_select['birthdate'] = $this->birthdate;
              $this->phone = $rs->fields[8] ; 
              $this->nmgp_dados_select['phone'] = $this->phone;
              $this->hp = $rs->fields[9] ; 
              $this->nmgp_dados_select['hp'] = $this->hp;
              $this->spouse = $rs->fields[10] ; 
              $this->nmgp_dados_select['spouse'] = $this->spouse;
              $this->sex = $rs->fields[11] ; 
              $this->nmgp_dados_select['sex'] = $this->sex;
              $this->type = $rs->fields[12] ; 
              $this->nmgp_dados_select['type'] = $this->type;
              $this->typename = $rs->fields[13] ; 
              $this->nmgp_dados_select['typename'] = $this->typename;
              $this->hta = $rs->fields[14] ; 
              if (substr($this->hta, 10, 1) == "-") 
              { 
                 $this->hta = substr($this->hta, 0, 10) . " " . substr($this->hta, 11);
              } 
              if (substr($this->hta, 13, 1) == ".") 
              { 
                 $this->hta = substr($this->hta, 0, 13) . ":" . substr($this->hta, 14, 2) . ":" . substr($this->hta, 17);
              } 
              $this->nmgp_dados_select['hta'] = $this->hta;
              $this->lasthta = $rs->fields[15] ; 
              if (substr($this->lasthta, 10, 1) == "-") 
              { 
                 $this->lasthta = substr($this->lasthta, 0, 10) . " " . substr($this->lasthta, 11);
              } 
              if (substr($this->lasthta, 13, 1) == ".") 
              { 
                 $this->lasthta = substr($this->lasthta, 0, 13) . ":" . substr($this->lasthta, 14, 2) . ":" . substr($this->lasthta, 17);
              } 
              $this->nmgp_dados_select['lasthta'] = $this->lasthta;
              $this->bbtb = $rs->fields[16] ; 
              $this->nmgp_dados_select['bbtb'] = $this->bbtb;
              $this->partus = $rs->fields[17] ; 
              if (substr($this->partus, 10, 1) == "-") 
              { 
                 $this->partus = substr($this->partus, 0, 10) . " " . substr($this->partus, 11);
              } 
              if (substr($this->partus, 13, 1) == ".") 
              { 
                 $this->partus = substr($this->partus, 0, 13) . ":" . substr($this->partus, 14, 2) . ":" . substr($this->partus, 17);
              } 
              $this->nmgp_dados_select['partus'] = $this->partus;
              $this->deleted = $rs->fields[18] ; 
              $this->nmgp_dados_select['deleted'] = $this->deleted;
              $this->hamil = $rs->fields[19] ; 
              $this->nmgp_dados_select['hamil'] = $this->hamil;
              $this->email = $rs->fields[20] ; 
              $this->nmgp_dados_select['email'] = $this->email;
              $this->blood = $rs->fields[21] ; 
              $this->nmgp_dados_select['blood'] = $this->blood;
              $this->location = $rs->fields[22] ; 
              $this->nmgp_dados_select['location'] = $this->location;
              $this->mother = $rs->fields[23] ; 
              $this->nmgp_dados_select['mother'] = $this->mother;
              $this->father = $rs->fields[24] ; 
              $this->nmgp_dados_select['father'] = $this->father;
              $this->job = $rs->fields[25] ; 
              $this->nmgp_dados_select['job'] = $this->job;
              $this->education = $rs->fields[26] ; 
              $this->nmgp_dados_select['education'] = $this->education;
              $this->religion = $rs->fields[27] ; 
              $this->nmgp_dados_select['religion'] = $this->religion;
              $this->birthplace = $rs->fields[28] ; 
              $this->nmgp_dados_select['birthplace'] = $this->birthplace;
              $this->kelurahan = $rs->fields[29] ; 
              $this->nmgp_dados_select['kelurahan'] = $this->kelurahan;
              $this->kecamatan = $rs->fields[30] ; 
              $this->nmgp_dados_select['kecamatan'] = $this->kecamatan;
              $this->rt = $rs->fields[31] ; 
              $this->nmgp_dados_select['rt'] = $this->rt;
              $this->rw = $rs->fields[32] ; 
              $this->nmgp_dados_select['rw'] = $this->rw;
              $this->member = $rs->fields[33] ; 
              $this->nmgp_dados_select['member'] = $this->member;
              $this->idno = $rs->fields[34] ; 
              $this->nmgp_dados_select['idno'] = $this->idno;
              $this->jenis = $rs->fields[35] ; 
              $this->nmgp_dados_select['jenis'] = $this->jenis;
              $this->expdate = $rs->fields[36] ; 
              if (substr($this->expdate, 10, 1) == "-") 
              { 
                 $this->expdate = substr($this->expdate, 0, 10) . " " . substr($this->expdate, 11);
              } 
              if (substr($this->expdate, 13, 1) == ".") 
              { 
                 $this->expdate = substr($this->expdate, 0, 13) . ":" . substr($this->expdate, 14, 2) . ":" . substr($this->expdate, 17);
              } 
              $this->nmgp_dados_select['expdate'] = $this->expdate;
              $this->photoname = $rs->fields[37] ; 
              $this->nmgp_dados_select['photoname'] = $this->photoname;
              $this->isdead = $rs->fields[38] ; 
              $this->nmgp_dados_select['isdead'] = $this->isdead;
              $this->tlc = $rs->fields[39] ; 
              $this->nmgp_dados_select['tlc'] = $this->tlc;
              $this->bu = $rs->fields[40] ; 
              $this->nmgp_dados_select['bu'] = $this->bu;
              $this->lastupdated = $rs->fields[41] ; 
              if (substr($this->lastupdated, 10, 1) == "-") 
              { 
                 $this->lastupdated = substr($this->lastupdated, 0, 10) . " " . substr($this->lastupdated, 11);
              } 
              if (substr($this->lastupdated, 13, 1) == ".") 
              { 
                 $this->lastupdated = substr($this->lastupdated, 0, 13) . ":" . substr($this->lastupdated, 14, 2) . ":" . substr($this->lastupdated, 17);
              } 
              $this->nmgp_dados_select['lastupdated'] = $this->lastupdated;
              $this->nip = $rs->fields[42] ; 
              $this->nmgp_dados_select['nip'] = $this->nip;
              $this->instno = $rs->fields[43] ; 
              $this->nmgp_dados_select['instno'] = $this->instno;
              $this->kelompokcode = $rs->fields[44] ; 
              $this->nmgp_dados_select['kelompokcode'] = $this->kelompokcode;
              $this->kelompok = $rs->fields[45] ; 
              $this->nmgp_dados_select['kelompok'] = $this->kelompok;
              $this->penanggung = $rs->fields[46] ; 
              $this->nmgp_dados_select['penanggung'] = $this->penanggung;
              $this->registerdate = $rs->fields[47] ; 
              if (substr($this->registerdate, 10, 1) == "-") 
              { 
                 $this->registerdate = substr($this->registerdate, 0, 10) . " " . substr($this->registerdate, 11);
              } 
              if (substr($this->registerdate, 13, 1) == ".") 
              { 
                 $this->registerdate = substr($this->registerdate, 0, 13) . ":" . substr($this->registerdate, 14, 2) . ":" . substr($this->registerdate, 17);
              } 
              $this->nmgp_dados_select['registerdate'] = $this->registerdate;
              $this->cardno = $rs->fields[48] ; 
              $this->nmgp_dados_select['cardno'] = $this->cardno;
              $this->statusbl = $rs->fields[49] ; 
              $this->nmgp_dados_select['statusbl'] = $this->statusbl;
          $GLOBALS["NM_ERRO_IBASE"] = 0; 
              $this->id = (string)$this->id; 
              $this->deleted = (string)$this->deleted; 
              $this->hamil = (string)$this->hamil; 
              $this->isdead = (string)$this->isdead; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['parms'] = "id?#?$this->id?@?";
          } 
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_select'] = $this->nmgp_dados_select;
          if (!$this->NM_ajax_flag || 'backup_line' != $this->NM_ajax_opcao)
          {
              $this->controle_navegacao();
          }
      } 
      if ($this->nmgp_opcao == "novo" || $this->nmgp_opcao == "refresh_insert") 
      { 
          $this->sc_evento_old = $this->sc_evento;
          $this->sc_evento = "novo";
          if ('refresh_insert' == $this->nmgp_opcao)
          {
              $this->nmgp_opcao = 'novo';
          }
          else
          {
              $this->nm_formatar_campos();
              $this->id = "";  
              $this->nmgp_dados_form["id"] = $this->id;
              $this->custcode = "";  
              $this->nmgp_dados_form["custcode"] = $this->custcode;
              $this->name = "";  
              $this->nmgp_dados_form["name"] = $this->name;
              $this->salut = "";  
              $this->nmgp_dados_form["salut"] = $this->salut;
              $this->address = "";  
              $this->nmgp_dados_form["address"] = $this->address;
              $this->city = "";  
              $this->nmgp_dados_form["city"] = $this->city;
              $this->postcode = "";  
              $this->nmgp_dados_form["postcode"] = $this->postcode;
              $this->birthdate = "";  
              $this->birthdate_hora = "" ;  
              $this->nmgp_dados_form["birthdate"] = $this->birthdate;
              $this->phone = "";  
              $this->nmgp_dados_form["phone"] = $this->phone;
              $this->hp = "";  
              $this->nmgp_dados_form["hp"] = $this->hp;
              $this->spouse = "";  
              $this->nmgp_dados_form["spouse"] = $this->spouse;
              $this->sex = "";  
              $this->nmgp_dados_form["sex"] = $this->sex;
              $this->type = "";  
              $this->nmgp_dados_form["type"] = $this->type;
              $this->typename = "";  
              $this->nmgp_dados_form["typename"] = $this->typename;
              $this->hta = "";  
              $this->hta_hora = "" ;  
              $this->nmgp_dados_form["hta"] = $this->hta;
              $this->lasthta = "";  
              $this->lasthta_hora = "" ;  
              $this->nmgp_dados_form["lasthta"] = $this->lasthta;
              $this->bbtb = "";  
              $this->nmgp_dados_form["bbtb"] = $this->bbtb;
              $this->partus = "";  
              $this->partus_hora = "" ;  
              $this->nmgp_dados_form["partus"] = $this->partus;
              $this->deleted = "";  
              $this->nmgp_dados_form["deleted"] = $this->deleted;
              $this->hamil = "";  
              $this->nmgp_dados_form["hamil"] = $this->hamil;
              $this->email = "";  
              $this->nmgp_dados_form["email"] = $this->email;
              $this->blood = "";  
              $this->nmgp_dados_form["blood"] = $this->blood;
              $this->location = "";  
              $this->nmgp_dados_form["location"] = $this->location;
              $this->mother = "";  
              $this->nmgp_dados_form["mother"] = $this->mother;
              $this->father = "";  
              $this->nmgp_dados_form["father"] = $this->father;
              $this->job = "";  
              $this->nmgp_dados_form["job"] = $this->job;
              $this->education = "";  
              $this->nmgp_dados_form["education"] = $this->education;
              $this->religion = "";  
              $this->nmgp_dados_form["religion"] = $this->religion;
              $this->birthplace = "";  
              $this->nmgp_dados_form["birthplace"] = $this->birthplace;
              $this->kelurahan = "";  
              $this->nmgp_dados_form["kelurahan"] = $this->kelurahan;
              $this->kecamatan = "";  
              $this->nmgp_dados_form["kecamatan"] = $this->kecamatan;
              $this->rt = "";  
              $this->nmgp_dados_form["rt"] = $this->rt;
              $this->rw = "";  
              $this->nmgp_dados_form["rw"] = $this->rw;
              $this->member = "";  
              $this->nmgp_dados_form["member"] = $this->member;
              $this->idno = "";  
              $this->nmgp_dados_form["idno"] = $this->idno;
              $this->jenis = "";  
              $this->nmgp_dados_form["jenis"] = $this->jenis;
              $this->expdate = "";  
              $this->expdate_hora = "" ;  
              $this->nmgp_dados_form["expdate"] = $this->expdate;
              $this->photoname = "";  
              $this->nmgp_dados_form["photoname"] = $this->photoname;
              $this->isdead = "";  
              $this->nmgp_dados_form["isdead"] = $this->isdead;
              $this->tlc = "";  
              $this->nmgp_dados_form["tlc"] = $this->tlc;
              $this->bu = "";  
              $this->nmgp_dados_form["bu"] = $this->bu;
              $this->lastupdated = "";  
              $this->lastupdated_hora = "" ;  
              $this->nmgp_dados_form["lastupdated"] = $this->lastupdated;
              $this->nip = "";  
              $this->nmgp_dados_form["nip"] = $this->nip;
              $this->instno = "";  
              $this->nmgp_dados_form["instno"] = $this->instno;
              $this->kelompokcode = "";  
              $this->nmgp_dados_form["kelompokcode"] = $this->kelompokcode;
              $this->kelompok = "";  
              $this->nmgp_dados_form["kelompok"] = $this->kelompok;
              $this->penanggung = "";  
              $this->nmgp_dados_form["penanggung"] = $this->penanggung;
              $this->registerdate = "";  
              $this->registerdate_hora = "" ;  
              $this->nmgp_dados_form["registerdate"] = $this->registerdate;
              $this->cardno = "";  
              $this->nmgp_dados_form["cardno"] = $this->cardno;
              $this->statusbl = "";  
              $this->nmgp_dados_form["statusbl"] = $this->statusbl;
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dados_form'] = $this->nmgp_dados_form;
              $this->formatado = false;
          }
          if (($this->Embutida_form || $this->Embutida_multi) && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['foreign_key']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['foreign_key']))
          {
              foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['foreign_key'] as $sFKName => $sFKValue)
              {
                   if (isset($this->sc_conv_var[$sFKName]))
                   {
                       $sFKName = $this->sc_conv_var[$sFKName];
                   }
                  eval("\$this->" . $sFKName . " = \"" . $sFKValue . "\";");
              }
          }
      }  
//
//
//-- 
      if ($this->nmgp_opcao != "novo") 
      {
      }
      if (!isset($this->nmgp_refresh_fields)) 
      { 
          $this->nm_proc_onload();
      }
  }
        function initializeRecordState() {
                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state'] = array();
        }

        function storeRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state'])) {
                        $this->initializeRecordState();
                }
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state'][$sc_seq_vert])) {
                        $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state'][$sc_seq_vert] = array();
                }

                $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state'][$sc_seq_vert]['buttons'] = array(
                        'delete' => $this->nmgp_botoes['delete'],
                        'update' => $this->nmgp_botoes['update']
                );
        }

        function loadRecordState($sc_seq_vert = 0) {
                if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state']) || !isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state'][$sc_seq_vert])) {
                        return;
                }

                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state'][$sc_seq_vert]['buttons']['delete'])) {
                        $this->nmgp_botoes['delete'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state'][$sc_seq_vert]['buttons']['delete'];
                }
                if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state'][$sc_seq_vert]['buttons']['update'])) {
                        $this->nmgp_botoes['update'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['record_state'][$sc_seq_vert]['buttons']['update'];
                }
        }

//
function different_address_onChange()
{
$_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'on';
  
$original_id = $this->id;



if ($different_address  == 'N')     
{
	$address_domisili  = '';
	$city_domisili  = '';
	$kecamatan_domisili  = '';
	$kelurahan_domisili  = '';
	$rt_domisili  = '';
	$rw_domisili  = '';
	$this->nmgp_cmp_hidden["address_domisili"] = "off"; $this->NM_ajax_info['fieldDisplay']['address_domisili'] = 'off';
	$this->nmgp_cmp_hidden["city_domisili"] = "off"; $this->NM_ajax_info['fieldDisplay']['city_domisili'] = 'off';
	$this->nmgp_cmp_hidden["kecamatan_domisili"] = "off"; $this->NM_ajax_info['fieldDisplay']['kecamatan_domisili'] = 'off';
	$this->nmgp_cmp_hidden["kelurahan_domisili"] = "off"; $this->NM_ajax_info['fieldDisplay']['kelurahan_domisili'] = 'off';
	$this->nmgp_cmp_hidden["rt_domisili"] = "off"; $this->NM_ajax_info['fieldDisplay']['rt_domisili'] = 'off';
	$this->nmgp_cmp_hidden["rw_domisili"] = "off"; $this->NM_ajax_info['fieldDisplay']['rw_domisili'] = 'off';
}
else      
{
	$this->nmgp_cmp_hidden["address_domisili"] = "on"; $this->NM_ajax_info['fieldDisplay']['address_domisili'] = 'on';
	$this->nmgp_cmp_hidden["city_domisili"] = "on"; $this->NM_ajax_info['fieldDisplay']['city_domisili'] = 'on';
	$this->nmgp_cmp_hidden["kecamatan_domisili"] = "on"; $this->NM_ajax_info['fieldDisplay']['kecamatan_domisili'] = 'on';
	$this->nmgp_cmp_hidden["kelurahan_domisili"] = "on"; $this->NM_ajax_info['fieldDisplay']['kelurahan_domisili'] = 'on';
	$this->nmgp_cmp_hidden["rt_domisili"] = "on"; $this->NM_ajax_info['fieldDisplay']['rt_domisili'] = 'on';
	$this->nmgp_cmp_hidden["rw_domisili"] = "on"; $this->NM_ajax_info['fieldDisplay']['rw_domisili'] = 'on';
}


$modificado_id = $this->id;
$this->nm_formatar_campos();
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
$this->NM_ajax_info['event_field'] = 'different';
form_tbcustomer_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'off';
}
function type_onChange()
{
$_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'on';
  
$original_id = $this->id;

if ($this->type  == 'P'){
	$this->nmgp_cmp_hidden["typename"] = "off"; $this->NM_ajax_info['fieldDisplay']['typename'] = 'off';
}elseif ($this->type  == 'B'){
	$this->nmgp_cmp_hidden["typename"] = "on"; $this->NM_ajax_info['fieldDisplay']['typename'] = 'on';
	$this->typename  = 'INS170101';
}else{
	$this->nmgp_cmp_hidden["typename"] = "on"; $this->NM_ajax_info['fieldDisplay']['typename'] = 'on';
}

$modificado_id = $this->id;
$this->nm_formatar_campos();
if ($original_id !== $modificado_id || isset($this->nmgp_cmp_readonly['id']) || (isset($bFlagRead_id) && $bFlagRead_id))
{
    $this->ajax_return_values_id(true);
}
$this->NM_ajax_info['event_field'] = 'type';
form_tbcustomer_pack_ajax_response();
exit;
$_SESSION['scriptcase']['form_tbcustomer']['contr_erro'] = 'off';
}
//
 function nm_gera_html()
 {
    global
           $nm_url_saida, $nmgp_url_saida, $nm_saida_global, $nm_apl_dependente, $glo_subst, $sc_check_excl, $sc_check_incl, $nmgp_num_form, $NM_run_iframe;
     if ($this->Embutida_proc)
     {
         return;
     }
     if ($this->nmgp_form_show == 'off')
     {
         exit;
     }
      if (isset($NM_run_iframe) && $NM_run_iframe == 1)
      {
          $this->nmgp_botoes['exit'] = "off";
      }
     $HTTP_REFERER = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : ""; 
     $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
     $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['botoes'] = $this->nmgp_botoes;
     if ($this->nmgp_opcao != "recarga" && $this->nmgp_opcao != "muda_form")
     {
         $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opc_ant'] = $this->nmgp_opcao;
     }
     else
     {
         $this->nmgp_opcao = $this->nmgp_opc_ant;
     }
     if (!empty($this->Campos_Mens_erro)) 
     {
         $this->Erro->mensagem(__FILE__, __LINE__, "critica", $this->Campos_Mens_erro); 
         $this->Campos_Mens_erro = "";
     }
     if (($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "R") && $this->nm_flag_iframe && empty($this->nm_todas_criticas))
     {
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe_ajax']))
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['retorno_edit'] = array("edit", "");
          }
          else
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['retorno_edit'] .= "&nmgp_opcao=edit";
          }
          if ($this->sc_evento == "insert" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "F")
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe_ajax']))
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['retorno_edit'] = array("edit", "fim");
              }
              else
              {
                  $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['retorno_edit'] .= "&rec=fim";
              }
          }
          $this->NM_close_db(); 
          $sJsParent = '';
          if ($this->NM_ajax_flag && isset($this->NM_ajax_info['param']['buffer_output']) && $this->NM_ajax_info['param']['buffer_output'])
          {
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe_ajax']))
              {
                  $this->NM_ajax_info['ajaxJavascript'][] = array("parent.ajax_navigate", $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['retorno_edit']);
              }
              else
              {
                  $sJsParent .= 'parent';
                  $this->NM_ajax_info['redir']['metodo'] = 'location';
                  $this->NM_ajax_info['redir']['action'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['retorno_edit'];
                  $this->NM_ajax_info['redir']['target'] = $sJsParent;
              }
              form_tbcustomer_pack_ajax_response();
              exit;
          }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

         <html><body>
         <script type="text/javascript">
<?php
    
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe_ajax']))
    {
        $opc = ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['run_iframe'] == "F" && $this->sc_evento == "insert") ? "fim" : "";
        echo "parent.ajax_navigate('edit', '" .$opc . "');";
    }
    else
    {
        echo $sJsParent . "parent.location = '" . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['retorno_edit'] . "';";
    }
?>
         </script>
         </body></html>
<?php
         exit;
     }
        $this->initFormPages();
    include_once("form_tbcustomer_form0.php");
        $this->hideFormPages();
 }

        function initFormPages() {
        } // initFormPages

        function hideFormPages() {
        } // hideFormPages

    function form_encode_input($string)
    {
        if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['table_refresh']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['table_refresh'])
        {
            return NM_encode_input(NM_encode_input($string));
        }
        else
        {
            return NM_encode_input($string);
        }
    } // form_encode_input

   function jqueryCalendarDtFormat($sFormat, $sSep)
   {
       $sFormat = chunk_split(str_replace('yyyy', 'yy', $sFormat), 2, $sSep);

       if ($sSep == substr($sFormat, -1))
       {
           $sFormat = substr($sFormat, 0, -1);
       }

       return $sFormat;
   } // jqueryCalendarDtFormat

   function jqueryCalendarTimeStart($sFormat)
   {
       $aDateParts = explode(';', $sFormat);

       if (2 == sizeof($aDateParts))
       {
           $sTime = $aDateParts[1];
       }
       else
       {
           $sTime = 'hh:mm:ss';
       }

       return str_replace(array('h', 'm', 'i', 's'), array('0', '0', '0', '0'), $sTime);
   } // jqueryCalendarTimeStart

   function jqueryCalendarWeekInit($sDay)
   {
       switch ($sDay) {
           case 'MO': return 1; break;
           case 'TU': return 2; break;
           case 'WE': return 3; break;
           case 'TH': return 4; break;
           case 'FR': return 5; break;
           case 'SA': return 6; break;
           default  : return 7; break;
       }
   } // jqueryCalendarWeekInit

   function jqueryIconFile($sModule)
   {
       $sImage = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && 'image' == $this->arr_buttons['bcalendario']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalendario']['display'])
           {
               $sImage = $this->arr_buttons['bcalendario']['image'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && 'image' == $this->arr_buttons['bcalculadora']['type'] && 'only_fontawesomeicon' != $this->arr_buttons['bcalculadora']['display'])
           {
               $sImage = $this->arr_buttons['bcalculadora']['image'];
           }
       }

       return '' == $sImage ? '' : $this->Ini->path_icones . '/' . $sImage;
   } // jqueryIconFile

   function jqueryFAFile($sModule)
   {
       $sFA = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
           {
               $sFA = $this->arr_buttons['bcalendario']['fontawesomeicon'];
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']) && 'only_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
           {
               $sFA = $this->arr_buttons['bcalculadora']['fontawesomeicon'];
           }
       }

       return '' == $sFA ? '' : "<span class='scButton_fontawesome " . $sFA . "'></span>";
   } // jqueryFAFile

   function jqueryButtonText($sModule)
   {
       $sClass = '';
       $sText  = '';
       if ('calendar' == $sModule)
       {
           if (isset($this->arr_buttons['bcalendario']) && isset($this->arr_buttons['bcalendario']['type']) && ('image' == $this->arr_buttons['bcalendario']['type'] || 'button' == $this->arr_buttons['bcalendario']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalendario']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalendario']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalendario']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalendario']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalendario']['fontawesomeicon'] . "'></i>";
                   }
               }
           }
       }
       elseif ('calculator' == $sModule)
       {
           if (isset($this->arr_buttons['bcalculadora']) && isset($this->arr_buttons['bcalculadora']['type']) && ('image' == $this->arr_buttons['bcalculadora']['type'] || 'button' == $this->arr_buttons['bcalculadora']['type']))
           {
               if ('only_text' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   $sText  = $this->arr_buttons['bcalculadora']['value'];
               }
               elseif ('text_fontawesomeicon' == $this->arr_buttons['bcalculadora']['display'])
               {
                   $sClass = 'scButton_' . $this->arr_buttons['bcalendario']['style'];
                   if ('text_right' == $this->arr_buttons['bcalendario']['display_position'])
                   {
                       $sText = "<i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> " . $this->arr_buttons['bcalculadora']['value'];
                   }
                   else
                   {
                       $sText = $this->arr_buttons['bcalculadora']['value'] . " <i class='icon_fa " . $this->arr_buttons['bcalculadora']['fontawesomeicon'] . "'></i> ";
                   }
               }
           }
       }

       return '' == $sText ? array('', '') : array($sText, $sClass);
   } // jqueryButtonText


    function scCsrfGetToken()
    {
        if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['csrf_token']))
        {
            $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['csrf_token'] = $this->scCsrfGenerateToken();
        }

        return $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['csrf_token'];
    }

    function scCsrfGenerateToken()
    {
        $aSources = array(
            'abcdefghijklmnopqrstuvwxyz',
            'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            '1234567890',
            '!@$*()-_[]{},.;:'
        );

        $sRandom = '';

        $aSourcesSizes = array();
        $iSourceSize   = sizeof($aSources) - 1;
        for ($i = 0; $i <= $iSourceSize; $i++)
        {
            $aSourcesSizes[$i] = strlen($aSources[$i]) - 1;
        }

        for ($i = 0; $i < 64; $i++)
        {
            $iSource = $this->scCsrfRandom(0, $iSourceSize);
            $sRandom .= substr($aSources[$iSource], $this->scCsrfRandom(0, $aSourcesSizes[$iSource]), 1);
        }

        return $sRandom;
    }

    function scCsrfRandom($iMin, $iMax)
    {
        return mt_rand($iMin, $iMax);
    }

        function addUrlParam($url, $param, $value) {
                $urlParts  = explode('?', $url);
                $urlParams = isset($urlParts[1]) ? explode('&', $urlParts[1]) : array();
                $objParams = array();
                foreach ($urlParams as $paramInfo) {
                        $paramParts = explode('=', $paramInfo);
                        $objParams[ $paramParts[0] ] = isset($paramParts[1]) ? $paramParts[1] : '';
                }
                $objParams[$param] = $value;
                $urlParams = array();
                foreach ($objParams as $paramName => $paramValue) {
                        $urlParams[] = $paramName . '=' . $paramValue;
                }
                return $urlParts[0] . '?' . implode('&', $urlParams);
        }
 function allowedCharsCharset($charlist)
 {
     if ($_SESSION['scriptcase']['charset'] != 'UTF-8')
     {
         $charlist = NM_conv_charset($charlist, $_SESSION['scriptcase']['charset'], 'UTF-8');
     }
     return str_replace("'", "\'", $charlist);
 }

 function new_date_format($type, $field)
 {
     $new_date_format_out = '';

     if ('DT' == $type)
     {
         $date_format  = $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = $this->field_config[$field]['date_display'];
         $time_format  = '';
         $time_sep     = '';
         $time_display = '';
     }
     elseif ('DH' == $type)
     {
         $date_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , 0, strpos($this->field_config[$field]['date_format'] , ';')) : $this->field_config[$field]['date_format'];
         $date_sep     = $this->field_config[$field]['date_sep'];
         $date_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], 0, strpos($this->field_config[$field]['date_display'], ';')) : $this->field_config[$field]['date_display'];
         $time_format  = false !== strpos($this->field_config[$field]['date_format'] , ';') ? substr($this->field_config[$field]['date_format'] , strpos($this->field_config[$field]['date_format'] , ';') + 1) : '';
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = false !== strpos($this->field_config[$field]['date_display'], ';') ? substr($this->field_config[$field]['date_display'], strpos($this->field_config[$field]['date_display'], ';') + 1) : '';
     }
     elseif ('HH' == $type)
     {
         $date_format  = '';
         $date_sep     = '';
         $date_display = '';
         $time_format  = $this->field_config[$field]['date_format'];
         $time_sep     = $this->field_config[$field]['time_sep'];
         $time_display = $this->field_config[$field]['date_display'];
     }

     if ('DT' == $type || 'DH' == $type)
     {
         $date_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_format); $i++)
         {
             $char = strtolower(substr($date_format, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $date_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $date_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $disp_array = array();
         $date_index = 0;
         $date_ult   = '';
         for ($i = 0; $i < strlen($date_display); $i++)
         {
             $char = strtolower(substr($date_display, $i, 1));
             if (in_array($char, array('d', 'm', 'y', 'a')))
             {
                 if ('a' == $char)
                 {
                     $char = 'y';
                 }
                 if ($char == $date_ult)
                 {
                     $disp_array[$date_index] .= $char;
                 }
                 else
                 {
                     if ('' != $date_ult)
                     {
                         $date_index++;
                     }
                     $disp_array[$date_index] = $char;
                 }
             }
             $date_ult = $char;
         }

         $date_final = array();
         foreach ($date_array as $date_part)
         {
             if (in_array($date_part, $disp_array))
             {
                 $date_final[] = $date_part;
             }
         }

         $date_format = implode($date_sep, $date_final);
     }
     if ('HH' == $type || 'DH' == $type)
     {
         $time_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_format); $i++)
         {
             $char = strtolower(substr($time_format, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $time_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $time_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $disp_array = array();
         $time_index = 0;
         $time_ult   = '';
         for ($i = 0; $i < strlen($time_display); $i++)
         {
             $char = strtolower(substr($time_display, $i, 1));
             if (in_array($char, array('h', 'i', 's')))
             {
                 if ($char == $time_ult)
                 {
                     $disp_array[$time_index] .= $char;
                 }
                 else
                 {
                     if ('' != $time_ult)
                     {
                         $time_index++;
                     }
                     $disp_array[$time_index] = $char;
                 }
             }
             $time_ult = $char;
         }

         $time_final = array();
         foreach ($time_array as $time_part)
         {
             if (in_array($time_part, $disp_array))
             {
                 $time_final[] = $time_part;
             }
         }

         $time_format = implode($time_sep, $time_final);
     }

     if ('DT' == $type)
     {
         $old_date_format = $date_format;
     }
     elseif ('DH' == $type)
     {
         $old_date_format = $date_format . ';' . $time_format;
     }
     elseif ('HH' == $type)
     {
         $old_date_format = $time_format;
     }

     for ($i = 0; $i < strlen($old_date_format); $i++)
     {
         $char = substr($old_date_format, $i, 1);
         if ('/' == $char)
         {
             $new_date_format_out .= $date_sep;
         }
         elseif (':' == $char)
         {
             $new_date_format_out .= $time_sep;
         }
         else
         {
             $new_date_format_out .= $char;
         }
     }

     $this->field_config[$field]['date_format'] = $new_date_format_out;
     if ('DH' == $type)
     {
         $new_date_format_out                                  = explode(';', $new_date_format_out);
         $this->field_config[$field]['date_format_js']        = $new_date_format_out[0];
         $this->field_config[$field . '_hora']['date_format'] = $new_date_format_out[1];
         $this->field_config[$field . '_hora']['time_sep']    = $this->field_config[$field]['time_sep'];
     }
 } // new_date_format

   function Form_lookup_salut()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "AN.?#?AN.?#?N?@?";
       $nmgp_def_dados .= "NN.?#?NN.?#?N?@?";
       $nmgp_def_dados .= "NY.?#?NY.?#?N?@?";
       $nmgp_def_dados .= "SDR.?#?SDR.?#?N?@?";
       $nmgp_def_dados .= "TN.?#?TN.?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_sex()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Laki-laki?#?L?#?S?@?";
       $nmgp_def_dados .= "Perempuan?#?P?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_city()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_registerdate = $this->registerdate;
   $old_value_hta = $this->hta;
   $old_value_hta_hora = $this->hta_hora;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_registerdate = $this->registerdate;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_hta_hora = $this->hta_hora;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT name, name FROM kota ORDER BY id";

   $this->birthdate = $old_value_birthdate;
   $this->lastupdated = $old_value_lastupdated;
   $this->registerdate = $old_value_registerdate;
   $this->hta = $old_value_hta;
   $this->hta_hora = $old_value_hta_hora;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_city'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_kecamatan()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_registerdate = $this->registerdate;
   $old_value_hta = $this->hta;
   $old_value_hta_hora = $this->hta_hora;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_registerdate = $this->registerdate;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_hta_hora = $this->hta_hora;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT    b.name, b.name FROM    kota a INNER JOIN kecamatan b ON b.regency_id = a.id where a.name = '$this->city'";

   $this->birthdate = $old_value_birthdate;
   $this->lastupdated = $old_value_lastupdated;
   $this->registerdate = $old_value_registerdate;
   $this->hta = $old_value_hta;
   $this->hta_hora = $old_value_hta_hora;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kecamatan'][] = $rs->fields[0];
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_kelurahan()
   {
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'] = array(); 
    }

   $old_value_birthdate = $this->birthdate;
   $old_value_lastupdated = $this->lastupdated;
   $old_value_registerdate = $this->registerdate;
   $old_value_hta = $this->hta;
   $old_value_hta_hora = $this->hta_hora;
   $old_value_id = $this->id;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_birthdate = $this->birthdate;
   $unformatted_value_lastupdated = $this->lastupdated;
   $unformatted_value_registerdate = $this->registerdate;
   $unformatted_value_hta = $this->hta;
   $unformatted_value_hta_hora = $this->hta_hora;
   $unformatted_value_id = $this->id;

   $nm_comando = "SELECT    b.name FROM    kecamatan a INNER JOIN kelurahan b ON b.district_id = a.id where a.name = '$this->kecamatan' order by b.id";

   $this->birthdate = $old_value_birthdate;
   $this->lastupdated = $old_value_lastupdated;
   $this->registerdate = $old_value_registerdate;
   $this->hta = $old_value_hta;
   $this->hta_hora = $old_value_hta_hora;
   $this->id = $old_value_id;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['Lookup_kelurahan'][] = $rs->fields[0];
              $nmgp_def_dados .= $rs->fields[0] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $rs->MoveNext() ; 
       } 
       $rs->Close() ; 
   } 
   elseif ($GLOBALS["NM_ERRO_IBASE"] != 1 && $nm_comando != "")  
   {  
       $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
       exit; 
   } 
   $GLOBALS["NM_ERRO_IBASE"] = 0; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   return $todo;

   }
   function Form_lookup_blood()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "A?#?A?#?N?@?";
       $nmgp_def_dados .= "B?#?B?#?N?@?";
       $nmgp_def_dados .= "AB?#?AB?#?N?@?";
       $nmgp_def_dados .= "O?#?O?#?N?@?";
       $nmgp_def_dados .= "Tidak Tahu?#?Tidak Tahu?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_religion()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "ISLAM?#?ISLAM?#?N?@?";
       $nmgp_def_dados .= "BUDHA?#?BUDHA?#?N?@?";
       $nmgp_def_dados .= "HINDU?#?HINDU?#?N?@?";
       $nmgp_def_dados .= "KATOLIK?#?KATOLIK?#?N?@?";
       $nmgp_def_dados .= "KRISTEN?#?KRISTEN?#?N?@?";
       $nmgp_def_dados .= "LAIN-LAIN?#?LAIN-LAIN?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_job()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "BURUH?#?BURUH?#?N?@?";
       $nmgp_def_dados .= "DIBAWAH UMUR?#?DIBAWAH UMUR?#?N?@?";
       $nmgp_def_dados .= "IBU RT?#?IBU RT?#?N?@?";
       $nmgp_def_dados .= "KARYAWAN SWASTA?#?KARYAWAN SWASTA?#?N?@?";
       $nmgp_def_dados .= "LAIN-LAIN?#?LAIN-LAIN?#?N?@?";
       $nmgp_def_dados .= "MAHASISWA/I?#?MAHASISWA/I?#?N?@?";
       $nmgp_def_dados .= "PEDAGANG?#?PEDAGANG?#?N?@?";
       $nmgp_def_dados .= "PELAJAR?#?PELAJAR?#?N?@?";
       $nmgp_def_dados .= "PETANI?#?PETANI?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_education()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "SMA?#?SMA?#?S?@?";
       $nmgp_def_dados .= "SMP?#?SMP?#?N?@?";
       $nmgp_def_dados .= "SD?#?SD?#?N?@?";
       $nmgp_def_dados .= "Belum/Tidak Tamat SD?#?Belum/Tidak Tamat SD?#?N?@?";
       $nmgp_def_dados .= "Diploma?#?Diploma?#?N?@?";
       $nmgp_def_dados .= "Sarjana?#?Sarjana?#?N?@?";
       $nmgp_def_dados .= "Pasca Sarjana?#?Pasca Sarjana?#?N?@?";
       $nmgp_def_dados .= "Tidak Sekolah?#?Tidak Sekolah?#?N?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function Form_lookup_isdead()
   {
       $nmgp_def_dados  = "";
       $nmgp_def_dados .= "Ya?#?1?#?N?@?";
       $nmgp_def_dados .= "Tidak?#?0?#?S?@?";
       $todo = explode("?@?", $nmgp_def_dados);
       return $todo;

   }
   function SC_fast_search($field, $arg_search, $data_search)
   {
      $this->NM_case_insensitive = false;
      if (empty($data_search)) 
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total']);
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['fast_search']);
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_detal'])) 
          {
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter'] = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_detal'];
          }
          if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['empty_filter'])
          {
              unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['empty_filter']);
              $this->NM_ajax_info['empty_filter'] = 'ok';
              form_tbcustomer_pack_ajax_response();
              exit;
          }
          return;
      }
      $comando = "";
      if ($_SESSION['scriptcase']['charset'] != "UTF-8" && NM_is_utf8($data_search))
      {
          $data_search = NM_conv_charset($data_search, $_SESSION['scriptcase']['charset'], "UTF-8");
      }
      $sv_data = $data_search;
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "custCode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "name", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_salut($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "salut", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "address", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_city($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "city", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "postCode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "phone", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "hp", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "spouse", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_sex($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "sex", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_type($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "type", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_typename($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "typeName", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bbtb", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "deleted", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "hamil", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "email", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_blood($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "blood", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "location", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "mother", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "father", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_job($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "job", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_education($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "education", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_religion($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "religion", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "birthplace", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_kelurahan($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "kelurahan", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_kecamatan($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "kecamatan", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "rt", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "rw", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "member", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "idNo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "jenis", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "photoName", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $data_lookup = $this->SC_lookup_isdead($arg_search, $data_search);
          if (is_array($data_lookup) && !empty($data_lookup)) 
          {
              $this->SC_monta_condicao($comando, "isDead", $arg_search, $data_lookup);
          }
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "tlc", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "bu", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "nip", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "instNo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "kelompokCode", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "kelompok", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "penanggung", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "cardNo", $arg_search, $data_search);
      }
      if ($field == "SC_all_Cmp") 
      {
          $this->SC_monta_condicao($comando, "statusBL", $arg_search, $data_search);
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_detal']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_detal']) && !empty($comando)) 
      {
          $comando = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_detal'] . " and (" .  $comando . ")";
      }
      if (empty($comando)) 
      {
          $comando = " 1 <> 1 "; 
      }
      if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter_form']) && '' != $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter_form'])
      {
          $sc_where = " where " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter_form'] . " and (" . $comando . ")";
      }
      else
      {
         $sc_where = " where " . $comando;
      }
      $nmgp_select = "SELECT count(*) AS countTest from " . $this->Ini->nm_tabela . $sc_where; 
      $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nmgp_select; 
      $rt = $this->Db->Execute($nmgp_select) ; 
      if ($rt === false && !$rt->EOF && $GLOBALS["NM_ERRO_IBASE"] != 1) 
      { 
          $this->Erro->mensagem (__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
          exit ; 
      }  
      $qt_geral_reg_form_tbcustomer = isset($rt->fields[0]) ? $rt->fields[0] - 1 : 0; 
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['total'] = $qt_geral_reg_form_tbcustomer;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['where_filter'] = $comando;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['fast_search'][0] = $field;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['fast_search'][1] = $arg_search;
      $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['fast_search'][2] = $sv_data;
      $rt->Close(); 
      if (isset($rt->fields[0]) && $rt->fields[0] > 0 &&  isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['empty_filter']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['empty_filter'])
      {
          unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['empty_filter']);
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbcustomer_pack_ajax_response();
          exit;
      }
      elseif (!isset($rt->fields[0]) || $rt->fields[0] == 0)
      {
          $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['empty_filter'] = true;
          $this->NM_ajax_info['empty_filter'] = 'ok';
          form_tbcustomer_pack_ajax_response();
          exit;
      }
   }
   function SC_monta_condicao(&$comando, $nome, $condicao, $campo, $tp_campo="")
   {
      $nm_aspas   = "'";
      $nm_aspas1  = "'";
      $nm_numeric = array();
      $Nm_datas   = array();
      $nm_esp_postgres = array();
      $campo_join = strtolower(str_replace(".", "_", $nome));
      $nm_ini_lower = "";
      $nm_fim_lower = "";
      $nm_numeric[] = "id";$nm_numeric[] = "deleted";$nm_numeric[] = "hamil";$nm_numeric[] = "isdead";
      if (in_array($campo_join, $nm_numeric))
      {
         if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['decimal_db'] == ".")
         {
             $nm_aspas  = "";
             $nm_aspas1 = "";
         }
         if (is_array($campo))
         {
             foreach ($campo as $Ind => $Cmp)
             {
                if (!is_numeric($Cmp))
                {
                    return;
                }
                if ($Cmp == "")
                {
                    $campo[$Ind] = 0;
                }
             }
         }
         else
         {
             if (!is_numeric($campo))
             {
                 return;
             }
             if ($campo == "")
             {
                $campo = 0;
             }
         }
      }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_esp_postgres) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
         {
             $nome      = "CAST ($nome AS TEXT)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
         if (in_array($campo_join, $nm_numeric) && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP"))
         {
             $nome      = "CAST ($nome AS VARCHAR)";
             $nm_aspas  = "'";
             $nm_aspas1 = "'";
         }
      $Nm_datas['birthdate'] = "datetime";$Nm_datas['hta'] = "datetime";$Nm_datas['lasthta'] = "datetime";$Nm_datas['partus'] = "datetime";$Nm_datas['expdate'] = "datetime";$Nm_datas['lastupdated'] = "datetime";$Nm_datas['registerdate'] = "datetime";
         if (isset($Nm_datas[$campo_join]))
         {
             for ($x = 0; $x < strlen($campo); $x++)
             {
                 $tst = substr($campo, $x, 1);
                 if (!is_numeric($tst) && ($tst != "-" && $tst != ":" && $tst != " "))
                 {
                     return;
                 }
             }
         }
          if (isset($Nm_datas[$campo_join]))
          {
          if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
          {
             $nm_aspas  = "#";
             $nm_aspas1 = "#";
          }
              if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['SC_sep_date']) && !empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['SC_sep_date']))
              {
                  $nm_aspas  = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['SC_sep_date'];
                  $nm_aspas1 = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['SC_sep_date1'];
              }
          }
      if (isset($Nm_datas[$campo_join]) && (strtoupper($condicao) == "II" || strtoupper($condicao) == "QP" || strtoupper($condicao) == "NP" || strtoupper($condicao) == "DF"))
      {
          if (strtoupper($condicao) == "DF")
          {
              $condicao = "NP";
          }
          if (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'YYYY-MM-DD')";
          }
          elseif ($Nm_datas[$campo_join] == "time" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
          {
              $nome = "to_char (" . $nome . ", 'hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(10)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
          {
              $nome = "convert(char(19)," . $nome . ",121)";
          }
          elseif (($Nm_datas[$campo_join] == "times" || $Nm_datas[$campo_join] == "datetime" || $Nm_datas[$campo_join] == "timestamp") && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_oracle))
          {
              $nome  = "TO_DATE(TO_CHAR(" . $nome . ", 'yyyy-mm-dd hh24:mi:ss'), 'yyyy-mm-dd hh24:mi:ss')";
          }
          elseif ($Nm_datas[$campo_join] == "datetime" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO FRACTION)";
          }
          elseif ($Nm_datas[$campo_join] == "date" && in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_informix))
          {
              $nome = "EXTEND(" . $nome . ", YEAR TO DAY)";
          }
      }
         $comando .= (!empty($comando) ? " or " : "");
         if (is_array($campo))
         {
             $prep = "";
             foreach ($campo as $Ind => $Cmp)
             {
                 $prep .= (!empty($prep)) ? "," : "";
                 $Cmp   = substr($this->Db->qstr($Cmp), 1, -1);
                 $prep .= $nm_ini_lower . $nm_aspas . $Cmp . $nm_aspas1 . $nm_fim_lower;
             }
             $prep .= (empty($prep)) ? $nm_aspas . $nm_aspas1 : "";
             $comando .= $nm_ini_lower . $nome . $nm_fim_lower . " in (" . $prep . ")";
             return;
         }
         $campo  = substr($this->Db->qstr($campo), 1, -1);
         $cond_tst = strtoupper($condicao);
         if ($cond_tst == "II" || $cond_tst == "QP" || $cond_tst == "NP")
         {
             if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres) && $this->NM_case_insensitive)
             {
                 $op_like      = " ilike ";
                 $nm_ini_lower = "";
                 $nm_fim_lower = "";
             }
             else
             {
                 $op_like = " like ";
             }
         }
         switch ($cond_tst)
         {
            case "EQ":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " = " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "II":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'" . $campo . "%'" . $nm_fim_lower;
            break;
            case "QP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "NP":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " not" . $op_like . $nm_ini_lower . "'%" . $campo . "%'" . $nm_fim_lower;
            break;
            case "DF":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <> " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " > " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "GE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " >= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LT":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " < " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
            case "LE":     // 
               $comando        .= $nm_ini_lower . $nome . $nm_fim_lower . " <= " . $nm_ini_lower . $nm_aspas . $campo . $nm_aspas1 . $nm_fim_lower;
            break;
         }
   }
   function SC_lookup_salut($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['AN.'] = "AN.";
       $data_look['NN.'] = "NN.";
       $data_look['NY.'] = "NY.";
       $data_look['SDR.'] = "SDR.";
       $data_look['TN.'] = "TN.";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_city($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT name, name FROM kota WHERE (name LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_sex($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['L'] = "Laki-laki";
       $data_look['P'] = "Perempuan";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_type($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['P'] = "Pribadi";
       $data_look['I'] = "Perusahaan / Asuransi";
       $data_look['B'] = "BPJS";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_typename($condicao, $campo)
   {
       $result = array();
       $campo_orig = $campo;
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $nm_comando = "SELECT name, instCode FROM tbinstansi WHERE (name LIKE '%$campo%')" ; 
       if ($condicao == "ii")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "LIKE '$campo%'", $nm_comando);
       }
       if ($condicao == "df" || $condicao == "np")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "NOT LIKE '%$campo%'", $nm_comando);
       }
       if ($condicao == "gt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "> '$campo'", $nm_comando);
       }
       if ($condicao == "ge")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", ">= '$campo'", $nm_comando);
       }
       if ($condicao == "lt")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "< '$campo'", $nm_comando);
       }
       if ($condicao == "le")
       {
           $nm_comando = str_replace("LIKE '%$campo%'", "<= '$campo'", $nm_comando);
       }
       $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando; 
       $_SESSION['scriptcase']['sc_sql_ult_conexao'] = ''; 
       if ($rx = $this->Db->Execute($nm_comando)) 
       { 
           $campo = $campo_orig;
           while (!$rx->EOF) 
           { 
               $chave = $rx->fields[1];
               $label = $rx->fields[0];
               if ($condicao == "eq" && $campo == $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
               {
                   $result[] = $chave;
               }
               if ($condicao == "qp" && strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "np" && !strstr($label, $campo))
               {
                   $result[] = $chave;
               }
               if ($condicao == "df" && $campo != $label)
               {
                   $result[] = $chave;
               }
               if ($condicao == "gt" && $label > $campo )
               {
                   $result[] = $chave;
               }
               if ($condicao == "ge" && $label >= $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "lt" && $label < $campo)
               {
                   $result[] = $chave;
               }
               if ($condicao == "le" && $label <= $campo)
               {
                   $result[] = $chave;
               }
               $rx->MoveNext() ;
           }  
           return $result;
       }  
       elseif ($GLOBALS["NM_ERRO_IBASE"] != 1)  
       { 
           $this->Erro->mensagem(__FILE__, __LINE__, "banco", $this->Ini->Nm_lang['lang_errm_dber'], $this->Db->ErrorMsg()); 
           exit; 
       } 
   }
   function SC_lookup_blood($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['A'] = "A";
       $data_look['B'] = "B";
       $data_look['AB'] = "AB";
       $data_look['O'] = "O";
       $data_look['Tidak Tahu'] = "Tidak Tahu";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_job($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['BURUH'] = "BURUH";
       $data_look['DIBAWAH UMUR'] = "DIBAWAH UMUR";
       $data_look['IBU RT'] = "IBU RT";
       $data_look['KARYAWAN SWASTA'] = "KARYAWAN SWASTA";
       $data_look['LAIN-LAIN'] = "LAIN-LAIN";
       $data_look['MAHASISWA/I'] = "MAHASISWA/I";
       $data_look['PEDAGANG'] = "PEDAGANG";
       $data_look['PELAJAR'] = "PELAJAR";
       $data_look['PETANI'] = "PETANI";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_education($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['SMA'] = "SMA";
       $data_look['SMP'] = "SMP";
       $data_look['SD'] = "SD";
       $data_look['Belum/Tidak Tamat SD'] = "Belum/Tidak Tamat SD";
       $data_look['Diploma'] = "Diploma";
       $data_look['Sarjana'] = "Sarjana";
       $data_look['Pasca Sarjana'] = "Pasca Sarjana";
       $data_look['Tidak Sekolah'] = "Tidak Sekolah";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_religion($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['ISLAM'] = "ISLAM";
       $data_look['BUDHA'] = "BUDHA";
       $data_look['HINDU'] = "HINDU";
       $data_look['KATOLIK'] = "KATOLIK";
       $data_look['KRISTEN'] = "KRISTEN";
       $data_look['LAIN-LAIN'] = "LAIN-LAIN";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
   function SC_lookup_kelurahan($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_kecamatan($condicao, $campo)
   {
       return $campo;
   }
   function SC_lookup_isdead($condicao, $campo)
   {
       $data_look = array();
       $campo  = substr($this->Db->qstr($campo), 1, -1);
       $data_look['1'] = "Ya";
       $data_look['0'] = "Tidak";
       $result = array();
       foreach ($data_look as $chave => $label) 
       {
           if ($condicao == "eq" && $campo == $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "ii" && $campo == substr($label, 0, strlen($campo)))
           {
               $result[] = $chave;
           }
           if ($condicao == "qp" && strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "np" && !strstr($label, $campo))
           {
               $result[] = $chave;
           }
           if ($condicao == "df" && $campo != $label)
           {
               $result[] = $chave;
           }
           if ($condicao == "gt" && $label > $campo )
           {
               $result[] = $chave;
           }
           if ($condicao == "ge" && $label >= $campo)
            {
               $result[] = $chave;
           }
           if ($condicao == "lt" && $label < $campo)
           {
               $result[] = $chave;
           }
           if ($condicao == "le" && $label <= $campo)
           {
               $result[] = $chave;
           }
          
       }
       return $result;
   }
function nmgp_redireciona($tipo=0)
{
   global $nm_apl_dependente;
   if (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $_SESSION['scriptcase']['sc_tp_saida'] != "D" && $nm_apl_dependente != 1) 
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['nm_sc_retorno'];
   }
   else
   {
       $nmgp_saida_form = $_SESSION['scriptcase']['sc_url_saida'][$this->Ini->sc_page];
   }
   if ($tipo == 2)
   {
       $nmgp_saida_form = "form_tbcustomer_fim.php";
   }
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['redir']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['redir'] == 'redir')
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']);
   }
   unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opc_ant']);
   if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['nm_run_menu']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['nm_run_menu'] == 1)
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['nm_run_menu'] = 2;
       $nmgp_saida_form = "form_tbcustomer_fim.php";
   }
   $diretorio = explode("/", $nmgp_saida_form);
   $cont = count($diretorio);
   $apl = $diretorio[$cont - 1];
   $apl = str_replace(".php", "", $apl);
   $pos = strpos($apl, "?");
   if ($pos !== false)
   {
       $apl = substr($apl, 0, $pos);
   }
   if ($tipo != 1 && $tipo != 2)
   {
       unset($_SESSION['sc_session'][$this->Ini->sc_page][$apl]['where_orig']);
   }
   if ($this->NM_ajax_flag)
   {
       $sTarget = '_self';
       $this->NM_ajax_info['redir']['metodo']              = 'post';
       $this->NM_ajax_info['redir']['action']              = $nmgp_saida_form;
       $this->NM_ajax_info['redir']['target']              = $sTarget;
       $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
       $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       if (0 == $tipo)
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida'] = $this->nm_location;
       }
       form_tbcustomer_pack_ajax_response();
       exit;
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
   </HEAD>
   <BODY>
   <FORM name="form_ok" method="POST" action="<?php echo $this->form_encode_input($nmgp_saida_form); ?>" target="_self">
<?php
   if ($tipo == 0)
   {
?>
     <INPUT type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($this->nm_location); ?>"> 
<?php
   }
?>
     <INPUT type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"> 
     <INPUT type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
   </FORM>
   <SCRIPT type="text/javascript">
      bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
      function scLigEditLookupCall()
      {
<?php
   if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['sc_modal'])
   {
?>
        parent.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
   elseif ($this->lig_edit_lookup)
   {
?>
        opener.<?php echo $this->lig_edit_lookup_cb; ?>(<?php echo $this->lig_edit_lookup_row; ?>);
<?php
   }
?>
      }
      if (bLigEditLookupCall)
      {
        scLigEditLookupCall();
      }
<?php
if ($tipo == 2 && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['masterValue']);
?>
}
<?php
    }
}
?>
      document.form_ok.submit();
   </SCRIPT>
   </BODY>
   </HTML>
<?php
  exit;
}
function nmgp_redireciona_form($nm_apl_dest, $nm_apl_retorno, $nm_apl_parms, $nm_target="", $opc="", $alt_modal=430, $larg_modal=630)
{
   if (isset($this->NM_is_redirected) && $this->NM_is_redirected)
   {
       return;
   }
   if (is_array($nm_apl_parms))
   {
       $tmp_parms = "";
       foreach ($nm_apl_parms as $par => $val)
       {
           $par = trim($par);
           $val = trim($val);
           $tmp_parms .= str_replace(".", "_", $par) . "?#?";
           if (substr($val, 0, 1) == "$")
           {
               $tmp_parms .= $$val;
           }
           elseif (substr($val, 0, 1) == "{")
           {
               $val        = substr($val, 1, -1);
               $tmp_parms .= $this->$val;
           }
           elseif (substr($val, 0, 1) == "[")
           {
               $tmp_parms .= $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer'][substr($val, 1, -1)];
           }
           else
           {
               $tmp_parms .= $val;
           }
           $tmp_parms .= "?@?";
       }
       $nm_apl_parms = $tmp_parms;
   }
   if (empty($opc))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['opcao'] = "";
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbcustomer']['retorno_edit'] = "";
   }
   $nm_target_form = (empty($nm_target)) ? "_self" : $nm_target;
   if (strtolower(substr($nm_apl_dest, -4)) != ".php" && (strtolower(substr($nm_apl_dest, 0, 7)) == "http://" || strtolower(substr($nm_apl_dest, 0, 8)) == "https://" || strtolower(substr($nm_apl_dest, 0, 3)) == "../"))
   {
       if ($this->NM_ajax_flag)
       {
           $this->NM_ajax_info['redir']['metodo'] = 'location';
           $this->NM_ajax_info['redir']['action'] = $nm_apl_dest;
           $this->NM_ajax_info['redir']['target'] = $nm_target_form;
           form_tbcustomer_pack_ajax_response();
           exit;
       }
       echo "<SCRIPT language=\"javascript\">";
       if (strtolower($nm_target) == "_blank")
       {
           echo "window.open ('" . $nm_apl_dest . "');";
           echo "</SCRIPT>";
           return;
       }
       else
       {
           echo "window.location='" . $nm_apl_dest . "';";
           echo "</SCRIPT>";
           $this->NM_close_db();
           exit;
       }
   }
   $dir = explode("/", $nm_apl_dest);
   if (count($dir) == 1)
   {
       $nm_apl_dest = str_replace(".php", "", $nm_apl_dest);
       $nm_apl_dest = $this->Ini->path_link . SC_dir_app_name($nm_apl_dest) . "/" . $nm_apl_dest . ".php";
   }
   if ($this->NM_ajax_flag)
   {
       $nm_apl_parms = str_replace("?#?", "*scin", NM_charset_to_utf8($nm_apl_parms));
       $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
       $this->NM_ajax_info['redir']['metodo']     = 'post';
       $this->NM_ajax_info['redir']['action']     = $nm_apl_dest;
       $this->NM_ajax_info['redir']['nmgp_parms'] = $nm_apl_parms;
       $this->NM_ajax_info['redir']['target']     = $nm_target_form;
       $this->NM_ajax_info['redir']['h_modal']    = $alt_modal;
       $this->NM_ajax_info['redir']['w_modal']    = $larg_modal;
       if ($nm_target_form == "_blank")
       {
           $this->NM_ajax_info['redir']['nmgp_outra_jan'] = 'true';
       }
       else
       {
           $this->NM_ajax_info['redir']['nmgp_url_saida']      = $nm_apl_retorno;
           $this->NM_ajax_info['redir']['script_case_init']    = $this->Ini->sc_page;
           $this->NM_ajax_info['redir']['script_case_session'] = session_id();
       }
       form_tbcustomer_pack_ajax_response();
       exit;
   }
   if ($nm_target == "modal")
   {
       if (!empty($nm_apl_parms))
       {
           $nm_apl_parms = str_replace("?#?", "*scin", $nm_apl_parms);
           $nm_apl_parms = str_replace("?@?", "*scout", $nm_apl_parms);
           $nm_apl_parms = "nmgp_parms=" . $nm_apl_parms . "&";
       }
       $par_modal = "?script_case_init=" . $this->Ini->sc_page . "&script_case_session=" . session_id() . "&nmgp_outra_jan=true&nmgp_url_saida=modal&NMSC_modal=ok&";
       $this->redir_modal = "$(function() { tb_show('', '" . $nm_apl_dest . $par_modal . $nm_apl_parms . "TB_iframe=true&modal=true&height=" . $alt_modal . "&width=" . $larg_modal . "', '') })";
       $this->NM_is_redirected = true;
       return;
   }
   if ($nm_target == "_blank")
   {
?>
<form name="Fredir" method="post" target="_blank" action="<?php echo $nm_apl_dest; ?>">
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
</form>
<script type="text/javascript">
setTimeout(function() { document.Fredir.submit(); }, 250);
</script>
<?php
    return;
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

   <HTML>
   <HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
<?php

   if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
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
    <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
   </HEAD>
   <BODY>
<?php
   }
?>
<form name="Fredir" method="post" 
                  target="_self"> 
  <input type="hidden" name="nmgp_parms" value="<?php echo $this->form_encode_input($nm_apl_parms); ?>"/>
<?php
   if ($nm_target_form == "_blank")
   {
?>
  <input type="hidden" name="nmgp_outra_jan" value="true"/> 
<?php
   }
   else
   {
?>
  <input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nm_apl_retorno) ?>">
  <input type="hidden" name="script_case_init" value="<?php echo $this->form_encode_input($this->Ini->sc_page); ?>"/> 
  <input type="hidden" name="script_case_session" value="<?php echo $this->form_encode_input(session_id()); ?>"> 
<?php
   }
?>
</form> 
   <SCRIPT type="text/javascript">
<?php
   if ($nm_target_form == "modal")
   {
?>
       $(document).ready(function(){
           tb_show('', '<?php echo $nm_apl_dest ?>?script_case_init=<?php echo $this->Ini->sc_page; ?>&script_case_session=<?php echo session_id() ?> &nmgp_url_saida=modal&nmgp_parms=<?php echo $this->form_encode_input($nm_apl_parms); ?>&nmgp_outra_jan=true&TB_iframe=true&height=<?php echo $alt_modal; ?>&width=<?php echo $larg_modal; ?>&modal=true', '');
       });
<?php
   }
   else
   {
?>
    $(function() {
       document.Fredir.target = "<?php echo $nm_target_form ?>"; 
       document.Fredir.action = "<?php echo $nm_apl_dest ?>";
       document.Fredir.submit();
    });
<?php
   }
?>
   </SCRIPT>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
?>
   </BODY>
   </HTML>
<?php
   }
?>
<?php
   if ($nm_target_form != "_blank" && $nm_target_form != "modal")
   {
       $this->NM_close_db();
       exit;
   }
}
}
?>
