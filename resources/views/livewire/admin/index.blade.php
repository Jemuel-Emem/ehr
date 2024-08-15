<div class="flex justify-around p-6 bg-gray-100 rounded-lg shadow-md mt-8">
    <div class="bg-white p-4 rounded-lg text-center shadow-md flex-1 mx-2">
        <div class="text-gray-600 text-lg font-semibold">Total Patients</div>
        <div class="text-blue-600 text-3xl font-bold">{{ $totalPatients }}</div>
    </div>
    <div class="bg-white p-4 rounded-lg text-center shadow-md flex-1 mx-2">
        <div class="text-gray-600 text-lg font-semibold">Patients Currently Admitted</div>
        <div class="text-blue-600 text-3xl font-bold">{{ $admittedPatients }}</div>
    </div>
    <div class="bg-white p-4 rounded-lg text-center shadow-md flex-1 mx-2">
        <div class="text-gray-600 text-lg font-semibold">Patients Discharged</div>
        <div class="text-blue-600 text-3xl font-bold">{{ $dischargedPatients }}</div>
    </div>
</div>
