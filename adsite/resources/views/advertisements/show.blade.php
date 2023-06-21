<!-- Display advertisement details -->
<h2>{{ $advertisement->title }}</h2>
<p>Price: ${{ $advertisement->price }}</p>
<!-- Display other advertisement details -->
<p>Description: {{ $advertisement->description }}</p>
<!-- Display additional details as needed -->
<p>Seller: {{ $advertisement->seller->name}}</p>
