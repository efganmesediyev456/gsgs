@extends('gopanel.layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">



            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid bg-primary">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class=" fw-medium text-white">Məhsullar</p>
                                    <h4 class="mb-0 text-white">{{ \App\Models\Entities\Product::count() }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid bg-primary">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class=" fw-medium text-white">Bloqlar</p>
                                    <h4 class="mb-0 text-white">{{ \App\Models\Entities\Blog::count() }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid bg-primary">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class=" fw-medium text-white">Kateqoriyalar</p>
                                    <h4 class="mb-0 text-white">{{ \App\Models\Entities\Category::count() }}</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                                            <span class="avatar-title">
                                                                <i class="bx bx-copy-alt font-size-24"></i>
                                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <canvas id="viewChart" width="100" height="100"></canvas>
                </div>
                <div class="col-8">
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>

            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>



        const blogViews = {{\App\Models\Entities\Blog::sum('view')}};
        const productViews = {{\App\Models\Entities\Product::sum('view')}};

        // Pie chart yaratmaq
        const ctx1 = document.getElementById('viewChart').getContext('2d');
        const viewChart = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['Bloq baxışlar', 'Məhsul baxışlar'],
                datasets: [{
                    label: 'Views',
                    data: [blogViews, productViews],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });

        // Bar chart
        const ctx2 = document.getElementById('myChart').getContext('2d');

        var categories = ['Adminlər', 'Kateqoriyalar', 'Bloqlar', 'Məhsullar', 'Faqlar', 'Əməkdaşlar'];
        var productCounts = [
            {{\App\Models\Gopanel\Admin::count()}},
            {{\App\Models\Entities\Category::count()}},
            {{\App\Models\Entities\Blog::count()}},
            {{\App\Models\Entities\Product::count()}},
            {{\App\Models\Entities\Faq::count()}},
            {{\App\Models\Entities\Partner::count()}},
        ];

        var backgroundColors = [
            'rgba(255, 99, 132, 0.2)', // Adminler
            'rgba(54, 162, 235, 0.2)', // Kateqoriyalar
            'rgba(255, 206, 86, 0.2)', // Bloqlar
            'rgba(75, 192, 192, 0.2)', // Məhsullar
            'rgba(153, 102, 255, 0.2)', // Faqlar
            'rgba(255, 159, 64, 0.2)'   // Əməkdaşlar
        ];

        var borderColors = [
            'rgba(255, 99, 132, 1)', // Adminler
            'rgba(54, 162, 235, 1)', // Kateqoriyalar
            'rgba(255, 206, 86, 1)', // Bloqlar
            'rgba(75, 192, 192, 1)', // Məhsullar
            'rgba(153, 102, 255, 1)', // Faqlar
            'rgba(255, 159, 64, 1)'   // Əməkdaşlar
        ];

        var myChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: categories,
                datasets: [{
                    label: 'Say',
                    data: productCounts,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0
                    }
                }
            }
        });







    </script>
@endsection
