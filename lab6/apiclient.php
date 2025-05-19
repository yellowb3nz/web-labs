<?php
class ApiClient
{
    private string $apiUrl;
    private array $defaultHeaders = [];
    
    public function __construct(string $endUrl, string $login, string $pass)
    {
        $this->apiUrl = rtrim($endUrl, '/');
        $this->defaultHeaders[] = "Accept: application/json";
    }

    private function request(string $urlPath, string $httpMethod, array $body = []): array
    {
        // полный url + инициализация
        $url = "{$this->apiUrl}/" . ltrim($urlPath, '/');
        $ch = curl_init($url);

        // базовые настройки curl
        $config = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $httpMethod,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER => $this->defaultHeaders,
        ];

        // если передан массив -> преобразуем его в json + устанавливаем тело запроса
        if ($body !== null) {
            $jsonBody = json_encode($body);
            $config[CURLOPT_POSTFIELDS] = $jsonBody;
        }

        curl_setopt_array($ch, $config);

        $output = curl_exec($ch);

        // получить код-ответ
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        // если ошибка
        $failReason = curl_error($ch);
        curl_close($ch);

        // result
        return [
            'http_code' => $httpStatus,
            'response' => json_decode($output, true), // json -> массив
            'error_message' => $failReason ?: null,
        ];
    }

    // get-запрос
    public function GET(string $path): array
    {
        return $this->request($path, 'GET');
    }

    // post-запрос + тело
    public function POST(string $path, array $payload): array
    {
        return $this->request($path, 'POST', $payload);
    }

    // put-запрос + тело
    public function PUT(string $path, array $payload): array
    {
        return $this->request($path, 'PUT', $payload);
    }

    // delete-запрос
    public function DELETE(string $path): array
    {
        return $this->request($path, 'DELETE');
    }
}