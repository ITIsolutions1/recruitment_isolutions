<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Vacancy List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="{{ asset('css/vacancy.list.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    .vacancy-container {
  position: relative;
  cursor: pointer;
}

.share-icon {
  position: absolute;
  top: 10px;
  right: 10px;
}

.share-icon button {
  font-size: 26px;
  font-weight: 900;
  color: #222;
  border: none;
  background: transparent;
  line-height: 1;
  cursor: pointer;
  padding: 0;
}
    * {
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Poppins', sans-serif;
    }

    .li {
      font-size: 14px;
    }

    .container-full {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .filter-search-container {
      padding: 20px;
      background-color: #f8f9fa;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      margin-bottom: 15px;
    }

    .form-search {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
    }

    .filter-item select, .filter-item input {
      width: 200px;
    }
    .row-container {
  display: flex;
  gap: 30px;
  height: 100vh;
  overflow: hidden;
}

.job-list-container {
  width: 33%;
  display: grid;
  grid-template-columns: 1fr;
  gap: 20px;
  overflow-y: auto;
  padding-right: 10px;
  align-content: start;
  min-height: 100%; /* Tambahan penting: buat tinggi tetap */
}


    .job-details-container {
      width: 67%;
      overflow-y: auto;
      padding: 20px;
    }

    .vacancy-container {
      border: 1px solid #ddd;
      padding: 15px;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .vacancy-container.selected {
      border: 3px solid #007bff;
      box-shadow: 0 0 15px 5px rgba(0, 123, 255, 0.6);
    }

    .vacancy-container:hover {
      border: 2px solid #007bff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .job-name {
      font-size: 18px;
      font-weight: bold;
    }

    .kontainer_vacancy {
      background-color: #f8f9fa;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }

    .pagination-container {
      display: flex;
      justify-content: center;
      margin-top: 10px;
    }

    @media (max-width: 768px) {
      .job-details-container {
        display: none;
      }

      .job-list-container {
        width: 100%;
      }

      .form-search {
        flex-direction: column;
      }

      .filter-item select,
      .filter-item input,
      .filter-item button {
        width: 100%;
      }
    }
  </style>
</head>
<body>
  <div class="container container-full">
    <div class="filter-search-container" style="position: sticky; top: 0px;">
      <form class="form-search" method="GET" action="{{ route('vacancy.search') }}">
        <div class="filter-item">
          <input type="text" name="job_name" placeholder="Search by Job Name" value="{{ request()->input('job_name') }}" class="form-control">
        </div>
        <div class="filter-item">
          <select name="employment_type" class="form-control">
            <option value="">Select Employment Type</option>
            <option value="Permanent" {{ request()->input('employment_type') == 'Permanent' ? 'selected' : '' }}>Permanent</option>
            <option value="Contract" {{ request()->input('employment_type') == 'Contract' ? 'selected' : '' }}>Contract</option>
            <option value="Freelance" {{ request()->input('employment_type') == 'Freelance' ? 'selected' : '' }}>Freelance</option>
          </select>
        </div>
        <div class="filter-item">
          <input type="text" name="work_location" placeholder="Search by Location" value="{{ request()->input('work_location') }}" class="form-control">
        </div>
        <div class="filter-item">
          <select name="sort" class="form-control">
            <option value="asc" {{ request()->input('sort') == 'asc' ? 'selected' : '' }}>Sort A-Z</option>
            <option value="desc" {{ request()->input('sort') == 'desc' ? 'selected' : '' }}>Sort Z-A</option>
          </select>
        </div>
        <div class="filter-item">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
    </div>

    <div class="row-container">
  <div class="job-list-container">
    @foreach($jobs as $job)

      <div class="vacancy-container" 
           data-job-id="{{ $job->id }}" 
           onclick="loadJobDetails({{ $job->id }})">

        <!-- Dropdown Share -->
        <div class="dropdown share-icon" onclick="event.stopPropagation();">
          <button class="btn btn-sm p-0 border-0 bg-transparent" 
                  type="button" 
                  data-bs-toggle="dropdown" 
                  aria-expanded="false">
            &#8942;
          </button>

          <ul class="dropdown-menu dropdown-menu-end shadow rounded-3">
            <li>
              <a class="dropdown-item" href="mailto:?subject=Job Vacancy&body={{ url('/jobs/'.$job->id) }}">
                📧 Email
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ url('/jobs/'.$job->id) }}" target="_blank">
                Facebook
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ url('/jobs/'.$job->id) }}" target="_blank">
                Twitter
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="https://www.linkedin.com/sharing/share-offsite/?url={{ url('/jobs/'.$job->id) }}" target="_blank">
                LinkedIn
              </a>
            </li>

            <li><hr class="dropdown-divider"></li>

            <li>
              <button style="font-size: 15px;" class="dropdown-item" onclick="copyLink(event, '{{ url('/jobs/'.$job->id) }}')">
                🔗 Copy Link
              </button>
            </li>
          </ul>
        </div>

        <!-- Job Content -->
        <p class="job-name">{{ $job->job_name }}</p>

        <div class="job-info">
          <p>
            Employment Type: {{ $job->employment_type }}<br>
            Location: {{ $job->workLocation->location }}
          </p>
        </div>

      </div>

    @endforeach

    <div class="pagination-container">
      {{ $jobs->links('pagination::bootstrap-4') }}
    </div>
  </div>
</div>

  <div class="job-details-container" id="job-details-container">
    <div class="kontainer_vacancy" id="job-details-placeholder">
      <h4>Select a job to view details</h4>
      <p>Please click on a job from the list to see the details here.</p>
    </div>
  </div>
</div>

  <script>
    function loadJobDetails(jobId) {
      if (window.innerWidth <= 768) {
        window.location.href = `/job/${jobId}`;
      } else {
        const allJobContainers = document.querySelectorAll('.vacancy-container');
        allJobContainers.forEach(container => container.classList.remove('selected'));

        const selectedJobContainer = document.querySelector(`.vacancy-container[data-job-id='${jobId}']`);
        selectedJobContainer.classList.add('selected');

        fetch(`/job/${jobId}`)
          .then(response => response.text())
          .then(data => {
            document.getElementById('job-details-placeholder').innerHTML = data;
          })
          .catch(error => console.error('Error loading job details:', error));
      }
    }
  </script>

  <!-- <script>
function shareJob(event, jobId) {
    event.stopPropagation(); // biar tidak trigger klik parent

    const url = window.location.origin + "/jobs/" + jobId;

    if (navigator.share) {
        navigator.share({
            title: "Job Vacancy",
            text: "Check this job vacancy",
            url: url
        });
    } else {
        navigator.clipboard.writeText(url)
            .then(() => alert("Link copied!"))
            .catch(() => alert("Failed to copy link"));
    }
}
</script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function copyLink(event, url) {
    event.stopPropagation();

    const tempInput = document.createElement("input");
    tempInput.value = url;
    document.body.appendChild(tempInput);

    tempInput.select();
    tempInput.setSelectionRange(0, 99999);

    try {
        document.execCommand("copy");
        alert("Link copied!");
    } catch (err) {
        alert("Failed to copy link");
    }

    document.body.removeChild(tempInput);
}
</script>
</body>
</html>
