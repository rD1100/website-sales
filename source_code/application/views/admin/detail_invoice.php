<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $aktif; ?>
        <div class="btn btn-sm btn-success">ID : <?= $invoice->id ?></div>
    </h1>
    <table class="table table-bordered table-hover table striped">
        <tr>
            <th>Id Barang</th>
            <th>Nama Produk</th>
            <th>Jumlah Pesanan</th>
            <th>Harga Satuan</th>
            <th>SubTotal</th>
        </tr>
        <?php
        $total = 0;
        foreach ($pesanan as $psn) :
            $subtotal = $psn->jumlah * $psn->harga;
            $total += $subtotal;
        ?>
            <tr>
                <td><?= $psn->id_barang ?></td>
                <td><?= $psn->nama_barang ?></td>
                <td><?= $psn->jumlah ?></td>
                <td>Rp. <?= number_format($psn->harga, 0, ',', '.') ?></td>
                <td>Rp.<?= number_format($subtotal, 0, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="4" align="right">Grand Total</td>
            <td>Rp. <?= number_format($total, 0, ',', '.') ?></td>
        </tr>
    </table>
    <a href="<?= base_url('admin/invoice') ?>">
        <div class="btn btn-sm btn-primary">Kembali</div>
    </a>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->