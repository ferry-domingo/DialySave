<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50  flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 transform transition-all duration-300 scale-95 opacity-0"
        id="modalContent">
        <div class="p-6">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center">
                    <div class="p-3 bg-red-100 rounded-full mr-4">
                        <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Confirm Deletion</h3>
                </div>
                <button onclick="closeDeleteModal()" class="text-gray-400 hover:text-gray-500 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Content -->
            <div class="mb-6">
                <p class="text-gray-600 mb-2">Are you sure you want to delete this item?</p>
                <p class="text-sm text-gray-500">This action cannot be undone. All associated data will be
                    permanently removed.</p>
            </div>

            <!-- Patient Info (if available) -->
            <div id="patientInfo" class="bg-gray-50 rounded-lg p-4 mb-6 hidden">
                <p class="text-sm font-medium text-gray-700 mb-1">Patient Details:</p>
                <p class="text-sm text-gray-600" id="patientDetails"></p>
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-3">
                <button onclick="closeDeleteModal()"
                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                    Cancel
                </button>
                <button onclick="confirmDelete()"
                    class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 flex items-center">
                    <i class="fas fa-trash-alt mr-2"></i>
                    Delete
                </button>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\DialySave\resources\views/components/delete-button-modal.blade.php ENDPATH**/ ?>