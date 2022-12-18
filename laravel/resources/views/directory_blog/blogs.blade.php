<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'webfonts.css'])
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <div class="container">
        <div>
            <button
                onclick="window.location.href='{{ route('route_home') }}';"
                type="button"
                class="btn btn-primary"
            >
                Home
            </button>
            <button
                onclick="window.location.href='{{ route('listings.index') }}';"
                type="button"
                class="btn btn-primary"
            >
                Listings
            </button>
            <button
                onclick="window.location.href='{{ route('blogs.index') }}'"
                type="button"
                class="btn btn-primary"
            >
                Blogs
            </button>
            <button
                onclick="window.location.href='{{ route('route_about') }}'"
                type="button"
                class="btn btn-primary"
            >
                About
            </button>
            <button
                onclick="window.location.href='{{ url()->previous() }}';"
                type="button"
                class="btn btn-primary"
            >
                Back to previous page
            </button>
        </div>
    </div>
        <div class="main-wrapper">
                <div class="hero-top">
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col" id="first-box">
                                <h1><b>Discover what other people are doing!</b></h1>
                                <p><br>
                                Old-bie and local love to share their experience.<br>
                                Discover what they share and broaden your knowledge<br>
                                through these blog posts.<br><br>              
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
        <div class="breadcrumb justify-content-center">
            <h2>{{ Breadcrumbs::render('breadcrumb_blogs') }}</h2>
        </div>
        @foreach($blogs as $blog)
        <div class="blog-container">
                    <div class="card border" style="width: 100%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h5 class="card-title"><b><button onclick="window.location.href='{{ route('blogs.show', ['blog' => $blog]) }}';"
                                            type="button"
                                        >
                                            {{ $blog->blog_name }}
                                        </button></b></h5>
                                    <hr>
                                    <div class="blog-info">
                                        <p><b>Blog ID:</b>{{ $blog->id }}</h6></p>
                                        <p><b>Released at:</b>{{ $blog->created_at }}</p>
                                        <p><b>Updated at:</b> {{ $blog->updated_at }}</p>
                                        <br>
                                        <p><b>Posted by:</b><button class="user-name"
                                            onclick="window.location.href='{{ route('users.show', ['user' => $blog->user]) }}';"
                                            type="button"
                                        >
                                            {{ $blog->user->user_real_name }}
                                        </button><br></p>
                                        <p><b>Id:</b>{{ $blog->user->id }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <h5><b>Decription</b></h5>
                                    <hr>
                                    <p class="card-text">{!!  nl2br(e($blog->blog_description)) !!}</p>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            <div>
                <!-- <h2>Blog</h2>
                <div>$blog->id: {{ $blog->id }}</div>
                <div>
                    $blog->blog_name:
                    <button
                        onclick="window.location.href='{{ route('blogs.show', ['blog' => $blog]) }}';"
                        type="button"
                    >
                        {{ $blog->blog_name }}
                    </button>
                </div>
                <div>$blog->blog_description: {!!  nl2br(e($blog->blog_description)) !!}</div>
                <div>$blog->user_id: {{ $blog->user_id }}</div>
                <div>$blog->created_at: {{ $blog->created_at }}</div>
                <div>$blog->updated_at: {{ $blog->updated_at }}</div>
            </div>

            <div>
                <h2>Posted by</h2>
                <div>$blog->user->id: {{ $blog->user->id }}</div>
                <div>
                    $blog->user->user_real_name:
                    <button
                        onclick="window.location.href='{{ route('users.show', ['user' => $blog->user]) }}';"
                        type="button"
                    >
                        {{ $blog->user->user_real_name }}
                    </button>
                </div>
            </div>
            <hr> -->
        @endforeach
        </div>
    </div>
</body>


</html>
