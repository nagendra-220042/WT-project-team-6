<?php
require 'config.php';

$action = $_GET['action'] ?? '';
$data = json_decode(file_get_contents('php://input'), true);

if ($action === 'book') {
    $patient_id = intval($data['patient_id'] ?? 0);
    $doctor_id = intval($data['doctor_id'] ?? 0);
    $date = $data['appointment_date'] ?? '';
    $time = $data['time_slot'] ?? '';
    $aadhaar_number = $data['aadhaar_number'] ?? '';
    
    try {
        $stmt = $pdo->prepare("INSERT INTO appointments (patient_id, doctor_id, appointment_date, time_slot, status, aadhaar_number) VALUES (?, ?, ?, ?, 'pending', ?)");
        $stmt->execute([$patient_id, $doctor_id, $date, $time, $aadhaar_number]);
        echo json_encode(['status' => 'success']);
    } catch(PDOException $e) {
        http_response_code(500); echo json_encode(['error' => 'Database error']);
    }
} elseif ($action === 'my_appointments') {
    $patient_id = intval($_GET['patient_id'] ?? 0);
    $stmt = $pdo->prepare("
        SELECT a.*, d.name as doctor_name, d.specialization 
        FROM appointments a 
        JOIN doctors d ON a.doctor_id = d.id 
        WHERE a.patient_id = ? 
        ORDER BY a.appointment_date DESC, a.time_slot ASC
    ");
    $stmt->execute([$patient_id]);
    echo json_encode(['data' => $stmt->fetchAll()]);
} elseif ($action === 'cancel') {
    $id = intval($data['id'] ?? 0);
    $stmt = $pdo->prepare("UPDATE appointments SET status = 'cancelled' WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(['status' => 'success']);
} elseif ($action === 'all_appointments') {
    $stmt = $pdo->query("
        SELECT a.*, d.name as doctor_name, u.name as patient_name 
        FROM appointments a 
        JOIN doctors d ON a.doctor_id = d.id 
        JOIN users u ON a.patient_id = u.id
        ORDER BY a.appointment_date DESC, a.time_slot ASC
    ");
    echo json_encode(['data' => $stmt->fetchAll()]);
}
?>
