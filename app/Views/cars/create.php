<?= $this->extend('Layout/template'); ?>
<?= $this->section('content'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Input New Cars</h1>

            <form method="post" action="/car/store" enctype="multipart/form-data">


                <div class="row mb-3">
                    <label for="name" class="col-sm-2 form-label">Name:</label>
                    <div class="col-sm-5">
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="type" class="col-sm-2 form-label">Tipe</label>
                    <div class="col-sm-5">
                        <input type="type" name="type" id="type" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="picture" class="col-sm-2 form-label">Image</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="file" id="picture" name="picture" required>

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-2 form-label">Description</label>
                    <div class="col-sm-5">
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-sm-2 form-label">Price</label>
                    <div class="col-sm-5">
                        <input type="number" name="price" id="price" class="form-control" required oninput="formatCurrency(this)">
                        <div id="currency-display" class="form-control" style="border: none; pointer-events: none;"></div>
                    </div>
                    <div class="col-sm-5">
                    </div>
                </div>

                <script>
                    function formatCurrency(input) {
                        const price = input.value;
                        const formattedPrice = new Intl.NumberFormat('id-ID', {
                            style: 'currency',
                            currency: 'IDR'
                        }).format(price);
                        document.getElementById('currency-display').innerText = formattedPrice;
                    }
                </script>



                <button type="submit" class="btn btn-primary">Add Cars</button>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>