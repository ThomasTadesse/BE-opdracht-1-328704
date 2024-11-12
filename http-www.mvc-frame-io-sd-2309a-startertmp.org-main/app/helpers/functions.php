<?php

// Enable error reporting for debugging
error_reporting(0);

/**
 * Functie voor het loggen van de errors die ontstaan door try-catch
 * De volgende zaken worden gelogd
 * - Errormessage van de fout
 * - datum en tijd wanneer de fout is opgetreden
 * - bestand waar de fout is opgetreden
 * - regelnummer van de fout
 * - method waarin de fout is opgetreden
 * - ip-adres van de veroorzaker van de fout
 */

function logger($line, $method, $file, $error)
{
    // Debugging: Check if the function is called
    error_log("Logger function called");

    // Set the timezone
    date_default_timezone_set('Europe/Amsterdam');
    $time = "Datum/tijd: " . date('d-m-Y H:i:s', time()) . "\r";

    // Prepare error details
    $error = "De error is: " . $error . "\r";
    $remote_ip = "Remote IP-adres: " . $_SERVER['REMOTE_ADDR'] . "\r";
    $filename = "Filename: " . $file . "\r";
    $methodname = "Methodname: " . $method . "\r";
    $linenumber = "Linenumber: " . $line . "\r";
    $content = $time . $remote_ip . $error . $filename . $methodname . $linenumber . "\r";

    // Define the log file path
    $pathToLogFile = APPROOT . "/logs/nonfunctionallog.txt";
    error_log("Log file path: " . $pathToLogFile);

    // Ensure the log directory exists
    $logDir = dirname($pathToLogFile);
    if (!is_dir($logDir)) {
        error_log("Log directory does not exist. Creating directory: " . $logDir);
        if (!mkdir($logDir, 0777, true)) {
            error_log("Failed to create log directory: " . $logDir);
            return;
        }
    }

    // Check if the log file exists
    if (!file_exists($pathToLogFile)) {
        error_log("Log file does not exist. Creating file: " . $pathToLogFile);
        if (file_put_contents($pathToLogFile, "Non Functional Log\r") === false) {
            error_log("Failed to create log file: " . $pathToLogFile);
            return;
        }
    }

    // Write the error to the log file
    error_log("Writing to log file: " . $pathToLogFile);
    if (file_put_contents($pathToLogFile, $content, FILE_APPEND) === false) {
        error_log("Failed to write to log file: " . $pathToLogFile);
    }
}