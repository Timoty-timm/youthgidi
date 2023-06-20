@extends('Data-User.Wilayah.template-user')
@section('content')  
<div class="card">
  <div class="card-header"> <a href="{{ url('wilayah') }}">Home</a> {{ __('/ Ketua Wilayah') }}</div>
  <hr>
</div>
            <div class="container">
                <div class="card col-lg-11">
                  <h4 class="text-center" style="font-family:Arial Black" >Data Ketua Wilayah</h4>
                            <a href="{{url('dwilayah/create')}}" class="btn btn-success btn-bg-3"> <i class="fa fa-plus">Tambah Data</i> </a>
                          <br><br>
                </div>
                 <!-- Validasi errors -->
                @if ($errors->any())
                <div class="alert alert-danger">
               <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                 @endforeach
                  </ul>
                  </div>
                     @endif
                     <div class="mb-3 col-lg-11">
                      @if ($message = Session::get('sukses'))
                      <div class="alert alert-success">
                        <p>{{ $message }}</p>
                       </div>
                      @endif
                      </div>
                      <div class="card col-lg-11">
                    <div class="card-body">
                          
                            <div class="card shadow " style="background: rgb(220, 213, 226)" >
                            <table class="table table-bordered table-striped table-hover" id="table-datatable" bordir="10" >
                              <tr style="background: rgb(23, 95, 204)" >
                                 <th class="text-center" style="font-family: Arial black">#</th>
                                 <th class="text-center" style="font-family: Arial black" >NIK</th>
                                 <th class="text-center" style="font-family: Arial black" >Nama</th>
                                 <th class="text-center" style="font-family: Arial black" >Masa Jabatan</th>
                                 <th class="text-center" style="font-family: Arial black" >Alamat</th>
                                 <th class="text-center" style="font-family: Arial black" >Akasi</th>
                              </tr>
                            @foreach ($post as $item)
                            <tr class="text-center">
                               <td>{{ ++$i }}</td>
                               <td>{{$item->nik}}</td>
                               <td>{{$item->nama}}</td>
                               <td>{{$item->masajabatan}}</td>
                               <td>{{$item->alamat}}</td>
                               <td class="text-center">
                                <a href="{{url('dwilayah/edit', $item->id)}}" class="text-center btn btn-warning" > <i class="fa fa-edit"> Ubah</i></a>
                                </td>
                            </tr>
                           @endforeach
                     </table>

                    </div>
                    </div>
                </div>
            </div>
        
@endsection
