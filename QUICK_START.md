# 🚀 Quick Start Guide - Inventory Management System

## ⚡ 5-Minute Setup

### Prerequisites
- XAMPP installed with PHP 8.2+
- Composer installed
- Node.js installed

### Step-by-Step

**1. Navigate to project:**
```bash
cd c:\xampp\htdocs\inventory_app
```

**2. Install packages:**
```bash
composer install
npm install
```

**3. Setup environment:**
```bash
copy .env.example .env
php artisan key:generate
```

**4. Configure database (.env file):**
```
DB_DATABASE=inventory_db
DB_USERNAME=root
DB_PASSWORD=
```

**5. Create database and seed:**
```bash
php artisan migrate --seed
```

**6. Build assets:**
```bash
npm run build
```

**7. Start application:**
```bash
php artisan serve
```

**8. Open browser:**
```
http://localhost:8000
```

## 🔐 Default Login

**Email**: admin@inventory.com  
**Password**: Check seeder or use `password` (Laravel factory default)

## 📱 Key Pages

| Feature | URL |
|---------|-----|
| Dashboard | /dashboard |
| Products | /products |
| Suppliers | /suppliers |
| Stock In | /stockins |
| Stock Out | /stockouts |
| Inventory Report | /reports/inventory |
| Low Stock Report | /reports/low-stock |
| Users | /users |

## 🎯 First Steps After Login

1. ✅ View Dashboard - See overall inventory status
2. ✅ Browse Products - Check sample inventory
3. ✅ View Suppliers - See supplier network
4. ✅ Check Reports - Generate inventory reports
5. ✅ Create New Product - Add to inventory
6. ✅ Record Stock In - Add new purchases
7. ✅ Record Stock Out - Process sales

## ⚙️ Development Mode

For live reload during development:
```bash
npm run dev
```

In another terminal:
```bash
php artisan serve
```

## 📊 Sample Data

The seeder creates:
- ✓ 10 Products (Electronics & Accessories)
- ✓ 5 Suppliers (International vendors)
- ✓ 10 Stock In records (Purchase history)
- ✓ 8 Stock Out records (Sales history)
- ✓ 1 Admin user + 5 test users

## 🔧 Common Commands

| Command | Purpose |
|---------|---------|
| `php artisan migrate` | Run database migrations |
| `php artisan db:seed` | Seed database with sample data |
| `php artisan migrate:refresh --seed` | Reset and reseed database |
| `npm run build` | Build production assets |
| `npm run dev` | Start development server |
| `php artisan cache:clear` | Clear application cache |

## 📝 Features at a Glance

### Product Management
- Add, edit, delete products
- Track SKU and categories
- Monitor inventory levels
- View product history

### Supplier Management
- Manage supplier information
- Track contacts and addresses
- View supplier transactions
- International supplier support

### Inventory Tracking
- Record stock purchases
- Process stock sales
- Track inventory movements
- Prevent negative inventory

### Reporting
- Comprehensive inventory report
- Purchase history (Stock In)
- Sales history (Stock Out)
- Low stock alerts
- Fast moving products analysis

## 🎨 Customization

### Change Theme Colors
Edit `resources/views/layouts/app.blade.php`:
```css
/* Line ~20 - Change sidebar gradient */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
```

### Add New Product Category
Edit `resources/views/stockout/create.blade.php` - Stock Out reason dropdown

### Adjust Low Stock Threshold
Edit `app/Models/Product.php` - Change `< 10` condition

## ✨ Pro Tips

1. **Bulk Operations**: Use seeders for initial data import
2. **Backup Database**: Export before major changes
3. **User Training**: Show users the Reports section first
4. **Mobile Access**: Use responsive design on tablets
5. **Data Export**: Copy table data for Excel analysis

## 🆘 Quick Troubleshooting

**Can't connect to database?**
- Check XAMPP MySQL is running
- Verify DB credentials in .env

**Blank page on load?**
- Run: `php artisan config:clear`
- Check storage permissions

**Assets not loading?**
- Run: `npm run build`
- Hard refresh browser (Ctrl+Shift+R)

**Authentication error?**
- Run: `php artisan db:seed`
- Check email in database

## 📞 Support Resources

- **Laravel Docs**: https://laravel.com/docs
- **PHP Documentation**: https://www.php.net/docs.php
- **XAMPP Help**: https://www.apachefriends.org/

---

**Happy Inventory Managing!** 📦
