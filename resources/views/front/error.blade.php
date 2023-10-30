@if ($_SESSION['error'])
        <div class="col-xs-6 col-sm-4 form-control alert-danger" style="text-align:center;">
            {{ $_SESSION['error'] }}
        </li>           
    </div>   
@endif
