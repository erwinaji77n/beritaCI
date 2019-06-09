<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/style/theme.css"> </head>

<body>
  <nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Portal Berita Lauwba
        <br> </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <i class="fa d-inline fa-lg fa-list-ol"></i>&nbsp;Daftar Berita</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo
site_url('dashboard/tulis_berita')
?>">
              <i class="fa d-inline fa-lg fa-pencil"></i>&nbsp;Tulis Berita</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Resume of News</th>
                <th>Update On</th>
                <th>Gambar</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
$no = 1;
foreach ($berita_list as $key => $value) {?>
                <tr>
                  <td><?php echo $no ?></td>
                  <td style="width: 250px"><?php echo $value->judul_berita ?></td>
                  <td style="width: 250px"><?php 
                   $stringCut = substr($value->isi_berita, 0, 50);
                   $endPoint = strrpos($stringCut, ' ');
               
                   //if the string doesn't contain any space then it will cut without word basis.
                   $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                   $string .= '...';
                  
                   echo $string;
                  ?></td>
                  <td><?php echo date_format(date_create($value->tgl_berita), "d-M-Y H:i:s") ?></td>
                  <td><img src="<?php echo base_url('assets/gambar/') . $value->gambar ?>" width=150 height=100/></td>
                  <td class="text-center" style="width: 150px;">
                  <a href="<?php echo site_url('dashboard/tulis_berita/'. $value->id_berita)?>" class="btn btn-warning" style="color: #FFF"><span class="fa fa-pencil"></span></a>&nbsp;
                  <a onclick="return confirm('hapus berita ini ?')" href="<?php echo site_url('dashboard/hapus_berita/'. $value->id_berita)?>" class="btn btn-danger" style="color: #FFF"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
              <?php $no++;}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
    <img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
  </pingendo>
</body>

</html>