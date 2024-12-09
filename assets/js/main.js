// JavaScript for transparent header

document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.header-transparent')) {
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.header-transparent .navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const mobileMenuToggle = document.querySelector('.navbar-toggler');
    const mobileMenu = document.querySelector('.mobile-menu-wrapper');
    const mobileMenuClose = document.querySelector('.mobile-menu-close');
    
    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
        
        mobileMenuClose.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
    }
    
    // Handle dropdown menus on touch devices
    if ('ontouchstart' in window) {
        const dropdownTogles = document.querySelectorAll('.dropdown-toggle');
        
        dropdownTogles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                if (!this.classList.contains('show')) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    // Close other open dropdowns
                    dropdownTogles.forEach(otherToggle => {
                        if (otherToggle !== this) {
                            otherToggle.classList.remove('show');
                            otherToggle.nextElementSibling?.classList.remove('show');
                        }
                    });
                    
                    // Toggle current dropdown
                    this.classList.add('show');
                    this.nextElementSibling?.classList.add('show');
                }
            });
        });
    }
    
    // Handle responsive tables
    const tables = document.querySelectorAll('table');
    tables.forEach(table => {
        if (!table.parentElement.classList.contains('table-responsive-wrapper')) {
            const wrapper = document.createElement('div');
            wrapper.className = 'table-responsive-wrapper';
            table.parentNode.insertBefore(wrapper, table);
            wrapper.appendChild(table);
        }
    });
});
