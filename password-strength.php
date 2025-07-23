<?php
function checkPasswordStrength($password) {
    $strength = 0;
    $feedback = [];

    // Length check
    $length = strlen($password);
    if ($length >= 8) {
        $strength += 2;
    } elseif ($length >= 5) {
        $strength += 1;
        $feedback[] = "Password is short; consider using at least 8 characters.";
    } else {
        $feedback[] = "Password is too short.";
    }

    // Character types
    if (preg_match('/[a-z]/', $password)) $strength++;
    else $feedback[] = "Add lowercase letters.";

    if (preg_match('/[A-Z]/', $password)) $strength++;
    else $feedback[] = "Add uppercase letters.";

    if (preg_match('/[0-9]/', $password)) $strength++;
    else $feedback[] = "Include numbers.";

    if (preg_match('/[^a-zA-Z0-9]/', $password)) $strength++;
    else $feedback[] = "Use special characters (e.g., @, #, $, !).";

    // Optional dictionary check
    $commonPasswords = ['password', '123456', 'admin', 'qwerty'];
    if (in_array(strtolower($password), $commonPasswords)) {
        $strength = 1;
        $feedback[] = "Avoid common or predictable passwords.";
    }

    // Strength label
    if ($strength <= 2) {
        $label = "Weak";
    } elseif ($strength <= 4) {
        $label = "Moderate";
    } else {
        $label = "Strong";
    }

    return [
        'score' => $strength,
        'label' => $label,
        'feedback' => $feedback
    ];
}

// Example usage
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = checkPasswordStrength($_POST['password']);
    echo "<strong>Strength:</strong> {$result['label']}<br>";
    echo "Score: {$result['score']} / 6<br>";
    if (!empty($result['feedback'])) {
        echo "<ul>";
        foreach ($result['feedback'] as $tip) {
            echo "<li>$tip</li>";
        }
        echo "</ul>";
    }
}
?>
