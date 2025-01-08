<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Posyandu</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Statistik Posyandu</h1>

    <div>
        <p>Total Warga: {{ $totalWarga }}</p>
        <p>Jumlah Balita: {{ $jumlahBalita }}</p>
        <p>Jumlah Lansia: {{ $jumlahLansia }}</p>
        <p>Laki-laki: {{ $lakiLaki }}</p>
        <p>Perempuan: {{ $perempuan }}</p>
    </div>

    <canvas id="genderChart" width="400" height="200"></canvas>

    <script>
        const ctx = document.getElementById('genderChart').getContext('2d');
        const genderChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jumlah',
                    data: [{{ $lakiLaki }}, {{ $perempuan }}],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>
</body>
</html>
