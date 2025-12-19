<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  
  <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-4 sm:py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <!-- Header Section -->
      <div class="mb-6 sm:mb-10">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
          <div class="text-center sm:text-left">
            <h1 class="text-xl sm:text-3xl font-bold text-gray-900">Dialysis Sessions</h1>
            <p class="mt-1 sm:mt-2 text-sm sm:text-base text-gray-600">Manage dialysis sessions and track patient treatments</p>
          </div>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add dialysis_session')): ?>
            <a href="<?php echo e(route('sessions.create')); ?>"
              class="inline-flex items-center justify-center px-4 sm:px-5 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200 w-full sm:w-auto">
              <i class="fas fa-plus mr-2 sm:mr-2"></i> <span class="text-sm sm:text-base">Add Session</span>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- Printable Report Section -->
      <div class="bg-white rounded-xl shadow-xl p-4 sm:p-10 mb-6 sm:mb-8 border border-gray-200" id="dialysisReport">
        <!-- Header Information -->
        <div class="border-b-3 border-blue-600 pb-4 sm:pb-6 mb-6 sm:mb-8">
          <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
            <div class="text-center sm:text-left">
              <h2 class="text-xl sm:text-3xl font-bold text-blue-800">San Ildefonso Dialysis Center</h2>
              
            </div>
            <div class="text-center sm:text-right">
              <p class="text-gray-600 text-base sm:text-lg">Date: <?php echo e(now()->format('F d, Y')); ?></p>
              <p class="text-gray-600">Time: <?php echo e(now('Asia/Manila')->format('h:i A')); ?></p>
            </div>
          </div>
        </div>

        <!-- Patient Information -->
        <div class="mb-6 sm:mb-10">
          <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6 pb-3 border-b-2 border-gray-300 flex items-center">
            <i class="fas fa-user-circle mr-3 sm:mr-3 text-blue-600"></i>
            <span class="text-sm sm:text-base">Patient Information</span>
          </h3>
          <?php if($session->patient): ?>
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-6">
            <div class="space-y-3 sm:space-y-4">
              <div class="flex flex-col sm:flex-row sm:items-start">
                <span class="font-semibold text-gray-700 w-20 sm:w-24 text-sm sm:text-base">Name:</span>
                <span class="text-gray-800 text-sm sm:text-lg"><?php echo e($session->patient->full_name); ?></span>
              </div>
              <div class="flex flex-col sm:flex-row sm:items-start">
                <span class="font-semibold text-gray-700 w-20 sm:w-24 text-sm sm:text-base">Age:</span>
                <span class="text-gray-800 text-sm sm:text-lg"><?php echo e(\Carbon\Carbon::parse($session->patient->birthdate)->age); ?></span>
              </div>
              <div class="flex flex-col sm:flex-row sm:items-start">
                <span class="font-semibold text-gray-700 w-20 sm:w-24 text-sm sm:text-base">Gender:</span>
                <span class="text-gray-800 text-sm sm:text-lg"><?php echo e($session->patient->gender); ?></span>
              </div>
            </div>
            <div class="space-y-3 sm:space-y-4">
              <div class="flex flex-col sm:flex-row sm:items-start">
                <span class="font-semibold text-gray-700 w-20 sm:w-24 text-sm sm:text-base">Contact:</span>
                <span class="text-gray-800 text-sm sm:text-lg"><?php echo e($session->patient->contact_no); ?></span>
              </div>
              <div class="flex flex-col sm:flex-row sm:items-start">
                <span class="font-semibold text-gray-700 w-20 sm:w-24 text-sm sm:text-base">Blood Type:</span>
                <span class="text-gray-800 text-sm sm:text-lg"><?php echo e($session->patient->blood_type); ?></span>
              </div>
              <div class="flex flex-col sm:flex-row sm:items-start">
                <span class="font-semibold text-gray-700 w-20 sm:w-24 text-sm sm:text-base">Medical Condition:</span>
                <span class="text-gray-800 text-sm sm:text-lg"><?php echo e($session->patient->medical_conditions); ?></span>
              </div>
            </div>
          </div>
          <?php else: ?>
          <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
            <p class="text-yellow-800 text-sm sm:text-base">Patient information is not available for this session.</p>
          </div>
          <?php endif; ?>
        </div>

        <!-- Vital Signs -->
        <div class="mb-6 sm:mb-10">
          <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6 pb-3 border-b-2 border-gray-300 flex items-center">
            <i class="fas fa-heartbeat mr-3 sm:mr-3 text-red-500"></i>
            <span class="text-sm sm:text-base">Vital Signs</span>
          </h3>
          <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-5">
            <div class="bg-gradient-to-br from-red-50 to-red-100 p-3 sm:p-5 rounded-xl shadow-sm border border-red-200">
              <div class="text-red-600 font-semibold text-xs sm:text-sm uppercase tracking-wide mb-1">Blood Pressure</div>
              <div class="text-lg sm:text-2xl font-bold text-red-800"><?php echo e($session->vital_sign->blood_pressure ?? ''); ?></div>
              <div class="text-xs text-red-500 mt-1">mmHg</div>
            </div>
            <div class="bg-gradient-to-br from-pink-50 to-pink-100 p-3 sm:p-5 rounded-xl shadow-sm border border-pink-200">
              <div class="text-pink-600 font-semibold text-xs sm:text-sm uppercase tracking-wide mb-1">Heart Rate</div>
              <div class="text-lg sm:text-2xl font-bold text-pink-800"><?php echo e($session->vital_sign->heart_rate ?? ''); ?></div>
              <div class="text-xs text-red-500 mt-1">beats/min</div>
            </div>
            <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-3 sm:p-5 rounded-xl shadow-sm border border-orange-200">
              <div class="text-orange-600 font-semibold text-xs sm:text-sm uppercase tracking-wide mb-1">Temperature</div>
              <div class="text-lg sm:text-2xl font-bold text-orange-800"><?php echo e($session->vital_sign->temperature ?? ''); ?></div>
              <div class="text-xs text-red-500 mt-1">°C</div>
            </div>
            <div class="bg-gradient-to-br from-teal-50 to-teal-100 p-3 sm:p-5 rounded-xl shadow-sm border border-teal-200">
              <div class="text-teal-600 font-semibold text-xs sm:text-sm uppercase tracking-wide mb-1">Respiratory Rate</div>
              <div class="text-lg sm:text-2xl font-bold text-teal-800"><?php echo e($session->vital_sign->respiratory_rate ?? ''); ?></div>
              <div class="text-xs text-red-500 mt-1">breaths/min</div>
            </div>
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-3 sm:p-5 rounded-xl shadow-sm border border-blue-200">
              <div class="text-blue-600 font-semibold text-xs sm:text-sm uppercase tracking-wide mb-1">Weight Before</div>
              <div class="text-lg sm:text-2xl font-bold text-blue-800"><?php echo e($session->vital_sign->weight_before ?? ''); ?></div>
              <div class="text-xs text-red-500 mt-1">kg</div>
            </div>
            <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-3 sm:p-5 rounded-xl shadow-sm border border-purple-200">
              <div class="text-purple-600 font-semibold text-xs sm:text-sm uppercase tracking-wide mb-1">Weight After</div>
              <div class="text-lg sm:text-2xl font-bold text-purple-800"><?php echo e($session->vital_sign->weight_after ?? ''); ?></div>
              <div class="text-xs text-red-500 mt-1">kg</div>
            </div>
          </div>
        </div>

        <!-- Laboratory Results -->
        <div class="mb-6 sm:mb-10">
          <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4 sm:mb-6 pb-3 border-b-2 border-gray-300 flex items-center">
            <i class="fas fa-vial mr-3 sm:mr-3 text-green-600"></i>
            <span class="text-sm sm:text-base">Laboratory Results</span>
          </h3>
          <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5">
            <div class="bg-gradient-to-br from-green-50 to-green-100 p-3 sm:p-5 rounded-xl shadow-sm border border-green-200">
              <div class="text-green-600 font-semibold text-xs sm:text-sm uppercase tracking-wide mb-1">Hemoglobin</div>
              <div class="text-lg sm:text-2xl font-bold text-green-800"><?php echo e($session->lab_result->hemoglobin ?? ''); ?></div>
              <div class="text-xs text-green-500 mt-1">g/dL</div>
            </div>
            <div class="bg-gradient-to-br from-cyan-50 to-cyan-100 p-3 sm:p-5 rounded-xl shadow-sm border border-cyan-200">
              <div class="text-cyan-600 font-semibold text-xs sm:text-sm uppercase tracking-wide mb-1">Creatinine</div>
              <div class="text-lg sm:text-2xl font-bold text-cyan-800"><?php echo e($session->lab_result->creatinine ?? ''); ?></div>
              <div class="text-xs text-cyan-500 mt-1">mg/dL</div>
            </div>
            <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 p-3 sm:p-5 rounded-xl shadow-sm border border-indigo-200">
              <div class="text-indigo-600 font-semibold text-xs sm:text-sm uppercase tracking-wide mb-1">Potassium</div>
              <div class="text-lg sm:text-2xl font-bold text-indigo-800"><?php echo e($session->lab_result->potassium ?? ''); ?></div>
              <div class="text-xs text-indigo-500 mt-1">mmol/L</div>
            </div>
            <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 p-3 sm:p-5 rounded-xl shadow-sm border border-yellow-200">
              <div class="text-yellow-600 font-semibold text-xs sm:text-sm uppercase tracking-wide mb-1">Remarks</div>
              <div class="text-base sm:text-lg font-semibold text-yellow-800"><?php echo e($session->lab_result->remarks ?? ''); ?></div>
              <div class="text-xs text-yellow-500 mt-1">Notes</div>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="border-t-2 border-gray-300 pt-4 sm:pt-6 text-center text-gray-600">
          <p class="text-xs sm:text-sm">San Ildefonso Dialysis Center</p>
          <p class="text-xs sm:text-sm">Report generated on <?php echo e(now()->format('F d, Y h:i A')); ?></p>
        </div>

        <!-- Print Button -->
        <div class="text-center mt-6 sm:mt-8">
          <button onclick="printReport()"
            class="inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 w-full sm:w-auto mb-3 sm:mb-0">
            <i class="fas fa-print mr-2 sm:mr-3"></i> <span class="text-sm sm:text-base">Print Report</span>
          </button>
          <button onclick="downloadPDF()"
            class="inline-flex items-center justify-center px-6 sm:px-8 py-3 sm:py-4 bg-gradient-to-r from-gray-600 to-gray-700 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 w-full sm:w-auto">
            <i class="fas fa-file-pdf mr-2 sm:mr-3"></i> <span class="text-sm sm:text-base">Download PDF</span>
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
      button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2 sm:mr-3"></i> <span class="text-sm sm:text-base">Preparing Print...</span>';
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            font-size: 14px;
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
          
          @media screen and (max-width: 768px) {
            body {
              font-size: 12px;
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
      button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2 sm:mr-3"></i> <span class="text-sm sm:text-base">Generating PDF...</span>';
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

  
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\DialySave\resources\views/patient/showsession.blade.php ENDPATH**/ ?>