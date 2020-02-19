
@include('admin.layout.header')

    <section class="blog-post-content">
        <div class="container">
                <div class="row">
                <button><a href="{{ route('post.create') }}">Add New Post</a></button>

                <table class="table-design">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>   
                            <th>Action-1</th>
                            <th>Action-2</th>
                        </tr>
            
                        @foreach ($post as $po)
                        <tr>
                            <td> {{ $po->title }}</td>
                            <td> {{ $po->description }}</td>
                            <td><a href="{{route('post.edit', $po->id)}}">Edit</a></td>
                            <td>
                                <form action="{{ route('post.delete', $po->id) }}" method="POST">
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