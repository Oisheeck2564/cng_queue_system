<?php
include '../config/db.php';

$success = false;
$error = "";

if ($_POST) {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['adrs'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $number = $_POST['num'] ?? '';
    $password = $_POST['password'] ?? '';

    // password validation
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W]).{8,}$/', $password)) {
        $error = "Weak password!";
    } else {

        $pass = password_hash($password, PASSWORD_DEFAULT);
        $role = "user";

        // FIXED ORDER (IMPORTANT)
        $stmt = $conn->prepare("
            INSERT INTO users (name, email, password, role, address, gender, number)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "sssssss",
            $name,
            $email,
            $pass,
            $role,
            $address,
            $gender,
            $number
        );

        if ($stmt->execute()) {
            $success = true;
        } else {
            $error = "Registration failed: " . $stmt->error;
        }
    }
}
?>

<?php include '../includes/header.php'; ?>
<style>
    body {
        background: linear-gradient(135deg, #1d2671, #c33764);
        color: #fff;
    }

    .hero {
        padding: 60px 0;
    }

    @media (min-width: 768px) {
        .hero {
            min-height: 90vh;
            display: flex;
            align-items: center;
        }
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(12px);
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 32px rgba(0,0,0,0.2);
    }

    .btn-custom {
        padding: 12px;
        font-size: 16px;
        border-radius: 8px;
    }

    .feature-box p {
        margin-bottom: 8px;
    }

    img.hero-img {
        width: 100%;
        border-radius: 10px;
        margin-top: 20px;
        object-fit: cover;
        max-height: 250px;
    }

    @media (min-width: 768px) {
        img.hero-img {
            max-height: 320px;
        }
    }
</style>
<div class="container d-flex justify-content-center align-items-center" style="min-height:90vh;">

    <div class="glass-card">

        <h3 class="text-center mb-3">Register</h3>

        <?php if ($error): ?>
            <div class="alert alert-danger text-center">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <form method="POST">

            <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>

            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>

            <input type="text" name="adrs" class="form-control mb-2" placeholder="Address" required>

            <input type="tel" name="num" class="form-control mb-2" placeholder="Mobile Number" required>

            <div class="text-white mb-2">
                Male <input type="radio" name="gender" value="Male" required>
                Female <input type="radio" name="gender" value="Female" required>
            </div>

            <!-- PASSWORD -->
            <input type="password" id="password" name="password"
                class="form-control mb-2"
                placeholder="Password" required>

            <!-- SHOW PASSWORD -->
            <div class="form-check mb-2 text-white">
                <input class="form-check-input" type="checkbox" id="showPass">
                <label class="form-check-label" for="showPass">
                    Show Password
                </label>
            </div>

            <!-- RULES -->
            <div class="password-rules text-white small">
                <p id="rule-length">❌ At least 8 characters</p>
                <p id="rule-upper">❌ One uppercase letter</p>
                <p id="rule-lower">❌ One lowercase letter</p>
                <p id="rule-number">❌ One number</p>
                <p id="rule-special">❌ One special character</p>
            </div>

            <button class="btn auth-btn w-100 mt-3">Register</button>

        </form>

    </div>

</div>

<?php if ($success): ?>
<div id="toast" class="slide-toast slide-success show">
    ✅ Registered Successfully!
</div>

<script>
setTimeout(() => {
    window.location.href = "login.php";
}, 2000);
</script>
<?php endif; ?>

<script>
const password = document.getElementById("password");
const showPass = document.getElementById("showPass");

if (showPass && password) {

    showPass.addEventListener("change", function () {
        password.type = this.checked ? "text" : "password";
    });

    password.addEventListener("input", function () {
        const value = password.value;

        checkRule("rule-length", value.length >= 8);
        checkRule("rule-upper", /[A-Z]/.test(value));
        checkRule("rule-lower", /[a-z]/.test(value));
        checkRule("rule-number", /[0-9]/.test(value));
        checkRule("rule-special", /[\W]/.test(value));
    });
}

function checkRule(id, condition) {
    const el = document.getElementById(id);

    if (!el) return;

    if (condition) {
        el.innerHTML = "✔ " + el.innerText.replace("❌ ", "").replace("✔ ", "");
        el.style.color = "#00ff99";
    } else {
        el.innerHTML = "❌ " + el.innerText.replace("❌ ", "").replace("✔ ", "");
        el.style.color = "#ff6b6b";
    }
}
</script>

<?php include '../includes/footer.php'; ?>