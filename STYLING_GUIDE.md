# Inventory Management System - CSS & JavaScript Styling Guide

## Overview

This document provides comprehensive guidelines for styling and JavaScript usage in the Inventory Management System. The system uses a modern approach combining custom CSS, Tailwind CSS, and Alpine.js for interactive features.

---

## 🎨 CSS Architecture

### CSS Structure

The CSS is organized into the following sections:

1. **Root Variables** - Color and shadow definitions
2. **Base Styles** - Global element styling
3. **Typography** - Heading and text styles
4. **Layout Components** - App structure (sidebar, navbar, content)
5. **Component Styles** - UI components (buttons, cards, forms, tables)
6. **Utility Classes** - Helper classes for common patterns
7. **Responsive Design** - Mobile-first media queries

### CSS Variables

```css
:root {
    --primary: #667eea;           /* Main brand color */
    --primary-dark: #5568d3;      /* Darker variant */
    --primary-light: #8599f5;     /* Lighter variant */
    --secondary: #764ba2;         /* Secondary color */
    --success: #10b981;           /* Success state */
    --warning: #f59e0b;           /* Warning state */
    --danger: #ef4444;            /* Danger state */
    --dark: #1f2937;              /* Dark text */
    --light: #f9fafb;             /* Light background */
    --border: #e5e7eb;            /* Border color */
}
```

### Color System

| Color | Hex | Usage |
|-------|-----|-------|
| Primary | #667eea | Buttons, links, accents |
| Secondary | #764ba2 | Alternative accents |
| Success | #10b981 | Success messages, positive states |
| Warning | #f59e0b | Warnings, caution states |
| Danger | #ef4444 | Errors, delete actions |
| Dark | #1f2937 | Primary text |
| Light | #f9fafb | Light backgrounds |

---

## 📦 Component Styles

### Buttons

#### Variants

```html
<!-- Primary Button -->
<button class="btn btn-primary">Button Text</button>

<!-- Success Button -->
<button class="btn btn-success">Success Button</button>

<!-- Danger Button -->
<button class="btn btn-danger">Delete</button>

<!-- Warning Button -->
<button class="btn btn-warning">Warning</button>

<!-- Secondary Button -->
<button class="btn btn-secondary">Secondary</button>

<!-- Outline Button -->
<button class="btn btn-outline">Outline</button>
```

#### Sizes

```html
<button class="btn btn-primary btn-sm">Small Button</button>
<button class="btn btn-primary">Default Button</button>
<button class="btn btn-primary btn-lg">Large Button</button>
<button class="btn btn-primary btn-block">Full Width Button</button>
```

#### With Icons

```html
<button class="btn btn-primary">
    <i class="fas fa-save"></i>
    <span>Save</span>
</button>

<button class="btn btn-icon">
    <i class="fas fa-ellipsis-h"></i>
</button>
```

### Cards

```html
<!-- Basic Card -->
<div class="card">
    <div class="card-header">
        <h2>Card Title</h2>
        <button class="btn btn-primary btn-sm">Action</button>
    </div>
    
    <div class="card-body">
        <p>Card content goes here...</p>
    </div>
    
    <div class="card-footer">
        <button class="btn btn-secondary">Cancel</button>
        <button class="btn btn-primary">Submit</button>
    </div>
</div>
```

### Alert Messages

```html
<!-- Success Alert -->
<div class="alert alert-success" role="alert">
    <span><i class="fas fa-check-circle"></i> Success message</span>
    <button class="alert-close" type="button">&times;</button>
</div>

<!-- Error Alert -->
<div class="alert alert-error" role="alert">
    <span><i class="fas fa-exclamation-circle"></i> Error message</span>
    <button class="alert-close" type="button">&times;</button>
</div>

<!-- Warning Alert -->
<div class="alert alert-warning" role="alert">
    <span><i class="fas fa-warning"></i> Warning message</span>
    <button class="alert-close" type="button">&times;</button>
</div>

<!-- Info Alert -->
<div class="alert alert-info" role="alert">
    <span><i class="fas fa-info-circle"></i> Info message</span>
    <button class="alert-close" type="button">&times;</button>
</div>
```

### Stat Cards

```html
<!-- Standard Stat Card -->
<div class="stat-card">
    <div class="stat-card-value">250</div>
    <div class="stat-card-label">Total Products</div>
</div>

<!-- Success Stat Card -->
<div class="stat-card success">
    <div class="stat-card-value success">45</div>
    <div class="stat-card-label">Successful Orders</div>
</div>

<!-- Warning Stat Card -->
<div class="stat-card warning">
    <div class="stat-card-value warning">12</div>
    <div class="stat-card-label">Low Stock Items</div>
</div>

<!-- Danger Stat Card -->
<div class="stat-card danger">
    <div class="stat-card-value danger">3</div>
    <div class="stat-card-label">Critical Issues</div>
</div>
```

### Forms

```html
<!-- Form Group -->
<div class="form-group">
    <label for="username" class="form-label required">Username</label>
    <input 
        type="text" 
        id="username" 
        name="username" 
        class="form-control" 
        required
    >
    <small class="form-text">Enter your username</small>
</div>

<!-- Select Input -->
<div class="form-group">
    <label for="category" class="form-label required">Category</label>
    <select id="category" name="category" class="form-control">
        <option>Select Category</option>
        <option>Electronics</option>
        <option>Clothing</option>
    </select>
</div>

<!-- Textarea -->
<div class="form-group">
    <label for="notes" class="form-label">Notes</label>
    <textarea id="notes" name="notes" class="form-control"></textarea>
</div>
```

### Tables

```html
<div class="table-responsive">
    <table class="table-striped">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>SKU</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Product 1</td>
                <td>SKU-001</td>
                <td>100</td>
                <td>$99.99</td>
                <td>
                    <button class="btn btn-sm btn-primary">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
```

### Badges

```html
<span class="badge badge-success">Active</span>
<span class="badge badge-danger">Inactive</span>
<span class="badge badge-warning">Pending</span>
<span class="badge badge-info">Info</span>
<span class="badge badge-primary">Primary</span>
```

### Pagination

```html
<div class="pagination">
    <a class="disabled" href="#">← Previous</a>
    <a href="#">1</a>
    <span class="active">2</span>
    <a href="#">3</a>
    <a href="#">Next →</a>
</div>
```

### Spinners

```html
<!-- Default Spinner -->
<div class="spinner"></div>

<!-- Small Spinner -->
<div class="spinner spinner-sm"></div>
```

---

## 🔧 JavaScript Utilities

### Initialization

The JavaScript utilities are automatically initialized when the page loads. Access them via the global `AppUtils` object:

```javascript
window.AppUtils.Alert.success('Operation successful!');
window.AppUtils.Modal.show('confirmModal');
```

### Alert System

```javascript
// Success Alert
AppUtils.Alert.success('Your changes have been saved!');

// Error Alert
AppUtils.Alert.error('An error occurred. Please try again.');

// Warning Alert
AppUtils.Alert.warning('Please review your changes.');

// Info Alert
AppUtils.Alert.info('Additional information');

// Custom Duration (0 = no auto-close)
AppUtils.Alert.success('Permanent message', 0);
```

### Modal System

```javascript
// Show modal
AppUtils.Modal.show('editModal');

// Hide specific modal
AppUtils.Modal.hide('editModal');

// Hide all modals
AppUtils.Modal.hideAll();
```

### Dropdown System

```javascript
// Dropdowns are automatically initialized
// Click on the trigger element to toggle
// ESC key closes all dropdowns
```

### Form Utilities

```javascript
// Get form data
const formElement = document.getElementById('myForm');
const data = AppUtils.Form.getData(formElement);

// Set form data
AppUtils.Form.setData(formElement, {
    name: 'John Doe',
    email: 'john@example.com'
});

// Reset form
AppUtils.Form.reset(formElement);

// Validate email
if (AppUtils.Form.isValidEmail('test@example.com')) {
    // Email is valid
}

// Add form error
AppUtils.Form.addError(inputElement, 'This field is required');

// Remove form error
AppUtils.Form.removeError(inputElement);
```

### HTTP Requests

```javascript
// GET Request
AppUtils.HTTP.get('/api/products')
    .then(data => console.log(data))
    .catch(error => console.error(error));

// POST Request
AppUtils.HTTP.post('/api/products', {
    name: 'New Product',
    price: 99.99
})
    .then(data => console.log(data))
    .catch(error => console.error(error));

// PUT Request
AppUtils.HTTP.put('/api/products/1', {
    name: 'Updated Product',
    price: 129.99
})
    .then(data => console.log(data))
    .catch(error => console.error(error));

// DELETE Request
AppUtils.HTTP.delete('/api/products/1')
    .then(data => console.log(data))
    .catch(error => console.error(error));
```

### Toast Notifications

```javascript
// Success Toast
AppUtils.Toast.show('Operation successful!', 'success');

// Error Toast
AppUtils.Toast.show('An error occurred!', 'error');

// Warning Toast
AppUtils.Toast.show('Please be careful!', 'warning');

// Info Toast
AppUtils.Toast.show('Here is some information', 'info');

// Persistent Toast (no auto-close)
AppUtils.Toast.show('Important message', 'info', 0);
```

### Utility Functions

```javascript
// Format Currency
const price = AppUtils.Utils.formatCurrency(99.99);
// Output: $99.99

// Format Date
const date = AppUtils.Utils.formatDate('2024-01-15');
// Output: Jan 15, 2024

// Format Time
const time = AppUtils.Utils.formatTime('2024-01-15T14:30:00');
// Output: 02:30:00 PM

// Debounce Function
const debouncedSearch = AppUtils.Utils.debounce((query) => {
    // Perform search
}, 300);

// Throttle Function
const throttledScroll = AppUtils.Utils.throttle(() => {
    // Handle scroll
}, 100);

// Copy to Clipboard
AppUtils.Utils.copyToClipboard('Text to copy');

// Generate Unique ID
const id = AppUtils.Utils.generateId();
// Output: _abc123xyz

// Delay Execution
await AppUtils.Utils.delay(1000); // Wait 1 second
```

### DOM Utilities

```javascript
// Query selector
const element = AppUtils.DOM.query('.my-element');

// Query all
const elements = AppUtils.DOM.queryAll('.my-elements');

// Create element
const div = AppUtils.DOM.create('div', 'my-class', '<p>Content</p>');

// Add class
AppUtils.DOM.addClass(element, 'active');

// Remove class
AppUtils.DOM.removeClass(element, 'active');

// Toggle class
AppUtils.DOM.toggleClass(element, 'active');

// Show element
AppUtils.DOM.show(element);

// Hide element
AppUtils.DOM.hide(element);
```

---

## 📱 Responsive Design

### Breakpoints

The design is mobile-first and includes responsive breakpoints:

```css
/* Mobile First (base styles) */
@media (max-width: 768px) {
    /* Tablet and smaller */
}

@media (max-width: 480px) {
    /* Mobile phones */
}
```

### Responsive Classes

```html
<!-- Full width on mobile, 2 columns on larger screens -->
<div class="row">
    <div class="col-md-6">Column 1</div>
    <div class="col-md-6">Column 2</div>
</div>

<!-- Full width content -->
<div class="col-md-12">Full Width</div>
```

---

## 🎯 Best Practices

### 1. Use CSS Variables

Always use CSS variables for consistency:

```css
/* Good */
color: var(--primary);
background: var(--light);
box-shadow: var(--shadow);

/* Avoid */
color: #667eea;
background: #f9fafb;
```

### 2. Semantic HTML

Use appropriate HTML elements:

```html
<!-- Good -->
<button class="btn btn-primary">Submit</button>
<nav class="sidebar">...</nav>
<header class="navbar">...</header>

<!-- Avoid -->
<div onclick="submit()" class="btn">Submit</div>
```

### 3. Accessibility

Include proper ARIA labels and roles:

```html
<!-- Good -->
<button class="btn btn-danger" aria-label="Delete item">
    <i class="fas fa-trash"></i>
</button>

<div class="alert" role="alert">
    <i class="fas fa-check-circle"></i> Success
</div>

<!-- Include form labels -->
<label for="email" class="form-label">Email</label>
<input id="email" type="email" class="form-control">
```

### 4. Performance

- Use CSS variables instead of inline styles
- Minimize JavaScript reflows and repaints
- Use event delegation for dynamic elements
- Lazy load images

### 5. Consistency

- Use the predefined color palette
- Follow the spacing scale (5px, 10px, 15px, 20px, etc.)
- Keep button sizes consistent
- Use standard icon sizes

---

## 🎨 Customization

### Modifying Colors

To change the brand color, update the CSS variable:

```css
:root {
    --primary: #YOUR_NEW_COLOR;
}
```

### Adding New States

Create new badge or button variants:

```css
.badge-custom {
    background: linear-gradient(135deg, #custom1 0%, #custom2 100%);
    color: white;
}

.btn-custom {
    background: linear-gradient(135deg, #custom1 0%, #custom2 100%);
    color: white;
}
```

### Creating Custom Components

Follow the established pattern:

```css
.my-component {
    background: white;
    border-radius: 12px;
    box-shadow: var(--shadow);
    padding: 20px;
    transition: all 0.3s ease;
}

.my-component:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-4px);
}
```

---

## 📋 Common Patterns

### Search Bar with Filter

```html
<div class="form-group">
    <input 
        type="text" 
        class="form-control" 
        placeholder="Search products..."
        id="searchInput"
    >
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const debouncedSearch = AppUtils.Utils.debounce((e) => {
        const query = e.target.value;
        // Perform search
    }, 300);
    
    searchInput.addEventListener('input', debouncedSearch);
</script>
```

### Confirmation Dialog

```html
<!-- Modal -->
<div id="confirmModal" class="modal">
    <div class="modal-header">
        <h5>Confirm Action</h5>
        <button class="modal-close" onclick="AppUtils.Modal.hide('confirmModal')">×</button>
    </div>
    <div class="modal-body">
        Are you sure you want to delete this item?
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" onclick="AppUtils.Modal.hide('confirmModal')">Cancel</button>
        <button class="btn btn-danger" onclick="handleDelete()">Delete</button>
    </div>
</div>

<script>
    function handleDelete() {
        // Delete logic
        AppUtils.Alert.success('Item deleted successfully!');
        AppUtils.Modal.hide('confirmModal');
    }
</script>
```

### Form Submission

```html
<form id="productForm">
    <div class="form-group">
        <label class="form-label required">Product Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
    document.getElementById('productForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        
        try {
            const data = AppUtils.Form.getData(e.target);
            const response = await AppUtils.HTTP.post('/api/products', data);
            AppUtils.Alert.success('Product created successfully!');
        } catch (error) {
            AppUtils.Alert.error('Failed to create product');
        }
    });
</script>
```

---

## 🚀 Getting Started

1. **Use the provided CSS classes** - Don't add inline styles
2. **Leverage JavaScript utilities** - Use AppUtils for common operations
3. **Follow the color palette** - Maintain visual consistency
4. **Test responsiveness** - Always check on mobile devices
5. **Keep code readable** - Use semantic HTML and meaningful class names

---

## 📚 Additional Resources

- [Font Awesome Icons](https://fontawesome.com/icons)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)
- [CSS Grid Guide](https://css-tricks.com/snippets/css/complete-guide-grid/)
- [Flexbox Guide](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)

---

**Last Updated:** June 2, 2024
**Version:** 1.0
