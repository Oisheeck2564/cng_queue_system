<?php
session_start();

// ✅ Secure session check
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

include __DIR__ . '/../config/db.php';
include '../includes/header.php';
?>

<style>
    body {
        background: linear-gradient(135deg, #1d2671, #c33764);
        color: #fff;
    }

    .card {
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
        color: #000;
    }

    .btn-sm {
        border-radius: 6px;
    }
</style>

<h2 class="mb-4">👥 Registered Users</h2>

<div class="card p-4">

    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Registered At</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

        <?php
        // 🔥 Fetch only normal users (change if you want admin too)
        $query = "SELECT id, name, email, role, created_at 
                  FROM users 
                  WHERE role='user' 
                  ORDER BY id DESC";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>".$i++."</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['role']}</td>
                        <td>{$row['created_at']}</td>
                        <td>
                            <a href='delete_user.php?id={$row['id']}' 
                               class='btn btn-danger btn-sm'
                               onclick=\"return confirm('Are you sure to delete this user?')\">
                               Delete
                            </a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No users found</td></tr>";
        }
        ?>

        </tbody>
    </table>

</div>

<?php include '../includes/footer.php'; ?>