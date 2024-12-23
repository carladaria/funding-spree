<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['name'] ?? '');
    $phone = htmlspecialchars($_POST['phone'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $address = htmlspecialchars($_POST['address'] ?? ''); // Collecting the address input
    $relationship = htmlspecialchars($_POST['relationship'] ?? '');
    $timeframe = htmlspecialchars($_POST['timeframe'] ?? '');
    $bedrooms = htmlspecialchars($_POST['bedrooms'] ?? '');
    $fullBathrooms = htmlspecialchars($_POST['fullBathrooms'] ?? '');
    $partialBathrooms = htmlspecialchars($_POST['partialBathrooms'] ?? '');
    $squareFootage = htmlspecialchars($_POST['squareFootage'] ?? '');
    $floors = htmlspecialchars($_POST['floors'] ?? '');
    $basement = htmlspecialchars($_POST['basement'] ?? '');
    $yearBuilt = htmlspecialchars($_POST['yearBuilt'] ?? '');
    $pool = htmlspecialchars($_POST['pool'] ?? '');
    $coveredParking = htmlspecialchars($_POST['coveredParking'] ?? '');
    $garageSpaces = htmlspecialchars($_POST['garageSpaces'] ?? '');
    // Collect checkbox values (if any are checked)
    $motivations = isset($_POST['motivations']) ? implode(", ", $_POST['motivations']) : 'None selected';
    
    // Prepare the content for the file
    $content = "Name: $name\nPhone: $phone\nEmail: $email\n";
    $content .= "Address: $address\nRelationship: $relationship\n";
    $content .= "Timeframe: $timeframe\nBedrooms: $bedrooms\n";
    $content .= "Full Bathrooms: $fullBathrooms\nPartial Bathrooms: $partialBathrooms\n";
    $content .= "Square Footage: $squareFootage\nFloors: $floors\n";
    $content .= "Basement: $basement\nYear Built: $yearBuilt\n";
    $content .= "Pool: $pool\nCovered Parking: $coveredParking\n";
    $content .= "Garage Spaces: $garageSpaces\nMotivations: $motivations\n";
    $content .= "------------------------------------------\n"; // Separator line for clarity

    // Save the information to a file
    $file = 'messages.txt';
    file_put_contents($file, $content, FILE_APPEND);
    
    // Success message (you may wish to redirect or show a nicer confirmation)
    echo "Form submitted successfully.";
} else {
    // Handle the case where the script is accessed without form submission
    echo "Invalid request.";
}
?>