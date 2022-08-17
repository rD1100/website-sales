<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $aktif; ?> </h1>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
        
                <div align ="center">
                <a  href="<?= base_url('admin/editprofile'); ?>" class="btn btn-light btn-icon-split">
                   
                    <span class="text">Edit profile</span>
                  </a>
                  </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-title">Nama : <?= $user['nama']; ?></p>
                    <p class="card-text">Email : <?= $user['email']; ?></p>

                

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->