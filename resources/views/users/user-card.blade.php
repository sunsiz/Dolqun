<div class="row" style="margin: 0 4px;">
    <div class="bg-white br3" style="overflow: hidden;padding-top: 25px;">
        <div class="col-md-12">
            <div class="lf-ucenter-avatar" style="text-align: center;">
                <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}"  class="img-circle" style="width: 80px;display: block;margin:0 auto 25px auto">
                <h3>{{ $user->name }}</h3>
                <p>
                    @if($user->is_admin)
                        <span class="text-pink">بېكەت باشلىقى</span>
                    @else
                        <span class="text-muted">يېڭى ئەزا</span>
                    @endif
                    {{--<span class="text-muted">|</span>--}}
                    {{--<span class="text-pink">@پاراڭلىشىش</span>--}}
                        <br>
                        <br>
                </p>
            </div>
        </div>
    </div>
</div>