<?php
session_start();
require('fpdf/fpdf.php');

// Function to fetch data from the database
function fetchAttendanceData() {
    // Replace the connection details with your actual database information
    include 'includes/dbh.inc.php';

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $sql = "SELECT * FROM attendence WHERE course_name='{$_SESSION['course_name']}'";
    $result = $conn->query($sql);

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $conn->close();

    return $data;
}

// Create a new PDF document
$pdf = new FPDF();

// Add a page
$pdf->AddPage();

// Teacher name and course name (replace 'Teacher Name' and 'Course Name' with actual values)
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'Teacher Name: Prodosh C. Mitter', 0, 1, 'C');
$pdf->Cell(0, 10, 'Course Name: CSE 1101', 0, 1, 'C');
$pdf->Ln(10);

// Fetch data from the attendance table
$data = fetchAttendanceData();

// Set font
$pdf->SetFont('Arial', '', 12);

// Organize data by student and date
$attendanceByStudent = array();
$allDates = array();
foreach ($data as $row) {
    if (!isset($attendanceByStudent[$row['roll']])) {
        $attendanceByStudent[$row['roll']] = array(
            
            'attendance_dates' => array(),
            'attendance_count' => 0
        );
    }

    $dates = explode(',', $row['attendance_date']);
    $statuses = explode(',', $row['status']);

    foreach ($dates as $i => $date) {
        if (!in_array($date, $allDates)) {
            $allDates[] = $date;
        }

        if ($statuses[$i] === 'present') {
            $attendanceByStudent[$row['roll']]['attendance_dates'][$date] = 'P';
            $attendanceByStudent[$row['roll']]['attendance_count']++;
        } else {
            $attendanceByStudent[$row['roll']]['attendance_dates'][$date] = 'A';
        }
    }
}

// Output attendance data
$pdf->Cell(30, 10, 'Roll', 1);

foreach ($allDates as $date) {
    $pdf->Cell(30, 10, $date, 1, 0, 'C');
}
$pdf->Cell(30, 10, 'Total Present', 1);
$pdf->Ln();

foreach ($attendanceByStudent as $roll => $studentData) {
    $pdf->Cell(30, 10, $roll, 1);

    foreach ($allDates as $date) {
        if (isset($studentData['attendance_dates'][$date])) {
            $pdf->Cell(30, 10, $studentData['attendance_dates'][$date], 1, 0, 'C');
        } else {
            $pdf->Cell(30, 10, '', 1, 0, 'C');
        }
    }

    $pdf->Cell(30, 10, $studentData['attendance_count'], 1);
    $pdf->Ln();
}

// Output the PDF as a download
$pdf->Output('attendance_sheet.pdf', 'D');
?>
