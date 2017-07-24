<?php
/**
 * File: VerifierTest.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\Jwt\Tests;

use MSlwk\Jwt\Handler\Verifier;
use PHPUnit\Framework\TestCase;

/**
 * Class VerifierTest
 *
 * @package MSlwk\Jwt\Tests
 */
class VerifierTest extends TestCase
{
    public function successProvider()
    {
        return [
            [
                '4rfebgfb54hgrtb',
                'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmaXJzdG5hbWUiOiJKb2huIiwibGFzdG5hbWUiOiJEb2UiLCJlbWFpbCI6ImpvaG5AZG9lLmNvbSJ9.l3ogwAatgctsprdDTPpvSS31eK8cNN5TbVHt1uZzuTA='
            ],
            [
                'kmgp908bg90e7b0u32r4',
                'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmaXJzdG5hbWUiOiJKYW5lIiwibGFzdG5hbWUiOiJEb2UiLCJlbWFpbCI6ImphbmVAZG9lLmNvbSJ9.or9/XbCxuXUFAM6Reb0IoI8UnEKis3bNT06rBYslg1Y='
            ]
        ];
    }

    public function errorProvider()
    {
        return [
            [
                '4rfebgfb54hgrtb',
                'opjeiopwjfejwfpejwfjewfelwfefe'
            ],
            [
                'kmgp908bg90e7b0u32r4',
                'koioqwhfioqwhfioqwhfioqw.gfewfgeqfeqwfewfew.fewqfewfewfewewf'
            ]
        ];
    }

    /**
     * @dataProvider successProvider
     *
     * @param $secret
     * @param $token
     */
    public function testTokenVerifiedSuccessfully($secret, $token)
    {
        $verifier = new Verifier();
        $verifier->setSecretKey($secret);
        $result = $verifier->verifyToken($token);
        self::assertTrue($result);
    }

    /**
     * @dataProvider errorProvider
     *
     * @param $secret
     * @param $token
     */
    public function testTokenVerifiedWrong($secret, $token)
    {
        $verifier = new Verifier();
        $verifier->setSecretKey($secret);
        $result = $verifier->verifyToken($token);
        self::assertFalse($result);
    }
}
