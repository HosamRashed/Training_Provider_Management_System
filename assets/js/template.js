document.addEventListener('DOMContentLoaded', function() {
  var body = document.querySelector('body');
  var contentWrapper = document.querySelector('.content-wrapper');
  var scroller = document.querySelector('.container-scroller');
  var footer = document.querySelector('.footer');
  var sidebar = document.querySelector('.sidebar');

  // Add active class to nav-link based on url dynamically
  // Active class can be hard coded directly in html file also as required
  function addActiveClass(element) {
    var current = location.pathname.split('/').slice(-1)[0].replace(/^\/|\/$/g, '');
    if (current === '') {
      // for root url
      if (element.getAttribute('href').indexOf('index.html') !== -1) {
        element.closest('.nav-item').classList.add('active');
        if (element.closest('.sub-menu')) {
          element.closest('.collapse').classList.add('show');
          element.classList.add('active');
        }
      }
    } else {
      // for other url
      if (element.getAttribute('href').indexOf(current) !== -1) {
        element.closest('.nav-item').classList.add('active');
        if (element.closest('.sub-menu')) {
          element.closest('.collapse').classList.add('show');
          element.classList.add('active');
        }
        if (element.closest('.submenu-item')) {
          element.classList.add('active');
        }
      }
    }
  }

  var navLinks = document.querySelectorAll('.nav li a');
  navLinks.forEach(function(element) {
    addActiveClass(element);
  });

  var horizontalNavLinks = document.querySelectorAll('.horizontal-menu .nav li a');
  horizontalNavLinks.forEach(function(element) {
    addActiveClass(element);
  });

  // Close other submenu in sidebar on opening any
  sidebar.addEventListener('show.bs.collapse', function(event) {
    var collapses = sidebar.querySelectorAll('.collapse.show');
    collapses.forEach(function(collapse) {
      collapse.collapse('hide');
    });
  });

  // Change sidebar and content-wrapper height
  applyStyles();

  function applyStyles() {
    // Applying perfect scrollbar
    if (!body.classList.contains('rtl')) {
      if (document.querySelectorAll('.settings-panel .tab-content .tab-pane.scroll-wrapper').length) {
        var settingsPanelScroll = new PerfectScrollbar('.settings-panel .tab-content .tab-pane.scroll-wrapper');
      }
      if (document.querySelector('.chats')) {
        var chatsScroll = new PerfectScrollbar('.chats');
      }
      if (body.classList.contains('sidebar-fixed')) {
        if (document.querySelector('#sidebar')) {
          var fixedSidebarScroll = new PerfectScrollbar('#sidebar .nav');
        }
      }
    }
  }

  var minimizeToggle = document.querySelector('[data-bs-toggle="minimize"]');
  minimizeToggle.addEventListener('click', function() {
    if (body.classList.contains('sidebar-toggle-display') || body.classList.contains('sidebar-absolute')) {
      body.classList.toggle('sidebar-hidden');
    } else {
      body.classList.toggle('sidebar-icon-only');
    }
  });

  // checkbox and radios
  var formCheckLabels = document.querySelectorAll('.form-check label, .form-radio label');
  formCheckLabels.forEach(function(label) {
    label.innerHTML += '<i class="input-helper"></i>';
  });

  // Horizontal menu in mobile
  var horizontalMenuToggle = document.querySelector('[data-toggle="horizontal-menu-toggle"]');
  horizontalMenuToggle.addEventListener('click', function() {
    var bottomNavbar = document.querySelector('.horizontal-menu .bottom-navbar');
    bottomNavbar.classList.toggle('header-toggled');
  });

  // Horizontal menu navigation in mobile menu on click
  var navItems = document.querySelectorAll('.horizontal-menu .page-navigation > .nav-item');
  navItems.forEach(function(navItem) {
    navItem.addEventListener('click', function(event) {
      if (window.matchMedia('(max-width: 991px)').matches) {
        if (!navItem.classList.contains('show-submenu')) {
          navItems.forEach(function(item) {
            item.classList.remove('show-submenu');
          });
        }
        navItem.classList.toggle('show-submenu');
      }
    });
  });

  window.addEventListener('scroll', function() {
    if (window.matchMedia('(min-width: 992px)').matches) {
      var header = document.querySelector('.horizontal-menu');
      if (window.pageYOffset >= 70) {
        header.classList.add('fixed-on-scroll');
      } else {
        header.classList.remove('fixed-on-scroll');
      }
    }
  });
});

// focus input when clicking on search icon
var navbarSearchIcon = document.getElementById('navbar-search-icon');
navbarSearchIcon.addEventListener('click', function() {
  var navbarSearchInput = document.getElementById('navbar-search-input');
  navbarSearchInput.focus();
});
