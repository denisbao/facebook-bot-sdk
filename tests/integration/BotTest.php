<?php


namespace CodeBot;


use PHPUnit\Framework\TestCase;
use CodeBot\Build\Solid;

class BotTest extends TestCase
{
    private $pageAccessToken = 'EAAEditZB3cqcBAPEpqjlggSVUaDKFMELkwfYnhYSnZAyshD6WF4SulPO7sXwUZA7kiBd7jBMDHJJZBnLArOixLRuYYhrQqbaXD9kfaTgdQqZBTxHbbiUfDyLOZC38MVeJX537KYf32brqwyUdiCc306QljhVdUXbH1c2YRZCb76QQupHRDal0K7';

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

    public function testRemoveMenu()
    {
        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->removeMenu();

        $this->AssertTrue(true);
    }

    public function testAddGetStartedButton()
    {
        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->addGetStartedButton('iniciar');

        $this->AssertTrue(true);
    }

    public function testRemoveGetStartedButton()
    {
        $bot = Solid::factory();
        Solid::pageAccessToken($this->pageAccessToken);
        $bot->removeGetStartedButton();

        $this->AssertTrue(true);
    }


}