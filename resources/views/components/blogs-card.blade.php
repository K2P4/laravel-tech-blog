@props(['blogs'])


<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>

    <x-cateogry-dropdown />


    <x-search />
    <div class=" row ">


        @forelse($blogs as $blog)
            <div class="col-md-4 mb-4">
                <x-blog-card :blog="$blog" />
            </div>
        @empty
            <x-utility.notfound title="No Blogs Found" message="Try adjusting your filters or search." />
        @endforelse


        @if (method_exists($blogs, 'hasPages') ? $blogs->hasPages() : true)
            {{ $blogs->links() }}
        @endif



    </div>
</section>
