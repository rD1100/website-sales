<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $aktif; ?> </h1>
    <div class="row">
        <div class="col-lg-10">
            <?= $this->session->flashdata('message');  ?>
        </div>
    </div>
    <button class="btn btn-sm btn-primary mb-3 " data-toggle="modal" data-target="#tambah_barang">
    <i class="fas fa-plus fa-sm"></i> Tambah Barang</button>
    <!-- DataTales Example -->
    <div class="row">
        <div class="col-lg">
            <table class="table  table-bordered table-striped" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Keterangan</th>
                        <!-- <th scope="col">Kategori User</th> -->
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($barang as $brg) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $brg->nama_barang ?></td>
                            <td><?= $brg->keterangan ?></td>
                            <!-- <td><?= $brg->kriteria?></td> -->
                            <td><?= $brg->kategori ?></td>
                            <td><?= $brg->harga ?></td>
                            <td><?= $brg->stok ?></td>
                            <td><?= anchor('admin/edit/' . $brg->id_barang,
                             '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'); ?></td>
                            <td><?= anchor('admin/hapus/' . $brg->id_barang, 
                            '<div class="btn btn-danger btn-sm "><i class="fas fa-trash "></i></div>'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.container-fluid -->

        <!-- Modal -->
        <div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" 
         aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('Admin/tambah_aksi'); ?>" 
                        method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_barang" 
                                name="nama_barang" placeholder="Nama Barang" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="keterangan" 
                                name="keterangan" placeholder="Keterangan" required>
                            </div>

                            <!-- <div class="form-group">
                                <select class="form-control" name="kriteria" id="kriteria" required>
                                <option selected>Sebagai</option>
                                            <option>Reseller</option>
                                            <option >Pelatih</option>
                                            <option >Agen</option>
                                      </select>

                            </div> -->

                            <div class="form-group">
                                <select class="form-control" name="kategori" id="kategori" required>
                                    <option>Taekwondo</option>
                                    <option>Karate</option>
                                    <option>Judo</option>
                                    <option>Boxing</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar Produk</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->