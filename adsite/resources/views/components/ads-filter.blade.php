<div id="ads-filter">
    <select id="sorting" name="sorting">
        <option value="">Sort By</option>
        <option value="price_asc">Price: Low to High</option>
        <option value="price_desc">Price: High to Low</option>
        <option value="name_asc">Name: A to Z</option>
        <option value="name_desc">Name: Z to A</option>
    </select>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sortingSelect = document.getElementById('sorting');

        sortingSelect.addEventListener('change', function() {
            const selectedValue = this.value;

            // Make an AJAX request to fetch filtered data based on the selected sorting option
            fetchFilteredData(selectedValue);
        });

        function fetchFilteredData(sortingOption) {
            // Make an AJAX request to the server to fetch the filtered data
            // Replace the existing ad listings with the filtered results
        }
    });
</script>
