<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylePageEditUsers.css') ?>">
    <title>Editar Usuários</title>
</head>
<body>

    <h1># <?php echo $user['id']; ?></h1>

    <form action="<?= base_url('/user/update'); ?>" method="post" >
        <input type="hidden" name="id" id="id" value="<?php echo $user['id']; ?>" placeholder="Digite o ID do usuário">

        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="<?php echo $user['name']; ?>" placeholder="Digite o nome do usuário">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php echo $user['email']; ?>" placeholder="Digite o email do usuário">

        <button type="submit">Editar</button>
    </form>

    <a href="http://localhost:8080/usuarios" >Voltar</a>

</body>
</html>