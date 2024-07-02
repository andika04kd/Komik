<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Comic Detail</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $comic['cover']; ?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $comic['title']; ?></h5>
                            <p class="card-text">Author: <?= $comic['author']; ?></p>
                            <p class="card-text">Publisher: <?= $comic['publisher']; ?></p>
                            <p class="card-text"><small class="text-body-secondary">Last updated: <?= date('Y-m-d H:i:s', strtotime($comic['updated_at']) + 7 * 60 * 60); ?></small></p>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="/pages/comics" class="btn btn-success">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>