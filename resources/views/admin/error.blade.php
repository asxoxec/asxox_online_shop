@if(count($errors))
@foreach($errors->all() as $error)
<div class="alert alert-warning" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
            &times;
        </span>
    </button>
    <strong class="glyphicon glyphicon-ok">&nbsp;</strong>{{$error}}
</div>
@endforeach

@endif

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
            &times;
        </span>
    </button>
    <strong class="glyphicon glyphicon-ok">&nbsp;</strong>{{Session::get('success')}}
</div>
@endif

@if(Session::has('warning'))
<div class="alert alert-warning" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
            &times;
        </span>
    </button>
    <strong class="glyphicon glyphicon-remove">&nbsp;</strong>{{Session::get('warning')}}
</div>
@endif

@if(Session::has('danger'))
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">
            &times;
        </span>
    </button>
    <strong class="glyphicon glyphicon-remove">&nbsp;</strong>{{Session::get('danger')}}
</div>
@endif


<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
    });
}, 2000);
</script>