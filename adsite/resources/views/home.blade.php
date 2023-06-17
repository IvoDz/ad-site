<h1>Home Page</h1>

<h2>Categories:</h2>
<ul>
    @foreach ($categories as $category)
        <li><a href="{{ route('advertisements.listByCategory', $category->name) }}">{{ $category->name }}</a></li>
    @endforeach
</ul>

<p><a href="{{ route('advertisements.index') }}">Browse All Ads</a></p>

<p><a href="{{ route('advertisements.create')}}"> Create New Ad</a></p>
