<x-admin-layout>
    <x-slot name="style">
    </x-slot>

    <div class="_container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        @endif
        <h2>Update Category</h2>
        <form class="card" action="{{ route('admin.categories.update', ['category' => $category->id]) }}"
              method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            Name: <input type="text" name="title" value="{{ $category->title }}" required
                         placeholder="Category name"><br><br>
            Image: <br><br>
            <input id="up_img" type="file" name="image"><br><br>
            <img id="preview_img" style="max-width: 100px" src="{{ asset('storage/' . $category->image) }}"
                 alt="{{ $category->title }}"><br><br>
            <input type="submit" value="Update Category">
        </form>
    </div>

    <script>
        up_img.onchange = evt => {
            const [file] = up_img.files
            if (file) {
                preview_img.src = URL.createObjectURL(file)
            }
        }
    </script>
</x-admin-layout>
