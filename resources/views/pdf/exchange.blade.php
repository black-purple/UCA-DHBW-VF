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
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .details,
        .students {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
        }

        .details h3,
        .students h3 {
            margin-bottom: 10px;
        }

        .students ul {
            list-style: none;
            padding: 0;
        }

        .students ul li {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Exchange Details</h1>
    </div>

    <div class="details">
        <h3>Type:</h3>
        <p>{{ $exchange->type }}</p>

        <h3>University:</h3>
        <p>{{ $exchange->universite }}</p>

        <h3>Start Date:</h3>
        <p>{{ date('M d, Y', strtotime($exchange->date_start)) }}</p>

        <h3>End Date:</h3>
        <p>{{ date('M d, Y', strtotime($exchange->date_end)) }}</p>

        <h3>Description:</h3>
        <p>{{ $exchange->description }}</p>
    </div>

    <div class="students">
        <h3>Students:</h3>
        @if ($exchange->students->isEmpty())
            <p>No students are associated with this exchange.</p>
        @else
            <ul>
                @foreach ($exchange->students as $student)
                    <li>{{ $student->firstname }} {{ $student->lastname }} ({{ $student->email }})</li>
                @endforeach
            </ul>
        @endif
    </div>
</body>

</html>
