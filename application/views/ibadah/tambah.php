<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12 text-center">
                    <h2 class="font-weight-bold"><?= strtoupper($method) ?> IBADAH</h2>
                    <a href="<?= base_url() ?>Ibadah"><i class="fas fa-long-arrow-alt-left"></i> KEMBALI</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mx-auto">
                    <div class="card card-info">
                        <div class="card-header">
                        </div>
                        <form method="post" action="<?= base_url('Ibadah/simpan_liturgi/' . $method) ?>" enctype="multipart/form-data">
                            <input type="hidden" name="liturgiid" id="liturgiid">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="liturgijudul" class="font-weight-normal">Judul</label>
                                    <input class="form-control" type="text" name="liturgijudul" id="liturgijudul" placeholder="Masukkan Judul" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label for="liturgitgl" class="font-weight-normal">Tanggal</label>
                                    <input class="form-control" type="date" name="liturgitgl" id="liturgitgl">
                                </div>
                                <div class="form-group">
                                    <label for="liturgifile" class="font-weight-normal">File PDF</label>
                                    <input class="form-control" type="file" name="liturgifile" id="liturgifile" accept=".pdf">
                                </div>
                                <div id="previewfoto"></div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary float-right">Proses</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
const inputFile = document.getElementById('liturgifile');
const previewContainer = document.getElementById('previewfoto');

inputFile.addEventListener('change', function() {
    const file = inputFile.files[0];

    if (file && file.type === 'application/pdf') {
        const objectUrl = URL.createObjectURL(file);
        previewContainer.innerHTML = `<embed src="${objectUrl}" type="application/pdf" width="100%" height="600px" />`;
    } else {
        previewContainer.innerHTML = '<p>Please select a valid PDF file.</p>';
    }
}, false);

window.onload = function() {
    <?php if ($method == 'edit'): ?>
        edit_kondisi();
    <?php endif; ?>
}

<?php if ($method == 'edit'): ?>

function edit_kondisi() {
    var previewfoto = document.getElementById('previewfoto');
    var liturgiid = document.getElementById('liturgiid');
    var liturgifile = document.getElementById('liturgifile');
    var liturgitgl = document.getElementById('liturgitgl');
    var liturgijudul = document.getElementById('liturgijudul');  // Perbaikan typo

    liturgiid.value = '<?= $liturgi->liturgiid ?>';
    liturgifile.removeAttribute('required');
    liturgijudul.value = '<?= $liturgi->liturgijudul ?>';
    liturgitgl.value = '<?= $liturgi->liturgitgl ?>';

    // Tampilkan pratinjau PDF dari file yang sudah ada
    previewfoto.innerHTML = `<embed src="<?= base_url() ?>assets/pdf/<?= $liturgi->liturgifile ?>" type="application/pdf" width="100%" height="600px" />`;
}
<?php endif; ?>

</script>