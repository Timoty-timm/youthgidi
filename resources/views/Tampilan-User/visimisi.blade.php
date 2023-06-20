            @extends('Tampilan-User.template-user')
            @section('content')
            <section class="content">
                <div class="card-body ">
                   <center> <h4 style="font-family: Arial, black"> <b> Visi & Misi</b></h4></center>
                    @foreach ($visimisi as $visi)
                    <div class="row">
                        <div class="col-11">
                         <b>{{$visi->judul}}</b>
                            <p>{!!$visi->isi!!}</p><br><br>
                      <b style="font-family: initial">Tanggal: {{ $visi->created_at->tz('Asia/Jakarta')->format('d M Y H:i') }}</b>
                    <hr>
                        </div>
                    </div>
                    @endforeach
                    
            </section>

            @endsection