

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
           Login  Form
         </div>
         <form action="{{url('/')}}/login" method="post">
          
            @csrf
        
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

            <div class="content">
               <div class="pass-link">
                  <a href="#">Forgot password?</a>
               </div>
            </div>
            <div class="field">
               <input type="submit" value="Login">
            </div>
            <div class="signup-link">
               Not a member? <a href="regitration">Registration now</a>
            </div>
         </form>
      </div>
   </body>
</html>