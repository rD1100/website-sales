<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $aktif; ?> </h1>
    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-bordered table-stiped table-hover">
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Sub Total</th>

                </tr>

                <?php
                $no = 1;
                foreach ($this->cart->contents() as $items) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $items['name']; ?></td>
                        <td><?= $items['qty']; ?></td>
                        <td>Rp. <?= number_format($items['price'], 0, ',', '.'); ?></td>
                        <td>Rp. <?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
                        
                            </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4"></td>
                    <td>Rp. <?= number_format($this->cart->total(), 0, ',', '.') ?></td>
                </tr>
            </table>
            <div align="right">
                <a href="<?= base_url('user/pembayaran'); ?>">
                    <div class="btn btn-sm btn-success mb-3">Pembayaran</div>
                </a>
                <a href="<?= base_url('user/hapus_keranjang'); ?>">
                    <div class="btn btn-sm btn-danger mb-3"><i class="fas fa-trash "></i></div>
                </a>
                <a href="<?= base_url('user/index'); ?>">
                    <div class="btn btn-sm btn-primary mb-3"><i class="fas fa-arrow-circle-left"></i></div>
                </a>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->