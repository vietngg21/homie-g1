<div>
    <div class="row blog-filter-group filter-section align-items-center mb-5 p-4">
        <div class="col col-lg-6 search-filter" role="search">
            <label class="h5" for="blog-search">Search by keywords</label>
            <input wire:model="searchName" wire:change="filter" class="form-control border-end-0 border rounded-pill p-2 search-name" type="text" placeholder="Enter your search..." aria-label="Search" id="blog-search">
            <!-- <button disabled class="btn btn-outline-success" type="submit">Search</button> -->

        </div>

        <div class="col col-lg-4">
            <label class="h5 for="order">Order blogs by</label>
            <select class="form-control" wire:model="order" id="order">
                <option selected value="byID">Blog ID</option>
                <option value="created">Most recently created</option>
                <option value="updated">Most recently updated</option>
            </select>
        </div>

        <div class="col">
            <div>
                <button class="btn btn-warning mt-4" wire:click="resetAll">Reset all queries</button>
            </div>
        </div>


    </div>

</div>

<div>
    <div class="container">
        <div class="text-center mb-3">
            Showing {{ $blogs->firstItem() }} - {{ $blogs->lastItem() }} blogs from the total of {{ $blogs->total() }} blogs.
        </div>
        <div class="blog-listing-section">
            @foreach ($blogs as $blog)
                <div class="card blog-card gy-3 px-3 py-2 mb-1 smooth-transition">
                    <div class="row align-items-center">

                        <div class="col-md-8">
                            <div class="row">
                                <a class="card-title h5 mb-3 smooth-transition" href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                    {{ $blog->blog_name }}
                                </a>
                            </div>
                            <div class="row">
                                <p>
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{ $blog->created_at }}
                                    <i class="fa-solid fa-hashtag purple-ice"></i>
                                    {{ $blog->id }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <p>
                                    <i class="fa-regular fa-id-card"></i>
                                    <a class="user-name smooth-transition" href="{{ route('users.show', ['user' => $blog->user]) }}">{{ $blog->user->user_real_name }}</a>
                                    <i class="fa-solid fa-hashtag purple-ice"></i>
                                    {{ $blog->user->id }}
                                </p>
                            </div>
                            <div class="row">
                                <p><b>Updated at:</b> {{ $blog->updated_at }}</p>
                            </div>
                        </div>
                        
                    </div>
                </div>

            @endforeach
        </div>
        <div class="pagination justify-content-center mt-5">
            {{-- below is the box containing links to different page. get it to center? --}}
            <br><div>{{ $blogs->links() }}</div>
        </div>
    </div>
</div>