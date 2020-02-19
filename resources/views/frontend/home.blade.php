  @extends('frontend.layout')
  @section('content')
    <section class="homepage-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            @foreach ($slider as $key => $sld)
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="{{$key==0 ? 'active':''}}"></li>
            @endforeach
          </ol>
          <div class="carousel-inner">
            @foreach ($slider as $key => $sld)
              <div class="carousel-item {{$key==0 ? 'active':''}}">
                <img class="d-block w-100" src="{{ asset($sld->src) }}" alt="{{$sld->name}}">
              </div>
            @endforeach

          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </section>

    <section class="homepage-blog-section">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 text-center">
                <div class="blog-heading">
                    <h4>Blog Articles</h4>
                </div>
            </div>

            @foreach ($image as $img)
              <div class="col-md-3">
                <a class="description" href="{{route('frontend.single', $img->id )}}">
                    <div class="blog-post">
                      <img src="{{ asset( $img->src ) }}"/>
                      <div class="blog-contents text-center">
                        <div class="posted-by">
                            <p class="author">By admin</p>
                            <p class="date"></p> {{ \Carbon\Carbon::parse($img->created_at)->format('d M Y')}} </p>
                        </div>
                        <h5>{{ $img->name }}</h5>
                        {{-- <p> {{ $img->description }}</p> --}}
                        <p> {{Str::limit(strip_tags( $img->description ),250,'...')}}</p>
                      </div> 
                    </div>
                </a>
              </div>
            @endforeach

          </div>
        </div>
    </section>
@endsection