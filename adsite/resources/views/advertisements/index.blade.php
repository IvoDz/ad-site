<h1> {{$msg}} </h1>

@foreach ($advertisements as $advertisement)
    <div>
        <h2><a href="{{ route('advertisements.show', $advertisement->id) }}">{{ $advertisement->title }}</a></h2>
        <p>Price: ${{ $advertisement->price }}</p>
        <!-- Display other advertisement details -->
        <hr>
    </div>
@endforeach
