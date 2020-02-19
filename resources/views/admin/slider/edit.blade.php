@include('admin.layout.header')

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
        <form action="{{route('slider.update', $slider->id )}}" method="post" enctype = 'multipart/form-data'>
            @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter Title" name="name" value="{{$slider->name}}">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" cols="40" rows="5">{{$slider->description}}</textarea>
                </div>

                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" id="customFile" name="image">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
    </div>
</section>

@include('admin.layout.footer')  