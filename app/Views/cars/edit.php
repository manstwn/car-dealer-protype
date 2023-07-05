<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Edit Cars Data</h1>
            <form method="post" action="/car/update/<?= $car['id']; ?>" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="name" class="form-label col-sm-2">Name</label>
                    <div class="col-sm-5">
                        <input type="text" name="name" id="name" value="<?= $car['name']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="type" class="form-label col-sm-2">Type</label>
                    <div class="col-sm-5">
                        <input type="type" name="type" id="type" value="<?= $car['type']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 form-label">Description</label>
                    <div class="col-sm-5">
                        <textarea name="description" id="description" class="form-control" required><?= $car['description']; ?></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="form-label col-sm-2">Price</label>
                    <div class="col-sm-5">
                        <input type="type" name="price" id="price" value="<?= $car['price']; ?>" class="form-control" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Cars</button>
            </form>


        </div>
    </div>
</div>

<?= $this->endSection(); ?>