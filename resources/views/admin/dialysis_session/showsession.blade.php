<x-app-layout>
  @role('admin')
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Header Section -->
      <div class="mb-10">
        <div class="flex justify-between items-start">
          <div>
            <h1 class="text-3xl font-bold text-gray-900">Dialysis Sessions</h1>
            <p class="mt-2 text-gray-600">Manage dialysis sessions and track patient treatments</p>
          </div>
          @can('add dialysis_session')
            <a href="{{ route('sessions.create') }}"
              class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
              <i class="fas fa-plus mr-2"></i> Add Session
            </a>
          @endcan
        </div>
      </div>

      <!-- Printable Report Section -->
      <div class="bg-white rounded-xl shadow-xl p-10 mb-8 border border-gray-200" id="dialysisReport">
        <!-- Header Information -->
        <div class="border-b-3 border-blue-600 pb-6 mb-8">
          <div class="flex justify-between items-start">
            <div>
              <h2 class="text-3xl font-bold text-blue-800">San Ildefonso Dialysis Center</h2>
              <p class="text-gray-600 mt-2 text-lg">Or# {{ $session->or_number }}</p>
            </div>
            <div class="text-right">
              <p class="text-gray-600 text-lg">Date: {{ now()->format('F d, Y') }}</p>
              <p class="text-gray-600">Time: {{ now('Asia/Manila')->format('h:i A') }}</p>
            </div>
          </div>
        </div>

        <!-- Patient Information -->
        <div class="mb-10">
          <h3 class="text-2xl font-bold text-gray-800 mb-6 pb-3 border-b-2 border-gray-300 flex items-center">
            <i class="fas fa-user-circle mr-3 text-blue-600"></i>
            Patient Information
          </h3>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
              <div class="flex items-start">
                <span class="font-semibold text-gray-700 w-24">Name:</span>
                <span class="text-gray-800 text-lg">{{ $session->patient->full_name }}</span>
              </div>
              <div class="flex items-start">
                <span class="font-semibold text-gray-700 w-24">Age:</span>
                <span
                  class="text-gray-800 text-lg">{{ \Carbon\Carbon::parse($session->patient->birthdate)->age }}</span>
              </div>
              <div class="flex items-start">
                <span class="font-semibold text-gray-700 w-24">Gender:</span>
                <span class="text-gray-800 text-lg">{{ $session->patient->gender }}</span>
              </div>
            </div>
            <div class="space-y-4">
              <div class="flex items-start">
                <span class="font-semibold text-gray-700 w-24">Contact:</span>
                <span class="text-gray-800 text-lg">{{ $session->patient->contact_no }}</span>
              </div>
              <div class="flex items-start">
                <span class="font-semibold text-gray-700 w-24">Blood Type:</span>
                <span class="text-gray-800 text-lg">{{ $session->patient->blood_type }}</span>
              </div>
              <div class="flex items-start">
                <span class="font-semibold text-gray-700 w-24">Medical Condition:</span>
                <span class="text-gray-800 text-lg">{{ $session->patient->medical_conditions }}</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Vital Signs -->
        <div class="mb-10">
          <h3 class="text-2xl font-bold text-gray-800 mb-6 pb-3 border-b-2 border-gray-300 flex items-center">
            <i class="fas fa-heartbeat mr-3 text-red-500"></i>
            Vital Signs
          </h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <div class="bg-gradient-to-br from-red-50 to-red-100 p-5 rounded-xl shadow-sm border border-red-200">
              <div class="text-red-600 font-semibold text-sm uppercase tracking-wide mb-1">Blood Pressure</div>
              <div class="text-2xl font-bold text-red-800">{{ $session->vital_sign->blood_pressure ?? '' }}</div>
              <div class="text-xs text-red-500 mt-1">mmHg</div>
            </div>
            <div class="bg-gradient-to-br from-pink-50 to-pink-100 p-5 rounded-xl shadow-sm border border-pink-200">
              <div class="text-pink-600 font-semibold text-sm uppercase tracking-wide mb-1">Heart Rate</div>
              <div class="text-2xl font-bold text-pink-800">{{ $session->vital_sign->heart_rate ?? '' }}</div>
              <div class="text-xs text-pink-500 mt-1">beats/min</div>
            </div>
            <div
              class="bg-gradient-to-br from-orange-50 to-orange-100 p-5 rounded-xl shadow-sm border border-orange-200">
              <div class="text-orange-600 font-semibold text-sm uppercase tracking-wide mb-1">Temperature</div>
              <div class="text-2xl font-bold text-orange-800">{{ $session->vital_sign->temperature ?? '' }}</div>
              <div class="text-xs text-orange-500 mt-1">°C</div>
            </div>
            <div class="bg-gradient-to-br from-teal-50 to-teal-100 p-5 rounded-xl shadow-sm border border-teal-200">
              <div class="text-teal-600 font-semibold text-sm uppercase tracking-wide mb-1">Respiratory Rate</div>
              <div class="text-2xl font-bold text-teal-800">{{ $session->vital_sign->respiratory_rate ?? '' }}</div>
              <div class="text-xs text-teal-500 mt-1">breaths/min</div>
            </div>
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-5 rounded-xl shadow-sm border border-blue-200">
              <div class="text-blue-600 font-semibold text-sm uppercase tracking-wide mb-1">Weight Before</div>
              <div class="text-2xl font-bold text-blue-800">{{ $session->vital_sign->weight_before ?? '' }}</div>
              <div class="text-xs text-blue-500 mt-1">kg</div>
            </div>
            <div
              class="bg-gradient-to-br from-purple-50 to-purple-100 p-5 rounded-xl shadow-sm border border-purple-200">
              <div class="text-purple-600 font-semibold text-sm uppercase tracking-wide mb-1">Weight After</div>
              <div class="text-2xl font-bold text-purple-800">{{ $session->vital_sign->weight_after ?? '' }}</div>
              <div class="text-xs text-purple-500 mt-1">kg</div>
            </div>
          </div>
        </div>

        <!-- Laboratory Results -->
        <div class="mb-10">
          <h3 class="text-2xl font-bold text-gray-800 mb-6 pb-3 border-b-2 border-gray-300 flex items-center">
            <i class="fas fa-vial mr-3 text-green-600"></i>
            Laboratory Results
          </h3>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <div class="bg-gradient-to-br from-green-50 to-green-100 p-5 rounded-xl shadow-sm border border-green-200">
              <div class="text-green-600 font-semibold text-sm uppercase tracking-wide mb-1">Hemoglobin</div>
              <div class="text-2xl font-bold text-green-800">{{ $session->lab_result->hemoglobin ?? '' }}</div>
              <div class="text-xs text-green-500 mt-1">g/dL</div>
            </div>
            <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-5 rounded-xl shadow-sm border border-cyan-200">
              <div class="text-cyan-600 font-semibold text-sm uppercase tracking-wide mb-1">Creatinine</div>
              <div class="text-2xl font-bold text-cyan-800">{{ $session->lab_result->creatinine ?? ''}}</div>
              <div class="text-xs text-cyan-500 mt-1">mg/dL</div>
            </div>
            <div
              class="bg-gradient-to-br from-indigo-50 to-indigo-100 p-5 rounded-xl shadow-sm border border-indigo-200">
              <div class="text-indigo-600 font-semibold text-sm uppercase tracking-wide mb-1">Potassium</div>
              <div class="text-2xl font-bold text-indigo-800">{{ $session->lab_result->potassium ?? ''}}</div>
              <div class="text-xs text-indigo-500 mt-1">mmol/L</div>
            </div>
            <div
              class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-5 rounded-xl shadow-sm border border-yellow-200">
              <div class="text-yellow-600 font-semibold text-sm uppercase tracking-wide mb-1">Remarks</div>
              <div class="text-lg font-semibold text-yellow-800">{{ $session->lab_result->remarks ?? '' }}</div>
              <div class="text-xs text-yellow-500 mt-1">Notes</div>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="border-t-2 border-gray-300 pt-6 text-center text-gray-600">
          <p class="text-sm">San Ildefonso Dialysis Center</p>
          <p class="text-sm">Report generated on {{ now()->format('F d, Y h:i A') }}</p>
        </div>

        <!-- Print Button -->
        <div class="text-center mt-8">
          <button onclick="printReport()"
            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
            <i class="fas fa-print mr-3"></i> Print Report
          </button>
          <button onclick="downloadPDF()"
            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-gray-600 to-gray-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 ml-4">
            <i class="fas fa-file-pdf mr-3"></i> Download PDF
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Libraries -->
  <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <!-- Print and PDF Functions -->
  <script>
    async function printReport() {
      // Show loading
      const button = event.target.closest('button');
      const originalHTML = button.innerHTML;
      button.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i> Preparing Print...';
      button.disabled = true;

      try {
        // Get the element
        const element = document.getElementById('dialysisReport');

        // Use html2canvas to capture the element
        const canvas = await html2canvas(element, {
          scale: 2,
          useCORS: true,
          logging: false,
          backgroundColor: '#ffffff',
          windowWidth: 1200,
          onclone: (clonedDoc) => {
            const clonedElement = clonedDoc.getElementById('dialysisReport');

            // Remove buttons
            const buttons = clonedElement.querySelectorAll('button');
            buttons.forEach(btn => btn.style.display = 'none');

            // Remove boxes and backgrounds
            const gradients = clonedElement.querySelectorAll('[class*="bg-gradient"]');
            gradients.forEach(el => {
              el.style.background = 'white';
              el.style.border = 'none';
              el.style.boxShadow = 'none';
              el.style.borderRadius = '0';
            });

            // Remove colored borders
            const borders = clonedElement.querySelectorAll('[class*="border-red"], [class*="border-pink"], [class*="border-orange"], [class*="border-teal"], [class*="border-blue"], [class*="border-purple"], [class*="border-green"], [class*="border-cyan"], [class*="border-indigo"], [class*="border-yellow"]');
            borders.forEach(el => {
              el.style.border = 'none';
              el.style.background = 'white';
            });

            // Make all colored text black
            const coloredTexts = clonedElement.querySelectorAll('[class*="text-red-"], [class*="text-pink-"], [class*="text-orange-"], [class*="text-teal-"], [class*="text-blue-"], [class*="text-purple-"], [class*="text-green-"], [class*="text-cyan-"], [class*="text-indigo-"], [class*="text-yellow-"]');
            coloredTexts.forEach(el => {
              el.style.color = '#000';
            });

            // Hide icons
            const icons = clonedElement.querySelectorAll('i, .fas, .fa');
            icons.forEach(icon => {
              icon.style.display = 'none';
            });
          }
        });

        // Convert canvas to image
        const imgData = canvas.toDataURL('image/png');

        // Create print window
        const printWindow = window.open('', '_blank');

        printWindow.document.write(`
      <!DOCTYPE html>
      <html>
      <head>
        <meta charset="UTF-8">
        <title>Dialysis Report - Print</title>
        <style>
          * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
          }
          
          body {
            margin: 0;
            padding: 0;
            background: white;
          }
          
          img {
            width: 100%;
            height: auto;
            display: block;
          }
          
          @media print {
            @page {
              margin: 0.5cm;
              size: A4 portrait;
            }
            
            body {
              margin: 0;
              padding: 0;
            }
            
            img {
              max-width: 100%;
              height: auto;
              page-break-inside: avoid;
            }
          }
        </style>
      </head>
      <body>
        <img src="${imgData}" alt="Dialysis Report" />
      </body>
      </html>
    `);

        printWindow.document.close();

        // Wait for image to load then print
        printWindow.onload = function () {
          setTimeout(() => {
            printWindow.focus();
            printWindow.print();
            printWindow.close();
          }, 500);
        };

      } catch (error) {
        console.error('Print Error:', error);
        alert('Failed to prepare print. Error: ' + error.message);
      } finally {
        // Restore button
        button.innerHTML = originalHTML;
        button.disabled = false;
      }
    }


    async function downloadPDF() {
      // Show loading
      const button = event.target.closest('button');
      const originalHTML = button.innerHTML;
      button.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i> Generating PDF...';
      button.disabled = true;

      try {
        // Import jsPDF if needed
        const { jsPDF } = window.jspdf;

        // Get the element
        const element = document.getElementById('dialysisReport');

        // Use html2canvas to capture the element
        const canvas = await html2canvas(element, {
          scale: 2,
          useCORS: true,
          logging: false,
          backgroundColor: '#ffffff',
          windowWidth: 1200,
          onclone: (clonedDoc) => {
            const clonedElement = clonedDoc.getElementById('dialysisReport');

            // Remove buttons
            const buttons = clonedElement.querySelectorAll('button');
            buttons.forEach(btn => btn.style.display = 'none');

            // Remove boxes and backgrounds
            const gradients = clonedElement.querySelectorAll('[class*="bg-gradient"]');
            gradients.forEach(el => {
              el.style.background = 'white';
              el.style.border = 'none';
              el.style.boxShadow = 'none';
              el.style.borderRadius = '0';
            });

            // Remove colored borders
            const borders = clonedElement.querySelectorAll('[class*="border-red"], [class*="border-pink"], [class*="border-orange"], [class*="border-teal"], [class*="border-blue"], [class*="border-purple"], [class*="border-green"], [class*="border-cyan"], [class*="border-indigo"], [class*="border-yellow"]');
            borders.forEach(el => {
              el.style.border = 'none';
              el.style.background = 'white';
            });

            // Make all colored text black
            const coloredTexts = clonedElement.querySelectorAll('[class*="text-red-"], [class*="text-pink-"], [class*="text-orange-"], [class*="text-teal-"], [class*="text-blue-"], [class*="text-purple-"], [class*="text-green-"], [class*="text-cyan-"], [class*="text-indigo-"], [class*="text-yellow-"]');
            coloredTexts.forEach(el => {
              el.style.color = '#000';
            });

            // Hide icons
            const icons = clonedElement.querySelectorAll('i, .fas, .fa');
            icons.forEach(icon => {
              icon.style.display = 'none';
            });
          }
        });

        // Calculate PDF dimensions
        const imgWidth = 210; // A4 width in mm
        const imgHeight = (canvas.height * imgWidth) / canvas.width;

        // Create PDF
        const pdf = new jsPDF({
          orientation: imgHeight > imgWidth ? 'portrait' : 'portrait',
          unit: 'mm',
          format: 'a4'
        });

        // Add image to PDF
        const imgData = canvas.toDataURL('image/jpeg', 0.95);

        // Check if content fits in one page
        const pageHeight = 297; // A4 height in mm
        let heightLeft = imgHeight;
        let position = 0;

        // Add first page
        pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
        heightLeft -= pageHeight;

        // Add additional pages if needed
        while (heightLeft > 0) {
          position = heightLeft - imgHeight;
          pdf.addPage();
          pdf.addImage(imgData, 'JPEG', 0, position, imgWidth, imgHeight);
          heightLeft -= pageHeight;
        }

        // Save PDF
        const orNumber = document.querySelector('#dialysisReport p').textContent.match(/Or#\s*(\d+)/)?.[1] || 'Report';
        pdf.save(`Dialysis_Report_OR${orNumber}_${Date.now()}.pdf`);

      } catch (error) {
        console.error('PDF Generation Error:', error);
        alert('Failed to generate PDF. Error: ' + error.message);
      } finally {
        // Restore button
        button.innerHTML = originalHTML;
        button.disabled = false;
      }
    }
  </script>

  @endrole
</x-app-layout>