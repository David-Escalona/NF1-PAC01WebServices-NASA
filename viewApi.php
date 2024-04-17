<!DOCTYPE html>
<html>
<head>
    <title>Visualización de Datos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
<!DOCTYPE html>
<html>
<head>
    <title>Visualización de Datos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Tabla de Datos</h2>

<table>
    <tr>
        <th>Link Count</th>
        <th>Organization ID</th>
        <th>Organization Name</th>
        <th>Organization Type</th>
        <th>DUNS Number</th>
    </tr>

    <?php
    // Datos de conexión a la base de datos
    $dsn = "pgsql:host=localhost;port=5432;dbname=usuaris";
    $username = "postgres";
    $password = "root";

    try {
        // Crear conexión
        $conn = new PDO($dsn, $username, $password);
        // Habilitar excepciones PDO
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta SQL para obtener datos
        $sql = "SELECT * FROM datos";
        $stmt = $conn->query($sql);

        // Mostrar los datos en la tabla
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['linkcount']."</td>";
            echo "<td>".$row['organizationid']."</td>";
            echo "<td>".$row['organizationname']."</td>";
            echo "<td>".$row['organizationtype']."</td>";
            echo "<td>".$row['dunsnumber']."</td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Cerrar conexión
    $conn = null;
    ?>

</table>

</body>
</html>
