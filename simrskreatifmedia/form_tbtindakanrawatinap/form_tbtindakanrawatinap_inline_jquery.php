
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
  scEventControl_data["tgltindakan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pelaksana_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["tindakan_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["biaya_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["diskon_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["kelas_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["pembayaran_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jumlah_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["id_" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["tgltindakan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tgltindakan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pelaksana_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pelaksana_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["tindakan_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["tindakan_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["biaya_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["biaya_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["diskon_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["diskon_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["kelas_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["kelas_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["pembayaran_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["pembayaran_" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jumlah_" + iSeqRow]["change"]) {
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

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("pelaksana_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("tindakan_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("kelas_" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("pembayaran_" + iSeq == fieldName) {
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
  $('#id_sc_field_id_' + iSeqRow).bind('blur', function() { sc_form_tbtindakanrawatinap_id__onblur(this, iSeqRow) })
                                 .bind('focus', function() { sc_form_tbtindakanrawatinap_id__onfocus(this, iSeqRow) });
  $('#id_sc_field_tindakan_' + iSeqRow).bind('blur', function() { sc_form_tbtindakanrawatinap_tindakan__onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_tbtindakanrawatinap_tindakan__onfocus(this, iSeqRow) });
  $('#id_sc_field_pelaksana_' + iSeqRow).bind('blur', function() { sc_form_tbtindakanrawatinap_pelaksana__onblur(this, iSeqRow) })
                                        .bind('change', function() { sc_form_tbtindakanrawatinap_pelaksana__onchange(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_tbtindakanrawatinap_pelaksana__onfocus(this, iSeqRow) });
  $('#id_sc_field_jumlah_' + iSeqRow).bind('blur', function() { sc_form_tbtindakanrawatinap_jumlah__onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbtindakanrawatinap_jumlah__onfocus(this, iSeqRow) });
  $('#id_sc_field_biaya_' + iSeqRow).bind('blur', function() { sc_form_tbtindakanrawatinap_biaya__onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbtindakanrawatinap_biaya__onfocus(this, iSeqRow) });
  $('#id_sc_field_tgltindakan_' + iSeqRow).bind('blur', function() { sc_form_tbtindakanrawatinap_tgltindakan__onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_tbtindakanrawatinap_tgltindakan__onfocus(this, iSeqRow) });
  $('#id_sc_field_tgltindakan__hora' + iSeqRow).bind('blur', function() { sc_form_tbtindakanrawatinap_tgltindakan__onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_tbtindakanrawatinap_tgltindakan__onfocus(this, iSeqRow) });
  $('#id_sc_field_diskon_' + iSeqRow).bind('blur', function() { sc_form_tbtindakanrawatinap_diskon__onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_tbtindakanrawatinap_diskon__onfocus(this, iSeqRow) });
  $('#id_sc_field_kelas_' + iSeqRow).bind('blur', function() { sc_form_tbtindakanrawatinap_kelas__onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_tbtindakanrawatinap_kelas__onfocus(this, iSeqRow) });
  $('#id_sc_field_pembayaran_' + iSeqRow).bind('blur', function() { sc_form_tbtindakanrawatinap_pembayaran__onblur(this, iSeqRow) })
                                         .bind('focus', function() { sc_form_tbtindakanrawatinap_pembayaran__onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_tbtindakanrawatinap_id__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_validate_id_();
  scCssBlur(oThis);
}

function sc_form_tbtindakanrawatinap_id__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakanrawatinap_tindakan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_validate_tindakan_();
  scCssBlur(oThis);
}

function sc_form_tbtindakanrawatinap_tindakan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakanrawatinap_pelaksana__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_validate_pelaksana_();
  scCssBlur(oThis);
}

function sc_form_tbtindakanrawatinap_pelaksana__onchange(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_refresh_pelaksana_();
}

function sc_form_tbtindakanrawatinap_pelaksana__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakanrawatinap_jumlah__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_validate_jumlah_();
  scCssBlur(oThis);
}

function sc_form_tbtindakanrawatinap_jumlah__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakanrawatinap_biaya__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_validate_biaya_();
  scCssBlur(oThis);
}

function sc_form_tbtindakanrawatinap_biaya__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakanrawatinap_tgltindakan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_validate_tgltindakan_();
  scCssBlur(oThis);
}

function sc_form_tbtindakanrawatinap_tgltindakan__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_validate_tgltindakan_();
  scCssBlur(oThis);
}

function sc_form_tbtindakanrawatinap_tgltindakan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakanrawatinap_tgltindakan__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakanrawatinap_diskon__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_validate_diskon_();
  scCssBlur(oThis);
}

function sc_form_tbtindakanrawatinap_diskon__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakanrawatinap_kelas__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_validate_kelas_();
  scCssBlur(oThis);
}

function sc_form_tbtindakanrawatinap_kelas__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_tbtindakanrawatinap_pembayaran__onblur(oThis, iSeqRow) {
  do_ajax_form_tbtindakanrawatinap_inline_validate_pembayaran_();
  scCssBlur(oThis);
}

function sc_form_tbtindakanrawatinap_pembayaran__onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("tgltindakan_", "", status);
	displayChange_field("pelaksana_", "", status);
	displayChange_field("tindakan_", "", status);
	displayChange_field("biaya_", "", status);
	displayChange_field("diskon_", "", status);
	displayChange_field("kelas_", "", status);
	displayChange_field("pembayaran_", "", status);
	displayChange_field("jumlah_", "", status);
	displayChange_field("id_", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_tgltindakan_(row, status);
	displayChange_field_pelaksana_(row, status);
	displayChange_field_tindakan_(row, status);
	displayChange_field_biaya_(row, status);
	displayChange_field_diskon_(row, status);
	displayChange_field_kelas_(row, status);
	displayChange_field_pembayaran_(row, status);
	displayChange_field_jumlah_(row, status);
	displayChange_field_id_(row, status);
}

function displayChange_field(field, row, status) {
	if ("tgltindakan_" == field) {
		displayChange_field_tgltindakan_(row, status);
	}
	if ("pelaksana_" == field) {
		displayChange_field_pelaksana_(row, status);
	}
	if ("tindakan_" == field) {
		displayChange_field_tindakan_(row, status);
	}
	if ("biaya_" == field) {
		displayChange_field_biaya_(row, status);
	}
	if ("diskon_" == field) {
		displayChange_field_diskon_(row, status);
	}
	if ("kelas_" == field) {
		displayChange_field_kelas_(row, status);
	}
	if ("pembayaran_" == field) {
		displayChange_field_pembayaran_(row, status);
	}
	if ("jumlah_" == field) {
		displayChange_field_jumlah_(row, status);
	}
	if ("id_" == field) {
		displayChange_field_id_(row, status);
	}
}

function displayChange_field_tgltindakan_(row, status) {
}

function displayChange_field_pelaksana_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_pelaksana___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_pelaksana_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "pelaksana_");
	}
}

function displayChange_field_tindakan_(row, status) {
	if ("on" == status) {
		if ("all" == row) {
			var fieldList = $(".css_tindakan___obj");
			for (var i = 0; i < fieldList.length; i++) {
				$($(fieldList[i]).attr("id")).select2("destroy");
			}
		}
		else {
			$("#id_sc_field_tindakan_" + row).select2("destroy");
		}
		scJQSelect2Add(row, "tindakan_");
	}
}

function displayChange_field_biaya_(row, status) {
}

function displayChange_field_diskon_(row, status) {
}

function displayChange_field_kelas_(row, status) {
}

function displayChange_field_pembayaran_(row, status) {
}

function displayChange_field_jumlah_(row, status) {
}

function displayChange_field_id_(row, status) {
}

function scRecreateSelect2() {
	displayChange_field_pelaksana_("all", "on");
	displayChange_field_tindakan_("all", "on");
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_tbtindakanrawatinap_inline_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(39);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_tgltindakan_" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_tgltindakan_" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['tgltindakan_']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['tgltindakan_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_tbtindakanrawatinap_inline_validate_tgltindakan_(iSeqRow);
    },
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['tgltindakan_']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

function scJQSelect2Add(seqRow, specificField) {
  if (null == specificField || "pelaksana_" == specificField) {
    scJQSelect2Add_pelaksana_(seqRow);
  }
  if (null == specificField || "tindakan_" == specificField) {
    scJQSelect2Add_tindakan_(seqRow);
  }
} // scJQSelect2Add

function scJQSelect2Add_pelaksana_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_pelaksana__obj" : "#id_sc_field_pelaksana_" + seqRow;
  $(elemSelector).select2(
    {
      containerCssClass: 'css_pelaksana__obj',
      dropdownCssClass: 'css_pelaksana__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add

function scJQSelect2Add_tindakan_(seqRow) {
  var elemSelector = "all" == seqRow ? ".css_tindakan__obj" : "#id_sc_field_tindakan_" + seqRow;
  $(elemSelector).select2(
    {
      minimumResultsForSearch: Infinity,
      containerCssClass: 'css_tindakan__obj',
      dropdownCssClass: 'css_tindakan__obj',
      language: {
        noResults: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_notfound'] ?>";
        },
        searching: function() {
          return "<?php echo $this->Ini->Nm_lang['lang_autocomp_searching'] ?>";
        }
      }
    }
  );
} // scJQSelect2Add


function scJQElementsAdd(iLine) {
  scJQEventsAdd(iLine);
  scEventControl_init(iLine);
  scJQCalendarAdd(iLine);
  scJQUploadAdd(iLine);
  scJQSelect2Add(iLine);
  setTimeout(function () { if ('function' == typeof displayChange_field_pelaksana_) { displayChange_field_pelaksana_(iLine, "on"); } }, 150);
  setTimeout(function () { if ('function' == typeof displayChange_field_tindakan_) { displayChange_field_tindakan_(iLine, "on"); } }, 150);
} // scJQElementsAdd

