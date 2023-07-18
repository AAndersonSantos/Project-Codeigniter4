<!-- app/Views/users_list.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Lista de Usuários</h1>

    <ul>
    <?php foreach ($users as $user): ?>
        <li><?php echo $user['name']; ?> - <?php echo $user['email']; ?></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>