<?php
/**
 * File: GeneratorTest.php
 *
 * @author      Maciej Sławik <maciekslawik@gmail.com>
 * Github:      https://github.com/maciejslawik
 */

namespace MSlwk\Jwt\Tests;

use MSlwk\Jwt\Handler\Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class GeneratorTest
 *
 * @package MSlwk\Jwt\Tests
 */
class GeneratorTest extends TestCase
{
    /**
     * @return array
     */
    public function successProvider()
    {
        return [
            [
                [
                    'firstname' => 'John',
                    'lastname' => 'Doe',
                    'email' => 'john@doe.com'
                ],
                '4rfebgfb54hgrtb',
                'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmaXJzdG5hbWUiOiJKb2huIiwibGFzdG5hbWUiOiJEb2UiLCJlbWFpbCI6ImpvaG5AZG9lLmNvbSJ9.l3ogwAatgctsprdDTPpvSS31eK8cNN5TbVHt1uZzuTA='
            ],
            [
                [
                    'firstname' => 'Jane',
                    'lastname' => 'Doe',
                    'email' => 'jane@doe.com'
                ],
                'kmgp908bg90e7b0u32r4',
                'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJmaXJzdG5hbWUiOiJKYW5lIiwibGFzdG5hbWUiOiJEb2UiLCJlbWFpbCI6ImphbmVAZG9lLmNvbSJ9.or9/XbCxuXUFAM6Reb0IoI8UnEKis3bNT06rBYslg1Y='
            ]
        ];
    }

    public function errorProvider()
    {
        return [
            [
                [
                    'firstname' => 'John',
                    'lastname' => 'Doe',
                    'email' => 'john@doe.com'
                ],
                '4rfebgfb54hgrtb',
                'opjeiopwjfejwfpejwfjewfelwfefe'
            ],
            [
                [
                    'firstname' => 'Jane',
                    'lastname' => 'Doe',
                    'email' => 'jane@doe.com'
                ],
                'kmgp908bg90e7b0u32r4',
                'koioqwhfioqwhfioqwhfioqw'
            ]
        ];
    }

    /**
     * @dataProvider successProvider
     *
     * @param $payload
     * @param $secret
     * @param $expected
     */
    public function testTokenGeneratedSuccessfully($payload, $secret, $expected)
    {
        $generator = new Generator();
        $generator->setSecretKey($secret);
        $result = $generator->generateToken($payload);
        self::assertEquals($expected, $result);
    }

    /**
     * @dataProvider errorProvider
     *
     * @param $payload
     * @param $secret
     * @param $expected
     */
    public function testTokenGeneratedWrong($payload, $secret, $expected)
    {
        $generator = new Generator();
        $generator->setSecretKey($secret);
        $result = $generator->generateToken($payload);
        self::assertNotEquals($expected, $result);
    }
}
