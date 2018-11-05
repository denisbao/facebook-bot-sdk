<?php

namespace CodeBot;

use PHPUnit\Framework\TestCase;

class GetStartedButtonTest extends TestCase
{
    //PARA TESTE: vendor/bin/phpunit tests/integration/GetStartedButtonTest.php --filter testAddGetStartedButton
    public function testAddGetStartedButton()
    {
        $data = (new GetStartedButton())->add('iniciar');
        $callSendApi = new CallSendApi('COLOCAR_O_ACCESS_TOKEN');
        $result = $callSendApi->make($data, CallSendApi::URL_PROFILE);

        $this->assertTrue(is_string($result));

    }

    //PARA TESTE: vendor/bin/phpunit tests/integration/GetStartedButtonTest.php --filter testRemoveGetStartedButton
    public function testRemoveGetStartedButton()
    {
        $data = (new GetStartedButton())->remove();
        $callSendApi = new CallSendApi('COLOCAR_O_ACCESS_TOKEN');
        $result = $callSendApi->make($data, CallSendApi::URL_PROFILE, 'DELETE');

        $this->assertTrue(is_string($result));
    }
}