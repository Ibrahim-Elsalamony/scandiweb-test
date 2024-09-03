C:\xampp\htdocs\scandiweb-test
├── assets
│ ├── css
│ │ └── styles.css
│ └── js
│ ├── components
│ │ ├──AddProductForm.js
│ │ ├──ProductItem.js
│ │ └──ProductList.js
│ └── vue-app.js
│  
├── classes
│ ├── Book.php
│ ├── Controller.php
│ ├── Database.php
│ ├── DVD.php
│ ├── Furniture.php
│ ├── Product.php
│ ├── ProductFactory.php
│ └── Router.php
│
├── config
│ ├── config.php
│ └── routes.php
│
├── endpoints
│ ├── delete_products.php
│ ├── fetch_products.php
│ └── save_product.php
│
├── views
│ ├── templates
│ │ ├── add
│ │ │ ├── add_content.php
│ │ │ ├── footer.php
│ │ │ └── header.php
│ │ └── show
│ │ ├── add_content.php
│ │ ├── footer.php
│ │ └── header.php
│ │
│ ├── add.php
│ ├── show.php
│ └── 404.php
│
├── index.php
└── .htaccess

<VirtualHost \*:80>
DocumentRoot "C:/xampp/htdocs/scandiweb-test"
ServerName scandiweb-test.ibrahim
<Directory "C:/xampp/htdocs/scandiweb-test">
AllowOverride All
Require local
</Directory>

    # Alias for the assets directory
    Alias /assets "C:/xampp/htdocs/scandiweb-test/assets"
    <Directory "C:/xampp/htdocs/scandiweb-test/assets">
        AllowOverride All
        Require local
    </Directory>

</VirtualHost>

## Database Setup

1. **Create a Database:**

   - Open phpMyAdmin or a MySQL client.
   - Create a new database named `scandiweb-test`.

2. **Import the SQL File:**

   - Go to the **Import** tab in phpMyAdmin.
   - Choose the `database/scandiweb-test.sql` file and click **Go**.

3. **Update Configuration:**
   - Update the database connection settings in your PHP configuration file (`config.php`, `database.php`, etc.) to match your local database settings.
