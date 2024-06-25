<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <a href="/comics/create" class="btn btn-success mt-3" role="button">Add New Comics</a>
            <h1 class="mt-2">Comics List</h1>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/comics') ?>" method="get" class="mt-3 mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for comics..." name="keyword" value="<?= (isset($keyword)) ? $keyword : '' ?>">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>

            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($comic as $c) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><img src="/img/<?= esc($c['cover']); ?>" class="img-thumbnail" alt=""></td>
                        <td><?= esc($c['title']); ?></td>
                        <td>
                            <a class="btn btn-primary" href="/comics/<?= esc($c['slug']); ?>" role="button">Details</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('comic', 'title_pagination') ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

