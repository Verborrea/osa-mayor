<?php
    // connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "epiz_33068761_agustina_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo "Error";
        die("Connection failed: " . $conn->connect_error);
    }

	$myid = strval($id);
    $sql = "SELECT * FROM articulos WHERE id = $myid";
    
    $result = $conn->query($sql);                   
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
			$s = html_entity_decode(htmlspecialchars_decode($row["contenido"]));
			$sub = substr($s, 0, 150);
			$prev = strip_tags($sub) . "...";
            $autor = $row["autor"];
            $titulo = $row["titulo"];
            $contenido = html_entity_decode(htmlspecialchars_decode($row["contenido"]));
            $categoria = $row["categoria"];
            $fecha = $row["fecha"];
            $portada = $row["portada"];
        }
    }
?>

<!DOCTYPE html>
<hmtl lang="es-PE">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta property="og:title" content="<?php echo $titulo?>" />
		<meta property="og:description" content="<?php echo $prev?>"/>
		<meta property="og:image" content="agustinaylaosamayor.rf.gd/articles/<?php echo $portada?>" />
		<title><?php echo $titulo; ?></title>
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico?">
		<link rel="manifest" href="icons/site.webmanifest">
		<link href="../styles/layout.css" rel="stylesheet">
		<link href="../styles/star_sizes.css" rel="stylesheet">
		<link href="../styles/header.css" rel="stylesheet">
		<link href="../styles/entry.css" rel="stylesheet">
	</head>

	<body>
		<header>
			<div id="logo">
				<img src="../media/logo_header.png" width="500px" alt="Agustina y la Osa Mayor - Logo">
				<br>
				FACILITADORES SOLIDARIOS
			</div>
			<div id="sky">
				<div id="container_gif1"><img id="gif1" src="../media/gif1.gif"></div>
				<div id="ursa">
				<img id="star_path" src="../media/camino.png">
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
				<div id="container_gif2"><img id="gif2" img src="../media/gif2.gif"></div>
			</div>
		</header>
		<main>
			<img id="portada" <?php echo 'src="../articles/'.$portada.'"'; ?> alt="Portada del artículo">
			<div class="btn-holder">
				<a class="b_button" href="/galeria">Galería</a>
				<a class="b_button" id="b_sel" href="/blog">Articulos</a>
			</div>
			<div class="container">
				<div id="social-media">
					<div id="media-box">
						<div class="share-text">Share</div>
						<div class="floating-icon-container">
							<a class="social-icon-box" data-sharer="twitter"
							href="https://twitter.com/intent/tweet?text=Lee%20este%20artículo%20de%20Agustina%20y%20la%20Osa%20Mayor:%20agustinaylaosamayor.rf.gd/articulos/<?php echo $myid?>"
								data-url="/ideas/principles/web-design/best-modern-fonts-for-websites/" data-via="AdobeXD"
								data-title="The fonts you choose to use on your website play a vital role in your user experience (UX). Here's our pick of the best modern fonts for websites.">
								<svg width="13.502" height="10.971" viewBox="0 0 13.502 10.971" class="twitter-icon social-icon" >
									<g id="Group_71335" data-name="Group 71335" transform="translate(-1325.123 -792.31)">
										<path id="Path_40034" data-name="Path 40034"
											d="M79.246,109.421a7.828,7.828,0,0,0,7.882-7.882c0-.12,0-.239-.008-.358A5.637,5.637,0,0,0,88.5,99.748a5.529,5.529,0,0,1-1.591.436,2.78,2.78,0,0,0,1.218-1.532,5.551,5.551,0,0,1-1.759.672,2.773,2.773,0,0,0-4.721,2.526,7.865,7.865,0,0,1-5.709-2.894,2.772,2.772,0,0,0,.858,3.7,2.75,2.75,0,0,1-1.257-.347v.035a2.771,2.771,0,0,0,2.222,2.716,2.766,2.766,0,0,1-1.251.048,2.773,2.773,0,0,0,2.588,1.924,5.558,5.558,0,0,1-3.44,1.188,5.639,5.639,0,0,1-.659-.04,7.843,7.843,0,0,0,4.246,1.242"
											transform="translate(1250.123 693.86)"></path>
									</g>
								</svg>
								
							</a>
							<a class="social-icon-box" data-sharer="facebook" data-href = "agustinaylaosamayor.rf.gd/articulos/<?php echo $myid?>"
							href = "https://www.facebook.com/sharer/sharer.php?&u=agustinaylaosamayor.rf.gd/articulos/<?php echo $myid?>"
								data-url="/ideas/principles/web-design/best-modern-fonts-for-websites/"
								data-title="The fonts you choose to use on your website play a vital role in your user experience (UX). Here's our pick of the best modern fonts for websites.">
								<svg width="7.465" height="13.582" viewBox="0 0 7.465 13.582" class="facebook-icon social-icon">
									<g id="Group_71333" data-name="Group 71333" transform="translate(-1303.05 -791.418)">
										<path id="Path_40032" data-name="Path 40032"
											d="M11.546,19V12.8H9.461V10.389h2.086V8.612a2.948,2.948,0,0,1,2.6-3.186,17.374,17.374,0,0,1,2.368.089v2.16H15.236c-.508,0-1.192.212-1.192.765v1.949h2.391L16.12,12.8H14.04V19Z"
											transform="translate(1294 786)"></path>
									</g>
								</svg>
							</a>
							<a class="social-icon-box" href="javascript:void(0)" tooltip="Copied" onclick="navigator.clipboard.writeText('agustinaylaosamayor.rf.gd/articulos/<?php echo $myid?>');">
								<svg xmlns="http://www.w3.org/2000/svg" width="12.167" height="12.146" viewBox="0 0 20.653 20.791">
									<g id="noun_link_1098681" transform="translate(-20.1 -19.9)">
										<g id="Group_161749" data-name="Group 161749" transform="translate(20.1 19.9)">
											<path id="Path_104007" data-name="Path 104007"
												d="M21.136,50.463,24.072,53.4a3.836,3.836,0,0,0,5.388,0L33.6,49.254,32.153,47.8l-4.144,4.144a1.759,1.759,0,0,1-1.209.518,1.62,1.62,0,0,1-1.209-.518l-2.936-2.936a1.759,1.759,0,0,1-.518-1.209,1.62,1.62,0,0,1,.518-1.209L26.8,42.451,25.35,41l-4.144,4.144A3.73,3.73,0,0,0,20.1,47.838,3.65,3.65,0,0,0,21.136,50.463Z"
												transform="translate(-20.1 -33.713)"></path>
											<path id="Path_104008" data-name="Path 104008"
												d="M53.268,23.941l-2.936-2.936a3.836,3.836,0,0,0-5.388,0L40.8,25.15,42.251,26.6,46.4,22.456a1.759,1.759,0,0,1,1.209-.518,1.62,1.62,0,0,1,1.209.518l2.936,2.936a1.759,1.759,0,0,1,.518,1.209,1.62,1.62,0,0,1-.518,1.209L47.6,31.953,49.054,33.4,53.2,29.26A3.73,3.73,0,0,0,54.3,26.566,3.65,3.65,0,0,0,53.268,23.941Z"
												transform="translate(-33.651 -19.9)"></path>
											<rect id="Rectangle_154828" data-name="Rectangle 154828" width="9.67" height="2.072"
												transform="translate(6.175 13.082) rotate(-45)"></rect>
										</g>
									</g>
								</svg>
							</a>
						</div>
					</div>
				</div>
				<div id="articulo">
					<div id="categoria">
						<?php echo $categoria; ?>
					</div>
					<div id="titulo">
						<?php echo $titulo; ?>
					</div>
					<div id="info">
						Por:
						<span id="autor"><?php echo $autor; ?></span>
						·
						<span id="fecha"><?php echo $fecha; ?></span>
						·
						<span id="duracion"></span>
					</div>
					<div id="content">
						<?php echo $contenido; ?>
					</div>
				</div>
				<div id="space"> </div>
			</div>
			<div id="more-container">
				<div id="mas-contenido">
					<a href="#otrosarticulos-container">MÁS CONTENIDO COMO ESTE</a>
					<img src="../media/svg/b_arrow.svg">
				</div>
				<div id="otrosarticulos-container">
                <?php
                $sql =  "SELECT * FROM articulos WHERE id <> $myid ORDER BY RAND() LIMIT 2";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                       $autor = strtoupper($row["autor"]);
                       $s = html_entity_decode(htmlspecialchars_decode($row["contenido"]));
                       $sub = substr($s, 0, 150);
                       $resumen =  strip_tags($sub) . "...";
                       echo '<a class="otro" href="/articulos/'.$row["id"].'">'.
                                '<img class="thumbnail" src="../articles/'.$row["portada"].'">'.
                                '<div class="otro-info">'.
                                    '<div class="otro-cat">'.$row["categoria"].'</div>'.
                                    '<div class="otro-tit">'.$row["titulo"].'</div>'.
                                    '<div class="otro-aut">POR '.$autor.'</div>'.
                                    '<div class="otro-res">'.$resumen.'</div>'.
                                '</div>'.
                            '</a>';
                    }
                }
                
                $conn->close();
                ?>
				</div>
			</div>
		</main>
        <script>
            //date
            String.prototype.replaceAt = function(index, replacement) {
                return this.substring(0, index) + replacement + this.substring(index + replacement.length);
            }

            const article_date = new Date(document.getElementById("fecha").innerText);
            const date_options = { year: 'numeric', month: 'short', day: 'numeric' };
            const date_string = article_date.toLocaleDateString("es-PE", date_options);
            document.getElementById("fecha").innerText = date_string.replaceAt(2,date_string[2].toUpperCase());;

            // reading time
            document.getElementById("fecha");
            const post = document.getElementById("content");
            const readingTimeSummary = document.getElementById("duracion");
            const avgWordsPerMin = 250;

            setReadingTime();

            function setReadingTime() {
                let count = getWordCount();
                let time = Math.ceil(count / avgWordsPerMin);

                readingTimeSummary.innerText = time + " min.";
            }

            function getWordCount() {
                return post.innerText.match(/\w+/g).length;
            }
        </script>
		<footer>
			<img src="../media/oso.png" alt="Logotipo Oso">
			<br>
			<a href="https://www.instagram.com/agustinaylaosamayor" target="_blank"><img class="social_media"
					src="../media/svg/insta.svg"></a>
			<a href="https://web.facebook.com/agustinaylaosamayor" target="_blank"><img class="social_media"
					src="../media/svg/fb.svg"></a>
			<a href="https://www.youtube.com/channel/UC5gVn5qG1ZIVy-9mxkg0w7Q" target="_blank"><img class="social_media"
					src="../media/svg/yt.svg"></a>
			<div id="footer_navbar">
				<a href="/terminos-y-condiciones">Términos de uso</a>
				·
				<a href="/privacidad">Política de Privacidad</a>
				·
				<a href="/contacto">Contacto</a>
			</div>
			<p id="copyright">© 2022 Agustina y la Osa Mayor</p>
		</footer>
	</body>
</hmtl>