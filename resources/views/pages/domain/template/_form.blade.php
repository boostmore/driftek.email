    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
      <label class="col-sm-4 control-label">Template Name</label>
      <div class="col-sm-6">
        <input data-validation="required" type="text" class="form-control input-sm" name="name" value="{{ $dnsTemplate->name }}">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-4 control-label">Description</label>
      <div class="col-sm-6">
        <textarea rows="5" class="form-control" name="description">{{ $dnsTemplate->description }}</textarea>
      </div>
    </div>
<br>
    <table class="table" id="rr_table">
      <thead>
        <tr>
          <th>Sub Domain</th>
          <th>Data</th>
          <th>Record Type</th>
          <th>TTL</th>
          <th>Pref/Aux</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php $i = 1 ?>
        @foreach($dnsTemplate->rrs as $rr)
          <tr>
            <td>
            {!!Form::hidden("rrfields[" . $i . "][id]",$rr->id)!!}
            {!!Form::text("rrfields[" . $i . "][name]",$rr->name,['class' => 'form-control input-sm','type' => 'text', 'data-validation' => 'required'])!!}</td>
            <td>{!!Form::text("rrfields[" . $i . "][data]",$rr->data,['class' => 'form-control input-sm','type' => 'text', 'data-validation' => 'required'])!!}</td>
            <td>
            {!!Form::select("rrfields[" . $i . "][type]",$rr->rrTypes(),$rr->type,['class' => 'form-control input-sm'])!!}
            </td>
            <td>{!!Form::text("rrfields[" . $i . "][ttl]",$rr->ttl,['class' => 'form-control input-sm','type' => 'text', 'data-validation' => 'required'])!!}</td>
            <td>{!!Form::text("rrfields[" . $i . "][aux]",$rr->aux,['class' => 'form-control input-sm','type' => 'text', 'data-validation' => 'required'])!!}</td>
            <td>
                <a class="btn btn-sm btn-danger undelete" onclick="dnsTempDeleteRR.call(this);"><span class="glyphicon glyphicon-remove red"></span></a>
                <a class="btn btn-sm btn-info delete" style="display:none" onclick="dnsTempUnDeleteRR.call(this);"><span class="glyphicon glyphicon-refresh"></span></a>
                {!!Form::hidden("rrfields[" . $i++ . "][delete]",'false')!!}
             </td>
          </tr>
        @endforeach
        <tr>
          <td><a class="btn btn-default btn-sm" href="javascript:dnsAddRR()"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></td>
          <td colspan="5"></td>
        </tr>
      </tbody>
    </table>