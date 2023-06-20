

   @extends('Data-Admin.sekertaris.template')
   @section('content')

   <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="card">
            <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Video') }}</div>
                <hr>
            </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<h4 class="text-center" style="font-family:Arial Black" >Data Video</h4>
<a class="btn btn-success" href="{{ route('video.create') }}"> <i class="fa fa-plus"> Tambah Data</i> </a>
&nbsp;&nbsp;&nbsp;&nbsp;
<br>
    @forelse($video as $key => $item)
    <div class="col-lg-4">
<br>
        <div class="card shadow">
          <a href="/berita-duka/{{ $item->id }}">
            <video width="220" height="140" controls>
                {{-- <iframe width="560" height="315" src="{{ asset($product->path) }}"  type="video/mp4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> --}}
                <source src="{{ asset($item->path) }}" type="video/mp4" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
            </video>
          </a>
          <div class="card-body">
            {{-- <p class="btn btn-success rounded-pill btn-sm">{{ $product->judul }}</p> --}}
            <div class="card-title fw-bold text-primary h4"> <h4><b>{{ $item->judul }}</b></h4> </div>
            <p class="text-secondary">{{$item->desk }}</p><br>


            <form action="{{ route('video.destroy', $item->id) }}" method="POST">
                <a class="btn btn-warning" href="{{ route('video.edit',$item->id) }}"> <i class="fa fa-edit"> Ubah</i> </a>
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Hapus</button>
          </form>

          </div>
        </div>
    </div>
    @endforeach
  
   @endsection
    

