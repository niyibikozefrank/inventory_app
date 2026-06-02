/**
 * Utility Functions for Inventory Management System
 */

// ===== DOM UTILITIES =====
export const DOM = {
    /**
     * Safely query selector
     */
    query: (selector) => document.querySelector(selector),
    
    /**
     * Query all matching selectors
     */
    queryAll: (selector) => document.querySelectorAll(selector),
    
    /**
     * Create element
     */
    create: (tag, className = '', innerHTML = '') => {
        const el = document.createElement(tag);
        if (className) el.className = className;
        if (innerHTML) el.innerHTML = innerHTML;
        return el;
    },
    
    /**
     * Add class
     */
    addClass: (el, className) => {
        if (el) el.classList.add(className);
    },
    
    /**
     * Remove class
     */
    removeClass: (el, className) => {
        if (el) el.classList.remove(className);
    },
    
    /**
     * Toggle class
     */
    toggleClass: (el, className) => {
        if (el) el.classList.toggle(className);
    },
    
    /**
     * Show element
     */
    show: (el) => {
        if (el) el.style.display = '';
    },
    
    /**
     * Hide element
     */
    hide: (el) => {
        if (el) el.style.display = 'none';
    }
};

// ===== ALERT SYSTEM =====
export const Alert = {
    /**
     * Show success alert
     */
    success: (message, duration = 5000) => {
        Alert.show(message, 'success', duration);
    },
    
    /**
     * Show error alert
     */
    error: (message, duration = 5000) => {
        Alert.show(message, 'error', duration);
    },
    
    /**
     * Show warning alert
     */
    warning: (message, duration = 5000) => {
        Alert.show(message, 'warning', duration);
    },
    
    /**
     * Show info alert
     */
    info: (message, duration = 5000) => {
        Alert.show(message, 'info', duration);
    },
    
    /**
     * Main alert function
     */
    show: (message, type = 'info', duration = 5000) => {
        const container = DOM.query('.alerts-container') || Alert.createContainer();
        
        const alert = DOM.create('div', `alert alert-${type}`, `
            <span>${message}</span>
            <button class="alert-close" type="button">&times;</button>
        `);
        
        container.appendChild(alert);
        
        const closeBtn = alert.querySelector('.alert-close');
        closeBtn.addEventListener('click', () => {
            DOM.removeClass(alert, 'show');
            setTimeout(() => alert.remove(), 300);
        });
        
        setTimeout(() => {
            DOM.addClass(alert, 'show');
        }, 10);
        
        if (duration > 0) {
            setTimeout(() => {
                DOM.removeClass(alert, 'show');
                setTimeout(() => alert.remove(), 300);
            }, duration);
        }
    },
    
    /**
     * Create alerts container
     */
    createContainer: () => {
        const container = DOM.create('div', 'alerts-container');
        container.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            max-width: 400px;
        `;
        document.body.appendChild(container);
        return container;
    }
};

// ===== MODAL SYSTEM =====
export const Modal = {
    /**
     * Show modal
     */
    show: (modalId) => {
        const backdrop = DOM.query('.modal-backdrop') || Modal.createBackdrop();
        const modal = DOM.query(`#${modalId}`);
        
        if (!modal) return;
        
        DOM.addClass(backdrop, 'show');
        DOM.addClass(modal, 'show');
        document.body.style.overflow = 'hidden';
    },
    
    /**
     * Hide modal
     */
    hide: (modalId) => {
        const backdrop = DOM.query('.modal-backdrop');
        const modal = DOM.query(`#${modalId}`);
        
        if (!modal) return;
        
        DOM.removeClass(backdrop, 'show');
        DOM.removeClass(modal, 'show');
        document.body.style.overflow = '';
        
        setTimeout(() => {
            DOM.hide(backdrop);
        }, 300);
    },
    
    /**
     * Hide all modals
     */
    hideAll: () => {
        const modals = DOM.queryAll('.modal');
        modals.forEach(modal => {
            const id = modal.id;
            if (id) Modal.hide(id);
        });
    },
    
    /**
     * Create backdrop
     */
    createBackdrop: () => {
        const backdrop = DOM.create('div', 'modal-backdrop');
        backdrop.addEventListener('click', () => {
            Modal.hideAll();
        });
        document.body.appendChild(backdrop);
        return backdrop;
    }
};

// ===== DROPDOWN SYSTEM =====
export const Dropdown = {
    /**
     * Initialize dropdowns
     */
    init: () => {
        const dropdowns = DOM.queryAll('.dropdown');
        
        dropdowns.forEach(dropdown => {
            const trigger = dropdown.querySelector('.user-info') || dropdown.querySelector('[data-dropdown-toggle]');
            
            if (trigger) {
                trigger.addEventListener('click', (e) => {
                    e.stopPropagation();
                    DOM.toggleClass(dropdown, 'active');
                });
            }
        });
        
        // Close on outside click
        document.addEventListener('click', () => {
            const activeDropdowns = DOM.queryAll('.dropdown.active');
            activeDropdowns.forEach(dropdown => {
                DOM.removeClass(dropdown, 'active');
            });
        });
    }
};

// ===== FORM UTILITIES =====
export const Form = {
    /**
     * Get form data
     */
    getData: (formElement) => {
        const formData = new FormData(formElement);
        const data = {};
        
        formData.forEach((value, key) => {
            if (data.hasOwnProperty(key)) {
                if (!Array.isArray(data[key])) {
                    data[key] = [data[key]];
                }
                data[key].push(value);
            } else {
                data[key] = value;
            }
        });
        
        return data;
    },
    
    /**
     * Set form data
     */
    setData: (formElement, data) => {
        Object.keys(data).forEach(key => {
            const field = formElement.querySelector(`[name="${key}"]`);
            if (field) {
                field.value = data[key];
            }
        });
    },
    
    /**
     * Reset form
     */
    reset: (formElement) => {
        formElement.reset();
    },
    
    /**
     * Validate email
     */
    isValidEmail: (email) => {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    },
    
    /**
     * Validate required field
     */
    isRequired: (value) => {
        return value && value.toString().trim().length > 0;
    },
    
    /**
     * Add form error
     */
    addError: (fieldElement, errorMessage) => {
        DOM.addClass(fieldElement, 'is-invalid');
        
        let errorEl = fieldElement.parentElement.querySelector('.form-error');
        if (!errorEl) {
            errorEl = DOM.create('div', 'form-error');
            fieldElement.parentElement.appendChild(errorEl);
        }
        
        errorEl.textContent = errorMessage;
    },
    
    /**
     * Remove form error
     */
    removeError: (fieldElement) => {
        DOM.removeClass(fieldElement, 'is-invalid');
        
        const errorEl = fieldElement.parentElement.querySelector('.form-error');
        if (errorEl) {
            errorEl.remove();
        }
    }
};

// ===== HTTP UTILITIES =====
export const HTTP = {
    /**
     * GET request
     */
    get: async (url, options = {}) => {
        return HTTP.request(url, { ...options, method: 'GET' });
    },
    
    /**
     * POST request
     */
    post: async (url, data = {}, options = {}) => {
        return HTTP.request(url, {
            ...options,
            method: 'POST',
            body: JSON.stringify(data)
        });
    },
    
    /**
     * PUT request
     */
    put: async (url, data = {}, options = {}) => {
        return HTTP.request(url, {
            ...options,
            method: 'PUT',
            body: JSON.stringify(data)
        });
    },
    
    /**
     * DELETE request
     */
    delete: async (url, options = {}) => {
        return HTTP.request(url, { ...options, method: 'DELETE' });
    },
    
    /**
     * Main request function
     */
    request: async (url, options = {}) => {
        const defaultOptions = {
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            }
        };
        
        const finalOptions = {
            ...defaultOptions,
            ...options,
            headers: {
                ...defaultOptions.headers,
                ...options.headers
            }
        };
        
        try {
            const response = await fetch(url, finalOptions);
            
            if (!response.ok) {
                throw new Error(`HTTP Error: ${response.status}`);
            }
            
            return await response.json();
        } catch (error) {
            console.error('HTTP Error:', error);
            throw error;
        }
    }
};

// ===== TABLE UTILITIES =====
export const Table = {
    /**
     * Initialize table sorting
     */
    initSort: (tableElement) => {
        const headers = tableElement.querySelectorAll('th[data-sort]');
        
        headers.forEach(header => {
            header.style.cursor = 'pointer';
            header.addEventListener('click', () => {
                Table.sort(tableElement, header.dataset.sort);
            });
        });
    },
    
    /**
     * Sort table by column
     */
    sort: (tableElement, columnIndex) => {
        // Implementation would go here
        console.log(`Sorting table by column ${columnIndex}`);
    },
    
    /**
     * Filter table rows
     */
    filter: (tableElement, searchText, columnIndices = []) => {
        const rows = tableElement.querySelectorAll('tbody tr');
        const text = searchText.toLowerCase();
        let visibleCount = 0;
        
        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let found = false;
            
            cells.forEach((cell, index) => {
                if (columnIndices.length === 0 || columnIndices.includes(index)) {
                    if (cell.textContent.toLowerCase().includes(text)) {
                        found = true;
                    }
                }
            });
            
            if (found) {
                DOM.show(row);
                visibleCount++;
            } else {
                DOM.hide(row);
            }
        });
        
        return visibleCount;
    }
};

// ===== TOAST NOTIFICATIONS =====
export const Toast = {
    /**
     * Show toast message
     */
    show: (message, type = 'info', duration = 3000) => {
        const toast = DOM.create('div', `toast toast-${type}`, message);
        toast.style.cssText = `
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: ${Toast.getColor(type)};
            color: white;
            padding: 16px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            z-index: 9999;
            animation: slideInUp 0.3s ease;
        `;
        
        document.body.appendChild(toast);
        
        if (duration > 0) {
            setTimeout(() => {
                toast.style.animation = 'slideOutDown 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }
    },
    
    /**
     * Get toast color
     */
    getColor: (type) => {
        const colors = {
            'success': '#10b981',
            'error': '#ef4444',
            'warning': '#f59e0b',
            'info': '#3b82f6'
        };
        return colors[type] || colors['info'];
    }
};

// ===== UTILITY FUNCTIONS =====
export const Utils = {
    /**
     * Format currency
     */
    formatCurrency: (amount) => {
        return new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        }).format(amount);
    },
    
    /**
     * Format date
     */
    formatDate: (date) => {
        return new Intl.DateTimeFormat('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        }).format(new Date(date));
    },
    
    /**
     * Format time
     */
    formatTime: (date) => {
        return new Intl.DateTimeFormat('en-US', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        }).format(new Date(date));
    },
    
    /**
     * Debounce function
     */
    debounce: (func, delay) => {
        let timeoutId;
        return function (...args) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => func.apply(this, args), delay);
        };
    },
    
    /**
     * Throttle function
     */
    throttle: (func, delay) => {
        let lastCall = 0;
        return function (...args) {
            const now = Date.now();
            if (now - lastCall >= delay) {
                func.apply(this, args);
                lastCall = now;
            }
        };
    },
    
    /**
     * Copy to clipboard
     */
    copyToClipboard: async (text) => {
        try {
            await navigator.clipboard.writeText(text);
            Toast.show('Copied to clipboard!', 'success');
        } catch (err) {
            console.error('Failed to copy:', err);
        }
    },
    
    /**
     * Generate unique ID
     */
    generateId: () => {
        return '_' + Math.random().toString(36).substr(2, 9);
    },
    
    /**
     * Delay execution
     */
    delay: (ms) => {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
};

// ===== INITIALIZATION =====
export const App = {
    /**
     * Initialize all features
     */
    init: () => {
        Dropdown.init();
        
        // Initialize table sorting only if table exists
        const table = DOM.query('table');
        if (table) {
            Table.initSort(table);
        }
        
        // Add keyboard shortcuts
        document.addEventListener('keydown', (e) => {
            // Close modals with Escape
            if (e.key === 'Escape') {
                Modal.hideAll();
            }
        });
        
        console.log('App initialized successfully');
    }
};

// Auto-initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', App.init);
} else {
    App.init();
}

export default {
    DOM,
    Alert,
    Modal,
    Dropdown,
    Form,
    HTTP,
    Table,
    Toast,
    Utils,
    App
};
