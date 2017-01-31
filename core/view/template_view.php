<!DOCTYPE HTML>
<html>
<head>
    <title>Блог новостей</title>
    <meta charset="utf-8" />
    <link href = "/css/main.css" rel="stylesheet" />
    <link href = "/css/bootstrap.css" rel="stylesheet">
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
</head>
<body>

<!-- Background -->
<header id="header" class="navbar">
    <nav class = "navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a class="navbar-brand" href="/"><b>Главная</b></b></a></li>
            <li><a class="navbar-brand" href="/ncadmin">Админка</a></li>
        </ul>
    </nav>
</header>
<!-- Wrapper -->
<div  class="container" id="wrapper">
    <?php include 'core/view/'.$content_view; ?>
</div>
<footer class="text-center"> Блог новостей © 2017 <br/>Разработчик: Александр Федоров</footer>
<!-- Scripts -->
<script src="/js/jquery.min.js"></script>
</body>
</html>