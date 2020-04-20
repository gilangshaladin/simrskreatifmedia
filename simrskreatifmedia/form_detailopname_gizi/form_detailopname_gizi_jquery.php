
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
  scEventControl_data["bahan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["satuan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stokawal_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["koreksi_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["stokakhir_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["keterangan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["bahan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bahan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["satuan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stokawal_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stokawal_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["koreksi_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["koreksi_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["stokakhir_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["stokakhir_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["keterangan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["keterangan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["id_" + iSeqRow]["change"]) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_detailopname_gizi_id__onblur(this, iSeqRow) })
                                 .bind('change', function() { sc_form_detailopname_gizi_id__onchange(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_detailopname_gizi_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_bahan_' + iSeqRow).bind('blur', function() { sc_form_detailopname_gizi_bahan__onblur(this, iSeqRow) })
                                    .bind('change', function() { sc_form_detailopname_gizi_bahan__onchange(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_detailopname_gizi_bahan__onfocus(this, iSeqRow) });
  $('#id_sc_field_satuan_' + iSeqRow).bind('blur', function() { sc_form_detailopname_gizi_satuan__onblur(this, iSeqRow) })
                                     .bind('change', function() { sc_form_detailopname_gizi_satuan__onchange(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_detailopname_gizi_satuan__onfocus(this, iSeqRow) });
  $('#id_sc_field_stokawal_' + iSeqRow).bind('blur', function() { sc_form_detailopname_gizi_stokawal__onblur(this, iSeqRow) })
                                       .bind('change', function() { sc_form_detailopname_gizi_stokawal__onchange(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_detailopname_gizi_stokawal__onfocus(this, iSeqRow) });
  $('#id_sc_field_koreksi_' + iSeqRow).bind('blur', function() { sc_form_detailopname_gizi_koreksi__onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_detailopname_gizi_koreksi__onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_detailopname_gizi_koreksi__onfocus(this, iSeqRow) });
  $('#id_sc_field_stokakhir_' + iSeqRow).bind('blur', function() { sc_form_detailopname_gizi_stokakhir__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_detailopname_gizi_stokakhir__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_detailopname_gizi_stokakhir__onfocus(this, iSeqRow) });
  $('#id_sc_field_keterangan_' + iSeqRow).bind('blur', function() { sc_form_detailopname_gizi_keterangan__onblur(this, iSeqRow) })
                                         .bind('change', function() { sc_form_detailopname_gizi_keterangan__onchange(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_detailopname_gizi_keterangan__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_detailopname_gizi_id__onblur(oThis, iSeqRow) {
  do_ajax_form_detailopname_gizi_validate_id_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_id__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailopname_gizi_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_bahan__onblur(oThis, iSeqRow) {
  do_ajax_form_detailopname_gizi_validate_bahan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_bahan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailopname_gizi_bahan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_satuan__onblur(oThis, iSeqRow) {
  do_ajax_form_detailopname_gizi_validate_satuan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_satuan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailopname_gizi_satuan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_stokawal__onblur(oThis, iSeqRow) {
  do_ajax_form_detailopname_gizi_validate_stokawal_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_stokawal__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailopname_gizi_stokawal__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_koreksi__onblur(oThis, iSeqRow) {
  do_ajax_form_detailopname_gizi_validate_koreksi_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_koreksi__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailopname_gizi_koreksi__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_stokakhir__onblur(oThis, iSeqRow) {
  do_ajax_form_detailopname_gizi_validate_stokakhir_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_stokakhir__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailopname_gizi_stokakhir__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_keterangan__onblur(oThis, iSeqRow) {
  do_ajax_form_detailopname_gizi_validate_keterangan_(iSeqRow);
  scCssBlur(oThis, iSeqRow);
}

function sc_form_detailopname_gizi_keterangan__onchange(oThis, iSeqRow) {
  nm_check_insert(iSeqRow);
}

function sc_form_detailopname_gizi_keterangan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis, iSeqRow);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("bahan_", "", status);
	displayChange_field("satuan_", "", status);
	displayChange_field("stokawal_", "", status);
	displayChange_field("koreksi_", "", status);
	displayChange_field("stokakhir_", "", status);
	displayChange_field("keterangan_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_bahan_(row, status);
	displayChange_field_satuan_(row, status);
	displayChange_field_stokawal_(row, status);
	displayChange_field_koreksi_(row, status);
	displayChange_field_stokakhir_(row, status);
	displayChange_field_keterangan_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("bahan_" == field) {
		displayChange_field_bahan_(row, status);
	}
	if ("satuan_" == field) {
		displayChange_field_satuan_(row, status);
	}
	if ("stokawal_" == field) {
		displayChange_field_stokawal_(row, status);
	}
	if ("koreksi_" == field) {
		displayChange_field_koreksi_(row, status);
	}
	if ("stokakhir_" == field) {
		displayChange_field_stokakhir_(row, status);
	}
	if ("keterangan_" == field) {
		displayChange_field_keterangan_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_bahan_(row, status) {
}

function displayChange_field_satuan_(row, status) {
}

function displayChange_field_stokawal_(row, status) {
}

function displayChange_field_koreksi_(row, status) {
}

function displayChange_field_stokakhir_(row, status) {
}

function displayChange_field_keterangan_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_detailopname_gizi_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(30);
		}
	}
}
function scJQUploadAdd(iSeqRow) {
} // scJQUploadAdd


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQUploadAdd(iLine);
} // scJQElementsAdd

