<h1>Hello {{$users->name}}</h1>
<p>Please click the password reset button to reset your Password</p>
<a href="{{url('admin/forgot-password')}}/{{$users->email}}/{{$token->token}}">Reset Password</a>


