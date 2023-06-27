<div class="flex justify-between items-center mb-4">
    <form action="{{ route('advertisements.index') }}" method="GET" class="flex items-center space-x-4">
        <label for="filter" class="text-lg">Filter by:</label>
        <select name="filter" id="filter" class="border border-gray-300 px-4 py-2 rounded-md">
            <option value="" {{ request('filter') === '' ? 'selected' : '' }}>All</option>
            <option value="price_asc" {{ request('filter') === 'price_asc' ? 'selected' : '' }}>Price (Low to High)</option>
            <option value="price_desc" {{ request('filter') === 'price_desc' ? 'selected' : '' }}>Price (High to Low)</option>
            <option value="name_asc" {{ request('filter') === 'name_asc' ? 'selected' : '' }}>Name (A to Z)</option>
            <option value="name_desc" {{ request('filter') === 'name_desc' ? 'selected' : '' }}>Name (Z to A)</option>
        </select>
        <input type="text" name="search" placeholder="Search ads" value="{{ request('search') }}" class="border border-gray-300 px-4 py-2 rounded-md">
        <button type="submit" class="px-4 py-2 bg-laravel text-white rounded-md">Apply Filter</button>
    </form>
</div>
