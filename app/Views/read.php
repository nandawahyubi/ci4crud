<?php $this->extend('template/index') ?>

<?php $this->section('content') ?>
<div class="card">
    <div class="card-header bg-info bg-gradient bg-opacity-75 d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Semua Data</h5>
        <a href="/home/create" class="btn btn-success">Tambah Data</a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show mt-4 mx-3" role="alert">
            <strong>Sukses !</strong> <?= session()->getFlashdata('success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show mt-4 mx-3" role="alert">
            <strong>Error !</strong> <?= session()->getFlashdata('error'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <div class="card-body">
        <table class="table table-striped table-hover table-responsive table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u => $value) : ?>
                    <tr>
                        <th><?= $u + 1; ?></th>
                        <td><?= $value->nama; ?></td>
                        <td><?= $value->email; ?></td>
                        <td><?= $value->no_hp; ?></td>
                        <td><?= $value->alamat; ?></td>
                        <td class="text-center">
                            <a href="/home/update/<?= $value->id; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                            <!-- <a href="/home/delete/<?= $value->id; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a> -->
                            <form action="/home/<?= $value->id; ?>" method="post" class="d-inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php $this->endSection() ?>