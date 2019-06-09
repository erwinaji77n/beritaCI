<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="<?php echo base_url()?>assets/style/theme.css"> </head>

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
						<a class="nav-link" href="<?php echo 
            site_url('dashboard')
            ?>">
							<i class="fa d-inline fa-lg fa-list-ol"></i>&nbsp;Daftar Berita</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="<?php echo 
            site_url('dashboard/tulis_berita');
            ?>">
							<i class="fa d-inline fa-lg fa-pencil"></i>&nbsp;Tulis/Edit Berita</a>
					</li>
				</ul>
				
			</div>
		</div>
	</nav>
	<div class="py-5 text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
          <img style=" width: 450px;height: 480px;" class="d-block img-fluid my-3" src="<?php 
          if($this->uri->segment(3) == NULL){
          echo base_url('assets/gambar/broken.png');
          $status = "tambah";
          }else{
          echo base_url('assets/gambar/'.$content[0]->gambar);
          $status = "edit";
          }?>"> </div>
				<div class="col-md-6">
					<h1 class="text-secondary text-capitalize"><?php echo $status?> Berita</h1>
					<form action=<?php echo site_url('dashboard/tulis_berita_process/'. $status)?> method="POST" enctype='multipart/form-data'>
						<input type='hidden' name= value="<?php echo $this->uri->segment(3)?>" />
            <div class="form-group">
							<label for="InputJudul" class="text-secondary">Judul Berita</label>
							<textarea name="judul" class="form-control" id="InputJudul" placeholder="Judul Berita"><?php echo $content[0]->judul_berita ?></textarea> </div>
						<div class="form-group">
							<label for="InputUpdateOn" class="text-secondary">Update On</label>
							<input readonly type="text" class="form-control" id="InputUpdateOn" placeholder="date" value="<?php echo $content[0]->tgl_berita ?>"> </div>
						<div class="form-group">
							<label for="IsiBerita" class="text-secondary">Isi Berita</label>
							<textarea name="isi" class="form-control" id="IsiBerita" rows="3" placeholder="isi berita"><?php echo $content[0]->isi_berita ?></textarea>
						</div>
						<div class="form-group">
							<label for="Gambar" class="text-secondary">Pilih Gambar</label>
							<input name="gambar" type="file" class="form-control" id="Gambar" > </div>
						<button type="submit" class="btn btn-warning">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	crossorigin="anonymous"></script>
	<pingendo onclick="window.open('https://pingendo.com/', '_blank')" style="cursor:pointer;position: fixed;bottom: 10px;right:10px;padding:4px;background-color: #00b0eb;border-radius: 8px; width:250px;display:flex;flex-direction:row;align-items:center;justify-content:center;font-size:14px;color:white">Made with Pingendo Free&nbsp;&nbsp;
		<img src="https://pingendo.com/site-assets/Pingendo_logo_big.png" class="d-block" alt="Pingendo logo" height="16">
	</pingendo>
</body>

</html>
