<h1>Add Item</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('shopping-list.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div>
        <label for="price">Price</label>
        <input type="number" id="price" name="price" value="{{ old('price') }}" required>
    </div>
    <button type="submit">Add Item</button>
</form>

<a href="{{ route('shopping-list.index') }}">Back to List</a>
