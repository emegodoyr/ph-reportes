<?php

function resultado(){
    $response = '';
    $area = $_POST['area'];

    $query = "select
  persona.nombre,
  persona.rut,
  persona.apellido,
  persona.afp,
  persona.cargo,
  persona.salud,
  contrato.fecha_ingreso,
  contrato.fecha_termino
from
  persona,
  contrato
where
  contrato.idcontrato=persona.contrato_idcontrato";

    if($area != null){
        $query .= " AND persona.area = '".$area."'";
    }
    $mysqli = new mysqli("database", "admin", "db-phreportes", "db-phreportes");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

    $response_db = $mysqli->query($query);

    $tbody = '<tbody>';
    $cabezera = '<tr><thead>';
    while($fila = $response_db->fetch_array(MYSQLI_ASSOC)){
        $tr = '<tr>';

        foreach ($fila as $key => $value){
            $tr .= '<td>'.$fila[$key].'</td>';
        }
        $tr .= '</tr>';

        $tbody .= $tr;
    }

    foreach ($response_db->fetch_fields() as $key => $value){
        $cabezera .= '<th>'.$value->name.'</th>';
    }

    $cabezera .= '</tr></thead>';

    $tbody .= '</tbody>';
    $response .= $cabezera;
    $response .= $tbody;
    return $response;
}
?>


<!DOCTYPE HTML>
<!--
Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Elements - Hyperspace by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
<body>

<!-- Header -->
<header id="header">
    <a href="index.html" class="title">Hyperspace</a>
    <nav>
        <ul>
            <li><a href="admin.html">Volver</a></li>
        </ul>
    </nav>
</header>

<!-- Wrapper -->
<div id="wrapper">

    <!-- Main -->




            <!-- Table -->
            <section>
                <div class="table-wrapper">
                    <table>

                            <?php echo resultado()?>


                    </table>
                </div>


            </section>

            <!-- Buttons -->


            <!-- Form -->


            <!-- Image -->
        </div>
    </section>

</div>

<!-- Footer -->
<footer id="footer" class="wrapper alt">
    <div class="inner">
        <ul class="menu">
            <li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
        </ul>
    </div>
</footer>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>