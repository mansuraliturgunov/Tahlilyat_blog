<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img height="25px" src="../photos/tahilyat.png" alt=""></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item"> <a class="nav-link " aria-current="page" href="./">Bosh sahifa</a> </li>

                <?php if (isset($_SESSION['admin'])): ?>
                    <li class="nav-item"> <a class="nav-link" href="./blog.php">Postlar (admin)</a> </li>
                <?php endif ?>

                <?php if (!isset($_SESSION['admin'])): ?>
                    <li class="nav-item"> <a class="nav-link" href="./blog.php">Postlar</a> </li>
                <?php endif ?>

                <li class="nav-item"> <a class="nav-link " href="./abute.php">Biz haqimizda</a> </li>



                <?php if (!isset($_SESSION['admin'])): ?>
                    <li class="nav-item"> <a class="nav-link " href="../admin_sign_in.php">Admin</a> </li>
                <?php endif ?>
            </ul>
            <form  method="GET" action="../admin_sign_in.php" class="d-flex" role="search" onSubmit="return confirm('Adminlikdan chiqmoqchimiz?')">
                <?php if (isset($_SESSION['admin'])): ?>
                    <input type="hidden" name='exit' value="exit">
                    <button class="btn btn-outline-danger" type="submit">Admin (chiqish)</button>
                <?php endif ?>
            </form>
        </div>
    </div>
</nav>