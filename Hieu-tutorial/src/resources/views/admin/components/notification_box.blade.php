@if(\Illuminate\Support\Facades\Session::get('message-success'))
    <div class="row notification-message" id="notification-message">
        <div class="col-md-12">
            <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('message-success')}}</div>
        </div>
    </div>
    @php \Illuminate\Support\Facades\Session::put('message-success', null); @endphp

    <script src="{{ asset('server/js/hide-notification-box.js') }}"></script>
@endif

@if(\Illuminate\Support\Facades\Session::get('message-error'))
    <div class="row notification-message" id="notification-message">
        <div class="col-md-12">
            <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('message-error')}}</div>
        </div>
    </div>
    @php \Illuminate\Support\Facades\Session::put('message-error', null); @endphp

    <script src="{{ asset('server/js/hide-notification-box.js') }}"></script>
@endif
