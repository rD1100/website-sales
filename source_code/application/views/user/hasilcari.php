<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $aktif; ?> </h1>
<div class="container">
	
	<hr>
 
		<?php
        
    
		if(count($cari)>0)
		{
			
		}
 
		else
		{
			echo "Data tidak ditemukan";
		}
 
		?>
 
	</div>
    <!-- Page Heading -->
    



</div>
<!-- /.container-fluid -->
<div class="container-fluid">
    <div class="row text-center mt-4">
        <?php foreach ($cari as $brg) : ?>
            <div class="card ml-3 mb-3" style="width: 18rem;">
                <img src="<?= base_url('/uploads/') . $brg->gambar ;?>
              
                " class="card-img-top" alt="...">
                <div class="card-body" >
                    <h5 class="card-title mb-1"> <?= $brg->nama_barang ;?>
                    
                    </h5>
                   
                    <span class="badge badge-danger mb-3">Rp. <?= number_format($brg->harga, 0, ',', '.'); ?></span>
                    <br>
                    <?php echo anchor('user/tambah_keranjang/' . $brg->id_barang, '<div class="btn btn-sm btn-primary"> Tambah ke Keranjang</div>') ?>
                    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>