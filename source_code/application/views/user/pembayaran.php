<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $aktif; ?> </h1>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="btn btn-sm btn-info">
                <?php
                $grand_total = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $item) {
                        $grand_total = $grand_total + $item['subtotal'];
                    }
                    echo "<h3> Total belanja Anda: Rp. " . number_format($grand_total, 0, ',', '.');
                ?>
            </div><br><br>
            <h3>Input Alamat Pengiriman dan Pembayaran</h3>
            <form method="post" action="<?= base_url('user/proses_pesanan'); ?>">
            <div class="form-group">
                    <label>Nama lengkap</label>
                    <input type="text" name="nama" id="nama" placeholder="Nama Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>Alamat Lengkap</label>
                    <input type="text" name="alamat" id="alamat" placeholder="Alamat Lengkap Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" placeholder="Nomor Telpon Anda" class="form-control">
                </div>
                <div class="form-group">
                    <label>Jasa Pengiriman</label>
                    <select class="form-control">
                        <option>JNE</option>
                        <option>TIKI</option>
                        <option>POS Indonesia</option>
                        <option>Sicepat</option>
                        <option>J&T</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pilih BANK</label>
                    <select class="form-control">
                        <option>BCA - 6542133445</option>
                        <option>BNI - 0263745663</option>
                        <option>BRI - 0987665544</option>
                        <option>Mandiri - 08776352</option>
                        <option>Bank BPD DIY - 099837333</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Pesan</button>
            </form>
        <?php
                } else {
                    echo "<h3>keranjang Belanja anda masih kosong";
                }
        ?>
        </div>
        <div class="col-md-2"></div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->