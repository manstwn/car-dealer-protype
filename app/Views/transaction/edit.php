<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">

    <!-- Display the edit transaction form -->
    <h2>Edit Transaction</h2>
    <br>
    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger"><?= session('error') ?></div>
    <?php endif; ?>

    <form method="post" action="/transaction/update/<?= $transaction['id'] ?>">

        <div class="row mb-3">
            <label for="id" class="form-label col-sm-2">Transaction ID:</label>
            <div class="col-sm-5">
                <input type="text" name="id" id="id" value="<?= $transaction['id'] ?>" readonly class="form-control">
            </div>
        </div>



        <div class="row mb-3">
            <label for="customer_id" class="form-label col-sm-2">Customer:</label>
            <div class="col-sm-5">
                <select name="customer_id" id="customer_id" class="form-select">
                    <?php foreach ($customers as $customer) : ?>
                        <option value="<?= $customer['name'] ?>" <?= ($customer['id'] == $transaction['customer_id']) ? 'selected' : '' ?>>
                            <?= $customer['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="car_id" class="form-label col-sm-2">Car:</label>
            <div class="col-sm-5">
                <select name="car_id" id="car_id" class="form-select">
                    <?php foreach ($cars as $car) : ?>
                        <option value="<?= $car['name'] ?>" data-price="<?= $car['price'] ?>" <?= ($car['id'] == $transaction['car_id']) ? 'selected' : '' ?>>
                            <?= $car['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="salesperson_id" class="form-label col-sm-2">Salesperson:</label>
            <div class="col-sm-5">
                <select name="salesperson_id" id="salesperson_id" class="form-select">
                    <?php foreach ($salespersons as $salesperson) : ?>
                        <option value="<?= $salesperson['name'] ?>" <?= ($salesperson['id'] == $transaction['salesperson_id']) ? 'selected' : '' ?>>
                            <?= $salesperson['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="form-label col-sm-2">Price:</label>
            <div class="col-sm-5">
                <input type="text" name="price" id="price" value="<?= $transaction['price'] ?>" readonly class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Transaction</button>
        <a class="btn btn-warning" href="/transaction">Cancel</a>
    </form>

    <script>
        // Get the car select element
        const carSelect = document.getElementById('car_id');
        // Get the price input element
        const priceInput = document.getElementById('price');

        // Function to update the price based on the selected car
        function updatePrice() {
            // Get the selected car option
            const selectedCar = carSelect.options[carSelect.selectedIndex];
            // Get the price value from the selected car option's data attribute
            const carPrice = selectedCar.dataset.price;
            // Set the price input value to the selected car's price
            priceInput.value = carPrice;
        }

        // Add event listener to the car select element
        carSelect.addEventListener('change', updatePrice);

        // Call the updatePrice function initially to set the initial price
        updatePrice();
    </script>
    <br>

</div>

<?= $this->endSection(); ?>