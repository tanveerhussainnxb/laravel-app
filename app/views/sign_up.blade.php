<!--Import HTML layout using extends-->
@extends('layout')

<!--Update web page title section-->
@section('title')
    Sign-up
@stop


<!--Update web page content section-->
@section('content')
<div class="login-card">
  <h1>Sign-up</h1>
  <br>
  	
   <!--Check if there any problem with register details and if found any issue then display error to user-->
   @if (Session::has('flash_error'))   		
        <div id="flash_error">{{Session::get('flash_error')}}</div>
    @endif

   <!--Create form using laravel core feature-->	
   {{ Form::open() }}
    
    <!--Create Name field-->	
  	{{Form::text('name', Input::old('name'), array('placeholder' => 'Name'));}}
    
    <!--Dispaly error if it is related with Name-->	
    @if($errors->has('name'))
     <p class="error">{{ $errors->first('name') }}</p>
    @endif 
    
    
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
    
    
    <!--Create Confirm Password field-->	
    {{Form::password('password_confirmation', array('placeholder' => 'Confirm Password'));}}
    
    <!--Dispaly error if it is related with Confirm Password-->	
    @if($errors->has('password_confirmation'))
     <p class="error">{{ $errors->first('password_confirmation') }}</p>
    @endif  
    
    <!--Create submit button-->	
    {{Form::submit('Register', array('class' => 'login login-submit'));}}
    
    <!--End form-->	
   {{ Form::close() }}
   
   <!--Sign up link-->
   <div class="login-help"><a href="{{URL::to('user/login')}}">Login</a></div>
</div>
@stop