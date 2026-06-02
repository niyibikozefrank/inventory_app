import './bootstrap';
import Alpine from 'alpinejs';
import * as AppUtils from './utils.js';
import Suppliers from './suppliers.js';

window.Alpine = Alpine;
window.AppUtils = AppUtils;

Alpine.start();

// Initialize app utilities
AppUtils.App.init();
// Initialize suppliers helper (if present)
if (typeof Suppliers !== 'undefined') {
	// Suppliers auto-inits on DOMContentLoaded; keep reference
	window.Suppliers = Suppliers;
}
