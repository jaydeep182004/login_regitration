@extends('admin.combine')
@section('my-content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>GFG User Details</title>
    <!-- Add these lines to your head section -->

    <style>
        

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
        .a1{
            color:#006600;
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
        }

        td {
            font-weight: lighter;
        }
        @media only screen and (max-width: 600px) {
            table {
                font-size: medium;
            }
        }
    </style>
</head>

<body>


    <section>
    <div class="d-flex justify-content-start container">
        <form action="">
        <label for="">std</label>
        <select name="std" id="">
            <option value=""></option>
            <option value="10th" {{ $std == '10th' ? 'selected' : '' }}>10th</option>
            <option value="12th" {{ $std == '12th' ? 'selected' : '' }}>12th</option>
        </select>
        <label for="">gender</label>
        <select name="gender" id="">
            <option value=""></option>
            <option value="male" {{ $gender == 'male' ? 'selected' : '' }}>male</option>
            <option value="female" {{ $gender == 'female' ? 'selected' : '' }}>female</option>
        </select>
        <button type="submit">submit</button>
    </form>
    </div>
 
        <!-- <h1> </h1> -->
        <h1>Student <a href="showtable" class="a1"> Alldata </a> Table</h1>
        <div class="container table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Id </th>
                    <th>Fname </th>
                    <th>Lname </th>
                    <th>stander</th>
                    <th>dob</th>
                    <th>email</th>
                    <th>mobile</th>
                    <th>gender</th>
                    <th>address</th>
                    <th>city</th>
                    <th>board</th>
                    <th>percentage</th>
                    <th>year</th>
                    <th colspan="2px">action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $number=1;
                @endphp

                @foreach ($data as $value)
                <tr>
                    <td>{{ $number++ }}</td>
                    <td>{{ $value->fname }}</td>
                    <td>{{ $value->lname }}</td>
                    <td>{{ $value->stander }}</td>
                    <td>{{ $value->dob }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->mobile }}</td>
                    <td>{{ $value->gender }}</td>
                    <td>{{ $value->address }}</td>
                    <td>{{ $value->city }}</td>
                    <td>{{ $value->board }}</td>
                    <td>{{ $value->percentage }}</td>
                    <td>{{ $value->YEAR }}</td>

                   
                    <td><a href="edit/{{$value->id}}"><button>edit</button></a></td>
                    <td><a href="delete/{{$value->id}}"><button>delete</button></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
       
        </div>
    </section>
</body>
</html>
@endsection