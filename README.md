# 🔐 PHP Password Strength Checker

A lightweight PHP script to check the strength of a password based on length, character diversity, and predictability.

## ✅ Features

- Checks for:
  - Minimum length
  - Uppercase & lowercase letters
  - Numbers
  - Special characters
  - Common password patterns
- Returns a strength score and feedback
- Easy to integrate into any login or signup form

## 🚀 Usage

1. Include `password-strength.php` in your project.
2. Call:
   ```php
   checkPasswordStrength($password);

## 💡 Example
+ Call
  ```php
  $result = checkPasswordStrength("MyPass123!");
  print_r($result);
  ```
+ Output
  ```
  [
  "score" => 6,
  "label" => "Strong",
  "feedback" => []
  ]
  ```
  
## 📚 License

MIT — free to use, modify, and improve.
