<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $aktif; ?></h1>

    <div class="row">

        <div class="col-lg-10">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message') ?>
            <a href="" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#SubmenuModal">Tambah Sub Menu</a>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tittle</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Aktif</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($submenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['tittle']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td><?= $sm['is_active']; ?></td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#editsub<?= $sm['id'] ?>" class="badge badge-info">edit</a>
                                <!-- Modal Edit-->
                                <div class="modal fade" id="editsub<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editsubLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editLabel">Edit Submenu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="<?= base_url('menu/editsub'); ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="tittle" name="tittle" value="<?= $sm['tittle'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <select name="menu_id" id="menu_id" class="form-control">
                                                            <option value="<?= $sm['menu_id'] ?>" selected><?= $sm['menu']; ?> </option>
                                                            <?php foreach ($menu as $m) : ?>
                                                                <option value="<?= $m['id'] ?>"><?= $m['menu']; ?> </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="hidden" id="id" name="id" value="<?= $sm['id'] ?>">
                                                        <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <input class=" form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                                            <label class="form-check-label" for="is_active">
                                                                Aktif?
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Keluar</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hapus-->
                                <a class="badge badge-danger" onclick="javascript: return confirm ('Anda yakin ingin menghapus ?')" href="<?= base_url('menu/hapus_sub/' . $sm['id']) ?>">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="SubmenuModal" tabindex="-1" role="dialog" aria-labelledby="SubmenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="SubmenuModalLabel">Tambah Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Submenu tittle">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <?php foreach ($menu as $m) : ?>

                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                        <label class="form-check-label" for="is_active">
                            Aktif?
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>