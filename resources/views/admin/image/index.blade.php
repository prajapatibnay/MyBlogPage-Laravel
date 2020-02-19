
@include('admin.layout.header')

    <section class="blog-post-content">
        <div class="container">
                <div class="row">
                <button><a href="{{route('image.create')}}">Add New Image</a></button>

                <table class="table-design">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Description</th>   
                            <th>Action-1</th>
                            <th>Action-2</th>
                        </tr>
            
                        @foreach ($image as $img)
                        <tr>
                            <td> <img src="{{asset($img->src)}}" width="50" height="50"/></td>
                            <td> {{ $img->name }}</td>
                            <td> {{ $img->description }}</td>
                            <td><a href="{{route('image.edit', $img->id)}}">Edit</a></td>
                            <td>
                                <form action="{{ route('image.delete', $img->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                    
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button> 
                                </form>
                            </td>        
                        </tr>
                        @endforeach
                    </table>
                </div>
        </div>
    </section>

@include('admin.layout.footer')