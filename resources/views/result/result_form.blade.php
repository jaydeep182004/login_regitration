@extends('admin.combine')
@section('my-content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .fix {
            background-color: #D1F2EB;
            outline-width: 0;
            border: none;
        }

        input {
            width: 80px;
        }

        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }


        h1 {
            border: 3px;
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
                ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        .a1 {
            color: #006600;
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            background-color: orange;

        }

        td {
            color: black;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            background-color: #E4F5D4;
            font-weight: lighter;
            background-color: #D1F2EB;
        }
    </style>
</head>

<body>
    <?php  
    $mark = "";
    ?>

    @foreach($result as $resultItem)
        <?php $mark = $resultItem['id']; ?>
    @endforeach

    @php
    $abc = $sub[0]['Ten'];
    $ten = explode(',', $abc);
    $xyz = $sub[0]['twelve'];
    $twelve = explode(',', $xyz);

    @endphp

    <!-- <div class="d-flex justify-content-start container"> -->

    <div class="d-flex justify-content-start container">
        <form action="">
            <label for="">std</label>
            <select name="std" id="">
                <option value=""></option>
                <option value="10th" {{ $std=='10th' ? 'selected' : '' }}>10th</option>
                <option value="12th" {{ $std=='12th' ? 'selected' : '' }}>12th</option>
            </select>

            <button type="submit">submit</button>
        </form>
    </div>

    <h1>Student <a href="/result_form" class="a1"> Alldata </a> Table</h1>

    <div class="container table-responsive" id="result-form-container">
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fname </th>
                    <th>stander</th>
                    @if ($std == '10th')
                    @foreach($ten as $row)
                    <th>{{ $row }}</th>
                    @endforeach
                    @elseif ($std == '12th')
                    @foreach($twelve as $row)
                    <th>{{ $row }}</th>
                    @endforeach
                    @endif
                    <th colspan="2">action</th>
                </tr>
            </thead>
            <tbody>

            @php
            $text=1;
            @endphp
                
                @foreach($data as $value)
                <tr>
                    <form action="{{ url('/result_form') }}" method="post">
                        @csrf

                        <td>{{ $text++ }}</td>
                        <td><input type="text" class="fix" name="name" value="{{ $value->lname }}" readonly></td>
                        <td><input type="text" class="fix" name="stander" value="{{ $value->stander }}" readonly></td>
                        <!-- <td><input type="text" class="fix" name="dob" value="{{ $value->dob }}" readonly></td> -->
                        
                        @if ($std == '10th')
                        @foreach($ten as $subject)
                        <td><input type="number" name="mark[]" required></td>
                        @endforeach
                        @endif

                        @if ($std == '12th')
                        @foreach($twelve as  $key => $subject)
                        <td><input type="number" name="mark[]" required></td>
                        @endforeach
                        @endif

                        <td><button type="submit">Save</button></td>
                    </form>

                    <td><a href="{{ url('/result/'. $mark) }}"><button>preview</button></a></td>
                    
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    
    </section>
</body>

</html>

@endsection