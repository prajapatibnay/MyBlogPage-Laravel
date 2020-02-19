
    @extends('frontend.layout')
    @section('content')

        <section class="singlepage-blog-section">
        <div class="container">
            <div class="row">
            <div class="col-12">
                    <div class="single-page-contents">
                        <div class="posted-by">
                            <p class="author">By admin</p>
                            <p class="date"> {{ \Carbon\Carbon::parse($image->created_at)->format('d M Y')}} </p>
                        </div>

                        <h5 class="text-center">{{ $image->name }}</h5>

                        <img src="{{ asset( $image->src ) }}"/>

                        <p class="description"> {{ $image->description }} </p>
                    </div>
            </div>
            </div>
        </div>
        </section>

    @endsection