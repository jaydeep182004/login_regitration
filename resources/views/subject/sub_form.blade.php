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
      width: min(700px, 80%);
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      background-color:#faebd7;
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
    
    input[type="checkbox"] {
      transform: scale(1.3);
      margin-right: 5px;
    }

    textarea {
      height: 100px;
      resize: vertical;
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

    /* Add the following CSS for hiding rows based on the selected value */
    table tr[class^="stander"] {
      display: none;
    }

    table tr[class^="stander"].show {
      display: table-row;
    }
  </style>
  
</head>

<body>
  <h2>subject select Form</h2>
  <form action="{{ isset($data) ? url('/update', $data->id) : url('/subject') }}" method="post">
    @csrf
   
    <label for="stander">Stander:</label>
    <select name="std" id="std" onchange="toggleQualificationTable()" required>
      <option value="">Select Stander</option>
      <option value="10th" {{ isset($data) && $data->stander == '10th' ? 'selected' : '' }}>10th</option>
      <option value="12th" {{ isset($data) && $data->stander == '12th' ? 'selected' : '' }}>12th</option>
    </select>

    <label for="qualification">Subject:</label>
    <table>
      <tr class="stander-10th">
        <td>10th</td>
        <td><input type="checkbox" name="Ten[]" value="gujrati"><br>gujrati</td>
        <td><input type="checkbox" name="Ten[]" value="social_science"><br>social.science</td>
        <td><input type="checkbox" name="Ten[]" value="science"><br>science</td>
        <td><input type="checkbox" name="Ten[]" value="maths"><br>maths</td>
        <td><input type="checkbox" name="Ten[]" value="english"><br>english</td>
        <td><input type="checkbox" name="Ten[]" value="sanskrit"><br>sanskrit</td>
      </tr>
      <tr class="stander-12th">
        <td>12th</td>
        <td><input type="checkbox" name="Twelve[]" value="gujrati" ><br>gujrati</td>
        <td><input type="checkbox" name="Twelve[]" value="B.A" ><br>B.A</td>
        <td><input type="checkbox" name="Twelve[]" value="Account" ><br>Account</td>
        <td><input type="checkbox" name="Twelve[]" value="S.p" ><br>S.p</td>
        <td><input type="checkbox" name="Twelve[]" value="english" ><br>english</td>
        <td><input type="checkbox" name="Twelve[]" value="Economics" ><br>Economics</td>
        <td><input type="checkbox" name="Twelve[]" value="State" ><br>State</td>
      </tr>
    </table>

    <div class="form-group">
      <label for="newCheckbox">Add New Checkbox: </label>
      <input type="text" id="newCheckbox" name="newCheckbox">
      <button type="button" onclick="addNewCheckbox()">Add Checkbox</button>
    </div>

    <div class="buttons">
      <button type="reset">Reset</button>
      <button type="submit">Submit</button>
    </div>
  </form>
  
  <script>
    function toggleQualificationTable() {
      var selectedStander = document.getElementById('std').value;

      // Hide all rows
      var allRows = document.querySelectorAll('table tr[class^="stander"]');
      allRows.forEach(function (row) {
        row.classList.remove('show');
      });

      // Show the selected stander rows
      var selectedRows = document.querySelectorAll('.stander-' + selectedStander);
      selectedRows.forEach(function (row) {
        row.classList.add('show');
      });
    }

    function addNewCheckbox() {
      var newCheckboxInput = document.getElementById('newCheckbox');
      var newCheckboxValue = newCheckboxInput.value.trim();

      if (newCheckboxValue !== '') {
        var table = document.querySelector('table');
        var newRow = table.insertRow(table.rows.length);
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);

        cell1.innerText = '';
        cell2.innerHTML = `
          <input type="checkbox" value="newCheckboxValue">${newCheckboxValue}
        `;

        newCheckboxInput.value = '';
      }
    }
  </script>
</body>

</html>
@endsection

