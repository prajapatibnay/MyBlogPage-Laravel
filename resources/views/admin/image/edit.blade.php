@include('admin.layout.header'))

<section class="add-new-post">
    <div class="container">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('image.update', $image->id )}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Title" name="name" value="{{$image->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" class="form-control" cols="40" rows="5">{{$image->description}}</textarea>
                </div>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
 
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>

@include('admin.layout.footer')    