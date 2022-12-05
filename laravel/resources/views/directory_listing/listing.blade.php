<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <div>
        <div>
            <button
                onclick="window.location.href='{{ route('route_home') }}';"
                type="button"
            >
                Home
            </button>
            <button
                onclick="window.location.href='{{ route('listings.index') }}';"
                type="button"
            >
                Show all listings
            </button>
            <button
                onclick="window.location.href='{{ route('blogs.index') }}'"
                type="button"
            >
                Show all blogs
            </button>
            <button
                onclick="window.location.href='{{ route('route_about') }}'"
                type="button"
            >
                About
            </button>
            <button
                onclick="window.location.href='{{ url()->previous() }}';"
                type="button"
            >
                Back to previous page
            </button>
        </div>

        <hr>

        <div>
            <div {!! $listing->listing_available == 0 ? 'style="opacity: 0.4"' : 'style="opacity: 1"' !!}>
                <div>$listing->id: {{ $listing->id }}</div>
                <div>
                    $listing->listing_name:
                    <button
                        onclick="window.location.href='{{ route('listings.show', ['listing' => $listing]) }}';"
                        type="button"
                    >
                        {{ $listing->listing_name }}
                    </button>
                </div>
                <div>$listing->listing_description: {!!  nl2br(e($listing->listing_description)) !!}</div>
                <div>$listing->listing_address_subdivision_1: {{ $listing->listing_address_subdivision_1 }}</div>
                <div>$listing->listing_address_subdivision_2: {{ $listing->listing_address_subdivision_2 }}</div>
                <div>$listing->listing_address_subdivision_3: {{ $listing->listing_address_subdivision_3 }}</div>
                <div>
                    $listing->listingimages:
                    @if($listing->listingimages->isEmpty())
                        <img
                            src="https://via.placeholder.com/300.png/"
                            width="100"
                            height="100%"
                        >
                    @else
                        @foreach ($listing->listingimages as $listingimage)
                            <img
                                src="{{ asset('storage/images/').'/'.$listingimage->listing_image_path }}"
                                width="100"
                                height="100%"
                            >
                        @endforeach
                    @endif
                </div>
                <div>$listing->listing_price: {{ number_format( (int) $listing->listing_price) }}</div>
                <div>$listing->listing_available: {{ $listing->listing_available }}</div>
                <div>$listing->listing_address_coordinate:
                    {{ $x=$listing->listing_address_coordinate->latitude }},{{ $y=$listing->listing_address_coordinate->longitude }}
                </div>
                <div>
                    <iframe
                        width="400"
                        height="300"
                        style="border:0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://maps.google.com/maps?q={{$x.",".$y}}&amp;t=&amp;z=12&amp;iwloc=B&amp;output=embed">
                    </iframe>
                </div>
                <div>$listing->listing_specification_bedroom: {{ $listing->listing_specification_bedroom }}</div>
                <div>$listing->listing_specification_bathroom: {{ $listing->listing_specification_bathroom }}</div>
                <div>$listing->listing_specification_size: {{ $listing->listing_specification_size }}</div>
                <div>$listing->listing_specification_owner: {{ $listing->listing_specification_owner }}</div>
                <div>$listing->listing_specification_tenant: {{ $listing->listing_specification_tenant }}</div>
                <div>$listing->user_id: {{ $listing->user_id }}</div>
                <div>$listing->created_at: {{ $listing->created_at }}</div>
                <div>$listing->updated_at: {{ $listing->updated_at }}</div>

                <fieldset>
                    <legend>Special:</legend>
                    <div>$listing->reviews_avg_review_rating: {{ (float) $listing->reviews_avg_review_rating }} stars from $listing->reviews_count: {{ (int) $listing->reviews_count }} reviews</div>
                    <div>$listing->applications_count: {{ (float) $listing->applications_count }} applications</div>
                </fieldset>

                <fieldset>
                    <legend>Posted by:</legend>
                    <div>$listing->user->id: {{ $listing->user->id }}</div>
                    <div>
                        $listing->user->user_real_name:
                        <button
                            onclick="window.location.href='{{ route('users.show', ['user' => $listing->user]) }}';"
                            type="button"
                        >
                            {{ $listing->user->user_real_name }}
                        </button>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
    @vite('webfonts.css')
</body>
</html>
