<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow mb-6">
        <div class="container mx-auto px-4 py-3">
            <a href="{{ route('produtos.index') }}" class="font-bold text-lg">Produtos</a>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
