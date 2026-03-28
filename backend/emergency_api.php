<?php
require_once 'config.php';

header('Content-Type: application/json');

// Check the action
$action = $_GET['action'] ?? '';

if ($action === 'create') {
    // A patient requests emergency
    $data = json_decode(file_get_contents("php://input"), true);
    
    $name = $data['patient_name'] ?? 'Unknown User';
    $phone = $data['patient_phone'] ?? '112 / 911'; // Optional
    $lat = $data['lat'] ?? null;
    $lng = $data['lng'] ?? null;

    if (!$lat || !$lng) {
        // Fallback or handle error
        $lat = 0.0;
        $lng = 0.0;
    }

    try {
        $stmt = $pdo->prepare("INSERT INTO emergencies (patient_name, patient_phone, location_lat, location_lng, status) VALUES (?, ?, ?, ?, 'pending')");
        $stmt->execute([$name, $phone, $lat, $lng]);
        
        echo json_encode(['success' => true, 'message' => 'Emergency triggered. Help is on the way.']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }

} elseif ($action === 'poll') {
    // Admin polls for recent pending emergencies
    try {
        $stmt = $pdo->prepare("SELECT * FROM emergencies WHERE status = 'pending' ORDER BY created_at DESC");
        $stmt->execute();
        $emergencies = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo json_encode(['success' => true, 'data' => $emergencies]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }

} elseif ($action === 'resolve') {
    // Admin resolves an emergency
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'] ?? null;

    if ($id) {
        try {
            $stmt = $pdo->prepare("UPDATE emergencies SET status = 'resolved' WHERE id = ?");
            $stmt->execute([$id]);
            echo json_encode(['success' => true]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'No ID provided']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid action']);
}
?>
