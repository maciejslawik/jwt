<?php
/**
 * File: GeneratorInterface.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\Jwt\Api;

/**
 * Interface GeneratorInterface
 *
 * @package MSlwk\Jwt\Api
 */
interface GeneratorInterface
{
    /**
     * @param string $key
     * @return void
     */
    public function setSecretKey(string $key);

    /**
     * @param array $payload
     * @return string
     */
    public function generateToken(array $payload): string;
}
