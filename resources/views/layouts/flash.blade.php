<!-- Success -->
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    <i class="menu-icon tf-icons ti ti-checkbox"></i> {{ Session::get("success") }}
</div>
@endif

@if(Session::has('failed'))
<div class="alert alert-danger" role="alert">
    <i class="menu-icon tf-icons ti ti-alert-circle"></i> {{ Session::get("failed") }}
</div>
@endif

@if(Session::has('failedValidation'))
<div class="alert alert-danger" role="alert">
    <i class="menu-icon tf-icons ti ti-alert-circle"></i>
    <ul>
        @foreach(Session::get('failedValidation') as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif