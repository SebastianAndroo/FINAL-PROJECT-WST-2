<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f0f2f5;
        padding-top: 80px; /* Account for nav height */
    }
    .container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background-color: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.3);
        width: 70%;
        max-width: 900px;
        gap: 30px;
    }
    .logo-section img {
        width: 400px;
        height: auto;
        margin-bottom: 15px;
    }
    .logo-section p {
        text-align: center;
        color: #555;
        font-size: 1rem;
    }
    .form-content {
        flex: 2;
        display: flex;
        flex-direction: column;
        padding: 20px;
    }
    .form-content h2 {
        margin-bottom: 20px;
        font-size: 1.8rem;
        color: #333;
        text-align: left;
    }
    form {
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
        font-size: 1rem;
        font-weight: 500;
    }
    .form-group input[type="text"],
    .form-group input[type="username"],
    .form-group input[type="password"],
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 1rem;
        outline: none;
        transition: all 0.3s ease;
    }
    .form-group button {
        width: 100%;
        padding: 14px;
        font-size: 1rem;
        font-weight: bold;
        color: white;
        background-color: #001f3f;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;        
    }
    .form-group button:hover {
        background: linear-gradient(90deg, #003c8f, #0056b3);
        box-shadow: 0px 4px 8px rgba(0, 123, 255, 0.3);
        transform: translateY(-2px);
    }
    .form-toggle {
        text-align: center;
        margin-top: 15px;
    }
    .form-toggle a {
        color: #001f3f;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }
    .form-toggle a:hover {
        color: #0056b3;
        text-decoration: underline;
    }
    </style>
</head>
<body>

    <div class="container">
        <div class="logo-section">
            <img src="uploads/switsremovebg.png" class="sidebar-logo" alt="SWITS Logo">
            <p>Login using your credentials to access the system.</p>
        </div>

        <div id="loginForm" class="form-content" style="display: block;">
            <h2>LOGIN FORM</h2>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
                <div class="form-toggle">
                    Don’t have an account? <a href="#" onclick="showForm('signup')">Register</a>
                </div>
            </form>
        </div>

        <div id="signupForm" class="form-content" style="display: none;">
            <h2>SIGNUP FORM</h2>
            <form action="signup.php" method="post">
				<div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Signup</button>
                </div>
                <div class="form-toggle">
                    Already have an account? <a href="#" onclick="showForm('login')">Login</a>
                </div>
            </form>
        </div>
    </div>

     <script>
         function showForm(formType) {
             const loginForm = document.getElementById('loginForm');
             const signupForm = document.getElementById('signupForm');
             if (formType === 'login') {
                 loginForm.style.display = 'block';
                 signupForm.style.display = 'none';
             } else if (formType === 'signup') {
                loginForm.style.display = 'none';
                signupForm.style.display = 'block';
            }
         }
     </script>
</body>
</html>