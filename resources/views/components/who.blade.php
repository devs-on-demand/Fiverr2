@if(Auth::guard('web')->check())
<p class="text-success">
    Your are Logged In as <strong> USER </strong>
</p>
@else
<p class="text-danger">
    Your are Logged Out as <strong> USER </strong>
</p>
@endif


@if(Auth::guard('admins')->check())
<p class="text-success">
    Your are Logged In as <strong> ADMIN </strong>
</p>
@else
<p class="text-danger">
    Your are Logged Out as <strong> ADMIN </strong>
</p>
@endif