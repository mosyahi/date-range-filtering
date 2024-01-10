<?php if (session()->getFlashdata('error')) : ?>
<div class="alert alert-danger alert-fade" role="alert">
    <?= session()->getFlashdata('error') ?>
</div>
<script>
    setTimeout(function() {
        var errorAlert = document.querySelector('.alert-danger');
        errorAlert.classList.add('fade-out');
        setTimeout(function() {
            errorAlert.style.display = 'none';
        }, 500); 
    }, 5000); 
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('success')) : ?>
<div class="alert alert-success alert-fade" role="alert">
    <?= session()->getFlashdata('success') ?>
</div>
<script>
    setTimeout(function() {
        var successAlert = document.querySelector('.alert-success');
        successAlert.classList.add('fade-out');
        setTimeout(function() {
            successAlert.style.display = 'none';
        }, 500); 
    }, 5000); 
</script>
<?php endif; ?>

<?php if (session()->getFlashdata('warning')) : ?>
<div class="alert alert-warning alert-fade" role="alert">
    <?= session()->getFlashdata('warning') ?>
</div>
<script>
    setTimeout(function() {
        var successAlert = document.querySelector('.alert-warning');
        successAlert.classList.add('fade-out');
        setTimeout(function() {
            successAlert.style.display = 'none';
        }, 500); 
    }, 5000); 
</script>
<?php endif; ?>

<style>
    .alert-fade {
        transition: opacity 0.5s ease-out;
    }

    .fade-out {
        opacity: 0;
        transition: opacity 0.5s ease-out;
    }
</style>