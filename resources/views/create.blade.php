<!-- create.blade.php -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Laravel 5.6 CRUD Tutorial With Example  </title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
 
</head>
<body>
  <div class="container">
  <h2>Data Siswa</h2><br/>
  <form method="post" action="{{url('siswa')}}" >
  @csrf
  <div class="row">
  <div class="col-md-4"></div>
  <div class="form-group col-md-4">
  <label for="nis">NIS:</label>
  <input type="text" class="form-control" name="nis">
  </div>
  </div>
  <div class="row">
  <div class="col-md-4"></div>
  <div class="form-group col-md-4">
  <label for="nama">Nama:</label>
  <input type="text" class="form-control" name="nama">
  </div>
  </div>
  <div class="row">
  <div class="col-md-4"></div>
  <div class="form-group col-md-4">
  <label for="alamat">Alamat:</label>
  <input type="text" class="form-control" name="alamat">
  </div>
  </div>

  <div class="row">
  <div class="col-md-4"></div>
  <div class="form-group col-md-4">
  <lable>Jenis Kelamin</lable>
  <select name="jenis_kelamin">
  <option value="1">Laki-Laki</option>
  <option value="2">Perempuan</option>
  </select>
  </div>
  </div>
  <div class="row">
  <div class="col-md-4"></div>
  <div class="form-group col-md-4" style="margin-top:60px">
  <button type="submit" class="btn btn-success">Submit</button>
  </div>
  </div>
  </form>
  </div>
</body>
</html>