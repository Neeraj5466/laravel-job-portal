
<nav {{$attributes}}>
    
    <ul class="d-flex fs-5 gap-2 text-secondary">
        <li class="nav-link">
            <a href="/">Home</a>
        </li>

        @foreach ($links as $label => $link)
                   
        <li class="nav-link">-></li>

        <li class="nav-link">
            <a href="{{$link}}">{{$label}}</a>
        </li>
      
        @endforeach
    </ul>
</nav>