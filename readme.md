# DownloadFacil

DownloadFacil é uma aplicação web simples que permite aos usuários baixar vídeos ou músicas de plataformas como YouTube. O aplicativo utiliza o yt-dlp para fazer o download de conteúdo em diferentes formatos, como MP4 e MP3, com a melhor qualidade disponível.

### Funcionalidades

-Download de Vídeos: Permite baixar vídeos em formato MP4 com a melhor qualidade disponível.
-Download de Áudios: Converte e baixa o áudio de vídeos em formato MP3.
-Simples e rápido: Interface de fácil uso, onde o usuário só precisa fornecer a URL do vídeo.

### Pré-requisitos
Antes de começar, você precisará ter os seguintes itens instalados em seu ambiente de desenvolvimento:

-PHP 7.4 ou superior
-yt-dlp (YouTube-DL fork) para download de vídeos e áudios
-Servidor Web (por exemplo, Apache ou Nginx) ou Servidor embutido do php
-Composer (para gerenciamento de dependências)

### Instalação

1. Clone este repositório para sua máquina local:

```bash
git clone https://github.com/seu-usuario/download-facil.git
```

2. Navegue até o diretório do projeto:

```bash
cd download-facil
```

3. Instale as dependências do projeto:

```bash
composer install
```

4. Certifique-se de que o yt-dlp esteja instalado corretamente no seu sistema. Caso não tenha o yt-dlp instalado, siga as instruções de instalação no repositório oficial.

Se necessário, configure o servidor web (Apache/Nginx) para apontar para o diretório onde o projeto foi clonado.

### Como Usar

1. Abra o aplicativo no navegador (geralmente disponível em http://localhost ou no URL configurado).

2. Na página inicial, insira a URL do vídeo ou música que você deseja baixar.

3. Selecione o formato desejado:

-MP4 (vídeo)
-MP3 (áudio)

4. Clique no botão Baixar e o download será iniciado automaticamente com a melhor qualidade disponível.

Estrutura de Diretórios
```bash
download-facil/
├── Downloads/                # Diretório onde os arquivos baixados serão salvos
├── src/                      # Código-fonte do projeto
│   ├── Controllers/          # Controladores responsáveis pela lógica do download
│   ├── Core/                 # Lógica central, como a renderização das views
│   └── Views/                # Templates das páginas HTML
├── .gitignore                # Arquivos e diretórios a serem ignorados pelo Git
├── composer.json             # Dependências do Composer
├── index.php                 # Arquivo principal para inicializar a aplicação
└── README.md                 # Este arquivo
└── public/index
```

### Contribuindo
Se você deseja contribuir com este projeto, fique à vontade para abrir uma pull request ou reportar problemas através dos issues. Sua contribuição é muito bem-vinda!

### Licença
Este projeto é licenciado sob a MIT License - veja o arquivo LICENSE para mais detalhes.