<?php
/**
 * File: Verifier.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\Jwt\Handler;

use MSlwk\Jwt\Api\VerifierInterface;

/**
 * Class Verifier
 *
 * @package MSlwk\Jwt\Handler
 */
class Verifier extends AbstractHandler implements VerifierInterface
{
    /**
     * @param string $token
     * @return bool
     */
    public function verifyToken(string $token): bool
    {
        if (!$this->verifyTokenStructure($token)) {
            return false;
        }
        $tokenParts = $this->divideToken($token);

        $receivedHeader = $tokenParts[0];
        $receivedPayload = $tokenParts[1];
        $receivedSignature = $tokenParts[2];

        $calculatedSignature = $this->calculateSignature($receivedHeader, $receivedPayload);
        return $calculatedSignature === $receivedSignature;
    }

    protected function divideToken(string $token): array
    {
        return explode('.', $token);
    }

    /**
     * @param string $token
     * @return bool
     */
    protected function verifyTokenStructure(string $token): bool
    {
        return count($this->divideToken($token)) === 3;
    }
}
