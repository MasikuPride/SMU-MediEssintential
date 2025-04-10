<!-- filepath: c:\xampp\htdocs\ecommerce-website-master\includes\footer.php -->
<footer class="footer bg-dark text-white py-3">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0">&copy; 2025 SMU MediEssential. All Rights Reserved.</p>
                <div class="mt-3">
                    <a href="index.php" class="btn btn-outline-light btn-sm mx-1">Home</a>
                    <a href="products.php" class="btn btn-outline-light btn-sm mx-1">Products</a>
                    <a href="about.php" class="btn btn-outline-light btn-sm mx-1">About Us<a>
                    <?php if (basename($_SERVER['PHP_SELF']) === 'index.php'): ?>
                    <p class="mb-0 mt-2"><a href="admin_login.php" class="text-white" style="text-decoration: underline;">Admin Login</a></p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>