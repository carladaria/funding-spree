<?php
// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect and sanitize input data
    $address = !empty($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $relationship = !empty($_POST['relationship']) ? htmlspecialchars($_POST['relationship']) : '';
    $timeframe = !empty($_POST['timeframe']) ? htmlspecialchars($_POST['timeframe']) : '';
    $bedrooms = !empty($_POST['bedrooms']) ? htmlspecialchars($_POST['bedrooms']) : '';
    $fullBathrooms = !empty($_POST['fullBathrooms']) ? htmlspecialchars($_POST['fullBathrooms']) : '';
    $partialBathrooms = !empty($_POST['partialBathrooms']) ? htmlspecialchars($_POST['partialBathrooms']) : '';
    $squareFootage = !empty($_POST['squareFootage']) ? htmlspecialchars($_POST['squareFootage']) : '';
    $floors = !empty($_POST['floors']) ? htmlspecialchars($_POST['floors']) : '';
    $basement = !empty($_POST['basement']) ? htmlspecialchars($_POST['basement']) : '';
    $yearBuilt = !empty($_POST['yearBuilt']) ? htmlspecialchars($_POST['yearBuilt']) : '';
    $pool = !empty($_POST['pool']) ? htmlspecialchars($_POST['pool']) : '';
    $coveredParking = !empty($_POST['coveredParking']) ? htmlspecialchars($_POST['coveredParking']) : '';
    $garageSpaces = !empty($_POST['garageSpaces']) ? htmlspecialchars($_POST['garageSpaces']) : '';
    $countertops = !empty($_POST['countertops']) ? htmlspecialchars($_POST['countertops']) : '';
    $appliances = !empty($_POST['appliances']) ? htmlspecialchars($_POST['appliances']) : '';
    $kitchenCondition = !empty($_POST['kitchenCondition']) ? htmlspecialchars($_POST['kitchenCondition']) : '';
    $bathroomCondition = !empty($_POST['bathroomCondition']) ? htmlspecialchars($_POST['bathroomCondition']) : '';
    $livingCondition = !empty($_POST['livingCondition']) ? htmlspecialchars($_POST['livingCondition']) : '';
    $exteriorCondition = !empty($_POST['exteriorCondition']) ? htmlspecialchars($_POST['exteriorCondition']) : '';
    $motivations = isset($_POST['motivations']) ? implode(", ", $_POST['motivations']) : ''; // Join motivations into a string
    $name = !empty($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $phone = !empty($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $email = !empty($_POST['email']) ? htmlspecialchars($_POST['email']) : '';

    // Prepare the email
    $to = "carla@fannypackstudios.com"; // Recipient email
    $subject = "New Home Offer from $name"; // Subject of the email
    $message = "A new home offer has been received:\n\n";
    $message .= "Address: $address\n";
    $message .= "Relationship: $relationship\n";
    $message .= "Timeframe: $timeframe\n";
    $message .= "Bedrooms: $bedrooms\n";
    $message .= "Full Bathrooms: $fullBathrooms\n";
    $message .= "Partial Bathrooms: $partialBathrooms\n";
    $message .= "Square Footage: $squareFootage\n";
    $message .= "Floors: $floors\n";
    $message .= "Basement: $basement\n";
    $message .= "Year Built: $yearBuilt\n";
    $message .= "Pool: $pool\n";
    $message .= "Covered Parking: $coveredParking\n";
    $message .= "Garage Spaces: $garageSpaces\n";
    $message .= "Countertops: $countertops\n";
    $message .= "Appliances: $appliances\n";
    $message .= "Kitchen Condition: $kitchenCondition\n";
    $message .= "Bathroom Condition: $bathroomCondition\n";
    $message .= "Living Room Condition: $livingCondition\n";
    $message .= "Exterior Condition: $exteriorCondition\n";
    $message .= "Motivations: $motivations\n";
    $message .= "Name: $name\n";
    $message .= "Phone: $phone\n";
    $message .= "Email: $email\n";

    // Set email headers
    $headers = "From: $email\r\n"; // Sender's email
    $headers .= "Reply-To: $email\r\n"; // Address to reply to
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n"; // Charset

    // Send the email
    if(mail($to, $subject, $message, $headers)) {
        // Successful email sending
        header("Location: thank_you.html"); // Redirect to a thank-you page
        exit; // Exit the script
    } else {
        // Email sending failed
        header("Location: error.html"); // Redirect to an error page
        exit; // Exit the script
    }
} else {
    // If not a POST request, redirect to an error or home page
    header("Location: error.html");
    exit;
}
?>