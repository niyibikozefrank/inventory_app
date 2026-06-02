# 📋 Quick Reference - CSS & JavaScript Cheat Sheet

## 🎨 CSS Classes Reference

### Buttons
```html
.btn .btn-primary         <!-- Primary button -->
.btn .btn-success         <!-- Green button -->
.btn .btn-danger          <!-- Red button -->
.btn .btn-warning         <!-- Amber button -->
.btn .btn-secondary       <!-- Gray button -->
.btn .btn-outline         <!-- Outlined button -->
.btn-sm                   <!-- Small size -->
.btn-lg                   <!-- Large size -->
.btn-block                <!-- Full width -->
.btn-icon                 <!-- Icon-only button -->
```

### Cards
```html
.card                     <!-- Card container -->
.card-header              <!-- Header section -->
.card-body                <!-- Body section -->
.card-footer              <!-- Footer section -->
```

### Alerts
```html
.alert .alert-success     <!-- Green alert -->
.alert .alert-error       <!-- Red alert -->
.alert .alert-warning     <!-- Amber alert -->
.alert .alert-info        <!-- Blue alert -->
.alert-close              <!-- Close button -->
```

### Badges
```html
.badge .badge-success     <!-- Green badge -->
.badge .badge-danger      <!-- Red badge -->
.badge .badge-warning     <!-- Amber badge -->
.badge .badge-info        <!-- Blue badge -->
.badge .badge-primary     <!-- Purple badge -->
```

### Forms
```html
.form-group               <!-- Form group container -->
.form-label               <!-- Form label -->
.form-label.required      <!-- Label with red asterisk -->
.form-control             <!-- Text input, select, textarea -->
.form-text                <!-- Small help text -->
.form-error               <!-- Error message -->
```

### Tables
```html
.table-responsive         <!-- Responsive wrapper -->
table.table-striped       <!-- Striped table -->
th, td                    <!-- Table headers/cells -->
```

### Stats
```html
.stats-grid               <!-- Grid container for stat cards -->
.stat-card                <!-- Individual stat card -->
.stat-card.success        <!-- Green stat card -->
.stat-card.warning        <!-- Amber stat card -->
.stat-card.danger         <!-- Red stat card -->
.stat-card-value          <!-- Large number -->
.stat-card-label          <!-- Label text -->
```

### Layout
```html
.container                <!-- Max-width container -->
.row                      <!-- Responsive grid row -->
.col-md-6                 <!-- Half width column -->
.col-md-12                <!-- Full width column -->
.flex                     <!-- Flexbox container -->
.flex-between             <!-- Space-between + center -->
.flex-center              <!-- Center in both axes -->
```

### Text & Utility
```html
.text-center              <!-- Center text -->
.text-right               <!-- Right align -->
.text-left                <!-- Left align -->
.text-muted               <!-- Gray text -->
.text-success             <!-- Green text -->
.text-danger              <!-- Red text -->
.text-warning             <!-- Amber text -->
.text-primary             <!-- Purple text -->
.mt-20, .mb-20            <!-- Margin top/bottom -->
.pt-20, .pb-20            <!-- Padding top/bottom -->
.mt-30, .mb-30            <!-- Larger margins -->
```

---

## 🖱️ JavaScript Utilities Cheat Sheet

### Alert System
```javascript
AppUtils.Alert.success('Message', 5000)    // Auto-hide after 5 seconds
AppUtils.Alert.error('Message', 5000)
AppUtils.Alert.warning('Message', 5000)
AppUtils.Alert.info('Message', 5000)
AppUtils.Alert.show('Message', 'success', 0) // 0 = no auto-hide
```

### Modal System
```javascript
AppUtils.Modal.show('modalId')              // Show modal by ID
AppUtils.Modal.hide('modalId')              // Hide specific modal
AppUtils.Modal.hideAll()                    // Hide all modals
```

### Dropdown System
```javascript
// Automatically initialized
// Click user-info div to toggle
// ESC key closes all dropdowns
```

### Form Utilities
```javascript
AppUtils.Form.getData(formElement)          // Get form data object
AppUtils.Form.setData(formElement, data)    // Set form fields
AppUtils.Form.reset(formElement)            // Reset form to defaults
AppUtils.Form.isValidEmail(email)           // Validate email format
AppUtils.Form.isRequired(value)             // Check if value exists
AppUtils.Form.addError(input, 'Error msg')  // Show error on field
AppUtils.Form.removeError(input)            // Clear field error
```

### HTTP Requests
```javascript
AppUtils.HTTP.get('/api/endpoint')
AppUtils.HTTP.post('/api/endpoint', {data})
AppUtils.HTTP.put('/api/endpoint/id', {data})
AppUtils.HTTP.delete('/api/endpoint/id')

// All include CSRF token automatically
// Returns Promise
```

### Toast Notifications
```javascript
AppUtils.Toast.show('Message', 'success')   // Auto-hide after 3 seconds
AppUtils.Toast.show('Message', 'success', 0) // Persistent
AppUtils.Toast.show('Message', 'error')
AppUtils.Toast.show('Message', 'warning')
AppUtils.Toast.show('Message', 'info')
```

### DOM Utilities
```javascript
AppUtils.DOM.query('.selector')              // querySelector
AppUtils.DOM.queryAll('.selector')           // querySelectorAll
AppUtils.DOM.create('div', 'class', 'html') // Create element
AppUtils.DOM.addClass(el, 'class')           // Add class
AppUtils.DOM.removeClass(el, 'class')       // Remove class
AppUtils.DOM.toggleClass(el, 'class')       // Toggle class
AppUtils.DOM.show(el)                       // Remove display: none
AppUtils.DOM.hide(el)                       // Set display: none
```

### Utility Functions
```javascript
AppUtils.Utils.formatCurrency(99.99)        // Returns: $99.99
AppUtils.Utils.formatDate('2024-01-15')     // Returns: Jan 15, 2024
AppUtils.Utils.formatTime('14:30:00')       // Returns: 02:30:00 PM
AppUtils.Utils.debounce(fn, 300)            // Returns debounced function
AppUtils.Utils.throttle(fn, 100)            // Returns throttled function
AppUtils.Utils.copyToClipboard('text')      // Copy to clipboard
AppUtils.Utils.generateId()                 // Returns: _abc123xyz
AppUtils.Utils.delay(1000)                  // Returns Promise
```

---

## 🎨 CSS Variables (Colors)

```css
--primary: #667eea              /* Main purple-blue */
--primary-dark: #5568d3         /* Darker shade */
--primary-light: #8599f5        /* Lighter shade */
--secondary: #764ba2            /* Purple */
--success: #10b981              /* Green */
--warning: #f59e0b              /* Amber */
--danger: #ef4444               /* Red */
--dark: #1f2937                 /* Dark gray */
--light: #f9fafb                /* Light gray */
--border: #e5e7eb               /* Border gray */
--shadow-sm: 0 1px 2px ...      /* Small shadow */
--shadow: 0 4px 6px -1px ...    /* Medium shadow */
--shadow-lg: 0 20px 25px -5px../* Large shadow */
```

---

## 📄 Common HTML Patterns

### Search Bar
```html
<div class="form-group">
    <input type="text" class="form-control" placeholder="Search...">
</div>
```

### Action Button Group
```html
<div style="display: flex; gap: 8px;">
    <button class="btn btn-warning btn-sm">Edit</button>
    <button class="btn btn-danger btn-sm">Delete</button>
</div>
```

### Empty State
```html
<div style="text-align: center; padding: 40px;">
    <i class="fas fa-inbox" style="font-size: 3rem; color: #ddd;"></i>
    <p style="color: #999;">No items found</p>
</div>
```

### Header with Action
```html
<div class="card-header">
    <h3>Title</h3>
    <a href="/create" class="btn btn-primary btn-sm">Add New</a>
</div>
```

### Status Indicator
```html
@if($item->active)
    <span class="badge badge-success">Active</span>
@else
    <span class="badge badge-danger">Inactive</span>
@endif
```

### Form with Error
```html
<div class="form-group">
    <label class="form-label required">Email</label>
    <input type="email" class="form-control" required>
    <small class="form-text">Enter a valid email</small>
</div>
```

---

## 🔧 JavaScript Example: Form Submission

```html
<form id="myForm">
    <div class="form-group">
        <label class="form-label required">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script>
document.getElementById('myForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    
    try {
        const data = AppUtils.Form.getData(e.target);
        const response = await AppUtils.HTTP.post('/api/endpoint', data);
        AppUtils.Alert.success('Success!');
        e.target.reset();
    } catch (error) {
        AppUtils.Alert.error('Error: ' + error.message);
    }
});
</script>
```

---

## 🔧 JavaScript Example: Delete Confirmation

```html
<button class="btn btn-danger btn-sm" onclick="showDeleteModal(123)">
    Delete
</button>

<div id="deleteModal" class="modal">
    <div class="modal-header">
        <h5>Confirm Delete</h5>
        <button class="modal-close" onclick="AppUtils.Modal.hide('deleteModal')">×</button>
    </div>
    <div class="modal-body">
        Are you sure? This action cannot be undone.
    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" onclick="AppUtils.Modal.hide('deleteModal')">Cancel</button>
        <button class="btn btn-danger" onclick="confirmDelete(123)">Delete</button>
    </div>
</div>

<script>
function showDeleteModal(id) {
    window.deleteId = id;
    AppUtils.Modal.show('deleteModal');
}

async function confirmDelete(id) {
    try {
        await AppUtils.HTTP.delete(`/api/endpoint/${id}`);
        AppUtils.Alert.success('Deleted successfully!');
        AppUtils.Modal.hide('deleteModal');
        location.reload();
    } catch (error) {
        AppUtils.Alert.error('Failed to delete');
    }
}
</script>
```

---

## 📊 Button Styles Quick Reference

| Class | Color | Use Case |
|-------|-------|----------|
| btn-primary | Purple | Main actions |
| btn-success | Green | Confirm, save |
| btn-danger | Red | Delete, cancel |
| btn-warning | Amber | Caution |
| btn-secondary | Gray | Alternative |
| btn-outline | Purple border | Secondary action |

---

**📌 Pro Tip**: Always check `STYLING_GUIDE.md` for complete documentation and examples!

**🎯 Quick Links**:
- Full Guide: `STYLING_GUIDE.md`
- CSS Styles: `resources/css/app.css`
- JavaScript: `resources/js/utils.js`
- Implementation Details: `STYLING_IMPLEMENTATION.md`
