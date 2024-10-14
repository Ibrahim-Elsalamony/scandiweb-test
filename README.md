<<<<<<< HEAD
C:\xampp\htdocs\scandiweb-test
├── assets
│ ├── css
│ │ └── styles.css
│ └── js
│ ├──delete-action.js
│ ├──main.js
│ └──submit-form.js
│  
├── classes
│ ├── Book.php
│ ├── Controller.php
│ ├── Database.php
│ ├── DVD.php
│ ├── Furniture.php
│ ├── Product.php
│ ├── ProductFactory.php
│ ├── ProductHandler.php
│ ├── Router.php
│ └── Validator.php
│
├── config
│ ├── autoload.php
│ ├── config.php
│ └── routes.php
│
├── endpoints
│ ├── check_unique_sku.php
│ ├── delete_products.php
│ └── save_product.php
│
├── views
│ ├── templates
│ │ ├── add
│ │ │ ├── add_content.php
│ │ │ ├── footer.php
│ │ │ └── header.php
│ │ └── product_list
│ │ │ ├── content.php
│ │ │ ├── footer.php
│ │ │ └── header.php
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
   - # Update the database connection settings in your PHP configuration file (`config.php`, `database.php`, etc.) to match your local database settings.
     **Edit a file, create a new file, and clone from Bitbucket in under 2 minutes**

When you're done, you can delete the content in this README and update the file with details for others getting started with your repository.

_We recommend that you open this README in another tab as you perform the tasks below. You can [watch our video](https://youtu.be/0ocf7u76WSo) for a full demo of all the steps in this tutorial. Open the video in a new tab to avoid leaving Bitbucket._

---

## Edit a file

You’ll start by editing this README file to learn how to edit a file in Bitbucket.

1. Click **Source** on the left side.
2. Click the README.md link from the list of files.
3. Click the **Edit** button.
4. Delete the following text: _Delete this line to make a change to the README from Bitbucket._
5. After making your change, click **Commit** and then **Commit** again in the dialog. The commit page will open and you’ll see the change you just made.
6. Go back to the **Source** page.

---

## Create a file

Next, you’ll add a new file to this repository.

1. Click the **New file** button at the top of the **Source** page.
2. Give the file a filename of **contributors.txt**.
3. Enter your name in the empty file space.
4. Click **Commit** and then **Commit** again in the dialog.
5. Go back to the **Source** page.

Before you move on, go ahead and explore the repository. You've already seen the **Source** page, but check out the **Commits**, **Branches**, and **Settings** pages.

---

## Clone a repository

Use these steps to clone from SourceTree, our client for using the repository command-line free. Cloning allows you to work on your files locally. If you don't yet have SourceTree, [download and install first](https://www.sourcetreeapp.com/). If you prefer to clone from the command line, see [Clone a repository](https://confluence.atlassian.com/x/4whODQ).

1. You’ll see the clone button under the **Source** heading. Click that button.
2. Now click **Check out in SourceTree**. You may need to create a SourceTree account or log in.
3. When you see the **Clone New** dialog in SourceTree, update the destination path and name if you’d like to and then click **Clone**.
4. Open the directory you just created to see your repository’s files.

Now that you're more familiar with your Bitbucket repository, go ahead and add a new file locally. You can [push your change back to Bitbucket with SourceTree](https://confluence.atlassian.com/x/iqyBMg), or you can [add, commit,](https://confluence.atlassian.com/x/8QhODQ) and [push from the command line](https://confluence.atlassian.com/x/NQ0zDQ).

> > > > > > > 1fb19aafffd20620a4a0810e37637f8dd45b05c2
