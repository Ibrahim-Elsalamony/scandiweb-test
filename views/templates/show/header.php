<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/assets/css/normalize.css" />
    <link rel="stylesheet" href="/assets/css/styles.css" />
    <!-- My icon -->
    <link rel="icon" type="image/png" href="/assets/img/goal_4594166.png" />
    <title>Product List</title>
    <!-- Include Vue.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <!-- Include Vue components -->
    <script src="/assets/js/components/ProductItem.js"></script>
    <script src="/assets/js/components/ProductList.js"></script>
    <!-- Include main Vue app script -->
    <script src="/assets/js/vue-app.js"></script>
</head>

<body>

    <header>
        <div class="nav-bar">
            <div class="slider"></div>
            <div class="container">
                <div class="header-content">
                    <h2>Product List</h2>
                    <ul>
                        <li class="button">
                            <a href="/add">Add</a>
                        </li>
                        <li class="button" id="delete-product">Mass Delete</li>
                    </ul>
                </div>
                <hr />
            </div>
        </div>
    </header>