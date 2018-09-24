<?php

namespace CodeBot\TemplatesMessage;

use CodeBot\Element\ElementInterface;


class ButtonsTemplate implements TemplateInterface
{

    //LISTA DE BOTÕES:
    protected $buttons = [];
    protected $recipientId;


    public function __construct($recipientId)
    {
        $this->recipientId = $recipientId;
    }

    //ADICIONA BOTÕES
    public function add(ElementInterface $element)
    {
        $this->buttons[] = $element->get();
    }


    //RETORNO DA MENSAGEM PARA O FACEBOOK:
    public function message($messageText): array
    {
        return [
            'recipient' => [
                'id' => $this->recipientId
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'button',
                        'text' => $messageText,
                        'buttons' => $this->buttons
                    ]
                ]
            ]
        ];
    }
}