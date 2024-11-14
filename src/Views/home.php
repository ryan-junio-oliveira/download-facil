<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-100 bg-white dark:bg-gray-900">

    <!-- Navbar -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Download Fácil</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Abrir menu principal</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="/" class="block py-2 px-3 text-gray-900 dark:text-white rounded md:p-0">Home</a>
                    </li>
                    <!-- Adicione mais links aqui -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- JavaScript para controle do menu hambúrguer -->
    <script>
        const toggleButton = document.querySelector('[data-collapse-toggle]');
        const menu = document.getElementById('navbar-default');

        toggleButton.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

    <!-- Section Principal -->
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><?= $message; ?></h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Baixe vídeos ou músicas do youtube diretamente usando o link!</p>
        </div>
    </section>

    <!-- Formulário -->
    <main class="bg-white dark:bg-gray-900 mb-6">
        <form class="max-w-sm mx-auto" action="/download" method="POST">
            <div>
                <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Insira o link do vídeo ou música</label>
                <input type="text" id="url" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="url" required>

                <label for="format" class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecione o formato</label>
                <select id="format" name="format" class="block w-full p-2 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    <option value="mp4">Vídeo (MP4)</option>
                    <option value="mp3">Música (MP3)</option>
                </select>

                <button class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit">Baixar</button>
            </div>
        </form>
    </main>
</body>

</html>