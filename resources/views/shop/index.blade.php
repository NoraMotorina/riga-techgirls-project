<h1>Shopping List</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->price }}</td>
            <td>
                <a href="{{ route('shopping-list.edit', $item->id) }}">Edit</a>
                <form action="{{ route('shopping-list.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<p>Total Amount: {{ $totalAmount }}</p>

<a href="{{ route('shopping-list.create') }}">Add Item</a>

