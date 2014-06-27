<!--Import HTML layout using extends-->
@extends('layout')

<!--Update web page title section-->
@section('title')
    Login
@stop


<!--Update web page content section-->
@section('content')
<div class="login-card">
  <h1>Log-in</h1>
  <br>
  	
   <!--Check if there any problem with login details and if found any issue then display error to user-->
   @if (Session::has('flash_error'))   		
        <div id="flash_error">{{Session::get('flash_error')}}</div>
    @endif

   <!--Create form using laravel core feature-->	
   {{ Form::open() }}
    
    <!--Create Email Address field-->	
  	{{Form::text('email_address', Input::old('email_address'), array('placeholder' => 'Email Address'));}}
    
    <!--Dispaly error if it is related with Email Address-->	
    @if($errors->has('email_address'))
     <p class="error">{{ $errors->first('email_address') }}</p>
    @endif 
    
    
    <!--Create Password field-->	
    {{Form::password('password', array('placeholder' => 'Password'));}}
    
    <!--Dispaly error if it is related with Password-->	
    @if($errors->has('password'))
     <p class="error">{{ $errors->first('password') }}</p>
    @endif  
    
    
    <!--Create submit button-->	
    {{Form::submit('Login', array('class' => 'login login-submit'));}}
    
    <!--End form-->	
   {{ Form::close() }}
   
   <!--Sign up link-->
   <div class="login-help"><a href="{{URL::to('user/sign_up')}}">Sign Up</a></div>
</div>
@stop