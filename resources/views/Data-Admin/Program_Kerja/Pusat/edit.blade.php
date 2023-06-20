@extends('Data-User.Pusat.template-user')
@section('content')
<div class="card">
    <div class="card-header"> <a href="{{ url('pusat') }}">Home</a> {{ __('/ Program Pusat') }}</div>
    <hr>
  </div>
    <div class="row">
            <div>
              <h4 class="text-center" style="font-family:Arial Black">Ubah Program Kerja Ketua Pusat</h4>
            </div>
        </div>
    
    <div class="col-lg-12 margin-tb">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
    <form action="{{ route('pusats.update', $program_pusat->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong style="font-family: Arial, black" >Program:</strong>
                    <input type="text" name="program" value="{{  $program_pusat->program }}" class="form-control" >
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong style="font-family: Arial, black" >Tujuan:</strong>
                    <input class="form-control" name="tujuan" value="{{  $program_pusat->tujuan }}">
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong style="font-family: Arial, black" >Waktu:</strong>
                    <input type="date" class="form-control" name="waktu" value="{{  $program_pusat->waktu }}">
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong style="font-family: Arial, black" >Sasaran:</strong>
                    <input class="form-control" name="sasaran" value="{{  $program_pusat->sasaran }}">
                </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10">
              <button type="submit" class="btn btn-success"><h4>Simpan</h4></button>
            </div>
        </div>

    </form>
    @endsection