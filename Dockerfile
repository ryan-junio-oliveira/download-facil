# Usar a imagem oficial do PHP
FROM php:8.3-cli

# Instalar dependências necessárias para o yt-dlp, composer e outras bibliotecas PHP
RUN apt-get update && apt-get install -y \
    python3-pip \
    ffmpeg \
    git \
    python3-venv \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Criar um ambiente virtual Python para instalar o yt-dlp
RUN python3 -m venv /opt/yt-dlp-venv
RUN /opt/yt-dlp-venv/bin/pip install yt-dlp

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar os arquivos do seu projeto para dentro do container
COPY . /var/www/html

# Instalar as dependências do PHP (caso haja um composer.json)
RUN composer install

# Expor a porta 8000 (porta padrão do servidor PHP embutido)
EXPOSE 8000

# Comando para iniciar o servidor embutido do PHP
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
