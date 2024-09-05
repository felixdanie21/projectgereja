
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>Dashboard" class="brand-link">
      <img style="width:35px;height:45px;border-radius:50%" src="<?= base_url() ?>assets/dist/img/<?= $midenpt->ptlogo ?>" class="brand-image">
      <small class="brand-text font-weight-light"><?= $midenpt->ptnama ?></small>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>assets/dist/img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('username') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav style="font-size:12px;" class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php foreach ($mmenu as $menu) : ?>
              <?php if ($menu['levelmenu'] == '1') : ?>
                  <?php
                  $this->db->where('indukmenu', $menu['kodemenu']);
                  $submenu = $this->db->get('mmenu')->result_array();
                  ?>
                  <?php if ($submenu) : ?>
                      <?php
                      $submenu = $this->MenuModel->listsubmenu($menu['kodemenu']);
                      ?>
                      <li onclick="menuOpen('<?= $menu['kodemenu'] ?>')" id="<?= $menu['kodemenu'] ?>tree" class="nav-item">
                          <a id="<?= $menu['kodemenu'] ?>" href="<?= base_url() ?><?= $menu['kontroler'] ?>" class="nav-link">
                              <i id="<?= $menu['kodemenu'] ?>icon" class="nav-icon fas fa-folder"></i>
                              <p>
                                  <?= $menu['namamenu'] ?>
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <?php foreach ($submenu as $sm) : ?>
                                  <li class="nav-item ml-3">
                                      <a id="<?= $sm['kodemenu'] ?>" href="<?= base_url() ?><?= $sm['kontroler'] ?>" class="nav-link">
                                          <i class="nav-icon fas fa-file-alt"></i>
                                          <p> <?= $sm['namamenu'] ?></p>
                                      </a>
                                  </li>
                              <?php endforeach; ?>
                          </ul>
                      </li>
                  <?php else : ?>
                      <li class="nav-item">
                          <a id="<?= $menu['kodemenu'] ?>" href="<?= base_url() ?><?= $menu['kontroler'] ?>" class="nav-link">
                              <i class="nav-icon fas fa-file-alt"></i>
                              <p>
                                  <?= $menu['namamenu'] ?>
                              </p>
                          </a>
                      </li>
                  <?php endif; ?>
              <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>