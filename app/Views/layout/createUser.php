<!DOCTYPE html>
<html>
<head>
    <!--<link rel="stylesheet" href="<?= base_url('assets/css/stylePageListUsers.css') ?>">-->
    <title>Criar Usuários</title>
</head>
<body>
    <form action="<?= base_url('/user/create'); ?>" method="post" >
        <label for="id">ID</label>
        <input type="text" name="id" id="id" placeholder="Digite o ID do usuário">

        <label for="name">Nome</label>
        <input type="text" name="name" id="name" placeholder="Digite o nome do usuário">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Digite o email do usuário">

        <button type="submit">Criar</button>
    </form>

</body>
</html>