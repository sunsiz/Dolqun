<div class="list-group mt25">
    <a href="{{ route('user.edit', $user->id) }}" class="list-group-item @if(Request::route()->getName() == 'user.edit') active @endif "><i class="fa fa-edit"></i> ئارخىب تەھرىرلەش</a>
    <a href="{{ route('user.avatar', $user->id) }}" class="list-group-item @if(Request::route()->getName() == 'user.avatar') active @endif "><i class="fa fa-camera"></i> باش رەسىم ئۆزگەرتىش</a>
    <a href="{{ route('user.password', $user->id) }}" class="list-group-item @if(Request::route()->getName() == 'user.password') active @endif "><i class="fa fa-key"></i> پارول ئۆزگەرتىش</a>
</div>
@can('is_admin', $user)
    @include('users.admin_panel')
@endcan