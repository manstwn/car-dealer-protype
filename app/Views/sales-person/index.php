<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <br>
    <div class="d-flex justify-content-center">
        <h1>Sales Person List</h1>
    </div>


    <div class="d-flex justify-content-between">
        <a class="btn btn-success" href="/sales-person/create">Add New Sales Person</a>
        <form action="/sales-person/find" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by name" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit">Search</button>
                    <a class="btn btn-info ml-2" href="/sales-person" role="button">Reset</a>
                </div>
            </div>
        </form>
    </div>

    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($agents as $index => $customer) : ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= $customer['name']; ?></td>
                    <td><?= $customer['phone_number']; ?></td>
                    <td><?= $customer['email']; ?></td>
                    <td>
                        <a href="/sales-person/edit/<?= $customer['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="/sales-person/delete/<?= $customer['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>