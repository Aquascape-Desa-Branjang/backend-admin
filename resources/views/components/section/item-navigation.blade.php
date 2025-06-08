@foreach ($navigations as $navigation)
    <a href="{{ $navigation['url'] }}" class="navigation {{ urlIsActive($navigation['url']) }}">
        {{ $navigation['title'] }}
    </a>
@endforeach
