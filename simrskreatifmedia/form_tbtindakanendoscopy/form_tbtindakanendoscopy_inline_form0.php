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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - Tindakan Endoskopi"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - Tindakan Endoskopi"); } ?></TITLE>
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
.css_read_off_tgltindakan_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
</style>
<?php
}
?>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['embutida_pdf']))
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
 <STYLE>
     .scTabLine li {
         display: inline-block !important;
         text-align: center !important;
         overflow: hidden !important;
         vertical-align:top !important;
         height: auto !important;
         max-width: 100% !important;
     }
 </STYLE>
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbtindakanendoscopy/form_tbtindakanendoscopy_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbtindakanendoscopy_inline_sajax_js.php");
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

 function nm_field_disabled(Fields, Opt) {
  opcao = "<?php if ($GLOBALS["erro_incl"] == 1) {echo "novo";} else {echo $this->nmgp_opcao;} ?>";
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
     if (F_name == "biaya_")
     {
        $('input[name="biaya_"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="biaya_"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="biaya_"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_tbtindakanendoscopy_inline_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  setTimeout(function() {
  scJQElementsAdd('');

  scJQGeneralAdd();

  }, 50);
<?php
if ('' == $this->scFormFocusErrorName)
{
?>
  scFocusField('pelaksana_');

<?php
}
?>
  sc_form_onload();

  $(document).bind('drop dragover', function (e) {
      e.preventDefault();
  });

  var i, iTestWidth, iMaxLabelWidth = 0, $labelList = $(".scUiLabelWidthFix");
  for (i = 0; i < $labelList.length; i++) {
    iTestWidth = $($labelList[i]).width();
    sTestWidth = iTestWidth + "";
    if ("" == iTestWidth) {
      iTestWidth = 0;
    }
    else if ("px" == sTestWidth.substr(sTestWidth.length - 2)) {
      iTestWidth = parseInt(sTestWidth.substr(0, sTestWidth.length - 2));
    }
    iMaxLabelWidth = Math.max(iMaxLabelWidth, iTestWidth);
  }
  if (0 < iMaxLabelWidth) {
    $(".scUiLabelWidthFix").css("width", iMaxLabelWidth + "px");
  }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_tbtindakanendoscopy']['error_buffer']) && '' != $_SESSION['scriptcase']['form_tbtindakanendoscopy']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_tbtindakanendoscopy']['error_buffer'];
}
elseif (!isset($this->NM_ajax_info['param']['buffer_output']) || !$this->NM_ajax_info['param']['buffer_output'])
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
 include_once("form_tbtindakanendoscopy_inline_js0.php");
?>
<script type="text/javascript"> 
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
               action="form_tbtindakanendoscopy_inline.php" 
               target="_self">
<input type="hidden" name="nmgp_url_saida" value="">
<?php
if ('novo' == $this->nmgp_opcao || 'incluir' == $this->nmgp_opcao)
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['insert_validation'] = md5(time() . rand(1, 99999));
?>
<input type="hidden" name="nmgp_ins_valid" value="<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['insert_validation']; ?>">
<?php
}
?>
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
$_SESSION['scriptcase']['error_span_title']['form_tbtindakanendoscopy_inline'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbtindakanendoscopy_inline'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "R")
{
    $NM_btn = false;
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if ($opcao_botoes != "novo") {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterar", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
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
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['run_iframe'] != "R")
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
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['id_']))
   {
       $this->nmgp_cmp_hidden['id_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['jumlah_']))
   {
       $this->nmgp_cmp_hidden['jumlah_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['kelas_']))
   {
       $this->nmgp_cmp_hidden['kelas_'] = 'off';
   }
   if (!isset($this->nmgp_cmp_hidden['pembayaran_']))
   {
       $this->nmgp_cmp_hidden['pembayaran_'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['pelaksana_']))
           {
               $this->nmgp_cmp_readonly['pelaksana_'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['tgltindakan_']))
    {
        $this->nm_new_label['tgltindakan_'] = "Tgl Tindakan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $old_dt_tgltindakan_ = $this->tgltindakan_;
   if (strlen($this->tgltindakan__hora) > 8 ) {$this->tgltindakan__hora = substr($this->tgltindakan__hora, 0, 8);}
   $this->tgltindakan_ .= ' ' . $this->tgltindakan__hora;
   $tgltindakan_ = $this->tgltindakan_;
   $sStyleHidden_tgltindakan_ = '';
   if (isset($this->nmgp_cmp_hidden['tgltindakan_']) && $this->nmgp_cmp_hidden['tgltindakan_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tgltindakan_']);
       $sStyleHidden_tgltindakan_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tgltindakan_ = 'display: none;';
   $sStyleReadInp_tgltindakan_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tgltindakan_']) && $this->nmgp_cmp_readonly['tgltindakan_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tgltindakan_']);
       $sStyleReadLab_tgltindakan_ = '';
       $sStyleReadInp_tgltindakan_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tgltindakan_']) && $this->nmgp_cmp_hidden['tgltindakan_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tgltindakan_" value="<?php echo $this->form_encode_input($tgltindakan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tgltindakan__label" id="hidden_field_label_tgltindakan_" style="<?php echo $sStyleHidden_tgltindakan_; ?>"><span id="id_label_tgltindakan_"><?php echo $this->nm_new_label['tgltindakan_']; ?></span></TD>
    <TD class="scFormDataOdd css_tgltindakan__line" id="hidden_field_data_tgltindakan_" style="<?php echo $sStyleHidden_tgltindakan_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tgltindakan__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tgltindakan_"]) &&  $this->nmgp_cmp_readonly["tgltindakan_"] == "on") { 

 ?>
<input type="hidden" name="tgltindakan_" value="<?php echo $this->form_encode_input($tgltindakan_) . "\">" . $tgltindakan_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_tgltindakan_" class="sc-ui-readonly-tgltindakan_ css_tgltindakan__line" style="<?php echo $sStyleReadLab_tgltindakan_; ?>"><?php echo $tgltindakan_; ?></span><span id="id_read_off_tgltindakan_" class="css_read_off_tgltindakan_" style="white-space: nowrap;<?php echo $sStyleReadInp_tgltindakan_; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_tgltindakan__obj" style="" id="id_sc_field_tgltindakan_" type=text name="tgltindakan_" value="<?php echo $this->form_encode_input($tgltindakan_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['tgltindakan_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tgltindakan_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['tgltindakan_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['tgltindakan_']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tgltindakan__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tgltindakan__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>
<?php
   $this->tgltindakan_ = $old_dt_tgltindakan_;
?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['tindakan_']))
           {
               $this->nmgp_cmp_readonly['tindakan_'] = 'on';
           }
?>


   <?php
   if (!isset($this->nm_new_label['pelaksana_']))
   {
       $this->nm_new_label['pelaksana_'] = "Pelaksana";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pelaksana_ = $this->pelaksana_;
   $sStyleHidden_pelaksana_ = '';
   if (isset($this->nmgp_cmp_hidden['pelaksana_']) && $this->nmgp_cmp_hidden['pelaksana_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pelaksana_']);
       $sStyleHidden_pelaksana_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pelaksana_ = 'display: none;';
   $sStyleReadInp_pelaksana_ = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["pelaksana_"]) &&  $this->nmgp_cmp_readonly["pelaksana_"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pelaksana_']);
       $sStyleReadLab_pelaksana_ = '';
       $sStyleReadInp_pelaksana_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pelaksana_']) && $this->nmgp_cmp_hidden['pelaksana_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pelaksana_" value="<?php echo $this->form_encode_input($this->pelaksana_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pelaksana__label" id="hidden_field_label_pelaksana_" style="<?php echo $sStyleHidden_pelaksana_; ?>"><span id="id_label_pelaksana_"><?php echo $this->nm_new_label['pelaksana_']; ?></span></TD>
    <TD class="scFormDataOdd css_pelaksana__line" id="hidden_field_data_pelaksana_" style="<?php echo $sStyleHidden_pelaksana_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pelaksana__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["pelaksana_"]) &&  $this->nmgp_cmp_readonly["pelaksana_"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pelaksana_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pelaksana_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pelaksana_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pelaksana_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pelaksana_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pelaksana_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pelaksana_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pelaksana_'] = array(); 
    }

   $old_value_tgltindakan_ = $this->tgltindakan_;
   $old_value_tgltindakan__hora = $this->tgltindakan__hora;
   $old_value_biaya_ = $this->biaya_;
   $old_value_diskon_ = $this->diskon_;
   $old_value_jumlah_ = $this->jumlah_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tgltindakan_ = $this->tgltindakan_;
   $unformatted_value_tgltindakan__hora = $this->tgltindakan__hora;
   $unformatted_value_biaya_ = $this->biaya_;
   $unformatted_value_diskon_ = $this->diskon_;
   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_id_ = $this->id_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor  ORDER BY ID asc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar,' ', name,', ', spec)  FROM tbdoctor  ORDER BY ID asc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&' '&name&', '&spec  FROM tbdoctor  ORDER BY ID asc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor  ORDER BY ID asc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor  ORDER BY ID asc";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor  ORDER BY ID asc";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor  ORDER BY ID asc";
   }

   $this->tgltindakan_ = $old_value_tgltindakan_;
   $this->tgltindakan__hora = $old_value_tgltindakan__hora;
   $this->biaya_ = $old_value_biaya_;
   $this->diskon_ = $old_value_diskon_;
   $this->jumlah_ = $old_value_jumlah_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pelaksana_'][] = $rs->fields[0];
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
   $pelaksana__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pelaksana__1))
          {
              foreach ($this->pelaksana__1 as $tmp_pelaksana_)
              {
                  if (trim($tmp_pelaksana_) === trim($cadaselect[1])) { $pelaksana__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pelaksana_) === trim($cadaselect[1])) { $pelaksana__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="pelaksana_" value="<?php echo $this->form_encode_input($pelaksana_) . "\"><span id=\"id_ajax_label_pelaksana_\">" . $pelaksana__look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_pelaksana_();
   $x = 0 ; 
   $pelaksana__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pelaksana__1))
          {
              foreach ($this->pelaksana__1 as $tmp_pelaksana_)
              {
                  if (trim($tmp_pelaksana_) === trim($cadaselect[1])) { $pelaksana__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pelaksana_) === trim($cadaselect[1])) { $pelaksana__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($pelaksana__look))
          {
              $pelaksana__look = $this->pelaksana_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_pelaksana_\" class=\"css_pelaksana__line\" style=\"" .  $sStyleReadLab_pelaksana_ . "\">" . $this->form_encode_input($pelaksana__look) . "</span><span id=\"id_read_off_pelaksana_\" class=\"css_read_off_pelaksana_\" style=\"white-space: nowrap; " . $sStyleReadInp_pelaksana_ . "\">";
   echo " <span id=\"idAjaxSelect_pelaksana_\"><select class=\"sc-js-input scFormObjectOdd css_pelaksana__obj\" style=\"\" id=\"id_sc_field_pelaksana_\" name=\"pelaksana_\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pelaksana_'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->pelaksana_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->pelaksana_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pelaksana__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pelaksana__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tindakan_']))
   {
       $this->nm_new_label['tindakan_'] = "Tindakan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tindakan_ = $this->tindakan_;
   $sStyleHidden_tindakan_ = '';
   if (isset($this->nmgp_cmp_hidden['tindakan_']) && $this->nmgp_cmp_hidden['tindakan_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tindakan_']);
       $sStyleHidden_tindakan_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tindakan_ = 'display: none;';
   $sStyleReadInp_tindakan_ = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["tindakan_"]) &&  $this->nmgp_cmp_readonly["tindakan_"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tindakan_']);
       $sStyleReadLab_tindakan_ = '';
       $sStyleReadInp_tindakan_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tindakan_']) && $this->nmgp_cmp_hidden['tindakan_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tindakan_" value="<?php echo $this->form_encode_input($this->tindakan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_tindakan__label" id="hidden_field_label_tindakan_" style="<?php echo $sStyleHidden_tindakan_; ?>"><span id="id_label_tindakan_"><?php echo $this->nm_new_label['tindakan_']; ?></span></TD>
    <TD class="scFormDataOdd css_tindakan__line" id="hidden_field_data_tindakan_" style="<?php echo $sStyleHidden_tindakan_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_tindakan__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["tindakan_"]) &&  $this->nmgp_cmp_readonly["tindakan_"] == "on")) { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_tindakan_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_tindakan_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_tindakan_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_tindakan_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_tindakan_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_tindakan_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_tindakan_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_tindakan_'] = array(); 
    }

   $old_value_tgltindakan_ = $this->tgltindakan_;
   $old_value_tgltindakan__hora = $this->tgltindakan__hora;
   $old_value_biaya_ = $this->biaya_;
   $old_value_diskon_ = $this->diskon_;
   $old_value_jumlah_ = $this->jumlah_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tgltindakan_ = $this->tgltindakan_;
   $unformatted_value_tgltindakan__hora = $this->tgltindakan__hora;
   $unformatted_value_biaya_ = $this->biaya_;
   $unformatted_value_diskon_ = $this->diskon_;
   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT 	a.namaTindakan, 	a.namaTindakan  FROM 	tbtindakan a 	LEFT JOIN tbpoli b ON b.NAME = a.jenisTindakan 	LEFT JOIN tbdoctor c ON c.poli = b.polyCode WHERE 	c.docCode = '$this->pelaksana_' 	AND a.kategori = 'RI'";

   $this->tgltindakan_ = $old_value_tgltindakan_;
   $this->tgltindakan__hora = $old_value_tgltindakan__hora;
   $this->biaya_ = $old_value_biaya_;
   $this->diskon_ = $old_value_diskon_;
   $this->jumlah_ = $old_value_jumlah_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_tindakan_'][] = $rs->fields[0];
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
   $tindakan__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tindakan__1))
          {
              foreach ($this->tindakan__1 as $tmp_tindakan_)
              {
                  if (trim($tmp_tindakan_) === trim($cadaselect[1])) { $tindakan__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tindakan_) === trim($cadaselect[1])) { $tindakan__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="tindakan_" value="<?php echo $this->form_encode_input($tindakan_) . "\"><span id=\"id_ajax_label_tindakan_\">" . $tindakan__look . "</span>"; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_tindakan_();
   $x = 0 ; 
   $tindakan__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->tindakan__1))
          {
              foreach ($this->tindakan__1 as $tmp_tindakan_)
              {
                  if (trim($tmp_tindakan_) === trim($cadaselect[1])) { $tindakan__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->tindakan_) === trim($cadaselect[1])) { $tindakan__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($tindakan__look))
          {
              $tindakan__look = $this->tindakan_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_tindakan_\" class=\"css_tindakan__line\" style=\"" .  $sStyleReadLab_tindakan_ . "\">" . $this->form_encode_input($tindakan__look) . "</span><span id=\"id_read_off_tindakan_\" class=\"css_read_off_tindakan_\" style=\"white-space: nowrap; " . $sStyleReadInp_tindakan_ . "\">";
   echo " <span id=\"idAjaxSelect_tindakan_\"><select class=\"sc-js-input scFormObjectOdd css_tindakan__obj\" style=\"\" id=\"id_sc_field_tindakan_\" name=\"tindakan_\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->tindakan_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->tindakan_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_tindakan__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_tindakan__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['biaya_']))
    {
        $this->nm_new_label['biaya_'] = "Biaya";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $biaya_ = $this->biaya_;
   $sStyleHidden_biaya_ = '';
   if (isset($this->nmgp_cmp_hidden['biaya_']) && $this->nmgp_cmp_hidden['biaya_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['biaya_']);
       $sStyleHidden_biaya_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_biaya_ = 'display: none;';
   $sStyleReadInp_biaya_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['biaya_']) && $this->nmgp_cmp_readonly['biaya_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['biaya_']);
       $sStyleReadLab_biaya_ = '';
       $sStyleReadInp_biaya_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['biaya_']) && $this->nmgp_cmp_hidden['biaya_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="biaya_" value="<?php echo $this->form_encode_input($biaya_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_biaya__label" id="hidden_field_label_biaya_" style="<?php echo $sStyleHidden_biaya_; ?>"><span id="id_label_biaya_"><?php echo $this->nm_new_label['biaya_']; ?></span></TD>
    <TD class="scFormDataOdd css_biaya__line" id="hidden_field_data_biaya_" style="<?php echo $sStyleHidden_biaya_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOdd css_biaya__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["biaya_"]) &&  $this->nmgp_cmp_readonly["biaya_"] == "on") { 

 ?>
<input type="hidden" name="biaya_" value="<?php echo $this->form_encode_input($biaya_) . "\">" . $biaya_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_biaya_" class="sc-ui-readonly-biaya_ css_biaya__line" style="<?php echo $sStyleReadLab_biaya_; ?>"><?php echo $this->biaya_; ?></span><span id="id_read_off_biaya_" class="css_read_off_biaya_" style="white-space: nowrap;<?php echo $sStyleReadInp_biaya_; ?>">
 <input class="sc-js-input scFormObjectOdd css_biaya__obj" style="" id="id_sc_field_biaya_" type=text name="biaya_" value="<?php echo $this->form_encode_input($biaya_) ?>"
 size=8 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['biaya_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['biaya_']['format_pos'] || 3 == $this->field_config['biaya_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 8, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['biaya_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['biaya_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['biaya_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['biaya_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_biaya__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_biaya__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diskon_']))
    {
        $this->nm_new_label['diskon_'] = "Diskon";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diskon_ = $this->diskon_;
   $sStyleHidden_diskon_ = '';
   if (isset($this->nmgp_cmp_hidden['diskon_']) && $this->nmgp_cmp_hidden['diskon_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diskon_']);
       $sStyleHidden_diskon_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diskon_ = 'display: none;';
   $sStyleReadInp_diskon_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diskon_']) && $this->nmgp_cmp_readonly['diskon_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diskon_']);
       $sStyleReadLab_diskon_ = '';
       $sStyleReadInp_diskon_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diskon_']) && $this->nmgp_cmp_hidden['diskon_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diskon_" value="<?php echo $this->form_encode_input($diskon_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_diskon__label" id="hidden_field_label_diskon_" style="<?php echo $sStyleHidden_diskon_; ?>"><span id="id_label_diskon_"><?php echo $this->nm_new_label['diskon_']; ?></span></TD>
    <TD class="scFormDataOdd css_diskon__line" id="hidden_field_data_diskon_" style="<?php echo $sStyleHidden_diskon_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_diskon__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diskon_"]) &&  $this->nmgp_cmp_readonly["diskon_"] == "on") { 

 ?>
<input type="hidden" name="diskon_" value="<?php echo $this->form_encode_input($diskon_) . "\">" . $diskon_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_diskon_" class="sc-ui-readonly-diskon_ css_diskon__line" style="<?php echo $sStyleReadLab_diskon_; ?>"><?php echo $this->diskon_; ?></span><span id="id_read_off_diskon_" class="css_read_off_diskon_" style="white-space: nowrap;<?php echo $sStyleReadInp_diskon_; ?>">
 <input class="sc-js-input scFormObjectOdd css_diskon__obj" style="" id="id_sc_field_diskon_" type=text name="diskon_" value="<?php echo $this->form_encode_input($diskon_) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['diskon_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['diskon_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['diskon_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_diskon__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_diskon__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['kelas_']))
   {
       $this->nm_new_label['kelas_'] = "kelas";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $kelas_ = $this->kelas_;
   if (!isset($this->nmgp_cmp_hidden['kelas_']))
   {
       $this->nmgp_cmp_hidden['kelas_'] = 'off';
   }
   $sStyleHidden_kelas_ = '';
   if (isset($this->nmgp_cmp_hidden['kelas_']) && $this->nmgp_cmp_hidden['kelas_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['kelas_']);
       $sStyleHidden_kelas_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_kelas_ = 'display: none;';
   $sStyleReadInp_kelas_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['kelas_']) && $this->nmgp_cmp_readonly['kelas_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['kelas_']);
       $sStyleReadLab_kelas_ = '';
       $sStyleReadInp_kelas_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['kelas_']) && $this->nmgp_cmp_hidden['kelas_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="kelas_" value="<?php echo $this->form_encode_input($this->kelas_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_kelas__label" id="hidden_field_label_kelas_" style="<?php echo $sStyleHidden_kelas_; ?>"><span id="id_label_kelas_"><?php echo $this->nm_new_label['kelas_']; ?></span></TD>
    <TD class="scFormDataOdd css_kelas__line" id="hidden_field_data_kelas_" style="<?php echo $sStyleHidden_kelas_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_kelas__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kelas_"]) &&  $this->nmgp_cmp_readonly["kelas_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_kelas_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_kelas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_kelas_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_kelas_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_kelas_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_kelas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_kelas_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_kelas_'] = array(); 
    }

   $old_value_tgltindakan_ = $this->tgltindakan_;
   $old_value_tgltindakan__hora = $this->tgltindakan__hora;
   $old_value_biaya_ = $this->biaya_;
   $old_value_diskon_ = $this->diskon_;
   $old_value_jumlah_ = $this->jumlah_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tgltindakan_ = $this->tgltindakan_;
   $unformatted_value_tgltindakan__hora = $this->tgltindakan__hora;
   $unformatted_value_biaya_ = $this->biaya_;
   $unformatted_value_diskon_ = $this->diskon_;
   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT kelas  FROM tbadmrawatinap where tranCode = '$this->trancode_' ORDER BY kelas";

   $this->tgltindakan_ = $old_value_tgltindakan_;
   $this->tgltindakan__hora = $old_value_tgltindakan__hora;
   $this->biaya_ = $old_value_biaya_;
   $this->diskon_ = $old_value_diskon_;
   $this->jumlah_ = $old_value_jumlah_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_kelas_'][] = $rs->fields[0];
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
   $x = 0; 
   $kelas__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->kelas__1))
          {
              foreach ($this->kelas__1 as $tmp_kelas_)
              {
                  if (trim($tmp_kelas_) === trim($cadaselect[1])) { $kelas__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->kelas_) === trim($cadaselect[1])) { $kelas__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="kelas_" value="<?php echo $this->form_encode_input($kelas_) . "\">" . $kelas__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_kelas_();
   $x = 0 ; 
   $kelas__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->kelas__1))
          {
              foreach ($this->kelas__1 as $tmp_kelas_)
              {
                  if (trim($tmp_kelas_) === trim($cadaselect[1])) { $kelas__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->kelas_) === trim($cadaselect[1])) { $kelas__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($kelas__look))
          {
              $kelas__look = $this->kelas_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_kelas_\" class=\"css_kelas__line\" style=\"" .  $sStyleReadLab_kelas_ . "\">" . $this->form_encode_input($kelas__look) . "</span><span id=\"id_read_off_kelas_\" class=\"css_read_off_kelas_\" style=\"white-space: nowrap; " . $sStyleReadInp_kelas_ . "\">";
   echo " <span id=\"idAjaxSelect_kelas_\"><select class=\"sc-js-input scFormObjectOdd css_kelas__obj\" style=\"\" id=\"id_sc_field_kelas_\" name=\"kelas_\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->kelas_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->kelas_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kelas__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kelas__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['pembayaran_']))
   {
       $this->nm_new_label['pembayaran_'] = "pembayaran";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $pembayaran_ = $this->pembayaran_;
   if (!isset($this->nmgp_cmp_hidden['pembayaran_']))
   {
       $this->nmgp_cmp_hidden['pembayaran_'] = 'off';
   }
   $sStyleHidden_pembayaran_ = '';
   if (isset($this->nmgp_cmp_hidden['pembayaran_']) && $this->nmgp_cmp_hidden['pembayaran_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['pembayaran_']);
       $sStyleHidden_pembayaran_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_pembayaran_ = 'display: none;';
   $sStyleReadInp_pembayaran_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['pembayaran_']) && $this->nmgp_cmp_readonly['pembayaran_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['pembayaran_']);
       $sStyleReadLab_pembayaran_ = '';
       $sStyleReadInp_pembayaran_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['pembayaran_']) && $this->nmgp_cmp_hidden['pembayaran_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="pembayaran_" value="<?php echo $this->form_encode_input($this->pembayaran_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_pembayaran__label" id="hidden_field_label_pembayaran_" style="<?php echo $sStyleHidden_pembayaran_; ?>"><span id="id_label_pembayaran_"><?php echo $this->nm_new_label['pembayaran_']; ?></span></TD>
    <TD class="scFormDataOdd css_pembayaran__line" id="hidden_field_data_pembayaran_" style="<?php echo $sStyleHidden_pembayaran_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_pembayaran__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["pembayaran_"]) &&  $this->nmgp_cmp_readonly["pembayaran_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pembayaran_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pembayaran_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pembayaran_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pembayaran_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pembayaran_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pembayaran_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pembayaran_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pembayaran_'] = array(); 
    }

   $old_value_tgltindakan_ = $this->tgltindakan_;
   $old_value_tgltindakan__hora = $this->tgltindakan__hora;
   $old_value_biaya_ = $this->biaya_;
   $old_value_diskon_ = $this->diskon_;
   $old_value_jumlah_ = $this->jumlah_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tgltindakan_ = $this->tgltindakan_;
   $unformatted_value_tgltindakan__hora = $this->tgltindakan__hora;
   $unformatted_value_biaya_ = $this->biaya_;
   $unformatted_value_diskon_ = $this->diskon_;
   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT pembayaran FROM tbadmrawatinap where tranCode = '$this->trancode_' ORDER BY pembayaran";

   $this->tgltindakan_ = $old_value_tgltindakan_;
   $this->tgltindakan__hora = $old_value_tgltindakan__hora;
   $this->biaya_ = $old_value_biaya_;
   $this->diskon_ = $old_value_diskon_;
   $this->jumlah_ = $old_value_jumlah_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['Lookup_pembayaran_'][] = $rs->fields[0];
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
   $x = 0; 
   $pembayaran__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pembayaran__1))
          {
              foreach ($this->pembayaran__1 as $tmp_pembayaran_)
              {
                  if (trim($tmp_pembayaran_) === trim($cadaselect[1])) { $pembayaran__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pembayaran_) === trim($cadaselect[1])) { $pembayaran__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="pembayaran_" value="<?php echo $this->form_encode_input($pembayaran_) . "\">" . $pembayaran__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_pembayaran_();
   $x = 0 ; 
   $pembayaran__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->pembayaran__1))
          {
              foreach ($this->pembayaran__1 as $tmp_pembayaran_)
              {
                  if (trim($tmp_pembayaran_) === trim($cadaselect[1])) { $pembayaran__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->pembayaran_) === trim($cadaselect[1])) { $pembayaran__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($pembayaran__look))
          {
              $pembayaran__look = $this->pembayaran_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_pembayaran_\" class=\"css_pembayaran__line\" style=\"" .  $sStyleReadLab_pembayaran_ . "\">" . $this->form_encode_input($pembayaran__look) . "</span><span id=\"id_read_off_pembayaran_\" class=\"css_read_off_pembayaran_\" style=\"white-space: nowrap; " . $sStyleReadInp_pembayaran_ . "\">";
   echo " <span id=\"idAjaxSelect_pembayaran_\"><select class=\"sc-js-input scFormObjectOdd css_pembayaran__obj\" style=\"\" id=\"id_sc_field_pembayaran_\" name=\"pembayaran_\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->pembayaran_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->pembayaran_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_pembayaran__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_pembayaran__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>
<?php
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
?>


   <?php
    if (!isset($this->nm_new_label['jumlah_']))
    {
        $this->nm_new_label['jumlah_'] = "Jumlah";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jumlah_ = $this->jumlah_;
   if (!isset($this->nmgp_cmp_hidden['jumlah_']))
   {
       $this->nmgp_cmp_hidden['jumlah_'] = 'off';
   }
   $sStyleHidden_jumlah_ = '';
   if (isset($this->nmgp_cmp_hidden['jumlah_']) && $this->nmgp_cmp_hidden['jumlah_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jumlah_']);
       $sStyleHidden_jumlah_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jumlah_ = 'display: none;';
   $sStyleReadInp_jumlah_ = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jumlah_']) && $this->nmgp_cmp_readonly['jumlah_'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jumlah_']);
       $sStyleReadLab_jumlah_ = '';
       $sStyleReadInp_jumlah_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jumlah_']) && $this->nmgp_cmp_hidden['jumlah_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jumlah_" value="<?php echo $this->form_encode_input($jumlah_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_jumlah__label" id="hidden_field_label_jumlah_" style="<?php echo $sStyleHidden_jumlah_; ?>"><span id="id_label_jumlah_"><?php echo $this->nm_new_label['jumlah_']; ?></span></TD>
    <TD class="scFormDataOdd css_jumlah__line" id="hidden_field_data_jumlah_" style="<?php echo $sStyleHidden_jumlah_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_jumlah__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jumlah_"]) &&  $this->nmgp_cmp_readonly["jumlah_"] == "on") { 

 ?>
<input type="hidden" name="jumlah_" value="<?php echo $this->form_encode_input($jumlah_) . "\">" . $jumlah_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_jumlah_" class="sc-ui-readonly-jumlah_ css_jumlah__line" style="<?php echo $sStyleReadLab_jumlah_; ?>"><?php echo $this->jumlah_; ?></span><span id="id_read_off_jumlah_" class="css_read_off_jumlah_" style="white-space: nowrap;<?php echo $sStyleReadInp_jumlah_; ?>">
 <input class="sc-js-input scFormObjectOdd css_jumlah__obj" style="" id="id_sc_field_jumlah_" type=text name="jumlah_" value="<?php echo $this->form_encode_input($jumlah_) ?>"
 size=2 alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['jumlah_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['jumlah_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['jumlah_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jumlah__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jumlah__text"></span></td></tr></table></td></tr></table></TD>
   <?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['id_']))
    {
        $this->nm_new_label['id_'] = "Id";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $id_ = $this->id_;
   if (!isset($this->nmgp_cmp_hidden['id_']))
   {
       $this->nmgp_cmp_hidden['id_'] = 'off';
   }
   $sStyleHidden_id_ = '';
   if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['id_']);
       $sStyleHidden_id_ = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_id_ = 'display: none;';
   $sStyleReadInp_id_ = '';
   if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["id_"]) &&  $this->nmgp_cmp_readonly["id_"] == "on"))
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['id_']);
       $sStyleReadLab_id_ = '';
       $sStyleReadInp_id_ = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['id_']) && $this->nmgp_cmp_hidden['id_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="id_" value="<?php echo $this->form_encode_input($id_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php if ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir")) { ?>

    <TD class="scFormLabelOdd scUiLabelWidthFix css_id__label" id="hidden_field_label_id_" style="<?php echo $sStyleHidden_id_; ?>"><span id="id_label_id_"><?php echo $this->nm_new_label['id_']; ?></span></TD>
    <TD class="scFormDataOdd css_id__line" id="hidden_field_data_id_" style="<?php echo $sStyleHidden_id_; ?>"><table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOdd css_id__line" style="vertical-align: top;padding: 0px"><span id="id_read_on_id_" class="css_id__line" style="<?php echo $sStyleReadLab_id_; ?>"><?php echo $this->form_encode_input($this->id_); ?></span><span id="id_read_off_id_" class="css_read_off_id_" style="<?php echo $sStyleReadInp_id_; ?>"><input type="hidden" name="id_" value="<?php echo $this->form_encode_input($id_) . "\">"?><span id="id_ajax_label_id_"><?php echo nl2br($id_); ?></span>
</span></span></td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_id__frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_id__text"></span></td></tr></table></td></tr></table></TD>
   <?php }
      else
      {
         $sc_hidden_no--;
      }
?>
<?php }?>

<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 2; ?>" >&nbsp;</TD>
<?php } 
?> 


   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
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
<script>
<?php
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbtindakanendoscopy_inline");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbtindakanendoscopy_inline");
 parent.scAjaxDetailHeight("form_tbtindakanendoscopy_inline", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbtindakanendoscopy_inline", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbtindakanendoscopy_inline", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['sc_modal'])
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
			do_ajax_form_tbtindakanendoscopy_add_new_line(); return false;
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
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
			 return;
		}
	}
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-5").length && $("#sc_b_upd_t.sc-unique-btn-5").is(":visible")) {
			nm_atualiza ('alterar');
			 return;
		}
		if ($("#sc_b_upd_t.sc-unique-btn-11").length && $("#sc_b_upd_t.sc-unique-btn-11").is(":visible")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-6").length && $("#sc_b_sai_t.sc-unique-btn-6").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-7").length && $("#sc_b_sai_t.sc-unique-btn-7").is(":visible")) {
			document.F5.action='<?php echo $nm_url_saida; ?>'; document.F5.submit();
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-8").length && $("#sc_b_sai_t.sc-unique-btn-8").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-9").length && $("#sc_b_sai_t.sc-unique-btn-9").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-10").length && $("#sc_b_sai_t.sc-unique-btn-10").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-12").length && $("#sc_b_sai_t.sc-unique-btn-12").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-13").length && $("#sc_b_sai_t.sc-unique-btn-13").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-14").length && $("#sc_b_sai_t.sc-unique-btn-14").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtindakanendoscopy_inline']['buttonStatus'] = $this->nmgp_botoes;
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
