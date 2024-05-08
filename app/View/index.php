<div class="container py-5">
    <h1 class="text-center fw-bold display-4"><?= $model["title"] ?? "" ?></h1>

    <div class="container py-3">
        <div class="row text-center">
            <div class="col-12 pb-5">
                <a type="button" class="btn btn-outline-success" href="/add">Add New Booklist</a>
            </div>
            <?php if (isset($model['booklist'])) {
                foreach ($model['booklist'] as $row) { ?>
                    <div class="col-xl-4 col-md-6 col-12 p-2">
                        <div class="card mb-1">
                            <div class="card-body">
                                <?= $row['book'] ?>.
                                <a href="#" class="text-danger text-decoration-none">Delete</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>