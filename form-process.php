<?php
require __DIR__ . '/includes/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    header('Allow: POST');
    exit('Method not allowed');
}

$errorRedirect = '/contact.php#enquiry';
$token = $_POST['csrf_token'] ?? '';
if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
    $_SESSION['form_error'] = 'Your session expired. Please submit the form again.';
    header('Location: ' . $errorRedirect);
    exit;
}

// Honeypot: bots often fill hidden fields.
if (!empty($_POST['website'])) {
    header('Location: /thank-you.php');
    exit;
}

$clean = static function (string $value, int $max = 255): string {
    $value = trim(preg_replace('/\s+/', ' ', strip_tags($value)) ?? '');
    return substr($value, 0, $max);
};
$csvSafe = static function (string $value): string {
    return preg_match('/^[=+\-@]/', $value) ? "'" . $value : $value;
};

$name = $clean($_POST['name'] ?? '', 100);
$phone = $clean($_POST['phone'] ?? '', 20);
$email = $clean($_POST['email'] ?? '', 150);
$interest = $clean($_POST['interest'] ?? '', 160);
$message = $clean($_POST['message'] ?? '', 1000);
$context = $clean($_POST['context'] ?? 'General Enquiry', 160);
$sourceUrl = $clean($_POST['source_url'] ?? '/', 300);

$phoneDigits = preg_replace('/\D+/', '', $phone) ?? '';
$errors = [];
if (strlen($name) < 2) $errors[] = 'Please enter your name.';
if (strlen($phoneDigits) < 8 || strlen($phoneDigits) > 15) $errors[] = 'Please enter a valid phone number.';
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Please enter a valid email address.';

if ($errors) {
    $_SESSION['form_error'] = implode(' ', $errors);
    header('Location: ' . $errorRedirect);
    exit;
}

$storageDir = __DIR__ . '/storage';
if (!is_dir($storageDir)) {
    @mkdir($storageDir, 0750, true);
}
$leadFile = $storageDir . '/leads.csv';
$isNew = !file_exists($leadFile) || filesize($leadFile) === 0;
$stored = false;
$fp = @fopen($leadFile, 'ab');
if ($fp) {
    if (flock($fp, LOCK_EX)) {
        if ($isNew) {
            fputcsv($fp, ['created_at','name','phone','email','interest','context','message','source_url','ip']);
        }
        fputcsv($fp, [
            date('c'),
            $csvSafe($name),
            $csvSafe($phone),
            $csvSafe($email),
            $csvSafe($interest),
            $csvSafe($context),
            $csvSafe($message),
            $csvSafe($sourceUrl),
            $_SERVER['REMOTE_ADDR'] ?? '',
        ]);
        fflush($fp);
        flock($fp, LOCK_UN);
        $stored = true;
    }
    fclose($fp);
}

$mailed = false;
$notify = trim($site['lead_notification_email'] ?? '');
if ($notify !== '' && filter_var($notify, FILTER_VALIDATE_EMAIL)) {
    $subject = 'New CadMate enquiry: ' . $context;
    $body = "Name: {$name}\nPhone: {$phone}\nEmail: {$email}\nInterest: {$interest}\nContext: {$context}\nMessage: {$message}\nSource: {$sourceUrl}\n";
    $headers = ['Content-Type: text/plain; charset=UTF-8'];
    if ($email !== '') $headers[] = 'Reply-To: ' . $email;
    $mailed = @mail($notify, $subject, $body, implode("\r\n", $headers));
}

if (!$stored && !$mailed) {
    $_SESSION['form_error'] = 'The enquiry could not be saved on this server. Please contact CadMate directly.';
    header('Location: ' . $errorRedirect);
    exit;
}

$_SESSION['csrf_token'] = bin2hex(random_bytes(24));
$_SESSION['last_enquiry'] = ['name' => $name, 'context' => $context];
header('Location: /thank-you.php');
exit;
