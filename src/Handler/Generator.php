<?php
/**
 * File: Generator.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\Jwt\Handler;

use MSlwk\Jwt\Api\GeneratorInterface;

/**
 * Class Generator
 *
 * @package MSlwk\Jwt\Handler
 */
class Generator extends AbstractHandler implements GeneratorInterface
{
    /**
     * @param array $payload
     * @return string
     */
    public function generateToken(array $payload): string
    {
        $encodedHeader = $this->getEncodedHeader();
        $encodedPayload = $this->encodePayload($payload);
        $signature = $this->calculateSignature($encodedHeader, $encodedPayload);
        return $this->getToken($encodedHeader, $encodedPayload, $signature);
    }

    /**
     * @return string
     */
    protected function getEncodedHeader(): string
    {
        $header = [
            'alg' => self::ENCODING_ALGORITHM,
            'typ' => 'JWT'
        ];
        return base64_encode(json_encode($header));
    }

    /**
     * @param array $payload
     * @return string
     */
    protected function encodePayload(array $payload): string
    {
        return base64_encode(json_encode($payload));
    }

    /**
     * @param string $header
     * @param string $payload
     * @param string $signature
     * @return string
     */
    protected function getToken(string $header, string $payload, string $signature): string
    {
        return "{$header}.{$payload}.{$signature}";
    }
}
