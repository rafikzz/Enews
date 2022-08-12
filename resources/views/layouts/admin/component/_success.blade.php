@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
    <a class="close" data-bs-dismiss="alert" aria-label="close">&times;</a>
    <p>{{ $message }}</p>
</div>
@endif
