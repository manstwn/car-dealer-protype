<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <br>
    <div class="d-flex justify-content-center">
        <h1>Transaction</h1>
    </div>

    <!-- Display the transaction list -->

    <div class="d-flex justify-content-between">
        <a class="btn btn-success" href="/transaction/create">Create New Transaction</a>
        <form action="/transaction/find" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search by name" name="keyword">
                <div class="input-group-append">
                    <button class="btn btn-info" type="submit">Search</button>
                    <a class="btn btn-info" href="/transaction" role="button">Reset</a>
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
                <th>ID</th>
                <th>Customer</th>
                <th>Car</th>
                <th>Salesperson</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $counter = 1;
            foreach ($transactions as $transaction) : ?>
                <tr>
                    <td><?= $counter++ ?></td>
                    <td><?= $transaction['id'] ?></td>
                    <td><?= $transaction['customer_id'] ?></td>
                    <td><?= $transaction['car_id'] ?></td>
                    <td><?= $transaction['salesperson_id'] ?></td>
                    <td style="white-space: nowrap;">Rp <?= number_format($transaction['price'], 0, ',', '.'); ?></td>
                    <td style="white-space: nowrap;"><?= date('Y-m-d', strtotime($transaction['created_at'])) ?></td>
                    <td style="white-space: nowrap;"><?= date('Y-m-d', strtotime($transaction['updated_at'])) ?></td>
                    <td style="white-space: nowrap;">
                        <a href="/transaction/edit/<?= $transaction['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="/transaction/delete/<?= $transaction['id'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</div>
<?= $this->endSection(); ?>