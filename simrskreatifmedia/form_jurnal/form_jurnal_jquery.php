
function scJQGeneralAdd() {
  scLoadScInput('input:text.sc-js-input');
  scLoadScInput('input:password.sc-js-input');
  scLoadScInput('input:checkbox.sc-js-input');
  scLoadScInput('input:radio.sc-js-input');
  scLoadScInput('select.sc-js-input');
  scLoadScInput('textarea.sc-js-input');

} // scJQGeneralAdd

function scFocusField(sField) {
  var $oField = $('#id_sc_field_' + sField);

  if (0 == $oField.length) {
    $oField = $('input[name=' + sField + ']');
  }

  if (0 == $oField.length && document.F1.elements[sField]) {
    $oField = $(document.F1.elements[sField]);
  }

  if ($("#id_ac_" + sField).length > 0) {
    if ($oField.hasClass("select2-hidden-accessible")) {
      if (false == scSetFocusOnField($oField)) {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
    else {
      if (false == scSetFocusOnField($oField)) {
        if (false == scSetFocusOnField($("#id_ac_" + sField))) {
          setTimeout(function() { scSetFocusOnField($("#id_ac_" + sField)); }, 500);
        }
      }
      else {
        setTimeout(function() { scSetFocusOnField($oField); }, 500);
      }
    }
  }
  else {
    setTimeout(function() { scSetFocusOnField($oField); }, 500);
  }
} // scFocusField

function scSetFocusOnField($oField) {
  if ($oField.length > 0 && $oField[0].offsetHeight > 0 && $oField[0].offsetWidth > 0 && !$oField[0].disabled) {
    $oField[0].focus();
    return true;
  }
  return false;
} // scSetFocusOnField

function scEventControl_init(iSeqRow) {
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["akun_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nominal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["flag_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tanggal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_transaksi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["akun_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["akun_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nominal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nominal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["flag_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["flag_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tanggal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tanggal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_transaksi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_transaksi_" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_active_all() {
  for (var i = 1; i < iAjaxNewLine; i++) {
    if (scEventControl_active(i)) {
      return true;
    }
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("akun_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("flag_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  scEventControl_data[fieldName]["change"] = false;
} // scEventControl_onFocus

function scEventControl_onBlur(sFieldName) {
  scEventControl_data[sFieldName]["blur"] = false;
  if (scEventControl_data[sFieldName]["change"]) {
        if (scEventControl_data[sFieldName]["original"] == $("#id_sc_field_" + sFieldName).val() || scEventControl_data[sFieldName]["calculated"] == $("#id_sc_field_" + sFieldName).val()) {
          scEventControl_data[sFieldName]["change"] = false;
        }
  }
} // scEventControl_onBlur

function scEventControl_onChange(sFieldName) {
  scEventControl_data[sFieldName]["change"] = false;
} // scEventControl_onChange

function scEventControl_onAutocomp(sFieldName) {
  scEventControl_data[sFieldName]["autocomp"] = false;
} // scEventControl_onChange

var scEventControl_data = {};

function scJQEventsAdd(iSeqRow) {
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_jurnal_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_jurnal_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_jurnal_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_akun_' + iSeqRow).bind('blur', function() { sc_form_jurnal_akun__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_jurnal_akun__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_jurnal_akun__onfocus(this, iSeqRow) });
  $('#id_sc_field_nominal_' + iSeqRow).bind('blur', function() { sc_form_jurnal_nominal__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_jurnal_nominal__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_jurnal_nominal__onfocus(this, iSeqRow) });
  $('#id_sc_field_flag_' + iSeqRow).bind('blur', function() { sc_form_jurnal_flag__onblur(this, iSeqRow) })
                                   .bind('change', function() { sc_form_jurnal_flag__onchange(this, iSeqRow) })
                                   .bind('focus', function() { sc_form_jurnal_flag__onfocus(this, iSeqRow) });
  $('#id_sc_field_tanggal_' + iSeqRow).bind('blur', function() { sc_form_jurnal_tanggal__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_jurnal_tanggal__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_jurnal_tanggal__onfocus(this, iSeqRow) });
  $('#id_sc_field_id_transaksi_' + iSeqRow).bind('blur', function() { sc_form_jurnal_id_transaksi__onblur(this, iSeqRow) })
                                           .bind('change', function() { sc_form_jurnal_id_transaksi__onchange(this, iSeqRow) })
                                           .bind('focus', function() { sc_form_jurnal_id_transaksi__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_jurnal_id__onblur(oThis, iSeqRow) {
  do_ajax_form_jurnal_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_jurnal_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_jurnal_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_jurnal_akun__onblur(oThis, iSeqRow) {
  do_ajax_form_jurnal_validate_akun_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_jurnal_akun__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_jurnal_akun__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_jurnal_nominal__onblur(oThis, iSeqRow) {
  do_ajax_form_jurnal_validate_nominal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_jurnal_nominal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_jurnal_nominal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_jurnal_flag__onblur(oThis, iSeqRow) {
  do_ajax_form_jurnal_validate_flag_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_jurnal_flag__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_jurnal_flag__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_jurnal_tanggal__onblur(oThis, iSeqRow) {
  do_ajax_form_jurnal_validate_tanggal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_jurnal_tanggal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_jurnal_tanggal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_jurnal_id_transaksi__onblur(oThis, iSeqRow) {
  do_ajax_form_jurnal_validate_id_transaksi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_jurnal_id_transaksi__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_jurnal_id_transaksi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("id_", "", status);
	displayChange_field("akun_", "", status);
	displayChange_field("nominal_", "", status);
	displayChange_field("flag_", "", status);
	displayChange_field("tanggal_", "", status);
	displayChange_field("id_transaksi_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_id_(row, status);
	displayChange_field_akun_(row, status);
	displayChange_field_nominal_(row, status);
	displayChange_field_flag_(row, status);
	displayChange_field_tanggal_(row, status);
	displayChange_field_id_transaksi_(row, status);
}

function displayChange_field(field, row, status) {
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
	if ("akun_" == field) {
		displayChange_field_akun_(row, status);
	}
	if ("nominal_" == field) {
		displayChange_field_nominal_(row, status);
	}
	if ("flag_" == field) {
		displayChange_field_flag_(row, status);
	}
	if ("tanggal_" == field) {
		displayChange_field_tanggal_(row, status);
	}
	if ("id_transaksi_" == field) {
		displayChange_field_id_transaksi_(row, status);
	}
}

function displayChange_field_id_(row, status) {
}

function displayChange_field_akun_(row, status) {
}

function displayChange_field_nominal_(row, status) {
}

function displayChange_field_flag_(row, status) {
}

function displayChange_field_tanggal_(row, status) {
}

function displayChange_field_id_transaksi_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_jurnal_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(19);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_tanggal_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tanggal_" + iSeqRow] = $oField.val();
    },
    onClose: function(dateText, inst) {
      setTimeout(function() { do_ajax_form_jurnal_validate_tanggal_(iSeqRow); }, 200);
    },
    showWeek: true,
    numberOfMonths: 1,
    changeMonth: true,
    changeYear: true,
    yearRange: 'c-5:c+5',
    dayNames: ["<?php        echo html_entity_decode($this->Ini->Nm_lang['lang_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);        ?>"],
    dayNamesMin: ["<?php     echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_sund'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_mond'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_tued'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_wend'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_thud'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_frid'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_substr_days_satd'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    monthNames: ["<?php      echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_janu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_febr"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_marc"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_apri"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_mayy"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_june"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_july"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_augu"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_sept"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_octo"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_nove"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>","<?php echo html_entity_decode($this->Ini->Nm_lang["lang_mnth_dece"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);      ?>"],
    monthNamesShort: ["<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_janu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_febr'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_marc'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_apri'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_mayy'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_june'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_july'], ENT_COMPAT, $_SESSION['scriptcase']['charset']);   ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_augu'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_sept'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_octo'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_nove'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>","<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_mnth_dece'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>"],
    weekHeader: "<?php echo html_entity_decode($this->Ini->Nm_lang['lang_shrt_days_sem'], ENT_COMPAT, $_SESSION['scriptcase']['charset']); ?>",
    firstDay: <?php echo $this->jqueryCalendarWeekInit("" . $_SESSION['scriptcase']['reg_conf']['date_week_ini'] . ""); ?>,
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', $_SESSION['scriptcase']['reg_conf']['date_sep']), array('', 'yyyy', ''), $this->field_config['tanggal_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
    showOtherMonths: true,
    showOn: "button",
<?php
$miniCalendarIcon   = $this->jqueryIconFile('calendar');
$miniCalendarFA     = $this->jqueryFAFile('calendar');
$miniCalendarButton = $this->jqueryButtonText('calendar');
if ('' != $miniCalendarIcon) {
?>
    buttonImage: "<?php echo $miniCalendarIcon; ?>",
    buttonImageOnly: true,
<?php
}
elseif ('' != $miniCalendarFA) {
?>
    buttonText: "<?php echo $miniCalendarFA; ?>",
<?php
}
elseif ('' != $miniCalendarButton[0]) {
?>
    buttonText: "<?php echo $miniCalendarButton[0]; ?>",
<?php
}
?>
    currentText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_per_today"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
    closeText: "<?php  echo html_entity_decode($this->Ini->Nm_lang["lang_btns_mess_clse"], ENT_COMPAT, $_SESSION["scriptcase"]["charset"]);       ?>",
  });
} // scJQCalendarAdd

function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

