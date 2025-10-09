<?php
// get_counts.php

// Include DB connection
include 'db_connection.php'; // ✅ Make sure this path is correct

// Get instructors count
$instructorQuery = "SELECT COUNT(*) AS total FROM instructors";
$instructorResult = mysqli_query($conn, $instructorQuery);
$instructorCount = mysqli_fetch_assoc($instructorResult)['total'] ?? 0;

// Get subjects count
$subjectQuery = "SELECT COUNT(*) AS total FROM subjects";
$subjectResult = mysqli_query($conn, $subjectQuery);
$subjectCount = mysqli_fetch_assoc($subjectResult)['total'] ?? 0;

// Return as JSON
echo json_encode([
  'instructors' => $instructorCount,
  'subjects' => $subjectCount
]);
?>
