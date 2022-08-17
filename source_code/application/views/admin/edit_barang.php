<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $aktif; ?> </h1>
    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message') ?>
            <div class="container-fluid">
                <h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>

                <?php foreach ($barang as $brg) : ?>

                    <form method="post" action="<?= base_url('admin/update'); ?>">
                        <div class="for-group">
                            <input type="hidden" name="id_barang" id="id_barang" class="form-control " placeholder="Id Barang" value="<?= $brg->id_barang ?>">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control " placeholder="Nama Barang " value="<?= $brg->nama_barang ?>">
                        </div>
                       
                        <div class="for-group">
                            <label>Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control " placeholder="Harga" value="<?= $brg->harga ?>">
                        </div>
                        <div class="for-group">
                            <label>Stok</label>
                            <input type="text" name="stok" id="stok" class="form-control " placeholder="Stok" value="<?= $brg->stok ?>">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->