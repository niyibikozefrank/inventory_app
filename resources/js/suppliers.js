// Suppliers page enhancements
import { DOM } from './utils.js';

const Suppliers = {
    init: () => {
        Suppliers.bindCopyButtons();
        Suppliers.bindPhotoPreview();
        Suppliers.bindSearch();
        Suppliers.bindDeleteConfirm();
        Suppliers.bindPagination();
        Suppliers.revealCards();
        Suppliers.lazyLoadImages();
        Suppliers.bindInfiniteScroll();
        Suppliers.ensureImageRadius();
    },

    bindCopyButtons: () => {
        document.querySelectorAll('[data-copy]').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const target = btn.getAttribute('data-copy');
                const el = document.querySelector(target);
                if (!el) return;
                const text = el.textContent.trim();
                navigator.clipboard.writeText(text).then(() => {
                    btn.classList.add('copied');
                    setTimeout(() => btn.classList.remove('copied'), 1200);
                }).catch(() => {
                    // fallback
                    alert('Copy to clipboard failed');
                });
            });
        });
    },

    bindPhotoPreview: () => {
        // Create one modal and reuse it
        let modal = document.querySelector('.photo-modal');
        if (!modal) {
            modal = document.createElement('div');
            modal.className = 'photo-modal';
            modal.innerHTML = `
                <div class="photo-modal-inner">
                    <div class="photo-modal-close"><button class="btn btn-outline" aria-label="Close">Close</button></div>
                    <div class="photo-modal-body"><img src="" alt="preview"/></div>
                </div>`;
            document.body.appendChild(modal);
        }

        const img = modal.querySelector('img');
        const closeBtn = modal.querySelector('button');
        closeBtn.addEventListener('click', () => modal.classList.remove('show'));

        // delegate to document in case cards are replaced
        document.addEventListener('click', (e) => {
            const target = e.target.closest('[data-photo]');
            if (target) {
                const src = target.getAttribute('data-photo');
                img.src = src;
                // small delay to allow CSS transitions
                requestAnimationFrame(() => modal.classList.add('show'));
            }
        });

        // click outside to close
        modal.addEventListener('click', (e) => {
            if (e.target === modal) modal.classList.remove('show');
        });
    },

    bindPagination: () => {
        document.addEventListener('click', (e) => {
            const a = e.target.closest('.pagination a');
            if (!a) return;
            e.preventDefault();
            const url = a.href;
            if (!url) return;

            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(res => res.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newGrid = doc.querySelector('.supplier-grid');
                    const newPagination = doc.querySelector('.pagination');
                    const grid = document.querySelector('.supplier-grid');
                    const pagination = document.querySelector('.pagination');
                    if (newGrid && grid) {
                        grid.innerHTML = newGrid.innerHTML;
                    }
                    if (newPagination && pagination) {
                        pagination.innerHTML = newPagination.innerHTML;
                    }
                    // re-bind handlers for new elements
                    Suppliers.bindCopyButtons();
                    Suppliers.bindDeleteConfirm();
                    // photo preview uses delegated listener so no need to rebind
                })
                .catch(() => console.warn('Failed to load page'));
        });
    },

    revealCards: () => {
        const cards = Array.from(document.querySelectorAll('.supplier-card'));
        cards.forEach((c, i) => {
            c.classList.remove('visible');
            setTimeout(() => c.classList.add('visible'), 30 * i);
        });
    },

    lazyLoadImages: () => {
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const img = entry.target;
                const src = img.getAttribute('data-src');
                if (src) {
                    img.src = src;
                    img.addEventListener('load', () => {
                        img.classList.add('loaded');
                        const placeholder = img.closest('.supplier-avatar').querySelector('.avatar-placeholder');
                        if (placeholder) placeholder.style.display = 'none';
                    });
                    img.removeAttribute('data-src');
                }
                io.unobserve(img);
            });
        }, { rootMargin: '200px' });

        document.querySelectorAll('img.supplier-avatar-img').forEach(img => io.observe(img));
    },

    ensureImageRadius: () => {
        document.querySelectorAll('img.supplier-avatar-img').forEach(img => {
            img.style.borderRadius = '10px';
        });
    },

    bindInfiniteScroll: () => {
        const sentinel = document.getElementById('infinite-scroll-sentinel');
        if (!sentinel) return;

        const obs = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;
                const nextLink = document.querySelector('.pagination a[rel="next"]');
                if (!nextLink) return;
                const url = nextLink.href;
                fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                    .then(res => res.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');
                        const newGrid = doc.querySelector('.supplier-grid');
                        const newPagination = doc.querySelector('.pagination');
                        const grid = document.querySelector('.supplier-grid');
                        if (newGrid && grid) {
                            // append children
                            Array.from(newGrid.children).forEach(n => grid.appendChild(n));
                        }
                        if (newPagination) {
                            document.querySelector('.pagination').innerHTML = newPagination.innerHTML;
                        }
                        // rebind behaviors for appended nodes
                        Suppliers.bindCopyButtons();
                        Suppliers.bindDeleteConfirm();
                        Suppliers.lazyLoadImages();
                        Suppliers.revealCards();
                    })
                    .catch(() => console.warn('Infinite scroll load failed'));
            });
        }, { rootMargin: '200px' });

        obs.observe(sentinel);
    },

    bindSearch: () => {
        const input = document.querySelector('#supplier-search');
        if (!input) return;
        input.addEventListener('input', (e) => {
            const q = e.target.value.toLowerCase();
            document.querySelectorAll('.supplier-card').forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.indexOf(q) !== -1 ? '' : 'none';
            });
        });
    },

    bindDeleteConfirm: () => {
        document.querySelectorAll('.supplier-delete-form').forEach(form => {
            form.addEventListener('submit', (e) => {
                if (!confirm('Are you sure you want to delete this supplier? This action cannot be undone.')) {
                    e.preventDefault();
                }
            });
        });
    }
};

// Auto-init on DOM ready
document.addEventListener('DOMContentLoaded', () => Suppliers.init());

export default Suppliers;
