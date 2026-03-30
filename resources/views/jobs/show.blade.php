<head>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<style>
body {
    font-family: 'Poppins', sans-serif;
    background: #f7f9fc;
}

.container-job {
    max-width: 1350px;
    margin: auto;
    padding: 20px;
}

.back {
    font-size: 13px;
    color: #888;
    text-decoration: none;
}

.job-header {
    background: #fff;
    padding: 25px 30px;
    border-radius: 14px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    margin-top: 15px;
    position: relative;
    overflow: visible;
}

.job-header::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 5px;
    height: 100%;
    background: linear-gradient(180deg, #4f8cff, #6a5cff);
}

.job-title {
    font-size: 26px;
    font-weight: 600;
}

.job-meta {
    font-size: 14px;
    color: #666;
    margin-top: 8px;
}

.job-meta i {
    color: #4f8cff;
}

.action-row {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-top: 15px;
}

.apply-btn {
    background: linear-gradient(135deg, #4f8cff, #6a5cff);
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 14px;
}

.share-btn {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: none;
    background: #f1f3f7;
    color: #444;
    font-size: 18px;
}

.share-menu {
    min-width: 180px;
    border-radius: 12px;
    border: none;
    padding: 8px 0;
}

.share-menu li {
    list-style: none;
}

.share-menu .dropdown-item {
    font-size: 14px;
    padding: 10px 14px;
}

.section-box {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.04);
    margin-top: 20px;
}
</style>

<body>

<div class="container-job">

<a href="{{route('list')}}" class="back">
<i class="fa fa-arrow-left"></i> Back
</a>

<div class="job-header">

<div class="job-title">{{ $job->job_name }}</div>

<div class="job-meta">
<i class="fas fa-briefcase"></i> {{ $job->employment_type }}
&nbsp;&nbsp;|&nbsp;&nbsp;
<i class="fas fa-map-marker-alt"></i> {{ $job->workLocation->location }}
</div>

<div class="action-row">

<a href="{{ route('vacancy_form', $job->id) }}" target="_blank" class="apply-btn">
Apply Now 🚀
</a>

<div class="dropdown">
<button class="share-btn" type="button" data-bs-toggle="dropdown">
<i class="fas fa-share-alt"></i>
</button>

<ul class="dropdown-menu dropdown-menu-end share-menu shadow">
<li>
<a class="dropdown-item" href="mailto:?subject=Job Vacancy&body={{ url('/jobs/'.$job->id) }}">📧 Email</a>
</li>

<li>
<a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/jobs/'.$job->id) }}" target="_blank">Facebook</a>
</li>

<li>
<a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ url('/jobs/'.$job->id) }}" target="_blank">Twitter</a>
</li>

<li>
<a class="dropdown-item" href="https://www.linkedin.com/sharing/share-offsite/?url={{ url('/jobs/'.$job->id) }}" target="_blank">LinkedIn</a>
</li>

<li><hr class="dropdown-divider"></li>

<li>
<button class="dropdown-item" onclick="copyLink(event, '{{ url('/jobs/'.$job->id) }}')">
🔗 Copy Link
</button>
</li>
</ul>

</div>
</div>
</div>

<div class="section-box">
<div class="section-title">Responsibilities</div>
{!! $job->responsibilities !!}
</div>

<div class="section-box">
<div class="section-title">Requirements</div>
{!! $job->requirements !!}
</div>

<div class="section-box">
<div class="section-title">Benefits</div>
{!! $job->benefit !!}
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
function copyLink(event, url) {
    event.stopPropagation();

    const tempInput = document.createElement("input");
    tempInput.value = url;
    document.body.appendChild(tempInput);

    tempInput.select();

    try {
        document.execCommand("copy");
        alert("Link copied!");
    } catch {
        alert("Failed to copy link");
    }

    document.body.removeChild(tempInput);
}
</script>

</body>