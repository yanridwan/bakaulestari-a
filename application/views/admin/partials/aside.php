<!-- Brand Logo -->
<a href="<?= site_url('Admin/home')?>" class="brand-link text-center">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/admin/')?>dist/img/admin.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= site_url('Admin/home')?>" class="d-block">Administrator</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= site_url('Admin/home')?>" class="nav-link <?php if($this->uri->segment(2) == "home"){
					echo "active";
				} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('Admin/user')?>" class="nav-link <?php if($this->uri->segment(2) == "user"){
					echo "active";
				} ?>">
              <i class="nav-icon far fa-solid fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2) == "agenda"){
              echo "menu-open";
            } elseif ($this->uri->segment(2) == "agendaTerjadwal"){
              echo "menu-open";
            } elseif ($this->uri->segment(2) == "agendaTerlaksana"){
              echo "menu-open";
            }?>">
            <a href="#" class="nav-link <?php if($this->uri->segment(2) == "agenda"){
              echo "active";
            } elseif ($this->uri->segment(2) == "agendaTerjadwal") {
              echo "active";
            } elseif ($this->uri->segment(2) == "agendaTerlaksana") {
              echo "active";
            } ?>">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Agenda
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('admin/agenda') ?>" class="nav-link <?php if($this->uri->segment(2) == "agenda"){
                                                                              echo "active";
                                                                            } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('admin/agendaTerlaksana') ?>" class="nav-link <?php if($this->uri->segment(2) == "agendaTerlaksana"){
                                                                              echo "active";
                                                                            } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terlaksana</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('admin/agendaTerjadwal') ?>" class="nav-link <?php if($this->uri->segment(2) == "agendaTerjadwal"){
                                                                              echo "active";
                                                                            } ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terjadwal</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('Admin/gallery')?>" class="nav-link <?php if($this->uri->segment(2) == "gallery"){
					echo "active";
				} ?>">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('Admin/order')?>" class="nav-link <?php if($this->uri->segment(2) == "order"){
					echo "active";
				} ?>">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Order Customer
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->