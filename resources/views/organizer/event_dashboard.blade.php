@extends('layouts.layout')
@section('title')
    Event Name | EventSync
@endsection

@section('content')
    @include('components.organizer_navbar')

    {{-- tabs section --}}
    <div class="my-4 border-b border-gray-300">
        <ul class="w-9/12 mx-auto" id="myTab" data-tabs-toggle="myTabContent" role="tablist">
            <div class="text-lg flex space-x-2">
                <li role="presentation">
                    <button class="inline-block p-2 border-b-2" id="review-tab" data-tabs-target="#review" type="button"
                        role="tab" aria-controls="review" aria-selected="false">Review
                    </button>
                </li>
                <li role="presentation">
                    <button class="inline-block p-2 border-b-2" id="overview-tab" data-tabs-target="#overview"
                        type="button" role="tab" aria-controls="overview" aria-selected="false">Overview
                    </button>
                </li>
                {{-- <li role="presentation">
                    <button class="inline-block p-2 border-b-2" id="admin-tab" data-tabs-target="#admin" type="button"
                        role="tab" aria-controls="admin" aria-selected="false">Admin
                    </button>
                </li> --}}
            </div>
        </ul>
    </div>
    {{-- content section --}}
    <div id="myTabContent" class="w-9/12 mx-auto">
        {{-- overview section --}}
        <div class="hidden" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="flex items-center my-8">
                <p class="bg-white text-sm text-gray-500 font-semibold px-3 py-2 rounded-full shadow border">APPLICATION
                    PERIOD</p>
                <hr class="w-10/12 border-gray-300 border">
            </div>
            <div class="flex justify-between items-center gap-16 mb-16">
                {{-- left section --}}
                <div class="flex flex-col gap-8 w-2/3">
                    <div class="flex justify-between font-semibold">
                        <div class="bg-white shadow border p-4 rounded text-center">
                            <p class="text-gray-700 mb-2">Submitted Applications</p>
                            <p class="text-xl">40</p>
                        </div>
                        <div class="flex gap-8">
                            <div class="bg-white shadow border p-4 rounded text-center">
                                <p class="text-purple mb-2">Accepted</p>
                                <p class="text-xl">10</p>
                            </div>
                            <div class="bg-white shadow border p-4 rounded text-center">
                                <p class="text-red-500 mb-2">Unaccepted</p>
                                <p class="text-xl">10</p>
                            </div>
                            <div class="bg-white shadow border p-4 rounded text-center">
                                <p class="text-gray-500 mb-2">Unreviewed</p>
                                <p class="text-xl">10</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white border shadow p-5">
                        <p class="text-xl text-center mb-4 font-semibold text-gray-700">Total Applications</p>
                        <div>
                            <canvas id="myLineChart"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('myLineChart').getContext('2d');
                            var data = {
                                labels: ['09/09', '10/09', '11/09', '12/09', '13/09', '14/09', '15/09', '16/09', '17/09', '18/09'],
                                datasets: [{
                                    label: '',
                                    data: [23, 45, 67, 34, 78, 12, 56, 89, 90, 99],
                                    borderWidth: 2,
                                    pointRadius: 4,
                                    pointBackgroundColor: '#7a1ee3',
                                }]
                            };
                            var myLineChart = new Chart(ctx, {
                                type: 'line',
                                data: data,
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    },
                                    plugins: {
                                        legend: {
                                            display: false,
                                        }
                                    }
                                }
                            });
                        </script>

                    </div>
                </div>
                {{-- right section --}}
                <div class="flex flex-col gap-8 w-1/3">
                    <div class="bg-white border shadow p-5">
                        <p class="text-xl text-center mb-4 font-semibold text-gray-700">Total Application Status</p>
                        <div>
                            <canvas id="doughnut"></canvas>
                        </div>
                        <script>
                            var ctx = document.getElementById('doughnut').getContext('2d');
                            var data = {
                                labels: ['Accepted', 'Unaccepted', 'Unreviewed'],
                                datasets: [{
                                    data: [8, 4, 2],
                                    backgroundColor: ['#7a1ee3', '#ef4444', '#6b7280'],
                                    hoverBackgroundColor: ['#7a1ee3', '#ef4444', '#6b7280'],
                                }],
                            };
                            var myPieChart = new Chart(ctx, {
                                type: 'doughnut',
                                data: data,
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        {{-- review section --}}
        <div class="hidden" id="review" role="tabpanel" aria-labelledby="review-tab">
            <div class="relative">
                <table class="w-full text-left text-gray-700">
                    <caption class="text-xl font-semibold text-gray-900 text-left mb-4">Review Applications</caption>
                    <thead class="text-sm text-purple uppercase bg-purple/10 border">
                        <tr>
                            <th scope="col" class="px-6 py-3">Username</th>
                            <th scope="col" class="px-6 py-3">Applied Date</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applicants as $applicant)
                            <tr class="border hover:bg-gray-100">
                                <th scope="row" class="px-6 py-3">
                                    <a
                                        href="{{ route('applicant.dashboard', $applicant->id) }}">{{ $applicant->user->username }}</a>
                                </th>
                                <th scope="row" class="px-6 py-3">{{ $applicant->updated_at->format('d F, Y') }}</th>
                                <th scope="row" class="px-6 py-3">{{ $applicant->status }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- admin section --}}
        {{-- <div class="hidden" id="admin" role="tabpanel" aria-labelledby="admin-tab">
        </div> --}}
    </div>
@endsection
