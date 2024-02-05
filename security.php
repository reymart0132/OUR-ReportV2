<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recaptcha_secret_key = "6LcZHmwoAAAAADZh4bK3HzmFGzLXvTvRs3XiQOsz";
    $recaptcha_response = $_POST["g-recaptcha-response"];

    // Send a POST request to Google reCAPTCHA for verification
    $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify";
    $recaptcha_data = [
        "secret" => $recaptcha_secret_key,
        "response" => $recaptcha_response,
    ];

    $options = [
        "http" => [
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($recaptcha_data),
        ],
    ];

    $context = stream_context_create($options);
    $recaptcha_result = file_get_contents($recaptcha_url, false, $context);
    $recaptcha_result = json_decode($recaptcha_result);

    if ($recaptcha_result->success) {
        // reCAPTCHA verification was successful
        // Process your form submission here
        echo "reCAPTCHA verification passed. Form submitted successfully!";
    } else {
        // reCAPTCHA verification failed
        // Display an error message or take appropriate action
        echo "reCAPTCHA verification failed. Please try again.";
    }
} else {
    // If the form was not submitted via POST, handle the situation accordingly
    echo "This script is meant to handle form submissions only.";
}
?>