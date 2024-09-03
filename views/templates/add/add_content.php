<div class="content">

    <div class="container">
        <div class="add-product" id="product_form">
            <form id="productForm" action="/endpoints/save_product.php" method="POST">
                <div class="fixed-input">
                    <div class="fill">
                        <label for="sku">SKU:</label>
                        <input
                            type="text"
                            id="sku"
                            placeholder="SKU"
                            name="sku"
                            required />
                    </div>
                </div>

                <div class="fixed-input">
                    <div class="fill">
                        <label for="name">Name:</label>
                        <input
                            type="text"
                            id="name"
                            placeholder="Name"
                            name="name"
                            required />
                    </div>
                </div>

                <div class="fixed-input">
                    <div class="fill">
                        <label for="price">Price ($):</label>
                        <input
                            type="number"
                            id="price"
                            placeholder="Price ($)"
                            name="price"
                            required />
                    </div>
                </div>

                <div class="switcher">
                    <div>
                        <label for="type">Product Type:</label>
                        <select id="productType" name="product_type" required>
                            <option value="">Select Product Type</option>
                            <option value="DVD">DVD</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Book">Book</option>
                        </select>
                    </div>

                    <div id="dvdSection" class="productSection">
                        <div class="result">
                            <div class="fill">
                                <label for="size">Size (MB):</label>
                                <input type="number" id="size" name="size" placeholder="Size (MB)" />
                            </div>
                        </div>
                    </div>

                    <div id="furnitureSection" class="productSection">
                        <div class="result">
                            <div class="fill">
                                <label for="height">Height (CM):</label>
                                <input type="number" id="height" name="height" placeholder="Height (CM)" />
                            </div>
                            <div class="fill">
                                <label for="width">Width (CM):</label>
                                <input type="number" id="width" name="width" placeholder="Width (CM)" />
                            </div>
                            <div class="fill">
                                <label for="length">Length (CM):</label>
                                <input type="number" id="length" name="length" placeholder="Length (CM)" />
                            </div>
                        </div>
                    </div>

                    <div id="bookSection" class="productSection">
                        <div class="result">
                            <div class="fill">
                                <label for="weight">Weight (KG):</label>
                                <input type="number" id="weight" name="weight" placeholder="Weight (KG)" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>