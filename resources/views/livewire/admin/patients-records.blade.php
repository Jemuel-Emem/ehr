<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Patient Records</h2>

    <button id="download-pdf" class="inline-block bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 mb-4">
        Download Records
    </button>

    <table id="patients-table" class="min-w-full bg-white border border-gray-300 rounded-md shadow-sm">
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
                    <td class="px-6 py-4">{{ $patient->medicalhistory }}</td>
                    <td class="px-6 py-4">{{ $patient->currentmedications }}</td>
                    <td class="px-6 py-4">{{ $patient->allergies }}</td>
                    <td class="px-6 py-4">{{ $patient->status }}</td>
                    <td class="px-6 py-4">
                        @if($patient->status === 'Admitted for Confinement')
                            <button wire:click="dischargePatient({{ $patient->id }})" class="bg-yellow-500 text-white px-4 py-2 rounded-md hover:bg-yellow-600">
                                Discharge
                            </button>
                        @else
                            <span class="text-gray-500">Discharged</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $patients->links() }}
    </div>

    <script>
        document.getElementById('download-pdf').addEventListener('click', function() {

            const element = document.getElementById('patients-table');

            const options = {
                margin: 0.5,
                filename: 'patient_records.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };

            html2pdf().from(element).set(options).save();
        });
    </script>
</div>
