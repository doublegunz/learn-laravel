<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    <a href="{{action('SiswaController@create')}}" class="btn btn-primary">Add</a>
    <br>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>NIS</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($siswa as $row)
      @php
        $jenis_kelamin = ($row['jenis_kelamin'] == 1) ? 'Laki-Laki':'Perempuan';
        @endphp
      <tr>
        <td>{{$row['nis']}}</td>
        <td>{{$row['nama']}}</td>
        <td>{{$jenis_kelamin}}</td>
        
        <td><a href="{{action('SiswaController@edit', $row['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('SiswaController@destroy', $row['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>