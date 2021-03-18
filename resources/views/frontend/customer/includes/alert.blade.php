@if(Session::has('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Error Occurred!</strong> {{Session::get('error')}}
    </div>
@endif
@if(Session::has('danger'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{Session::get('danger')}}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Success!</strong> {{Session::get('success')}}
    </div>
@endif
@if(Session::has('info'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{Session::get('info')}}
    </div>
@endif
@if(Session::has('status'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{Session::get('status')}}
    </div>
@endif

@if(Session::has('warning'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Notice!</strong> {{Session::get('warning')}}
    </div>
@endif


@if(Session::has('email_verification'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong>Notice!</strong> Your email address is not verified.
        <a href="{{ route('organizer.resend.verification', ['email' => Session::get('email_verification')]) }}"><strong><u>Resend Verification</u></strong></a>
    </div>
@endif
