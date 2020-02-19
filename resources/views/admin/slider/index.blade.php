@include('admin.layout.header')

<section class="blog-post-content">
    <div class="container">
            <div class="row">
            <button><a href="{{route('slider.create')}}">Add New Slider</a></button>

                <table class="table-design">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>   
                        <th>Action-1</th>
                        <th>Action-2</th>
                    </tr>
        
                    @foreach ($slider as $sld)
                    <tr>
                        <td> <img src="{{ asset($sld->src) }}" width="50" height="50"/></td>
                        <td> {{ $sld->name }} </td>
                        <td> {{ $sld->description }} </td>
                        <td><a href="{{route('slider.edit', $sld->id)}}">Edit</a></td> 
                        <td>
                            <form action="{{ route('slider.delete', $sld->id) }}" method="POST">
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