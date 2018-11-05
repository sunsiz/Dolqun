<div class="user-panel bg-white br3">
    <div class="user-panel-bg br"></div>
    <div class="user-panel-index">
        <div class="user-avatar-area bg-white br3">
            <div class="user-avatar">
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="img-rounded">
            </div>
        </div>
        <div class="user-statics">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-pink">{{ $user->name }}</h3>
                </div>
                <div class="col-md-4 text-muted">يازمىلىرى</div>
                <div class="col-md-4 text-muted">ئەگەشكۈچىلىرى</div>
                <div class="col-md-4 text-muted">ئەگەشكەنلىرى</div>
                {{--<div class="col-md-4 text-muted">{{ $user->posts->count() }}</div>--}}
                {{--<div class="col-md-4 text-muted">{{ $user->followers->count() }}</div>--}}
                {{--<div class="col-md-4 text-muted">{{ $user->followings->count() }}</div>--}}
            </div>
        </div>
        <div class="user-panel-actions">
            {{--@can('follow', $user)--}}
                {{--<follow-user user="{{ $user->id }}"></follow-user>--}}
            {{--@endcan--}}
            {{--<button class="btn btn-outline-pink btn-sm">Message</button>--}}
        </div>
    </div>
</div>