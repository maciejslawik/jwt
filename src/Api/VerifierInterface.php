<?php
/**
 * File: VerifierInterface.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\Jwt\Api;

/**
 * Interface VerifierInterface
 *
 * @package MSlwk\Jwt\Api
 */
interface VerifierInterface
{
    /**
     * @param string $key
     * @return void
     */
    public function setSecretKey(string $key);

    /**
     * @param string $token
     * @return bool
     */
    public function verifyToken(string $token): bool;
}
