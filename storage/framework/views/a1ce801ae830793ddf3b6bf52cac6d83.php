<nav class="relative bg-white after:pointer-events-none after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-white/10">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <!-- Mobile menu button -->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button 
          type="button" 
          id="mobile-menu-button"
          class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-50 hover:text-gray-500 focus:outline-2 focus:-outline-offset-1 focus:outline-indigo-500"
          aria-controls="mobile-menu"
          aria-expanded="false"
        >
          <span class="sr-only">Open main menu</span>
          <!-- Hamburger icon -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!-- Close icon (hidden by default) -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Logo/Brand -->
      <div class="flex flex-1 items-center justify-center sm:justify-start">
        <a href="<?php echo e(route('home')); ?>" class="flex-shrink-0 flex items-center">
          <span class="text-xl font-bold text-red-600">DialySave</span>
        </a>
      </div>

      <!-- Desktop navigation -->
      <div class="hidden sm:block sm:ml-6">
        <div class="flex space-x-4">
          <a href="<?php echo e(route('home')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">Home</a>
          <a href="<?php echo e(route('team')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">Team</a>
          <a href="<?php echo e(route('location')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">Location</a>
          <a href="<?php echo e(route('contact')); ?>" class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">Contact</a>
        
        </div>
      </div>

      <!-- Right side buttons -->
      <div class="hidden sm:flex items-center space-x-4">
        <!-- Login button -->
        <a href="<?php echo e(route('login')); ?>" class="rounded-md px-4 py-2 text-sm font-medium text-red-600 hover:bg-gray-50">
          Login
        </a>
      </div>
    </div>
  </div>

  <!-- Mobile menu -->
  <div id="mobile-menu" class="hidden sm:hidden">
    <div class="px-2 pt-2 pb-3 space-y-1 bg-white shadow-lg">
      <a href="<?php echo e(route('home')); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">Home</a>
      <a href="<?php echo e(route('team')); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">Team</a>
      <a href="<?php echo e(route('location')); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">Location</a>
      <a href="<?php echo e(route('contact')); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-900">Contact</a>
    
      <a href="<?php echo e(route('login')); ?>" class="block rounded-md px-3 py-2 text-base font-medium text-red-500">Login</a>
    </div>
  </div>

  <script>
    // Mobile menu toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
      const mobileMenuButton = document.getElementById('mobile-menu-button');
      const mobileMenu = document.getElementById('mobile-menu');
      const hamburgerIcon = mobileMenuButton.querySelector('svg:first-child');
      const closeIcon = mobileMenuButton.querySelector('svg:last-child');

      mobileMenuButton.addEventListener('click', function() {
        const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
        
        // Toggle menu visibility
        mobileMenu.classList.toggle('hidden');
        
        // Update aria-expanded
        mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
        
        // Toggle icons
        hamburgerIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
        
        // Prevent body scroll when menu is open
        if (!isExpanded) {
          document.body.style.overflow = 'hidden';
        } else {
          document.body.style.overflow = '';
        }
      });

      // Close menu when clicking outside
      document.addEventListener('click', function(event) {
        const isClickInside = mobileMenuButton.contains(event.target) || mobileMenu.contains(event.target);
        
        if (!isClickInside && !mobileMenu.classList.contains('hidden')) {
          mobileMenu.classList.add('hidden');
          mobileMenuButton.setAttribute('aria-expanded', 'false');
          hamburgerIcon.classList.remove('hidden');
          closeIcon.classList.add('hidden');
          document.body.style.overflow = '';
        }
      });
    });
  </script>
</nav><?php /**PATH C:\laragon\www\DialySave\resources\views/includes/navbar-guest.blade.php ENDPATH**/ ?>