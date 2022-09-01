<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--===============================================================================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>/images/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= BASE_URL ?>/images/favicons/site.webmanifest">
    <!--===============================================================================================-->
    <title><?= $data["title"] ?></title>
    <!-- custom style here -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/style.css">
    <!-- fonts here -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- jquery here -->
    <script src="<?= BASE_URL ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- datatables here -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bm/dt-1.12.1/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/datatables.min.css" />
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bm/dt-1.12.1/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/datatables.min.js">
    </script>
    <!-- fontawesome 6.0 -->
    <script src="https://kit.fontawesome.com/7ac530336f.js" crossorigin="anonymous"></script>
    <!-- custom styles here -->
    <style>

    </style>
</head>

<body>
    <form id="logout-form" action="<?= BASE_URL ?>/Login/logout" style="display: none;" method="post">
    </form>