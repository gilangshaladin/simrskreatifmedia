<?php
class form_tbpemeriksaanrawatjalan_form extends form_tbpemeriksaanrawatjalan_apl
{
function Form_Init()
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
?>
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    $sOBContents = ob_get_contents();
    ob_end_clean();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
            "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">

<html<?php echo $_SESSION['scriptcase']['reg_conf']['html_dir'] ?>>
<HEAD>
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - tbpemeriksaanrawatjalan"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tbpemeriksaanrawatjalan"); } ?></TITLE>
 <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
 <META http-equiv="Expires" content="Fri, Jan 01 1900 00:00:00 GMT"/>
 <META http-equiv="Last-Modified" content="<?php echo gmdate("D, d M Y H:i:s"); ?> GMT"/>
 <META http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate"/>
 <META http-equiv="Cache-Control" content="post-check=0, pre-check=0"/>
 <META http-equiv="Pragma" content="no-cache"/>
 <link rel="shortcut icon" href="../_lib/img/scriptcase__NM__ico__NM__favicon.ico">
<?php
header("X-XSS-Protection: 1; mode=block");
?>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/thickbox.css" type="text/css" media="screen" />
 <SCRIPT type="text/javascript">
  var sc_pathToTB = '<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/thickbox/';
  var sc_tbLangClose = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_close"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_tbLangEsc = "<?php echo html_entity_decode($this->Ini->Nm_lang["lang_tb_esc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]) ?>";
  var sc_userSweetAlertDisplayed = false;
 </SCRIPT>
 <SCRIPT type="text/javascript">
  var sc_blockCol = '<?php echo $this->Ini->Block_img_col; ?>';
  var sc_blockExp = '<?php echo $this->Ini->Block_img_exp; ?>';
  var sc_ajaxBg = '<?php echo $this->Ini->Color_bg_ajax; ?>';
  var sc_ajaxBordC = '<?php echo $this->Ini->Border_c_ajax; ?>';
  var sc_ajaxBordS = '<?php echo $this->Ini->Border_s_ajax; ?>';
  var sc_ajaxBordW = '<?php echo $this->Ini->Border_w_ajax; ?>';
  var sc_ajaxMsgTime = 2;
  var sc_img_status_ok = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_ok; ?>';
  var sc_img_status_err = '<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Img_status_err; ?>';
  var sc_css_status = '<?php echo $this->Ini->Css_status; ?>';
<?php
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['sc_redir_atualiz'] == 'ok')
{
?>
  var sc_closeChange = true;
<?php
}
else
{
?>
  var sc_closeChange = false;
<?php
}
?>
 </SCRIPT>
        <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery.js"></SCRIPT>
<input type="hidden" id="sc-mobile-lock" value='true' />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery/js/jquery-ui.js"></SCRIPT>
 <link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery/css/smoothness/jquery-ui.css" type="text/css" media="screen" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_sweetalert.css" />
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/sweetalert2.all.min.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/sweetalert/polyfill.min.js"></SCRIPT>
 <script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.iframe-transport.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fileupload.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/malsup-blockui/jquery.blockUI.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->path_prod; ?>/third/jquery_plugin/thickbox/thickbox-compressed.js"></SCRIPT>
 <style type="text/css">
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_desc ?>'], 
   .scFormLabelOddMult a img[src$='<?php echo $this->Ini->Label_sort_asc ?>']{opacity:1!important;} 
   .scFormLabelOddMult a img{opacity:0;transition:all .2s;} 
   .scFormLabelOddMult:HOVER a img{opacity:1;transition:all .2s;} 
 </style>
<style type="text/css">
.sc-button-image.disabled {
	opacity: 0.25
}
.sc-button-image.disabled img {
	cursor: default !important
}
</style>
 <style type="text/css">
  .fileinput-button-padding {
   padding: 3px 10px !important;
  }
  .fileinput-button {
   position: relative;
   overflow: hidden;
   float: left;
   margin-right: 4px;
  }
  .fileinput-button input {
   position: absolute;
   top: 0;
   right: 0;
   margin: 0;
   border: solid transparent;
   border-width: 0 0 100px 200px;
   opacity: 0;
   filter: alpha(opacity=0);
   -moz-transform: translate(-300px, 0) scale(4);
   direction: ltr;
   cursor: pointer;
  }
 </style>
<?php
$miniCalendarFA = $this->jqueryFAFile('calendar');
if ('' != $miniCalendarFA) {
?>
<style type="text/css">
.css_read_off_tglperiksa_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['embutida_pdf']))
 {
 ?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_form<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
  <?php 
  if(isset($this->Ini->str_google_fonts) && !empty($this->Ini->str_google_fonts)) 
  { 
  ?> 
  <link href="<?php echo $this->Ini->str_google_fonts ?>" rel="stylesheet" /> 
  <?php 
  } 
  ?> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_appdiv<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" /> 
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_tab<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/buttons/<?php echo $this->Ini->Str_btn_form . '/' . $this->Ini->Str_btn_form ?>.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_prod; ?>/third/font-awesome/css/all.min.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>_lib/css/<?php echo $this->Ini->str_schema_all ?>_calendar<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbpemeriksaanrawatjalan/form_tbpemeriksaanrawatjalan_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbpemeriksaanrawatjalan_sajax_js.php");
?>
<script type="text/javascript">
if (document.getElementById("id_error_display_fixed"))
{
 scCenterFixedElement("id_error_display_fixed");
}
var posDispLeft = 0;
var posDispTop = 0;
var Nm_Proc_Atualiz = false;
function findPos(obj)
{
 var posCurLeft = posCurTop = 0;
 if (obj.offsetParent)
 {
  posCurLeft = obj.offsetLeft
  posCurTop = obj.offsetTop
  while (obj = obj.offsetParent)
  {
   posCurLeft += obj.offsetLeft
   posCurTop += obj.offsetTop
  }
 }
 posDispLeft = posCurLeft - 10;
 posDispTop = posCurTop + 30;
}
var Nav_permite_ret = "<?php if ($this->Nav_permite_ret) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_permite_ava = "<?php if ($this->Nav_permite_ava) { echo 'S'; } else { echo 'N'; } ?>";
var Nav_binicio     = "<?php echo $this->arr_buttons['binicio']['type']; ?>";
var Nav_bavanca     = "<?php echo $this->arr_buttons['bavanca']['type']; ?>";
var Nav_bretorna    = "<?php echo $this->arr_buttons['bretorna']['type']; ?>";
var Nav_bfinal      = "<?php echo $this->arr_buttons['bfinal']['type']; ?>";
function nav_atualiza(str_ret, str_ava, str_pos)
{
<?php
 if (isset($this->NM_btn_navega) && 'N' == $this->NM_btn_navega)
 {
     echo " return;";
 }
 else
 {
?>
 if ('S' == str_ret)
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['first'] == "on")
    {
?>
       $("#sc_b_ini_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['back'] == "on")
    {
?>
       $("#sc_b_ret_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
 if ('S' == str_ava)
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", false).removeClass("disabled");
<?php
    }
?>
 }
 else
 {
<?php
    if ($this->nmgp_botoes['last'] == "on")
    {
?>
       $("#sc_b_fim_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
    if ($this->nmgp_botoes['forward'] == "on")
    {
?>
       $("#sc_b_avc_" + str_pos).prop("disabled", true).addClass("disabled");
<?php
    }
?>
 }
<?php
  }
?>
}
function nav_liga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' == sImg.substr(sImg.length - 4))
 {
  sImg = sImg.substr(0, sImg.length - 4);
 }
 sImg += sExt;
}
function nav_desliga_img()
{
 sExt = sImg.substr(sImg.length - 4);
 sImg = sImg.substr(0, sImg.length - 4);
 if ('_off' != sImg.substr(sImg.length - 4))
 {
  sImg += '_off';
 }
 sImg += sExt;
}

 function nm_field_disabled(Fields, Opt, Seq, Opcao) {
  if (Opcao != null) {
      opcao = Opcao;
  }
  else {
      opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
  }
  if (opcao == "novo" && Opt == "U") {
      return;
  }
  if (opcao != "novo" && Opt == "I") {
      return;
  }
  Field = Fields.split(";");
  for (i=0; i < Field.length; i++)
  {
     F_temp = Field[i].split("=");
     F_name = F_temp[0];
     F_opc  = (F_temp[1] && ("disabled" == F_temp[1] || "true" == F_temp[1])) ? true : false;
     ini = 1;
     xx = document.F1.sc_contr_vert.value;
     if (Seq != null) 
     {
         ini = parseInt(Seq);
         xx  = ini + 1;
     }
     if (F_name == "standardari_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "standardari_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "standarsampai_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "standarsampai_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("standardari_=enabled", "", i);
    nm_field_disabled("standarsampai_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_tbpemeriksaanrawatjalan_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  sc_form_onload();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

<?php
if (!$this->NM_ajax_flag && isset($this->NM_non_ajax_info['ajaxJavascript']) && !empty($this->NM_non_ajax_info['ajaxJavascript']))
{
    foreach ($this->NM_non_ajax_info['ajaxJavascript'] as $aFnData)
    {
?>
  <?php echo $aFnData[0]; ?>(<?php echo implode(', ', $aFnData[1]); ?>);

<?php
    }
}
?>
 });

   $(window).on('load', function() {
   });
 if($(".sc-ui-block-control").length) {
  preloadBlock = new Image();
  preloadBlock.src = "<?php echo $this->Ini->path_icones; ?>/" + sc_blockExp;
 }

 var show_block = {
  
 };

 function toggleBlock(e) {
  var block = e.data.block,
      block_id = $(block).attr("id");
      block_img = $("#" + block_id + " .sc-ui-block-control");

  if (1 >= block.rows.length) {
   return;
  }

  show_block[block_id] = !show_block[block_id];

  if (show_block[block_id]) {
    $(block).css("height", "100%");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockCol));
  }
  else {
    $(block).css("height", "");
    if (block_img.length) block_img.attr("src", changeImgName(block_img.attr("src"), sc_blockExp));
  }

  for (var i = 1; i < block.rows.length; i++) {
   if (show_block[block_id])
    $(block.rows[i]).show();
   else
    $(block.rows[i]).hide();
  }

  if (show_block[block_id]) {
  }
 }

 function changeImgName(imgOld, imgNew) {
   var aOld = imgOld.split("/");
   aOld.pop();
   aOld.push(imgNew);
   return aOld.join("/");
 }

</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
{
    echo $sOBContents;
}

?>
<div id="idJSSpecChar" style="display: none;"></div>
<script type="text/javascript">
function NM_tp_critica(TP)
{
    if (TP == 0 || TP == 1 || TP == 2)
    {
        nmdg_tipo_crit = TP;
    }
}
</script> 
<?php
 include_once("form_tbpemeriksaanrawatjalan_js0.php");
?>
<script type="text/javascript"> 
  sc_quant_excl = <?php echo count($sc_check_excl); ?>; 
 function setLocale(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_idioma_novo.value = sLocale;
 }
 function setSchema(oSel)
 {
  var sLocale = "";
  if (-1 < oSel.selectedIndex)
  {
   sLocale = oSel.options[oSel.selectedIndex].value;
  }
  document.F1.nmgp_schema_f.value = sLocale;
 }
var scInsertFieldWithErrors = new Array();
<?php
foreach ($this->NM_ajax_info['fieldsWithErrors'] as $insertFieldName) {
?>
scInsertFieldWithErrors.push("<?php echo $insertFieldName; ?>");
<?php
}
?>
$(function() {
	scAjaxError_markFieldList(scInsertFieldWithErrors);
});
 </script>
<form  name="F1" method="post" 
               action="./" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_tbpemeriksaanrawatjalan'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbpemeriksaanrawatjalan'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
?>
<div style="display: none; position: absolute; z-index: 1000" id="id_error_display_table_frame">
<table class="scFormErrorTable scFormToastTable">
<tr><?php if ($this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><td style="padding: 0px" rowspan="2"><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top"></td><?php } ?><td class="scFormErrorTitle scFormToastTitle"><table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormErrorTitleFont" style="padding: 0px; vertical-align: top; width: 100%"><?php if (!$this->Ini->Error_icon_span && '' != $this->Ini->Err_ico_title) { ?><img src="<?php echo $this->Ini->path_icones; ?>/<?php echo $this->Ini->Err_ico_title; ?>" style="border-width: 0px" align="top">&nbsp;<?php } ?><?php echo $this->Ini->Nm_lang['lang_errm_errt'] ?></td><td style="padding: 0px; vertical-align: top"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideErrorDisplay('table')", "scAjaxHideErrorDisplay('table')", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
</td></tr></table></td></tr>
<tr><td class="scFormErrorMessage scFormToastMessage"><span id="id_error_display_table_text"></span></td></tr>
</table>
</div>
<div style="display: none; position: absolute; z-index: 1000" id="id_message_display_frame">
 <table class="scFormMessageTable" id="id_message_display_content" style="width: 100%">
  <tr id="id_message_display_title_line">
   <td class="scFormMessageTitle" style="height: 20px"><?php
if ('' != $this->Ini->Msg_ico_title) {
?>
<img src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_title; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmessageclose", "_scAjaxMessageBtnClose()", "_scAjaxMessageBtnClose()", "id_message_display_close_icon", "", "", "float: right", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<span id="id_message_display_title" style="vertical-align: middle"></span></td>
  </tr>
  <tr>
   <td class="scFormMessageMessage"><?php
if ('' != $this->Ini->Msg_ico_body) {
?>
<img id="id_message_display_body_icon" src="<?php echo $this->Ini->path_icones . '/' . $this->Ini->Msg_ico_body; ?>" style="border-width: 0px; vertical-align: middle">&nbsp;<?php
}
?>
<span id="id_message_display_text"></span><div id="id_message_display_buttond" style="display: none; text-align: center"><br /><input id="id_message_display_buttone" type="button" class="scButton_default" value="Ok" onClick="_scAjaxMessageBtnClick()" ></div></td>
  </tr>
 </table>
</div>
<?php
$msgDefClose = isset($this->arr_buttons['bmessageclose']) ? $this->arr_buttons['bmessageclose']['value'] : 'Ok';
?>
<script type="text/javascript">
var scMsgDefTitle = "<?php echo $this->Ini->Nm_lang['lang_usr_lang_othr_msgs_titl']; ?>";
var scMsgDefButton = "Ok";
var scMsgDefClose = "<?php echo $msgDefClose; ?>";
var scMsgDefClick = "close";
var scMsgDefScInit = "<?php echo $this->Ini->page; ?>";
</script>
<?php
if ($this->record_insert_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmi']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
if ($this->record_delete_ok)
{
?>
<script type="text/javascript">
if (typeof sc_userSweetAlertDisplayed === "undefined" || !sc_userSweetAlertDisplayed) {
    _scAjaxShowMessage({message: "<?php echo $this->form_encode_input($this->Ini->Nm_lang['lang_othr_ajax_frmd']) ?>", title: "", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: true, type: "success"});
}
sc_userSweetAlertDisplayed = false;
</script>
<?php
}
?>
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0  width="100%">
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - tbpemeriksaanrawatjalan"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tbpemeriksaanrawatjalan"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($this->Embutida_form) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['new'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bnovo", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_new_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bincluir", "scBtnFn_sys_format_inc()", "scBtnFn_sys_format_inc()", "sc_b_ins_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_iframe'] != "R")
{
?>
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
}
?>
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
?>
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 't');</script><?php } ?>
</td></tr> 
<tr><td>
<?php
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['empty_filter'] = true;
       }
       echo "<tr><td>";
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
     <div id="SC_tab_mult_reg">
<?php
}

function Form_Table($Table_refresh = false)
{
   global $sc_seq_vert, $nm_apl_dependente, $opcao_botoes, $nm_url_saida; 
   if ($Table_refresh) 
   { 
       ob_start();
   }
?>
<?php
   if (!isset($this->nmgp_cmp_hidden['id_']))
   {
       $this->nmgp_cmp_hidden['id_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php
$labelRowCount = 0;
?>
   <tr class="sc-ui-header-row" id="sc-id-fixed-headers-row-<?php echo $labelRowCount++ ?>">
<?php
$orderColName = '';
$orderColOrient = '';
?>
    <script type="text/javascript">
     var orderImgAsc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_asc ?>";
     var orderImgDesc = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort_desc ?>";
     var orderImgNone = "<?php echo $this->Ini->path_img_global . "/" . $this->Ini->Label_sort ?>";
     var orderColName = "";
     function scSetOrderColumn(clickedColumn) {
      $(".sc-ui-img-order-column").attr("src", orderImgNone);
      if (clickedColumn != orderColName) {
       orderColName = clickedColumn;
       orderColOrient = orderImgAsc;
      }
      else if ("" != orderColName) {
       orderColOrient = orderColOrient == orderImgAsc ? orderImgDesc : orderImgAsc;
      }
      else {
       orderColName = "";
       orderColOrient = "";
      }
      $("#sc-id-img-order-" + orderColName).attr("src", orderColOrient);
     }
    </script>
<?php
     $Col_span = "";


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") { $Col_span = " colspan=2"; }
    if (!$this->Embutida_form && $this->nmgp_opcao == "novo") { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" style="display: none;" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['namapemeriksaan_']) && $this->nmgp_cmp_hidden['namapemeriksaan_'] == 'off') { $sStyleHidden_namapemeriksaan_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['namapemeriksaan_']) || $this->nmgp_cmp_hidden['namapemeriksaan_'] == 'on') {
      if (!isset($this->nm_new_label['namapemeriksaan_'])) {
          $this->nm_new_label['namapemeriksaan_'] = "Nama Pemeriksaan"; } ?>

    <TD class="scFormLabelOddMult css_namapemeriksaan__label" id="hidden_field_label_namapemeriksaan_" style="<?php echo $sStyleHidden_namapemeriksaan_; ?>" > <?php echo $this->nm_new_label['namapemeriksaan_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['standardari_']) && $this->nmgp_cmp_hidden['standardari_'] == 'off') { $sStyleHidden_standardari_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['standardari_']) || $this->nmgp_cmp_hidden['standardari_'] == 'on') {
      if (!isset($this->nm_new_label['standardari_'])) {
          $this->nm_new_label['standardari_'] = "Standar Dari"; } ?>

    <TD class="scFormLabelOddMult css_standardari__label" id="hidden_field_label_standardari_" style="<?php echo $sStyleHidden_standardari_; ?>" > <?php echo $this->nm_new_label['standardari_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['standarsampai_']) && $this->nmgp_cmp_hidden['standarsampai_'] == 'off') { $sStyleHidden_standarsampai_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['standarsampai_']) || $this->nmgp_cmp_hidden['standarsampai_'] == 'on') {
      if (!isset($this->nm_new_label['standarsampai_'])) {
          $this->nm_new_label['standarsampai_'] = "Standar Sampai"; } ?>

    <TD class="scFormLabelOddMult css_standarsampai__label" id="hidden_field_label_standarsampai_" style="<?php echo $sStyleHidden_standarsampai_; ?>" > <?php echo $this->nm_new_label['standarsampai_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['nilai_']) && $this->nmgp_cmp_hidden['nilai_'] == 'off') { $sStyleHidden_nilai_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nilai_']) || $this->nmgp_cmp_hidden['nilai_'] == 'on') {
      if (!isset($this->nm_new_label['nilai_'])) {
          $this->nm_new_label['nilai_'] = "Nilai"; } ?>

    <TD class="scFormLabelOddMult css_nilai__label" id="hidden_field_label_nilai_" style="<?php echo $sStyleHidden_nilai_; ?>" > <?php echo $this->nm_new_label['nilai_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['dokter_']) && $this->nmgp_cmp_hidden['dokter_'] == 'off') { $sStyleHidden_dokter_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['dokter_']) || $this->nmgp_cmp_hidden['dokter_'] == 'on') {
      if (!isset($this->nm_new_label['dokter_'])) {
          $this->nm_new_label['dokter_'] = "Dokter"; } ?>

    <TD class="scFormLabelOddMult css_dokter__label" id="hidden_field_label_dokter_" style="<?php echo $sStyleHidden_dokter_; ?>" > <?php echo $this->nm_new_label['dokter_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['keterangan_']) && $this->nmgp_cmp_hidden['keterangan_'] == 'off') { $sStyleHidden_keterangan_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['keterangan_']) || $this->nmgp_cmp_hidden['keterangan_'] == 'on') {
      if (!isset($this->nm_new_label['keterangan_'])) {
          $this->nm_new_label['keterangan_'] = "Keterangan"; } ?>

    <TD class="scFormLabelOddMult css_keterangan__label" id="hidden_field_label_keterangan_" style="<?php echo $sStyleHidden_keterangan_; ?>" > <?php echo $this->nm_new_label['keterangan_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['tglperiksa_']) && $this->nmgp_cmp_hidden['tglperiksa_'] == 'off') { $sStyleHidden_tglperiksa_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['tglperiksa_']) || $this->nmgp_cmp_hidden['tglperiksa_'] == 'on') {
      if (!isset($this->nm_new_label['tglperiksa_'])) {
          $this->nm_new_label['tglperiksa_'] = "Tgl Periksa"; } ?>
<?php
          $date_format_show = strtolower(str_replace(';', ' ', $this->field_config['tglperiksa_']['date_format']));
          $date_format_show = str_replace("dd", $this->Ini->Nm_lang['lang_othr_date_days'], $date_format_show);
          $date_format_show = str_replace("mm", $this->Ini->Nm_lang['lang_othr_date_mnth'], $date_format_show);
          $date_format_show = str_replace("yyyy", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("aaaa", $this->Ini->Nm_lang['lang_othr_date_year'], $date_format_show);
          $date_format_show = str_replace("hh", $this->Ini->Nm_lang['lang_othr_date_hour'], $date_format_show);
          $date_format_show = str_replace("ii", $this->Ini->Nm_lang['lang_othr_date_mint'], $date_format_show);
          $date_format_show = str_replace("ss", $this->Ini->Nm_lang['lang_othr_date_scnd'], $date_format_show);
?>

    <TD class="scFormLabelOddMult css_tglperiksa__label" id="hidden_field_label_tglperiksa_" style="<?php echo $sStyleHidden_tglperiksa_; ?>" > <?php echo $this->nm_new_label['tglperiksa_'] ?><br><span class="scFormDataHelpOddMult"><?php echo $date_format_show ?></span> </TD>
   <?php } ?>

   <?php if ((!isset($this->nmgp_cmp_hidden['id_']) || $this->nmgp_cmp_hidden['id_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_'])) {
          $this->nm_new_label['id_'] = "Id"; } ?>

    <TD class="scFormLabelOddMult css_id__label" id="hidden_field_label_id_" style="<?php echo $sStyleHidden_id_; ?>" > <?php echo $this->nm_new_label['id_'] ?> </TD>
   <?php }?>





    <script type="text/javascript">
     var orderColOrient = "<?php echo $orderColOrient ?>";
     scSetOrderColumn("<?php echo $orderColName ?>");
    </script>
   </tr>
<?php   
} 
function Form_Corpo($Line_Add = false, $Table_refresh = false) 
{ 
   global $sc_seq_vert; 
   if ($Line_Add) 
   { 
       ob_start();
       $iStart = sizeof($this->form_vert_form_tbpemeriksaanrawatjalan);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_tbpemeriksaanrawatjalan = $this->form_vert_form_tbpemeriksaanrawatjalan;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_tbpemeriksaanrawatjalan))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
   foreach ($this->form_vert_form_tbpemeriksaanrawatjalan as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->trancode_ = $this->form_vert_form_tbpemeriksaanrawatjalan[$sc_seq_vert]['trancode_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['namapemeriksaan_'] = true;
           $this->nmgp_cmp_readonly['standardari_'] = true;
           $this->nmgp_cmp_readonly['standarsampai_'] = true;
           $this->nmgp_cmp_readonly['nilai_'] = true;
           $this->nmgp_cmp_readonly['dokter_'] = true;
           $this->nmgp_cmp_readonly['keterangan_'] = true;
           $this->nmgp_cmp_readonly['tglperiksa_'] = true;
           $this->nmgp_cmp_readonly['id_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['namapemeriksaan_']) || $this->nmgp_cmp_readonly['namapemeriksaan_'] != "on") {$this->nmgp_cmp_readonly['namapemeriksaan_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['standardari_']) || $this->nmgp_cmp_readonly['standardari_'] != "on") {$this->nmgp_cmp_readonly['standardari_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['standarsampai_']) || $this->nmgp_cmp_readonly['standarsampai_'] != "on") {$this->nmgp_cmp_readonly['standarsampai_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nilai_']) || $this->nmgp_cmp_readonly['nilai_'] != "on") {$this->nmgp_cmp_readonly['nilai_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['dokter_']) || $this->nmgp_cmp_readonly['dokter_'] != "on") {$this->nmgp_cmp_readonly['dokter_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['keterangan_']) || $this->nmgp_cmp_readonly['keterangan_'] != "on") {$this->nmgp_cmp_readonly['keterangan_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['tglperiksa_']) || $this->nmgp_cmp_readonly['tglperiksa_'] != "on") {$this->nmgp_cmp_readonly['tglperiksa_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->namapemeriksaan_ = $this->form_vert_form_tbpemeriksaanrawatjalan[$sc_seq_vert]['namapemeriksaan_']; 
       $namapemeriksaan_ = $this->namapemeriksaan_; 
       $sStyleHidden_namapemeriksaan_ = '';
       if (isset($sCheckRead_namapemeriksaan_))
       {
           unset($sCheckRead_namapemeriksaan_);
       }
       if (isset($this->nmgp_cmp_readonly['namapemeriksaan_']))
       {
           $sCheckRead_namapemeriksaan_ = $this->nmgp_cmp_readonly['namapemeriksaan_'];
       }
       if (isset($this->nmgp_cmp_hidden['namapemeriksaan_']) && $this->nmgp_cmp_hidden['namapemeriksaan_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['namapemeriksaan_']);
           $sStyleHidden_namapemeriksaan_ = 'display: none;';
       }
       $bTestReadOnly_namapemeriksaan_ = true;
       $sStyleReadLab_namapemeriksaan_ = 'display: none;';
       $sStyleReadInp_namapemeriksaan_ = '';
       if (isset($this->nmgp_cmp_readonly['namapemeriksaan_']) && $this->nmgp_cmp_readonly['namapemeriksaan_'] == 'on')
       {
           $bTestReadOnly_namapemeriksaan_ = false;
           unset($this->nmgp_cmp_readonly['namapemeriksaan_']);
           $sStyleReadLab_namapemeriksaan_ = '';
           $sStyleReadInp_namapemeriksaan_ = 'display: none;';
       }
       $this->standardari_ = $this->form_vert_form_tbpemeriksaanrawatjalan[$sc_seq_vert]['standardari_']; 
       $standardari_ = $this->standardari_; 
       $sStyleHidden_standardari_ = '';
       if (isset($sCheckRead_standardari_))
       {
           unset($sCheckRead_standardari_);
       }
       if (isset($this->nmgp_cmp_readonly['standardari_']))
       {
           $sCheckRead_standardari_ = $this->nmgp_cmp_readonly['standardari_'];
       }
       if (isset($this->nmgp_cmp_hidden['standardari_']) && $this->nmgp_cmp_hidden['standardari_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['standardari_']);
           $sStyleHidden_standardari_ = 'display: none;';
       }
       $bTestReadOnly_standardari_ = true;
       $sStyleReadLab_standardari_ = 'display: none;';
       $sStyleReadInp_standardari_ = '';
       if (isset($this->nmgp_cmp_readonly['standardari_']) && $this->nmgp_cmp_readonly['standardari_'] == 'on')
       {
           $bTestReadOnly_standardari_ = false;
           unset($this->nmgp_cmp_readonly['standardari_']);
           $sStyleReadLab_standardari_ = '';
           $sStyleReadInp_standardari_ = 'display: none;';
       }
       $this->standarsampai_ = $this->form_vert_form_tbpemeriksaanrawatjalan[$sc_seq_vert]['standarsampai_']; 
       $standarsampai_ = $this->standarsampai_; 
       $sStyleHidden_standarsampai_ = '';
       if (isset($sCheckRead_standarsampai_))
       {
           unset($sCheckRead_standarsampai_);
       }
       if (isset($this->nmgp_cmp_readonly['standarsampai_']))
       {
           $sCheckRead_standarsampai_ = $this->nmgp_cmp_readonly['standarsampai_'];
       }
       if (isset($this->nmgp_cmp_hidden['standarsampai_']) && $this->nmgp_cmp_hidden['standarsampai_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['standarsampai_']);
           $sStyleHidden_standarsampai_ = 'display: none;';
       }
       $bTestReadOnly_standarsampai_ = true;
       $sStyleReadLab_standarsampai_ = 'display: none;';
       $sStyleReadInp_standarsampai_ = '';
       if (isset($this->nmgp_cmp_readonly['standarsampai_']) && $this->nmgp_cmp_readonly['standarsampai_'] == 'on')
       {
           $bTestReadOnly_standarsampai_ = false;
           unset($this->nmgp_cmp_readonly['standarsampai_']);
           $sStyleReadLab_standarsampai_ = '';
           $sStyleReadInp_standarsampai_ = 'display: none;';
       }
       $this->nilai_ = $this->form_vert_form_tbpemeriksaanrawatjalan[$sc_seq_vert]['nilai_']; 
       $nilai_ = $this->nilai_; 
       $sStyleHidden_nilai_ = '';
       if (isset($sCheckRead_nilai_))
       {
           unset($sCheckRead_nilai_);
       }
       if (isset($this->nmgp_cmp_readonly['nilai_']))
       {
           $sCheckRead_nilai_ = $this->nmgp_cmp_readonly['nilai_'];
       }
       if (isset($this->nmgp_cmp_hidden['nilai_']) && $this->nmgp_cmp_hidden['nilai_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nilai_']);
           $sStyleHidden_nilai_ = 'display: none;';
       }
       $bTestReadOnly_nilai_ = true;
       $sStyleReadLab_nilai_ = 'display: none;';
       $sStyleReadInp_nilai_ = '';
       if (isset($this->nmgp_cmp_readonly['nilai_']) && $this->nmgp_cmp_readonly['nilai_'] == 'on')
       {
           $bTestReadOnly_nilai_ = false;
           unset($this->nmgp_cmp_readonly['nilai_']);
           $sStyleReadLab_nilai_ = '';
           $sStyleReadInp_nilai_ = 'display: none;';
       }
       $this->dokter_ = $this->form_vert_form_tbpemeriksaanrawatjalan[$sc_seq_vert]['dokter_']; 
       $dokter_ = $this->dokter_; 
       $sStyleHidden_dokter_ = '';
       if (isset($sCheckRead_dokter_))
       {
           unset($sCheckRead_dokter_);
       }
       if (isset($this->nmgp_cmp_readonly['dokter_']))
       {
           $sCheckRead_dokter_ = $this->nmgp_cmp_readonly['dokter_'];
       }
       if (isset($this->nmgp_cmp_hidden['dokter_']) && $this->nmgp_cmp_hidden['dokter_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['dokter_']);
           $sStyleHidden_dokter_ = 'display: none;';
       }
       $bTestReadOnly_dokter_ = true;
       $sStyleReadLab_dokter_ = 'display: none;';
       $sStyleReadInp_dokter_ = '';
       if (isset($this->nmgp_cmp_readonly['dokter_']) && $this->nmgp_cmp_readonly['dokter_'] == 'on')
       {
           $bTestReadOnly_dokter_ = false;
           unset($this->nmgp_cmp_readonly['dokter_']);
           $sStyleReadLab_dokter_ = '';
           $sStyleReadInp_dokter_ = 'display: none;';
       }
       $this->keterangan_ = $this->form_vert_form_tbpemeriksaanrawatjalan[$sc_seq_vert]['keterangan_']; 
       $keterangan_ = $this->keterangan_; 
       $keterangan__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $keterangan_);
       $keterangan__val = $keterangan__tmp;
       $sStyleHidden_keterangan_ = '';
       if (isset($sCheckRead_keterangan_))
       {
           unset($sCheckRead_keterangan_);
       }
       if (isset($this->nmgp_cmp_readonly['keterangan_']))
       {
           $sCheckRead_keterangan_ = $this->nmgp_cmp_readonly['keterangan_'];
       }
       if (isset($this->nmgp_cmp_hidden['keterangan_']) && $this->nmgp_cmp_hidden['keterangan_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['keterangan_']);
           $sStyleHidden_keterangan_ = 'display: none;';
       }
       $bTestReadOnly_keterangan_ = true;
       $sStyleReadLab_keterangan_ = 'display: none;';
       $sStyleReadInp_keterangan_ = '';
       if (isset($this->nmgp_cmp_readonly['keterangan_']) && $this->nmgp_cmp_readonly['keterangan_'] == 'on')
       {
           $bTestReadOnly_keterangan_ = false;
           unset($this->nmgp_cmp_readonly['keterangan_']);
           $sStyleReadLab_keterangan_ = '';
           $sStyleReadInp_keterangan_ = 'display: none;';
       }
       $this->tglperiksa_ = $this->form_vert_form_tbpemeriksaanrawatjalan[$sc_seq_vert]['tglperiksa_'] . ' ' . $this->form_vert_form_tbpemeriksaanrawatjalan[$sc_seq_vert]['tglperiksa__hora']; 
       $tglperiksa_ = $this->tglperiksa_; 
       $sStyleHidden_tglperiksa_ = '';
       if (isset($sCheckRead_tglperiksa_))
       {
           unset($sCheckRead_tglperiksa_);
       }
       if (isset($this->nmgp_cmp_readonly['tglperiksa_']))
       {
           $sCheckRead_tglperiksa_ = $this->nmgp_cmp_readonly['tglperiksa_'];
       }
       if (isset($this->nmgp_cmp_hidden['tglperiksa_']) && $this->nmgp_cmp_hidden['tglperiksa_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['tglperiksa_']);
           $sStyleHidden_tglperiksa_ = 'display: none;';
       }
       $bTestReadOnly_tglperiksa_ = true;
       $sStyleReadLab_tglperiksa_ = 'display: none;';
       $sStyleReadInp_tglperiksa_ = '';
       if (isset($this->nmgp_cmp_readonly['tglperiksa_']) && $this->nmgp_cmp_readonly['tglperiksa_'] == 'on')
       {
           $bTestReadOnly_tglperiksa_ = false;
           unset($this->nmgp_cmp_readonly['tglperiksa_']);
           $sStyleReadLab_tglperiksa_ = '';
           $sStyleReadInp_tglperiksa_ = 'display: none;';
       }
       $this->id_ = $this->form_vert_form_tbpemeriksaanrawatjalan[$sc_seq_vert]['id_']; 
       $id_ = $this->id_; 
       if (!isset($this->nmgp_cmp_hidden['id_']))
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }
       $sStyleHidden_id_ = '';
       if (isset($sCheckRead_id_))
       {
           unset($sCheckRead_id_);
       }
       if (isset($this->nmgp_cmp_readonly['id_']))
       {
           $sCheckRead_id_ = $this->nmgp_cmp_readonly['id_'];
       }
       if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['id_']);
           $sStyleHidden_id_ = 'display: none;';
       }
       $bTestReadOnly_id_ = true;
       $sStyleReadLab_id_ = 'display: none;';
       $sStyleReadInp_id_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_"]) &&  $this->nmgp_cmp_readonly["id_"] == "on"))
       {
           $bTestReadOnly_id_ = false;
           unset($this->nmgp_cmp_readonly['id_']);
           $sStyleReadLab_id_ = '';
           $sStyleReadInp_id_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>"  style="display: none;"> <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && $this->nmgp_botoes['delete'] == "on") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if (!$this->Embutida_form && $this->nmgp_opcao == "novo") {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\"" ; if (in_array($sc_seq_vert, $sc_check_incl) || !empty($this->nm_todas_criticas)) { echo " checked ";} ?> class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
   <?php }?>
   <?php if ($this->Embutida_form) {?>
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_actions<?php echo $sc_seq_vert; ?>" NOWRAP> <?php if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['delete'] == "off") {
        $sDisplayDelete = 'display: none';
    }
    else {
        $sDisplayDelete = '';
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayDelete. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php
if ($this->nmgp_opcao != "novo") {
    if ($this->nmgp_botoes['update'] == "off") {
        $sDisplayUpdate = 'display: none';
    }
    else {
        $sDisplayUpdate = '';
    }
    if ($this->Embutida_ronly) {
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
        $sButDisp = 'display: none';
    }
    else
    {
        $sButDisp = $sDisplayUpdate;
    }
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "" . $sButDisp. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php
}
?>

<?php if ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_opcao == "novo") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_incluir", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('incluir', " . $sc_seq_vert . ")", "sc_ins_line_" . $sc_seq_vert . "", "", "", "display: ''", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php if ($this->nmgp_botoes['delete'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_excluir", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "nm_atualiza_line('excluir', " . $sc_seq_vert . ")", "sc_exc_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($Line_Add && $this->Embutida_ronly) {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "mdOpenLine(" . $sc_seq_vert . ")", "mdOpenLine(" . $sc_seq_vert . ")", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_tbpemeriksaanrawatjalan_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_tbpemeriksaanrawatjalan_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbpemeriksaanrawatjalan_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_tbpemeriksaanrawatjalan_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbpemeriksaanrawatjalan_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_tbpemeriksaanrawatjalan_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['namapemeriksaan_']) && $this->nmgp_cmp_hidden['namapemeriksaan_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="namapemeriksaan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($namapemeriksaan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_namapemeriksaan__line" id="hidden_field_data_namapemeriksaan_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_namapemeriksaan_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_namapemeriksaan__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_namapemeriksaan_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["namapemeriksaan_"]) &&  $this->nmgp_cmp_readonly["namapemeriksaan_"] == "on") { 

 ?>
<input type="hidden" name="namapemeriksaan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($namapemeriksaan_) . "\">" . $namapemeriksaan_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_namapemeriksaan_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-namapemeriksaan_<?php echo $sc_seq_vert ?> css_namapemeriksaan__line" style="<?php echo $sStyleReadLab_namapemeriksaan_; ?>"><?php echo $this->namapemeriksaan_; ?></span><span id="id_read_off_namapemeriksaan_<?php echo $sc_seq_vert ?>" class="css_read_off_namapemeriksaan_" style="white-space: nowrap;<?php echo $sStyleReadInp_namapemeriksaan_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_namapemeriksaan__obj" style="" id="id_sc_field_namapemeriksaan_<?php echo $sc_seq_vert ?>" type=text name="namapemeriksaan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($namapemeriksaan_) ?>"
 size=50 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_namapemeriksaan_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_namapemeriksaan_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['standardari_']) && $this->nmgp_cmp_hidden['standardari_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="standardari_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($standardari_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_standardari__line" id="hidden_field_data_standardari_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_standardari_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_standardari__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_standardari_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["standardari_"]) &&  $this->nmgp_cmp_readonly["standardari_"] == "on") { 

 ?>
<input type="hidden" name="standardari_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($standardari_) . "\">" . $standardari_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_standardari_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-standardari_<?php echo $sc_seq_vert ?> css_standardari__line" style="<?php echo $sStyleReadLab_standardari_; ?>"><?php echo $this->standardari_; ?></span><span id="id_read_off_standardari_<?php echo $sc_seq_vert ?>" class="css_read_off_standardari_" style="white-space: nowrap;<?php echo $sStyleReadInp_standardari_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_standardari__obj" style="" id="id_sc_field_standardari_<?php echo $sc_seq_vert ?>" type=text name="standardari_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($standardari_) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 5, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['standardari_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['standardari_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['standardari_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_standardari_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_standardari_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['standarsampai_']) && $this->nmgp_cmp_hidden['standarsampai_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="standarsampai_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($standarsampai_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_standarsampai__line" id="hidden_field_data_standarsampai_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_standarsampai_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_standarsampai__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_standarsampai_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["standarsampai_"]) &&  $this->nmgp_cmp_readonly["standarsampai_"] == "on") { 

 ?>
<input type="hidden" name="standarsampai_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($standarsampai_) . "\">" . $standarsampai_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_standarsampai_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-standarsampai_<?php echo $sc_seq_vert ?> css_standarsampai__line" style="<?php echo $sStyleReadLab_standarsampai_; ?>"><?php echo $this->standarsampai_; ?></span><span id="id_read_off_standarsampai_<?php echo $sc_seq_vert ?>" class="css_read_off_standarsampai_" style="white-space: nowrap;<?php echo $sStyleReadInp_standarsampai_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_standarsampai__obj" style="" id="id_sc_field_standarsampai_<?php echo $sc_seq_vert ?>" type=text name="standarsampai_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($standarsampai_) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 5, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['standarsampai_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['standarsampai_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['standarsampai_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_standarsampai_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_standarsampai_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nilai_']) && $this->nmgp_cmp_hidden['nilai_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nilai_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nilai_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nilai__line" id="hidden_field_data_nilai_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nilai_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nilai__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nilai_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nilai_"]) &&  $this->nmgp_cmp_readonly["nilai_"] == "on") { 

 ?>
<input type="hidden" name="nilai_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nilai_) . "\">" . $nilai_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_nilai_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nilai_<?php echo $sc_seq_vert ?> css_nilai__line" style="<?php echo $sStyleReadLab_nilai_; ?>"><?php echo $this->nilai_; ?></span><span id="id_read_off_nilai_<?php echo $sc_seq_vert ?>" class="css_read_off_nilai_" style="white-space: nowrap;<?php echo $sStyleReadInp_nilai_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nilai__obj" style="" id="id_sc_field_nilai_<?php echo $sc_seq_vert ?>" type=text name="nilai_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nilai_) ?>"
 size=5 alt="{datatype: 'integer', maxLength: 5, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['nilai_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['nilai_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['nilai_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nilai_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nilai_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['dokter_']) && $this->nmgp_cmp_hidden['dokter_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="dokter_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->dokter_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_dokter__line" id="hidden_field_data_dokter_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_dokter_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_dokter__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_dokter_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["dokter_"]) &&  $this->nmgp_cmp_readonly["dokter_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['Lookup_dokter_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['Lookup_dokter_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['Lookup_dokter_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['Lookup_dokter_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['Lookup_dokter_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['Lookup_dokter_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['Lookup_dokter_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['Lookup_dokter_'] = array(); 
    }

   $old_value_standardari_ = $this->standardari_;
   $old_value_standarsampai_ = $this->standarsampai_;
   $old_value_nilai_ = $this->nilai_;
   $old_value_tglperiksa_ = $this->tglperiksa_;
   $old_value_tglperiksa__hora = $this->tglperiksa__hora;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_standardari_ = $this->standardari_;
   $unformatted_value_standarsampai_ = $this->standarsampai_;
   $unformatted_value_nilai_ = $this->nilai_;
   $unformatted_value_tglperiksa_ = $this->tglperiksa_;
   $unformatted_value_tglperiksa__hora = $this->tglperiksa__hora;
   $unformatted_value_id_ = $this->id_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + name + ',' + spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar, name,',', spec)  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&name&','&spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||name||','||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + name + ',' + spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||name||','||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||name||','||spec  FROM tbdoctor  ORDER BY gelar, name, spec";
   }

   $this->standardari_ = $old_value_standardari_;
   $this->standarsampai_ = $old_value_standarsampai_;
   $this->nilai_ = $old_value_nilai_;
   $this->tglperiksa_ = $old_value_tglperiksa_;
   $this->tglperiksa__hora = $old_value_tglperiksa__hora;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['Lookup_dokter_'][] = $rs->fields[0];
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
   $x = 0; 
   $dokter__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->dokter__1))
          {
              foreach ($this->dokter__1 as $tmp_dokter_)
              {
                  if (trim($tmp_dokter_) === trim($cadaselect[1])) { $dokter__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->dokter_) === trim($cadaselect[1])) { $dokter__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="dokter_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($dokter_) . "\">" . $dokter__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_dokter_();
   $x = 0 ; 
   $dokter__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->dokter__1))
          {
              foreach ($this->dokter__1 as $tmp_dokter_)
              {
                  if (trim($tmp_dokter_) === trim($cadaselect[1])) { $dokter__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->dokter_) === trim($cadaselect[1])) { $dokter__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($dokter__look))
          {
              $dokter__look = $this->dokter_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_dokter_" . $sc_seq_vert . "\" class=\"css_dokter__line\" style=\"" .  $sStyleReadLab_dokter_ . "\">" . $this->form_encode_input($dokter__look) . "</span><span id=\"id_read_off_dokter_" . $sc_seq_vert . "\" class=\"css_read_off_dokter_\" style=\"white-space: nowrap; " . $sStyleReadInp_dokter_ . "\">";
   echo " <span id=\"idAjaxSelect_dokter_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_dokter__obj\" style=\"\" id=\"id_sc_field_dokter_" . $sc_seq_vert . "\" name=\"dokter_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->dokter_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->dokter_)) 
              {
                  echo " selected" ;
              } 
           } 
          echo ">$cadaselect[0] </option>" ; 
          echo "\r" ; 
          $x++ ; 
   }  ; 
   echo " </select></span>" ; 
   echo "\r" ; 
   echo "</span>";
?> 
<?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_dokter_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_dokter_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['keterangan_']) && $this->nmgp_cmp_hidden['keterangan_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="keterangan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($keterangan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_keterangan__line" id="hidden_field_data_keterangan_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_keterangan_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_keterangan__line" style="vertical-align: top;padding: 0px">
<?php
$keterangan__val = nl2br($keterangan_);

?>

<?php if ($bTestReadOnly_keterangan_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["keterangan_"]) &&  $this->nmgp_cmp_readonly["keterangan_"] == "on") { 

 ?>
<input type="hidden" name="keterangan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($keterangan_) . "\">" . $keterangan__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_keterangan_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-keterangan_<?php echo $sc_seq_vert ?> css_keterangan__line" style="<?php echo $sStyleReadLab_keterangan_; ?>"><?php echo $keterangan__val; ?></span><span id="id_read_off_keterangan_<?php echo $sc_seq_vert ?>" class="css_read_off_keterangan_" style="white-space: nowrap;<?php echo $sStyleReadInp_keterangan_; ?>">
 <textarea  class="sc-js-input scFormObjectOddMult css_keterangan__obj" style="white-space: pre-wrap;" name="keterangan_<?php echo $sc_seq_vert ?>" id="id_sc_field_keterangan_<?php echo $sc_seq_vert ?>" rows="2" cols="50"
 alt="{datatype: 'text', maxLength: 255, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $keterangan_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_keterangan_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_keterangan_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['tglperiksa_']) && $this->nmgp_cmp_hidden['tglperiksa_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tglperiksa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tglperiksa_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_tglperiksa__line" id="hidden_field_data_tglperiksa_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_tglperiksa_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_tglperiksa__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_tglperiksa_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglperiksa_"]) &&  $this->nmgp_cmp_readonly["tglperiksa_"] == "on") { 

 ?>
<input type="hidden" name="tglperiksa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tglperiksa_) . "\">" . $tglperiksa_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglperiksa_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-tglperiksa_<?php echo $sc_seq_vert ?> css_tglperiksa__line" style="<?php echo $sStyleReadLab_tglperiksa_; ?>"><?php echo $tglperiksa_; ?></span><span id="id_read_off_tglperiksa_<?php echo $sc_seq_vert ?>" class="css_read_off_tglperiksa_" style="white-space: nowrap;<?php echo $sStyleReadInp_tglperiksa_; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOddMult css_tglperiksa__obj" style="" id="id_sc_field_tglperiksa_<?php echo $sc_seq_vert ?>" type=text name="tglperiksa_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($tglperiksa_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['tglperiksa_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tglperiksa_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['tglperiksa_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['tglperiksa_']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tglperiksa_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tglperiksa_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->tglperiksa_ = $old_dt_tglperiksa_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormDataOddMult css_id__line" id="hidden_field_data_id_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_id_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_id__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_<?php echo $sc_seq_vert ?>" class="css_id__line" style="<?php echo $sStyleReadLab_id_; ?>"><?php echo $this->form_encode_input($this->id_); ?></span><span id="id_read_off_id_<?php echo $sc_seq_vert ?>" class="css_read_off_id_" style="<?php echo $sStyleReadInp_id_; ?>"><input type="hidden" id="id_sc_field_id_<?php echo $sc_seq_vert ?>" name="id_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($id_) . "\">"?>
<span id="id_ajax_label_id_<?php echo $sc_seq_vert; ?>"><?php echo nl2br($id_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_namapemeriksaan_))
       {
           $this->nmgp_cmp_readonly['namapemeriksaan_'] = $sCheckRead_namapemeriksaan_;
       }
       if ('display: none;' == $sStyleHidden_namapemeriksaan_)
       {
           $this->nmgp_cmp_hidden['namapemeriksaan_'] = 'off';
       }
       if (isset($sCheckRead_standardari_))
       {
           $this->nmgp_cmp_readonly['standardari_'] = $sCheckRead_standardari_;
       }
       if ('display: none;' == $sStyleHidden_standardari_)
       {
           $this->nmgp_cmp_hidden['standardari_'] = 'off';
       }
       if (isset($sCheckRead_standarsampai_))
       {
           $this->nmgp_cmp_readonly['standarsampai_'] = $sCheckRead_standarsampai_;
       }
       if ('display: none;' == $sStyleHidden_standarsampai_)
       {
           $this->nmgp_cmp_hidden['standarsampai_'] = 'off';
       }
       if (isset($sCheckRead_nilai_))
       {
           $this->nmgp_cmp_readonly['nilai_'] = $sCheckRead_nilai_;
       }
       if ('display: none;' == $sStyleHidden_nilai_)
       {
           $this->nmgp_cmp_hidden['nilai_'] = 'off';
       }
       if (isset($sCheckRead_dokter_))
       {
           $this->nmgp_cmp_readonly['dokter_'] = $sCheckRead_dokter_;
       }
       if ('display: none;' == $sStyleHidden_dokter_)
       {
           $this->nmgp_cmp_hidden['dokter_'] = 'off';
       }
       if (isset($sCheckRead_keterangan_))
       {
           $this->nmgp_cmp_readonly['keterangan_'] = $sCheckRead_keterangan_;
       }
       if ('display: none;' == $sStyleHidden_keterangan_)
       {
           $this->nmgp_cmp_hidden['keterangan_'] = 'off';
       }
       if (isset($sCheckRead_tglperiksa_))
       {
           $this->nmgp_cmp_readonly['tglperiksa_'] = $sCheckRead_tglperiksa_;
       }
       if ('display: none;' == $sStyleHidden_tglperiksa_)
       {
           $this->nmgp_cmp_hidden['tglperiksa_'] = 'off';
       }
       if (isset($sCheckRead_id_))
       {
           $this->nmgp_cmp_readonly['id_'] = $sCheckRead_id_;
       }
       if ('display: none;' == $sStyleHidden_id_)
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_tbpemeriksaanrawatjalan = $guarda_form_vert_form_tbpemeriksaanrawatjalan;
   } 
   if ($Table_refresh) 
   { 
       $this->Table_refresh = ob_get_contents();
       ob_end_clean();
   } 
}

function Form_Fim() 
{
   global $sc_seq_vert, $opcao_botoes, $nm_url_saida; 
?>   
</TABLE></div><!-- bloco_f -->
 </div>
<?php
$iContrVert = $this->Embutida_form ? $sc_seq_vert + 1 : $sc_seq_vert + 1;
if ($sc_seq_vert < $this->sc_max_reg)
{
    echo " <script type=\"text/javascript\">";
    echo "    bRefreshTable = true;";
    echo "</script>";
}
?>
<input type="hidden" name="sc_contr_vert" value="<?php echo $this->form_encode_input($iContrVert); ?>">
<?php
    $sEmptyStyle = 0 == $sc_seq_vert ? '' : 'display: none;';
?>
</td></tr>
<tr id="sc-ui-empty-form" style="<?php echo $sEmptyStyle; ?>"><td class="scFormPageText" style="padding: 10px; text-align: center; font-weight: bold">
<?php echo $this->Ini->Nm_lang['lang_errm_empt'];
?>
</td></tr> 
</table> 
</div> 
</td> 
</tr> 
</table> 

<div id="id_debug_window" style="display: none; position: absolute; left: 50px; top: 50px"><table class="scFormMessageTable">
<tr><td class="scFormMessageTitle"><?php echo nmButtonOutput($this->arr_buttons, "berrm_clse", "scAjaxHideDebug()", "scAjaxHideDebug()", "", "", "", "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
&nbsp;&nbsp;Output</td></tr>
<tr><td class="scFormMessageMessage" style="padding: 0px; vertical-align: top"><div style="padding: 2px; height: 200px; width: 350px; overflow: auto" id="id_debug_text"></div></td></tr>
</table></div>
<script>
 var iAjaxNewLine = <?php echo $sc_seq_vert; ?>;
<?php
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['run_modal'])
{
?>
 for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) {
  scJQElementsAdd(iLine);
 }
<?php
}
else
{
?>
 $(function() {
  setTimeout(function() { for (var iLine = 1; iLine <= iAjaxNewLine; iLine++) { scJQElementsAdd(iLine); } }, 250);
 });
<?php
}
?>
</script>
<div id="new_line_dummy" style="display: none">
</div>

</form> 
<script> 
<?php
  $nm_sc_blocos_da_pag = array(0);

  foreach ($this->Ini->nm_hidden_blocos as $bloco => $hidden)
  {
      if ($hidden == "off" && in_array($bloco, $nm_sc_blocos_da_pag))
      {
          echo "document.getElementById('hidden_bloco_" . $bloco . "').style.display = 'none';";
          if (isset($nm_sc_blocos_aba[$bloco]))
          {
               echo "document.getElementById('id_tabs_" . $nm_sc_blocos_aba[$bloco] . "_" . $bloco . "').style.display = 'none';";
          }
      }
  }
?>
</script> 
   </td></tr></table>
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['masterValue']);
?>
}
<?php
    }
}
?>
function updateHeaderFooter(sFldName, sFldValue)
{
  if (sFldValue[0] && sFldValue[0]["value"])
  {
    sFldValue = sFldValue[0]["value"];
  }
}
</script>
<?php
if (isset($_POST['master_nav']) && 'on' == $_POST['master_nav'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbpemeriksaanrawatjalan");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbpemeriksaanrawatjalan");
 parent.scAjaxDetailHeight("form_tbpemeriksaanrawatjalan", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbpemeriksaanrawatjalan", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbpemeriksaanrawatjalan", <?php echo $sTamanhoIframe; ?>);
 }
</script>
<?php
    }
}
?>
<?php
if (isset($this->NM_ajax_info['displayMsg']) && $this->NM_ajax_info['displayMsg'])
{
    $isToast   = isset($this->NM_ajax_info['displayMsgToast']) && $this->NM_ajax_info['displayMsgToast'] ? 'true' : 'false';
    $toastType = $isToast && isset($this->NM_ajax_info['displayMsgToastType']) ? $this->NM_ajax_info['displayMsgToastType'] : '';
?>
<script type="text/javascript">
_scAjaxShowMessage({title: scMsgDefTitle, message: "<?php echo $this->NM_ajax_info['displayMsgTxt']; ?>", isModal: false, timeout: sc_ajaxMsgTime, showButton: false, buttonLabel: "Ok", topPos: 0, leftPos: 0, width: 0, height: 0, redirUrl: "", redirTarget: "", redirParam: "", showClose: false, showBodyIcon: true, isToast: <?php echo $isToast ?>, toastPos: "", type: "<?php echo $toastType ?>"});
</script>
<?php
}
?>
<?php
if ('' != $this->scFormFocusErrorName)
{
?>
<script>
scAjaxFocusError();
</script>
<?php
}
?>
<script type='text/javascript'>
bLigEditLookupCall = <?php if ($this->lig_edit_lookup_call) { ?>true<?php } else { ?>false<?php } ?>;
function scLigEditLookupCall()
{
<?php
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['sc_modal'])
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
if (isset($this->redir_modal) && !empty($this->redir_modal))
{
    echo $this->redir_modal;
}
?>
</script>
<?php
if ($this->nmgp_form_empty) {
?>
<script type="text/javascript">
scAjax_displayEmptyForm();
</script>
<?php
}
?>
<script type="text/javascript">
	function scBtnFn_sys_format_inc() {
		if ($("#sc_b_new_t.sc-unique-btn-1").length && $("#sc_b_new_t.sc-unique-btn-1").is(":visible")) {
			do_ajax_form_tbpemeriksaanrawatjalan_add_new_line(); return false;
			 return;
		}
		if ($("#sc_b_new_t.sc-unique-btn-2").length && $("#sc_b_new_t.sc-unique-btn-2").is(":visible")) {
			nm_move ('novo');
			 return;
		}
		if ($("#sc_b_ins_t.sc-unique-btn-3").length && $("#sc_b_ins_t.sc-unique-btn-3").is(":visible")) {
			nm_atualiza ('incluir');
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-4").length && $("#sc_b_upd_t.sc-unique-btn-4").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_t").length && $("#sc_b_hlp_t").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbpemeriksaanrawatjalan']['buttonStatus'] = $this->nmgp_botoes;
?>
<script type="text/javascript">
   function sc_session_redir(url_redir)
   {
       if (window.parent && window.parent.document != window.document && typeof window.parent.sc_session_redir === 'function')
       {
           window.parent.sc_session_redir(url_redir);
       }
       else
       {
           if (window.opener && typeof window.opener.sc_session_redir === 'function')
           {
               window.close();
               window.opener.sc_session_redir(url_redir);
           }
           else
           {
               window.location = url_redir;
           }
       }
   }
</script>
</body> 
</html> 
<?php 
 } 
} 
?> 
