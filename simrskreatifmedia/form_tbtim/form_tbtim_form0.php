<?php
class form_tbtim_form extends form_tbtim_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " tbtim"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " tbtim"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['sc_redir_atualiz'] == 'ok')
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
<style type="text/css">
	.sc.switch {
		position: relative;
		display: inline-flex;
	}

	.sc.switch span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.switch span {
		background: #DFDFDF;
		width: 22px;
		height: 14px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		padding: 0 3px;
		transition: all .2s linear;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.switch span:before {
		content: '\2713';
		display: inline-block;
		color: white;
		font-size: 10px;
		z-index: 0;
		position: absolute;
		top: 0;
		left: 4px;
	}

	.sc.switch span:after {
		content: '';
		background: white;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 1px;
		left: 1px;
		border-radius: 15px;
		transition: all .2s linear;
		z-index: 1;
	}

	.sc.switch input {
		margin-right: 10px;
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.switch input:disabled + span {
		opacity: 0.35;
	}

	.sc.switch input:checked + span {
		background: #66AFE9;
	}

	.sc.switch input:checked + span:after {
		left: calc(100% - 1px);
		transform: translateX(-100%);
	}

	.sc.radio {
		position: relative;
		display: inline-flex;
	}

	.sc.radio span {
		display: inline-block;
		margin-right: 5px;
	}

	.sc.radio span {
		background: #ffffff;
		border: 1px solid #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: relative;
		top: 0px;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		box-shadow: 0px 0px 2px rgba(164, 164, 164, 0.8) inset;
	}

	.sc.radio span:after {
		content: '';
		background: #66AFE9;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		top: 0;
		left: 0;
		border-radius: 15px;
		transition: all .2s;
		z-index: 1;
		transform: scale(0);
	}

	.sc.radio input {
		cursor: pointer;
		z-index: 2;
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		opacity: 0;
		margin: 0;
		padding: 0;
	}

	.sc.radio input:disabled + span {
		opacity: 0.35;
	}

	.sc.radio input:checked + span {
		background: #66AFE9;
	}

	.sc.radio input:checked + span:after {
		transform: translateX(-100%);
		transform: scale(1);
	}
</style>
<link rel="stylesheet" href="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/css/select2.min.css" type="text/css" />
<script type="text/javascript" src="<?php echo $this->Ini->path_prod ?>/third/jquery_plugin/select2/js/select2.full.min.js"></script>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.scInput2.js"></SCRIPT>
 <SCRIPT type="text/javascript" src="<?php echo $this->Ini->url_lib_js; ?>jquery.fieldSelection.js"></SCRIPT>
 <?php
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbtim/form_tbtim_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbtim_sajax_js.php");
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
function summary_atualiza(reg_ini, reg_qtd, reg_tot)
{
    nm_sumario = "[<?php echo $this->Ini->Nm_lang['lang_othr_smry_info']?>]";
    nm_sumario = nm_sumario.replace("?start?", reg_ini);
    nm_sumario = nm_sumario.replace("?final?", reg_qtd);
    nm_sumario = nm_sumario.replace("?total?", reg_tot);
    if (reg_qtd < 1) {
        nm_sumario = "";
    }
    if (document.getElementById("sc_b_summary_b")) document.getElementById("sc_b_summary_b").innerHTML = nm_sumario;
}
function navpage_atualiza(str_navpage)
{
    if (document.getElementById("sc_b_navpage_b")) document.getElementById("sc_b_navpage_b").innerHTML = str_navpage;
}
<?php

include_once('form_tbtim_jquery.php');

?>
var applicationKeys = "";

var hotkeyList = "";

function execHotKey(e, h) {
    var hotkey_fired = false;
  switch (true) {
    default:
      return true;
  }
  if (hotkey_fired) {
        e.preventDefault();
        return false;
    } else {
        return true;
    }
}
</script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys.inc.js"></script>
<script type="text/javascript" src="../_lib/lib/js/hotkeys_setup.js"></script>
<script type="text/javascript" src="../_lib/lib/js/frameControl.js"></script>
<script type="text/javascript">
function process_hotkeys(hotkey)
{
    return false;
}

 var scQSInit = true;
 var scQSPos  = {};
 var Dyn_Ini  = true;
 $(function() {


  scJQGeneralAdd();

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_tbtim_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_tbtim'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbtim'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " tbtim"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " tbtim"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R")
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
    if (($opcao_botoes == "novo") && (!$this->Embutida_call || $this->sc_evento == "novo" || $this->sc_evento == "insert" || $this->sc_evento == "incluir")) {
        $sCondStyle = ($this->nmgp_botoes['insert'] == "on" && $this->nmgp_botoes['cancel'] == "on") && ($this->nm_flag_saida_novo != "S" || $this->nmgp_botoes['exit'] != "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bcancelar", "scBtnFn_sys_format_cnl()", "scBtnFn_sys_format_cnl()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
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
    if (($opcao_botoes == "novo") && (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && ($nm_apl_dependente != 1 || $this->nm_Start_new) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = (($this->nm_flag_saida_novo == "S" || ($this->nm_Start_new && !$this->aba_iframe)) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes == "novo") && (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] == "R") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']))) {
        $sCondStyle = ($this->nm_flag_saida_novo == "S" && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-9", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && (!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-10", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['kelas_']))
   {
       $this->nmgp_cmp_hidden['kelas_'] = 'off';
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
   <?php if (isset($this->nmgp_cmp_hidden['posisi_']) && $this->nmgp_cmp_hidden['posisi_'] == 'off') { $sStyleHidden_posisi_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['posisi_']) || $this->nmgp_cmp_hidden['posisi_'] == 'on') {
      if (!isset($this->nm_new_label['posisi_'])) {
          $this->nm_new_label['posisi_'] = "Posisi"; } ?>

    <TD class="scFormLabelOddMult css_posisi__label" id="hidden_field_label_posisi_" style="<?php echo $sStyleHidden_posisi_; ?>" > <?php echo $this->nm_new_label['posisi_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['code_']) && $this->nmgp_cmp_hidden['code_'] == 'off') { $sStyleHidden_code_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['code_']) || $this->nmgp_cmp_hidden['code_'] == 'on') {
      if (!isset($this->nm_new_label['code_'])) {
          $this->nm_new_label['code_'] = "Nama"; } ?>

    <TD class="scFormLabelOddMult css_code__label" id="hidden_field_label_code_" style="<?php echo $sStyleHidden_code_; ?>" > <?php echo $this->nm_new_label['code_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['actcode_']) && $this->nmgp_cmp_hidden['actcode_'] == 'off') { $sStyleHidden_actcode_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['actcode_']) || $this->nmgp_cmp_hidden['actcode_'] == 'on') {
      if (!isset($this->nm_new_label['actcode_'])) {
          $this->nm_new_label['actcode_'] = "Tindakan"; } ?>

    <TD class="scFormLabelOddMult css_actcode__label" id="hidden_field_label_actcode_" style="<?php echo $sStyleHidden_actcode_; ?>" > <?php echo $this->nm_new_label['actcode_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['penolong_']) && $this->nmgp_cmp_hidden['penolong_'] == 'off') { $sStyleHidden_penolong_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['penolong_']) || $this->nmgp_cmp_hidden['penolong_'] == 'on') {
      if (!isset($this->nm_new_label['penolong_'])) {
          $this->nm_new_label['penolong_'] = "Penolong ?"; } ?>

    <TD class="scFormLabelOddMult css_penolong__label" id="hidden_field_label_penolong_" style="<?php echo $sStyleHidden_penolong_; ?>" > <?php echo $this->nm_new_label['penolong_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['disc_']) && $this->nmgp_cmp_hidden['disc_'] == 'off') { $sStyleHidden_disc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['disc_']) || $this->nmgp_cmp_hidden['disc_'] == 'on') {
      if (!isset($this->nm_new_label['disc_'])) {
          $this->nm_new_label['disc_'] = "Diskon (%)"; } ?>

    <TD class="scFormLabelOddMult css_disc__label" id="hidden_field_label_disc_" style="<?php echo $sStyleHidden_disc_; ?>" > <?php echo $this->nm_new_label['disc_'] ?> </TD>
   <?php } ?>

   <?php if ((!isset($this->nmgp_cmp_hidden['id_']) || $this->nmgp_cmp_hidden['id_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_'])) {
          $this->nm_new_label['id_'] = "Id"; } ?>

    <TD class="scFormLabelOddMult css_id__label" id="hidden_field_label_id_" style="<?php echo $sStyleHidden_id_; ?>" > <?php echo $this->nm_new_label['id_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['kelas_']) && $this->nmgp_cmp_hidden['kelas_'] == 'off') { $sStyleHidden_kelas_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['kelas_']) || $this->nmgp_cmp_hidden['kelas_'] == 'on') {
      if (!isset($this->nm_new_label['kelas_'])) {
          $this->nm_new_label['kelas_'] = "Kelas"; } ?>

    <TD class="scFormLabelOddMult css_kelas__label" id="hidden_field_label_kelas_" style="<?php echo $sStyleHidden_kelas_; ?>" > <?php echo $this->nm_new_label['kelas_'] ?> </TD>
   <?php } ?>





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
       $iStart = sizeof($this->form_vert_form_tbtim);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_tbtim = $this->form_vert_form_tbtim;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_tbtim))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
   foreach ($this->form_vert_form_tbtim as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->trancode_ = $this->form_vert_form_tbtim[$sc_seq_vert]['trancode_'];
       $this->nama_ = $this->form_vert_form_tbtim[$sc_seq_vert]['nama_'];
       $this->actname_ = $this->form_vert_form_tbtim[$sc_seq_vert]['actname_'];
       $this->fee_ = $this->form_vert_form_tbtim[$sc_seq_vert]['fee_'];
       $this->share_ = $this->form_vert_form_tbtim[$sc_seq_vert]['share_'];
       $this->pkp_ = $this->form_vert_form_tbtim[$sc_seq_vert]['pkp_'];
       $this->shareasli_ = $this->form_vert_form_tbtim[$sc_seq_vert]['shareasli_'];
       $this->fill_ = $this->form_vert_form_tbtim[$sc_seq_vert]['fill_'];
       $this->struckno_ = $this->form_vert_form_tbtim[$sc_seq_vert]['struckno_'];
       $this->include_ = $this->form_vert_form_tbtim[$sc_seq_vert]['include_'];
       $this->basicrate_ = $this->form_vert_form_tbtim[$sc_seq_vert]['basicrate_'];
       $this->markup_ = $this->form_vert_form_tbtim[$sc_seq_vert]['markup_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['posisi_'] = true;
           $this->nmgp_cmp_readonly['code_'] = true;
           $this->nmgp_cmp_readonly['actcode_'] = true;
           $this->nmgp_cmp_readonly['penolong_'] = true;
           $this->nmgp_cmp_readonly['disc_'] = true;
           $this->nmgp_cmp_readonly['id_'] = true;
           $this->nmgp_cmp_readonly['kelas_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['posisi_']) || $this->nmgp_cmp_readonly['posisi_'] != "on") {$this->nmgp_cmp_readonly['posisi_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['code_']) || $this->nmgp_cmp_readonly['code_'] != "on") {$this->nmgp_cmp_readonly['code_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['actcode_']) || $this->nmgp_cmp_readonly['actcode_'] != "on") {$this->nmgp_cmp_readonly['actcode_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['penolong_']) || $this->nmgp_cmp_readonly['penolong_'] != "on") {$this->nmgp_cmp_readonly['penolong_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['disc_']) || $this->nmgp_cmp_readonly['disc_'] != "on") {$this->nmgp_cmp_readonly['disc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['kelas_']) || $this->nmgp_cmp_readonly['kelas_'] != "on") {$this->nmgp_cmp_readonly['kelas_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->posisi_ = $this->form_vert_form_tbtim[$sc_seq_vert]['posisi_']; 
       $posisi_ = $this->posisi_; 
       $sStyleHidden_posisi_ = '';
       if (isset($sCheckRead_posisi_))
       {
           unset($sCheckRead_posisi_);
       }
       if (isset($this->nmgp_cmp_readonly['posisi_']))
       {
           $sCheckRead_posisi_ = $this->nmgp_cmp_readonly['posisi_'];
       }
       if (isset($this->nmgp_cmp_hidden['posisi_']) && $this->nmgp_cmp_hidden['posisi_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['posisi_']);
           $sStyleHidden_posisi_ = 'display: none;';
       }
       $bTestReadOnly_posisi_ = true;
       $sStyleReadLab_posisi_ = 'display: none;';
       $sStyleReadInp_posisi_ = '';
       if (isset($this->nmgp_cmp_readonly['posisi_']) && $this->nmgp_cmp_readonly['posisi_'] == 'on')
       {
           $bTestReadOnly_posisi_ = false;
           unset($this->nmgp_cmp_readonly['posisi_']);
           $sStyleReadLab_posisi_ = '';
           $sStyleReadInp_posisi_ = 'display: none;';
       }
       $this->code_ = $this->form_vert_form_tbtim[$sc_seq_vert]['code_']; 
       $code_ = $this->code_; 
       $sStyleHidden_code_ = '';
       if (isset($sCheckRead_code_))
       {
           unset($sCheckRead_code_);
       }
       if (isset($this->nmgp_cmp_readonly['code_']))
       {
           $sCheckRead_code_ = $this->nmgp_cmp_readonly['code_'];
       }
       if (isset($this->nmgp_cmp_hidden['code_']) && $this->nmgp_cmp_hidden['code_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['code_']);
           $sStyleHidden_code_ = 'display: none;';
       }
       $bTestReadOnly_code_ = true;
       $sStyleReadLab_code_ = 'display: none;';
       $sStyleReadInp_code_ = '';
       if (isset($this->nmgp_cmp_readonly['code_']) && $this->nmgp_cmp_readonly['code_'] == 'on')
       {
           $bTestReadOnly_code_ = false;
           unset($this->nmgp_cmp_readonly['code_']);
           $sStyleReadLab_code_ = '';
           $sStyleReadInp_code_ = 'display: none;';
       }
       $this->actcode_ = $this->form_vert_form_tbtim[$sc_seq_vert]['actcode_']; 
       $actcode_ = $this->actcode_; 
       $sStyleHidden_actcode_ = '';
       if (isset($sCheckRead_actcode_))
       {
           unset($sCheckRead_actcode_);
       }
       if (isset($this->nmgp_cmp_readonly['actcode_']))
       {
           $sCheckRead_actcode_ = $this->nmgp_cmp_readonly['actcode_'];
       }
       if (isset($this->nmgp_cmp_hidden['actcode_']) && $this->nmgp_cmp_hidden['actcode_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['actcode_']);
           $sStyleHidden_actcode_ = 'display: none;';
       }
       $bTestReadOnly_actcode_ = true;
       $sStyleReadLab_actcode_ = 'display: none;';
       $sStyleReadInp_actcode_ = '';
       if (isset($this->nmgp_cmp_readonly['actcode_']) && $this->nmgp_cmp_readonly['actcode_'] == 'on')
       {
           $bTestReadOnly_actcode_ = false;
           unset($this->nmgp_cmp_readonly['actcode_']);
           $sStyleReadLab_actcode_ = '';
           $sStyleReadInp_actcode_ = 'display: none;';
       }
       $this->penolong_ = $this->form_vert_form_tbtim[$sc_seq_vert]['penolong_']; 
       $penolong_ = $this->penolong_; 
       $sStyleHidden_penolong_ = '';
       if (isset($sCheckRead_penolong_))
       {
           unset($sCheckRead_penolong_);
       }
       if (isset($this->nmgp_cmp_readonly['penolong_']))
       {
           $sCheckRead_penolong_ = $this->nmgp_cmp_readonly['penolong_'];
       }
       if (isset($this->nmgp_cmp_hidden['penolong_']) && $this->nmgp_cmp_hidden['penolong_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['penolong_']);
           $sStyleHidden_penolong_ = 'display: none;';
       }
       $bTestReadOnly_penolong_ = true;
       $sStyleReadLab_penolong_ = 'display: none;';
       $sStyleReadInp_penolong_ = '';
       if (isset($this->nmgp_cmp_readonly['penolong_']) && $this->nmgp_cmp_readonly['penolong_'] == 'on')
       {
           $bTestReadOnly_penolong_ = false;
           unset($this->nmgp_cmp_readonly['penolong_']);
           $sStyleReadLab_penolong_ = '';
           $sStyleReadInp_penolong_ = 'display: none;';
       }
       $this->disc_ = $this->form_vert_form_tbtim[$sc_seq_vert]['disc_']; 
       $disc_ = $this->disc_; 
       $sStyleHidden_disc_ = '';
       if (isset($sCheckRead_disc_))
       {
           unset($sCheckRead_disc_);
       }
       if (isset($this->nmgp_cmp_readonly['disc_']))
       {
           $sCheckRead_disc_ = $this->nmgp_cmp_readonly['disc_'];
       }
       if (isset($this->nmgp_cmp_hidden['disc_']) && $this->nmgp_cmp_hidden['disc_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['disc_']);
           $sStyleHidden_disc_ = 'display: none;';
       }
       $bTestReadOnly_disc_ = true;
       $sStyleReadLab_disc_ = 'display: none;';
       $sStyleReadInp_disc_ = '';
       if (isset($this->nmgp_cmp_readonly['disc_']) && $this->nmgp_cmp_readonly['disc_'] == 'on')
       {
           $bTestReadOnly_disc_ = false;
           unset($this->nmgp_cmp_readonly['disc_']);
           $sStyleReadLab_disc_ = '';
           $sStyleReadInp_disc_ = 'display: none;';
       }
       $this->id_ = $this->form_vert_form_tbtim[$sc_seq_vert]['id_']; 
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
       $this->kelas_ = $this->form_vert_form_tbtim[$sc_seq_vert]['kelas_']; 
       $kelas_ = $this->kelas_; 
       if (!isset($this->nmgp_cmp_hidden['kelas_']))
       {
           $this->nmgp_cmp_hidden['kelas_'] = 'off';
       }
       $sStyleHidden_kelas_ = '';
       if (isset($sCheckRead_kelas_))
       {
           unset($sCheckRead_kelas_);
       }
       if (isset($this->nmgp_cmp_readonly['kelas_']))
       {
           $sCheckRead_kelas_ = $this->nmgp_cmp_readonly['kelas_'];
       }
       if (isset($this->nmgp_cmp_hidden['kelas_']) && $this->nmgp_cmp_hidden['kelas_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['kelas_']);
           $sStyleHidden_kelas_ = 'display: none;';
       }
       $bTestReadOnly_kelas_ = true;
       $sStyleReadLab_kelas_ = 'display: none;';
       $sStyleReadInp_kelas_ = '';
       if (isset($this->nmgp_cmp_readonly['kelas_']) && $this->nmgp_cmp_readonly['kelas_'] == 'on')
       {
           $bTestReadOnly_kelas_ = false;
           unset($this->nmgp_cmp_readonly['kelas_']);
           $sStyleReadLab_kelas_ = '';
           $sStyleReadInp_kelas_ = 'display: none;';
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "sc_inline_form(" . $sc_seq_vert . ", 'id_', 500, 450)", "sc_inline_form(" . $sc_seq_vert . ", 'id_', 500, 450)", "sc_open_line_" . $sc_seq_vert . "", "", "", "" . $sDisplayUpdate. "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_edit", "sc_inline_form(" . $sc_seq_vert . ", 'id_', 500, 450)", "sc_inline_form(" . $sc_seq_vert . ", 'id_', 500, 450)", "sc_open_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>

<?php if ($this->nmgp_botoes['update'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_alterar", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "findPos(this); nm_atualiza_line('alterar', " . $sc_seq_vert . ")", "sc_upd_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php }?>
<?php if ($this->nmgp_botoes['insert'] == "on") {?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_tbtim_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_tbtim_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbtim_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_tbtim_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbtim_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_tbtim_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['posisi_']) && $this->nmgp_cmp_hidden['posisi_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="posisi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->posisi_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_posisi__line" id="hidden_field_data_posisi_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_posisi_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_posisi__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_posisi_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["posisi_"]) &&  $this->nmgp_cmp_readonly["posisi_"] == "on") { 

$posisi__look = "";
 if ($this->posisi_ == "BIDAN") { $posisi__look .= "BIDAN" ;} 
 if ($this->posisi_ == "DOKTER OPERATOR") { $posisi__look .= "DOKTER OPERATOR" ;} 
 if ($this->posisi_ == "DOKTER ASISTEN") { $posisi__look .= "DOKTER ASISTEN" ;} 
 if ($this->posisi_ == "DOKTER ANASTESI") { $posisi__look .= "DOKTER ANASTESI" ;} 
 if ($this->posisi_ == "PENATA ANASTESI") { $posisi__look .= "PENATA ANASTESI" ;} 
 if ($this->posisi_ == "DOKTER BEDAH") { $posisi__look .= "DOKTER BEDAH" ;} 
 if ($this->posisi_ == "DOKTER ANAK") { $posisi__look .= "DOKTER ANAK" ;} 
 if ($this->posisi_ == "TIM OK") { $posisi__look .= "TIM OK" ;} 
 if ($this->posisi_ == "TIM OK ON CALL") { $posisi__look .= "TIM OK ON CALL" ;} 
 if (empty($posisi__look)) { $posisi__look = $this->posisi_; }
?>
<input type="hidden" name="posisi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($posisi_) . "\">" . $posisi__look . ""; ?>
<?php } else { ?>
<?php

$posisi__look = "";
 if ($this->posisi_ == "BIDAN") { $posisi__look .= "BIDAN" ;} 
 if ($this->posisi_ == "DOKTER OPERATOR") { $posisi__look .= "DOKTER OPERATOR" ;} 
 if ($this->posisi_ == "DOKTER ASISTEN") { $posisi__look .= "DOKTER ASISTEN" ;} 
 if ($this->posisi_ == "DOKTER ANASTESI") { $posisi__look .= "DOKTER ANASTESI" ;} 
 if ($this->posisi_ == "PENATA ANASTESI") { $posisi__look .= "PENATA ANASTESI" ;} 
 if ($this->posisi_ == "DOKTER BEDAH") { $posisi__look .= "DOKTER BEDAH" ;} 
 if ($this->posisi_ == "DOKTER ANAK") { $posisi__look .= "DOKTER ANAK" ;} 
 if ($this->posisi_ == "TIM OK") { $posisi__look .= "TIM OK" ;} 
 if ($this->posisi_ == "TIM OK ON CALL") { $posisi__look .= "TIM OK ON CALL" ;} 
 if (empty($posisi__look)) { $posisi__look = $this->posisi_; }
?>
<span id="id_read_on_posisi_<?php echo $sc_seq_vert ; ?>" class="css_posisi__line"  style="<?php echo $sStyleReadLab_posisi_; ?>"><?php echo $this->form_encode_input($posisi__look); ?></span><span id="id_read_off_posisi_<?php echo $sc_seq_vert ; ?>" class="css_read_off_posisi_" style="white-space: nowrap; <?php echo $sStyleReadInp_posisi_; ?>">
 <span id="idAjaxSelect_posisi_<?php echo $sc_seq_vert ?>"><select class="sc-js-input scFormObjectOddMult css_posisi__obj" style="" id="id_sc_field_posisi_<?php echo $sc_seq_vert ?>" name="posisi_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="BIDAN" <?php  if ($this->posisi_ == "BIDAN") { echo " selected" ;} ?>>BIDAN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_posisi_'][] = 'BIDAN'; ?>
 <option  value="DOKTER OPERATOR" <?php  if ($this->posisi_ == "DOKTER OPERATOR") { echo " selected" ;} ?>>DOKTER OPERATOR</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_posisi_'][] = 'DOKTER OPERATOR'; ?>
 <option  value="DOKTER ASISTEN" <?php  if ($this->posisi_ == "DOKTER ASISTEN") { echo " selected" ;} ?>>DOKTER ASISTEN</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_posisi_'][] = 'DOKTER ASISTEN'; ?>
 <option  value="DOKTER ANASTESI" <?php  if ($this->posisi_ == "DOKTER ANASTESI") { echo " selected" ;} ?>>DOKTER ANASTESI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_posisi_'][] = 'DOKTER ANASTESI'; ?>
 <option  value="PENATA ANASTESI" <?php  if ($this->posisi_ == "PENATA ANASTESI") { echo " selected" ;} ?>>PENATA ANASTESI</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_posisi_'][] = 'PENATA ANASTESI'; ?>
 <option  value="DOKTER BEDAH" <?php  if ($this->posisi_ == "DOKTER BEDAH") { echo " selected" ;} ?>>DOKTER BEDAH</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_posisi_'][] = 'DOKTER BEDAH'; ?>
 <option  value="DOKTER ANAK" <?php  if ($this->posisi_ == "DOKTER ANAK") { echo " selected" ;} ?>>DOKTER ANAK</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_posisi_'][] = 'DOKTER ANAK'; ?>
 <option  value="TIM OK" <?php  if ($this->posisi_ == "TIM OK") { echo " selected" ;} ?>>TIM OK</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_posisi_'][] = 'TIM OK'; ?>
 <option  value="TIM OK ON CALL" <?php  if ($this->posisi_ == "TIM OK ON CALL") { echo " selected" ;} ?>>TIM OK ON CALL</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_posisi_'][] = 'TIM OK ON CALL'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_posisi_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_posisi_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['code_']) && $this->nmgp_cmp_hidden['code_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="code_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->code_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_code__line" id="hidden_field_data_code_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_code_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_code__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_code_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["code_"]) &&  $this->nmgp_cmp_readonly["code_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_code_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_code_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_code_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_code_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_code_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_code_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_code_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_code_'] = array(); 
    }

   $old_value_disc_ = $this->disc_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_disc_ = $this->disc_;
   $unformatted_value_id_ = $this->id_;

   $penolong__val_str = "''";
   if (!empty($this->penolong_))
   {
       if (is_array($this->penolong_))
       {
           $Tmp_array = $this->penolong_;
       }
       else
       {
           $Tmp_array = explode(";", $this->penolong_);
       }
       $penolong__val_str = "";
       foreach ($Tmp_array as $Tmp_val_cmp)
       {
          if ("" != $penolong__val_str)
          {
             $penolong__val_str .= ", ";
          }
          $penolong__val_str .= "'$Tmp_val_cmp'";
       }
   }
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT docCode, concat(gelar,' ', name,', ', spec)  FROM tbdoctor ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT docCode, gelar&' '&name&', '&spec  FROM tbdoctor ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT docCode, gelar + ' ' + name + ', ' + spec  FROM tbdoctor ORDER BY gelar, name, spec";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor ORDER BY gelar, name, spec";
   }
   else
   {
       $nm_comando = "SELECT docCode, gelar||' '||name||', '||spec  FROM tbdoctor ORDER BY gelar, name, spec";
   }

   $this->disc_ = $old_value_disc_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_code_'][] = $rs->fields[0];
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
   $code__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->code__1))
          {
              foreach ($this->code__1 as $tmp_code_)
              {
                  if (trim($tmp_code_) === trim($cadaselect[1])) { $code__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->code_) === trim($cadaselect[1])) { $code__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="code_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($code_) . "\">" . $code__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_code_();
   $x = 0 ; 
   $code__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->code__1))
          {
              foreach ($this->code__1 as $tmp_code_)
              {
                  if (trim($tmp_code_) === trim($cadaselect[1])) { $code__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->code_) === trim($cadaselect[1])) { $code__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($code__look))
          {
              $code__look = $this->code_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_code_" . $sc_seq_vert . "\" class=\"css_code__line\" style=\"" .  $sStyleReadLab_code_ . "\">" . $this->form_encode_input($code__look) . "</span><span id=\"id_read_off_code_" . $sc_seq_vert . "\" class=\"css_read_off_code_\" style=\"white-space: nowrap; " . $sStyleReadInp_code_ . "\">";
   echo " <span id=\"idAjaxSelect_code_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_code__obj\" style=\"\" id=\"id_sc_field_code_" . $sc_seq_vert . "\" name=\"code_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_code_'][] = ''; 
   echo "  <option value=\"\"> </option>" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->code_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->code_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_code_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_code_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['actcode_']) && $this->nmgp_cmp_hidden['actcode_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="actcode_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->actcode_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_actcode__line" id="hidden_field_data_actcode_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_actcode_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_actcode__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_actcode_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["actcode_"]) &&  $this->nmgp_cmp_readonly["actcode_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_actcode_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_actcode_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_actcode_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_actcode_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_actcode_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_actcode_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_actcode_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_actcode_'] = array(); 
    }

   $old_value_disc_ = $this->disc_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_disc_ = $this->disc_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT 	a.kodeTindakan, 	a.namaTindakan  FROM 	tbtindakan a 	LEFT JOIN tbpoli b ON b.NAME = a.jenisTindakan 	LEFT JOIN tbdoctor c ON c.poli = b.polyCode WHERE 	c.docCode = '$this->code_'  	AND a.kategori = 'RI'";

   $this->disc_ = $old_value_disc_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_actcode_'][] = $rs->fields[0];
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
   $actcode__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->actcode__1))
          {
              foreach ($this->actcode__1 as $tmp_actcode_)
              {
                  if (trim($tmp_actcode_) === trim($cadaselect[1])) { $actcode__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->actcode_) === trim($cadaselect[1])) { $actcode__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="actcode_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($actcode_) . "\">" . $actcode__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_actcode_();
   $x = 0 ; 
   $actcode__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->actcode__1))
          {
              foreach ($this->actcode__1 as $tmp_actcode_)
              {
                  if (trim($tmp_actcode_) === trim($cadaselect[1])) { $actcode__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->actcode_) === trim($cadaselect[1])) { $actcode__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($actcode__look))
          {
              $actcode__look = $this->actcode_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_actcode_" . $sc_seq_vert . "\" class=\"css_actcode__line\" style=\"" .  $sStyleReadLab_actcode_ . "\">" . $this->form_encode_input($actcode__look) . "</span><span id=\"id_read_off_actcode_" . $sc_seq_vert . "\" class=\"css_read_off_actcode_\" style=\"white-space: nowrap; " . $sStyleReadInp_actcode_ . "\">";
   echo " <span id=\"idAjaxSelect_actcode_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_actcode__obj\" style=\"\" id=\"id_sc_field_actcode_" . $sc_seq_vert . "\" name=\"actcode_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->actcode_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->actcode_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_actcode_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_actcode_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['penolong_']) && $this->nmgp_cmp_hidden['penolong_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="penolong_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->penolong_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>
<?php 
  if ($this->nmgp_opcao != "recarga") 
  {
      $this->penolong__1 = explode(";", trim($this->penolong_));
  } 
  else
  {
      if (empty($this->penolong_))
      {
          $this->penolong__1= array(); 
          $this->penolong_= "0";
      } 
      else
      {
          $this->penolong__1= $this->penolong_; 
          $this->penolong_= ""; 
          foreach ($this->penolong__1 as $cada_penolong_)
          {
             if (!empty($penolong_))
             {
                 $this->penolong_.= ";"; 
             } 
             $this->penolong_.= $cada_penolong_; 
          } 
      } 
  } 
?> 

    <TD class="scFormDataOddMult css_penolong__line" id="hidden_field_data_penolong_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_penolong_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_penolong__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_penolong_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["penolong_"]) &&  $this->nmgp_cmp_readonly["penolong_"] == "on") { 

$penolong__look = "";
 if ($this->penolong_ == "1") { $penolong__look .= "Ya" ;} 
 if (empty($penolong__look)) { $penolong__look = $this->penolong_; }
?>
<input type="hidden" name="penolong_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($penolong_) . "\">" . $penolong__look . ""; ?>
<?php } else { ?>

<?php

$penolong__look = "";
 if ($this->penolong_ == "1") { $penolong__look .= "Ya" ;} 
 if (empty($penolong__look)) { $penolong__look = $this->penolong_; }
?>
<span id="id_read_on_penolong_<?php echo $sc_seq_vert ; ?>" class="css_penolong__line" style="<?php echo $sStyleReadLab_penolong_; ?>"><?php echo $this->form_encode_input($penolong__look); ?></span><span id="id_read_off_penolong_<?php echo $sc_seq_vert ; ?>" class="css_read_off_penolong_ css_penolong__line" style="<?php echo $sStyleReadInp_penolong_; ?>"><?php echo "<div id=\"idAjaxCheckbox_penolong_" . $sc_seq_vert . "\" style=\"display: inline-block\" class=\"css_penolong__line\">\r\n"; ?><TABLE cellspacing=0 cellpadding=0 border=0><TR>
  <TD class="scFormDataFontOddMult css_penolong__line"><?php $tempOptionId = "id-opt-penolong_" . $sc_seq_vert . "-1"; ?>
 <div class="sc switch">
 <input type=checkbox id="<?php echo $tempOptionId ?>" class="sc-ui-checkbox-penolong_ sc-ui-checkbox-penolong_<?php echo $sc_seq_vert ?>" name="penolong_<?php echo $sc_seq_vert ?>[]" value="1"
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_penolong_'][] = '1'; ?>
<?php  if (in_array("1", $this->penolong__1))  { echo " checked" ;} ?> onClick="nm_check_insert(<?php echo $sc_seq_vert ?>);" ><span></span>
<label for="<?php echo $tempOptionId ?>">Ya</label> </div>
</TD>
</TR></TABLE>
<?php echo "</div>\r\n"; ?></span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_penolong_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_penolong_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['disc_']) && $this->nmgp_cmp_hidden['disc_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="disc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($disc_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_disc__line" id="hidden_field_data_disc_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_disc_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_disc__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_disc_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["disc_"]) &&  $this->nmgp_cmp_readonly["disc_"] == "on") { 

 ?>
<input type="hidden" name="disc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($disc_) . "\">" . $disc_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_disc_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-disc_<?php echo $sc_seq_vert ?> css_disc__line" style="<?php echo $sStyleReadLab_disc_; ?>"><?php echo $this->disc_; ?></span><span id="id_read_off_disc_<?php echo $sc_seq_vert ?>" class="css_read_off_disc_" style="white-space: nowrap;<?php echo $sStyleReadInp_disc_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_disc__obj" style="" id="id_sc_field_disc_<?php echo $sc_seq_vert ?>" type=text name="disc_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($disc_) ?>"
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '', thousandsFormat: <?php echo $this->field_config['disc_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['disc_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: true, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_disc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_disc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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

   <?php if (isset($this->nmgp_cmp_hidden['kelas_']) && $this->nmgp_cmp_hidden['kelas_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="kelas_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->kelas_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_kelas__line" id="hidden_field_data_kelas_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_kelas_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_kelas__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_kelas_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["kelas_"]) &&  $this->nmgp_cmp_readonly["kelas_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_kelas_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_kelas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_kelas_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_kelas_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_kelas_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_kelas_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_kelas_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_kelas_'] = array(); 
    }

   $old_value_disc_ = $this->disc_;
   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_disc_ = $this->disc_;
   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT 	kelas FROM 	tbadmrawatinap WHERE 	tranCode = ( 		SELECT 			c.inapCode AS inapCode 		FROM 			( 				SELECT 					tranCode, 					inapCode 				FROM 					tbdetailok 				UNION ALL 					SELECT 						tranCode, 						inapCode 					FROM 						tbdetailvk 			) c 		WHERE 			c.tranCode = '$this->trancode_' 	)";

   $this->disc_ = $old_value_disc_;
   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['Lookup_kelas_'][] = $rs->fields[0];
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
<input type="hidden" name="kelas_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($kelas_) . "\">" . $kelas__look . ""; ?>
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
   echo "<span id=\"id_read_on_kelas_" . $sc_seq_vert . "\" class=\"css_kelas__line\" style=\"" .  $sStyleReadLab_kelas_ . "\">" . $this->form_encode_input($kelas__look) . "</span><span id=\"id_read_off_kelas_" . $sc_seq_vert . "\" class=\"css_read_off_kelas_\" style=\"white-space: nowrap; " . $sStyleReadInp_kelas_ . "\">";
   echo " <span id=\"idAjaxSelect_kelas_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_kelas__obj\" style=\"\" id=\"id_sc_field_kelas_" . $sc_seq_vert . "\" name=\"kelas_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_kelas_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_kelas_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_posisi_))
       {
           $this->nmgp_cmp_readonly['posisi_'] = $sCheckRead_posisi_;
       }
       if ('display: none;' == $sStyleHidden_posisi_)
       {
           $this->nmgp_cmp_hidden['posisi_'] = 'off';
       }
       if (isset($sCheckRead_code_))
       {
           $this->nmgp_cmp_readonly['code_'] = $sCheckRead_code_;
       }
       if ('display: none;' == $sStyleHidden_code_)
       {
           $this->nmgp_cmp_hidden['code_'] = 'off';
       }
       if (isset($sCheckRead_actcode_))
       {
           $this->nmgp_cmp_readonly['actcode_'] = $sCheckRead_actcode_;
       }
       if ('display: none;' == $sStyleHidden_actcode_)
       {
           $this->nmgp_cmp_hidden['actcode_'] = 'off';
       }
       if (isset($sCheckRead_penolong_))
       {
           $this->nmgp_cmp_readonly['penolong_'] = $sCheckRead_penolong_;
       }
       if ('display: none;' == $sStyleHidden_penolong_)
       {
           $this->nmgp_cmp_hidden['penolong_'] = 'off';
       }
       if (isset($sCheckRead_disc_))
       {
           $this->nmgp_cmp_readonly['disc_'] = $sCheckRead_disc_;
       }
       if ('display: none;' == $sStyleHidden_disc_)
       {
           $this->nmgp_cmp_hidden['disc_'] = 'off';
       }
       if (isset($sCheckRead_id_))
       {
           $this->nmgp_cmp_readonly['id_'] = $sCheckRead_id_;
       }
       if ('display: none;' == $sStyleHidden_id_)
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }
       if (isset($sCheckRead_kelas_))
       {
           $this->nmgp_cmp_readonly['kelas_'] = $sCheckRead_kelas_;
       }
       if ('display: none;' == $sStyleHidden_kelas_)
       {
           $this->nmgp_cmp_hidden['kelas_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_tbtim = $guarda_form_vert_form_tbtim;
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
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['goto'] == "on")
      {
        $sCondStyle = '';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "birpara", "scBtnFn_sys_GridPermiteSeq()", "scBtnFn_sys_GridPermiteSeq()", "brec_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 
<?php
?> 
   <input type="text" class="scFormToolbarInput" name="nmgp_rec_b" value="" style="width:25px;vertical-align: middle;"/> 
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-11", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-12", "", "");?>
 
<?php
        $NM_btn = true;
    }
if ($opcao_botoes != "novo" && $this->nmgp_botoes['navpage'] == "on")
{
?> 
     <span nowrap id="sc_b_navpage_b" class="scFormToolbarPadding"></span> 
<?php 
}
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['forward'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-13", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-14", "", "");?>
 
<?php
        $NM_btn = true;
    }
?> 
     </td> 
     <td nowrap align="right" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
if ($opcao_botoes != "novo" && $this->nmgp_botoes['summary'] == "on")
{
?> 
     <span nowrap id="sc_b_summary_b" class="scFormToolbarPadding"></span> 
<?php 
}
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R")
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
<?php if ('novo' != $this->nmgp_opcao || $this->Embutida_form) { ?><script>nav_atualiza(Nav_permite_ret, Nav_permite_ava, 'b');</script><?php } ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbtim");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbtim");
 parent.scAjaxDetailHeight("form_tbtim", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbtim", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbtim", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['sc_modal'])
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
			do_ajax_form_tbtim_add_new_line(); return false;
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
	function scBtnFn_sys_format_cnl() {
		if ($("#sc_b_sai_t.sc-unique-btn-5").length && $("#sc_b_sai_t.sc-unique-btn-5").is(":visible")) {
			<?php echo $this->NM_cancel_insert_new ?> document.F5.submit();
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
	}
	function scBtnFn_sys_GridPermiteSeq() {
		if ($("#brec_b").length && $("#brec_b").is(":visible")) {
			nm_navpage(document.F1.nmgp_rec_b.value, 'P'); document.F1.nmgp_rec_b.value = '';
			 return;
		}
	}
	function scBtnFn_sys_format_ini() {
		if ($("#sc_b_ini_b.sc-unique-btn-11").length && $("#sc_b_ini_b.sc-unique-btn-11").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-12").length && $("#sc_b_ret_b.sc-unique-btn-12").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-13").length && $("#sc_b_avc_b.sc-unique-btn-13").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-14").length && $("#sc_b_fim_b.sc-unique-btn-14").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtim']['buttonStatus'] = $this->nmgp_botoes;
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
