@extends('Data-Admin.sekertaris.template')
@section('content')
<div class="container mt-3">
  <div class="card">
    <div class="card-header"> <a href="{{ url('sekertaris') }}">Home</a> {{ __('/ Data Role') }}</div>
        <hr>
    </div>
  <table class="table table-bordered"  style="width:10%" >
      <tr>
          <th style="font-family:  Arial Black">No</th>
          <th style="font-family:  Arial Black">Nama</th>
          <th style="font-family:  Arial Black">Username</th>
          <th style="font-family:  Arial Black">Email</th>
          <th style="font-family:  Arial Black">Password</th>
          <th style="font-family:  Arial Black">Role</th>
          <th style="font-family:  Arial Black">Delete</th>
      </tr>
      @foreach ($all as $data)
      <tr>
          <td>{{++$i}}</td>
          <td>{{$data->name}}</td>
          <td>{{$data->username}}</td>
          <td>{{$data->email}}</td>
          <td>{{$data->password}}</td>
          <td>{{$data->level}}</td>
          <td>
          <form onsubmit="return confirm('Apakah Anda Yakin ?');"
            action="{{ route('all-data.destroy', $data->id) }}" method="POST">
              @csrf
            @method('DELETE')
         <button type="submit" class="btn btn-sm btn-danger shadow"> <i class="fa fa-trash"> Hapus</i> </button>
          </form>
          </td>
      </tr>
      @endforeach
  </table>
  Total: {{ $count }}
  {{ $all->links() }}
</div>
@endsection