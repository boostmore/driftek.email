
<div id="status_msg" class="alert alert-success" @unless(session('status')) style="display:none" @endunless>
@if (session('status'))
  <h3>{{session('status')}}</h3>
@endif
</div>
