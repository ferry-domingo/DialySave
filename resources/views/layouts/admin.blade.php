  <div class="flex-1 flex flex-col">
    <!-- Top Navbar -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-purple-700">Dashboard</h1>
      <div class="flex items-center gap-4">
        <input type="text" placeholder="Search..." class="px-4 py-2 border rounded-lg">
        <div class="w-10 h-10 rounded-full bg-purple-500 flex items-center justify-center text-white font-bold">SR</div>
      </div>
    </header>

    <!-- Content -->
    <main class="p-6 space-y-6">
<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
  <div class="bg-white p-6 rounded-lg shadow-md">
    <p class="text-sm text-gray-500">Total Patients</p>
    <h2 class="text-3xl font-bold text-purple-700 mt-2">240</h2>
  </div>
  <div class="bg-white p-6 rounded-lg shadow-md">
    <p class="text-sm text-gray-500">Today Sessions</p>
    <h2 class="text-3xl font-bold text-green-600 mt-2">32</h2>
  </div>
  <div class="bg-white p-6 rounded-lg shadow-md">
    <p class="text-sm text-gray-500">Available Stations</p>
    <h2 class="text-3xl font-bold text-blue-600 mt-2">8/12</h2>
  </div>
  <div class="bg-white p-6 rounded-lg shadow-md">
    <p class="text-sm text-gray-500">Alerts</p>
    <h2 class="text-3xl font-bold text-red-500 mt-2">2</h2>
  </div>
</div>

<div class="bg-white rounded-lg shadow-md">
  <div class="p-4 border-b font-bold text-purple-700">User List</div>
  <table class="w-full text-left">
    <thead class="bg-purple-50">
      <tr>
        <th class="p-4">Name</th>
        <th class="p-4">Email</th>
        <th class="p-4">Role</th>
        <th class="p-4">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr class="border-t">
        <td class="p-4">John Doe</td>
        <td class="p-4">john@example.com</td>
        <td class="p-4">Admin</td>
        <td class="p-4 text-green-600 font-bold">Active</td>
      </tr>
      <tr class="border-t">
        <td class="p-4">Jane Smith</td>
        <td class="p-4">jane@example.com</td>
        <td class="p-4">Editor</td>
        <td class="p-4 text-yellow-500 font-bold"><a href="">edit</a></td>
          <td class="p-4 text-yellow-500 font-bold"><a href="">delete</a></td>
      </tr>
    </tbody>
  </table>
</div>

<div class="bg-white p-6 rounded-lg shadow-md grid grid-cols-2 md:grid-cols-4 gap-4">
  <button class="bg-purple-600 text-white py-3 rounded-lg shadow hover:bg-purple-700">Add User</button>
  <button class="bg-blue-600 text-white py-3 rounded-lg shadow hover:bg-blue-700">Export Data</button>
  <button class="bg-green-600 text-white py-3 rounded-lg shadow hover:bg-green-700">Generate Report</button>
  <button class="bg-red-600 text-white py-3 rounded-lg shadow hover:bg-red-700">Delete Records</button>
</div>