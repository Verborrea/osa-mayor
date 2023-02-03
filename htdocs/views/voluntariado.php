<!DOCTYPE html>
<hmtl lang="es-PE">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Agustina y la Osa Mayor | Voluntariado</title>
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="icons/site.webmanifest">
		<link href="styles/layout.css" rel="stylesheet">
		<link href="styles/voluntariado.css" rel="stylesheet">
		<link href="styles/star_sizes.css" rel="stylesheet">
		<link href="styles/header.css" rel="stylesheet">
	</head>
	<body>
		<header>
			<div id="logo">
				<img src="media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
				<br>
				FACILITADORES SOLIDARIOS
			</div>
			<div id="sky">
				<div id="container_gif1"><img id="gif1" src="media/gif1.gif"></div>
				<div id="ursa">
					<img id="star_path" src="media/camino.png">
					<div class="star" id="star1">
						<a href="/">Inicio</a>
					</div>
					<div class="star" id="star2">
						<a href="/nosotros">Nosotros</a>
					</div>
					<div class="star" id="star3">
						<a href="/voluntariado">Volun<br>tari<br>ado</a>
					</div>
					<div class="star" id="star4">
						<a href="/404">Donacio<br>nes</a>
					</div>
					<div class="star" id="star5">
						<a href="/contacto">Con<br>tac<br>to</a>
					</div>
					<div class="star" id="star6">
						<a href="/blog">Blog</a>
					</div>
					<div class="star" id="star7">
						<a href="/404">Tienda</a>
					</div>
				</div>
				<div id="container_gif2"><img id="gif2" img src="media/gif2.gif"></div>
			</div>
		</header>
		<section id="intro">
			<div id="image-container">
				<img id="introimg" src="media/imgs/volun.jpg" alt="Voluntariado">
			</div>
			<div id="introbox">
				FORMA PARTE DE NUESTRA CONSTELACIÓN
			</div>
		</section>
		<main>
			<div id="inicio-container">
				<h1>¿Qué significa <b>trabajar</b> con nosotros?</h1>
				<p>
					El Perú es un país que carece de cultura familiar, la mayoría de personas no consideran a los niños como
					personas a las cuales hay que cuidar sino más bien son vistos como medios para lucrar. En Agustina y la Osa
					mayor no pensamos igual y es por eso que buscamos a gente que sea:
				</p>
			</div>
			<div id="hab-container">
				<div>
					<div class="img" id="hab1"></div>
					<div class="text">SOLIDARIA</div>
				</div>
				<div>
					<div class="img" id="hab2"></div>
					<div class="text">JUSTA</div>
				</div>
				<div>
					<div class="img" id="hab3"></div>
					<div class="text">CREATIVA</div>
				</div>
				<div>
					<div class="img" id="hab4"></div>
					<div class="text">CONFIABLE</div>
				</div>
				<div>
					<div class="img" id="hab5"></div>
					<div class="text">VIGILANTE</div>
				</div>
			</div>
			<div id="cons-container">
				<div>
					<h1>Forma parte de nuestra <b>constelación</b></h1>
					<p>
						Agustina nos enseña cada día a no rendirnos, a que todo puede pasar, pero que si queremos podemos cambiar el
						mundo, como ella nos los cambio a nosotros y la Osa Mayor
					</p>
					<p>
						Es quien la recibe en el cielo, quien la acogió desde que se fue de nuestro lado y quien nos permite ver el
						camino que debemos seguir, ella es nuestra intercesora, nos ayuda a conectar con quienes desean cambiar el
						mundo y todavía no descubrieron cómo.
					</p>
				</div>
				<div>
					<form action="formVoluntariado.php" method="post">
						<label id="name-l">Nombre Completo</label>
						<input id="name" name="name" type="text" placeholder="Nombre Completo" required>
						<label id="date-l">Fecha de Nacimiento</label>
						<input id="date" name="date" type="date" placeholder="Fecha de Nacimiento" required>
						<label id="correo-l">Correo Electrónico</label>
						<input id="correo" name="correo" type="email" placeholder="Correo Electrónico" required>
						<label id="prof-l">Profesión u ocupación</label>
						<input id="prof" name="prof" type="text" placeholder="Profesión u ocupación" required>
						<div id="mid-form">
							<span id="span-sex">
								<label id="sexo-l">Sexo</label>
								<select id="sexo" name="sexo" required>
									<option value="" selected>Sexo</option>
									<option value="Masculino">Masculino</option>
									<option value="Femenino">Femenino</option>
									<option value="otro">Otro</option>
								</select>
							</span>
							<span id="span-num">
								<label id="numero-l">Número de contacto</label>
								<input id="numero" name="numero" type="tel" placeholder="Número de contacto" required>
							</span>
						</div>
						<label id="resumen-l">Cuentanos un poco sobre tí</label>
						<textarea id="resumen" name="resumen" ows="4" placeholder="Cuentanos un poco sobre tí" required minlength="50"></textarea>
						<input type="submit" value="Enviar Solicitud">
					</form>
				</div>
			</div>
		</main>
		<?php include "footer.php" ?>
	</body>
</hmtl>