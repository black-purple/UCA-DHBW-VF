<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            margin-bottom: 80px;
        }

        .header img {
            height: 70px;
        }

        h1 {
            text-align: center;
            margin: 60px 0 40px 0;
            color: #800000;
            text-decoration: underline;
        }

        .content {
            padding: 20px;
        }

        .details {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
        }

        .details .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .details .row div {
            width: 48%;
        }

        .details h3 {
            margin-bottom: 10px;
        }

        .students {
            border: 1px solid #ddd;
            padding: 20px;
            page-break-before: always;
        }

        .students table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .students table th,
        .students table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .students table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="../public/img/uca_logo.png" alt="Left Logo" style="position: absolute; left: 20px; hight: 80px;">
        <img src="../public/img/dhbw_logo.png" alt="Right Logo" style="position: absolute; right: 20px;">
    </div>
    <h1>Informations about the exchange</h1>
    <div class="content">
        <div class="details">
            <div class="row">
                <div style="width: 48%;">
                    <h3>Type of exchange:</h3>
                    <p>{{ $exchange->type }}</p>
                </div>
                <div style="width: 48%;">
                    <h3>University:</h3>
                    <p>{{ $exchange->universite }}</p>
                </div>
            </div>
            <div class="row">
                <div style="width: 48%;">
                    <h3>Start Date:</h3>
                    <p>{{ date('M d, Y', strtotime($exchange->date_start)) }}</p>
                </div>
                <div style="width: 48%;">
                    <h3>End Date:</h3>
                    <p>{{ date('M d, Y', strtotime($exchange->date_end)) }}</p>
                </div>
            </div>
            <h3>Description:</h3>
            <p>{{ $exchange->description }}</p>
        </div>
        <div class="students">
            <h3>List of students:</h3>
            @if ($exchange->students->isEmpty())
                <p>No students are associated with this exchange.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Nationality</th>
                            <th>University</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exchange->students as $student)
                            <tr>
                                <td>{{ $student->firstname }} {{ $student->lastname }}</td>
                                <td>{{ $student->nationnality }}</td>
                                <td>{{ $student->university }}</td>
                                <td>{{ $student->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</body>
</html>
