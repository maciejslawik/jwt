<?php
/**
 * File: AbstractHandler.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\Jwt\Handler;

/**
 * Class AbstractHandler
 *
 * @package MSlwk\Jwt\Handler
 */
class AbstractHandler
{
    const HASHING_ALGORITHM = 'sha256';

    const ENCODING_ALGORITHM = 'HS256';
    /**
     * @var string
     */
    protected $secretKey = 'notThatSecretReally-changeMe';

    /**
     * @param string $secretKey
     * @return null
     */
    public function setSecretKey(string $secretKey)
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @param string $header
     * @param string $payload
     * @return string
     */
    protected function calculateSignature(string $header, string $payload): string
    {
        return base64_encode(
            hash_hmac(
                self::HASHING_ALGORITHM,
                "{$header}.{$payload}",
                $this->secretKey,
                true
            )
        );
    }
}
