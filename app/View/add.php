<div class="container py-5">
    <h1 class="text-center fw-bold display-4"><?= $model["title"] ?? "" ?></h1>

    <form class="mt-5" method="post" action="/add">
        <?php if (isset($model["error"])) { ?>
            <div class="row justify-content-center">
                <div class="alert alert-danger col-6 text-center" role="alert">
                    <?= $model["error"] ?>
                </div>
            </div>
        <?php } ?>

        <div class="row justify-content-center">
            <div class="col-xl-4 col-8 col-md-6 col-lg-5">
                <div class="form-floating mb-3">
                    <input name="book" type="text" class="form-control" id="floatingInput" placeholder="name">
                    <label for="floatingInput">Book Title</label>
                </div>
                <button type="submit" class="btn btn-primary">Add New Book</button>
            </div>
        </div>
    </form>
</div>