<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summary</title>
    <style>
        *{
            /* border: 1px solid red; */
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 0px;
            padding: 0;
            padding-top: 100px;
            padding-bottom: 50px;

            background-image: url("{{ public_path('assets/summary-isolutions.png') }}");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        header{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 999
        }
        .header-name{
            padding-left: 20px;
        }
        .header-name h1{
            font-size: 40px;
            height: 30px;
            color: white;
        }
        .content-summary{
            padding-left: 10px;
        }

        .foto{
            position: fixed;
            top: 40px;
            right: 30px;
            z-index: ;
        }
        /* .biodata-table{
            padding-right: 270px;
            margin-bottom: 20px;
        } */
        
.profile, .biodata-table {
    border-top: 2px solid #eee;
    border-bottom: 2px solid #eee;
    /* padding: px 0; */
    margin-bottom: 10px;
    border-left: 5px solid #e5e5e5;
    padding-left: 10px;
   
}

.container {
    display: flex !important;
    flex-direction: row;
    align-items: flex-start;
    gap: 20px;
}

/* Pastikan dua-duanya punya lebar */
.left {
    width: 65%;
}

.right-box {
    width: 400px; /* fix size biar compact */
    height: 300px;
    border: 1px solid #800e0e;
    padding: 10px;
    border-radius: 8px;
    text-align: left; /* isi tetap rata kiri */
    font-size: 17px;
}

/* Judul */
.title {
    font-weight: bold;
    margin: 0 0 8px 0;
}

/* Table biar rapet */
/* .inner-table {
    border-collapse: collapse;
}

.inner-table td {
    padding: 2px 4px; 
    font-size: 12px;
} */


.inner-table td {
    padding: 4px 0;
}

.inner-table ul {
    margin: 0;
    padding-left: 18px;
}


/* Optional: biar gak turun */
.left, .right {
    display: block;
}

        .biodata-table table tr:nth-child(even){
            /* background-color: #880000; */
        }
        .biodata-table table tr{
            border: 1px solid black;
        }
        .font-paragraph{
            margin: 0px;
            font-size: 18px;

        }
       .font-paragraph-profile{
            margin: 0px;
            font-size: 18px;
            width: 850px;
            text-align: justify;
            line-height: 1.6;
            margin-bottom: 20px;
        }

         .font-paragraph-notes{
            margin: 0px;
            font-size: 18px;
            width: 850px;
            text-align: justify;
            line-height: 1.6;
            margin-bottom: 20px;
        }



        .information-detail{
            display: flex;
            flex-direction: column;
            
        }

        
        .sub-tittle{
            font-size: 20px;
            text-decoration: underline;
            margin: 0px;
        }
        .unordered-list{
            margin: 0px;
           
        }

        .information-detail table{
            width: 100%;
        }
        .information-detail table tr .left{
            width: 70%;
            vertical-align: top;
        }
        .information-detail table tr .right{
            width: 30%;
            padding-top: 50px;
            vertical-align: top;
        }
        .skills, .certificates, .country-works, .language, .education, .experience-record, .selected-projects{
            margin-bottom: 20px;
        }
        /* .information-detail tr, td{
            border: 1px solid red;
        } */

        @page {
            padding-top:0mm;
            margin: 0mm;
        }

        .kontener{
            display: table;


        }
       
    /* ul {
        margin-top: 0;
        margin-rigth: 10px;
    } */

    

    </style>
</head>
<body>
    <header>
        <div class="bar">
            <table style="width: 100%">
                <tr>
                    <td class="header-name">
                        <h1>{{ $applicant->name }}</h1>
                    </td>
                </tr>
            </table>
        </div>
        <div class="foto"><img style="border-radius: 5%" height="250px" width="200px" src="{{ public_path('storage/' . $applicant->photo_pass) }}" alt=""></div>
    </header>

    

    <div class="content-summary">
        <div class="profile">
            <strong><p class="sub-tittle">Profile</p></strong>
          <p class="font-paragraph-profile">
    {{ \Illuminate\Support\Str::limit(strip_tags($applicant->profile), 550) }}
</p>
        </div>
        <div class="biodata-table">
            <table style="width: 100%">

                <tr>
                    <td><strong><p class="font-paragraph">Position / Title</p></strong></td>
                        <td style="vertical-align: top; width: 60%;"><strong><p class="font-paragraph">{{ optional($applicant->job)->job_name }}</p></strong></td>
                    </tr>

                
                <tr>
                    <td><p class="font-paragraph">Total Working Experiences</p></td>
                    <td style="vertical-align: top; width: 60%;"><p class="font-paragraph">{{ $applicant->experience_period }}</p></td>
                </tr>
            </table>
        </div>

        <div class="information-detail">

            {{-- <div class="container">
         <div class="left">

        <div class="education">
            <strong><p class="sub-tittle">Educations</p></strong>
            <ul class="unordered-list">
                <li>
                    <p class="font-paragraph">
                        {{ $applicant->jurusan->name_jurusan ?? '-' }}
                    </p>
                </li>
            </ul>
        </div>

        <div class="experience-record">
            <strong><p class="sub-tittle">Experience Record</p></strong>
            <ul class="unordered-list">
                @foreach($applicant->workExperiences as $experience)
                    <li>
                        <p class="font-paragraph">
                            {{ $experience->name_company }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="selected-projects">
            <strong><p class="sub-tittle">Selected Projects</p></strong>
            <ul class="unordered-list">
                @foreach($applicant->projects as $project)
                    <li>
                        <p class="font-paragraph">
                            {{ $project->project_name }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>

    <!-- RIGHT -->
    <div class="right">
        <p>Ini bagian kanan (box)</p>
    </div>

        </div> --}}
        <table width="100%">
    <tr>
        <td width="65%" valign="top">
            <!-- LEFT -->
            <div class="education">
            <strong><p class="sub-tittle">Educations</p></strong>
            <ul class="unordered-list">
                <li>
                    <p class="font-paragraph">
                        {{ $applicant->jurusan->name_jurusan ?? '-' }}
                    </p>
                </li>
            </ul>
        </div>

        <div class="experience-record">
            <strong><p class="sub-tittle">Experience Record</p></strong>
            <ul class="unordered-list">
                @foreach($applicant->workExperiences as $experience)
                    <li>
                        <p class="font-paragraph">
                            {{ $experience->name_company }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="selected-projects">
            <strong><p class="sub-tittle">Selected Projects</p></strong>
            <ul class="unordered-list">
                @foreach($applicant->projects as $project)
                    <li>
                        <p class="font-paragraph">
                            {{ $project->project_name }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>

      <td width="50%" valign="top" align="right">
    <div class="right-box">
    <p class="title">Personality Test</p>

    <table class="inner-table" style="border-collapse: collapse; width: 100%;">
        <tr>
            <td style="font-size: 17px; width: 150px;">MBTI</td>
            <td style="font-size: 17px; width: 10px;">:</td>
            <td style="font-size: 17px;">{{ $applicant->mbti ?? '-' }}</td>
        </tr>
        <tr>
            <td style="font-size: 17px;">IQ</td>
            <td style="font-size: 17px;">:</td>
            <td style="font-size: 17px;">{{ $applicant->iq ?? '-' }}</td>
        </tr>
        <tr>
            <td style="font-size: 17px;">Location</td>
            <td style="font-size: 17px;">:</td>
            <td style="font-size: 17px;">{{ $applicant->address ?? '-' }}</td>
        </tr>

        <tr>
            <td style="font-size: 17px; vertical-align: top;">Strengths</td>
            <td style="font-size: 17px; vertical-align: top;">:</td>
            <td style="font-size: 17px; vertical-align: top; padding-left: 5px;">
                {!! $applicant->strengths ?? '-' !!}
            </td>
        </tr>

        <tr>
            <td style="font-size: 17px; vertical-align: top;">Weaknesses</td>
            <td style="font-size: 17px; vertical-align: top;">:</td>
            <td style="font-size: 17px; vertical-align: top; padding-left: 5px;">
                {!! $applicant->weaknesses ?? '-' !!}
            </td>
        </tr>
    </table>
</div>
</td>

    </tr>
</table>

            

      @php
            $skills = explode('|', $applicant->skills);
            $half = ceil(count($skills) / 2);

            $left = array_slice($skills, 0, $half);
            $right = array_slice($skills, $half);
        @endphp

        <div class="skills">
            <strong><p class="sub-tittle">Skills</p></strong>

            <table style="width: 100%;">
                <tr>
                    <td style="vertical-align: top; width: 50%;">
                        <ul class="unordered-list">
                            @foreach($left as $skill)
                                <li><p class="font-paragraph">{{ trim($skill) }}</p></li>
                            @endforeach
                        </ul>
                    </td>

                    <td style="vertical-align: top; width: 90%;">
                        <ul class="unordered-list">
                            @foreach($right as $skill)
                                <li><p class="font-paragraph">{{ trim($skill) }}</p></li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>

        @php
            $certificates = explode('|', $applicant->certificates);
            $half = ceil(count($certificates) / 2);

            $left = array_slice($certificates, 0, $half);
            $right = array_slice($certificates, $half);
        @endphp

        <div class="certificates">
            <strong><p class="sub-tittle">Certificates</p></strong>

            <table style="width: 100%;">
                <tr>
                    <td style="vertical-align: top; width: 50%;">
                        <ul class="unordered-list">
                            @foreach($left as $certificate)
                                <li><p class="font-paragraph">{{ trim($certificate) }}</p></li>
                            @endforeach
                        </ul>
                    </td>

                    <td style="vertical-align: top; width: 90%;">
                        <ul class="unordered-list">
                            @foreach($right as $certificate)
                                <li><p class="font-paragraph">{{ trim($certificate) }}</p></li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>

                    <div class="language">
                <strong><p class="sub-tittle">Language</p></strong>
                <p>{{$applicant ->languages}}</p>
            </div>


          <div class="notes">
    <strong><p class="sub-tittle">Notes</p></strong>

    <p class="font-paragraph-notes">
        {{ strip_tags(optional($applicant->notes)->notes) }}
    </p>
</div>

          
    </div>
</body>
</html>
