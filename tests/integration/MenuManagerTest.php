<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 15/10/18
 * Time: 15:00
 */

namespace CodeBot;


use PHPUnit\Framework\TestCase;

class MenuManagerTest extends TestCase
{
    public function testManagerMenu()
    {
        $menu = new MenuManager('default');

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

        foreach ($call_to_actions as $action) {
            $menu->callToAction($action['id'], $action['type'], $action['title'], $action['parent_id'], $action['value']);
        }

        $callSendApi = new CallSendApi('COLOCAR_O_ACCESS_TOKEN');
        $result = $callSendApi->make($menu->toArray(), CallSendApi::URL_PROFILE);

        $this->assertTrue(is_string($result));
    }
}