<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css')}}">
    
    <title>Laravel Practice</title>
  </head>
  <body>

    <section class="blog-post-title">
      <div class="container">
          <div class="row">
              <div class="col-12 text-center">
                  <h1>My Blog Post</h1>
              </div>
          </div>
      </div>
   </section>

   <section class="navbar-menu">
     <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('post.home') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('post.show') }}">Post</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('image.index') }}">Photos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('slider.index') }}">Slider</a>
              </li>
            </ul>
          </div>
        </nav>
    </div>
   </section>