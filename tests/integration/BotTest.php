<?php


namespace CodeBot;


use PHPUnit\Framework\TestCase;
use CodeBot\Build\Solid;

class BotTest extends TestCase
{
    private $pageAccessToken = 'COLOCAR_O_ACCESS_TOKEN';

    // PARA TESTE:vendor/bin/phpunit tests/integration/BotTest.php --filter testAddMenu
    public function testAddMenu()
    {

        $call_to_actions = [
            [
                'id' => 1,
                'type' => 'nested',
                'title' => 'o que posso fazer?',
                'parent_id' => 0,
                'value' => null,
            ],
            [
                'id' => 2,
                'type' => 'web_url',
                'title' => 'Visite o Google',
                'parent_id' => 1,
                'value' => 'http://www.google.com',
            ],
            [
                'id' => 3,
                'type' => 'web_url',
                'title' => 'Visite o 9Gag',
                'parent_id' => 1,
                'value' => 'http://www.9gag.com',
            ],
            [
                'id' => 4,
                'type' => 'postback',
                'title' => 'Ver opções iniciais',
                'parent_id' => 0,
                'value' => 'iniciar',
            ]
        ];

        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->addMenu('default', false, $call_to_actions);

        $this->AssertTrue(true);
    }

    // PARA TESTE:vendor/bin/phpunit tests/integration/BotTest.php --filter testRemoveMenu
    public function testRemoveMenu()
    {
        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->removeMenu();

        $this->AssertTrue(true);
    }

    // PARA TESTE:vendor/bin/phpunit tests/integration/BotTest.php --filter testAddGetStartedButton
    public function testAddGetStartedButton()
    {
        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->addGetStartedButton('iniciar');

        $this->AssertTrue(true);
    }

    // PARA TESTE:vendor/bin/phpunit tests/integration/BotTest.php --filter testRemoveGetStartedButton
    public function testRemoveGetStartedButton()
    {
        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->removeGetStartedButton();

        $this->AssertTrue(true);
    }


}