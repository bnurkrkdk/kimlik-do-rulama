<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kimlik Doğrulama</title>
    <style>
        
body {
	background: linear-gradient(to bottom right, #c21505ed, #c48888ed);
    display: flex ;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: 0 0 0 0;
	pointer-events: auto;
}
p{
    font-size:small;
	padding: 0%;
	margin-top: 5%;
	margin-bottom: 0%;
	pointer-events: auto;
}
h3{
    font-weight:lighter;
	font-size:xx-large;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    padding: 0%;
	margin-bottom: 10%;
	margin-top: 0%;
	pointer-events: auto;

}
img{
	padding: 50px 140px 0px ;
	pointer-events: auto;
}
button {
	border-radius: 20px;
	border: 1px groove #ff0000ed;
	background-color: #d91908ed;
	color: #ffffffc9;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	transition: transform 80ms ease-in;
	margin-top: 5px;
	pointer-events: auto;
}

button:active {
	transform: scale(0.85);
	pointer-events: auto;
}

button:focus {
	outline: black solid 2px;
	pointer-events: auto;
}

button.ghost {
	background-color: transparent;
	border-color: #000000bb;
	pointer-events: auto;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0px 50px;
	height: 55%;
	text-align: center;
	pointer-events: auto;
}

input {
	background-color: #ffffff;
	border: 2px dotted  #c21505ed;
	padding: 12px 15px;
	margin:5px 0;
	width: 75%;
	pointer-events: auto;
}

.container {
	background-color: #ffffff;
	border-radius: 122px;
  	box-shadow: 0 22px 50px rgba(0,0,0,0.22), 
			0 22px 22px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 384px;
	max-width: 100%;
	min-height: 480px;
	pointer-events: auto;
}

.form-container {
	position: absolute;
	top: 70;
	height: 100%;
	transition: all 0.6s ease-in-out;
	pointer-events: auto;
}

.sign-in-container {
	left: 0;
	width: 100%;
	z-index: 2;
	pointer-events: auto;
}

    </style>
	<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

</head>
<body>
    <div class="container">
        <img src="C:\Users\Beyza Karakodak\Desktop\kimlik-doğrulama\storage\framework\views\Diyanet_İşleri_Başkanlığı_yeni_logo.svg.png">
        <div class="form-container sign-in-container" style="transition: transform 0.1 ease;">
			<form method="POST" action="{{ route('login') }}">
				@csrf
                <h3>Hoş Geldiniz!</h3>
                <p>Lütfen kimliğinizi doğrulayabilmemiz için giriş yapınız.</p>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Şifre" />
                <button>GİRİŞ YAP</button>
            </form>
        </div>
    </div>
</body>
</html>