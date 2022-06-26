@if (!empty($breadcrumbs))
  <div class="breadcrumbs">
    <div class="wrapper">
      <ul>
        @foreach ($breadcrumbs as $breadcrumb)
        <li>
          @if ($breadcrumb->url && !$loop->last)
          <a href="{{ $breadcrumb->url }}">
            {{ $breadcrumb->title }} 
          </a>
          @else
          <span>
            {{ $breadcrumb->title }}
          </span>
          @endif
        </li>
        @endforeach
      </ul>
    </div>
  </div>
@endif