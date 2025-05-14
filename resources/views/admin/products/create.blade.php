<x-admin-layout>
    <x-slot name="style">
    </x-slot>

    <div class="_container">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red">{{ $error }}</p>
            @endforeach
        @endif
        <h2>Create New Product</h2>
        <form class="card" action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset style="max-width: 200px">
                <legend>Category</legend>
                <select name="category_id" required>
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option selected value="{{ $category->id }}">{{ ucfirst($category->title) }}</option>
                            @continue
                        @endif
                        <option value="{{ $category->id }}">{{ ucfirst($category->title) }}</option>
                    @endforeach
                </select>
            </fieldset><br>

            Name: <input type="text" name="title" value="{{ old('title') }}" required><br><br>

            Image: <br><br>
            <input type="file" name="image" required><br><br>

            Information: <input type="text" name="about" value="{{ old('about') }}" required><br><br>

            Price: <input type="number" name="price" min="0" value="{{ old('price') }}" required><br><br>

            Stock Quantity: <input type="number" min="0" name="stock_quantity" value="{{ old('stock_quantity') }}" required><br><br>

            Discount (%): <input type="number" min="0" value="{{ old('discount') }}" name="discount" step="5"><br><br>

            <input type="submit" value="Create Product">
        </form>
    </div>
</x-admin-layout>
