<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <br>
    <div class="d-flex justify-content-center">
        <h1>Cars List</h1>
    </div>


    <div class="d-flex justify-content-between">
        <a class="btn btn-success" href="/car/create">Add New Cars</a>
        <form action="/car/find" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by name" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit">Search</button>
                    <a class="btn btn-info" href="/car" role="button">Reset</a>
                </div>
            </div>
        </form>
    </div>

    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr class="text-center">
                <th>No</th>
                <th>Name</th>
                <th>Picture</th>
                <th>Type</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $index => $customer) : ?>
                <tr class="text-center">
                    <td tyle="white-space: nowrap;"><?= $index + 1; ?></td>
                    <td tyle="white-space: nowrap;"><?= $customer['name']; ?></td>
                    <td tyle="white-space: nowrap;">

                        <img class="img-fluid" src="/car_img/<?= $customer['picture']; ?>" alt="Car Picture" width="250px">

                    </td>
                    <td tyle="white-space: nowrap;"><?= $customer['type']; ?></td>
                    <td><?= $customer['description']; ?></td>

                    <td style="white-space: nowrap;">Rp <?= number_format($customer['price'], 0, ',', '.'); ?></td>


                    <td style="white-space: nowrap;">
                        <a href="/car/edit/<?= $customer['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="/car/delete/<?= $customer['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>