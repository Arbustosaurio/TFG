<!-- Daniel Gaspar Candela -->
   
   <style>
                
        nav {
            display: flex;
            font-size: larger;
            justify-content: space-between;
        }

        nav a {
            text-decoration: none;
            font-size: larger;
            color: black;
            margin: auto;
        }
        nav ul {
            list-style: none;
            z-index: 100;
        }
        nav ul li {
            display: inline-block;
            padding: 15px 0px;
            position: relative;
            width: 125px;
            text-align: center;
        }
        nav ul li > ul {
            display: none;
            padding: 0;
            margin: 10px;
            left: -8%;
            top: 78%;
        }

        /*   menu desplegable
        nav ul li:hover > ul {
            display: block;
            position: absolute;
        }
            */
    </style>
    
    <header>
        TITULO
    </header>

    <nav>
        <ul>
            <li> <a href="landing.php">Landing</a>
            <li> <a href="leer.php">Leer</a>
            <!--    <ul>       menu desplegable
                    <li><a href="#">Historial</a></li>
                    <li><a href="#">Completadas</a></li>
                    <li><a href="#">Generos</a></li>
                    <li><a href="#">Novedades</a></li>
                </ul> -->
            </li>
            <li> <a href="#">Crear</a> </li>
            <li> <a href="#">Personajes</a> </li>
        </ul>

        <a href="usuario.php">Usuario</a>
    </nav>
