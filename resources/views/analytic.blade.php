@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <main class="p-6 space-y-6">
        {{-- Top Summary Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-gradient-to-r from-pink-500 to-pink-400 text-white rounded-2xl shadow px-4 py-6 min-w-[180px]">
                <h3 class="text-sm font-medium">Revenue Status</h3>
                <p class="text-2xl font-bold mt-2">$432</p>
                <p class="text-xs mt-1">Jan 01 - 10</p>
            </div>
            <div
                class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white rounded-2xl shadow px-4 py-6 min-w-[180px]">
                <h3 class="text-sm font-medium">Page View</h3>
                <p class="text-2xl font-bold mt-2">$432</p>
            </div>
            <div class="bg-gradient-to-r from-sky-500 to-blue-500 text-white rounded-2xl shadow px-4 py-6 min-w-[180px]">
                <h3 class="text-sm font-medium">Bounce Rate</h3>
                <p class="text-2xl font-bold mt-2">$432</p>
            </div>
            <div
                class="bg-gradient-to-r from-orange-500 to-yellow-400 text-white rounded-2xl shadow px-4 py-6 min-w-[180px]">
                <h3 class="text-sm font-medium">Revenue Status</h3>
                <p class="text-2xl font-bold mt-2">$432</p>
                <p class="text-xs mt-1">Jan 01 - 10</p>
            </div>
        </div>

        {{-- Charts Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow">
                <h3 class="font-semibold mb-4">Monthly Report</h3>
                <canvas id="lineChart" height="120"></canvas>
            </div>
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-semibold mb-4">Traffic</h3>
                <canvas id="donutChart" height="120"></canvas>
            </div>
        </div>

        {{-- Bottom Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            {{-- Recent Activities --}}
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-semibold mb-4">Recent Activities</h3>
                <ul class="space-y-4 text-sm">
                    <li><span class="text-pink-500 font-bold">•</span> Nikola updated a task</li>
                    <li><span class="text-blue-500 font-bold">•</span> Prekash added a new deal</li>
                    <li><span class="text-green-500 font-bold">•</span> Russell published an article</li>
                    <li><span class="text-yellow-500 font-bold">•</span> David updated a document</li>
                    <li><span class="text-lime-500 font-bold">•</span> Jonathan added a comment</li>
                </ul>
            </div>

            {{-- Order Status Table --}}
            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="font-semibold mb-4">Order Status</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="text-left px-4 py-2">Customer</th>
                                <th class="text-left px-4 py-2">Country</th>
                                <th class="text-left px-4 py-2">Price</th>
                                <th class="text-left px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2">Charlie Davis</td>
                                <td class="px-4 py-2">Brazil</td>
                                <td class="px-4 py-2">$299</td>
                                <td class="px-4 py-2"><span class="text-green-600 font-semibold">Paid</span></td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Sunil Choudha</td>
                                <td class="px-4 py-2">Japan</td>
                                <td class="px-4 py-2">$420</td>
                                <td class="px-4 py-2"><span class="text-yellow-500 font-semibold">Pending</span></td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Desigh David</td>
                                <td class="px-4 py-2">Russia</td>
                                <td class="px-4 py-2">$801</td>
                                <td class="px-4 py-2"><span class="text-red-500 font-semibold">Declined</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let wallets = @json($wallets);
        console.log(wallets);

        const donutCtx = document.getElementById('donutChart').getContext('2d');
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        const labelsData = wallets.map(item => item.formatted_date);
        const dataPoints = wallets.map(item => item.jumlah);

        const lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: labelsData,
                datasets: [{
                    data: dataPoints,
                    fill: false,
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    segment: {
                        borderColor: ctx => {
                            const i = ctx.p0DataIndex;
                            const curr = dataPoints[i];
                            const next = dataPoints[i + 1];
                            return next >= curr ? 'green' : 'red';
                        }
                    }
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const index = context.dataIndex;
                                const wallet = wallets[index];

                                return [
                                    'Jumlah: ' + wallet.jumlah.toLocaleString(),
                                    'Sumber: ' + wallet.sumber,
                                    'Jenis: ' + wallet.jenis
                                ];
                            }
                        }
                    }

                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Facebook', 'Youtube', 'Direct Search'],
                datasets: [{
                    data: [33, 55, 12],
                    backgroundColor: ['#6366f1', '#ec4899', '#f59e0b']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
@endsection
