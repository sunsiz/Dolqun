<div class="list-group">
    <a href="{{ route('posts.create') }}" class="list-group-item @if(Request::route()->getName() == 'posts.create') active @endif "><i class="fa fa-paper-plane"></i> مەزمۇن قوشۇش </a>
    <a href="{{ route('articles.index') }}" class="list-group-item @if(Request::route()->getName() == 'articles.index') active @endif "><i class="fa fa-list"></i> يازما تېزىملىكى</a>
    {{--<a href="{{ route('tag.create') }}" class="list-group-item @if(Request::route()->getName() == 'tag.create') active @endif "><i class="fa fa-tag"></i> خەتكۈچلەر</a>--}}
</div>