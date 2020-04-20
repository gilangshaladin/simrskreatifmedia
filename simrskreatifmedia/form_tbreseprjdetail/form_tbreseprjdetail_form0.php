<?php
class form_tbreseprjdetail_form extends form_tbreseprjdetail_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - tbreseprawatjalan"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tbreseprawatjalan"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['sc_redir_atualiz'] == 'ok')
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
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['embutida_pdf']))
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
<?php
   include_once("../_lib/css/" . $this->Ini->str_schema_all . "_tab.php");
 }
?>
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbreseprjdetail/form_tbreseprjdetail_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbreseprjdetail_sajax_js.php");
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
<?php

include_once('form_tbreseprjdetail_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

  addAutocomplete(this);

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

 function addAutocomplete(elem) {

  var iSeq_item_ = $(".sc-ui-autocomp-item_", elem).attr("id").substr(11);

  $(".sc-ui-autocomp-item_", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "item_" != sId ? sId.substr(5) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     do_ajax_form_tbreseprjdetail_refresh_item_(sRow);
     if ('function' == typeof do_ajax_form_tbreseprjdetail_event_item__onchange) { do_ajax_form_tbreseprjdetail_event_item__onchange(sRow); }
    }
   }
   scEventControl_data[sId]["autocomp"] = false;
  }).on("keydown", function(e) {
   if(e.keyCode == $.ui.keyCode.TAB && $(".ui-autocomplete").filter(":visible").length) {
    e.keyCode = $.ui.keyCode.DOWN;
    $(this).trigger(e);
    e.keyCode = $.ui.keyCode.ENTER;
    $(this).trigger(e);
   }
  }).autocomplete({
   minLength: 1,
   source: function (request, response) {
    $.ajax({
     url: "form_tbreseprjdetail.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_item_",
      script_case_init: document.F2.script_case_init.value
     },
     success: function (data) {
      if (data == "ss_time_out") {
          nm_move('novo');
      }
      response(data);
     }
    });
   },
   change: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'item_' != sId ? sId.substr(5) : '';
    if ("" == $(this).val()) {
     do_ajax_form_tbreseprjdetail_event_item__onchange(sRow);
    }
   },
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'item_' != sId ? sId.substr(5) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'item_' != sId ? sId.substr(5) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    do_ajax_form_tbreseprjdetail_event_item__onchange(sRow);
    do_ajax_form_tbreseprjdetail_refresh_item_(sRow);
    nm_check_insert(sRow);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_item_", elem).on("focus", function() {
    $("#id_sc_field_item_").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_item_").trigger("blur");
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_tbreseprjdetail_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_tbreseprjdetail'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbreseprjdetail'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . " - tbreseprawatjalan"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_titl'] . " - tbreseprawatjalan"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "R")
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
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['empty_filter'] = true;
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
   <?php if (isset($this->nmgp_cmp_hidden['item_']) && $this->nmgp_cmp_hidden['item_'] == 'off') { $sStyleHidden_item_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['item_']) || $this->nmgp_cmp_hidden['item_'] == 'on') {
      if (!isset($this->nm_new_label['item_'])) {
          $this->nm_new_label['item_'] = "Item"; } ?>

    <TD class="scFormLabelOddMult css_item__label" id="hidden_field_label_item_" style="<?php echo $sStyleHidden_item_; ?>" > <?php echo $this->nm_new_label['item_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['satuan_']) && $this->nmgp_cmp_hidden['satuan_'] == 'off') { $sStyleHidden_satuan_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['satuan_']) || $this->nmgp_cmp_hidden['satuan_'] == 'on') {
      if (!isset($this->nm_new_label['satuan_'])) {
          $this->nm_new_label['satuan_'] = "Satuan"; } ?>

    <TD class="scFormLabelOddMult css_satuan__label" id="hidden_field_label_satuan_" style="<?php echo $sStyleHidden_satuan_; ?>" > <?php echo $this->nm_new_label['satuan_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['jumlah_']) && $this->nmgp_cmp_hidden['jumlah_'] == 'off') { $sStyleHidden_jumlah_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['jumlah_']) || $this->nmgp_cmp_hidden['jumlah_'] == 'on') {
      if (!isset($this->nm_new_label['jumlah_'])) {
          $this->nm_new_label['jumlah_'] = "Jumlah"; } ?>

    <TD class="scFormLabelOddMult css_jumlah__label" id="hidden_field_label_jumlah_" style="<?php echo $sStyleHidden_jumlah_; ?>" > <?php echo $this->nm_new_label['jumlah_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['aturanpakai1_']) && $this->nmgp_cmp_hidden['aturanpakai1_'] == 'off') { $sStyleHidden_aturanpakai1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['aturanpakai1_']) || $this->nmgp_cmp_hidden['aturanpakai1_'] == 'on') {
      if (!isset($this->nm_new_label['aturanpakai1_'])) {
          $this->nm_new_label['aturanpakai1_'] = "Signa (kali)"; } ?>

    <TD class="scFormLabelOddMult css_aturanpakai1__label" id="hidden_field_label_aturanpakai1_" style="<?php echo $sStyleHidden_aturanpakai1_; ?>" > <?php echo $this->nm_new_label['aturanpakai1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['aturanpakai2_']) && $this->nmgp_cmp_hidden['aturanpakai2_'] == 'off') { $sStyleHidden_aturanpakai2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['aturanpakai2_']) || $this->nmgp_cmp_hidden['aturanpakai2_'] == 'on') {
      if (!isset($this->nm_new_label['aturanpakai2_'])) {
          $this->nm_new_label['aturanpakai2_'] = "Signa (hari)"; } ?>

    <TD class="scFormLabelOddMult css_aturanpakai2__label" id="hidden_field_label_aturanpakai2_" style="<?php echo $sStyleHidden_aturanpakai2_; ?>" > <?php echo $this->nm_new_label['aturanpakai2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['stok_']) && $this->nmgp_cmp_hidden['stok_'] == 'off') { $sStyleHidden_stok_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['stok_']) || $this->nmgp_cmp_hidden['stok_'] == 'on') {
      if (!isset($this->nm_new_label['stok_'])) {
          $this->nm_new_label['stok_'] = "Stok"; } ?>

    <TD class="scFormLabelOddMult css_stok__label" id="hidden_field_label_stok_" style="<?php echo $sStyleHidden_stok_; ?>" > <?php echo $this->nm_new_label['stok_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['biaya_']) && $this->nmgp_cmp_hidden['biaya_'] == 'off') { $sStyleHidden_biaya_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['biaya_']) || $this->nmgp_cmp_hidden['biaya_'] == 'on') {
      if (!isset($this->nm_new_label['biaya_'])) {
          $this->nm_new_label['biaya_'] = "Biaya"; } ?>

    <TD class="scFormLabelOddMult css_biaya__label" id="hidden_field_label_biaya_" style="<?php echo $sStyleHidden_biaya_; ?>" > <?php echo $this->nm_new_label['biaya_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['hargajual_']) && $this->nmgp_cmp_hidden['hargajual_'] == 'off') { $sStyleHidden_hargajual_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['hargajual_']) || $this->nmgp_cmp_hidden['hargajual_'] == 'on') {
      if (!isset($this->nm_new_label['hargajual_'])) {
          $this->nm_new_label['hargajual_'] = "hargaJual"; } ?>

    <TD class="scFormLabelOddMult css_hargajual__label" id="hidden_field_label_hargajual_" style="<?php echo $sStyleHidden_hargajual_; ?>" > <?php echo $this->nm_new_label['hargajual_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_tbreseprjdetail);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_tbreseprjdetail = $this->form_vert_form_tbreseprjdetail;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_tbreseprjdetail))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
   foreach ($this->form_vert_form_tbreseprjdetail as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->trancode_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['trancode_'];
       $this->jenisaturanpakai_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['jenisaturanpakai_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['item_'] = true;
           $this->nmgp_cmp_readonly['satuan_'] = true;
           $this->nmgp_cmp_readonly['jumlah_'] = true;
           $this->nmgp_cmp_readonly['aturanpakai1_'] = true;
           $this->nmgp_cmp_readonly['aturanpakai2_'] = true;
           $this->nmgp_cmp_readonly['stok_'] = true;
           $this->nmgp_cmp_readonly['biaya_'] = true;
           $this->nmgp_cmp_readonly['hargajual_'] = true;
           $this->nmgp_cmp_readonly['id_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['item_']) || $this->nmgp_cmp_readonly['item_'] != "on") {$this->nmgp_cmp_readonly['item_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['satuan_']) || $this->nmgp_cmp_readonly['satuan_'] != "on") {$this->nmgp_cmp_readonly['satuan_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['jumlah_']) || $this->nmgp_cmp_readonly['jumlah_'] != "on") {$this->nmgp_cmp_readonly['jumlah_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['aturanpakai1_']) || $this->nmgp_cmp_readonly['aturanpakai1_'] != "on") {$this->nmgp_cmp_readonly['aturanpakai1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['aturanpakai2_']) || $this->nmgp_cmp_readonly['aturanpakai2_'] != "on") {$this->nmgp_cmp_readonly['aturanpakai2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['stok_']) || $this->nmgp_cmp_readonly['stok_'] != "on") {$this->nmgp_cmp_readonly['stok_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['biaya_']) || $this->nmgp_cmp_readonly['biaya_'] != "on") {$this->nmgp_cmp_readonly['biaya_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['hargajual_']) || $this->nmgp_cmp_readonly['hargajual_'] != "on") {$this->nmgp_cmp_readonly['hargajual_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->item_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['item_']; 
       $item_ = $this->item_; 
       $sStyleHidden_item_ = '';
       if (isset($sCheckRead_item_))
       {
           unset($sCheckRead_item_);
       }
       if (isset($this->nmgp_cmp_readonly['item_']))
       {
           $sCheckRead_item_ = $this->nmgp_cmp_readonly['item_'];
       }
       if (isset($this->nmgp_cmp_hidden['item_']) && $this->nmgp_cmp_hidden['item_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['item_']);
           $sStyleHidden_item_ = 'display: none;';
       }
       $bTestReadOnly_item_ = true;
       $sStyleReadLab_item_ = 'display: none;';
       $sStyleReadInp_item_ = '';
       if (isset($this->nmgp_cmp_readonly['item_']) && $this->nmgp_cmp_readonly['item_'] == 'on')
       {
           $bTestReadOnly_item_ = false;
           unset($this->nmgp_cmp_readonly['item_']);
           $sStyleReadLab_item_ = '';
           $sStyleReadInp_item_ = 'display: none;';
       }
       $this->satuan_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['satuan_']; 
       $satuan_ = $this->satuan_; 
       $sStyleHidden_satuan_ = '';
       if (isset($sCheckRead_satuan_))
       {
           unset($sCheckRead_satuan_);
       }
       if (isset($this->nmgp_cmp_readonly['satuan_']))
       {
           $sCheckRead_satuan_ = $this->nmgp_cmp_readonly['satuan_'];
       }
       if (isset($this->nmgp_cmp_hidden['satuan_']) && $this->nmgp_cmp_hidden['satuan_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['satuan_']);
           $sStyleHidden_satuan_ = 'display: none;';
       }
       $bTestReadOnly_satuan_ = true;
       $sStyleReadLab_satuan_ = 'display: none;';
       $sStyleReadInp_satuan_ = '';
       if (isset($this->nmgp_cmp_readonly['satuan_']) && $this->nmgp_cmp_readonly['satuan_'] == 'on')
       {
           $bTestReadOnly_satuan_ = false;
           unset($this->nmgp_cmp_readonly['satuan_']);
           $sStyleReadLab_satuan_ = '';
           $sStyleReadInp_satuan_ = 'display: none;';
       }
       $this->jumlah_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['jumlah_']; 
       $jumlah_ = $this->jumlah_; 
       $sStyleHidden_jumlah_ = '';
       if (isset($sCheckRead_jumlah_))
       {
           unset($sCheckRead_jumlah_);
       }
       if (isset($this->nmgp_cmp_readonly['jumlah_']))
       {
           $sCheckRead_jumlah_ = $this->nmgp_cmp_readonly['jumlah_'];
       }
       if (isset($this->nmgp_cmp_hidden['jumlah_']) && $this->nmgp_cmp_hidden['jumlah_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['jumlah_']);
           $sStyleHidden_jumlah_ = 'display: none;';
       }
       $bTestReadOnly_jumlah_ = true;
       $sStyleReadLab_jumlah_ = 'display: none;';
       $sStyleReadInp_jumlah_ = '';
       if (isset($this->nmgp_cmp_readonly['jumlah_']) && $this->nmgp_cmp_readonly['jumlah_'] == 'on')
       {
           $bTestReadOnly_jumlah_ = false;
           unset($this->nmgp_cmp_readonly['jumlah_']);
           $sStyleReadLab_jumlah_ = '';
           $sStyleReadInp_jumlah_ = 'display: none;';
       }
       $this->aturanpakai1_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['aturanpakai1_']; 
       $aturanpakai1_ = $this->aturanpakai1_; 
       $sStyleHidden_aturanpakai1_ = '';
       if (isset($sCheckRead_aturanpakai1_))
       {
           unset($sCheckRead_aturanpakai1_);
       }
       if (isset($this->nmgp_cmp_readonly['aturanpakai1_']))
       {
           $sCheckRead_aturanpakai1_ = $this->nmgp_cmp_readonly['aturanpakai1_'];
       }
       if (isset($this->nmgp_cmp_hidden['aturanpakai1_']) && $this->nmgp_cmp_hidden['aturanpakai1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['aturanpakai1_']);
           $sStyleHidden_aturanpakai1_ = 'display: none;';
       }
       $bTestReadOnly_aturanpakai1_ = true;
       $sStyleReadLab_aturanpakai1_ = 'display: none;';
       $sStyleReadInp_aturanpakai1_ = '';
       if (isset($this->nmgp_cmp_readonly['aturanpakai1_']) && $this->nmgp_cmp_readonly['aturanpakai1_'] == 'on')
       {
           $bTestReadOnly_aturanpakai1_ = false;
           unset($this->nmgp_cmp_readonly['aturanpakai1_']);
           $sStyleReadLab_aturanpakai1_ = '';
           $sStyleReadInp_aturanpakai1_ = 'display: none;';
       }
       $this->aturanpakai2_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['aturanpakai2_']; 
       $aturanpakai2_ = $this->aturanpakai2_; 
       $sStyleHidden_aturanpakai2_ = '';
       if (isset($sCheckRead_aturanpakai2_))
       {
           unset($sCheckRead_aturanpakai2_);
       }
       if (isset($this->nmgp_cmp_readonly['aturanpakai2_']))
       {
           $sCheckRead_aturanpakai2_ = $this->nmgp_cmp_readonly['aturanpakai2_'];
       }
       if (isset($this->nmgp_cmp_hidden['aturanpakai2_']) && $this->nmgp_cmp_hidden['aturanpakai2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['aturanpakai2_']);
           $sStyleHidden_aturanpakai2_ = 'display: none;';
       }
       $bTestReadOnly_aturanpakai2_ = true;
       $sStyleReadLab_aturanpakai2_ = 'display: none;';
       $sStyleReadInp_aturanpakai2_ = '';
       if (isset($this->nmgp_cmp_readonly['aturanpakai2_']) && $this->nmgp_cmp_readonly['aturanpakai2_'] == 'on')
       {
           $bTestReadOnly_aturanpakai2_ = false;
           unset($this->nmgp_cmp_readonly['aturanpakai2_']);
           $sStyleReadLab_aturanpakai2_ = '';
           $sStyleReadInp_aturanpakai2_ = 'display: none;';
       }
       $this->stok_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['stok_']; 
       $stok_ = $this->stok_; 
       $sStyleHidden_stok_ = '';
       if (isset($sCheckRead_stok_))
       {
           unset($sCheckRead_stok_);
       }
       if (isset($this->nmgp_cmp_readonly['stok_']))
       {
           $sCheckRead_stok_ = $this->nmgp_cmp_readonly['stok_'];
       }
       if (isset($this->nmgp_cmp_hidden['stok_']) && $this->nmgp_cmp_hidden['stok_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['stok_']);
           $sStyleHidden_stok_ = 'display: none;';
       }
       $bTestReadOnly_stok_ = true;
       $sStyleReadLab_stok_ = 'display: none;';
       $sStyleReadInp_stok_ = '';
       if (isset($this->nmgp_cmp_readonly['stok_']) && $this->nmgp_cmp_readonly['stok_'] == 'on')
       {
           $bTestReadOnly_stok_ = false;
           unset($this->nmgp_cmp_readonly['stok_']);
           $sStyleReadLab_stok_ = '';
           $sStyleReadInp_stok_ = 'display: none;';
       }
       $this->biaya_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['biaya_']; 
       $biaya_ = $this->biaya_; 
       $sStyleHidden_biaya_ = '';
       if (isset($sCheckRead_biaya_))
       {
           unset($sCheckRead_biaya_);
       }
       if (isset($this->nmgp_cmp_readonly['biaya_']))
       {
           $sCheckRead_biaya_ = $this->nmgp_cmp_readonly['biaya_'];
       }
       if (isset($this->nmgp_cmp_hidden['biaya_']) && $this->nmgp_cmp_hidden['biaya_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['biaya_']);
           $sStyleHidden_biaya_ = 'display: none;';
       }
       $bTestReadOnly_biaya_ = true;
       $sStyleReadLab_biaya_ = 'display: none;';
       $sStyleReadInp_biaya_ = '';
       if (isset($this->nmgp_cmp_readonly['biaya_']) && $this->nmgp_cmp_readonly['biaya_'] == 'on')
       {
           $bTestReadOnly_biaya_ = false;
           unset($this->nmgp_cmp_readonly['biaya_']);
           $sStyleReadLab_biaya_ = '';
           $sStyleReadInp_biaya_ = 'display: none;';
       }
       $this->hargajual_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['hargajual_']; 
       $hargajual_ = $this->hargajual_; 
       $sStyleHidden_hargajual_ = '';
       if (isset($sCheckRead_hargajual_))
       {
           unset($sCheckRead_hargajual_);
       }
       if (isset($this->nmgp_cmp_readonly['hargajual_']))
       {
           $sCheckRead_hargajual_ = $this->nmgp_cmp_readonly['hargajual_'];
       }
       if (isset($this->nmgp_cmp_hidden['hargajual_']) && $this->nmgp_cmp_hidden['hargajual_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['hargajual_']);
           $sStyleHidden_hargajual_ = 'display: none;';
       }
       $bTestReadOnly_hargajual_ = true;
       $sStyleReadLab_hargajual_ = 'display: none;';
       $sStyleReadInp_hargajual_ = '';
       if (isset($this->nmgp_cmp_readonly['hargajual_']) && $this->nmgp_cmp_readonly['hargajual_'] == 'on')
       {
           $bTestReadOnly_hargajual_ = false;
           unset($this->nmgp_cmp_readonly['hargajual_']);
           $sStyleReadLab_hargajual_ = '';
           $sStyleReadInp_hargajual_ = 'display: none;';
       }
       $this->id_ = $this->form_vert_form_tbreseprjdetail[$sc_seq_vert]['id_']; 
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_tbreseprjdetail_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_tbreseprjdetail_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbreseprjdetail_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_tbreseprjdetail_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbreseprjdetail_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_tbreseprjdetail_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['item_']) && $this->nmgp_cmp_hidden['item_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="item_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($item_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_item__line" id="hidden_field_data_item_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_item_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_item__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_item_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["item_"]) &&  $this->nmgp_cmp_readonly["item_"] == "on") { 

 ?>
<input type="hidden" name="item_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($item_) . "\">" . $item_ . ""; ?>
<?php } else { ?>

<?php
$aRecData['item_'] = $this->item_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_item_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_item_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_item_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_item_'] = array(); 
    }

   $old_value_jumlah_ = $this->jumlah_;
   $old_value_aturanpakai1_ = $this->aturanpakai1_;
   $old_value_aturanpakai2_ = $this->aturanpakai2_;
   $old_value_biaya_ = $this->biaya_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_aturanpakai1_ = $this->aturanpakai1_;
   $unformatted_value_aturanpakai2_ = $this->aturanpakai2_;
   $unformatted_value_biaya_ = $this->biaya_;
   $unformatted_value_id_ = $this->id_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT kodeItem, kodeItem + ' | ' + namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT kodeItem, concat(kodeItem,' | ', namaItem) FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT kodeItem, kodeItem&' | '&namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT kodeItem, kodeItem||' | '||namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT kodeItem, kodeItem + ' | ' + namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT kodeItem, kodeItem||' | '||namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   else
   {
       $nm_comando = "SELECT kodeItem, kodeItem||' | '||namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }

   $this->jumlah_ = $old_value_jumlah_;
   $this->aturanpakai1_ = $old_value_aturanpakai1_;
   $this->aturanpakai2_ = $old_value_aturanpakai2_;
   $this->biaya_ = $old_value_biaya_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_item_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->item_])) ? $aLookup[0][$this->item_] : $this->item_;
$item__look = (isset($aLookup[0][$this->item_])) ? $aLookup[0][$this->item_] : $this->item_;
?>
<span id="id_read_on_item_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-item_<?php echo $sc_seq_vert ?> css_item__line" style="<?php echo $sStyleReadLab_item_; ?>"><?php echo str_replace("<", "&lt;", $item__look); ?></span><span id="id_read_off_item_<?php echo $sc_seq_vert ?>" class="css_read_off_item_" style="white-space: nowrap;<?php echo $sStyleReadInp_item_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_item__obj" style="display: none;" id="id_sc_field_item_<?php echo $sc_seq_vert ?>" type=text name="item_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($item_) ?>"
 size=50 maxlength=150 style="display: none" alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['item_'] = $this->item_;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_item_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_item_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_item_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_item_'] = array(); 
    }

   $old_value_jumlah_ = $this->jumlah_;
   $old_value_aturanpakai1_ = $this->aturanpakai1_;
   $old_value_aturanpakai2_ = $this->aturanpakai2_;
   $old_value_biaya_ = $this->biaya_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_aturanpakai1_ = $this->aturanpakai1_;
   $unformatted_value_aturanpakai2_ = $this->aturanpakai2_;
   $unformatted_value_biaya_ = $this->biaya_;
   $unformatted_value_id_ = $this->id_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT kodeItem, kodeItem + ' | ' + namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT kodeItem, concat(kodeItem,' | ', namaItem) FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT kodeItem, kodeItem&' | '&namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT kodeItem, kodeItem||' | '||namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT kodeItem, kodeItem + ' | ' + namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT kodeItem, kodeItem||' | '||namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }
   else
   {
       $nm_comando = "SELECT kodeItem, kodeItem||' | '||namaItem FROM tbobat WHERE kodeItem = '" . $aRecData['item_'] . "' ORDER BY kodeItem, namaItem";
   }

   $this->jumlah_ = $old_value_jumlah_;
   $this->aturanpakai1_ = $old_value_aturanpakai1_;
   $this->aturanpakai2_ = $old_value_aturanpakai2_;
   $this->biaya_ = $old_value_biaya_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_item_'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->item_])) ? $aLookup[0][$this->item_] : '';
$item__look = (isset($aLookup[0][$this->item_])) ? $aLookup[0][$this->item_] : '';
?>
<input type="text" id="id_ac_item_<?php echo $sc_seq_vert; ?>" name="item_<?php echo $sc_seq_vert; ?>_autocomp" class="scFormObjectOddMult sc-ui-autocomp-item_ css_item__obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 150, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_item_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_item_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['satuan_']) && $this->nmgp_cmp_hidden['satuan_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="satuan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->satuan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_satuan__line" id="hidden_field_data_satuan_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_satuan_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_satuan__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_satuan_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["satuan_"]) &&  $this->nmgp_cmp_readonly["satuan_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_satuan_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_satuan_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_satuan_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_satuan_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_satuan_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_satuan_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_satuan_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_satuan_'] = array(); 
    }

   $old_value_jumlah_ = $this->jumlah_;
   $old_value_aturanpakai1_ = $this->aturanpakai1_;
   $old_value_aturanpakai2_ = $this->aturanpakai2_;
   $old_value_biaya_ = $this->biaya_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_aturanpakai1_ = $this->aturanpakai1_;
   $unformatted_value_aturanpakai2_ = $this->aturanpakai2_;
   $unformatted_value_biaya_ = $this->biaya_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT kodeItem, satuanTerkecil  FROM tbobat where kodeItem = '$this->item_' ORDER BY satuanTerkecil";

   $this->jumlah_ = $old_value_jumlah_;
   $this->aturanpakai1_ = $old_value_aturanpakai1_;
   $this->aturanpakai2_ = $old_value_aturanpakai2_;
   $this->biaya_ = $old_value_biaya_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_satuan_'][] = $rs->fields[0];
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
   $satuan__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->satuan__1))
          {
              foreach ($this->satuan__1 as $tmp_satuan_)
              {
                  if (trim($tmp_satuan_) === trim($cadaselect[1])) { $satuan__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->satuan_) === trim($cadaselect[1])) { $satuan__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="satuan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($satuan_) . "\">" . $satuan__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_satuan_();
   $x = 0 ; 
   $satuan__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->satuan__1))
          {
              foreach ($this->satuan__1 as $tmp_satuan_)
              {
                  if (trim($tmp_satuan_) === trim($cadaselect[1])) { $satuan__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->satuan_) === trim($cadaselect[1])) { $satuan__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($satuan__look))
          {
              $satuan__look = $this->satuan_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_satuan_" . $sc_seq_vert . "\" class=\"css_satuan__line\" style=\"" .  $sStyleReadLab_satuan_ . "\">" . $this->form_encode_input($satuan__look) . "</span><span id=\"id_read_off_satuan_" . $sc_seq_vert . "\" class=\"css_read_off_satuan_\" style=\"white-space: nowrap; " . $sStyleReadInp_satuan_ . "\">";
   echo " <span id=\"idAjaxSelect_satuan_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_satuan__obj\" style=\"\" id=\"id_sc_field_satuan_" . $sc_seq_vert . "\" name=\"satuan_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->satuan_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->satuan_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_satuan_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_satuan_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['jumlah_']) && $this->nmgp_cmp_hidden['jumlah_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="jumlah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jumlah_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_jumlah__line" id="hidden_field_data_jumlah_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_jumlah_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_jumlah__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_jumlah_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jumlah_"]) &&  $this->nmgp_cmp_readonly["jumlah_"] == "on") { 

 ?>
<input type="hidden" name="jumlah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jumlah_) . "\">" . $jumlah_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_jumlah_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-jumlah_<?php echo $sc_seq_vert ?> css_jumlah__line" style="<?php echo $sStyleReadLab_jumlah_; ?>"><?php echo $this->jumlah_; ?></span><span id="id_read_off_jumlah_<?php echo $sc_seq_vert ?>" class="css_read_off_jumlah_" style="white-space: nowrap;<?php echo $sStyleReadInp_jumlah_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_jumlah__obj" style="" id="id_sc_field_jumlah_<?php echo $sc_seq_vert ?>" type=text name="jumlah_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jumlah_) ?>"
 size=2 alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['jumlah_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['jumlah_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['jumlah_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jumlah_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jumlah_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['aturanpakai1_']) && $this->nmgp_cmp_hidden['aturanpakai1_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aturanpakai1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aturanpakai1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_aturanpakai1__line" id="hidden_field_data_aturanpakai1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_aturanpakai1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_aturanpakai1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_aturanpakai1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["aturanpakai1_"]) &&  $this->nmgp_cmp_readonly["aturanpakai1_"] == "on") { 

 ?>
<input type="hidden" name="aturanpakai1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aturanpakai1_) . "\">" . $aturanpakai1_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_aturanpakai1_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-aturanpakai1_<?php echo $sc_seq_vert ?> css_aturanpakai1__line" style="<?php echo $sStyleReadLab_aturanpakai1_; ?>"><?php echo $this->aturanpakai1_; ?></span><span id="id_read_off_aturanpakai1_<?php echo $sc_seq_vert ?>" class="css_read_off_aturanpakai1_" style="white-space: nowrap;<?php echo $sStyleReadInp_aturanpakai1_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_aturanpakai1__obj" style="" id="id_sc_field_aturanpakai1_<?php echo $sc_seq_vert ?>" type=text name="aturanpakai1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aturanpakai1_) ?>"
 size=2 alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['aturanpakai1_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['aturanpakai1_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['aturanpakai1_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aturanpakai1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aturanpakai1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['aturanpakai2_']) && $this->nmgp_cmp_hidden['aturanpakai2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="aturanpakai2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aturanpakai2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_aturanpakai2__line" id="hidden_field_data_aturanpakai2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_aturanpakai2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_aturanpakai2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_aturanpakai2_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["aturanpakai2_"]) &&  $this->nmgp_cmp_readonly["aturanpakai2_"] == "on") { 

 ?>
<input type="hidden" name="aturanpakai2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aturanpakai2_) . "\">" . $aturanpakai2_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_aturanpakai2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-aturanpakai2_<?php echo $sc_seq_vert ?> css_aturanpakai2__line" style="<?php echo $sStyleReadLab_aturanpakai2_; ?>"><?php echo $this->aturanpakai2_; ?></span><span id="id_read_off_aturanpakai2_<?php echo $sc_seq_vert ?>" class="css_read_off_aturanpakai2_" style="white-space: nowrap;<?php echo $sStyleReadInp_aturanpakai2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_aturanpakai2__obj" style="" id="id_sc_field_aturanpakai2_<?php echo $sc_seq_vert ?>" type=text name="aturanpakai2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($aturanpakai2_) ?>"
 size=2 alt="{datatype: 'integer', maxLength: 2, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['aturanpakai2_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['aturanpakai2_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['aturanpakai2_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_aturanpakai2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_aturanpakai2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['stok_']) && $this->nmgp_cmp_hidden['stok_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="stok_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->stok_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_stok__line" id="hidden_field_data_stok_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_stok_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_stok__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_stok_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["stok_"]) &&  $this->nmgp_cmp_readonly["stok_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_stok_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_stok_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_stok_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_stok_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_stok_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_stok_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_stok_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_stok_'] = array(); 
    }

   $old_value_jumlah_ = $this->jumlah_;
   $old_value_aturanpakai1_ = $this->aturanpakai1_;
   $old_value_aturanpakai2_ = $this->aturanpakai2_;
   $old_value_biaya_ = $this->biaya_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_aturanpakai1_ = $this->aturanpakai1_;
   $unformatted_value_aturanpakai2_ = $this->aturanpakai2_;
   $unformatted_value_biaya_ = $this->biaya_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "select sum(currentStock) from tbstockobat where kodeItem = '$this->item_' group by kodeItem";

   $this->jumlah_ = $old_value_jumlah_;
   $this->aturanpakai1_ = $old_value_aturanpakai1_;
   $this->aturanpakai2_ = $old_value_aturanpakai2_;
   $this->biaya_ = $old_value_biaya_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_stok_'][] = $rs->fields[0];
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
   $stok__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->stok__1))
          {
              foreach ($this->stok__1 as $tmp_stok_)
              {
                  if (trim($tmp_stok_) === trim($cadaselect[1])) { $stok__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->stok_) === trim($cadaselect[1])) { $stok__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="stok_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($stok_) . "\">" . $stok__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_stok_();
   $x = 0 ; 
   $stok__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->stok__1))
          {
              foreach ($this->stok__1 as $tmp_stok_)
              {
                  if (trim($tmp_stok_) === trim($cadaselect[1])) { $stok__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->stok_) === trim($cadaselect[1])) { $stok__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($stok__look))
          {
              $stok__look = $this->stok_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_stok_" . $sc_seq_vert . "\" class=\"css_stok__line\" style=\"" .  $sStyleReadLab_stok_ . "\">" . $this->form_encode_input($stok__look) . "</span><span id=\"id_read_off_stok_" . $sc_seq_vert . "\" class=\"css_read_off_stok_\" style=\"white-space: nowrap; " . $sStyleReadInp_stok_ . "\">";
   echo " <span id=\"idAjaxSelect_stok_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_stok__obj\" style=\"\" id=\"id_sc_field_stok_" . $sc_seq_vert . "\" name=\"stok_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->stok_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->stok_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_stok_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_stok_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['biaya_']) && $this->nmgp_cmp_hidden['biaya_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="biaya_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($biaya_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_biaya__line" id="hidden_field_data_biaya_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_biaya_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%;float:right"><tr><td  class="scFormDataFontOddMult css_biaya__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_biaya_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["biaya_"]) &&  $this->nmgp_cmp_readonly["biaya_"] == "on") { 

 ?>
<input type="hidden" name="biaya_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($biaya_) . "\">" . $biaya_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_biaya_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-biaya_<?php echo $sc_seq_vert ?> css_biaya__line" style="<?php echo $sStyleReadLab_biaya_; ?>"><?php echo $this->biaya_; ?></span><span id="id_read_off_biaya_<?php echo $sc_seq_vert ?>" class="css_read_off_biaya_" style="white-space: nowrap;<?php echo $sStyleReadInp_biaya_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_biaya__obj" style="" id="id_sc_field_biaya_<?php echo $sc_seq_vert ?>" type=text name="biaya_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($biaya_) ?>"
 size=8 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['biaya_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['biaya_']['format_pos'] || 3 == $this->field_config['biaya_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 8, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['biaya_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['biaya_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['biaya_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['biaya_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_biaya_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_biaya_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['hargajual_']) && $this->nmgp_cmp_hidden['hargajual_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="hargajual_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->hargajual_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_hargajual__line" id="hidden_field_data_hargajual_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_hargajual_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_hargajual__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_hargajual_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["hargajual_"]) &&  $this->nmgp_cmp_readonly["hargajual_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_hargajual_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_hargajual_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_hargajual_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_hargajual_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_hargajual_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_hargajual_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_hargajual_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_hargajual_'] = array(); 
    }

   $old_value_jumlah_ = $this->jumlah_;
   $old_value_aturanpakai1_ = $this->aturanpakai1_;
   $old_value_aturanpakai2_ = $this->aturanpakai2_;
   $old_value_biaya_ = $this->biaya_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_jumlah_ = $this->jumlah_;
   $unformatted_value_aturanpakai1_ = $this->aturanpakai1_;
   $unformatted_value_aturanpakai2_ = $this->aturanpakai2_;
   $unformatted_value_biaya_ = $this->biaya_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT hargaJual FROM tbobat  where kodeItem = '$this->item_' ORDER BY hargaJual";

   $this->jumlah_ = $old_value_jumlah_;
   $this->aturanpakai1_ = $old_value_aturanpakai1_;
   $this->aturanpakai2_ = $old_value_aturanpakai2_;
   $this->biaya_ = $old_value_biaya_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['Lookup_hargajual_'][] = $rs->fields[0];
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
   $hargajual__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->hargajual__1))
          {
              foreach ($this->hargajual__1 as $tmp_hargajual_)
              {
                  if (trim($tmp_hargajual_) === trim($cadaselect[1])) { $hargajual__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->hargajual_) === trim($cadaselect[1])) { $hargajual__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="hargajual_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($hargajual_) . "\">" . $hargajual__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_hargajual_();
   $x = 0 ; 
   $hargajual__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->hargajual__1))
          {
              foreach ($this->hargajual__1 as $tmp_hargajual_)
              {
                  if (trim($tmp_hargajual_) === trim($cadaselect[1])) { $hargajual__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->hargajual_) === trim($cadaselect[1])) { $hargajual__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($hargajual__look))
          {
              $hargajual__look = $this->hargajual_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_hargajual_" . $sc_seq_vert . "\" class=\"css_hargajual__line\" style=\"" .  $sStyleReadLab_hargajual_ . "\">" . $this->form_encode_input($hargajual__look) . "</span><span id=\"id_read_off_hargajual_" . $sc_seq_vert . "\" class=\"css_read_off_hargajual_\" style=\"white-space: nowrap; " . $sStyleReadInp_hargajual_ . "\">";
   echo " <span id=\"idAjaxSelect_hargajual_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_hargajual__obj\" style=\"\" id=\"id_sc_field_hargajual_" . $sc_seq_vert . "\" name=\"hargajual_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->hargajual_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->hargajual_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_hargajual_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_hargajual_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

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
        if (isset($sCheckRead_item_))
       {
           $this->nmgp_cmp_readonly['item_'] = $sCheckRead_item_;
       }
       if ('display: none;' == $sStyleHidden_item_)
       {
           $this->nmgp_cmp_hidden['item_'] = 'off';
       }
       if (isset($sCheckRead_satuan_))
       {
           $this->nmgp_cmp_readonly['satuan_'] = $sCheckRead_satuan_;
       }
       if ('display: none;' == $sStyleHidden_satuan_)
       {
           $this->nmgp_cmp_hidden['satuan_'] = 'off';
       }
       if (isset($sCheckRead_jumlah_))
       {
           $this->nmgp_cmp_readonly['jumlah_'] = $sCheckRead_jumlah_;
       }
       if ('display: none;' == $sStyleHidden_jumlah_)
       {
           $this->nmgp_cmp_hidden['jumlah_'] = 'off';
       }
       if (isset($sCheckRead_aturanpakai1_))
       {
           $this->nmgp_cmp_readonly['aturanpakai1_'] = $sCheckRead_aturanpakai1_;
       }
       if ('display: none;' == $sStyleHidden_aturanpakai1_)
       {
           $this->nmgp_cmp_hidden['aturanpakai1_'] = 'off';
       }
       if (isset($sCheckRead_aturanpakai2_))
       {
           $this->nmgp_cmp_readonly['aturanpakai2_'] = $sCheckRead_aturanpakai2_;
       }
       if ('display: none;' == $sStyleHidden_aturanpakai2_)
       {
           $this->nmgp_cmp_hidden['aturanpakai2_'] = 'off';
       }
       if (isset($sCheckRead_stok_))
       {
           $this->nmgp_cmp_readonly['stok_'] = $sCheckRead_stok_;
       }
       if ('display: none;' == $sStyleHidden_stok_)
       {
           $this->nmgp_cmp_hidden['stok_'] = 'off';
       }
       if (isset($sCheckRead_biaya_))
       {
           $this->nmgp_cmp_readonly['biaya_'] = $sCheckRead_biaya_;
       }
       if ('display: none;' == $sStyleHidden_biaya_)
       {
           $this->nmgp_cmp_hidden['biaya_'] = 'off';
       }
       if (isset($sCheckRead_hargajual_))
       {
           $this->nmgp_cmp_readonly['hargajual_'] = $sCheckRead_hargajual_;
       }
       if ('display: none;' == $sStyleHidden_hargajual_)
       {
           $this->nmgp_cmp_hidden['hargajual_'] = 'off';
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
       $this->form_vert_form_tbreseprjdetail = $guarda_form_vert_form_tbreseprjdetail;
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbreseprjdetail");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbreseprjdetail");
 parent.scAjaxDetailHeight("form_tbreseprjdetail", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbreseprjdetail", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbreseprjdetail", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['sc_modal'])
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
			do_ajax_form_tbreseprjdetail_add_new_line(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbreseprjdetail']['buttonStatus'] = $this->nmgp_botoes;
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
