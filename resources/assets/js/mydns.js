var dnsrrfields = 1000;

function dnsAddRR() {

    dnsrrfields++;

  $('#rr_table tr:last').before('<tr>' +
  '<td><input data-validation="required" name="rrfields[' + dnsrrfields + '][name]" type="text" class="form-control input-sm"></td>' +
  '<td><input data-validation="required" name="rrfields[' + dnsrrfields + '][data]" type="text" class="form-control input-sm"></td>' +
  '<td>' +  dnsTypeSelect() + '</td>' +
  '<td><input data-validation-optional="true" data-validation="number" name="rrfields[' + dnsrrfields + '][ttl]" type="text" class="form-control input-sm"></td>' +
  '<td><input data-validation-optional="true" data-validation="number" name="rrfields[' + dnsrrfields + '][aux]" type="text" class="form-control input-sm"></td>' +
  '<td><a class="btn btn-sm btn-danger" onclick="dnsDeleteRR.call(this);"><span class="glyphicon glyphicon-remove red"></span></a></td>' +
  '</tr>');
}

function dnsDeleteRR() {
    $(this).parent().parent().remove();
}


function dnsTempUnDeleteRR() {
    $(this).parent().parent().find('input:visible,select:visible').each(function(index,value) {
        $(value).prop("disabled",false);
        $(value).prop("title","");
    });
    $(this).hide()
    $(this).siblings('.undelete').show();
    $(this).siblings("input[name*=delete]").val('false');

}

function dnsTempDeleteRR() {
    $(this).parent().parent().find('input:visible,select:visible ').each(function(index,value) {
        $(value).prop("disabled",true);
        $(value).prop("title","This Row Will Be Deleted On Update Of Form.  Undo By pushing blue undo button.");

    });
    $(this).hide()
    $(this).siblings('.delete').show();
    $(this).siblings("input[name*=delete]").val('true');
}

function dnsTypeSelect() {
    var types = ['A','AAAA','ALIAS','CNAME','HINFO','MX','NAPTR','NS','PTR','RP','SRV','TXT'];

    var select = '<select name="rrfields[' + dnsrrfields + '][type]" class="form-control input-sm">';
    $(types).each(function() {
        select += '<option value="' + this + '">' + this + "</option>";
    });

    return select + '</select>';
}