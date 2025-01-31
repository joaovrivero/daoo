<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
</head>
<body>
    <h1>Bem-vindo ao Sistema de Gerenciamento</h1>
    <p>Escolha uma das opções abaixo:</p>

    <ul>
        <li><a href="{{ route('categorias.index') }}">Gerenciar Categorias</a></li>
        <li><a href="{{ route('produtos.index') }}">Gerenciar Produtos</a></li>
        <li><a href="{{ route('fornecedores.index') }}">Gerenciar Fornecedores</a></li>
    </ul>
</body>
</html>
