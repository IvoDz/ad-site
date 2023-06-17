<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new ad</title>
</head>
<body>
    <h1>Creating new advertisement</h1>

    <form action="{{ route('advertisements.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price" step="0.01" required>
        </div>

        <div>
            <label for="category">Category</label>
            <select name="category_id" id="category" required>
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" required></textarea>
        </div>

        <button type="submit">Create Advertisement</button>
    </form>
</body>
</html>
