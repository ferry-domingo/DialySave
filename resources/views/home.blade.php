<x-guest-layout>
  <div class="w-full mt-6 px-6 py-4 overflow-hidden sm:rounded-lg grid grid-cols-2 gap-4">
  <!-- Hero Section -->
  <section class="relative mb-8 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-red-900/20 to-transparent z-10"></div>
    <img src="{{ asset('images/bgi.jpg') }}" 
         alt="San Ildefonso Dialysis Center"
         class="w-full h-48 sm:h-64 md:h-96 object-cover rounded-2xl shadow-2xl transform hover:scale-105 transition-transform duration-700">
    <div class="absolute inset-0 flex items-center justify-center z-20 p-4">
      <div class="text-center text-white bg-black/30 backdrop-blur-sm p-4 rounded-2xl max-w-full mx-4">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-2 md:mb-4 drop-shadow-lg">San Ildefonso Dialysis Center</h1>
        <p class="text-lg sm:text-xl md:text-2xl font-light drop-shadow">Compassionate Care, Quality Service</p>
      </div>
    </div>
  </section>

  <!-- Main Content -->
  <main class="max-w-6xl mx-auto px-4 space-y-8 md:space-y-12">
    <!-- Operator Information -->
    <section class="bg-white/95 backdrop-blur-sm rounded-2xl p-4 sm:p-6 md:p-8 shadow-xl border border-gray-100">
      <div class="text-center">
        <div class="inline-flex items-center justify-center w-10 sm:w-12 h-10 sm:h-12 bg-red-100 rounded-full mb-2 md:mb-4">
          <svg class="w-5 sm:w-6 h-5 sm:h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
          </svg>
        </div>
        <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Operator Information</h2>
        <p class="text-base sm:text-lg text-gray-600">
          Operated by: 
          <span class="text-red-600 font-bold text-lg sm:text-xl">First Renal Dialysis Center Corp</span>
        </p>
      </div>
    </section>

    <!-- Mission Statement -->
    <section class="bg-gradient-to-r from-red-50 to-white rounded-2xl p-4 sm:p-6 md:p-8 shadow-lg border border-red-100">
      <div class="text-center">
        <div class="inline-flex items-center justify-center w-12 sm:w-16 h-12 sm:h-16 bg-red-100 rounded-full mb-2 md:mb-4">
          <svg class="w-6 sm:w-8 h-6 sm:h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </div>
        <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Our Mission</h3>
        <p class="text-lg sm:text-xl md:text-2xl text-red-600 font-semibold">Compassionate Care, Quality Service</p>
        <p class="mt-3 sm:mt-4 text-gray-700 text-sm sm:text-base md:text-lg max-w-3xl mx-auto leading-relaxed">
          We are committed to providing the highest standards of service, ensuring individualized quality care with compassion 
          to improve the lives of our dialysis patients.
        </p>
      </div>
    </section>

    <!-- Feature Sections Grid -->
    <section class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
      <!-- Feature Card 1 -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
        <img src="{{ asset('images/ds1.webp') }}" 
             alt="Safe and Comfortable Facility"
             class="w-full h-32 sm:h-48 md:h-64 object-cover">
        <div class="p-3 sm:p-6">
          <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Safe & Comfortable Space</h3>
          <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
            Providing a safe, clean, and comfortable environment for dialysis patients. 
            Your wellness is our everyday commitment.
          </p>
        </div>
      </div>

      <!-- Feature Card 2 -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
        <img src="{{ asset('images/ds2.webp') }}" 
             alt="Health Education"
             class="w-full h-32 sm:h-48 md:h-64 object-cover">
        <div class="p-3 sm:p-6">
          <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Health Education Programs</h3>
          <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
            We regularly conduct patient orientations and health talks to guide our dialysis patients 
            and their families. Together, we promote awareness and improved quality of life.
          </p>
        </div>
      </div>

      <!-- Feature Card 3 -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
        <img src="{{ asset('images/ds3.jpg') }}" 
             alt="Educational Resources"
             class="w-full h-32 sm:h-48 md:h-64 object-cover">
        <div class="p-3 sm:p-6">
          <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Knowledge Resources</h3>
          <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
            Our pamphlets, guides, and health resources help you understand kidney care and 
            prevent complications that may lead to dialysis.
          </p>
        </div>
      </div>

      <!-- Feature Card 4 -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
        <img src="{{ asset('images/ds4.webp') }}" 
             alt="Medical Team"
             class="w-full h-32 sm:h-48 md:h-64 object-cover">
        <div class="p-3 sm:p-6">
          <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-2">Our Dedicated Team</h3>
          <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
            Meet our compassionate doctors and hardworking staff who provide safe, reliable, 
            and patient-centered dialysis care every day.
          </p>
        </div>
      </div>
    </section>
  </main>

  <!-- Footer Separator -->
  <footer class="mt-8 sm:mt-16 border-t-2 border-gray-800">
    <div class="max-w-6xl mx-auto px-4 py-4 sm:py-8 text-center text-gray-600 text-sm sm:text-base">
      <p>&copy; {{ date('Y') }} San Ildefonso Dialysis Center. All rights reserved.</p>
    </div>
  </footer>
  
  </div>

</x-guest-layout>