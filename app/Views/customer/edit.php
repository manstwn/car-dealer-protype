<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Edit Customers</h1>
            <form method="post" action="/customer/update/<?= $customer['id']; ?>">
                <div class="row mb-3">
                    <label for="name" class="form-label col-sm-2">Name:</label>
                    <div class="col-sm-5">
                    <input type="text" name="name" id="name" value="<?= $customer['name']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="phone_number" class="form-label col-sm-2">Phone Number:</label>
                    <div class="col-sm-5">
                    <input type="text" name="phone_number" id="phone_number" value="<?= $customer['phone_number']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="form-label col-sm-2">Email:</label>
                    <div class="col-sm-5">
                    <input type="email" name="email" id="email" value="<?= $customer['email']; ?>" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="form-label col-sm-2">Address:</label>
                    <div class="col-sm-5">
                    <textarea name="address" id="address" class="form-control" required><?= $customer['address']; ?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Customer</button>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>