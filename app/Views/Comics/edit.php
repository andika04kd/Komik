<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Edit Comic</h2>
            <form action="/comics/update/<?= $comic['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $comic['slug']; ?>">
                <input type="hidden" name="oldCover" value="<?= $comic['cover']; ?>">

                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (isset($validation) && $validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?= (old('title')) ? old('title') : $comic['title'] ?>" autofocus>
                        <?php if (isset($validation) && $validation->hasError('title')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('title'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (isset($validation) && $validation->hasError('author')) ? 'is-invalid' : ''; ?>" id="author" name="author" value="<?= (old('author')) ? old('author') : $comic['author'] ?>">
                        <?php if (isset($validation) && $validation->hasError('author')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('author'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= (isset($validation) && $validation->hasError('publisher')) ? 'is-invalid' : ''; ?>" id="publisher" name="publisher" value="<?= (old('publisher')) ? old('publisher') : $comic['publisher'] ?>">
                        <?php if (isset($validation) && $validation->hasError('publisher')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('publisher'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="cover" class="form-label">Upload Cover</label>
                    <input class="form-control" <?= ($validation->hasError('cover')) ? 'is-invalid' : ''; ?> type="file" id="cover" name="cover">
                    <div class="col-sm-4 mt-2">
                        <img src="/img/<?= $comic['cover']; ?>" class="img-thumbnail img-preview">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Edit Comic</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>