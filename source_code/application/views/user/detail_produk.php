<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card">
        <h5 class="card-header"><?= $aktif; ?></h5>
        <div class="card-body">

            <?php foreach ($barang as $brg) : ?>
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <img src="<?= base_url('/uploads/' . $brg->gambar); ?>" class="card-img-top">
                    </div>
                    <div class="col-md-7 mt-5">
                        <table class="table">
                            <tr>
                                <td>Nama Produk</td>
                                <td><strong><?= $brg->nama_barang; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><strong><?= $brg->keterangan; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><strong><?= $brg->kategori; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><strong><?= $brg->stok; ?></strong></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><strong>
                                        <div class="btn btn-sm btn-danger">Rp. <?= number_format($brg->harga, 0, ',', '.'); ?></div>
                                    </strong></td>
                            </tr>

                        </table>
                        <br>
                        <?php echo anchor('user/tambah_keranjang/' . $brg->id_barang, '<div class="btn btn-sm btn-primary">Tambah ke Trolley</div>') ?>
                        <?php echo anchor('user/index', '<div class="btn btn-sm btn-dark">Kembali</div>') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->