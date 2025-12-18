<x-guest-layout>
  <div class="max-w-6xl mx-auto px-4 py-12">
    <div class="bg-gradient-to-br from-green-50 to-white rounded-3xl shadow-xl overflow-hidden">
      <div class="grid md:grid-cols-2 gap-8 p-8 md:p-12">
        <!-- Image Section -->
        <div class="flex items-center justify-center">
          <div class="relative group">
            <img 
              src="{{ asset('images/location.jpg') }}" 
              alt="San Ildefonso Dialysis Center Location"
              class="w-full h-64 md:h-80 object-cover rounded-2xl shadow-lg transform transition-transform duration-300 group-hover:scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
            <div class="absolute bottom-4 left-4 bg-red-600 text-white px-4 py-2 rounded-full text-sm font-semibold shadow-lg">
              <span class="flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Visit Us
              </span>
            </div>
          </div>
        </div>

        <!-- Text Section -->
        <div class="flex flex-col justify-center space-y-6">
          <div class="space-y-4">
            <div class="flex items-center space-x-3">
              <div class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
              </div>
              <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Our Location</h2>
            </div>
            
            <div class="space-y-3">
              <p class="text-xl md:text-2xl font-bold text-green-600">
                OLD MUNICIPAL HALL, E. VIUDEZ ST.<br>
                BRGY. POBLACION, SAN ILDEFONSO, BULACAN
              </p>
              
              <div class="flex items-center space-x-3 bg-green-50 p-4 rounded-xl">
                <svg class="w-6 h-6 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span class="text-gray-700 font-medium">Call us: 0954-284-8777</span>
              </div>
              
              <div class="flex items-center space-x-3 bg-green-50 p-4 rounded-xl">
                <svg class="w-6 h-6 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-gray-700 font-medium">Operating Hours: Monday to Friday 8:00 AM - 4:00 PM</span>
              </div>
            </div>
          </div>
          
          <div class="pt-4">
            <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-6 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center space-x-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
              </svg>
              <span>Get Directions</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>