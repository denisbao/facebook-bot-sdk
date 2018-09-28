<?php

namespace CodeBot\TemplatesMessage;

use CodeBot\Element\ElementInterface;


class ListTemplate implements TemplateInterface
{

    protected $products = [];
    protected $recipientId;


    public function __construct($recipientId)
    {
        $this->recipientId = $recipientId;
    }

    //ADICIONA BOTÕES
    public function add(ElementInterface $element)
    {
        $this->products[] = $element->get();
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
                        'template_type' => 'list',
                        'buttons' => $this->products
                    ]
                ]
            ]
        ];
    }
}