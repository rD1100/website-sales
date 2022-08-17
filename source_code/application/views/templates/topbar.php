        <!-- Content Wrapper -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    

          <!-- Topbar Search -->
          <form action= "<?php echo base_url('user/hasil')?>" action="GET" method="get" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" name="cari" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button value="cari" class="btn btn-primary" type="button">
                <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
          
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                    .
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle"    id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-shopping-cart"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter" > 
                <?=
                $keranjang=$this->cart->total_items();
                    ?></span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h8 class="dropdown-header">
                  keranjang 
                </h8>
                <a class="dropdown-item d-flex align-items-center" href="#">
                
                    
                 
                <div>
                  <?php foreach ($this->cart->contents() as $items) : ?>
                    <div >
                   
                    </div>
                    <span class="font-weight-bold"><?= $items['name']; ?> 
                      Rp. <?= number_format($items['subtotal'], 0, ',', '.'); ?></span>
                    <div class="small text-gray-500"> <?= $items['qty']; ?> Barang</div>
                  <?php endforeach; ?>
                </div>
               </a>
                
                   
              <a class="dropdown-item text-center small text-gray-500" 
              href="<?= base_url('user/detail_keranjang'); ?>"
             >
               Detail pesanan</a>
              </div>
            </li>


                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('user/myProfile'); ?>">
                                    <i class="fas fa-user-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    My Profile
                                </a>
                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->