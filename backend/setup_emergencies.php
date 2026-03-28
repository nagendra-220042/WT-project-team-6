<?php
require_once 'config.php';

try {
    $sql = "CREATE TABLE IF NOT EXISTS emergencies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        patient_name VARCHAR(255) NOT NULL,
        patient_phone VARCHAR(20) NOT NULL,
        location_lat DECIMAL(10, 8),
        location_lng DECIMAL(11, 8),
        status ENUM('pending', 'resolved', 'in_progress') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );";
    
    $pdo->exec($sql);
    echo "SUCCESS: The 'emergencies' table has been created!";
} catch (PDOException $e) {
    echo "ERROR: " . $e->getMessage();
}
?>
