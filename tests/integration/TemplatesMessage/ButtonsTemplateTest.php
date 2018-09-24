<?php

namespace CodeBot\TemplatesMessage;

use PHPUnit\Framework\TestCase;
use CodeBot\Element\Button;

class ButtonsTemplateTest extends TestCase
{
    public function testRetornoComComTipoPostback()
    {
        $buttonsTemplate = new ButtonsTemplate(1234);

        //TESTE PARA O BOTÃO TIPO POSTBACK
        $buttonsTemplate->add(new Button('postback','teste de botao', 'resposta'));
        $actual = $buttonsTemplate->message('Exemplo de template');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => 'Exemplo de template',
                        'buttons' => [
                            [
                                'type' => 'postback',
                                'title' => 'teste de botao',
                                'payload' => 'resposta',
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $actual);
    }
}