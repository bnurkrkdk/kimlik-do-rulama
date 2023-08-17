<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kimlik Doğrulama</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

</head>
<body>
    <div class="container">
    <img src="{{ asset('Diyanet_İşleri_Başkanlığı_yeni_logo.svg.png') }}" alt="diyanet logo">
        <div class="form-container sign-in-container" style="transition: transform 0.1 ease;">
			<form method="POST" action="{{ route('login') }}">
				@csrf
                <h3>Hoş Geldiniz!</h3>
                <p>Lütfen kimliğinizi doğrulayabilmemiz için giriş yapınız.</p>
                <input type="email" name="email" placeholder="Email" />
                <input type="text" name="name" placeholder="name" />
                <input type="password" name="password" placeholder="Şifre" />
                <button type="submit">GİRİŞ YAP</button>
				@if(Session::has('success'))
    			<div style="background-color: green; color: white; padding: 10px;">
       			 {{ Session::get('success') }}
   				 </div>
				@endif
				@if (session('error'))
    			<p style="color: red; font-weight:bold;
					font-size:105%;
					font-family: 'Roboto Slab', serif;
					padding: 5%;
					margin-bottom: -25%;width:75%;height:15%;
					margin-top: 4%; background-color: #00000032;border-radius: 50px;background-size:initial;";>{{ session('error') }}</p>
				@endif

			</form>
        </div>
    </div>
    <script src="{{ asset('/assets/js/custom.js')}}"></script>
</body>
</html>
