@if(Session::has('error'))
<div class="alert alert-error alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    Error occurred! {{ Session::get('error') }}
</div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
         {{ Session::get('success') }}
    </div>
@endif
