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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""); } else { echo strip_tags("Pembuatan Rujukan"); } ?></TITLE>
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
<?php

if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'] && $_SESSION['scriptcase']['display_mobile'])
{
?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php
}

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
.css_read_off_tglrujukan button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_vclaim_rujukan_insert/form_vclaim_rujukan_insert_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_vclaim_rujukan_insert_mob_sajax_js.php");
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
     if (F_name == "user")
     {
        $('input[name="user"]').prop("disabled", F_opc);
        if (F_opc == "disabled" || F_opc == true) {
            $('input[name="user"]').addClass("scFormInputDisabled");
        }
        else {
            $('input[name="user"]').removeClass("scFormInputDisabled");
        }
     }
  }
 } // nm_field_disabled
<?php

include_once('form_vclaim_rujukan_insert_mob_jquery.php');

?>

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {

  scJQElementsAdd('');

  scJQGeneralAdd();

  addAutocomplete(this);

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

 function addAutocomplete(elem) {


  $(".sc-ui-autocomp-nmdiagrujukan", elem).on("focus", function() {
   var sId = $(this).attr("id").substr(6);
   scEventControl_data[sId]["autocomp"] = true;
  }).on("blur", function() {
   var sId = $(this).attr("id").substr(6), sRow = "nmdiagrujukan" != sId ? sId.substr(13) : "";
   if ("" == $(this).val()) {
    var hasChanged = "" != $("#id_sc_field_" + sId).val();
    $("#id_sc_field_" + sId).val("");
    if (hasChanged) {
     if ('function' == typeof do_ajax_form_vclaim_rujukan_insert_mob_event_nmdiagrujukan_onchange) { do_ajax_form_vclaim_rujukan_insert_mob_event_nmdiagrujukan_onchange(sRow); }
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
     url: "form_vclaim_rujukan_insert_mob.php",
     dataType: "json",
     data: {
      term: request.term,
      nmgp_opcao: "ajax_autocomp",
      nmgp_parms: "NM_ajax_opcao?#?autocomp_nmdiagrujukan",
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
   focus: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'nmdiagrujukan' != sId ? sId.substr(13) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
   },
   select: function (event, ui) {
    var sId = $(this).attr("id").substr(6), sRow = 'nmdiagrujukan' != sId ? sId.substr(13) : '';
    $("#id_sc_field_" + sId).val(ui.item.value);
    $(this).val(ui.item.label);
    event.preventDefault();
    $("#id_sc_field_" + sId).trigger("focus");
   }
  });
  $("#id_ac_nmdiagrujukan", elem).on("focus", function() {
    $("#id_sc_field_nmdiagrujukan").trigger("focus");
  }).on("blur", function() {
    $("#id_sc_field_nmdiagrujukan").trigger("blur");
  });
}
</script>
</HEAD>
<?php
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['recarga'];
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
?>
<body class="scFormPage" style="<?php echo $remove_margin . $str_iframe_body; ?>">
<?php

if (isset($_SESSION['scriptcase']['form_vclaim_rujukan_insert']['error_buffer']) && '' != $_SESSION['scriptcase']['form_vclaim_rujukan_insert']['error_buffer'])
{
    echo $_SESSION['scriptcase']['form_vclaim_rujukan_insert']['error_buffer'];
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
 include_once("form_vclaim_rujukan_insert_mob_js0.php");
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
               action="form_vclaim_rujukan_insert_mob.php" 
               target="_self">
<input type="hidden" name="nm_form_submit" value="1">
<input type="hidden" name="nmgp_idioma_novo" value="">
<input type="hidden" name="nmgp_schema_f" value="">
<input type="hidden" name="nmgp_url_saida" value="<?php echo $this->form_encode_input($nmgp_url_saida); ?>">
<input type="hidden" name="bok" value="OK">
<input type="hidden" name="nmgp_opcao" value="">
<input type="hidden" name="nmgp_ancora" value="">
<input type="hidden" name="nmgp_num_form" value="<?php  echo $this->form_encode_input($nmgp_num_form); ?>">
<input type="hidden" name="nmgp_parms" value="">
<input type="hidden" name="script_case_init" value="<?php  echo $this->form_encode_input($this->Ini->sc_page); ?>">
<input type="hidden" name="script_case_session" value="<?php  echo $this->form_encode_input(session_id()); ?>">
<input type="hidden" name="NM_cancel_return_new" value="<?php echo $this->NM_cancel_return_new ?>">
<input type="hidden" name="csrf_token" value="<?php echo $this->scCsrfGetToken() ?>" />
<input type="hidden" name="_sc_force_mobile" id="sc-id-mobile-control" value="" />
<?php
$_SESSION['scriptcase']['error_span_title']['form_vclaim_rujukan_insert_mob'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_vclaim_rujukan_insert_mob'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
<table id="main_table_form"  align="center" cellpadding=0 cellspacing=0 >
 <tr>
  <td>
  <div class="scFormBorder">
   <table width='100%' cellspacing=0 cellpadding=0>
<?php
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_titl'] . ""; } else { echo "Pembuatan Rujukan"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
       echo "<div id=\"sc-ui-empty-form\" class=\"scFormPageText\" style=\"padding: 10px; text-align: center; font-weight: bold" . ($this->nmgp_form_empty ? '' : '; display: none') . "\">";
       echo $this->Ini->Nm_lang['lang_errm_empt'];
       echo "</div>";
  if ($this->nmgp_form_empty)
  {
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['empty_filter'] = true;
       }
  }
?>
<?php $sc_hidden_no = 1; $sc_hidden_yes = 0; ?>
   <a name="bloco_0"></a>
   <table width="100%" height="100%" cellpadding="0" cellspacing=0><tr valign="top"><td width="100%" height="">
<div id="div_hidden_bloco_0"><!-- bloco_c -->
<?php
   if (!isset($this->nmgp_cmp_hidden['user']))
   {
       $this->nmgp_cmp_hidden['user'] = 'off';
   }
?>
<TABLE align="center" id="hidden_bloco_0" class="scFormTable" width="100%" style="height: 100%;"><?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nosep']))
    {
        $this->nm_new_label['nosep'] = "No. SEP";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nosep = $this->nosep;
   $sStyleHidden_nosep = '';
   if (isset($this->nmgp_cmp_hidden['nosep']) && $this->nmgp_cmp_hidden['nosep'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nosep']);
       $sStyleHidden_nosep = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nosep = 'display: none;';
   $sStyleReadInp_nosep = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nosep']) && $this->nmgp_cmp_readonly['nosep'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nosep']);
       $sStyleReadLab_nosep = '';
       $sStyleReadInp_nosep = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nosep']) && $this->nmgp_cmp_hidden['nosep'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nosep" value="<?php echo $this->form_encode_input($nosep) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nosep_line" id="hidden_field_data_nosep" style="<?php echo $sStyleHidden_nosep; ?>"> <span class="scFormLabelOddFormat css_nosep_label"><span id="id_label_nosep"><?php echo $this->nm_new_label['nosep']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nosep"]) &&  $this->nmgp_cmp_readonly["nosep"] == "on") { 

 ?>
<input type="hidden" name="nosep" value="<?php echo $this->form_encode_input($nosep) . "\">" . $nosep . ""; ?>
<?php } else { ?>
<span id="id_read_on_nosep" class="sc-ui-readonly-nosep css_nosep_line" style="<?php echo $sStyleReadLab_nosep; ?>"><?php echo $this->nosep; ?></span><span id="id_read_off_nosep" class="css_read_off_nosep" style="white-space: nowrap;<?php echo $sStyleReadInp_nosep; ?>">
 <input class="sc-js-input scFormObjectOdd css_nosep_obj" style="" id="id_sc_field_nosep" type=text name="nosep" value="<?php echo $this->form_encode_input($nosep) ?>"
 size=40 maxlength=30 alt="{datatype: 'text', maxLength: 30, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['tglrujukan']))
    {
        $this->nm_new_label['tglrujukan'] = "Tanggal Rujukan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tglrujukan = $this->tglrujukan;
   $sStyleHidden_tglrujukan = '';
   if (isset($this->nmgp_cmp_hidden['tglrujukan']) && $this->nmgp_cmp_hidden['tglrujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tglrujukan']);
       $sStyleHidden_tglrujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tglrujukan = 'display: none;';
   $sStyleReadInp_tglrujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tglrujukan']) && $this->nmgp_cmp_readonly['tglrujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tglrujukan']);
       $sStyleReadLab_tglrujukan = '';
       $sStyleReadInp_tglrujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tglrujukan']) && $this->nmgp_cmp_hidden['tglrujukan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="tglrujukan" value="<?php echo $this->form_encode_input($tglrujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tglrujukan_line" id="hidden_field_data_tglrujukan" style="<?php echo $sStyleHidden_tglrujukan; ?>"> <span class="scFormLabelOddFormat css_tglrujukan_label"><span id="id_label_tglrujukan"><?php echo $this->nm_new_label['tglrujukan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tglrujukan"]) &&  $this->nmgp_cmp_readonly["tglrujukan"] == "on") { 

 ?>
<input type="hidden" name="tglrujukan" value="<?php echo $this->form_encode_input($tglrujukan) . "\">" . $tglrujukan . ""; ?>
<?php } else { ?>
<span id="id_read_on_tglrujukan" class="sc-ui-readonly-tglrujukan css_tglrujukan_line" style="<?php echo $sStyleReadLab_tglrujukan; ?>"><?php echo $tglrujukan; ?></span><span id="id_read_off_tglrujukan" class="css_read_off_tglrujukan" style="white-space: nowrap;<?php echo $sStyleReadInp_tglrujukan; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOdd css_tglrujukan_obj" style="" id="id_sc_field_tglrujukan" type=text name="tglrujukan" value="<?php echo $this->form_encode_input($tglrujukan) ?>"
 size=10 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['tglrujukan']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['tglrujukan']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['tglrujukan']['date_format'];
$tmp_form_data = str_replace('aaaa', 'yyyy', $tmp_form_data);
$tmp_form_data = str_replace('dd'  , $this->Ini->Nm_lang['lang_othr_date_days'], $tmp_form_data);
$tmp_form_data = str_replace('mm'  , $this->Ini->Nm_lang['lang_othr_date_mnth'], $tmp_form_data);
$tmp_form_data = str_replace('yyyy', $this->Ini->Nm_lang['lang_othr_date_year'], $tmp_form_data);
$tmp_form_data = str_replace('hh'  , $this->Ini->Nm_lang['lang_othr_date_hour'], $tmp_form_data);
$tmp_form_data = str_replace('ii'  , $this->Ini->Nm_lang['lang_othr_date_mint'], $tmp_form_data);
$tmp_form_data = str_replace('ss'  , $this->Ini->Nm_lang['lang_othr_date_scnd'], $tmp_form_data);
$tmp_form_data = str_replace(';'   , ' '                                       , $tmp_form_data);
?>
&nbsp;<span class="scFormDataHelpOdd"><?php echo $tmp_form_data; ?></span></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['ppkdirujuk']))
    {
        $this->nm_new_label['ppkdirujuk'] = "PPK Dirujuk";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $ppkdirujuk = $this->ppkdirujuk;
   $sStyleHidden_ppkdirujuk = '';
   if (isset($this->nmgp_cmp_hidden['ppkdirujuk']) && $this->nmgp_cmp_hidden['ppkdirujuk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['ppkdirujuk']);
       $sStyleHidden_ppkdirujuk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_ppkdirujuk = 'display: none;';
   $sStyleReadInp_ppkdirujuk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['ppkdirujuk']) && $this->nmgp_cmp_readonly['ppkdirujuk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['ppkdirujuk']);
       $sStyleReadLab_ppkdirujuk = '';
       $sStyleReadInp_ppkdirujuk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['ppkdirujuk']) && $this->nmgp_cmp_hidden['ppkdirujuk'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="ppkdirujuk" value="<?php echo $this->form_encode_input($ppkdirujuk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_ppkdirujuk_line" id="hidden_field_data_ppkdirujuk" style="<?php echo $sStyleHidden_ppkdirujuk; ?>"> <span class="scFormLabelOddFormat css_ppkdirujuk_label"><span id="id_label_ppkdirujuk"><?php echo $this->nm_new_label['ppkdirujuk']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["ppkdirujuk"]) &&  $this->nmgp_cmp_readonly["ppkdirujuk"] == "on") { 

 ?>
<input type="hidden" name="ppkdirujuk" value="<?php echo $this->form_encode_input($ppkdirujuk) . "\">" . $ppkdirujuk . ""; ?>
<?php } else { ?>
<span id="id_read_on_ppkdirujuk" class="sc-ui-readonly-ppkdirujuk css_ppkdirujuk_line" style="<?php echo $sStyleReadLab_ppkdirujuk; ?>"><?php echo $this->ppkdirujuk; ?></span><span id="id_read_off_ppkdirujuk" class="css_read_off_ppkdirujuk" style="white-space: nowrap;<?php echo $sStyleReadInp_ppkdirujuk; ?>">
 <input class="sc-js-input scFormObjectOdd css_ppkdirujuk_obj" style="" id="id_sc_field_ppkdirujuk" type=text name="ppkdirujuk" value="<?php echo $this->form_encode_input($ppkdirujuk) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nmppkdirujuk']))
    {
        $this->nm_new_label['nmppkdirujuk'] = "Nama PPK Dirujuk";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nmppkdirujuk = $this->nmppkdirujuk;
   $sStyleHidden_nmppkdirujuk = '';
   if (isset($this->nmgp_cmp_hidden['nmppkdirujuk']) && $this->nmgp_cmp_hidden['nmppkdirujuk'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nmppkdirujuk']);
       $sStyleHidden_nmppkdirujuk = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nmppkdirujuk = 'display: none;';
   $sStyleReadInp_nmppkdirujuk = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nmppkdirujuk']) && $this->nmgp_cmp_readonly['nmppkdirujuk'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nmppkdirujuk']);
       $sStyleReadLab_nmppkdirujuk = '';
       $sStyleReadInp_nmppkdirujuk = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nmppkdirujuk']) && $this->nmgp_cmp_hidden['nmppkdirujuk'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nmppkdirujuk" value="<?php echo $this->form_encode_input($nmppkdirujuk) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nmppkdirujuk_line" id="hidden_field_data_nmppkdirujuk" style="<?php echo $sStyleHidden_nmppkdirujuk; ?>"> <span class="scFormLabelOddFormat css_nmppkdirujuk_label"><span id="id_label_nmppkdirujuk"><?php echo $this->nm_new_label['nmppkdirujuk']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nmppkdirujuk"]) &&  $this->nmgp_cmp_readonly["nmppkdirujuk"] == "on") { 

 ?>
<input type="hidden" name="nmppkdirujuk" value="<?php echo $this->form_encode_input($nmppkdirujuk) . "\">" . $nmppkdirujuk . ""; ?>
<?php } else { ?>
<span id="id_read_on_nmppkdirujuk" class="sc-ui-readonly-nmppkdirujuk css_nmppkdirujuk_line" style="<?php echo $sStyleReadLab_nmppkdirujuk; ?>"><?php echo $this->nmppkdirujuk; ?></span><span id="id_read_off_nmppkdirujuk" class="css_read_off_nmppkdirujuk" style="white-space: nowrap;<?php echo $sStyleReadInp_nmppkdirujuk; ?>">
 <input class="sc-js-input scFormObjectOdd css_nmppkdirujuk_obj" style="" id="id_sc_field_nmppkdirujuk" type=text name="nmppkdirujuk" value="<?php echo $this->form_encode_input($nmppkdirujuk) ?>"
 size=40 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['jnspelayanan']))
   {
       $this->nm_new_label['jnspelayanan'] = "Jenis Pelayanan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $jnspelayanan = $this->jnspelayanan;
   $sStyleHidden_jnspelayanan = '';
   if (isset($this->nmgp_cmp_hidden['jnspelayanan']) && $this->nmgp_cmp_hidden['jnspelayanan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['jnspelayanan']);
       $sStyleHidden_jnspelayanan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_jnspelayanan = 'display: none;';
   $sStyleReadInp_jnspelayanan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['jnspelayanan']) && $this->nmgp_cmp_readonly['jnspelayanan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['jnspelayanan']);
       $sStyleReadLab_jnspelayanan = '';
       $sStyleReadInp_jnspelayanan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['jnspelayanan']) && $this->nmgp_cmp_hidden['jnspelayanan'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="jnspelayanan" value="<?php echo $this->form_encode_input($this->jnspelayanan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_jnspelayanan_line" id="hidden_field_data_jnspelayanan" style="<?php echo $sStyleHidden_jnspelayanan; ?>"> <span class="scFormLabelOddFormat css_jnspelayanan_label"><span id="id_label_jnspelayanan"><?php echo $this->nm_new_label['jnspelayanan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jnspelayanan"]) &&  $this->nmgp_cmp_readonly["jnspelayanan"] == "on") { 

$jnspelayanan_look = "";
 if ($this->jnspelayanan == "1") { $jnspelayanan_look .= "Rawat Inap" ;} 
 if ($this->jnspelayanan == "2") { $jnspelayanan_look .= "Rawat Jalan" ;} 
 if (empty($jnspelayanan_look)) { $jnspelayanan_look = $this->jnspelayanan; }
?>
<input type="hidden" name="jnspelayanan" value="<?php echo $this->form_encode_input($jnspelayanan) . "\">" . $jnspelayanan_look . ""; ?>
<?php } else { ?>
<?php

$jnspelayanan_look = "";
 if ($this->jnspelayanan == "1") { $jnspelayanan_look .= "Rawat Inap" ;} 
 if ($this->jnspelayanan == "2") { $jnspelayanan_look .= "Rawat Jalan" ;} 
 if (empty($jnspelayanan_look)) { $jnspelayanan_look = $this->jnspelayanan; }
?>
<span id="id_read_on_jnspelayanan" class="css_jnspelayanan_line"  style="<?php echo $sStyleReadLab_jnspelayanan; ?>"><?php echo $this->form_encode_input($jnspelayanan_look); ?></span><span id="id_read_off_jnspelayanan" class="css_read_off_jnspelayanan" style="white-space: nowrap; <?php echo $sStyleReadInp_jnspelayanan; ?>">
 <span id="idAjaxSelect_jnspelayanan"><select class="sc-js-input scFormObjectOdd css_jnspelayanan_obj" style="" id="id_sc_field_jnspelayanan" name="jnspelayanan" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="1" <?php  if ($this->jnspelayanan == "1") { echo " selected" ;} ?>>Rawat Inap</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_jnspelayanan'][] = '1'; ?>
 <option  value="2" <?php  if ($this->jnspelayanan == "2") { echo " selected" ;} ?>>Rawat Jalan</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_jnspelayanan'][] = '2'; ?>
 </select></span>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['catatan']))
    {
        $this->nm_new_label['catatan'] = "Catatan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $catatan = $this->catatan;
   $sStyleHidden_catatan = '';
   if (isset($this->nmgp_cmp_hidden['catatan']) && $this->nmgp_cmp_hidden['catatan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['catatan']);
       $sStyleHidden_catatan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_catatan = 'display: none;';
   $sStyleReadInp_catatan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['catatan']) && $this->nmgp_cmp_readonly['catatan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['catatan']);
       $sStyleReadLab_catatan = '';
       $sStyleReadInp_catatan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['catatan']) && $this->nmgp_cmp_hidden['catatan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="catatan" value="<?php echo $this->form_encode_input($catatan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_catatan_line" id="hidden_field_data_catatan" style="<?php echo $sStyleHidden_catatan; ?>"> <span class="scFormLabelOddFormat css_catatan_label"><span id="id_label_catatan"><?php echo $this->nm_new_label['catatan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["catatan"]) &&  $this->nmgp_cmp_readonly["catatan"] == "on") { 

 ?>
<input type="hidden" name="catatan" value="<?php echo $this->form_encode_input($catatan) . "\">" . $catatan . ""; ?>
<?php } else { ?>
<span id="id_read_on_catatan" class="sc-ui-readonly-catatan css_catatan_line" style="<?php echo $sStyleReadLab_catatan; ?>"><?php echo $this->catatan; ?></span><span id="id_read_off_catatan" class="css_read_off_catatan" style="white-space: nowrap;<?php echo $sStyleReadInp_catatan; ?>">
 <input class="sc-js-input scFormObjectOdd css_catatan_obj" style="" id="id_sc_field_catatan" type=text name="catatan" value="<?php echo $this->form_encode_input($catatan) ?>"
 size=40 maxlength=100 alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['diagrujukan']))
    {
        $this->nm_new_label['diagrujukan'] = "Diagnosa Rujukan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $diagrujukan = $this->diagrujukan;
   $sStyleHidden_diagrujukan = '';
   if (isset($this->nmgp_cmp_hidden['diagrujukan']) && $this->nmgp_cmp_hidden['diagrujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['diagrujukan']);
       $sStyleHidden_diagrujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_diagrujukan = 'display: none;';
   $sStyleReadInp_diagrujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['diagrujukan']) && $this->nmgp_cmp_readonly['diagrujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['diagrujukan']);
       $sStyleReadLab_diagrujukan = '';
       $sStyleReadInp_diagrujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['diagrujukan']) && $this->nmgp_cmp_hidden['diagrujukan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="diagrujukan" value="<?php echo $this->form_encode_input($diagrujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_diagrujukan_line" id="hidden_field_data_diagrujukan" style="<?php echo $sStyleHidden_diagrujukan; ?>"> <span class="scFormLabelOddFormat css_diagrujukan_label"><span id="id_label_diagrujukan"><?php echo $this->nm_new_label['diagrujukan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["diagrujukan"]) &&  $this->nmgp_cmp_readonly["diagrujukan"] == "on") { 

 ?>
<input type="hidden" name="diagrujukan" value="<?php echo $this->form_encode_input($diagrujukan) . "\">" . $diagrujukan . ""; ?>
<?php } else { ?>
<span id="id_read_on_diagrujukan" class="sc-ui-readonly-diagrujukan css_diagrujukan_line" style="<?php echo $sStyleReadLab_diagrujukan; ?>"><?php echo $this->diagrujukan; ?></span><span id="id_read_off_diagrujukan" class="css_read_off_diagrujukan" style="white-space: nowrap;<?php echo $sStyleReadInp_diagrujukan; ?>">
 <input class="sc-js-input scFormObjectOdd css_diagrujukan_obj" style="" id="id_sc_field_diagrujukan" type=text name="diagrujukan" value="<?php echo $this->form_encode_input($diagrujukan) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nmdiagrujukan']))
    {
        $this->nm_new_label['nmdiagrujukan'] = "Nama Diagnosa Rujukan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nmdiagrujukan = $this->nmdiagrujukan;
   $sStyleHidden_nmdiagrujukan = '';
   if (isset($this->nmgp_cmp_hidden['nmdiagrujukan']) && $this->nmgp_cmp_hidden['nmdiagrujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nmdiagrujukan']);
       $sStyleHidden_nmdiagrujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nmdiagrujukan = 'display: none;';
   $sStyleReadInp_nmdiagrujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nmdiagrujukan']) && $this->nmgp_cmp_readonly['nmdiagrujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nmdiagrujukan']);
       $sStyleReadLab_nmdiagrujukan = '';
       $sStyleReadInp_nmdiagrujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nmdiagrujukan']) && $this->nmgp_cmp_hidden['nmdiagrujukan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nmdiagrujukan" value="<?php echo $this->form_encode_input($nmdiagrujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nmdiagrujukan_line" id="hidden_field_data_nmdiagrujukan" style="<?php echo $sStyleHidden_nmdiagrujukan; ?>"> <span class="scFormLabelOddFormat css_nmdiagrujukan_label"><span id="id_label_nmdiagrujukan"><?php echo $this->nm_new_label['nmdiagrujukan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nmdiagrujukan"]) &&  $this->nmgp_cmp_readonly["nmdiagrujukan"] == "on") { 

 ?>
<input type="hidden" name="nmdiagrujukan" value="<?php echo $this->form_encode_input($nmdiagrujukan) . "\">" . $nmdiagrujukan . ""; ?>
<?php } else { ?>

<?php
$aRecData['nmdiagrujukan'] = $this->nmdiagrujukan;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_nmdiagrujukan']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_nmdiagrujukan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_nmdiagrujukan']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_nmdiagrujukan'] = array(); 
    }

   $old_value_tglrujukan = $this->tglrujukan;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tglrujukan = $this->tglrujukan;

   $nm_comando = "SELECT kode, nama FROM vclaim_diagnosa_list WHERE kode = '" . substr($this->Db->qstr($this->nmdiagrujukan), 1, -1) . "' ORDER BY nama";

   $this->tglrujukan = $old_value_tglrujukan;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_nmdiagrujukan'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->nmdiagrujukan])) ? $aLookup[0][$this->nmdiagrujukan] : $this->nmdiagrujukan;
$nmdiagrujukan_look = (isset($aLookup[0][$this->nmdiagrujukan])) ? $aLookup[0][$this->nmdiagrujukan] : $this->nmdiagrujukan;
?>
<span id="id_read_on_nmdiagrujukan" class="sc-ui-readonly-nmdiagrujukan css_nmdiagrujukan_line" style="<?php echo $sStyleReadLab_nmdiagrujukan; ?>"><?php echo str_replace("<", "&lt;", $nmdiagrujukan_look); ?></span><span id="id_read_off_nmdiagrujukan" class="css_read_off_nmdiagrujukan" style="white-space: nowrap;<?php echo $sStyleReadInp_nmdiagrujukan; ?>">
 <input class="sc-js-input scFormObjectOdd css_nmdiagrujukan_obj" style="display: none;" id="id_sc_field_nmdiagrujukan" type=text name="nmdiagrujukan" value="<?php echo $this->form_encode_input($nmdiagrujukan) ?>"
 size=40 maxlength=100 style="display: none" alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" >
<?php
$aRecData['nmdiagrujukan'] = $this->nmdiagrujukan;
$aLookup = array();
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_nmdiagrujukan']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_nmdiagrujukan'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_nmdiagrujukan']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_nmdiagrujukan'] = array(); 
    }

   $old_value_tglrujukan = $this->tglrujukan;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_tglrujukan = $this->tglrujukan;

   $nm_comando = "SELECT kode, nama FROM vclaim_diagnosa_list WHERE kode = '" . substr($this->Db->qstr($this->nmdiagrujukan), 1, -1) . "' ORDER BY nama";

   $this->tglrujukan = $old_value_tglrujukan;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->SelectLimit($nm_comando, 10, 0))
   {
       while (!$rs->EOF) 
       { 
              $aLookup[] = array($rs->fields[0] => $rs->fields[1]);
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_nmdiagrujukan'][] = $rs->fields[0];
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
$sAutocompValue = (isset($aLookup[0][$this->nmdiagrujukan])) ? $aLookup[0][$this->nmdiagrujukan] : '';
$nmdiagrujukan_look = (isset($aLookup[0][$this->nmdiagrujukan])) ? $aLookup[0][$this->nmdiagrujukan] : '';
?>
<input type="text" id="id_ac_nmdiagrujukan" name="nmdiagrujukan_autocomp" class="scFormObjectOdd sc-ui-autocomp-nmdiagrujukan css_nmdiagrujukan_obj" size="30" value="<?php echo $sAutocompValue; ?>" alt="{datatype: 'text', maxLength: 100, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}"  /></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
   if (!isset($this->nm_new_label['tiperujukan']))
   {
       $this->nm_new_label['tiperujukan'] = "Tipe Rujukan";
   }
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $tiperujukan = $this->tiperujukan;
   $sStyleHidden_tiperujukan = '';
   if (isset($this->nmgp_cmp_hidden['tiperujukan']) && $this->nmgp_cmp_hidden['tiperujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['tiperujukan']);
       $sStyleHidden_tiperujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_tiperujukan = 'display: none;';
   $sStyleReadInp_tiperujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['tiperujukan']) && $this->nmgp_cmp_readonly['tiperujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['tiperujukan']);
       $sStyleReadLab_tiperujukan = '';
       $sStyleReadInp_tiperujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['tiperujukan']) && $this->nmgp_cmp_hidden['tiperujukan'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="tiperujukan" value="<?php echo $this->form_encode_input($this->tiperujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_tiperujukan_line" id="hidden_field_data_tiperujukan" style="<?php echo $sStyleHidden_tiperujukan; ?>"> <span class="scFormLabelOddFormat css_tiperujukan_label"><span id="id_label_tiperujukan"><?php echo $this->nm_new_label['tiperujukan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["tiperujukan"]) &&  $this->nmgp_cmp_readonly["tiperujukan"] == "on") { 

$tiperujukan_look = "";
 if ($this->tiperujukan == "0") { $tiperujukan_look .= "Penuh" ;} 
 if ($this->tiperujukan == "1") { $tiperujukan_look .= "Partial" ;} 
 if ($this->tiperujukan == "2") { $tiperujukan_look .= "Rujuk Balik" ;} 
 if (empty($tiperujukan_look)) { $tiperujukan_look = $this->tiperujukan; }
?>
<input type="hidden" name="tiperujukan" value="<?php echo $this->form_encode_input($tiperujukan) . "\">" . $tiperujukan_look . ""; ?>
<?php } else { ?>
<?php

$tiperujukan_look = "";
 if ($this->tiperujukan == "0") { $tiperujukan_look .= "Penuh" ;} 
 if ($this->tiperujukan == "1") { $tiperujukan_look .= "Partial" ;} 
 if ($this->tiperujukan == "2") { $tiperujukan_look .= "Rujuk Balik" ;} 
 if (empty($tiperujukan_look)) { $tiperujukan_look = $this->tiperujukan; }
?>
<span id="id_read_on_tiperujukan" class="css_tiperujukan_line"  style="<?php echo $sStyleReadLab_tiperujukan; ?>"><?php echo $this->form_encode_input($tiperujukan_look); ?></span><span id="id_read_off_tiperujukan" class="css_read_off_tiperujukan" style="white-space: nowrap; <?php echo $sStyleReadInp_tiperujukan; ?>">
 <span id="idAjaxSelect_tiperujukan"><select class="sc-js-input scFormObjectOdd css_tiperujukan_obj" style="" id="id_sc_field_tiperujukan" name="tiperujukan" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->tiperujukan == "0") { echo " selected" ;} ?>>Penuh</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_tiperujukan'][] = '0'; ?>
 <option  value="1" <?php  if ($this->tiperujukan == "1") { echo " selected" ;} ?>>Partial</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_tiperujukan'][] = '1'; ?>
 <option  value="2" <?php  if ($this->tiperujukan == "2") { echo " selected" ;} ?>>Rujuk Balik</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['Lookup_tiperujukan'][] = '2'; ?>
 </select></span>
</span><?php  }?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['polirujukan']))
    {
        $this->nm_new_label['polirujukan'] = "Poli Rujukan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $polirujukan = $this->polirujukan;
   $sStyleHidden_polirujukan = '';
   if (isset($this->nmgp_cmp_hidden['polirujukan']) && $this->nmgp_cmp_hidden['polirujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['polirujukan']);
       $sStyleHidden_polirujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_polirujukan = 'display: none;';
   $sStyleReadInp_polirujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['polirujukan']) && $this->nmgp_cmp_readonly['polirujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['polirujukan']);
       $sStyleReadLab_polirujukan = '';
       $sStyleReadInp_polirujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['polirujukan']) && $this->nmgp_cmp_hidden['polirujukan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="polirujukan" value="<?php echo $this->form_encode_input($polirujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_polirujukan_line" id="hidden_field_data_polirujukan" style="<?php echo $sStyleHidden_polirujukan; ?>"> <span class="scFormLabelOddFormat css_polirujukan_label"><span id="id_label_polirujukan"><?php echo $this->nm_new_label['polirujukan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["polirujukan"]) &&  $this->nmgp_cmp_readonly["polirujukan"] == "on") { 

 ?>
<input type="hidden" name="polirujukan" value="<?php echo $this->form_encode_input($polirujukan) . "\">" . $polirujukan . ""; ?>
<?php } else { ?>
<span id="id_read_on_polirujukan" class="sc-ui-readonly-polirujukan css_polirujukan_line" style="<?php echo $sStyleReadLab_polirujukan; ?>"><?php echo $this->polirujukan; ?></span><span id="id_read_off_polirujukan" class="css_read_off_polirujukan" style="white-space: nowrap;<?php echo $sStyleReadInp_polirujukan; ?>">
 <input class="sc-js-input scFormObjectOdd css_polirujukan_obj" style="" id="id_sc_field_polirujukan" type=text name="polirujukan" value="<?php echo $this->form_encode_input($polirujukan) ?>"
 size=10 maxlength=10 alt="{datatype: 'text', maxLength: 10, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['nmpolirujukan']))
    {
        $this->nm_new_label['nmpolirujukan'] = "Nama Poli Rujukan";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $nmpolirujukan = $this->nmpolirujukan;
   $sStyleHidden_nmpolirujukan = '';
   if (isset($this->nmgp_cmp_hidden['nmpolirujukan']) && $this->nmgp_cmp_hidden['nmpolirujukan'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['nmpolirujukan']);
       $sStyleHidden_nmpolirujukan = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_nmpolirujukan = 'display: none;';
   $sStyleReadInp_nmpolirujukan = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['nmpolirujukan']) && $this->nmgp_cmp_readonly['nmpolirujukan'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['nmpolirujukan']);
       $sStyleReadLab_nmpolirujukan = '';
       $sStyleReadInp_nmpolirujukan = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['nmpolirujukan']) && $this->nmgp_cmp_hidden['nmpolirujukan'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nmpolirujukan" value="<?php echo $this->form_encode_input($nmpolirujukan) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_nmpolirujukan_line" id="hidden_field_data_nmpolirujukan" style="<?php echo $sStyleHidden_nmpolirujukan; ?>"> <span class="scFormLabelOddFormat css_nmpolirujukan_label"><span id="id_label_nmpolirujukan"><?php echo $this->nm_new_label['nmpolirujukan']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["nmpolirujukan"]) &&  $this->nmgp_cmp_readonly["nmpolirujukan"] == "on") { 

 ?>
<input type="hidden" name="nmpolirujukan" value="<?php echo $this->form_encode_input($nmpolirujukan) . "\">" . $nmpolirujukan . ""; ?>
<?php } else { ?>
<span id="id_read_on_nmpolirujukan" class="sc-ui-readonly-nmpolirujukan css_nmpolirujukan_line" style="<?php echo $sStyleReadLab_nmpolirujukan; ?>"><?php echo $this->nmpolirujukan; ?></span><span id="id_read_off_nmpolirujukan" class="css_read_off_nmpolirujukan" style="white-space: nowrap;<?php echo $sStyleReadInp_nmpolirujukan; ?>">
 <input class="sc-js-input scFormObjectOdd css_nmpolirujukan_obj" style="" id="id_sc_field_nmpolirujukan" type=text name="nmpolirujukan" value="<?php echo $this->form_encode_input($nmpolirujukan) ?>"
 size=40 maxlength=50 alt="{datatype: 'text', maxLength: 50, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0 && $sc_hidden_no > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } 
?> 
<?php if ($sc_hidden_no > 0) { echo "<tr>"; }; 
      $sc_hidden_yes = 0; $sc_hidden_no = 0; ?>


   <?php
    if (!isset($this->nm_new_label['user']))
    {
        $this->nm_new_label['user'] = "User";
    }
?>
<?php
   $nm_cor_fun_cel  = ($nm_cor_fun_cel  == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
   $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);
   $user = $this->user;
   if (!isset($this->nmgp_cmp_hidden['user']))
   {
       $this->nmgp_cmp_hidden['user'] = 'off';
   }
   $sStyleHidden_user = '';
   if (isset($this->nmgp_cmp_hidden['user']) && $this->nmgp_cmp_hidden['user'] == 'off')
   {
       unset($this->nmgp_cmp_hidden['user']);
       $sStyleHidden_user = 'display: none;';
   }
   $bTestReadOnly = true;
   $sStyleReadLab_user = 'display: none;';
   $sStyleReadInp_user = '';
   if (/*$this->nmgp_opcao != "novo" && */isset($this->nmgp_cmp_readonly['user']) && $this->nmgp_cmp_readonly['user'] == 'on')
   {
       $bTestReadOnly = false;
       unset($this->nmgp_cmp_readonly['user']);
       $sStyleReadLab_user = '';
       $sStyleReadInp_user = 'display: none;';
   }
?>
<?php if (isset($this->nmgp_cmp_hidden['user']) && $this->nmgp_cmp_hidden['user'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="user" value="<?php echo $this->form_encode_input($user) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOdd css_user_line" id="hidden_field_data_user" style="<?php echo $sStyleHidden_user; ?>"> <span class="scFormLabelOddFormat css_user_label"><span id="id_label_user"><?php echo $this->nm_new_label['user']; ?></span></span><br>
<?php if ($bTestReadOnly && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["user"]) &&  $this->nmgp_cmp_readonly["user"] == "on") { 

 ?>
<input type="hidden" name="user" value="<?php echo $this->form_encode_input($user) . "\">" . $user . ""; ?>
<?php } else { ?>
<span id="id_read_on_user" class="sc-ui-readonly-user css_user_line" style="<?php echo $sStyleReadLab_user; ?>"><?php echo $this->user; ?></span><span id="id_read_off_user" class="css_read_off_user" style="white-space: nowrap;<?php echo $sStyleReadInp_user; ?>">
 <input class="sc-js-input scFormObjectOdd css_user_obj" style="" id="id_sc_field_user" type=text name="user" value="<?php echo $this->form_encode_input($user) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
 </TD>
   <?php }?>





<?php if ($sc_hidden_yes > 0) { ?>


    <TD class="scFormDataOdd" colspan="<?php echo $sc_hidden_yes * 1; ?>" >&nbsp;</TD>




<?php } ?>
   </td></tr></table>
   </tr>
</TABLE></div><!-- bloco_f -->
</td></tr> 
<tr><td>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
    $NM_btn = false;
?>
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
        $sCondStyle = ($this->nmgp_botoes['ok'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bok", "scBtnFn_sys_format_ok()", "scBtnFn_sys_format_ok()", "sub_form_b", "", "Simpan", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
?>
       
<?php
           if ('' != $this->url_webhelp) {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bhelp", "scBtnFn_sys_format_hlp()", "scBtnFn_sys_format_hlp()", "sc_b_hlp_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente != 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard'])) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['nm_run_menu']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['nm_run_menu'] != 1))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
       
<?php
           if (($nm_apl_dependente == 1) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "Bsair_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
?>
            </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
   </td></tr> 
   </table> 
   </td></tr></table> 
<?php
if (!$NM_btn && isset($NM_ult_sep))
{
    echo "    <script language=\"javascript\">";
    echo "      document.getElementById('" .  $NM_ult_sep . "').style.display='none';";
    echo "    </script>";
}
unset($NM_ult_sep);
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_vclaim_rujukan_insert_mob");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_vclaim_rujukan_insert_mob");
 parent.scAjaxDetailHeight("form_vclaim_rujukan_insert_mob", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_vclaim_rujukan_insert_mob", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_vclaim_rujukan_insert_mob", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['sc_modal'])
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
	function scBtnFn_sc_btn_1() {
		if ($("#sc_sc_btn_1_top").length && $("#sc_sc_btn_1_top").is(":visible")) {
			
			 return;
		}
	}
	function scBtnFn_sc_btn_0() {
		if ($("#sc_sc_btn_0_top").length && $("#sc_sc_btn_0_top").is(":visible")) {
			sc_btn_sc_btn_0()
			 return;
		}
	}
	function scBtnFn_sc_btn_2() {
		if ($("#sc_sc_btn_2_top").length && $("#sc_sc_btn_2_top").is(":visible")) {
			
			 return;
		}
	}
	function scBtnFn_sys_format_ok() {
		if ($("#sub_form_b.sc-unique-btn-1").length && $("#sub_form_b.sc-unique-btn-1").is(":visible")) {
			nm_atualiza('alterar');
			 return;
		}
		if ($("#sub_form_b.sc-unique-btn-4").length && $("#sub_form_b.sc-unique-btn-4").is(":visible")) {
			nm_atualiza('alterar');
			 return;
		}
	}
	function scBtnFn_sys_format_hlp() {
		if ($("#sc_b_hlp_b").length && $("#sc_b_hlp_b").is(":visible")) {
			window.open('<?php echo $this->url_webhelp; ?>', '', 'resizable, scrollbars'); 
			 return;
		}
	}
	function scBtnFn_sys_format_sai() {
		if ($("#Bsair_b.sc-unique-btn-2").length && $("#Bsair_b.sc-unique-btn-2").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-3").length && $("#Bsair_b.sc-unique-btn-3").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-5").length && $("#Bsair_b.sc-unique-btn-5").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
		if ($("#Bsair_b.sc-unique-btn-6").length && $("#Bsair_b.sc-unique-btn-6").is(":visible")) {
			nm_saida_glo(); return false;
			 return;
		}
	}
</script>
<script type="text/javascript">
$(function() {
 $("#sc-id-mobile-in").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("in");
 });
 $("#sc-id-mobile-out").mouseover(function() {
  $(this).css("cursor", "pointer");
 }).click(function() {
  scMobileDisplayControl("out");
 });
});
function scMobileDisplayControl(sOption) {
 $("#sc-id-mobile-control").val(sOption);
 nm_atualiza("recarga_mobile");
}
</script>
<?php
       if (isset($_SESSION['scriptcase']['device_mobile']) && $_SESSION['scriptcase']['device_mobile'])
       {
?>
<span id="sc-id-mobile-out"><?php echo $this->Ini->Nm_lang['lang_version_web']; ?></span>
<?php
       }
?>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_vclaim_rujukan_insert_mob']['buttonStatus'] = $this->nmgp_botoes;
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
