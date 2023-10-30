    
    @if ($_SESSION['message'])
    <div class="col-xs-6 col-sm-4 form-control alert-success" style="text-align:center;">
        {{ $_SESSION['message'] }}
    </div>
    @endif
