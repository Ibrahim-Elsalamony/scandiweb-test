<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/normalize.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <title>Document</title>
</head>

<body>
    <!-- start header -->
    <header>
        <div class="nav-bar">
            <div class="slider"></div>
            <div class="container">
                <div class="header-content">
                    <h2>Product Add</h2>
                    <ul>
                        <li class="button" id="">Save</li>
                        <li class="button">
                            <a href="index.php">Cancel</a>
                        </li>
                    </ul>
                </div>
                <hr />
            </div>
        </div>
    </header>
    <!-- end header -->
    <!-- start content -->
    <div class="content">
        <div class="container">
            <div class="add-product">
                <!-- start form -->
                <form action="" id="product_form">
                    <!-- fixed input -->
                    <div>
                        <div class="fixed-input">
                            <div class="fill">
                                <label for="">SKU</label>
                                <input type="text" id="sku" placeholder="SKU" required />
                            </div>
                            <div class="fill">
                                <label for="">Name</label>
                                <input type="text" id="name" placeholder="Name" required />
                            </div>
                            <div class="fill">
                                <label for="">Price ($)</label>
                                <input
                                    type="text"
                                    id="price"
                                    placeholder="Price ($)"
                                    required />
                            </div>
                        </div>
                        <!-- Product type switcher -->
                        <div class="switcher" id="productType">
                            <label for="basic-dropdown">Type Switcher:</label>
                            <select id="basic-dropdown">
                                <option value="option0">Select Product Type</option>
                                <option value="option1">DVD</option>
                                <option value="option2">Furniture</option>
                                <option value="option3">Book</option>
                            </select>
                        </div>
                        <!-- Product type switcher result -->
                        <div id="ProductType">
                            <!-- star DVD -->
                            <div class="result" id="DVD">
                                <div class="fill">
                                    <label for="">Size (MB)</label>
                                    <input type="text" placeholder="Size (MB)" required />
                                </div>
                                <p>*Product Description*</p>
                            </div>
                            <!-- star Furniture -->
                            <div class="result" id="Furniture">
                                <div class="fill">
                                    <label for="">Height (CM)</label>
                                    <input type="text" placeholder="Height (CM)" required />
                                </div>
                                <div class="fill">
                                    <label for="">Width (CM)</label>
                                    <input type="text" placeholder="Width (CM)" required />
                                </div>
                                <div class="fill">
                                    <label for="">Length (CM)</label>
                                    <input type="text" placeholder="Length (CM)" required />
                                </div>
                                <p>*Product Description*</p>
                            </div>
                            <!-- start Book -->
                            <div class="result" id="Book">
                                <div class="fill">
                                    <label for="">Weight (KG)</label>
                                    <input type="text" placeholder="Weight (KG)" required />
                                </div>
                                <p>*Product Description*</p>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- end form -->
            </div>
        </div>
        <!-- end content -->
    </div>
    <!-- start footer -->
    <footer>
        <div class="container">
            <hr />
            <div class="footer-content">Scandiweb Test Assignment</div>
        </div>
    </footer>
    <!-- end footer -->
</body>

</html>