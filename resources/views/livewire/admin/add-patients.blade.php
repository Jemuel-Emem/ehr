<div class="max-w-8xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Add Patient</h2>
    <form wire:submit.prevent="addPatient" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                <input type="text" id="name" wire:model="name" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Enter Patient Name">
            </div>
            <div>
                <label for="dateofbirth" class="block text-gray-700 font-medium mb-2">Date of Birth</label>
                <input type="date" id="dateofbirth" wire:model="dateofbirth" class="w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div>
                <label for="contactinformation" class="block text-gray-700 font-medium mb-2">Contact Information</label>
                <input type="text" id="contactinformation" wire:model="contactinformation" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Enter Contact Information">
            </div>
            <div>
                <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                <select id="status" wire:model="status" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="Admitted for Confinement">Admitted for Confinement</option>
                    <option value="Ready for Discharge">Ready for Discharge</option>
                </select>
            </div>
        </div>
        <div>
            <label for="medicalhistory" class="block text-gray-700 font-medium mb-2">Medical History</label>
            <textarea id="medicalhistory" wire:model="medicalhistory" rows="4" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Enter Medical History"></textarea>
        </div>
        <div>
            <label for="currentmedications" class="block text-gray-700 font-medium mb-2">Current Medications</label>
            <textarea id="currentmedications" wire:model="currentmedications" rows="4" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Enter Current Medications"></textarea>
        </div>
        <div>
            <label for="allergies" class="block text-gray-700 font-medium mb-2">Allergies</label>
            <textarea id="allergies" wire:model="allergies" rows="4" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Enter Allergies"></textarea>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            {{ $editingPatient ? 'Update Patient' : 'Add Patient' }}
        </button>
    </form>

    @if (session()->has('message'))
        <div class="mt-4 p-4 bg-green-100 text-green-700 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <div class="mt-8">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Patient List</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left">Patient ID</th>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Date of Birth</th>
                    <th class="px-6 py-3 text-left">Contact Information</th>
                    <th class="px-6 py-3 text-left">Status</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr>
                        <td class="px-6 py-4">{{ $patient->patientid }}</td>
                        <td class="px-6 py-4">{{ $patient->name }}</td>
                        <td class="px-6 py-4">{{ $patient->dateofbirth->format('Y-m-d') }}</td>
                        <td class="px-6 py-4">{{ $patient->contactinformation }}</td>
                        <td class="px-6 py-4">{{ $patient->status }}</td>
                        <td class="px-6 py-4 flex space-x-2">
                            <button wire:click="editPatient({{ $patient->id }})" class="bg-yellow-500 text-white px-4 py-1 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">Edit</button>
                            <button wire:click="deletePatient({{ $patient->id }})" class="bg-red-500 text-white px-4 py-1 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
