<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Add New Customer</h1>

            <form method="post" action="/customer/store">


                <div class="row mb-3">
                    <label for="name" class="col-sm-2 form-label">Name:</label>
                    <div class="col-sm-5">
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                </div>




                <div class="row mb-3">
                    <label for="phone_number" class="col-sm-2 form-label">Phone Number:</label>
                    <div class="col-sm-5">
                        <input type="text" name="phone_number" id="phone_number" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-2 form-label">Email:</label>
                    <div class="col-sm-5">
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-sm-2 form-label">Address:</label>
                    <div class="col-sm-5">
                        <textarea name="address" id="address" class="form-control" required></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>