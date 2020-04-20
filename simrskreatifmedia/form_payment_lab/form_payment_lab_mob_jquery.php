
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
  scEventControl_data["trancode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nostruk" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["custcode" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_1" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["dokter" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jmltagihan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jmlbayar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["deposit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["potongan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["hrsdibayar" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["terimadari" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["jenispayment" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["instansipenjamin" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["bankdebit" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["nokartu" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["sc_field_0" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
  scEventControl_data["detailpemeriksaan" + iSeqRow] = {"blur": false, "change": false, "autocomp": false, "original": "", "calculated": ""};
}

function scEventControl_active(iSeqRow) {
  if (scEventControl_data["trancode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["trancode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nostruk" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nostruk" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["custcode" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_1" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["dokter" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["dokter" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jmltagihan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jmltagihan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jmlbayar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jmlbayar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["deposit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["deposit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["potongan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["potongan" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["hrsdibayar" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["hrsdibayar" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["terimadari" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["terimadari" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["jenispayment" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["jenispayment" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["instansipenjamin" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["instansipenjamin" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["bankdebit" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["bankdebit" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["nokartu" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["nokartu" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["sc_field_0" + iSeqRow]["change"]) {
    return true;
  }
  if (scEventControl_data["detailpemeriksaan" + iSeqRow]["blur"]) {
    return true;
  }
  if (scEventControl_data["detailpemeriksaan" + iSeqRow]["change"]) {
    return true;
  }
  return false;
} // scEventControl_active

function scEventControl_onFocus(oField, iSeq) {
  var fieldId, fieldName;
  fieldId = $(oField).attr("id");
  fieldName = fieldId.substr(12);
  scEventControl_data[fieldName]["blur"] = true;
  if ("nostruk" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("custcode" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("sc_field_1" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("dokter" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("terimadari" + iSeq == fieldName) {
    scEventControl_data[fieldName]["blur"] = false;
  }
  if ("jenispayment" + iSeq == fieldName) {
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
  $('#id_sc_field_trancode' + iSeqRow).bind('blur', function() { sc_form_payment_lab_trancode_onblur(this, iSeqRow) })
                                      .bind('change', function() { sc_form_payment_lab_trancode_onchange(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_payment_lab_trancode_onfocus(this, iSeqRow) });
  $('#id_sc_field_nostruk' + iSeqRow).bind('blur', function() { sc_form_payment_lab_nostruk_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_payment_lab_nostruk_onfocus(this, iSeqRow) });
  $('#id_sc_field_custcode' + iSeqRow).bind('blur', function() { sc_form_payment_lab_custcode_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_payment_lab_custcode_onfocus(this, iSeqRow) });
  $('#id_sc_field_dokter' + iSeqRow).bind('blur', function() { sc_form_payment_lab_dokter_onblur(this, iSeqRow) })
                                    .bind('focus', function() { sc_form_payment_lab_dokter_onfocus(this, iSeqRow) });
  $('#id_sc_field_jmltagihan' + iSeqRow).bind('blur', function() { sc_form_payment_lab_jmltagihan_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_payment_lab_jmltagihan_onfocus(this, iSeqRow) });
  $('#id_sc_field_jmlbayar' + iSeqRow).bind('blur', function() { sc_form_payment_lab_jmlbayar_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_payment_lab_jmlbayar_onfocus(this, iSeqRow) });
  $('#id_sc_field_deposit' + iSeqRow).bind('blur', function() { sc_form_payment_lab_deposit_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_payment_lab_deposit_onfocus(this, iSeqRow) });
  $('#id_sc_field_potongan' + iSeqRow).bind('blur', function() { sc_form_payment_lab_potongan_onblur(this, iSeqRow) })
                                      .bind('focus', function() { sc_form_payment_lab_potongan_onfocus(this, iSeqRow) });
  $('#id_sc_field_hrsdibayar' + iSeqRow).bind('blur', function() { sc_form_payment_lab_hrsdibayar_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_payment_lab_hrsdibayar_onfocus(this, iSeqRow) });
  $('#id_sc_field_terimadari' + iSeqRow).bind('blur', function() { sc_form_payment_lab_terimadari_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_payment_lab_terimadari_onfocus(this, iSeqRow) });
  $('#id_sc_field_jenispayment' + iSeqRow).bind('blur', function() { sc_form_payment_lab_jenispayment_onblur(this, iSeqRow) })
                                          .bind('focus', function() { sc_form_payment_lab_jenispayment_onfocus(this, iSeqRow) });
  $('#id_sc_field_instansipenjamin' + iSeqRow).bind('blur', function() { sc_form_payment_lab_instansipenjamin_onblur(this, iSeqRow) })
                                              .bind('focus', function() { sc_form_payment_lab_instansipenjamin_onfocus(this, iSeqRow) });
  $('#id_sc_field_bankdebit' + iSeqRow).bind('blur', function() { sc_form_payment_lab_bankdebit_onblur(this, iSeqRow) })
                                       .bind('focus', function() { sc_form_payment_lab_bankdebit_onfocus(this, iSeqRow) });
  $('#id_sc_field_nokartu' + iSeqRow).bind('blur', function() { sc_form_payment_lab_nokartu_onblur(this, iSeqRow) })
                                     .bind('focus', function() { sc_form_payment_lab_nokartu_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_0' + iSeqRow).bind('blur', function() { sc_form_payment_lab_sc_field_0_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_payment_lab_sc_field_0_onfocus(this, iSeqRow) });
  $('#id_sc_field_sc_field_1' + iSeqRow).bind('blur', function() { sc_form_payment_lab_sc_field_1_onblur(this, iSeqRow) })
                                        .bind('focus', function() { sc_form_payment_lab_sc_field_1_onfocus(this, iSeqRow) });
  $('#id_sc_field_detailpemeriksaan' + iSeqRow).bind('blur', function() { sc_form_payment_lab_detailpemeriksaan_onblur(this, iSeqRow) })
                                               .bind('focus', function() { sc_form_payment_lab_detailpemeriksaan_onfocus(this, iSeqRow) });
} // scJQEventsAdd

function sc_form_payment_lab_trancode_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_trancode();
  scCssBlur(oThis);
}

function sc_form_payment_lab_trancode_onchange(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_refresh_trancode();
}

function sc_form_payment_lab_trancode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_nostruk_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_nostruk();
  scCssBlur(oThis);
}

function sc_form_payment_lab_nostruk_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_custcode_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_custcode();
  scCssBlur(oThis);
}

function sc_form_payment_lab_custcode_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_dokter_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_dokter();
  scCssBlur(oThis);
}

function sc_form_payment_lab_dokter_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_jmltagihan_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_jmltagihan();
  scCssBlur(oThis);
}

function sc_form_payment_lab_jmltagihan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_jmlbayar_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_jmlbayar();
  scCssBlur(oThis);
}

function sc_form_payment_lab_jmlbayar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_deposit_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_deposit();
  scCssBlur(oThis);
}

function sc_form_payment_lab_deposit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_potongan_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_potongan();
  scCssBlur(oThis);
}

function sc_form_payment_lab_potongan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_hrsdibayar_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_hrsdibayar();
  scCssBlur(oThis);
}

function sc_form_payment_lab_hrsdibayar_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_terimadari_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_terimadari();
  scCssBlur(oThis);
}

function sc_form_payment_lab_terimadari_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_jenispayment_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_jenispayment();
  scCssBlur(oThis);
}

function sc_form_payment_lab_jenispayment_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_instansipenjamin_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_instansipenjamin();
  scCssBlur(oThis);
}

function sc_form_payment_lab_instansipenjamin_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_bankdebit_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_bankdebit();
  scCssBlur(oThis);
}

function sc_form_payment_lab_bankdebit_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_nokartu_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_nokartu();
  scCssBlur(oThis);
}

function sc_form_payment_lab_nokartu_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_sc_field_0_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_sc_field_0();
  scCssBlur(oThis);
}

function sc_form_payment_lab_sc_field_0_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_sc_field_1_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_sc_field_1();
  scCssBlur(oThis);
}

function sc_form_payment_lab_sc_field_1_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function sc_form_payment_lab_detailpemeriksaan_onblur(oThis, iSeqRow) {
  do_ajax_form_payment_lab_mob_validate_detailpemeriksaan();
  scCssBlur(oThis);
}

function sc_form_payment_lab_detailpemeriksaan_onfocus(oThis, iSeqRow) {
  scEventControl_onFocus(oThis, iSeqRow);
  scCssFocus(oThis);
}

function displayChange_block(block, status) {
	if ("0" == block) {
		displayChange_block_0(status);
	}
	if ("1" == block) {
		displayChange_block_1(status);
	}
	if ("2" == block) {
		displayChange_block_2(status);
	}
	if ("3" == block) {
		displayChange_block_3(status);
	}
}

function displayChange_block_0(status) {
	displayChange_field("trancode", "", status);
	displayChange_field("nostruk", "", status);
	displayChange_field("custcode", "", status);
	displayChange_field("sc_field_1", "", status);
	displayChange_field("dokter", "", status);
}

function displayChange_block_1(status) {
	displayChange_field("jmltagihan", "", status);
	displayChange_field("jmlbayar", "", status);
	displayChange_field("deposit", "", status);
	displayChange_field("potongan", "", status);
	displayChange_field("hrsdibayar", "", status);
}

function displayChange_block_2(status) {
	displayChange_field("terimadari", "", status);
	displayChange_field("jenispayment", "", status);
	displayChange_field("instansipenjamin", "", status);
	displayChange_field("bankdebit", "", status);
	displayChange_field("nokartu", "", status);
	displayChange_field("sc_field_0", "", status);
}

function displayChange_block_3(status) {
	displayChange_field("detailpemeriksaan", "", status);
}

function displayChange_row(row, status) {
	displayChange_field_trancode(row, status);
	displayChange_field_nostruk(row, status);
	displayChange_field_custcode(row, status);
	displayChange_field_sc_field_1(row, status);
	displayChange_field_dokter(row, status);
	displayChange_field_jmltagihan(row, status);
	displayChange_field_jmlbayar(row, status);
	displayChange_field_deposit(row, status);
	displayChange_field_potongan(row, status);
	displayChange_field_hrsdibayar(row, status);
	displayChange_field_terimadari(row, status);
	displayChange_field_jenispayment(row, status);
	displayChange_field_instansipenjamin(row, status);
	displayChange_field_bankdebit(row, status);
	displayChange_field_nokartu(row, status);
	displayChange_field_sc_field_0(row, status);
	displayChange_field_detailpemeriksaan(row, status);
}

function displayChange_field(field, row, status) {
	if ("trancode" == field) {
		displayChange_field_trancode(row, status);
	}
	if ("nostruk" == field) {
		displayChange_field_nostruk(row, status);
	}
	if ("custcode" == field) {
		displayChange_field_custcode(row, status);
	}
	if ("sc_field_1" == field) {
		displayChange_field_sc_field_1(row, status);
	}
	if ("dokter" == field) {
		displayChange_field_dokter(row, status);
	}
	if ("jmltagihan" == field) {
		displayChange_field_jmltagihan(row, status);
	}
	if ("jmlbayar" == field) {
		displayChange_field_jmlbayar(row, status);
	}
	if ("deposit" == field) {
		displayChange_field_deposit(row, status);
	}
	if ("potongan" == field) {
		displayChange_field_potongan(row, status);
	}
	if ("hrsdibayar" == field) {
		displayChange_field_hrsdibayar(row, status);
	}
	if ("terimadari" == field) {
		displayChange_field_terimadari(row, status);
	}
	if ("jenispayment" == field) {
		displayChange_field_jenispayment(row, status);
	}
	if ("instansipenjamin" == field) {
		displayChange_field_instansipenjamin(row, status);
	}
	if ("bankdebit" == field) {
		displayChange_field_bankdebit(row, status);
	}
	if ("nokartu" == field) {
		displayChange_field_nokartu(row, status);
	}
	if ("sc_field_0" == field) {
		displayChange_field_sc_field_0(row, status);
	}
	if ("detailpemeriksaan" == field) {
		displayChange_field_detailpemeriksaan(row, status);
	}
}

function displayChange_field_trancode(row, status) {
}

function displayChange_field_nostruk(row, status) {
}

function displayChange_field_custcode(row, status) {
}

function displayChange_field_sc_field_1(row, status) {
}

function displayChange_field_dokter(row, status) {
}

function displayChange_field_jmltagihan(row, status) {
}

function displayChange_field_jmlbayar(row, status) {
}

function displayChange_field_deposit(row, status) {
}

function displayChange_field_potongan(row, status) {
}

function displayChange_field_hrsdibayar(row, status) {
}

function displayChange_field_terimadari(row, status) {
}

function displayChange_field_jenispayment(row, status) {
}

function displayChange_field_instansipenjamin(row, status) {
}

function displayChange_field_bankdebit(row, status) {
}

function displayChange_field_nokartu(row, status) {
}

function displayChange_field_sc_field_0(row, status) {
}

function displayChange_field_detailpemeriksaan(row, status) {
	if ("on" == status && typeof $("#nmsc_iframe_liga_form_tbdetaillab_mob")[0].contentWindow.scRecreateSelect2 === "function") {
		$("#nmsc_iframe_liga_form_tbdetaillab_mob")[0].contentWindow.scRecreateSelect2();
	}
}

function scRecreateSelect2() {
}
function scResetPagesDisplay() {
	$(".sc-form-page").show();
}

function scHidePage(pageNo) {
	$("#id_form_payment_lab_mob_form" + pageNo).hide();
}

function scCheckNoPageSelected() {
	if (!$(".sc-form-page").filter(".scTabActive").filter(":visible").length) {
		var inactiveTabs = $(".sc-form-page").filter(".scTabInactive").filter(":visible");
		if (inactiveTabs.length) {
			var tabNo = $(inactiveTabs[0]).attr("id").substr(28);
		}
	}
}
var sc_jq_calendar_value = {};

function scJQCalendarAdd(iSeqRow) {
  $("#id_sc_field_trandate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_trandate" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['trandate']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['trandate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_payment_lab_mob_validate_trandate(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['trandate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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
  $("#id_sc_field_paiddate" + iSeqRow).datepicker({
    beforeShow: function(input, inst) {
      var $oField = $(this),
          aParts  = $oField.val().split(" "),
          sTime   = "";
      sc_jq_calendar_value["#id_sc_field_paiddate" + iSeqRow] = $oField.val();
      if (2 == aParts.length) {
        sTime = " " + aParts[1];
      }
      if ('' == sTime || ' ' == sTime) {
        sTime = ' <?php echo $this->jqueryCalendarTimeStart($this->field_config['paiddate']['date_format']); ?>';
      }
      $oField.datepicker("option", "dateFormat", "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['paiddate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>" + sTime);
    },
    onClose: function(dateText, inst) {
      do_ajax_form_payment_lab_mob_validate_paiddate(iSeqRow);
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
    dateFormat: "<?php echo $this->jqueryCalendarDtFormat("" . str_replace(array('/', 'aaaa', 'hh', 'ii', 'ss', ':', ';', $_SESSION['scriptcase']['reg_conf']['date_sep'], $_SESSION['scriptcase']['reg_conf']['time_sep']), array('', 'yyyy', '','','', '', '', '', ''), $this->field_config['paiddate']['date_format']) . "", "" . $_SESSION['scriptcase']['reg_conf']['date_sep'] . ""); ?>",
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

var scBtnGrpStatus = {};
function scBtnGrpShow(sGroup) {
  if (typeof(scBtnGrpShowMobile) === typeof(function(){})) { return scBtnGrpShowMobile(sGroup); };
  $('#sc_btgp_btn_' + sGroup).addClass('selected');
  var btnPos = $('#sc_btgp_btn_' + sGroup).offset();
  scBtnGrpStatus[sGroup] = 'open';
  $('#sc_btgp_btn_' + sGroup).mouseout(function() {
    scBtnGrpStatus[sGroup] = '';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  }).mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  });
  $('#sc_btgp_div_' + sGroup + ' span a').click(function() {
    scBtnGrpStatus[sGroup] = 'out';
    scBtnGrpHide(sGroup, false);
  });
  $('#sc_btgp_div_' + sGroup).css({
    'left': btnPos.left
  })
  .mouseover(function() {
    scBtnGrpStatus[sGroup] = 'over';
  })
  .mouseleave(function() {
    scBtnGrpStatus[sGroup] = 'out';
    setTimeout(function() {
      scBtnGrpHide(sGroup, false);
    }, 1000);
  })
  .show('fast');
}
function scBtnGrpHide(sGroup, bForce) {
  if (bForce || 'over' != scBtnGrpStatus[sGroup]) {
    $('#sc_btgp_div_' + sGroup).hide('fast');
    $('#sc_btgp_btn_' + sGroup).addClass('selected');
  }
}
