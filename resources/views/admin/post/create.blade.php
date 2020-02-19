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
        <form action="{{route('post.store')}}" method="post">
            @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" placeholder="Enter Title" name="title">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="description" class="form-control" cols="40" rows="5"></textarea>
                </div>
 
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</section>

@include('admin.layout.footer')    