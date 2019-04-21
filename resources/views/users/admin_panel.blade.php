<div class="list-group">
    <a href="{{ route('category.index') }}" class="list-group-item @if(Request::route()->getName() == 'category.index') active @endif "><i class="fa fa-bookmark"></i> سەھىپە باشقۇرۇش</a>
    <a href="{{ route('posts.create') }}" class="list-group-item @if(Request::route()->getName() == 'posts.create') active @endif "><i class="fa fa-paper-plane"></i> مەزمۇن قوشۇش </a>
    <a href="{{ route('articles.index') }}" class="list-group-item @if(Request::route()->getName() == 'articles.index') active @endif "><i class="fa fa-list"></i> يازما تېزىملىكى</a>
</div>