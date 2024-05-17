

<!DOCTYPE html>

<html lang="en" dir="ltr">
   <head>
      <style>
         .err{
            color:red;
         }
      </style>
      <meta charset="utf-8">
      <title>Login Form Design | CodeLab</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
           Registration  Form
         </div>
         <form action="{{url('/')}}/regitration" method="post">
            @if(Session::has('success'))
               <div class=" alert alert-success">{{session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
               <div class=" alert alert-danger">{{session::get('fail')}}</div>
            @endif
         @csrf
         <div class="field">
               <input type="text" name="name" value="{{old('name')}}">
               <label>name</label>
            </div>
            <span class="err">
            @error('name')
               {{$message}}
            @enderror
            </span>

            <div class="field">
               <input type="text" name="email" value="{{old('email')}}">
               <label>Email Address</label>
            </div>
            <span class="err">
            @error('email')
               {{$message}}
            @enderror
            </span>

            <div class="field">
               <input type="password" name="password"  value="{{old('password')}}">
               <label>Password</label>
            </div>
            <span class="err">
            @error('password')
               {{$message}}
            @enderror
            </span>

            <div class="field">
               <input type="password" name="cpassword" value="{{old('cpassword')}}">
               <label> conform Password</label>
            </div>
            <span class="err">
            @error('cpassword')
               {{$message}}
            @enderror
            </span>

            <div class="content">
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" value="Registration">
            </div>
            <div class="signup-link">
               Not a member? <a href="login">login now</a>
            </div>
         </form>
      </div>
   </body>
</html>