<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">

    <!-- Display the create transaction form -->
    <h2>Create Transaction</h2>

    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger"><?= session('error') ?></div>
    <?php endif; ?>

    <form method="post" action="/transaction/store" class="my-4">


        <div class="row mb-3">
            <label for="customer_id" class="col-sm-2 form-label">Customer:</label>
            <div class="col-sm-5">
                <select name="customer_id" id="customer_id" class="form-select" required>
                    <option value="" disabled selected>Select a customer</option> <!-- Placeholder option -->
                    <?php foreach ($customers as $customer) : ?>
                        <option value="<?= $customer['name'] ?>"><?= $customer['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="car_id" class="col-sm-2 form-label">Car:</label>
            <div class="col-sm-5">
                <select name="car_id" id="car_id" class="form-select" required>
                    <option value="" disabled selected>Select a car</option> <!-- Placeholder option -->
                    <?php foreach ($cars as $car) : ?>
                        <option value="<?= $car['name'] ?>" data-price="<?= $car['price'] ?>"><?= $car['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="salesperson_id" class="col-sm-2 form-label">Salesperson:</label>
            <div class="col-sm-5">
                <select name="salesperson_id" id="salesperson_id" class="form-select" required>
                    <option value="" disabled selected>Select a salesperson</option> <!-- Placeholder option -->
                    <?php foreach ($salespersons as $salesperson) : ?>
                        <option value="<?= $salesperson['name'] ?>"><?= $salesperson['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-sm-2 form-label">Price:</label>
            <div class="col-sm-5">
                <input type="text" name="price" id="price" class="form-control" readonly>
            </div>
        </div>
        <div id="priceInIDR" class="row mb-3">
            <label for="priceIDR" class="col-sm-2 form-label"></label>
            <div class="col-sm-5">
                <input type="text" id="priceIDR" class="form-control" readonly>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create Transaction</button>
        <a class="btn btn-warning" href="/transaction">Back to Transaction List</a>


    </form>

    <script>
        // Get the customer selection element
        var customerSelect = document.getElementById('customer_id');

        // Get the car selection element
        var carSelect = document.getElementById('car_id');

        // Get the salesperson selection element
        var salespersonSelect = document.getElementById('salesperson_id');

        // Get the price input element
        var priceInput = document.getElementById('price');

        // Get the price in Indonesian currency element
        var priceIDRInput = document.getElementById('priceIDR');

        // Add event listener to the car selection
        carSelect.addEventListener('change', function() {
            // Get the selected car option
            var selectedCarOption = carSelect.options[carSelect.selectedIndex];

            // Get the price from the selected car option's data attribute
            var price = selectedCarOption.getAttribute('data-price');

            // Update the price input value
            priceInput.value = price;

            // Convert the price to Indonesian currency format
            var priceIDR = formatPriceToIDR(price);

            // Update the price in Indonesian currency input value
            priceIDRInput.value = priceIDR;
        });

        // Set the initial price based on the default selected car
        var defaultCarOption = carSelect.options[carSelect.selectedIndex];
        var defaultPrice = defaultCarOption.getAttribute('data-price');
        priceInput.value = defaultPrice;

        // Convert the price to Indonesian currency format
        var defaultPriceIDR = formatPriceToIDR(defaultPrice);

        // Set the initial price in Indonesian currency
        priceIDRInput.value = defaultPriceIDR;

        // Function to format price to Indonesian currency format
        function formatPriceToIDR(price) {
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            });
            return formatter.format(price);
        }
    </script>









</div>

<?= $this->endSection(); ?>