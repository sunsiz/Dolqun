<div class="bg-white br3" style="overflow: hidden;padding: 15px 0;margin-bottom: 20px;line-height: 20px;">
    <div class="row" style="text-align: center">
        <div class="col-md-12 col-sm-4 col-xs-4">
            <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}"  class="img-circle" style="height: 45px">
        </div>
        <div class="col-md-12 col-sm-3 col-xs-3" style="padding:10px 0;">
            <span style="font-size: 16px;">
                {{ $user->name }}
            </span>
        </div>
        <div class="col-md-12 col-sm-5 col-xs-5">
            <button class="btn btn-sm btn-outline-pink" style="padding:6px 18px;border-radius: 15px;margin-top: 6px;">ئاپتور</button>
            <br>
        </div>
    </div>
</div>