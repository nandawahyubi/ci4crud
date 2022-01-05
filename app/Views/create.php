<?= $this->extend('template/index'); ?>

<?= $this->section('content'); ?>
<div class="card">
    <div class="card-header bg-info bg-gradient bg-opacity-75 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Data</h5>
        <a href="/" class="btn btn-success"><i class="fas fa-chevron-left"></i> Back</a>
    </div>
    <div class="card-body">
        <form action="/home" method="post" autocomplete="off">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No Handphone</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <button type="submit" class="btn btn-primary">Save <i class="fas fa-paper-plane"></i></button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>