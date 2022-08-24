<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      @lang('site.cats')
    </a>
    <ul class="dropdown-menu">
      @foreach ($cats as $item)
      <li><a class="dropdown-item" href="{{ route('categories.show',$item->id) }}">{{$item->name}}</a></li>
      @endforeach
      
    </ul>
  </li>