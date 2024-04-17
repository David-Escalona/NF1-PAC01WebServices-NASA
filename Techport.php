<?php
// Datos de conexión a la base de datos
$dsn = "pgsql:host=localhost;port=5432;dbname=usuaris";
$username = "postgres";
$password = "root";

// Crear conexión
try {
    $conn = new PDO($dsn, $username, $password);
    // Habilitar excepciones PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
}

// Datos a insertar
$datos = [
    [
        "linkCount" => 1,
        "organizationId" => 1752,
        "organizationName" => "10 Blade, Inc.",
        "organizationType" => "Industry",
        "dunsNumber" => "196314244"
    ],
    [
        "linkCount" => 2,
        "organizationId" => 1753,
        "organizationName" => "Another Organization",
        "organizationType" => "Business",
        "dunsNumber" => "123456789"
    ],
    [
        "linkCount" => 3,
        "organizationId" => 1754,
        "organizationName" => "Yet Another Organization",
        "organizationType" => "Non-profit",
        "dunsNumber" => "987654321"
    ],
    [
        "linkCount" => 4,
        "organizationId" => 1755,
        "organizationName" => "One More Organization",
        "organizationType" => "Education",
        "dunsNumber" => "456789123"
    ]
];

// Consulta SQL para insertar datos
$sql = "INSERT INTO datos (linkCount, organizationId, organizationName, organizationType, dunsNumber) 
        VALUES (:linkCount, :organizationId, :organizationName, :organizationType, :dunsNumber)";

try {
    // Preparar la consulta
    $stmt = $conn->prepare($sql);

    // Insertar cada conjunto de datos
    foreach ($datos as $dato) {
        // Vincular parámetros
        $stmt->bindParam(':linkCount', $dato['linkCount']);
        $stmt->bindParam(':organizationId', $dato['organizationId']);
        $stmt->bindParam(':organizationName', $dato['organizationName']);
        $stmt->bindParam(':organizationType', $dato['organizationType']);
        $stmt->bindParam(':dunsNumber', $dato['dunsNumber']);

        // Ejecutar la consulta para este conjunto de datos
        $stmt->execute();
    }
    echo "Datos insertados correctamente.";
} catch (PDOException $e) {
    echo "Error al insertar datos: " . $e->getMessage();
}

// Cerrar conexión
$conn = null;
?>
