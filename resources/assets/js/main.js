//Zero Clipboard Functions

var client = new ZeroClipboard( $(".clip_button"));

client.on("aftercopy", function(event) {
  $('#status_msg').html("Copied to Clipboard.");
  $('#status_msg').show();
  $('#status_msg').delay(5000).slideUp(500);
});

/**
 * jQuery Form Validator
 * ------------------------------------------
 * Created by Victor Jonsson <http://www.victorjonsson.se>
 *
 * @website http://formvalidator.net/
 * @license Dual licensed under the MIT or GPL Version 2 licenses
 * @version 2.2.63
 */

$.validate({
    form : '#dns_template_form,#registrar_template_form'
});