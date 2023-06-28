<div class="flex justify-between items-center mb-4">
    <form action="{{ route('admin.ads') }}" method="GET" class="flex items-center space-x-4">
        <label for="filter" class="text-lg">{{__('messages.filter_by')}}</label>
        <select name="filter" id="filter" class="border border-gray-300 px-4 py-2 rounded-md">
            <option value="" {{ request('filter') === '' ? 'selected' : '' }}>{{__('messages.all')}}</option>
            <option value="price_asc" {{ request('filter') === 'price_asc' ? 'selected' : '' }}>{{__('messages.l-h')}}</option>
            <option value="price_desc" {{ request('filter') === 'price_desc' ? 'selected' : '' }}>{{__('messages.h-l')}}</option>
            <option value="name_asc" {{ request('filter') === 'name_asc' ? 'selected' : '' }}>{{__('messages.a-z')}}</option>
            <option value="name_desc" {{ request('filter') === 'name_desc' ? 'selected' : '' }}>{{__('messages.z-a')}}</option>
        </select>
        <input type="text" name="search" placeholder="{{__('messages.search')}}" value="{{ request('search') }}" class="border border-gray-300 px-4 py-2 rounded-md">
        <button type="submit" class="px-4 py-2 bg-laravel text-white rounded-md">{{__('messages.apply')}}</button>
    </form>
</div>
