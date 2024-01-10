<?= $this->extend('layouts/master') ?>
<?= $this->section('content') ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= current_url() ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-sync fa-sm text-white-50"></i> Reload Halaman</a>
    </div>
    <form action="<?= base_url('fibonacci/tampil') ?>" method="get">
        <label for="input">Input:</label>
        <input type="text" class="form-control" name="input" id="input" required>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!-- Content Row -->
    
    <?= $this->endSection() ?>