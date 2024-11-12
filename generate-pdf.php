<?php
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch certificate details from the database
    $stmt = $conn->prepare("SELECT * FROM certificates WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
        // Initialize DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Prepare the HTML content
        $html = '
        <h2 style="text-align: center;">Medical Certificate</h2>
        <hr>
        <p><strong>Patient Name:</strong> ' . $data['patient_name'] . '</p>
        <p><strong>Age:</strong> ' . $data['age'] . '</p>
        <p><strong>Gender:</strong> ' . $data['gender'] . '</p>
        <p><strong>Diagnosis:</strong> ' . $data['diagnosis'] . '</p>
        <p><strong>Date Issued:</strong> ' . $data['issue_date'] . '</p>
        <p><strong>Doctor:</strong> ' . $data['doctor_name'] . '</p>

<h3 style="text-align: center;"> <i>System developed by Ayebazibwe Joel, Year 2, Kabale University.</i></h3>
        ';

        // Load the HTML content into DOMPDF
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the PDF
        $dompdf->render();

        // Output the PDF to browser
        $dompdf->stream("medical_certificate_" . $data['certificate_id'] . ".pdf", ["Attachment" => false]);
    } else {
        echo "Certificate not found.";
    }
} else {
    echo "Invalid certificate ID.";
}
?>
