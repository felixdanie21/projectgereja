<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-12 text-center">
            <h1 class="font-weight-bold"><?= $midenpt->ptnama ?></h1>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($mmodul as $modul) : ?>
                    <div class="col-12 d-none d-xl-block d-lg-block">
                        <a href="<?= base_url() . $modul['kontroler'] ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-modul"><i class="<?= $modul['icon'] ?>"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text font-weight-bold text-dark"><?= $modul['namamodul'] ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->