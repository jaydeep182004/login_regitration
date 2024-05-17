@extends('admin.combine')
@section('my-content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .result-container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* background-color: pink; */
            background-image: linear-gradient(yellow,pink,yellow);
        }

        h2 {
            text-align: center;
            color: #3498db;
        }

        .header-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .school-logo {
            text-align: left;
            margin-bottom: 20px;
            margin-top: -40px;
        }

        .school-logo img {
            max-width: 80px;
            max-height: 80px;
            margin-top: -500px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            text-align: center;
            border: 1px solid #ddd;
            padding: 10px;
        
        }

        th {
            background-color: #ecf0f1;
        }

        .profile {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .profile img {
            /* border-radius: 50%; */
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }
        .photo{
           
            /* border-radius: 50%; */
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        .input-field {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #3498db;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .signature {
            text-align: right;
            margin-top: 20px;
        }

        .result-summary {
            margin-top: 20px;
            background-color: #e6f28ff;
            padding: 10px;
            border-radius: 8px;
            background-color:gradient(rgb(50, 255, 255));
           
        }

        @media (max-width: 600px) {
            .result-container {
                width: 90%;
            }
        }

        @media print {
    body {
        font-family: Arial, sans-serif;
        color:black;
        background-color: #f9f9f9; 
        -webkit-print-color-adjust: exact; 
        print-color-adjust: exact;
    }

    
    .result-container button {
        display: none;
    }
    .result-container {
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
}
    </style>
</head>
<body>
    
    <div class="result-container">
        <img src="{{ asset('image/a2.jpg')}}" class="photo" alt="School Logo">
        <div class="header-info">
            <h2>Student Result</h2>
            <p><strong>Passing Year:</strong> 2024</p>
            <p><strong>Exam Name:</strong> Final Exams</p>
    
        </div>

        <div class="profile">
            <div>
                <p><strong>student name:</strong>{{isset($result['name']) ? $result['name'] :''}}</p>
                <p><strong>Date of Birth:</strong>18/03/2004</p>
                <p><strong>Roll Number:</strong> 22</p>
                <!-- <p><strong>JR Number:</strong>123</p> -->
                <p><strong>School Name:</strong> sadbhavna School Halvad</p>
            
            </div>
            <img src="{{ asset('image/a2.jpg')}}" alt="Student Image">
        </div>

        @php
       
            $abc = isset($data[0]['Ten']) ? $data[0]['Ten'] : '';
            $ten = explode(',', $abc);

            $xyz = isset($data[0]['twelve']) ? $data[0]['twelve'] : '';
            $twelve = explode(',', $xyz);

            $max = isset($result['mark']) ? $result['mark'] : '';
            $mark = explode(',', $max);

        @endphp
   

        <table>
            <tr>
                <th>Subject</th>
                <th>Total mark</th>
                <th>Passing <br> Mark</th>
                <th>Mark</th>
            </tr>

            @php
                $totalMarks = 0;
                $passingMark = 28;
                $fail = false; 
            @endphp

            @if (isset($result['stander']) && $result['stander'] == '10th')
                @foreach ($ten as $key => $subject)
                    <tr>
                        <td>{{ $subject }}</td>
                        <td>100</td>
                        <td>{{ $passingMark }}</td>
                        <td>{{ isset($mark[$key]) ? $mark[$key] : '' }}</td>
                    </tr>

                    @if (isset($mark[$key]))
                        @php
                            $totalMarks += $mark[$key];

                            if ($mark[$key] < $passingMark) {
                                $fail = true;
                            }
                        @endphp
                    @endif
                @endforeach

            @elseif (isset($result['stander']) && $result['stander'] == '12th')
                @foreach ($twelve as $key => $subject)
                    <tr>
                        <td>{{ $subject }}</td>
                        <td>100</td>
                        <td>{{ $passingMark }}</td>
                        <td>{{ isset($mark[$key]) ? $mark[$key] : '' }}</td>

                    </tr>

                    @if (isset($mark[$key]))
                        @php
                            $totalMarks += $mark[$key];

                            // Check if any subject mark is below passing marks
                            if ($mark[$key] < $passingMark) {
                                $fail = true;
                            }
                        @endphp
                    @endif
                @endforeach
            @endif
        </table>


        <div class="result-summary">
            <p><strong>Total Marks:</strong> {{ $totalMarks }}</p>

            @if (isset($result['stander']) && $result['stander'] == '10th')
                @php
                    $percentage = ($totalMarks / (count($ten) * 100)) * 100;
                @endphp
            @elseif (isset($result['stander']) && $result['stander'] == '12th')
                @php
                    $percentage = ($totalMarks / (count($twelve) * 100)) * 100;
                @endphp
            @endif

            <p><strong>Percentage:</strong>
            @if (!$fail)
            {{ number_format($percentage, 2) }}%</p>
            @endif
            
            @php
                $grade = '';

                if ($percentage >= 90) {
                    $grade = 'A+';
                } elseif ($percentage >= 80) {
                    $grade = 'A';
                } elseif ($percentage >= 70) {
                    $grade = 'B';
                } elseif ($percentage >= 60) {
                    $grade = 'C';
                } elseif ($percentage >= 50) {
                    $grade = 'D';
                } 
            @endphp
            <p><strong>Result:</strong> {{ $fail ? 'Fail' : 'Pass' }}</p>
            <p><strong>Grade:</strong> {{ $fail ? '' : $grade }}</p>
        </div>


        <div class="signature">
            <img src="upload/OIP.jfif" alt="Signature">
        </div>

            <button onclick="printResult()">Print Result</button>
    </div>
    <script>
    function printResult() {
        // Open the print dialog
        window.print();
    }
    </script>

</body>
</html>
@endsection

