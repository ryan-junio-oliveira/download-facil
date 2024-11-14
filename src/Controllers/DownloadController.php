<?php

namespace Ryan\DownloadFacil\Controllers;

use Ryan\DownloadFacil\Core\View;

class DownloadController
{
    public function download()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Filtra e valida os parâmetros recebidos
                $url = filter_var($_POST['url'], FILTER_VALIDATE_URL);
                $format = $_POST['format'] ?? 'mp4'; // Padrão mp4

                if (!$url) {
                    throw new \Exception("URL inválida.");
                }

                // Caminho absoluto para salvar o vídeo/música
                $outputDir = __DIR__ . '/../Downloads/';
                if (!is_dir($outputDir)) {
                    mkdir($outputDir, 0777, true);
                }

                // Monta o comando yt-dlp com os parâmetros recebidos
                $command = "yt-dlp -f ";

                // Define as opções para MP3 e MP4
                if ($format === 'mp3') {
                    // Para mp3, converte o arquivo
                    $command .= "bestaudio --extract-audio --audio-format mp3 ";
                } else {
                    // Para vídeo, usa a melhor qualidade disponível
                    $command .= "bestvideo+bestaudio ";
                }

                // Defina o nome do arquivo
                $outputFile = escapeshellcmd("{$outputDir}%(title)s.%(ext)s");
                $command .= "-o {$outputFile} {$url}";

                // Depuração: imprime o comando para verificação
                error_log("Comando yt-dlp: " . $command);

                // Executa o comando yt-dlp e captura a saída e erro
                exec($command . " 2>&1", $output, $return_var);

                // Depuração: imprime a saída do comando para verificar o erro
                error_log("Saída do yt-dlp: " . implode("\n", $output));

                if ($return_var !== 0) {
                    throw new \Exception("Erro ao executar o comando de download.");
                }

                // Pega o arquivo gerado
                $this->forceDownload($outputFile);
            }
        } catch (\Exception $e) {
            // Em caso de erro, renderiza a view com a mensagem de erro
            $data = ['message' => $e->getMessage()];
            View::render('download', $data);
        }
    }

    // Função para forçar o download do arquivo gerado
    private function forceDownload($outputFile)
    {
        try {
            // Caminho do diretório onde os arquivos são salvos
            $outputDir = __DIR__ . "/../Downloads/";

            // Verifica se o diretório existe
            if (!is_dir($outputDir)) {
                throw new \Exception("Diretório de downloads não encontrado!");
            }

            // Varrendo o diretório e pegando os arquivos
            $files = scandir($outputDir, SCANDIR_SORT_DESCENDING); // Ordena os arquivos de forma decrescente

            // Filtra apenas os arquivos (ignora diretórios como "." e "..")
            $files = array_filter($files, function ($file) use ($outputDir) {
                return is_file($outputDir . $file);
            });

            // Se não houver arquivos no diretório, exibe uma mensagem
            if (empty($files)) {
                throw new \Exception("Nenhum arquivo encontrado para download!");
            }

            // Pega o arquivo mais recente (primeiro da lista após ordenação)
            $latestFile = $files[0];

            // Caminho completo do arquivo mais recente
            $filePath = $outputDir . $latestFile;

            // Exclui o arquivo mais antigo (se existir) antes de iniciar o download
            if (count($files) > 1) {
                $oldestFile = $files[count($files) - 1]; // O último arquivo é o mais antigo
                unlink($outputDir . $oldestFile); // Exclui o arquivo mais antigo
            }

            // Verifica se o arquivo mais recente existe
            if (!file_exists($filePath)) {
                throw new \Exception("Arquivo não encontrado!");
            }

            // Envia os cabeçalhos apropriados para forçar o download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filePath) . '"');
            header('Content-Length: ' . filesize($filePath));
            readfile($filePath); // Envia o conteúdo do arquivo
            exit; // Finaliza o script para não exibir mais nada
        } catch (\Exception $e) {
            // Em caso de erro, renderiza a view com a mensagem de erro
            $data = ['message' => $e->getMessage()];
            View::render('download', $data);
        }
    }
}
