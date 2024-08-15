<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Patient Records</h2>


    <div class="mb-4 flex space-x-2">
        <input type="text" wire:model.debounce.300ms="search" placeholder="Search patients..." class="w-full p-2 border border-gray-300 rounded-md">
        <button wire:click="searchPatients" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Search
        </button>
    </div>


    <table class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
        <thead class="bg-gray-100 text-gray-700">
            <tr>
                <th class="px-6 py-3 text-left">Patient ID</th>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Date of Birth</th>
                <th class="px-6 py-3 text-left">Contact Information</th>
                <th class="px-6 py-3 text-left">Medical History</th>
                <th class="px-6 py-3 text-left">Current Medications</th>
                <th class="px-6 py-3 text-left">Allergies</th>
                <th class="px-6 py-3 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($patients as $patient)
                <tr>
                    <td class="px-6 py-4">{{ $patient->patientid }}</td>
                    <td class="px-6 py-4">{{ $patient->name }}</td>
                    <td class="px-6 py-4">{{ $patient->dateofbirth->format('Y-m-d') }}</td>
                    <td class="px-6 py-4">{{ $patient->contactinformation }}</td>
                    <td class="px-6 py-4">{{ $patient->medicalhistory }}</td>
                    <td class="px-6 py-4">{{ $patient->currentmedications }}</td>
                    <td class="px-6 py-4">{{ $patient->allergies }}</td>
                    <td class="px-6 py-4">{{ $patient->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center">No patients found</td>
                </tr>
            @endforelse
        </tbody>
    </table>


    <div class="mt-4">
        {{ $patients->links() }}
    </div>
</div>
