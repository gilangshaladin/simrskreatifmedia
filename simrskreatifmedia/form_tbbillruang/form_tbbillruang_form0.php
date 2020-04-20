<?php
class form_tbbillruang_form extends form_tbbillruang_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " tbbillruang"); } else { echo strip_tags("" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " tbbillruang"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['sc_redir_atualiz'] == 'ok')
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
  #quicksearchph_t {
   position: relative;
  }
  #quicksearchph_t img {
   position: absolute;
   top: 0;
   right: 0;
  }
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
.css_read_off_check_in_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_check_out_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_trandate_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbbillruang/form_tbbillruang_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbbillruang_sajax_js.php");
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
     if (F_name == "trandate_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "trandate_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
            cmp_name = "calendar_trandate_" + ii;
            $('input[id=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc) {
              $("#id_sc_field_trandate_" + ii).datepicker("destroy");
            }
            else {
              scJQCalendarAdd(ii);
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("trandate_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_tbbillruang_jquery.php');

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

  $('#SC_fast_search_t').keyup(function(e) {
   scQuickSearchKeyUp('t', e);
  });

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
     scQuickSearchInit(false, '');
     if (document.getElementById('SC_fast_search_t')) {
         scQuickSearchKeyUp('t', null);
     }
     scQSInit = false;
   });
   function scQuickSearchSubmit_t() {
     nm_move('fast_search', 't');
   }

   function scQuickSearchInit(bPosOnly, sPos) {
     if (!bPosOnly) {
       if (document.getElementById('SC_fast_search_t')) {
           if ('' == sPos || 't' == sPos) {
               scQuickSearchSize('SC_fast_search_t', 'SC_fast_search_close_t', 'SC_fast_search_submit_t', 'quicksearchph_t');
           }
       }
     }
   }
   var fixedQuickSearchSize = {};
   function scQuickSearchSize(sIdInput, sIdClose, sIdSubmit, sPlaceHolder) {
     if ("boolean" == typeof fixedQuickSearchSize[sIdInput] && fixedQuickSearchSize[sIdInput]) {
       return;
     }
     var oInput = $('#' + sIdInput),
         oClose = $('#' + sIdClose),
         oSubmit = $('#' + sIdSubmit),
         oPlace = $('#' + sPlaceHolder),
         iInputP = parseInt(oInput.css('padding-right')) || 0,
         iInputB = parseInt(oInput.css('border-right-width')) || 0,
         iInputW = oInput.outerWidth(),
         iPlaceW = oPlace.outerWidth(),
         oInputO = oInput.offset(),
         oPlaceO = oPlace.offset(),
         iNewRight;
     iNewRight = (iPlaceW - iInputW) - (oInputO.left - oPlaceO.left) + iInputB + 1;
     oInput.css({
       'padding-right': iInputP + 16 + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px'
     });
     if (0 != oInput.height()) {
       oInput.css({
         'height': Math.max(oInput.height(), 16) + 'px',
       });
     }
     oClose.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     oSubmit.css({
       'right': iNewRight + <?php echo $this->Ini->Str_qs_image_padding ?> + 'px',
       'cursor': 'pointer'
     });
     fixedQuickSearchSize[sIdInput] = true;
   }
   function scQuickSearchKeyUp(sPos, e) {
     if ('' != scQSInitVal && $('#SC_fast_search_' + sPos).val() == scQSInitVal && scQSInit) {
       $('#SC_fast_search_close_' + sPos).show();
       $('#SC_fast_search_submit_' + sPos).hide();
     }
     else {
       $('#SC_fast_search_close_' + sPos).hide();
       $('#SC_fast_search_submit_' + sPos).show();
     }
     if (null != e) {
       var keyPressed = e.charCode || e.keyCode || e.which;
       if (13 == keyPressed) {
         if ('t' == sPos) scQuickSearchSubmit_t();
       }
     }
   }
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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_tbbillruang_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_tbbillruang'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbbillruang'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
  if (!$this->Embutida_call && (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['mostra_cab']) || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['mostra_cab'] != "N") && (!$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard'] || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['compact_mode'] || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['maximized']))
  {
?>
<tr><td>
<style>
    .scMenuTHeaderFont img, .scGridHeaderFont img , .scFormHeaderFont img , .scTabHeaderFont img , .scContainerHeaderFont img , .scFilterHeaderFont img { height:23px;}
</style>
<div class="scFormHeader" style="height: 54px; padding: 17px 15px; box-sizing: border-box;margin: -1px 0px 0px 0px;width: 100%;">
    <div class="scFormHeaderFont" style="float: left; text-transform: uppercase;"><?php if ($this->nmgp_opcao == "novo") { echo "" . $this->Ini->Nm_lang['lang_othr_frmi_title'] . " tbbillruang"; } else { echo "" . $this->Ini->Nm_lang['lang_othr_frmu_title'] . " tbbillruang"; } ?></div>
    <div class="scFormHeaderFont" style="float: right;"><?php echo date($this->dateDefaultFormat()); ?></div>
</div></td></tr>
<?php
  }
?>
<tr><td>
<?php
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['fast_search'][2] : "";
?> 
           <script type="text/javascript">var change_fast_t = "";</script>
          <input type="hidden" name="nmgp_fast_search_t" value="SC_all_Cmp">
          <input type="hidden" name="nmgp_cond_fast_search_t" value="qp">
          <script type="text/javascript">var scQSInitVal = "<?php echo $OPC_dat ?>";</script>
          <span id="quicksearchph_t">
           <input type="text" id="SC_fast_search_t" class="scFormToolbarInput" style="vertical-align: middle" name="nmgp_arg_fast_search_t" value="<?php echo $this->form_encode_input($OPC_dat) ?>" size="10" onChange="change_fast_t = 'CH';" alt="{maxLength: 255}" placeholder="<?php echo $this->Ini->Nm_lang['lang_othr_qk_watermark'] ?>">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_close_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_clean; ?>" onclick="document.getElementById('SC_fast_search_t').value = '__Clear_Fast__'; nm_move('fast_search', 't');">
           <img style="position: absolute; display: none; height: 16px; width: 16px" id="SC_fast_search_submit_t" src="<?php echo $this->Ini->path_botoes ?>/<?php echo $this->Ini->Img_qs_search; ?>" onclick="scQuickSearchSubmit_t();">
          </span>
<?php 
      }
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
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['trancode_']))
   {
       $this->nmgp_cmp_hidden['trancode_'] = 'off';
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
   <?php if (isset($this->nmgp_cmp_hidden['check_in_']) && $this->nmgp_cmp_hidden['check_in_'] == 'off') { $sStyleHidden_check_in_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['check_in_']) || $this->nmgp_cmp_hidden['check_in_'] == 'on') {
      if (!isset($this->nm_new_label['check_in_'])) {
          $this->nm_new_label['check_in_'] = "Check In"; } ?>

    <TD class="scFormLabelOddMult css_check_in__label" id="hidden_field_label_check_in_" style="<?php echo $sStyleHidden_check_in_; ?>" > <?php echo $this->nm_new_label['check_in_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['check_out_']) && $this->nmgp_cmp_hidden['check_out_'] == 'off') { $sStyleHidden_check_out_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['check_out_']) || $this->nmgp_cmp_hidden['check_out_'] == 'on') {
      if (!isset($this->nm_new_label['check_out_'])) {
          $this->nm_new_label['check_out_'] = "Check Out"; } ?>

    <TD class="scFormLabelOddMult css_check_out__label" id="hidden_field_label_check_out_" style="<?php echo $sStyleHidden_check_out_; ?>" > <?php echo $this->nm_new_label['check_out_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['lama_']) && $this->nmgp_cmp_hidden['lama_'] == 'off') { $sStyleHidden_lama_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['lama_']) || $this->nmgp_cmp_hidden['lama_'] == 'on') {
      if (!isset($this->nm_new_label['lama_'])) {
          $this->nm_new_label['lama_'] = "LOS"; } ?>

    <TD class="scFormLabelOddMult css_lama__label" id="hidden_field_label_lama_" style="<?php echo $sStyleHidden_lama_; ?>" > <?php echo $this->nm_new_label['lama_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['bed_']) && $this->nmgp_cmp_hidden['bed_'] == 'off') { $sStyleHidden_bed_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['bed_']) || $this->nmgp_cmp_hidden['bed_'] == 'on') {
      if (!isset($this->nm_new_label['bed_'])) {
          $this->nm_new_label['bed_'] = "Ruang / Bed"; } ?>

    <TD class="scFormLabelOddMult css_bed__label" id="hidden_field_label_bed_" style="<?php echo $sStyleHidden_bed_; ?>" > <?php echo $this->nm_new_label['bed_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['rate_']) && $this->nmgp_cmp_hidden['rate_'] == 'off') { $sStyleHidden_rate_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['rate_']) || $this->nmgp_cmp_hidden['rate_'] == 'on') {
      if (!isset($this->nm_new_label['rate_'])) {
          $this->nm_new_label['rate_'] = "Biaya @"; } ?>

    <TD class="scFormLabelOddMult css_rate__label" id="hidden_field_label_rate_" style="<?php echo $sStyleHidden_rate_; ?>" > <?php echo $this->nm_new_label['rate_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['disc_']) && $this->nmgp_cmp_hidden['disc_'] == 'off') { $sStyleHidden_disc_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['disc_']) || $this->nmgp_cmp_hidden['disc_'] == 'on') {
      if (!isset($this->nm_new_label['disc_'])) {
          $this->nm_new_label['disc_'] = "Diskon"; } ?>

    <TD class="scFormLabelOddMult css_disc__label" id="hidden_field_label_disc_" style="<?php echo $sStyleHidden_disc_; ?>" > <?php echo $this->nm_new_label['disc_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['keperawatan_']) && $this->nmgp_cmp_hidden['keperawatan_'] == 'off') { $sStyleHidden_keperawatan_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['keperawatan_']) || $this->nmgp_cmp_hidden['keperawatan_'] == 'on') {
      if (!isset($this->nm_new_label['keperawatan_'])) {
          $this->nm_new_label['keperawatan_'] = "Tarif Keperawatan"; } ?>

    <TD class="scFormLabelOddMult css_keperawatan__label" id="hidden_field_label_keperawatan_" style="<?php echo $sStyleHidden_keperawatan_; ?>" > <?php echo $this->nm_new_label['keperawatan_'] ?> </TD>
   <?php } ?>

   <?php if ((!isset($this->nmgp_cmp_hidden['id_']) || $this->nmgp_cmp_hidden['id_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_'])) {
          $this->nm_new_label['id_'] = "ID"; } ?>

    <TD class="scFormLabelOddMult css_id__label" id="hidden_field_label_id_" style="<?php echo $sStyleHidden_id_; ?>" > <?php echo $this->nm_new_label['id_'] ?> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['trandate_']) && $this->nmgp_cmp_hidden['trandate_'] == 'off') { $sStyleHidden_trandate_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['trandate_']) || $this->nmgp_cmp_hidden['trandate_'] == 'on') {
      if (!isset($this->nm_new_label['trandate_'])) {
          $this->nm_new_label['trandate_'] = "Tgl. Transaksi"; } ?>

    <TD class="scFormLabelOddMult css_trandate__label" id="hidden_field_label_trandate_" style="<?php echo $sStyleHidden_trandate_; ?>" > <?php echo $this->nm_new_label['trandate_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['trancode_']) && $this->nmgp_cmp_hidden['trancode_'] == 'off') { $sStyleHidden_trancode_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['trancode_']) || $this->nmgp_cmp_hidden['trancode_'] == 'on') {
      if (!isset($this->nm_new_label['trancode_'])) {
          $this->nm_new_label['trancode_'] = "Kode"; } ?>

    <TD class="scFormLabelOddMult css_trancode__label" id="hidden_field_label_trancode_" style="<?php echo $sStyleHidden_trancode_; ?>" > <?php echo $this->nm_new_label['trancode_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off') { $sStyleHidden_sc_field_0_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_0_']) || $this->nmgp_cmp_hidden['sc_field_0_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_0_'])) {
          $this->nm_new_label['sc_field_0_'] = "Kelas Adm."; } ?>

    <TD class="scFormLabelOddMult css_sc_field_0__label" id="hidden_field_label_sc_field_0_" style="<?php echo $sStyleHidden_sc_field_0_; ?>" > <?php echo $this->nm_new_label['sc_field_0_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_tbbillruang);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_tbbillruang = $this->form_vert_form_tbbillruang;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_tbbillruang))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['sc_field_0_']))
           {
               $this->nmgp_cmp_readonly['sc_field_0_'] = 'on';
           }
   foreach ($this->form_vert_form_tbbillruang as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->custcode_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['custcode_'];
       $this->status_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['status_'];
       $this->kelasbayar_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['kelasbayar_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['check_in_'] = true;
           $this->nmgp_cmp_readonly['check_in__hora'] = true;
           $this->nmgp_cmp_readonly['check_out_'] = true;
           $this->nmgp_cmp_readonly['check_out__hora'] = true;
           $this->nmgp_cmp_readonly['lama_'] = true;
           $this->nmgp_cmp_readonly['bed_'] = true;
           $this->nmgp_cmp_readonly['rate_'] = true;
           $this->nmgp_cmp_readonly['disc_'] = true;
           $this->nmgp_cmp_readonly['keperawatan_'] = true;
           $this->nmgp_cmp_readonly['id_'] = true;
           $this->nmgp_cmp_readonly['trandate_'] = true;
           $this->nmgp_cmp_readonly['trancode_'] = true;
           $this->nmgp_cmp_readonly['sc_field_0_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['check_in_']) || $this->nmgp_cmp_readonly['check_in_'] != "on") {$this->nmgp_cmp_readonly['check_in_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['check_in__hora']) || $this->nmgp_cmp_readonly['check_in__hora'] != "on") {$this->nmgp_cmp_readonly['check_in__hora'] = false;}
           if (!isset($this->nmgp_cmp_readonly['check_out_']) || $this->nmgp_cmp_readonly['check_out_'] != "on") {$this->nmgp_cmp_readonly['check_out_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['check_out__hora']) || $this->nmgp_cmp_readonly['check_out__hora'] != "on") {$this->nmgp_cmp_readonly['check_out__hora'] = false;}
           if (!isset($this->nmgp_cmp_readonly['lama_']) || $this->nmgp_cmp_readonly['lama_'] != "on") {$this->nmgp_cmp_readonly['lama_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['bed_']) || $this->nmgp_cmp_readonly['bed_'] != "on") {$this->nmgp_cmp_readonly['bed_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['rate_']) || $this->nmgp_cmp_readonly['rate_'] != "on") {$this->nmgp_cmp_readonly['rate_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['disc_']) || $this->nmgp_cmp_readonly['disc_'] != "on") {$this->nmgp_cmp_readonly['disc_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['keperawatan_']) || $this->nmgp_cmp_readonly['keperawatan_'] != "on") {$this->nmgp_cmp_readonly['keperawatan_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['trandate_']) || $this->nmgp_cmp_readonly['trandate_'] != "on") {$this->nmgp_cmp_readonly['trandate_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['trancode_']) || $this->nmgp_cmp_readonly['trancode_'] != "on") {$this->nmgp_cmp_readonly['trancode_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_0_']) || $this->nmgp_cmp_readonly['sc_field_0_'] != "on") {$this->nmgp_cmp_readonly['sc_field_0_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->check_in_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['check_in_']; 
       $check_in_ = $this->check_in_; 
       $this->check_in__hora = $this->form_vert_form_tbbillruang[$sc_seq_vert]['check_in__hora']; 
       $check_in__hora = $this->check_in__hora; 
       $sStyleHidden_check_in_ = '';
       if (isset($sCheckRead_check_in_))
       {
           unset($sCheckRead_check_in_);
       }
       if (isset($this->nmgp_cmp_readonly['check_in_']))
       {
           $sCheckRead_check_in_ = $this->nmgp_cmp_readonly['check_in_'];
       }
       if (isset($this->nmgp_cmp_hidden['check_in_']) && $this->nmgp_cmp_hidden['check_in_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['check_in_']);
           $sStyleHidden_check_in_ = 'display: none;';
       }
       $bTestReadOnly_check_in_ = true;
       $sStyleReadLab_check_in_ = 'display: none;';
       $sStyleReadInp_check_in_ = '';
       if (isset($this->nmgp_cmp_readonly['check_in_']) && $this->nmgp_cmp_readonly['check_in_'] == 'on')
       {
           $bTestReadOnly_check_in_ = false;
           unset($this->nmgp_cmp_readonly['check_in_']);
           $sStyleReadLab_check_in_ = '';
           $sStyleReadInp_check_in_ = 'display: none;';
       }
       $this->check_out_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['check_out_']; 
       $check_out_ = $this->check_out_; 
       $this->check_out__hora = $this->form_vert_form_tbbillruang[$sc_seq_vert]['check_out__hora']; 
       $check_out__hora = $this->check_out__hora; 
       $sStyleHidden_check_out_ = '';
       if (isset($sCheckRead_check_out_))
       {
           unset($sCheckRead_check_out_);
       }
       if (isset($this->nmgp_cmp_readonly['check_out_']))
       {
           $sCheckRead_check_out_ = $this->nmgp_cmp_readonly['check_out_'];
       }
       if (isset($this->nmgp_cmp_hidden['check_out_']) && $this->nmgp_cmp_hidden['check_out_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['check_out_']);
           $sStyleHidden_check_out_ = 'display: none;';
       }
       $bTestReadOnly_check_out_ = true;
       $sStyleReadLab_check_out_ = 'display: none;';
       $sStyleReadInp_check_out_ = '';
       if (isset($this->nmgp_cmp_readonly['check_out_']) && $this->nmgp_cmp_readonly['check_out_'] == 'on')
       {
           $bTestReadOnly_check_out_ = false;
           unset($this->nmgp_cmp_readonly['check_out_']);
           $sStyleReadLab_check_out_ = '';
           $sStyleReadInp_check_out_ = 'display: none;';
       }
       $this->lama_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['lama_']; 
       $lama_ = $this->lama_; 
       $sStyleHidden_lama_ = '';
       if (isset($sCheckRead_lama_))
       {
           unset($sCheckRead_lama_);
       }
       if (isset($this->nmgp_cmp_readonly['lama_']))
       {
           $sCheckRead_lama_ = $this->nmgp_cmp_readonly['lama_'];
       }
       if (isset($this->nmgp_cmp_hidden['lama_']) && $this->nmgp_cmp_hidden['lama_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['lama_']);
           $sStyleHidden_lama_ = 'display: none;';
       }
       $bTestReadOnly_lama_ = true;
       $sStyleReadLab_lama_ = 'display: none;';
       $sStyleReadInp_lama_ = '';
       if (isset($this->nmgp_cmp_readonly['lama_']) && $this->nmgp_cmp_readonly['lama_'] == 'on')
       {
           $bTestReadOnly_lama_ = false;
           unset($this->nmgp_cmp_readonly['lama_']);
           $sStyleReadLab_lama_ = '';
           $sStyleReadInp_lama_ = 'display: none;';
       }
       $this->bed_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['bed_']; 
       $bed_ = $this->bed_; 
       $sStyleHidden_bed_ = '';
       if (isset($sCheckRead_bed_))
       {
           unset($sCheckRead_bed_);
       }
       if (isset($this->nmgp_cmp_readonly['bed_']))
       {
           $sCheckRead_bed_ = $this->nmgp_cmp_readonly['bed_'];
       }
       if (isset($this->nmgp_cmp_hidden['bed_']) && $this->nmgp_cmp_hidden['bed_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['bed_']);
           $sStyleHidden_bed_ = 'display: none;';
       }
       $bTestReadOnly_bed_ = true;
       $sStyleReadLab_bed_ = 'display: none;';
       $sStyleReadInp_bed_ = '';
       if (isset($this->nmgp_cmp_readonly['bed_']) && $this->nmgp_cmp_readonly['bed_'] == 'on')
       {
           $bTestReadOnly_bed_ = false;
           unset($this->nmgp_cmp_readonly['bed_']);
           $sStyleReadLab_bed_ = '';
           $sStyleReadInp_bed_ = 'display: none;';
       }
       $this->rate_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['rate_']; 
       $rate_ = $this->rate_; 
       $sStyleHidden_rate_ = '';
       if (isset($sCheckRead_rate_))
       {
           unset($sCheckRead_rate_);
       }
       if (isset($this->nmgp_cmp_readonly['rate_']))
       {
           $sCheckRead_rate_ = $this->nmgp_cmp_readonly['rate_'];
       }
       if (isset($this->nmgp_cmp_hidden['rate_']) && $this->nmgp_cmp_hidden['rate_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['rate_']);
           $sStyleHidden_rate_ = 'display: none;';
       }
       $bTestReadOnly_rate_ = true;
       $sStyleReadLab_rate_ = 'display: none;';
       $sStyleReadInp_rate_ = '';
       if (isset($this->nmgp_cmp_readonly['rate_']) && $this->nmgp_cmp_readonly['rate_'] == 'on')
       {
           $bTestReadOnly_rate_ = false;
           unset($this->nmgp_cmp_readonly['rate_']);
           $sStyleReadLab_rate_ = '';
           $sStyleReadInp_rate_ = 'display: none;';
       }
       $this->disc_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['disc_']; 
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
       $this->keperawatan_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['keperawatan_']; 
       $keperawatan_ = $this->keperawatan_; 
       $sStyleHidden_keperawatan_ = '';
       if (isset($sCheckRead_keperawatan_))
       {
           unset($sCheckRead_keperawatan_);
       }
       if (isset($this->nmgp_cmp_readonly['keperawatan_']))
       {
           $sCheckRead_keperawatan_ = $this->nmgp_cmp_readonly['keperawatan_'];
       }
       if (isset($this->nmgp_cmp_hidden['keperawatan_']) && $this->nmgp_cmp_hidden['keperawatan_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['keperawatan_']);
           $sStyleHidden_keperawatan_ = 'display: none;';
       }
       $bTestReadOnly_keperawatan_ = true;
       $sStyleReadLab_keperawatan_ = 'display: none;';
       $sStyleReadInp_keperawatan_ = '';
       if (isset($this->nmgp_cmp_readonly['keperawatan_']) && $this->nmgp_cmp_readonly['keperawatan_'] == 'on')
       {
           $bTestReadOnly_keperawatan_ = false;
           unset($this->nmgp_cmp_readonly['keperawatan_']);
           $sStyleReadLab_keperawatan_ = '';
           $sStyleReadInp_keperawatan_ = 'display: none;';
       }
       $this->id_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['id_']; 
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
       $this->trandate_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['trandate_'] . ' ' . $this->form_vert_form_tbbillruang[$sc_seq_vert]['trandate__hora']; 
       $trandate_ = $this->trandate_; 
       $sStyleHidden_trandate_ = '';
       if (isset($sCheckRead_trandate_))
       {
           unset($sCheckRead_trandate_);
       }
       if (isset($this->nmgp_cmp_readonly['trandate_']))
       {
           $sCheckRead_trandate_ = $this->nmgp_cmp_readonly['trandate_'];
       }
       if (isset($this->nmgp_cmp_hidden['trandate_']) && $this->nmgp_cmp_hidden['trandate_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['trandate_']);
           $sStyleHidden_trandate_ = 'display: none;';
       }
       $bTestReadOnly_trandate_ = true;
       $sStyleReadLab_trandate_ = 'display: none;';
       $sStyleReadInp_trandate_ = '';
       if (isset($this->nmgp_cmp_readonly['trandate_']) && $this->nmgp_cmp_readonly['trandate_'] == 'on')
       {
           $bTestReadOnly_trandate_ = false;
           unset($this->nmgp_cmp_readonly['trandate_']);
           $sStyleReadLab_trandate_ = '';
           $sStyleReadInp_trandate_ = 'display: none;';
       }
       $this->trancode_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['trancode_']; 
       $trancode_ = $this->trancode_; 
       if (!isset($this->nmgp_cmp_hidden['trancode_']))
       {
           $this->nmgp_cmp_hidden['trancode_'] = 'off';
       }
       $sStyleHidden_trancode_ = '';
       if (isset($sCheckRead_trancode_))
       {
           unset($sCheckRead_trancode_);
       }
       if (isset($this->nmgp_cmp_readonly['trancode_']))
       {
           $sCheckRead_trancode_ = $this->nmgp_cmp_readonly['trancode_'];
       }
       if (isset($this->nmgp_cmp_hidden['trancode_']) && $this->nmgp_cmp_hidden['trancode_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['trancode_']);
           $sStyleHidden_trancode_ = 'display: none;';
       }
       $bTestReadOnly_trancode_ = true;
       $sStyleReadLab_trancode_ = 'display: none;';
       $sStyleReadInp_trancode_ = '';
       if (isset($this->nmgp_cmp_readonly['trancode_']) && $this->nmgp_cmp_readonly['trancode_'] == 'on')
       {
           $bTestReadOnly_trancode_ = false;
           unset($this->nmgp_cmp_readonly['trancode_']);
           $sStyleReadLab_trancode_ = '';
           $sStyleReadInp_trancode_ = 'display: none;';
       }
       $this->sc_field_0_ = $this->form_vert_form_tbbillruang[$sc_seq_vert]['sc_field_0_']; 
       $sc_field_0_ = $this->sc_field_0_; 
       $sStyleHidden_sc_field_0_ = '';
       if (isset($sCheckRead_sc_field_0_))
       {
           unset($sCheckRead_sc_field_0_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_0_']))
       {
           $sCheckRead_sc_field_0_ = $this->nmgp_cmp_readonly['sc_field_0_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_0_']);
           $sStyleHidden_sc_field_0_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_0_ = true;
       $sStyleReadLab_sc_field_0_ = 'display: none;';
       $sStyleReadInp_sc_field_0_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["sc_field_0_"]) &&  $this->nmgp_cmp_readonly["sc_field_0_"] == "on"))
       {
           $bTestReadOnly_sc_field_0_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_0_']);
           $sStyleReadLab_sc_field_0_ = '';
           $sStyleReadInp_sc_field_0_ = 'display: none;';
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_tbbillruang_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_tbbillruang_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbbillruang_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_tbbillruang_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbbillruang_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_tbbillruang_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
   <?php }?>
   <?php if (isset($this->nmgp_cmp_hidden['check_in_']) && $this->nmgp_cmp_hidden['check_in_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="check_in_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($check_in_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_check_in__hora_line" id="hidden_field_data_check_in_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_check_in_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_check_in__hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_check_in_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["check_in_"]) &&  $this->nmgp_cmp_readonly["check_in_"] == "on") { 

 ?>
<input type="hidden" name="check_in_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($check_in_) . "\">" . $check_in_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_check_in_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-check_in_<?php echo $sc_seq_vert ?> css_check_in__line" style="<?php echo $sStyleReadLab_check_in_; ?>"><?php echo $check_in_; ?></span><span id="id_read_off_check_in_<?php echo $sc_seq_vert ?>" class="css_read_off_check_in_" style="white-space: nowrap;<?php echo $sStyleReadInp_check_in_; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOddMult css_check_in__obj" style="" id="id_sc_field_check_in_<?php echo $sc_seq_vert ?>" type=text name="check_in_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($check_in_) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['check_in_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['check_in_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['check_in_']['date_format'];
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


<?php if ($bTestReadOnly_check_in__hora && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["check_in__hora"]) &&  $this->nmgp_cmp_readonly["check_in__hora"] == "on") { 

 ?>
<input type="hidden" name="check_in__hora<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($check_in__hora) . "\">" . $check_in__hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_check_in__hora<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-check_in__hora<?php echo $sc_seq_vert ?> css_check_in__hora_line" style="<?php echo $sStyleReadLab_check_in_; ?>"><?php echo $check_in__hora; ?></span><span id="id_read_off_check_in__hora<?php echo $sc_seq_vert ?>" class="css_read_off_check_in__hora" style="white-space: nowrap;<?php echo $sStyleReadInp_check_in_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_check_in__hora_obj" style="" id="id_sc_field_check_in__hora<?php echo $sc_seq_vert ?>" type=text name="check_in__hora<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($check_in__hora) ?>"
 size=18 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['check_in_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['check_in_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['check_in__hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['check_in__hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['check_in__hora']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_check_in_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_check_in_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['check_out_']) && $this->nmgp_cmp_hidden['check_out_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="check_out_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($check_out_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_check_out__hora_line" id="hidden_field_data_check_out_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_check_out_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_check_out__hora_line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_check_out_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["check_out_"]) &&  $this->nmgp_cmp_readonly["check_out_"] == "on") { 

 ?>
<input type="hidden" name="check_out_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($check_out_) . "\">" . $check_out_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_check_out_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-check_out_<?php echo $sc_seq_vert ?> css_check_out__line" style="<?php echo $sStyleReadLab_check_out_; ?>"><?php echo $check_out_; ?></span><span id="id_read_off_check_out_<?php echo $sc_seq_vert ?>" class="css_read_off_check_out_" style="white-space: nowrap;<?php echo $sStyleReadInp_check_out_; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOddMult css_check_out__obj" style="" id="id_sc_field_check_out_<?php echo $sc_seq_vert ?>" type=text name="check_out_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($check_out_) ?>"
 size=18 alt="{datatype: 'date', dateSep: '<?php echo $this->field_config['check_out_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['check_out_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['check_out_']['date_format'];
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


<?php if ($bTestReadOnly_check_out__hora && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["check_out__hora"]) &&  $this->nmgp_cmp_readonly["check_out__hora"] == "on") { 

 ?>
<input type="hidden" name="check_out__hora<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($check_out__hora) . "\">" . $check_out__hora . ""; ?>
<?php } else { ?>
<span id="id_read_on_check_out__hora<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-check_out__hora<?php echo $sc_seq_vert ?> css_check_out__hora_line" style="<?php echo $sStyleReadLab_check_out_; ?>"><?php echo $check_out__hora; ?></span><span id="id_read_off_check_out__hora<?php echo $sc_seq_vert ?>" class="css_read_off_check_out__hora" style="white-space: nowrap;<?php echo $sStyleReadInp_check_out_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_check_out__hora_obj" style="" id="id_sc_field_check_out__hora<?php echo $sc_seq_vert ?>" type=text name="check_out__hora<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($check_out__hora) ?>"
 size=18 alt="{datatype: 'time', dateSep: '<?php echo $this->field_config['check_out_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['check_out_']['date_format']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ ', timeSep: '<?php echo $this->field_config['check_out__hora']['time_sep']; ?>', timeFormat: '<?php echo $this->field_config['check_out__hora']['date_format']; ?>'}" ><?php
$tmp_form_data = $this->field_config['check_out__hora']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_check_out_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_check_out_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['lama_']) && $this->nmgp_cmp_hidden['lama_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="lama_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lama_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_lama__line" id="hidden_field_data_lama_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_lama_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_lama__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_lama_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lama_"]) &&  $this->nmgp_cmp_readonly["lama_"] == "on") { 

 ?>
<input type="hidden" name="lama_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lama_) . "\">" . $lama_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_lama_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-lama_<?php echo $sc_seq_vert ?> css_lama__line" style="<?php echo $sStyleReadLab_lama_; ?>"><?php echo $this->lama_; ?></span><span id="id_read_off_lama_<?php echo $sc_seq_vert ?>" class="css_read_off_lama_" style="white-space: nowrap;<?php echo $sStyleReadInp_lama_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_lama__obj" style="" id="id_sc_field_lama_<?php echo $sc_seq_vert ?>" type=text name="lama_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lama_) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lama_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lama_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['bed_']) && $this->nmgp_cmp_hidden['bed_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="bed_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->bed_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_bed__line" id="hidden_field_data_bed_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_bed_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_bed__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_bed_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["bed_"]) &&  $this->nmgp_cmp_readonly["bed_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['Lookup_bed_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['Lookup_bed_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['Lookup_bed_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['Lookup_bed_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['Lookup_bed_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['Lookup_bed_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['Lookup_bed_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['Lookup_bed_'] = array(); 
    }

   $old_value_check_in_ = $this->check_in_;
   $old_value_check_in__hora = $this->check_in__hora;
   $old_value_check_out_ = $this->check_out_;
   $old_value_check_out__hora = $this->check_out__hora;
   $old_value_rate_ = $this->rate_;
   $old_value_disc_ = $this->disc_;
   $old_value_keperawatan_ = $this->keperawatan_;
   $old_value_id_ = $this->id_;
   $old_value_trandate_ = $this->trandate_;
   $old_value_trandate__hora = $this->trandate__hora;
   $this->nm_tira_formatacao();
   $this->nm_converte_datas(false);


   $unformatted_value_check_in_ = $this->check_in_;
   $unformatted_value_check_in__hora = $this->check_in__hora;
   $unformatted_value_check_out_ = $this->check_out_;
   $unformatted_value_check_out__hora = $this->check_out__hora;
   $unformatted_value_rate_ = $this->rate_;
   $unformatted_value_disc_ = $this->disc_;
   $unformatted_value_keperawatan_ = $this->keperawatan_;
   $unformatted_value_id_ = $this->id_;
   $unformatted_value_trandate_ = $this->trandate_;
   $unformatted_value_trandate__hora = $this->trandate__hora;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT idBed, kelas + ' - ' + ruang + ' (' + noBed + ')'  FROM tbbed  ORDER BY kelas, ruang, noBed";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT idBed, concat(kelas,' - ', ruang,' (', noBed,')')  FROM tbbed  ORDER BY kelas, ruang, noBed";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT idBed, kelas&' - '&ruang&' ('&noBed&')'  FROM tbbed  ORDER BY kelas, ruang, noBed";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT idBed, kelas||' - '||ruang||' ('||noBed||')'  FROM tbbed  ORDER BY kelas, ruang, noBed";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT idBed, kelas + ' - ' + ruang + ' (' + noBed + ')'  FROM tbbed  ORDER BY kelas, ruang, noBed";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT idBed, kelas||' - '||ruang||' ('||noBed||')'  FROM tbbed  ORDER BY kelas, ruang, noBed";
   }
   else
   {
       $nm_comando = "SELECT idBed, kelas||' - '||ruang||' ('||noBed||')'  FROM tbbed  ORDER BY kelas, ruang, noBed";
   }

   $this->check_in_ = $old_value_check_in_;
   $this->check_in__hora = $old_value_check_in__hora;
   $this->check_out_ = $old_value_check_out_;
   $this->check_out__hora = $old_value_check_out__hora;
   $this->rate_ = $old_value_rate_;
   $this->disc_ = $old_value_disc_;
   $this->keperawatan_ = $old_value_keperawatan_;
   $this->id_ = $old_value_id_;
   $this->trandate_ = $old_value_trandate_;
   $this->trandate__hora = $old_value_trandate__hora;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $rs->fields[0] = str_replace(',', '.', $rs->fields[0]);
              $rs->fields[0] = (strpos(strtolower($rs->fields[0]), "e")) ? (float)$rs->fields[0] : $rs->fields[0];
              $rs->fields[0] = (string)$rs->fields[0];
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['Lookup_bed_'][] = $rs->fields[0];
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
   $bed__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->bed__1))
          {
              foreach ($this->bed__1 as $tmp_bed_)
              {
                  if (trim($tmp_bed_) === trim($cadaselect[1])) { $bed__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->bed_) === trim($cadaselect[1])) { $bed__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="bed_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($bed_) . "\">" . $bed__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_bed_();
   $x = 0 ; 
   $bed__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->bed__1))
          {
              foreach ($this->bed__1 as $tmp_bed_)
              {
                  if (trim($tmp_bed_) === trim($cadaselect[1])) { $bed__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->bed_) === trim($cadaselect[1])) { $bed__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($bed__look))
          {
              $bed__look = $this->bed_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_bed_" . $sc_seq_vert . "\" class=\"css_bed__line\" style=\"" .  $sStyleReadLab_bed_ . "\">" . $this->form_encode_input($bed__look) . "</span><span id=\"id_read_off_bed_" . $sc_seq_vert . "\" class=\"css_read_off_bed_\" style=\"white-space: nowrap; " . $sStyleReadInp_bed_ . "\">";
   echo " <span id=\"idAjaxSelect_bed_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_bed__obj\" style=\"\" id=\"id_sc_field_bed_" . $sc_seq_vert . "\" name=\"bed_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->bed_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->bed_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_bed_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_bed_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['rate_']) && $this->nmgp_cmp_hidden['rate_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rate_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rate_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_rate__line" id="hidden_field_data_rate_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_rate_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_rate__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_rate_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["rate_"]) &&  $this->nmgp_cmp_readonly["rate_"] == "on") { 

 ?>
<input type="hidden" name="rate_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rate_) . "\">" . $rate_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_rate_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-rate_<?php echo $sc_seq_vert ?> css_rate__line" style="<?php echo $sStyleReadLab_rate_; ?>"><?php echo $this->rate_; ?></span><span id="id_read_off_rate_<?php echo $sc_seq_vert ?>" class="css_read_off_rate_" style="white-space: nowrap;<?php echo $sStyleReadInp_rate_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_rate__obj" style="" id="id_sc_field_rate_<?php echo $sc_seq_vert ?>" type=text name="rate_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rate_) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['rate_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['rate_']['format_pos'] || 3 == $this->field_config['rate_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 12, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['rate_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['rate_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['rate_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['rate_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rate_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rate_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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
 size=3 alt="{datatype: 'integer', maxLength: 3, thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['disc_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['disc_']['symbol_fmt']; ?>, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['disc_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_disc_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_disc_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['keperawatan_']) && $this->nmgp_cmp_hidden['keperawatan_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="keperawatan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($keperawatan_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_keperawatan__line" id="hidden_field_data_keperawatan_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_keperawatan_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_keperawatan__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_keperawatan_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["keperawatan_"]) &&  $this->nmgp_cmp_readonly["keperawatan_"] == "on") { 

 ?>
<input type="hidden" name="keperawatan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($keperawatan_) . "\">" . $keperawatan_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_keperawatan_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-keperawatan_<?php echo $sc_seq_vert ?> css_keperawatan__line" style="<?php echo $sStyleReadLab_keperawatan_; ?>"><?php echo $this->keperawatan_; ?></span><span id="id_read_off_keperawatan_<?php echo $sc_seq_vert ?>" class="css_read_off_keperawatan_" style="white-space: nowrap;<?php echo $sStyleReadInp_keperawatan_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_keperawatan__obj" style="" id="id_sc_field_keperawatan_<?php echo $sc_seq_vert ?>" type=text name="keperawatan_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($keperawatan_) ?>"
 size=12 alt="{datatype: 'currency', currencySymbol: '<?php echo $this->field_config['keperawatan_']['symbol_mon']; ?>', currencyPosition: '<?php echo ((1 == $this->field_config['keperawatan_']['format_pos'] || 3 == $this->field_config['keperawatan_']['format_pos']) ? 'left' : 'right'); ?>', maxLength: 8, precision: 0, decimalSep: '<?php echo str_replace("'", "\'", $this->field_config['keperawatan_']['symbol_dec']); ?>', thousandsSep: '<?php echo str_replace("'", "\'", $this->field_config['keperawatan_']['symbol_grp']); ?>', thousandsFormat: <?php echo $this->field_config['keperawatan_']['symbol_fmt']; ?>, manualDecimals: false, allowNegative: false, onlyNegative: false, negativePos: <?php echo (4 == $this->field_config['keperawatan_']['format_neg'] ? "'suffix'" : "'prefix'") ?>, alignment: 'left', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_keperawatan_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_keperawatan_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
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

   <?php if (isset($this->nmgp_cmp_hidden['trandate_']) && $this->nmgp_cmp_hidden['trandate_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="trandate_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($trandate_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_trandate__line" id="hidden_field_data_trandate_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_trandate_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_trandate__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_trandate_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trandate_"]) &&  $this->nmgp_cmp_readonly["trandate_"] == "on") { 

 ?>
<input type="hidden" name="trandate_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($trandate_) . "\">" . $trandate_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_trandate_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-trandate_<?php echo $sc_seq_vert ?> css_trandate__line" style="<?php echo $sStyleReadLab_trandate_; ?>"><?php echo $trandate_; ?></span><span id="id_read_off_trandate_<?php echo $sc_seq_vert ?>" class="css_read_off_trandate_" style="white-space: nowrap;<?php echo $sStyleReadInp_trandate_; ?>"><?php
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('scButton_' == substr($miniCalendarButton[1], 0, 9)) {
    $miniCalendarButton[1] = substr($miniCalendarButton[1], 9);
}
?>
<span class='trigger-picker-<?php echo $miniCalendarButton[1]; ?>'>

 <input class="sc-js-input scFormObjectOddMult css_trandate__obj" style="" id="id_sc_field_trandate_<?php echo $sc_seq_vert ?>" type=text name="trandate_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($trandate_) ?>"
 size=18 alt="{datatype: 'datetime', dateSep: '<?php echo $this->field_config['trandate_']['date_sep']; ?>', dateFormat: '<?php echo $this->field_config['trandate_']['date_format']; ?>', timeSep: '<?php echo $this->field_config['trandate_']['time_sep']; ?>', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span>
<?php
$tmp_form_data = $this->field_config['trandate_']['date_format'];
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trandate_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trandate_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>
<?php
   $this->trandate_ = $old_dt_trandate_;
?>

   <?php if (isset($this->nmgp_cmp_hidden['trancode_']) && $this->nmgp_cmp_hidden['trancode_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="trancode_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($trancode_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_trancode__line" id="hidden_field_data_trancode_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_trancode_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_trancode__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_trancode_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["trancode_"]) &&  $this->nmgp_cmp_readonly["trancode_"] == "on") { 

 ?>
<input type="hidden" name="trancode_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($trancode_) . "\">" . $trancode_ . ""; ?>
<?php } else { ?>
<span id="id_read_on_trancode_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-trancode_<?php echo $sc_seq_vert ?> css_trancode__line" style="<?php echo $sStyleReadLab_trancode_; ?>"><?php echo $this->trancode_; ?></span><span id="id_read_off_trancode_<?php echo $sc_seq_vert ?>" class="css_read_off_trancode_" style="white-space: nowrap;<?php echo $sStyleReadInp_trancode_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_trancode__obj" style="" id="id_sc_field_trancode_<?php echo $sc_seq_vert ?>" type=text name="trancode_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($trancode_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_trancode_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_trancode_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_0_']) && $this->nmgp_cmp_hidden['sc_field_0_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_0_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_0__line" id="hidden_field_data_sc_field_0_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_0_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_0__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_0_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["sc_field_0_"]) &&  $this->nmgp_cmp_readonly["sc_field_0_"] == "on")) { 

 ?>
<input type="hidden" name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_0_) . "\"><span id=\"id_ajax_label_sc_field_0_" . $sc_seq_vert . "\">" . $sc_field_0_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_0_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_0_<?php echo $sc_seq_vert ?> css_sc_field_0__line" style="<?php echo $sStyleReadLab_sc_field_0_; ?>"><?php echo $this->sc_field_0_; ?></span><span id="id_read_off_sc_field_0_<?php echo $sc_seq_vert ?>" class="css_read_off_sc_field_0_" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_0_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_0__obj" style="" id="id_sc_field_sc_field_0_<?php echo $sc_seq_vert ?>" type=text name="sc_field_0_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_0_) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_0_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_0_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_check_in_))
       {
           $this->nmgp_cmp_readonly['check_in_'] = $sCheckRead_check_in_;
       }
       if ('display: none;' == $sStyleHidden_check_in_)
       {
           $this->nmgp_cmp_hidden['check_in_'] = 'off';
       }
       if (isset($sCheckRead_check_out_))
       {
           $this->nmgp_cmp_readonly['check_out_'] = $sCheckRead_check_out_;
       }
       if ('display: none;' == $sStyleHidden_check_out_)
       {
           $this->nmgp_cmp_hidden['check_out_'] = 'off';
       }
       if (isset($sCheckRead_lama_))
       {
           $this->nmgp_cmp_readonly['lama_'] = $sCheckRead_lama_;
       }
       if ('display: none;' == $sStyleHidden_lama_)
       {
           $this->nmgp_cmp_hidden['lama_'] = 'off';
       }
       if (isset($sCheckRead_bed_))
       {
           $this->nmgp_cmp_readonly['bed_'] = $sCheckRead_bed_;
       }
       if ('display: none;' == $sStyleHidden_bed_)
       {
           $this->nmgp_cmp_hidden['bed_'] = 'off';
       }
       if (isset($sCheckRead_rate_))
       {
           $this->nmgp_cmp_readonly['rate_'] = $sCheckRead_rate_;
       }
       if ('display: none;' == $sStyleHidden_rate_)
       {
           $this->nmgp_cmp_hidden['rate_'] = 'off';
       }
       if (isset($sCheckRead_disc_))
       {
           $this->nmgp_cmp_readonly['disc_'] = $sCheckRead_disc_;
       }
       if ('display: none;' == $sStyleHidden_disc_)
       {
           $this->nmgp_cmp_hidden['disc_'] = 'off';
       }
       if (isset($sCheckRead_keperawatan_))
       {
           $this->nmgp_cmp_readonly['keperawatan_'] = $sCheckRead_keperawatan_;
       }
       if ('display: none;' == $sStyleHidden_keperawatan_)
       {
           $this->nmgp_cmp_hidden['keperawatan_'] = 'off';
       }
       if (isset($sCheckRead_id_))
       {
           $this->nmgp_cmp_readonly['id_'] = $sCheckRead_id_;
       }
       if ('display: none;' == $sStyleHidden_id_)
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }
       if (isset($sCheckRead_trandate_))
       {
           $this->nmgp_cmp_readonly['trandate_'] = $sCheckRead_trandate_;
       }
       if ('display: none;' == $sStyleHidden_trandate_)
       {
           $this->nmgp_cmp_hidden['trandate_'] = 'off';
       }
       if (isset($sCheckRead_trancode_))
       {
           $this->nmgp_cmp_readonly['trancode_'] = $sCheckRead_trancode_;
       }
       if ('display: none;' == $sStyleHidden_trancode_)
       {
           $this->nmgp_cmp_hidden['trancode_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_0_))
       {
           $this->nmgp_cmp_readonly['sc_field_0_'] = $sCheckRead_sc_field_0_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_0_)
       {
           $this->nmgp_cmp_hidden['sc_field_0_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_tbbillruang = $guarda_form_vert_form_tbbillruang;
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbbillruang");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbbillruang");
 parent.scAjaxDetailHeight("form_tbbillruang", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbbillruang", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbbillruang", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['sc_modal'])
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
			do_ajax_form_tbbillruang_add_new_line(); return false;
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
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbbillruang']['buttonStatus'] = $this->nmgp_botoes;
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
