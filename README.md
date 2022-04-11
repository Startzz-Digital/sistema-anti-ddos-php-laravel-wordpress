<img src="img/icone.png" >
<h1>Sistema Anti DDos</h1>
Uma maneira simples de proteger seu aplicativo da web contra ataques DDOS (GRATUITAMENTE) em *1 linha*.

Use esse pois temos motivos suficentes para não confiar na CLOUDFLARE.
Recomendamos que verifique o código manualmente e defina as pastas em chmod 755 e arquivos em 644 
pois também temos motivos suficientes para não confiar no GITHUB

## Como isso funciona?
<img src="img/icon.png" >
A cada conexão, o sistema salva temporariamente o endereço ip do cliente e monitora sua frequência de conexão, se esta frequência de conexão for anormal, então o sistema o considera como um endereço ip preto e envia uma solicitação de verificação na forma de verificação. Captcha integrado ao sistema, se ele passar nessa verificação, então é um humano e não um robô!

### Testando...
<img src="img/Antiddos.gif">

**"Este projeto foi testado por vários softwares ddos com uma pontuação de 77%."**
## Como usá-lo?

### USO básico
```php
<?php
	include ("anti_ddos/start.php"); //escreva isso no topo do seu aplicativo PHP e tudo está feito!!!
?>

Laravel

Na Blade Principal (master, mestre, index etc...)
@include('anti_ddos/start') // siga o passo para cada master existente user, admin, frontend etc...

certifique-se de colocar as pastas anti_ddos , css, img NA PASTA resources/views
duplique a pasta anti_ddos na pasta PUBLIC

Simples assim.

Wordpress

Na pasta do seu tema em WP-CONTENT/THEMES/SEU-TEMA
Na Header coloque include ("anti_ddos/start.php"); //siga o passo para admin etc...
certifique-se de colocar as pastas anti_ddos , css, img NA PASTA do Seu tema
Duplique a pasta anti_ddos para a raiz do WORDPRESS
<!DOCTYPE html>
<html>
<head>
	<title>
		Exemplo de página da Web protegida!
	</title>
</head>
	<body>
		...
		<h2>Example Web page protected!</h2>
		...
	</body>
</html>
```

### Advance USAGE:
```php
<?php
	try{
		if (!file_exists('anti_ddos/start.php'))
			throw new Exception ('anti_ddos/start.php does not exist');
		else
			require_once('anti_ddos/start.php'); 
	} 
	//CATCH the exception if something goes wrong.
	catch (Exception $ex) {
		// et's print a message saying there is an error
		echo '<div style="padding:10px;color:white;position:fixed;top:0;left:0;width:100%;background:black;text-align:center;">The <a href="https://github.com/sanix-darker/antiddos-system" target="_blank">"AntiDDOS System"</a> failed to load properly on this Web Site, please de-comment the \'catch Exception\' to see what happening!</div>';
		//Print out the exception message.
		//echo $ex->getMessage();
	}
	// cp -r AntiDDOS-system/ /var/www/html/
?>
---- THE HTML PAGE CONTENT ----
```
<img src="img/ddos_.PNG">

## Author

- [Startzz](https://github.com/startzzbrasil)

## LICENÇA

[Licença MIT](https://github.com/startzzbrasil/sistema-anti-ddos-php-laravel-wordpress/blob/master/LICENSE)

PS: Envie-me alguns comentários para tornar este projeto mais poderoso do que nunca! ;-)


