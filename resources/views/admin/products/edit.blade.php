<x-admin-layout>
    <x-slot name="style">
    </x-slot>

    <div class="_container">
       @if ($errors->any())
           @foreach ($errors->all() as $error)
               <p style="color: red">{{ $error }}</p>
           @endforeach
       @endif
        <h2>Update Product</h2>
        <form class="card" action="{{ route('admin.products.update', ['product' => $product->id]) }}"
            method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <fieldset style="max-width: 200px">
                <legend>Category</legend>
                <select name="category_id" required>
                    @foreach ($categories as $category)
                        @if ($category->id == $product->category_id)
                            <option selected value="{{ $category->id }}">{{ ucfirst($category->title) }}</option>
                            @continue
                        @endif
                        <option value="{{ $category->id }}">{{ ucfirst($category->title) }}</option>
                    @endforeach
                </select>
            </fieldset><br>

            Product Name: <input type="text" name="title" value="{{ $product->title }}" required placeholder="Product name"><br><br>

            Choose Image: <br><br>
            <input id="up_img" type="file" name="image"><br><br>

            <img id="preview_img" style="max-width: 100px" src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->title }}"><br><br>

            Product Information: <input type="text" name="about" value="{{ $product->about }}" required placeholder="Product info"><br><br>

            Price: <input type="number" name="price" min="0" value="{{ $product->price }}" required><br><br>

            Stock Quantity: <input type="number" min="0" name="stock_quantity" value="{{ $product->stock_quantity }}" required><br><br>

            Discount (%): <input type="number" min="0" name="discount" value="{{ $product->discount }}" step="5"><br><br>

            <input type="submit" value="Update Product">
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
