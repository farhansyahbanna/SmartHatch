@extends('layouts.app')

@section('title','SmartHatch')

@section('content')



<h2 class="text-xl font-semibold mb-4">Selamat datang di Sistem Monitoring Telur Bebek</h2>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Suhu Inkubator -->
    <div class="bg-white shadow rounded-lg p-4 border hover:border-[#FF9B17]">
      <h3 class="font-bold ">
        Suhu Inkubator
      </h3>

      <p class="text-3xl text-[#FF9B17] mt-2 flex items-center gap-2 ">
        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24" style="border-radius:100%; background-color:[#FFF085];"><path fill="currentColor" d="M12 2a4 4 0 0 1 3.995 3.8L16 6l.001 6.728l.055.058a5.5 5.5 0 0 1 1.416 3.16l.021.276l.007.278a5.5 5.5 0 1 1-9.734-3.511l.179-.205l.054-.057L8 6a4 4 0 0 1 3.597-3.98l.203-.015zm0 2a2 2 0 0 0-1.995 1.85L10 6v7.593l-.333.298a3.5 3.5 0 1 0 4.82.146l-.153-.145l-.333-.298L14 6a2 2 0 0 0-2-2m0 4a1 1 0 0 1 1 1v5.208a2.5 2.5 0 1 1-2 0V9a1 1 0 0 1 1-1"/></svg>
        <span id="suhu">--</span>°C
      </p>
    </div>

    <!-- Kelembaban -->
    <div class="bg-white shadow rounded-lg p-4 border hover:border-[#FF9B17]">
      <h3 class="font-bold ">
         Kelembaban
      </h3>
      <p class="text-3xl text-[#FF9B17] mt-2 flex items-center gap-2" >
        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 32 32"><path fill="currentColor" d="M23.476 13.993L16.847 3.437a1.04 1.04 0 0 0-1.694 0L8.494 14.044A10 10 0 0 0 7 19a9 9 0 0 0 18 0a10.06 10.06 0 0 0-1.524-5.007M16 26a7.01 7.01 0 0 1-7-7a8 8 0 0 1 1.218-3.943l.935-1.49l10.074 10.074A6.98 6.98 0 0 1 16 26.001"/></svg>
        <span id="kelembaban">--</span>%
       
      </p>
    </div>

        <!-- Status Pemanas -->
    <div class="bg-white shadow rounded-lg p-4 border hover:border-[#FF9B17]">
      <h3 class="font-bold ">
         Kipas
      </h3>
      <p class="text-3xl text-[#FF9B17] mt-2 flex items-center gap-2" >
        <svg xmlns="http://www.w3.org/2000/svg" width="96" height="96" viewBox="0 0 24 24"><path fill="currentColor" d="M10.716 20.808q-.968 0-1.476-.58q-.51-.58-.51-1.305q0-.496.211-.974t.676-.782q.57-.388.945-1.044t.56-1.454q-.247-.094-.484-.217q-.236-.123-.457-.32l-2.339.845q-.367.13-.7.211t-.68.081q-1.287 0-2.278-1.163t-.992-3.39q0-.968.57-1.477q.57-.508 1.29-.508q.515 0 .996.21q.48.211.785.676q.388.57 1.044.945t1.454.56q.094-.247.217-.484q.123-.236.32-.457l-.845-2.339q-.13-.348-.212-.69q-.08-.343-.08-.666q0-1.523 1.327-2.408q1.326-.886 3.226-.886q.968 0 1.476.57q.51.57.51 1.29q0 .477-.211.967t-.676.794q-.57.389-.946 1.054q-.376.666-.558 1.464q.265.113.502.236q.236.123.438.3l2.339-.869q.367-.13.687-.199t.668-.068q1.66 0 2.477 1.405q.818 1.406.818 3.148q0 .968-.608 1.476q-.608.51-1.352.51q-.471 0-.924-.211t-.757-.676q-.388-.57-1.044-.946t-1.454-.558q-.094.246-.217.473t-.32.467l.845 2.339q.13.342.211.656q.081.315.081.619q-.013 1.298-1.167 2.336q-1.154 1.039-3.387 1.039m1.285-7q.76 0 1.284-.524q.524-.525.524-1.284t-.524-1.284T12 10.192t-1.284.524T10.192 12t.524 1.284t1.284.524"/></svg>
        <span>Status : On</span>
      </p>
    </div>



  </div>

  <canvas id="sensorChart" width="400" height="200" class="mt-6">
  
  </canvas>
    <script>
        //Menampilkan Data Suhu & Kelembaban dari database
        function fetchSensorData() {
            $.get("{{ route('sensor.latest') }}", function(data) {
                $('#suhu').text(data.suhu ?? '--');
                $('#kelembaban').text(data.kelembaban ?? '--');
            });
        }

        // Update setiap 3 detik
        setInterval(fetchSensorData, 10000);
        fetchSensorData(); // panggil sekali saat awal load
        
        //CHART
        const ctx = document.getElementById('sensorChart').getContext('2d');

        const chartData = {
            labels: [], // waktu
            datasets: [
                {
                    label: 'Suhu (°C)',
                    data: [],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Kelembaban (%)',
                    data: [],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }
            ]
        };

        const sensorChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        //UPDATE SECARA REAL TIME

        // function updateChart(temp, hum, time) {
        //     const maxData = 10; // tampilkan 10 data terakhir

        //     chartData.labels.push(time);
        //     chartData.datasets[0].data.push(temp);
        //     chartData.datasets[1].data.push(hum);

        //     if (chartData.labels.length > maxData) {
        //         chartData.labels.shift();
        //         chartData.datasets[0].data.shift();
        //         chartData.datasets[1].data.shift();
        //     }

        //     sensorChart.update();
        // }

        // function fetchSensorData() {
        //     $.get("{{ route('sensor.latest') }}", function(data) {
        //         const temp = data.temperature ?? 0;
        //         const hum = data.humidity ?? 0;
        //         const time = new Date(data.created_at).toLocaleTimeString();

        //         $('#suhu').text(temp);
        //         $('#kelembaban').text(hum);
        //         $('#timestamp').text(time);

        //         updateChart(temp, hum, time);
        //     });
        // }

        setInterval(fetchSensorData, 3000);
        fetchSensorData();

        //Chart

    </script>


@endsection
