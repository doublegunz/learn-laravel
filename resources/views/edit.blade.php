<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel 5.6 CRUD Tutorial With Example </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Edit A Form</h2><br  />
        <form method="post" action="{{action('SiswaController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="nis">NIS:</label>
            <input type="text" class="form-control" name="nis" value="{{$siswa->nis}}" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" name="nama" value="{{$siswa->nama}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" name="alamat" value="{{$siswa->alamat}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable>Jenis Kelamin</lable>
                <select name="jenis_kelamin">
                  <option value="1"  @if($siswa->jenis_kelamin == 1) selected @endif>Laki -Laki</option>
                  <option value="2"  @if($siswa->jenis_kelamin == 2) selected @endif>Perempuan</option>
                  
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>