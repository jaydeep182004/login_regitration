@extends('admin.combine')
@section('my-content')
<!DOCTYPE html>
<html>

<head>
  
<script src="{{asset('js/script.js')}}"></script>
<script src="{{asset('/path/to/js/script.js')}}"></script> 

  <title>Student Registration Form 1</title>
  <style>
    form {
      margin: auto;
      width: min(400px, 100%);
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      background-image:radial-gradient(green,yellow,orange,white); 
      /* url('https://source.unsplash.com/1800x500/?truck'); */
      /* url('https://images.unsplash.com/photo-1619279302118-43033660826a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80'); */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;

    }

    h2 {
      text-align: center;
      font-size: 28px;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="email"],
    input[type="tel"],
    textarea,
    select,
    #dob {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-sizing: border-box;
      opacity: 0.5;
    }

    textarea {
      height: 100px;
      resize: vertical;
    }

    .checkboxes {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      margin: 20px 0;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
    }

    .checkbox {
      display: flex;
      align-items: flex-start;
      margin-right: 20px;
    }

    .checkboxes label {
      margin-right: 20px;
    }

    table {
      width: 100%;
      margin-bottom: 20px;
      border-collapse: collapse;
    }

    table th,
    table td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
      color: black;
      font-size: 18px;
    }

    .buttons {
      display: flex;
      justify-content: center;
    }

    .buttons button {
      background-color: #854d28;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      width: 150px;
      font-size: 16px;
      cursor: pointer;
      margin-right: 10px;
    }

    .buttons button:hover {
      background-color: #6e4225;
    }
  </style>
  
</head>

<body>
    <h2>Student Registration Form</h2>
  <form action="{{ isset($data) ? url('/update', $data->id) : url('/form') }}" method="post">
@csrf
    <label for="first-name">First Name:</label>
    <input type="text"  name="first-name" value="{{isset($data) ? $data->fname : '' }}" required>

    <label for="last-name">Last Name:</label>
    <input type="text"  name="last-name"  value="{{isset($data) ? $data->lname : '' }}" required>

    <label for="stander">Stander:</label>
  <select name="std" id="std" onchange="toggleQualificationTable()" required>
    <option value="">Select Stander</option>
    <option value="10th" {{ isset($data) && $data->stander == '10th' ? 'selected' : '' }}>10th</option>
    <option value="12th" {{ isset($data) && $data->stander == '12th' ? 'selected' : '' }}>12th</option>
    <!-- Add other options as needed -->
  </select>

    <label for="dob">Date of Birth:</label>
    <input type="date"  name="dob" value="{{isset($data) ? $data->dob : '' }}" required>

    <label for="email">Email Address:</label>
    <input type="email" name="email" value="{{isset($data) ? $data->email : '' }}" required>

    <label for="mobile">Mobile:</label>
    <input type="tel"  name="mobile" value="{{isset($data) ? $data->mobile : '' }}" required>

    <label for="gender">Gender:</label>
<select  name="gender" required>
    <option value="">Select Gender</option>
    <option value="male" {{ isset($data) && $data->gender == 'male' ? 'selected' : '' }}>Male</option>
    <option value="female" {{ isset($data) && $data->gender == 'female' ? 'selected' : '' }}>Female</option>
    <!-- Add other options as needed -->
</select>

    <label for="address">Address:</label>
    <textarea name="address" required>{{ isset($data) ? $data->address : '' }}</textarea>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" value="{{isset($data) ? $data->city : '' }}" required>

    <label for="qualification">Qualification:</label>
    <table id="qualification-table" style="{{ isset($data) && $data->stander == '10th' ? 'display: none;' : '' }}">
      <tr>
        <th></th>
        <th>Board</th>
        <th>Percentage</th>
        <th>Year of Passing</th>
      </tr>
      <tr>
        <td>10th</td>
        <td><input type="text" name="board" value="{{isset($data) ? $data->board : '' }}" ></td>
        <td><input type="text" name="percentage" value="{{isset($data) ? $data->percentage : '' }}" ></td>
        <td><input type="text" name="year" value="{{isset($data) ? $data->YEAR : '' }}" ></td>
      </tr>
    </table>

    <div class="buttons">
      <button type="reset">Reset</button>
      <button type="submit">Submit</button>
    </div>
  </form>
  <script>
    
        function toggleQualificationTable() {
            var standerSelect = document.getElementById('std');
            var qualificationTable = document.getElementById('qualification-table');
            var selectedStander = standerSelect.value;
            qualificationTable.style.display = selectedStander.toLowerCase() === '10th' ? 'none' : 'table';
        }
    </script>
</body>

</html>
@endsection
