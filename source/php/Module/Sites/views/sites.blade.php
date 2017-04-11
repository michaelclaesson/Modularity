<div class="grid">
    @foreach($sites as $site)
    <div class="grid-md-4">
         <a class="box box-post-brick" href="#">
            @if ($site->image_rendered)
            {!! $site->image_rendered !!}
            @elseif ($site->image)
            <div style="background-image:url({{ $site->image }});" class="box-image">
               <img alt="{{ $site->blogname }}" src="{{ $site->image }}">
            </div>
            @endif

            <div class="box-content">
                <h3 class="post-title no-margin no-padding">{{ $site->blogname }}</h3>
                <small style="color:#fff;">{{ explode('://', $site->home)[1] }}</small>
            </div>
            <div class="box-post-brick-lead">
               <p>{{ $site->description }}</p>
            </div>
       </a>
    </div>
    @endforeach
</div>
