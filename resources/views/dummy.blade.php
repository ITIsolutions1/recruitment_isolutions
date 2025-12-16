    @extends('adminlte::page')

    @section('title', 'Dashboard')

    @section('content_header')

    <style>
        .pipeline-box {
            font-size: 20px;
            min-width: 100px;
            min-height: 100px;
            padding: 10px;
            border-radius: 15px; /* sudut tumpul */
            text-align: center;
            font-weight: bold;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.15); /* lebih lembut */
            transition: transform 0.2s ease;
        }

        .pipeline-box:hover {
            transform: translateY(-5px); /* efek hover ringan */
        }
    </style>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="m-0 text-dark">
            <i class="fas fa-tachometer-alt text-primary"></i> Dashboard
        </h1>
    </div>

    <div class="alert alert-info shadow-sm p-4 rounded" style="background: linear-gradient(45deg, #007bff, #0056b3); color: white;">
        <h4 class="alert-heading">Welcome to the Hiring Dashboard!</h4>
        <p>Static version demo. No dynamic data is loaded.</p>
    </div>

    <div class="alert alert-info shadow-sm p-4 rounded" style="background: linear-gradient(45deg, #3399ff, #0056b3); color: white;">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <div style="font-size: 2.5rem; margin-right: 15px;">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h2>Database Total : 15.499</h2>
                </div>
            </div>

            <div class="d-flex">
                <div  class="pipeline-box mx-1 text-decoration-none text-white d-flex flex-column justify-content-center align-items-center"
                    style="background: linear-gradient(135deg, #a3d5ff, #66b2ff); min-width:120px; padding:10px; border-radius:8px;"><strong>Applicant</strong><span>1.002</span></div>
                <div  class="pipeline-box mx-1 text-decoration-none text-white d-flex flex-column justify-content-center align-items-center"
                    style="background: linear-gradient(135deg, #a3d5ff, #66b2ff); min-width:120px; padding:10px; border-radius:8px;"><strong>Interview</strong><span>5.005</span></div>
                <div  class="pipeline-box mx-1 text-decoration-none text-white d-flex flex-column justify-content-center align-items-center"
                    style="background: linear-gradient(135deg, #a3d5ff, #66b2ff); min-width:120px; padding:10px; border-radius:8px;"><strong>Offer</strong><span>152</span></div>
                <div  class="pipeline-box mx-1 text-decoration-none text-white d-flex flex-column justify-content-center align-items-center"
                    style="background: linear-gradient(135deg, #a3d5ff, #66b2ff); min-width:120px; padding:10px; border-radius:8px;"><strong>Accepted</strong><span>138</span></div>
                <div  class="pipeline-box mx-1 text-decoration-none text-white d-flex flex-column justify-content-center align-items-center"
                    style="background: linear-gradient(135deg, #a3d5ff, #66b2ff); min-width:120px; padding:10px; border-radius:8px;"><strong>Bank CV</strong><span>7.002</span></div>
                <div  class="pipeline-box mx-1 text-decoration-none text-white d-flex flex-column justify-content-center align-items-center"
                    style="background: linear-gradient(135deg, #a3d5ff, #66b2ff); min-width:120px; padding:10px; border-radius:8px;"><strong>Not Qualified</strong><span>2.200</span></div>
            </div>
        </div>
    </div>

    <style>
        .pipeline-box {
            font-size: 20px;
            min-width: 100px;
            min-height: 100px;
            padding: 10px;
            border-radius: 15px; /* sudut tumpul */
            text-align: center;
            font-weight: bold;
            color: white;
            box-shadow: 0 4px 6px rgba(0,0,0,0.15); /* lebih lembut */
            transition: transform 0.2s ease;
        }

        .pipeline-box:hover {
            transform: translateY(-5px); /* efek hover ringan */
        }
    </style>

    @stop

    @section('content')
    <div class="row">
        <div class="col-6">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Monthly Applicants</h5>
                    <canvas id="applicantChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Applicants per Job</h5>
                    <canvas id="jobChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card border-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Jobs by Department</h5>
                    <canvas id="departmentChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    @stop

    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {

        /* ===================== MONTHLY CHART ===================== */
const applicantData = [
    // { month: '2016-11', count: 188 },
    // { month: '2016-12', count: 140 },
    // { month: '2017-01', count: 235 },
    // { month: '2017-02', count: 176 },
    // { month: '2017-03', count: 171 },
    // { month: '2017-04', count: 122 },
    // { month: '2017-05', count: 205 },
    // { month: '2017-06', count: 80 },
    // { month: '2017-07', count: 168 },
    // { month: '2017-08', count: 161 },
    // { month: '2017-09', count: 66 },
    // { month: '2017-10', count: 120 },
    // { month: '2017-11', count: 177 },
    // { month: '2017-12', count: 79 },
    // { month: '2018-01', count: 65 },
    // { month: '2018-02', count: 98 },
    // { month: '2018-03', count: 85 },
    // { month: '2018-04', count: 118 },
    // { month: '2018-05', count: 125 },
    // { month: '2018-06', count: 101 },
    // { month: '2018-07', count: 81 },
    // { month: '2018-08', count: 107 },
    // { month: '2018-09', count: 91 },
    // { month: '2018-10', count: 199 },
    // { month: '2018-11', count: 68 },
    // { month: '2018-12', count: 165 },
    // { month: '2019-01', count: 113 },
    // { month: '2019-02', count: 90 },
    // { month: '2019-03', count: 166 },
    // { month: '2019-04', count: 202 },
    // { month: '2019-05', count: 128 },
    // { month: '2019-06', count: 104 },
    // { month: '2019-07', count: 110 },
    // { month: '2019-08', count: 84 },
    // { month: '2019-09', count: 133 },
    // { month: '2019-10', count: 87 },
    // { month: '2019-11', count: 140 },
    // { month: '2019-12', count: 79 },
    // { month: '2020-01', count: 107 },
    // { month: '2020-02', count: 96 },
    // { month: '2020-03', count: 165 },
    // { month: '2020-04', count: 145 },
    // { month: '2020-05', count: 102 },
    // { month: '2020-06', count: 118 },
    // { month: '2020-07', count: 95 },
    // { month: '2020-08', count: 152 },
    // { month: '2020-09', count: 64 },
    // { month: '2020-10', count: 130 },
    // { month: '2020-11', count: 144 },
    // { month: '2020-12', count: 100 },
    // { month: '2021-01', count: 175 },
    // { month: '2021-02', count: 138 },
    // { month: '2021-03', count: 95 },
    // { month: '2021-04', count: 83 },
    // { month: '2021-05', count: 156 },
    // { month: '2021-06', count: 141 },
    // { month: '2021-07', count: 123 },
    // { month: '2021-08', count: 95 },
    // { month: '2021-09', count: 108 },
    // { month: '2021-10', count: 153 },
    // { month: '2021-11', count: 121 },
    // { month: '2021-12', count: 81 },
    // { month: '2022-01', count: 112 },
    // { month: '2022-02', count: 91 },
    // { month: '2022-03', count: 143 },
    // { month: '2022-04', count: 101 },
    // { month: '2022-05', count: 167 },
    // { month: '2022-06', count: 110 },
    // { month: '2022-07', count: 128 },
    // { month: '2022-08', count: 153 },
    // { month: '2022-09', count: 107 },
    // { month: '2022-10', count: 142 },
    // { month: '2022-11', count: 99 },
    // { month: '2022-12', count: 145 },
    // { month: '2023-01', count: 115 },
    // { month: '2023-02', count: 89 },
    // { month: '2023-03', count: 125 },
    // { month: '2023-04', count: 101 },
    // { month: '2023-05', count: 157 },
    // { month: '2023-06', count: 132 },
    // { month: '2023-07', count: 105 },
    // { month: '2023-08', count: 96 },
    // { month: '2023-09', count: 128 },
    // { month: '2023-10', count: 91 },
    // { month: '2023-11', count: 145 },
    // { month: '2023-12', count: 83 },
    // { month: '2024-01', count: 119 },
    // { month: '2024-02', count: 72 },
    // { month: '2024-03', count: 134 },
    // { month: '2024-04', count: 101 },
    // { month: '2024-05', count: 150 },
    // { month: '2024-06', count: 128 },
    // { month: '2024-07', count: 76 },
    // { month: '2024-08', count: 92 },
    // { month: '2024-09', count: 165 },
    // { month: '2024-10', count: 140 },
    // { month: '2024-11', count: 118 },
    // { month: '2024-12', count: 91 },
    { month: '2025-01', count: 113 },
    { month: '2025-02', count: 135 },
    { month: '2025-03', count: 86 },
    { month: '2025-04', count: 102 },
    { month: '2025-05', count: 77 },
    { month: '2025-06', count: 91 },
    { month: '2025-07', count: 158 },
    { month: '2025-08', count: 169 },
    { month: '2025-09', count: 247 },
    { month: '2025-10', count: 220 },
    { month: '2025-11', count: 279 }
];


        const monthlyLabels = applicantData.map(item => item.month);
        const monthlyCounts = applicantData.map(item => item.count);

        var ctx1 = document.getElementById('applicantChart').getContext('2d');
        var gradient1 = ctx1.createLinearGradient(0, 0, 0, 400);
        gradient1.addColorStop(0, 'rgba(0, 123, 255, 0.8)');
        gradient1.addColorStop(0.5, 'rgba(0, 150, 240, 0.6)');
        gradient1.addColorStop(1, 'rgba(140, 86, 255, 0.6)');

        new Chart(ctx1, {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Monthly Applicants',
                    data: monthlyCounts,
                    backgroundColor: gradient1,
                    borderColor: '#007bff',
                    fill: true,
                    tension: 0.4
                }]
            }
        });

        /* ===================== DEPARTMENT CHART ===================== */
        var departmentData = {
            "Finance": 1,
            "Marketing": 3,
            "Engineers": 16,
            "Designers": 7,
            "Project Team": 9,
            "Public Relations": 1,
            "IT & Programmer": 2,
            "HSE": 3,
            "Event / MICE": 1,
            "Technical Services": 3,
            "Management": 1,
            "Support Team": 5
        };

        var ctx2 = document.getElementById('departmentChart').getContext('2d');
        var gradient2 = ctx2.createLinearGradient(0, 0, 0, 400);
        gradient2.addColorStop(0, 'rgba(180, 100, 255, 0.9)');
        gradient2.addColorStop(0.5, 'rgba(100, 150, 255, 0.6)');
        gradient2.addColorStop(1, 'rgba(70, 200, 250, 0.4)');

        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: Object.keys(departmentData),
                datasets: [{
                    label: 'Number of Jobs',
                    data: Object.values(departmentData),
                    backgroundColor: gradient2
                }]
            }
        });

        /* ===================== JOB CHART ===================== */
var jobData = {
    "HSE Officer": 1200,
    "Electric Engineer": 800,
    "Architect & Drafter": 700,
    "Admin HR": 2000,
    "Project Administrator (PID)": 900,
    "Human Resource / GA / Admin": 1800,
    "Lead Civil Structure Engineer": 600,
    "3D Designer": 300,
    "Safety": 950,
    "Drafter": 850,
    "Document Assistant": 400,
    "Visual Engineer": 350,
    "Transport / Motor Driver": 1000,
    "Construction Manager": 550,
    "IT Support": 1100,
    "Project Manager": 700,
    "Operation Manager": 600,
    "Lead Quality Supervisor": 750,
    "Sales & Marketing Executive": 1200,
    "QA QC": 650,
    "Procurement Engineer": 500,
    "Piping Mechanical Engineer": 550,
    "Operator": 1200,
    "Graphic Designer": 700
};


        var ctx3 = document.getElementById('jobChart').getContext('2d');
        var gradient3 = ctx3.createLinearGradient(0, 0, 0, 400);
        gradient3.addColorStop(0, 'rgba(255, 69, 0, 1)');
        gradient3.addColorStop(0.5, 'rgba(255, 165, 0, 0.9)');
        gradient3.addColorStop(1, 'rgba(255, 223, 0, 1)');

        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: Object.keys(jobData),
                datasets: [{
                    label: 'Number of Applicants per Job',
                    data: Object.values(jobData),
                    backgroundColor: gradient3
                }]
            }
        });

    });
    </script>
    @stop
