<form action="{{ route('category.store') }}" method="POST">
    @csrf

    <!-- Kategori İsmi -->
    <div class="form-group">
        <label for="name">Kategori İsmi</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <!-- Üst Kategori Seçimi -->
    <div class="form-group">
        <label for="parent_id">Üst Kategori (Eğer alt kategori ise)</label>
        <select id="parent_id" name="parent_id" class="form-control">
            <option value="">Ana Kategori</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @if($category->children)
                    @foreach($category->children as $child)
                        <option value="{{ $child->id }}">&nbsp;&nbsp;— {{ $child->name }}</option>
                    @endforeach
                @endif
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Kategori Oluştur</button>
</form>
