<h1>Kategoriler</h1>

<ul>
    @foreach($categories as $category)
        <li>{{ $category->name }}</li>
        @if($category->children)
            <ul>
                @foreach($category->children as $child)
                    <li>{{ $child->name }}</li>
                @endforeach
            </ul>
        @endif
    @endforeach
</ul>
