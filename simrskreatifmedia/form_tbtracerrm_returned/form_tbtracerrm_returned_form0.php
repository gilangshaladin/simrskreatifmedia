<?php
class form_tbtracerrm_returned_form extends form_tbtracerrm_returned_apl
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
 <TITLE><?php if ('novo' == $this->nmgp_opcao) { echo strip_tags("Tracer RM Multi"); } else { echo strip_tags("Tracer RM Multi"); } ?></TITLE>
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
if ($this->Embutida_form && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['sc_modal'] && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['sc_redir_atualiz']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['sc_redir_atualiz'] == 'ok')
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
.css_read_off_order_date_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_process_date_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_service_date_ button {
	background-color: transparent;
	border: 0;
	padding: 0
}
.css_read_off_returned_date_ button {
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
 if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['embutida_pdf']))
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
 <link rel="stylesheet" type="text/css" href="<?php echo $this->Ini->path_link ?>form_tbtracerrm_returned/form_tbtracerrm_returned_<?php echo strtolower($_SESSION['scriptcase']['reg_conf']['css_dir']) ?>.css" />

<script>
var scFocusFirstErrorField = false;
var scFocusFirstErrorName  = "<?php echo $this->scFormFocusErrorName; ?>";
</script>

<?php
include_once("form_tbtracerrm_returned_sajax_js.php");
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
     if (F_name == "rm_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "rm_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "jenis_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "jenis_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "sc_field_1_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "sc_field_1_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "usia_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "usia_" + ii;
            $('input[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('input[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('input[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "alamat_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "alamat_" + ii;
            $('textarea[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('textarea[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('textarea[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
     if (F_name == "lokasi_")
     {
        for (ii=ini; ii < xx; ii++)
        {
            cmp_name = "lokasi_" + ii;
            $('select[name=' + cmp_name + ']').prop("disabled", F_opc);
            if (F_opc == "disabled" || F_opc == true) {
                $('select[name=' + cmp_name + ']').addClass("scFormInputDisabledMult");
            }
            else {
                $('select[name=' + cmp_name + ']').removeClass("scFormInputDisabledMult");
            }
        }
     }
  }
 } // nm_field_disabled
 function nm_field_disabled_reset() {
  for (var i = 0; i < iAjaxNewLine; i++) {
    nm_field_disabled("rm_=enabled", "", i);
    nm_field_disabled("jenis_=enabled", "", i);
    nm_field_disabled("sc_field_1_=enabled", "", i);
    nm_field_disabled("usia_=enabled", "", i);
    nm_field_disabled("alamat_=enabled", "", i);
    nm_field_disabled("lokasi_=enabled", "", i);
  }
 } // nm_field_disabled_reset
<?php

include_once('form_tbtracerrm_returned_jquery.php');

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
$str_iframe_body = ('F' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] || 'R' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe']) ? 'margin: 2px;' : '';
 if (isset($_SESSION['nm_aba_bg_color']))
 {
     $this->Ini->cor_bg_grid = $_SESSION['nm_aba_bg_color'];
     $this->Ini->img_fun_pag = $_SESSION['nm_aba_bg_img'];
 }
if ($GLOBALS["erro_incl"] == 1)
{
    $this->nmgp_opcao = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['opc_ant'] = "novo";
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['recarga'] = "novo";
}
if (empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['recarga']))
{
    $opcao_botoes = $this->nmgp_opcao;
}
else
{
    $opcao_botoes = $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['recarga'];
}
if ('novo' == $opcao_botoes && $this->Embutida_form)
{
    $opcao_botoes = 'inicio';
}
    $remove_margin = isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['remove_margin']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['remove_margin'] ? 'margin: 0; ' : '';
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
 include_once("form_tbtracerrm_returned_js0.php");
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
$_SESSION['scriptcase']['error_span_title']['form_tbtracerrm_returned'] = $this->Ini->Error_icon_span;
$_SESSION['scriptcase']['error_icon_title']['form_tbtracerrm_returned'] = '' != $this->Ini->Err_ico_title ? $this->Ini->path_icones . '/' . $this->Ini->Err_ico_title : '';
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R")
{
    $NM_btn = false;
      if ($this->nmgp_botoes['qsearch'] == "on" && $opcao_botoes != "novo")
      {
          $OPC_cmp = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['fast_search'][0] : "";
          $OPC_arg = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['fast_search'][1] : "";
          $OPC_dat = (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['fast_search'])) ? $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['fast_search'][2] : "";
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
    if (($opcao_botoes != "novo") && (!isset($this->Grid_editavel) || !$this->Grid_editavel) && (!$this->Embutida_form) && (!$this->Embutida_call || $this->Embutida_multi)) {
        $sCondStyle = ($this->nmgp_botoes['update'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "balterarsel", "scBtnFn_sys_format_alt()", "scBtnFn_sys_format_alt()", "sc_b_upd_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-1", "", "");?>
 
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
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (isset($_SESSION['scriptcase']['nm_sc_retorno']) && !empty($_SESSION['scriptcase']['nm_sc_retorno']) && $nm_apl_dependente != 1 && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R" && !$this->aba_iframe && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-2", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente == 1 && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bvoltar", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-3", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if ((!$this->Embutida_call) && ((!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard'] || (isset($this->is_calendar_app) && $this->is_calendar_app)))) {
        $sCondStyle = (!isset($_SESSION['scriptcase']['nm_sc_retorno']) || empty($_SESSION['scriptcase']['nm_sc_retorno']) || $nm_apl_dependente == 1 || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] == "F" || $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] == "R" || $this->aba_iframe || $this->nmgp_botoes['exit'] != "on") && ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F" && $this->nmgp_botoes['exit'] == "on") && ($nm_apl_dependente != 1 || $this->nmgp_botoes['exit'] != "on") && ((!$this->aba_iframe || $this->is_calendar_app) && $this->nmgp_botoes['exit'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bsair", "scBtnFn_sys_format_sai()", "scBtnFn_sys_format_sai()", "sc_b_sai_t", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-4", "", "");?>
 
<?php
        $NM_btn = true;
    }
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R")
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
       if (!empty($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['where_filter']))
       {
           $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['empty_filter'] = true;
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
   if (!isset($this->nmgp_cmp_hidden['nostruk_']))
   {
       $this->nmgp_cmp_hidden['nostruk_'] = 'off';
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


       if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) { $Col_span = " colspan=2"; }
 ?>

    <TD class="scFormLabelOddMult" <?php echo $Col_span ?>> &nbsp; </TD>
   
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] == "on") {?>
    <TD class="scFormLabelOddMult"  width="10">  </TD>
   <?php }?>
   <?php if ($this->Embutida_form && $this->nmgp_botoes['insert'] != "on") {?>
    <TD class="scFormLabelOddMult"  width="10"> &nbsp; </TD>
   <?php }?>
   <?php if ((!isset($this->nmgp_cmp_hidden['id_']) || $this->nmgp_cmp_hidden['id_'] == 'on') && ((isset($this->Embutida_form) && $this->Embutida_form) || ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir"))) { 
      if (!isset($this->nm_new_label['id_'])) {
          $this->nm_new_label['id_'] = "ID"; } ?>

    <TD class="scFormLabelOddMult css_id__label" id="hidden_field_label_id_" style="<?php echo $sStyleHidden_id_; ?>" >       
<?php
      $SC_Label = "" . $this->nm_new_label['id_']  . "";
      $nome_img = $this->Ini->Label_sort;
      if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['ordem_cmp'] == "id")
      {
          $orderColName = "id";
          if ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['ordem_ord'] == " desc")
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_desc;
          }
          else
          {
              $orderColOrient = $nome_img = $this->Ini->Label_sort_asc;
          }
      }
      if (empty($this->Ini->Label_sort_pos))
      {
          $this->Ini->Label_sort_pos = "right_field";
      }
      $link_a = "<a href=\"javascript:nm_move('ordem', 'id')\" class=\"scFormLabelLink scFormLabelLinkOddMult\">";
      $link_img = (empty($nome_img) || $this->Ini->Export_img_zip) ? '' : $link_a . "<IMG SRC=\"" . $this->Ini->path_img_global . "/" . $nome_img . "\" BORDER=\"0\" class=\"sc-ui-img-order-column\" id=\"sc-id-img-order-id\" /></a>";
      $SC_Label = $link_a . $SC_Label . "</a>";
?>
<div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center">
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
    <div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "left_field") { ?><?php echo $link_img; ?><?php }
?>
        <?php echo $SC_Label; ?>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_field") { ?><?php echo $link_img; ?><?php }
?>
    </div>
<?php
      if ('' != $link_img && $this->Ini->Label_sort_pos == "right_cell") { ?><div><?php echo $link_img; ?></div><?php }
?>
</div>
 </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['nostruk_']) && $this->nmgp_cmp_hidden['nostruk_'] == 'off') { $sStyleHidden_nostruk_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['nostruk_']) || $this->nmgp_cmp_hidden['nostruk_'] == 'on') {
      if (!isset($this->nm_new_label['nostruk_'])) {
          $this->nm_new_label['nostruk_'] = "No Struk"; } ?>

    <TD class="scFormLabelOddMult css_nostruk__label" id="hidden_field_label_nostruk_" style="<?php echo $sStyleHidden_nostruk_; ?>" > <?php echo $this->nm_new_label['nostruk_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_2_']) && $this->nmgp_cmp_hidden['sc_field_2_'] == 'off') { $sStyleHidden_sc_field_2_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_2_']) || $this->nmgp_cmp_hidden['sc_field_2_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_2_'])) {
          $this->nm_new_label['sc_field_2_'] = "Tgl. Minta"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_2__label" id="hidden_field_label_sc_field_2_" style="<?php echo $sStyleHidden_sc_field_2_; ?>" > <?php echo $this->nm_new_label['sc_field_2_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['rm_']) && $this->nmgp_cmp_hidden['rm_'] == 'off') { $sStyleHidden_rm_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['rm_']) || $this->nmgp_cmp_hidden['rm_'] == 'on') {
      if (!isset($this->nm_new_label['rm_'])) {
          $this->nm_new_label['rm_'] = "RM"; } ?>

    <TD class="scFormLabelOddMult css_rm__label" id="hidden_field_label_rm_" style="<?php echo $sStyleHidden_rm_; ?>" > <?php echo $this->nm_new_label['rm_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['jenis_']) && $this->nmgp_cmp_hidden['jenis_'] == 'off') { $sStyleHidden_jenis_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['jenis_']) || $this->nmgp_cmp_hidden['jenis_'] == 'on') {
      if (!isset($this->nm_new_label['jenis_'])) {
          $this->nm_new_label['jenis_'] = "Jenis"; } ?>

    <TD class="scFormLabelOddMult css_jenis__label" id="hidden_field_label_jenis_" style="<?php echo $sStyleHidden_jenis_; ?>" > <?php echo $this->nm_new_label['jenis_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_1_']) && $this->nmgp_cmp_hidden['sc_field_1_'] == 'off') { $sStyleHidden_sc_field_1_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['sc_field_1_']) || $this->nmgp_cmp_hidden['sc_field_1_'] == 'on') {
      if (!isset($this->nm_new_label['sc_field_1_'])) {
          $this->nm_new_label['sc_field_1_'] = "Nama Pasien"; } ?>

    <TD class="scFormLabelOddMult css_sc_field_1__label" id="hidden_field_label_sc_field_1_" style="<?php echo $sStyleHidden_sc_field_1_; ?>" > <?php echo $this->nm_new_label['sc_field_1_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['usia_']) && $this->nmgp_cmp_hidden['usia_'] == 'off') { $sStyleHidden_usia_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['usia_']) || $this->nmgp_cmp_hidden['usia_'] == 'on') {
      if (!isset($this->nm_new_label['usia_'])) {
          $this->nm_new_label['usia_'] = "Usia"; } ?>

    <TD class="scFormLabelOddMult css_usia__label" id="hidden_field_label_usia_" style="<?php echo $sStyleHidden_usia_; ?>" > <?php echo $this->nm_new_label['usia_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['alamat_']) && $this->nmgp_cmp_hidden['alamat_'] == 'off') { $sStyleHidden_alamat_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['alamat_']) || $this->nmgp_cmp_hidden['alamat_'] == 'on') {
      if (!isset($this->nm_new_label['alamat_'])) {
          $this->nm_new_label['alamat_'] = "Alamat"; } ?>

    <TD class="scFormLabelOddMult css_alamat__label" id="hidden_field_label_alamat_" style="<?php echo $sStyleHidden_alamat_; ?>" > <?php echo $this->nm_new_label['alamat_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['lokasi_']) && $this->nmgp_cmp_hidden['lokasi_'] == 'off') { $sStyleHidden_lokasi_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['lokasi_']) || $this->nmgp_cmp_hidden['lokasi_'] == 'on') {
      if (!isset($this->nm_new_label['lokasi_'])) {
          $this->nm_new_label['lokasi_'] = "Lokasi"; } ?>

    <TD class="scFormLabelOddMult css_lokasi__label" id="hidden_field_label_lokasi_" style="<?php echo $sStyleHidden_lokasi_; ?>" > <?php echo $this->nm_new_label['lokasi_'] ?> </TD>
   <?php } ?>

   <?php if (isset($this->nmgp_cmp_hidden['status_']) && $this->nmgp_cmp_hidden['status_'] == 'off') { $sStyleHidden_status_ = 'display: none'; }
      if (1 || !isset($this->nmgp_cmp_hidden['status_']) || $this->nmgp_cmp_hidden['status_'] == 'on') {
      if (!isset($this->nm_new_label['status_'])) {
          $this->nm_new_label['status_'] = "Status"; } ?>

    <TD class="scFormLabelOddMult css_status__label" id="hidden_field_label_status_" style="<?php echo $sStyleHidden_status_; ?>" > <?php echo $this->nm_new_label['status_'] ?> </TD>
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
       $iStart = sizeof($this->form_vert_form_tbtracerrm_returned);
       $guarda_nmgp_opcao = $this->nmgp_opcao;
       $guarda_form_vert_form_tbtracerrm_returned = $this->form_vert_form_tbtracerrm_returned;
       $this->nmgp_opcao = 'novo';
   } 
   if ($this->Embutida_form && empty($this->form_vert_form_tbtracerrm_returned))
   {
       $sc_seq_vert = 0;
   }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['id_']))
           {
               $this->nmgp_cmp_readonly['id_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['nostruk_']))
           {
               $this->nmgp_cmp_readonly['nostruk_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['sc_field_2_']))
           {
               $this->nmgp_cmp_readonly['sc_field_2_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['rm_']))
           {
               $this->nmgp_cmp_readonly['rm_'] = 'on';
           }
           if ('novo' != $this->nmgp_opcao && !isset($this->nmgp_cmp_readonly['usia_']))
           {
               $this->nmgp_cmp_readonly['usia_'] = 'on';
           }
   foreach ($this->form_vert_form_tbtracerrm_returned as $sc_seq_vert => $sc_lixo)
   {
       $this->loadRecordState($sc_seq_vert);
       $this->penerima_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['penerima_'];
       $this->order_date_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['order_date_'];
       $this->process_date_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['process_date_'];
       $this->service_date_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['service_date_'];
       $this->returned_date_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['returned_date_'];
       $this->diagnosa_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['diagnosa_'];
       $this->sc_field_0_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['sc_field_0_'];
       if (isset($this->Embutida_ronly) && $this->Embutida_ronly && !$Line_Add)
       {
           $this->nmgp_cmp_readonly['id_'] = true;
           $this->nmgp_cmp_readonly['nostruk_'] = true;
           $this->nmgp_cmp_readonly['sc_field_2_'] = true;
           $this->nmgp_cmp_readonly['rm_'] = true;
           $this->nmgp_cmp_readonly['jenis_'] = true;
           $this->nmgp_cmp_readonly['sc_field_1_'] = true;
           $this->nmgp_cmp_readonly['usia_'] = true;
           $this->nmgp_cmp_readonly['alamat_'] = true;
           $this->nmgp_cmp_readonly['lokasi_'] = true;
           $this->nmgp_cmp_readonly['status_'] = true;
       }
       elseif ($Line_Add)
       {
           if (!isset($this->nmgp_cmp_readonly['id_']) || $this->nmgp_cmp_readonly['id_'] != "on") {$this->nmgp_cmp_readonly['id_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['nostruk_']) || $this->nmgp_cmp_readonly['nostruk_'] != "on") {$this->nmgp_cmp_readonly['nostruk_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_2_']) || $this->nmgp_cmp_readonly['sc_field_2_'] != "on") {$this->nmgp_cmp_readonly['sc_field_2_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['rm_']) || $this->nmgp_cmp_readonly['rm_'] != "on") {$this->nmgp_cmp_readonly['rm_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['jenis_']) || $this->nmgp_cmp_readonly['jenis_'] != "on") {$this->nmgp_cmp_readonly['jenis_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['sc_field_1_']) || $this->nmgp_cmp_readonly['sc_field_1_'] != "on") {$this->nmgp_cmp_readonly['sc_field_1_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['usia_']) || $this->nmgp_cmp_readonly['usia_'] != "on") {$this->nmgp_cmp_readonly['usia_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['alamat_']) || $this->nmgp_cmp_readonly['alamat_'] != "on") {$this->nmgp_cmp_readonly['alamat_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['lokasi_']) || $this->nmgp_cmp_readonly['lokasi_'] != "on") {$this->nmgp_cmp_readonly['lokasi_'] = false;}
           if (!isset($this->nmgp_cmp_readonly['status_']) || $this->nmgp_cmp_readonly['status_'] != "on") {$this->nmgp_cmp_readonly['status_'] = false;}
       }
              foreach ($this->form_vert_form_preenchimento[$sc_seq_vert] as $sCmpNome => $mCmpVal)
              {
                  eval("\$this->" . $sCmpNome . " = \$mCmpVal;");
              }
        $this->id_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['id_']; 
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
       $this->nostruk_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['nostruk_']; 
       $nostruk_ = $this->nostruk_; 
       if (!isset($this->nmgp_cmp_hidden['nostruk_']))
       {
           $this->nmgp_cmp_hidden['nostruk_'] = 'off';
       }
       $sStyleHidden_nostruk_ = '';
       if (isset($sCheckRead_nostruk_))
       {
           unset($sCheckRead_nostruk_);
       }
       if (isset($this->nmgp_cmp_readonly['nostruk_']))
       {
           $sCheckRead_nostruk_ = $this->nmgp_cmp_readonly['nostruk_'];
       }
       if (isset($this->nmgp_cmp_hidden['nostruk_']) && $this->nmgp_cmp_hidden['nostruk_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['nostruk_']);
           $sStyleHidden_nostruk_ = 'display: none;';
       }
       $bTestReadOnly_nostruk_ = true;
       $sStyleReadLab_nostruk_ = 'display: none;';
       $sStyleReadInp_nostruk_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["nostruk_"]) &&  $this->nmgp_cmp_readonly["nostruk_"] == "on"))
       {
           $bTestReadOnly_nostruk_ = false;
           unset($this->nmgp_cmp_readonly['nostruk_']);
           $sStyleReadLab_nostruk_ = '';
           $sStyleReadInp_nostruk_ = 'display: none;';
       }
       $this->sc_field_2_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['sc_field_2_']; 
       $sc_field_2_ = $this->sc_field_2_; 
       $sStyleHidden_sc_field_2_ = '';
       if (isset($sCheckRead_sc_field_2_))
       {
           unset($sCheckRead_sc_field_2_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_2_']))
       {
           $sCheckRead_sc_field_2_ = $this->nmgp_cmp_readonly['sc_field_2_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_2_']) && $this->nmgp_cmp_hidden['sc_field_2_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_2_']);
           $sStyleHidden_sc_field_2_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_2_ = true;
       $sStyleReadLab_sc_field_2_ = 'display: none;';
       $sStyleReadInp_sc_field_2_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["sc_field_2_"]) &&  $this->nmgp_cmp_readonly["sc_field_2_"] == "on"))
       {
           $bTestReadOnly_sc_field_2_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_2_']);
           $sStyleReadLab_sc_field_2_ = '';
           $sStyleReadInp_sc_field_2_ = 'display: none;';
       }
       $this->rm_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['rm_']; 
       $rm_ = $this->rm_; 
       $sStyleHidden_rm_ = '';
       if (isset($sCheckRead_rm_))
       {
           unset($sCheckRead_rm_);
       }
       if (isset($this->nmgp_cmp_readonly['rm_']))
       {
           $sCheckRead_rm_ = $this->nmgp_cmp_readonly['rm_'];
       }
       if (isset($this->nmgp_cmp_hidden['rm_']) && $this->nmgp_cmp_hidden['rm_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['rm_']);
           $sStyleHidden_rm_ = 'display: none;';
       }
       $bTestReadOnly_rm_ = true;
       $sStyleReadLab_rm_ = 'display: none;';
       $sStyleReadInp_rm_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["rm_"]) &&  $this->nmgp_cmp_readonly["rm_"] == "on"))
       {
           $bTestReadOnly_rm_ = false;
           unset($this->nmgp_cmp_readonly['rm_']);
           $sStyleReadLab_rm_ = '';
           $sStyleReadInp_rm_ = 'display: none;';
       }
       $this->jenis_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['jenis_']; 
       $jenis_ = $this->jenis_; 
       $sStyleHidden_jenis_ = '';
       if (isset($sCheckRead_jenis_))
       {
           unset($sCheckRead_jenis_);
       }
       if (isset($this->nmgp_cmp_readonly['jenis_']))
       {
           $sCheckRead_jenis_ = $this->nmgp_cmp_readonly['jenis_'];
       }
       if (isset($this->nmgp_cmp_hidden['jenis_']) && $this->nmgp_cmp_hidden['jenis_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['jenis_']);
           $sStyleHidden_jenis_ = 'display: none;';
       }
       $bTestReadOnly_jenis_ = true;
       $sStyleReadLab_jenis_ = 'display: none;';
       $sStyleReadInp_jenis_ = '';
       if (isset($this->nmgp_cmp_readonly['jenis_']) && $this->nmgp_cmp_readonly['jenis_'] == 'on')
       {
           $bTestReadOnly_jenis_ = false;
           unset($this->nmgp_cmp_readonly['jenis_']);
           $sStyleReadLab_jenis_ = '';
           $sStyleReadInp_jenis_ = 'display: none;';
       }
       $this->sc_field_1_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['sc_field_1_']; 
       $sc_field_1_ = $this->sc_field_1_; 
       $sStyleHidden_sc_field_1_ = '';
       if (isset($sCheckRead_sc_field_1_))
       {
           unset($sCheckRead_sc_field_1_);
       }
       if (isset($this->nmgp_cmp_readonly['sc_field_1_']))
       {
           $sCheckRead_sc_field_1_ = $this->nmgp_cmp_readonly['sc_field_1_'];
       }
       if (isset($this->nmgp_cmp_hidden['sc_field_1_']) && $this->nmgp_cmp_hidden['sc_field_1_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['sc_field_1_']);
           $sStyleHidden_sc_field_1_ = 'display: none;';
       }
       $bTestReadOnly_sc_field_1_ = true;
       $sStyleReadLab_sc_field_1_ = 'display: none;';
       $sStyleReadInp_sc_field_1_ = '';
       if (isset($this->nmgp_cmp_readonly['sc_field_1_']) && $this->nmgp_cmp_readonly['sc_field_1_'] == 'on')
       {
           $bTestReadOnly_sc_field_1_ = false;
           unset($this->nmgp_cmp_readonly['sc_field_1_']);
           $sStyleReadLab_sc_field_1_ = '';
           $sStyleReadInp_sc_field_1_ = 'display: none;';
       }
       $this->usia_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['usia_']; 
       $usia_ = $this->usia_; 
       $sStyleHidden_usia_ = '';
       if (isset($sCheckRead_usia_))
       {
           unset($sCheckRead_usia_);
       }
       if (isset($this->nmgp_cmp_readonly['usia_']))
       {
           $sCheckRead_usia_ = $this->nmgp_cmp_readonly['usia_'];
       }
       if (isset($this->nmgp_cmp_hidden['usia_']) && $this->nmgp_cmp_hidden['usia_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['usia_']);
           $sStyleHidden_usia_ = 'display: none;';
       }
       $bTestReadOnly_usia_ = true;
       $sStyleReadLab_usia_ = 'display: none;';
       $sStyleReadInp_usia_ = '';
       if (/*($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || */(isset($this->nmgp_cmp_readonly["usia_"]) &&  $this->nmgp_cmp_readonly["usia_"] == "on"))
       {
           $bTestReadOnly_usia_ = false;
           unset($this->nmgp_cmp_readonly['usia_']);
           $sStyleReadLab_usia_ = '';
           $sStyleReadInp_usia_ = 'display: none;';
       }
       $this->alamat_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['alamat_']; 
       $alamat_ = $this->alamat_; 
       $alamat__tmp = str_replace(array('\r\n', '\n\r', '\n', '\r'), array("\r\n", "\n\r", "\n", "\r"), $alamat_);
       $alamat__val = $alamat__tmp;
       $sStyleHidden_alamat_ = '';
       if (isset($sCheckRead_alamat_))
       {
           unset($sCheckRead_alamat_);
       }
       if (isset($this->nmgp_cmp_readonly['alamat_']))
       {
           $sCheckRead_alamat_ = $this->nmgp_cmp_readonly['alamat_'];
       }
       if (isset($this->nmgp_cmp_hidden['alamat_']) && $this->nmgp_cmp_hidden['alamat_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['alamat_']);
           $sStyleHidden_alamat_ = 'display: none;';
       }
       $bTestReadOnly_alamat_ = true;
       $sStyleReadLab_alamat_ = 'display: none;';
       $sStyleReadInp_alamat_ = '';
       if (isset($this->nmgp_cmp_readonly['alamat_']) && $this->nmgp_cmp_readonly['alamat_'] == 'on')
       {
           $bTestReadOnly_alamat_ = false;
           unset($this->nmgp_cmp_readonly['alamat_']);
           $sStyleReadLab_alamat_ = '';
           $sStyleReadInp_alamat_ = 'display: none;';
       }
       $this->lokasi_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['lokasi_']; 
       $lokasi_ = $this->lokasi_; 
       $sStyleHidden_lokasi_ = '';
       if (isset($sCheckRead_lokasi_))
       {
           unset($sCheckRead_lokasi_);
       }
       if (isset($this->nmgp_cmp_readonly['lokasi_']))
       {
           $sCheckRead_lokasi_ = $this->nmgp_cmp_readonly['lokasi_'];
       }
       if (isset($this->nmgp_cmp_hidden['lokasi_']) && $this->nmgp_cmp_hidden['lokasi_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['lokasi_']);
           $sStyleHidden_lokasi_ = 'display: none;';
       }
       $bTestReadOnly_lokasi_ = true;
       $sStyleReadLab_lokasi_ = 'display: none;';
       $sStyleReadInp_lokasi_ = '';
       if (isset($this->nmgp_cmp_readonly['lokasi_']) && $this->nmgp_cmp_readonly['lokasi_'] == 'on')
       {
           $bTestReadOnly_lokasi_ = false;
           unset($this->nmgp_cmp_readonly['lokasi_']);
           $sStyleReadLab_lokasi_ = '';
           $sStyleReadInp_lokasi_ = 'display: none;';
       }
       $this->status_ = $this->form_vert_form_tbtracerrm_returned[$sc_seq_vert]['status_']; 
       $status_ = $this->status_; 
       $sStyleHidden_status_ = '';
       if (isset($sCheckRead_status_))
       {
           unset($sCheckRead_status_);
       }
       if (isset($this->nmgp_cmp_readonly['status_']))
       {
           $sCheckRead_status_ = $this->nmgp_cmp_readonly['status_'];
       }
       if (isset($this->nmgp_cmp_hidden['status_']) && $this->nmgp_cmp_hidden['status_'] == 'off')
       {
           unset($this->nmgp_cmp_hidden['status_']);
           $sStyleHidden_status_ = 'display: none;';
       }
       $bTestReadOnly_status_ = true;
       $sStyleReadLab_status_ = 'display: none;';
       $sStyleReadInp_status_ = '';
       if (isset($this->nmgp_cmp_readonly['status_']) && $this->nmgp_cmp_readonly['status_'] == 'on')
       {
           $bTestReadOnly_status_ = false;
           unset($this->nmgp_cmp_readonly['status_']);
           $sStyleReadLab_status_ = '';
           $sStyleReadInp_status_ = 'display: none;';
       }

       $nm_cor_fun_vert = ($nm_cor_fun_vert == $this->Ini->cor_grid_impar ? $this->Ini->cor_grid_par : $this->Ini->cor_grid_impar);
       $nm_img_fun_cel  = ($nm_img_fun_cel  == $this->Ini->img_fun_imp    ? $this->Ini->img_fun_par  : $this->Ini->img_fun_imp);

       $sHideNewLine = '';
?>   
   <tr id="idVertRow<?php echo $sc_seq_vert; ?>"<?php echo $sHideNewLine; ?>>


   
    <TD class="scFormDataOddMult"  id="hidden_field_data_sc_seq<?php echo $sc_seq_vert; ?>" > <?php echo $sc_seq_vert; ?> </TD>
   
   <?php if (!$this->Embutida_form && $this->nmgp_opcao != "novo" && ($this->nmgp_botoes['delete'] == "on" || $this->nmgp_botoes['update'] == "on")) {?>
    <TD class="scFormDataOddMult" > 
<input type="checkbox" name="sc_check_vert[<?php echo $sc_seq_vert ?>]" value="<?php echo $sc_seq_vert . "\""; if (in_array($sc_seq_vert, $sc_check_excl)) { echo " checked";} ?> onclick="if (this.checked) {sc_quant_excl++; } else {sc_quant_excl--; }" class="sc-js-input" alt="{type: 'checkbox', enterTab: false}"> </TD>
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
<?php echo nmButtonOutput($this->arr_buttons, "bmd_novo", "do_ajax_form_tbtracerrm_returned_add_new_line(" . $sc_seq_vert . ")", "do_ajax_form_tbtracerrm_returned_add_new_line(" . $sc_seq_vert . ")", "sc_new_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php }?>
<?php
  $Style_add_line = (!$Line_Add) ? "display: none" : "";
?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbtracerrm_returned_cancel_insert(" . $sc_seq_vert . ")", "do_ajax_form_tbtracerrm_returned_cancel_insert(" . $sc_seq_vert . ")", "sc_canceli_line_" . $sc_seq_vert . "", "", "", "" . $Style_add_line . "", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
<?php echo nmButtonOutput($this->arr_buttons, "bmd_cancelar", "do_ajax_form_tbtracerrm_returned_cancel_update(" . $sc_seq_vert . ")", "do_ajax_form_tbtracerrm_returned_cancel_update(" . $sc_seq_vert . ")", "sc_cancelu_line_" . $sc_seq_vert . "", "", "", "display: none", "", "", "", $this->Ini->path_botoes, "", "", "", "", "");?>
 </TD>
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

   <?php if (isset($this->nmgp_cmp_hidden['nostruk_']) && $this->nmgp_cmp_hidden['nostruk_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="nostruk_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nostruk_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_nostruk__line" id="hidden_field_data_nostruk_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_nostruk_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_nostruk__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_nostruk_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["nostruk_"]) &&  $this->nmgp_cmp_readonly["nostruk_"] == "on")) { 

 ?>
<input type="hidden" name="nostruk_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nostruk_) . "\"><span id=\"id_ajax_label_nostruk_" . $sc_seq_vert . "\">" . $nostruk_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_nostruk_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-nostruk_<?php echo $sc_seq_vert ?> css_nostruk__line" style="<?php echo $sStyleReadLab_nostruk_; ?>"><?php echo $this->nostruk_; ?></span><span id="id_read_off_nostruk_<?php echo $sc_seq_vert ?>" class="css_read_off_nostruk_" style="white-space: nowrap;<?php echo $sStyleReadInp_nostruk_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_nostruk__obj" style="" id="id_sc_field_nostruk_<?php echo $sc_seq_vert ?>" type=text name="nostruk_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($nostruk_) ?>"
 size=15 maxlength=15 alt="{datatype: 'text', maxLength: 15, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_nostruk_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_nostruk_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_2_']) && $this->nmgp_cmp_hidden['sc_field_2_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="sc_field_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_2_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_2__line" id="hidden_field_data_sc_field_2_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_2_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_2__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_2_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["sc_field_2_"]) &&  $this->nmgp_cmp_readonly["sc_field_2_"] == "on")) { 

 ?>
<input type="hidden" name="sc_field_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_2_) . "\"><span id=\"id_ajax_label_sc_field_2_" . $sc_seq_vert . "\">" . $sc_field_2_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_sc_field_2_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-sc_field_2_<?php echo $sc_seq_vert ?> css_sc_field_2__line" style="<?php echo $sStyleReadLab_sc_field_2_; ?>"><?php echo $this->sc_field_2_; ?></span><span id="id_read_off_sc_field_2_<?php echo $sc_seq_vert ?>" class="css_read_off_sc_field_2_" style="white-space: nowrap;<?php echo $sStyleReadInp_sc_field_2_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_sc_field_2__obj" style="" id="id_sc_field_sc_field_2_<?php echo $sc_seq_vert ?>" type=text name="sc_field_2_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_2_) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_2_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_2_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['rm_']) && $this->nmgp_cmp_hidden['rm_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="rm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rm_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_rm__line" id="hidden_field_data_rm_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_rm_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_rm__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_rm_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["rm_"]) &&  $this->nmgp_cmp_readonly["rm_"] == "on")) { 

 ?>
<input type="hidden" name="rm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rm_) . "\"><span id=\"id_ajax_label_rm_" . $sc_seq_vert . "\">" . $rm_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_rm_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-rm_<?php echo $sc_seq_vert ?> css_rm__line" style="<?php echo $sStyleReadLab_rm_; ?>"><?php echo $this->rm_; ?></span><span id="id_read_off_rm_<?php echo $sc_seq_vert ?>" class="css_read_off_rm_" style="white-space: nowrap;<?php echo $sStyleReadInp_rm_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_rm__obj" style="" id="id_sc_field_rm_<?php echo $sc_seq_vert ?>" type=text name="rm_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($rm_) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_rm_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_rm_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['jenis_']) && $this->nmgp_cmp_hidden['jenis_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="jenis_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->jenis_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_jenis__line" id="hidden_field_data_jenis_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_jenis_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_jenis__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_jenis_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["jenis_"]) &&  $this->nmgp_cmp_readonly["jenis_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_jenis_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_jenis_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_jenis_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_jenis_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_jenis_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_jenis_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_jenis_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_jenis_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT custCode, jenis  FROM tbantrian where custCode = '$this->rm_' ORDER BY jenis";

   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_jenis_'][] = $rs->fields[0];
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
   $jenis__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->jenis__1))
          {
              foreach ($this->jenis__1 as $tmp_jenis_)
              {
                  if (trim($tmp_jenis_) === trim($cadaselect[1])) { $jenis__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->jenis_) === trim($cadaselect[1])) { $jenis__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="jenis_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($jenis_) . "\">" . $jenis__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_jenis_();
   $x = 0 ; 
   $jenis__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->jenis__1))
          {
              foreach ($this->jenis__1 as $tmp_jenis_)
              {
                  if (trim($tmp_jenis_) === trim($cadaselect[1])) { $jenis__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->jenis_) === trim($cadaselect[1])) { $jenis__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($jenis__look))
          {
              $jenis__look = $this->jenis_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_jenis_" . $sc_seq_vert . "\" class=\"css_jenis__line\" style=\"" .  $sStyleReadLab_jenis_ . "\">" . $this->form_encode_input($jenis__look) . "</span><span id=\"id_read_off_jenis_" . $sc_seq_vert . "\" class=\"css_read_off_jenis_\" style=\"white-space: nowrap; " . $sStyleReadInp_jenis_ . "\">";
   echo " <span id=\"idAjaxSelect_jenis_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_jenis__obj\" style=\"\" id=\"id_sc_field_jenis_" . $sc_seq_vert . "\" name=\"jenis_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->jenis_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->jenis_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_jenis_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_jenis_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['sc_field_1_']) && $this->nmgp_cmp_hidden['sc_field_1_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="sc_field_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->sc_field_1_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_sc_field_1__line" id="hidden_field_data_sc_field_1_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_sc_field_1_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_sc_field_1__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_sc_field_1_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["sc_field_1_"]) &&  $this->nmgp_cmp_readonly["sc_field_1_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_sc_field_1_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_sc_field_1_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_sc_field_1_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_sc_field_1_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_sc_field_1_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_sc_field_1_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_sc_field_1_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_sc_field_1_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;

   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_sybase))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer  WHERE custCode = '$this->rm_'  ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mysql))
   {
       $nm_comando = "SELECT custCode, concat(name,', ', salut)  FROM tbcustomer  WHERE custCode = '$this->rm_'  ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_access))
   {
       $nm_comando = "SELECT custCode, name&', '&salut  FROM tbcustomer  WHERE custCode = '$this->rm_'  ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_postgres))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer  WHERE custCode = '$this->rm_'  ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_mssql))
   {
       $nm_comando = "SELECT custCode, name + ', ' + salut  FROM tbcustomer  WHERE custCode = '$this->rm_'  ORDER BY name, salut";
   }
   elseif (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_db2))
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer  WHERE custCode = '$this->rm_'  ORDER BY name, salut";
   }
   else
   {
       $nm_comando = "SELECT custCode, name||', '||salut  FROM tbcustomer  WHERE custCode = '$this->rm_'  ORDER BY name, salut";
   }

   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $nmgp_def_dados .= $rs->fields[1] . "?#?" ; 
              $nmgp_def_dados .= $rs->fields[0] . "?#?N?@?" ; 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_sc_field_1_'][] = $rs->fields[0];
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
   $sc_field_1__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sc_field_1__1))
          {
              foreach ($this->sc_field_1__1 as $tmp_sc_field_1_)
              {
                  if (trim($tmp_sc_field_1_) === trim($cadaselect[1])) { $sc_field_1__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sc_field_1_) === trim($cadaselect[1])) { $sc_field_1__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="sc_field_1_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($sc_field_1_) . "\">" . $sc_field_1__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_sc_field_1_();
   $x = 0 ; 
   $sc_field_1__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->sc_field_1__1))
          {
              foreach ($this->sc_field_1__1 as $tmp_sc_field_1_)
              {
                  if (trim($tmp_sc_field_1_) === trim($cadaselect[1])) { $sc_field_1__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->sc_field_1_) === trim($cadaselect[1])) { $sc_field_1__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($sc_field_1__look))
          {
              $sc_field_1__look = $this->sc_field_1_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_sc_field_1_" . $sc_seq_vert . "\" class=\"css_sc_field_1__line\" style=\"" .  $sStyleReadLab_sc_field_1_ . "\">" . $this->form_encode_input($sc_field_1__look) . "</span><span id=\"id_read_off_sc_field_1_" . $sc_seq_vert . "\" class=\"css_read_off_sc_field_1_\" style=\"white-space: nowrap; " . $sStyleReadInp_sc_field_1_ . "\">";
   echo " <span id=\"idAjaxSelect_sc_field_1_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_sc_field_1__obj\" style=\"\" id=\"id_sc_field_sc_field_1_" . $sc_seq_vert . "\" name=\"sc_field_1_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->sc_field_1_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->sc_field_1_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_sc_field_1_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_sc_field_1_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['usia_']) && $this->nmgp_cmp_hidden['usia_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="usia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usia_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_usia__line" id="hidden_field_data_usia_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_usia_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_usia__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_usia_ && ($this->nmgp_opcao != "novo" && $this->nmgp_opc_ant != "incluir") || (isset($this->nmgp_cmp_readonly["usia_"]) &&  $this->nmgp_cmp_readonly["usia_"] == "on")) { 

 ?>
<input type="hidden" name="usia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usia_) . "\"><span id=\"id_ajax_label_usia_" . $sc_seq_vert . "\">" . $usia_ . "</span>"; ?>
<?php } else { ?>
<span id="id_read_on_usia_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-usia_<?php echo $sc_seq_vert ?> css_usia__line" style="<?php echo $sStyleReadLab_usia_; ?>"><?php echo $this->usia_; ?></span><span id="id_read_off_usia_<?php echo $sc_seq_vert ?>" class="css_read_off_usia_" style="white-space: nowrap;<?php echo $sStyleReadInp_usia_; ?>">
 <input class="sc-js-input scFormObjectOddMult css_usia__obj" style="" id="id_sc_field_usia_<?php echo $sc_seq_vert ?>" type=text name="usia_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($usia_) ?>"
 size=10 maxlength=20 alt="{datatype: 'text', maxLength: 20, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" ></span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_usia_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_usia_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['alamat_']) && $this->nmgp_cmp_hidden['alamat_'] == 'off') { $sc_hidden_yes++;  ?>
<input type="hidden" name="alamat_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($alamat_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_alamat__line" id="hidden_field_data_alamat_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_alamat_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_alamat__line" style="vertical-align: top;padding: 0px">
<?php
$alamat__val = str_replace('<br />', '__SC_BREAK_LINE__', nl2br($alamat_));

?>

<?php if ($bTestReadOnly_alamat_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["alamat_"]) &&  $this->nmgp_cmp_readonly["alamat_"] == "on") { 

 ?>
<input type="hidden" name="alamat_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($alamat_) . "\">" . $alamat__val . ""; ?>
<?php } else { ?>
<span id="id_read_on_alamat_<?php echo $sc_seq_vert ?>" class="sc-ui-readonly-alamat_<?php echo $sc_seq_vert ?> css_alamat__line" style="<?php echo $sStyleReadLab_alamat_; ?>"><?php echo $alamat__val; ?></span><span id="id_read_off_alamat_<?php echo $sc_seq_vert ?>" class="css_read_off_alamat_" style="white-space: nowrap;<?php echo $sStyleReadInp_alamat_; ?>">
 <textarea  class="sc-js-input scFormObjectOddMult css_alamat__obj" style="white-space: pre-wrap;" name="alamat_<?php echo $sc_seq_vert ?>" id="id_sc_field_alamat_<?php echo $sc_seq_vert ?>" rows="3" cols="35"
 alt="{datatype: 'text', maxLength: 35, allowedChars: '<?php echo $this->allowedCharsCharset("") ?>', lettersCase: '', enterTab: false, enterSubmit: false, autoTab: false, selectOnFocus: true, watermark: '', watermarkClass: 'scFormObjectOddMultWm', maskChars: '(){}[].,;:-+/ '}" >
<?php echo $alamat_; ?>
</textarea>
</span><?php } ?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_alamat_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_alamat_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['lokasi_']) && $this->nmgp_cmp_hidden['lokasi_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="lokasi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->lokasi_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_lokasi__line" id="hidden_field_data_lokasi_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_lokasi_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_lokasi__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_lokasi_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["lokasi_"]) &&  $this->nmgp_cmp_readonly["lokasi_"] == "on") { 
 
$nmgp_def_dados = "" ; 
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_lokasi_']))
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_lokasi_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_lokasi_']); 
}
else
{
    $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_lokasi_'] = array(); 
}
   if (in_array(strtolower($this->Ini->nm_tpbanco), $this->Ini->nm_bases_ibase))
   { 
       $GLOBALS["NM_ERRO_IBASE"] = 1;  
   } 
   $nm_nao_carga = false;
   $nmgp_def_dados = "" ; 
   if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_lokasi_']))
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_lokasi_'] = array_unique($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_lokasi_']); 
   }
   else
   {
       $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_lokasi_'] = array(); 
    }

   $old_value_id_ = $this->id_;
   $this->nm_tira_formatacao();


   $unformatted_value_id_ = $this->id_;

   $nm_comando = "SELECT 	c. NAME AS poly FROM 	tbantrian a LEFT JOIN ( 	SELECT 		a.poly AS poly, 		a.struckNo 	FROM 		tbantrian a 	UNION 		SELECT 			b.poli AS poly, 			a.struckNo 		FROM 			tbadmrawatinap a 		LEFT JOIN tbdoctor b ON b.docCode = a.doctor ) b ON b.poly = a.poly LEFT JOIN tbpoli c ON c.polyCode = b.poly WHERE 	a.struckNo = '$this->nostruk_' GROUP BY 	a.struckNo";

   $this->id_ = $old_value_id_;

   $_SESSION['scriptcase']['sc_sql_ult_comando'] = $nm_comando;
   $_SESSION['scriptcase']['sc_sql_ult_conexao'] = '';
   if ($nm_comando != "" && $rs = $this->Db->Execute($nm_comando))
   {
       while (!$rs->EOF) 
       { 
              $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_lokasi_'][] = $rs->fields[0];
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
   $lokasi__look = ""; 
   $todox = str_replace("?#?@?#?", "?#?@ ?#?", trim($nmgp_def_dados)) ; 
   $todo  = explode("?@?", $todox) ; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->lokasi__1))
          {
              foreach ($this->lokasi__1 as $tmp_lokasi_)
              {
                  if (trim($tmp_lokasi_) === trim($cadaselect[1])) { $lokasi__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->lokasi_) === trim($cadaselect[1])) { $lokasi__look .= $cadaselect[0]; } 
          $x++; 
   }

?>
<input type="hidden" name="lokasi_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($lokasi_) . "\">" . $lokasi__look . ""; ?>
<?php } else { ?>
<?php
   $todo = $this->Form_lookup_lokasi_();
   $x = 0 ; 
   $lokasi__look = ""; 
   while (!empty($todo[$x])) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          if (isset($this->Embutida_ronly) && $this->Embutida_ronly && isset($this->lokasi__1))
          {
              foreach ($this->lokasi__1 as $tmp_lokasi_)
              {
                  if (trim($tmp_lokasi_) === trim($cadaselect[1])) { $lokasi__look .= $cadaselect[0] . '__SC_BREAK_LINE__'; }
              }
          }
          elseif (trim($this->lokasi_) === trim($cadaselect[1])) { $lokasi__look .= $cadaselect[0]; } 
          $x++; 
   }
          if (empty($lokasi__look))
          {
              $lokasi__look = $this->lokasi_;
          }
   $x = 0; 
   echo "<span id=\"id_read_on_lokasi_" . $sc_seq_vert . "\" class=\"css_lokasi__line\" style=\"" .  $sStyleReadLab_lokasi_ . "\">" . $this->form_encode_input($lokasi__look) . "</span><span id=\"id_read_off_lokasi_" . $sc_seq_vert . "\" class=\"css_read_off_lokasi_\" style=\"white-space: nowrap; " . $sStyleReadInp_lokasi_ . "\">";
   echo " <span id=\"idAjaxSelect_lokasi_" .  $sc_seq_vert . "\"><select class=\"sc-js-input scFormObjectOddMult css_lokasi__obj\" style=\"\" id=\"id_sc_field_lokasi_" . $sc_seq_vert . "\" name=\"lokasi_" . $sc_seq_vert . "\" size=\"1\" alt=\"{type: 'select', enterTab: false}\">" ; 
   echo "\r" ; 
   while (!empty($todo[$x]) && !$nm_nao_carga) 
   {
          $cadaselect = explode("?#?", $todo[$x]) ; 
          if ($cadaselect[1] == "@ ") {$cadaselect[1]= trim($cadaselect[1]); } ; 
          echo "  <option value=\"$cadaselect[1]\"" ; 
          if (trim($this->lokasi_) === trim($cadaselect[1])) 
          {
              echo " selected" ; 
          }
          if (strtoupper($cadaselect[2]) == "S") 
          {
              if (empty($this->lokasi_)) 
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
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_lokasi_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_lokasi_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>

   <?php if (isset($this->nmgp_cmp_hidden['status_']) && $this->nmgp_cmp_hidden['status_'] == 'off') { $sc_hidden_yes++; ?>
<input type=hidden name="status_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($this->status_) . "\">"; ?>
<?php } else { $sc_hidden_no++; ?>

    <TD class="scFormDataOddMult css_status__line" id="hidden_field_data_status_<?php echo $sc_seq_vert; ?>" style="<?php echo $sStyleHidden_status_; ?>"> <table style="border-width: 0px; border-collapse: collapse; width: 100%"><tr><td  class="scFormDataFontOddMult css_status__line" style="vertical-align: top;padding: 0px">
<?php if ($bTestReadOnly_status_ && $this->nmgp_opcao != "novo" && isset($this->nmgp_cmp_readonly["status_"]) &&  $this->nmgp_cmp_readonly["status_"] == "on") { 

$status__look = "";
 if ($this->status_ == "0") { $status__look .= "Permintaan Berkas" ;} 
 if ($this->status_ == "1") { $status__look .= "Dalam Proses" ;} 
 if ($this->status_ == "2") { $status__look .= "Pelayanan" ;} 
 if ($this->status_ == "3") { $status__look .= "Sudah Kembali" ;} 
 if (empty($status__look)) { $status__look = $this->status_; }
?>
<input type="hidden" name="status_<?php echo $sc_seq_vert ?>" value="<?php echo $this->form_encode_input($status_) . "\">" . $status__look . ""; ?>
<?php } else { ?>
<?php

$status__look = "";
 if ($this->status_ == "0") { $status__look .= "Permintaan Berkas" ;} 
 if ($this->status_ == "1") { $status__look .= "Dalam Proses" ;} 
 if ($this->status_ == "2") { $status__look .= "Pelayanan" ;} 
 if ($this->status_ == "3") { $status__look .= "Sudah Kembali" ;} 
 if (empty($status__look)) { $status__look = $this->status_; }
?>
<span id="id_read_on_status_<?php echo $sc_seq_vert ; ?>" class="css_status__line"  style="<?php echo $sStyleReadLab_status_; ?>"><?php echo $this->form_encode_input($status__look); ?></span><span id="id_read_off_status_<?php echo $sc_seq_vert ; ?>" class="css_read_off_status_" style="white-space: nowrap; <?php echo $sStyleReadInp_status_; ?>">
 <span id="idAjaxSelect_status_<?php echo $sc_seq_vert ?>"><select class="sc-js-input scFormObjectOddMult css_status__obj" style="" id="id_sc_field_status_<?php echo $sc_seq_vert ?>" name="status_<?php echo $sc_seq_vert ?>" size="1" alt="{type: 'select', enterTab: false}">
 <option  value="0" <?php  if ($this->status_ == "0") { echo " selected" ;} ?>>Permintaan Berkas</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_status_'][] = '0'; ?>
 <option  value="1" <?php  if ($this->status_ == "1") { echo " selected" ;} ?>>Dalam Proses</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_status_'][] = '1'; ?>
 <option  value="2" <?php  if ($this->status_ == "2") { echo " selected" ;} ?>>Pelayanan</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_status_'][] = '2'; ?>
 <option  value="3" <?php  if ($this->status_ == "3") { echo " selected" ;} ?>>Sudah Kembali</option>
<?php $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['Lookup_status_'][] = '3'; ?>
 </select></span>
</span><?php  }?>
</td></tr><tr><td style="vertical-align: top; padding: 0"><table class="scFormFieldErrorTable" style="display: none" id="id_error_display_status_<?php echo $sc_seq_vert; ?>_frame"><tr><td class="scFormFieldErrorMessage"><span id="id_error_display_status_<?php echo $sc_seq_vert; ?>_text"></span></td></tr></table></td></tr></table> </TD>
   <?php }?>





   </tr>
<?php   
        if (isset($sCheckRead_id_))
       {
           $this->nmgp_cmp_readonly['id_'] = $sCheckRead_id_;
       }
       if ('display: none;' == $sStyleHidden_id_)
       {
           $this->nmgp_cmp_hidden['id_'] = 'off';
       }
       if (isset($sCheckRead_nostruk_))
       {
           $this->nmgp_cmp_readonly['nostruk_'] = $sCheckRead_nostruk_;
       }
       if ('display: none;' == $sStyleHidden_nostruk_)
       {
           $this->nmgp_cmp_hidden['nostruk_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_2_))
       {
           $this->nmgp_cmp_readonly['sc_field_2_'] = $sCheckRead_sc_field_2_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_2_)
       {
           $this->nmgp_cmp_hidden['sc_field_2_'] = 'off';
       }
       if (isset($sCheckRead_rm_))
       {
           $this->nmgp_cmp_readonly['rm_'] = $sCheckRead_rm_;
       }
       if ('display: none;' == $sStyleHidden_rm_)
       {
           $this->nmgp_cmp_hidden['rm_'] = 'off';
       }
       if (isset($sCheckRead_jenis_))
       {
           $this->nmgp_cmp_readonly['jenis_'] = $sCheckRead_jenis_;
       }
       if ('display: none;' == $sStyleHidden_jenis_)
       {
           $this->nmgp_cmp_hidden['jenis_'] = 'off';
       }
       if (isset($sCheckRead_sc_field_1_))
       {
           $this->nmgp_cmp_readonly['sc_field_1_'] = $sCheckRead_sc_field_1_;
       }
       if ('display: none;' == $sStyleHidden_sc_field_1_)
       {
           $this->nmgp_cmp_hidden['sc_field_1_'] = 'off';
       }
       if (isset($sCheckRead_usia_))
       {
           $this->nmgp_cmp_readonly['usia_'] = $sCheckRead_usia_;
       }
       if ('display: none;' == $sStyleHidden_usia_)
       {
           $this->nmgp_cmp_hidden['usia_'] = 'off';
       }
       if (isset($sCheckRead_alamat_))
       {
           $this->nmgp_cmp_readonly['alamat_'] = $sCheckRead_alamat_;
       }
       if ('display: none;' == $sStyleHidden_alamat_)
       {
           $this->nmgp_cmp_hidden['alamat_'] = 'off';
       }
       if (isset($sCheckRead_lokasi_))
       {
           $this->nmgp_cmp_readonly['lokasi_'] = $sCheckRead_lokasi_;
       }
       if ('display: none;' == $sStyleHidden_lokasi_)
       {
           $this->nmgp_cmp_hidden['lokasi_'] = 'off';
       }
       if (isset($sCheckRead_status_))
       {
           $this->nmgp_cmp_readonly['status_'] = $sCheckRead_status_;
       }
       if ('display: none;' == $sStyleHidden_status_)
       {
           $this->nmgp_cmp_hidden['status_'] = 'off';
       }

   }
   if ($Line_Add) 
   { 
       $this->New_Line = ob_get_contents();
       ob_end_clean();
       $this->nmgp_opcao = $guarda_nmgp_opcao;
       $this->form_vert_form_tbtracerrm_returned = $guarda_form_vert_form_tbtracerrm_returned;
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
 <div id="sc-id-fixedheaders-placeholder" style="display: none; position: fixed; top: 0; z-index: 500"></div>
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R")
{
?>
    <table style="border-collapse: collapse; border-width: 0px; width: 100%"><tr><td class="scFormToolbar" style="padding: 0px; spacing: 0px">
    <table style="border-collapse: collapse; border-width: 0px; width: 100%">
    <tr> 
     <td nowrap align="left" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php
}
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R")
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
      if ($opcao_botoes != "novo" && $this->nmgp_botoes['qtline'] == "on")
      {
?> 
          <span class="<?php echo $this->css_css_toolbar_obj ?>" style="border: 0px;"><?php echo $this->Ini->Nm_lang['lang_btns_rows'] ?></span>
          <select class="scFormToolbarInput" name="nmgp_quant_linhas_b" onchange="document.F7.nmgp_max_line.value = this.value; document.F7.submit();"> 
<?php 
              $obj_sel = ($this->sc_max_reg == '10') ? " selected" : "";
?> 
           <option value="10" <?php echo $obj_sel ?>>10</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '20') ? " selected" : "";
?> 
           <option value="20" <?php echo $obj_sel ?>>20</option>
<?php 
              $obj_sel = ($this->sc_max_reg == '50') ? " selected" : "";
?> 
           <option value="50" <?php echo $obj_sel ?>>50</option>
          </select>
<?php 
      }
?> 
     </td> 
     <td nowrap align="center" valign="middle" width="33%" class="scFormToolbarPadding"> 
<?php 
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['first'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "binicio", "scBtnFn_sys_format_ini()", "scBtnFn_sys_format_ini()", "sc_b_ini_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-5", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['back'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bretorna", "scBtnFn_sys_format_ret()", "scBtnFn_sys_format_ret()", "sc_b_ret_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-6", "", "");?>
 
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
       <?php echo nmButtonOutput($this->arr_buttons, "bavanca", "scBtnFn_sys_format_ava()", "scBtnFn_sys_format_ava()", "sc_b_avc_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-7", "", "");?>
 
<?php
        $NM_btn = true;
    }
    if (($opcao_botoes != "novo") && ('total' != $this->form_paginacao)) {
        $sCondStyle = ($this->nmgp_botoes['last'] == "on") ? '' : 'display: none;';
?>
       <?php echo nmButtonOutput($this->arr_buttons, "bfinal", "scBtnFn_sys_format_fim()", "scBtnFn_sys_format_fim()", "sc_b_fim_b", "", "", "" . $sCondStyle . "", "", "", "", $this->Ini->path_botoes, "", "", "sc-unique-btn-8", "", "");?>
 
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
if (($this->Embutida_form || !$this->Embutida_call || $this->Grid_editavel || $this->Embutida_multi || ($this->Embutida_call && 'on' == $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['embutida_liga_form_btn_nav'])) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R")
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
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F") { if ('parcial' == $this->form_paginacao) {?><script>summary_atualiza(<?php echo ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['reg_start'] + 1). ", " . $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['reg_qtd'] . ", " . ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['total'] + 1)?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F") { if ('total' == $this->form_paginacao) {?><script>summary_atualiza(1, <?php echo $this->sc_max_reg . ", " . $this->sc_max_reg?>);</script><?php }} ?>
<?php if (('novo' != $this->nmgp_opcao || $this->Embutida_form) && !$this->nmgp_form_empty && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "R" && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_iframe'] != "F") { ?><script>navpage_atualiza('<?php echo $this->SC_nav_page ?>');</script><?php } ?>
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
if (!isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_modal']) || !$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['run_modal'])
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
if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['masterValue']))
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard']) {
?>
var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['parent_widget']; ?>']");
if (dbParentFrame && dbParentFrame[0] && dbParentFrame[0].contentWindow.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['masterValue'] as $cmp_master => $val_master)
        {
?>
    dbParentFrame[0].contentWindow.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['masterValue']);
?>
}
<?php
    }
    else {
?>
if (parent && parent.scAjaxDetailValue)
{
<?php
        foreach ($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['masterValue'] as $cmp_master => $val_master)
        {
?>
    parent.scAjaxDetailValue('<?php echo $cmp_master ?>', '<?php echo $val_master ?>');
<?php
        }
        unset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['masterValue']);
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
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard']) {
?>
<script>
 var dbParentFrame = $(parent.document).find("[name='<?php echo $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['parent_widget']; ?>']");
 dbParentFrame[0].contentWindow.scAjaxDetailStatus("form_tbtracerrm_returned");
</script>
<?php
    }
    else {
        $sTamanhoIframe = isset($_POST['sc_ifr_height']) && '' != $_POST['sc_ifr_height'] ? '"' . $_POST['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 parent.scAjaxDetailStatus("form_tbtracerrm_returned");
 parent.scAjaxDetailHeight("form_tbtracerrm_returned", <?php echo $sTamanhoIframe; ?>);
</script>
<?php
    }
}
elseif (isset($_GET['script_case_detail']) && 'Y' == $_GET['script_case_detail'])
{
    if (isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['dashboard_info']['under_dashboard']) {
    }
    else {
    $sTamanhoIframe = isset($_GET['sc_ifr_height']) && '' != $_GET['sc_ifr_height'] ? '"' . $_GET['sc_ifr_height'] . '"' : '$(document).innerHeight()';
?>
<script>
 if (0 == <?php echo $sTamanhoIframe; ?>) {
  setTimeout(function() {
   parent.scAjaxDetailHeight("form_tbtracerrm_returned", <?php echo $sTamanhoIframe; ?>);
  }, 100);
 }
 else {
  parent.scAjaxDetailHeight("form_tbtracerrm_returned", <?php echo $sTamanhoIframe; ?>);
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
if ($this->lig_edit_lookup && isset($_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['sc_modal']) && $_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['sc_modal'])
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
	function scBtnFn_sys_format_alt() {
		if ($("#sc_b_upd_t.sc-unique-btn-1").length && $("#sc_b_upd_t.sc-unique-btn-1").is(":visible")) {
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
		if ($("#sc_b_sai_t.sc-unique-btn-2").length && $("#sc_b_sai_t.sc-unique-btn-2").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-3").length && $("#sc_b_sai_t.sc-unique-btn-3").is(":visible")) {
			document.F6.action='<?php echo $nm_url_saida; ?>'; document.F6.submit(); return false;
			 return;
		}
		if ($("#sc_b_sai_t.sc-unique-btn-4").length && $("#sc_b_sai_t.sc-unique-btn-4").is(":visible")) {
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
		if ($("#sc_b_ini_b.sc-unique-btn-5").length && $("#sc_b_ini_b.sc-unique-btn-5").is(":visible")) {
			nm_move ('inicio');
			 return;
		}
	}
	function scBtnFn_sys_format_ret() {
		if ($("#sc_b_ret_b.sc-unique-btn-6").length && $("#sc_b_ret_b.sc-unique-btn-6").is(":visible")) {
			nm_move ('retorna');
			 return;
		}
	}
	function scBtnFn_sys_format_ava() {
		if ($("#sc_b_avc_b.sc-unique-btn-7").length && $("#sc_b_avc_b.sc-unique-btn-7").is(":visible")) {
			nm_move ('avanca');
			 return;
		}
	}
	function scBtnFn_sys_format_fim() {
		if ($("#sc_b_fim_b.sc-unique-btn-8").length && $("#sc_b_fim_b.sc-unique-btn-8").is(":visible")) {
			nm_move ('final');
			 return;
		}
	}
</script>
<?php
$_SESSION['sc_session'][$this->Ini->sc_page]['form_tbtracerrm_returned']['buttonStatus'] = $this->nmgp_botoes;
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