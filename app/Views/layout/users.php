<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= base_url('assets/css/stylePageListUsers.css') ?>">
    <title>Lista de Usuários</title>
</head>
<body>
    <table>
        <caption><h1>Lista de Usuários</h1></caption>

        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th colspan="2">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td># <?php echo $user['id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td>
                        <form action="<?= base_url('/user/delete'); ?>" method="post">
                            <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                            <button type="submit">Deletar</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?= base_url('/usuarios/editar-usuarios'); ?>" method="post">
                            <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                            <button type="submit">Editar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="http://localhost:8080/usuarios/criar-usuarios" >Criar Usuario</a>

</body>
</html>