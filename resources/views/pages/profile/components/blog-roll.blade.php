<div class="blog-roll">
    <strong>Punk Goes' Latest Blog Entry.</strong>
    <ul>
        @if(count($blogs) > 0)
            @foreach($blogs as $blog)
                <li>{{$blog->blog_title}}&nbsp;&nbsp;(<a href="{{ url('blogs/'.$blog->id) }}">view more</a>)</li>
            @endforeach
        @else
            <li>Check back for blog posts!</li>
        @endif
    </ul>
    [<a href="{{ url('blogs') }}">View All Blog Entries</a>]
</div>