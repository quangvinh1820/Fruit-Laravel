## Introduction

This README.md file provides an overview of the features available on the admin dashboard of the application. The admin dashboard allows administrators to manage categories and products.

## Features

### Category Management

1. **Create Category**: Admins can create new categories by providing a title for the category.

2. **Read Category**: Admins can view a list of existing categories, along with the count of products belonging to each category.

3. **Update Category**: Admins can update the title of existing categories.

4. **Delete Category**: Admins can delete categories. Note that deleting a category will also delete all associated products.

### Product Management

1. **Create Product**: Admins can create new products by providing details such as name, price, description, quantity, category, and uploading an image.

2. **Read Product**: Admins can view a list of existing products, along with their details and associated category.

3. **Update Product**: Admins can update the details of existing products, including name, price, description, quantity, category, and image.

4. **Delete Product**: Admins can delete products from the system.

### Image Upload

1. **Category Image Upload**: When creating or updating a category, admins can upload an image for the category.

2. **Product Image Upload**: When creating or updating a product, admins can upload an image for the product.

### Handle Register, Login, Logout

## Technologies Used

- Laravel framework for backend development.
- HTML, CSS, and JavaScript for frontend interface.
- MySQL database for data storage.

## Installation

To install and run the admin dashboard locally, follow these steps:

1. Clone the repository to your local machine.
2. Install dependencies by running `composer install` in the project directory.
3. Copy the `.env.example` file to `.env` and configure your database settings.
4. Run `php artisan migrate` to migrate the database tables.
5. Serve the application using `php artisan serve` and navigate to the provided URL in your web browser.

## Contributors

- [Tran Quang Vinh - Harry Tran](https://github.com/quangvinh1820)

Feel free to contribute to the project by submitting bug reports, feature requests, or pull requests.
