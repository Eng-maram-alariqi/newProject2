<div class="d-flex justify-content-center align-items-center text-center">

    @forelse($roles as $role)
        <span>{{$role->name}} </span>

    @empty
        <span> Not Role Assigned To User</span>
    @endforelse
</div>
