<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8" />
            <title>{{page_title}}</title>
            <link rel="stylesheet" href="public/css/smvc.css" />
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
        </head>
        <body>
            <h1>{{page_title}}</h1>
            <ul class="menu">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="index.php?page=categorias">Categorias</a></li>
                <li><a href="index.php?page=productos">Productos</a></li>
                <li><a href="index.php?page=unidades">Unidades</a></li>
                <li><a href="index.php?page=empresas">Empresas</a></li>
                <li><a href="index.php?page=login">Inicia Sesión</a></li>
                <li><a href="index.php?page=registro">Regístrate</a></li>
            </ul>
            {{{page_content}}}
            <div class="footer">
              Todos los derechos Reservados 2015
            </div>
        </body>
    </html>
