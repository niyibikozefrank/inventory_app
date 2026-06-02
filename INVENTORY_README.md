# Inventory Management System

A complete, feature-rich inventory management system built with Laravel 12. This application provides comprehensive tools for managing products, suppliers, stock movements, and generating detailed reports.

## 🎯 Features

### Core Functionality
- **Product Management** - Create, read, update, delete products with SKU tracking
- **Supplier Management** - Manage supplier information and contact details
- **Stock Movements** - Record stock in (purchases) and stock out (sales/adjustments)
- **Inventory Tracking** - Real-time inventory quantity updates
- **User Management** - Create and manage system users
- **Dashboard** - Overview with key metrics and recent transactions

### Reports
- **Inventory Report** - Complete inventory status with valuations
- **Stock In Report** - Purchase history with supplier details
- **Stock Out Report** - Sale/adjustment history with reasons
- **Low Stock Report** - Products below minimum threshold (< 10 units)
- **Fast Moving Products** - Top products sold in last 30 days

### Security & Access Control
- User authentication with email verification support
- Password hashing with Laravel's built-in security
- Protected routes requiring authentication
- CSRF protection on all forms

## 📋 System Requirements

- PHP 8.2+
- Composer
- Node.js & npm
- MySQL/SQLite or any Laravel-supported database
- Web server (Apache/Nginx) - included with Laravel Artisan

## 🚀 Installation

### Step 1: Clone/Extract Project
```bash
cd c:\xampp\htdocs\inventory_app
```

### Step 2: Install Dependencies
```bash
composer install
npm install
```

### Step 3: Environment Setup
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` file with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inventory_app
DB_USERNAME=root
DB_PASSWORD=
```

### Step 4: Database Setup
```bash
php artisan migrate
php artisan db:seed
```

This will:
- Create all required database tables
- Seed sample data (products, suppliers, stock records)
- Create admin user: `admin@inventory.com`

### Step 5: Build Frontend Assets
```bash
npm run build
```

For development with live reloading:
```bash
npm run dev
```

### Step 6: Start the Application
```bash
php artisan serve
```

Application runs at: `http://localhost:8000`

## 🔐 Default Credentials

After seeding, you can login with:
- **Email**: `admin@inventory.com`
- **Password**: Use the password from your seeder or Laravel's factory default

The system also creates 5 additional test users automatically.

## 📁 Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/          # Business logic
│   │   │   ├── Auth/            # Authentication controllers
│   │   │   ├── DashboardController.php
│   │   │   ├── ProductController.php
│   │   │   ├── SupplierController.php
│   │   │   ├── StockInController.php
│   │   │   ├── StockOutController.php
│   │   │   ├── UserController.php
│   │   │   └── ReportController.php
│   │   └── Requests/            # Form validation
│   └── Models/                  # Database models
│       ├── Product.php
│       ├── Supplier.php
│       ├── StockIn.php
│       ├── StockOut.php
│       └── User.php
├── database/
│   ├── migrations/              # Database schemas
│   └── seeders/                 # Sample data
├── resources/
│   └── views/                   # Blade templates
│       ├── layouts/            # Layout templates
│       ├── dashboard/
│       ├── products/
│       ├── suppliers/
│       ├── stockin/
│       ├── stockout/
│       ├── users/
│       ├── auth/               # Authentication pages
│       └── reports/            # Report templates
├── routes/
│   └── web.php                 # Application routes
└── public/                     # Public assets
```

## 🗄️ Database Schema

### Products Table
| Column | Type | Description |
|--------|------|-------------|
| id | int | Primary key |
| name | string | Product name |
| sku | string | Stock Keeping Unit |
| category | string | Product category |
| description | text | Product description |
| quantity | int | Current inventory |
| unit_price | decimal | Price per unit |
| created_at | timestamp | Creation time |
| updated_at | timestamp | Last update |

### Suppliers Table
| Column | Type | Description |
|--------|------|-------------|
| id | int | Primary key |
| name | string | Supplier name |
| contact_person | string | Contact name |
| email | string | Email address |
| phone | string | Phone number |
| address | string | Physical address |
| city | string | City |
| country | string | Country |
| created_at | timestamp | Creation time |
| updated_at | timestamp | Last update |

### StockIn Table
| Column | Type | Description |
|--------|------|-------------|
| id | int | Primary key |
| product_id | int | Product reference |
| supplier_id | int | Supplier reference |
| quantity | int | Quantity received |
| unit_price | decimal | Purchase price |
| notes | text | Additional notes |
| created_at | timestamp | Transaction time |
| updated_at | timestamp | Last update |

### StockOut Table
| Column | Type | Description |
|--------|------|-------------|
| id | int | Primary key |
| product_id | int | Product reference |
| quantity | int | Quantity removed |
| reason | string | Reason for removal |
| notes | text | Additional notes |
| created_at | timestamp | Transaction time |
| updated_at | timestamp | Last update |

## 🌐 Routes Overview

### Authentication
- `GET /login` - Login page
- `POST /login` - Process login
- `POST /logout` - Logout user
- `GET /register` - Registration page
- `POST /register` - Process registration

### Dashboard
- `GET /dashboard` - Main dashboard with metrics

### Products
- `GET /products` - List all products
- `GET /products/create` - Create product form
- `POST /products` - Store new product
- `GET /products/{id}` - View product details
- `GET /products/{id}/edit` - Edit product form
- `PATCH /products/{id}` - Update product
- `DELETE /products/{id}` - Delete product

### Suppliers
- `GET /suppliers` - List all suppliers
- `GET /suppliers/create` - Create supplier form
- `POST /suppliers` - Store new supplier
- `GET /suppliers/{id}` - View supplier details
- `GET /suppliers/{id}/edit` - Edit supplier form
- `PATCH /suppliers/{id}` - Update supplier
- `DELETE /suppliers/{id}` - Delete supplier

### Stock In
- `GET /stockins` - List stock in records
- `GET /stockins/create` - Record stock in form
- `POST /stockins` - Store stock in record
- `GET /stockins/{id}` - View stock in details

### Stock Out
- `GET /stockouts` - List stock out records
- `GET /stockouts/create` - Record stock out form
- `POST /stockouts` - Store stock out record
- `GET /stockouts/{id}` - View stock out details

### Users
- `GET /users` - List all users
- `GET /users/create` - Create user form
- `POST /users` - Store new user
- `GET /users/{id}` - View user details
- `GET /users/{id}/edit` - Edit user form
- `PATCH /users/{id}` - Update user
- `DELETE /users/{id}` - Delete user

### Reports
- `GET /reports/inventory` - Inventory report
- `GET /reports/stock-in` - Stock in report
- `GET /reports/stock-out` - Stock out report
- `GET /reports/low-stock` - Low stock report
- `GET /reports/fast-moving` - Fast moving products report

## 🎨 User Interface

### Design Features
- **Modern Gradient Sidebar** - Purple gradient navigation
- **Responsive Layout** - Mobile-friendly design
- **Intuitive Navigation** - Organized menu structure
- **Status Indicators** - Color-coded inventory status (Low/In Stock/Out)
- **Print Support** - All reports are print-friendly
- **Form Validation** - Real-time validation feedback

### Color Scheme
- Primary: Purple gradient (#667eea to #764ba2)
- Success: Green (#28a745)
- Warning: Yellow (#ffc107)
- Danger: Red (#dc3545)

## 📊 Business Logic

### Inventory Updates
- **Stock In**: Automatically increments product quantity
- **Stock Out**: Automatically decrements product quantity (with validation)
- Prevents negative inventory
- Tracks all movements with timestamps

### Low Stock Alert
- Products with quantity < 10 are highlighted in red
- Low stock report available on dashboard
- Dedicated low stock report page

### Fast Moving Analysis
- Tracks products sold in last 30 days
- Sorted by sales volume
- Helps identify popular items for reordering

## 🔒 Security Features

- Password hashing using bcrypt
- CSRF token protection on all forms
- SQL injection prevention via Eloquent ORM
- XSS protection in Blade templates
- User authentication middleware
- Email verification support

## 🛠️ Development

### Running Tests
```bash
php artisan test
```

### Database Migration
To add new tables/columns:
```bash
php artisan make:migration create_table_name
php artisan migrate
```

### Creating New Seeders
```bash
php artisan make:seeder SeedName
php artisan db:seed --class=SeedName
```

### Artisan Commands

Clear cache:
```bash
php artisan cache:clear
```

Refresh database (reset and seed):
```bash
php artisan migrate:refresh --seed
```

## 📝 API Response Format

All responses follow JSON structure:
```json
{
  "success": true,
  "message": "Action completed successfully",
  "data": {}
}
```

## 🐛 Troubleshooting

### Database Connection Error
- Check `.env` database credentials
- Ensure MySQL service is running
- Verify database exists

### Permission Error
- Run: `php artisan storage:link`
- Check file permissions in `storage/` and `bootstrap/cache/`

### Missing Assets
- Run: `npm install && npm run build`
- Clear browser cache

### Login Issues
- Run: `php artisan db:seed` to recreate admin user
- Check email in database

## 📚 Additional Resources

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Best Practices](https://laravel.com/docs/eloquent)
- [Blade Templating](https://laravel.com/docs/blade)

## 📄 License

This project is open-sourced software licensed under the MIT license.

## 👨‍💻 Support

For issues or questions, please check the Laravel documentation or review the code comments.

---

**Version**: 1.0  
**Last Updated**: May 2026  
**Built with**: Laravel 12, PHP 8.2+
