<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Edit Sales Person</h1>
            <form method="post" action="/sales-person/update/<?= $salesperson['id']; ?>">

                
                <div class="row mb-3">
                    <label for="name" class="form-label col-sm-2">Name:</label>
                    <div class="col-sm-5">
                    <input type="text" name="name" id="name" value="<?= $salesperson['name']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone_number" class="form-label col-sm-2">Phone Number:</label>
                    <div class="col-sm-5">
                    <input type="text" name="phone_number" id="phone_number" value="<?= $salesperson['phone_number']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="form-label col-sm-2">Email:</label>
                    <div class="col-sm-5">
                    <input type="email" name="email" id="email" value="<?= $salesperson['email']; ?>" class="form-control" required>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Update sales person</button>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>