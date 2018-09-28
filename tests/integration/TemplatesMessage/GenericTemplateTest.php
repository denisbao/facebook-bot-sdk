<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 28/09/18
 * Time: 09:40
 */

namespace CodeBot\TemplatesMessage;


use CodeBot\Element\Button;
use CodeBot\Element\Product;
use PHPUnit\Framework\TestCase;

class GenericTemplateTest extends TestCase
{

    public function testListaComDoisProdutos()
    {
        $button = new Button('web_url', null, 'http://www.google.com');
        $product = new Product('produto1', 'https://support.apple.com/library/content/dam/edam/applecare/images/en_US/homepod/watch-product-lockup-callout.png', 'teste_imagem', $button);

        $button = new Button('web_url', null, 'http://www.9gag.com');
        $product2 = new Product('produto2', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/9GAG_new_logo.svg/320px-9GAG_new_logo.svg.png', 'teste_imagem', $button);

        $template = new GenericTemplate(1234);
        $template->add($product);
        $template->add($product2);

        $actual = $template->message('naousado');

        $expected = [
            'recipient' => [
                'id' => 1234
            ],
            'message' => [
                'attachment' => [
                    'type' => 'template',
                    'payload' => [
                        'template_type' => 'generic',
                        'buttons' => [
                            [
                                'title' => 'produto1',
                                'subtitle' => 'teste_imagem',
                                'image_url' => 'https://support.apple.com/library/content/dam/edam/applecare/images/en_US/homepod/watch-product-lockup-callout.png',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url' => 'http://www.google.com',
                                ],
                            ],
                            [
                                'title' => 'produto2',
                                'subtitle' => 'teste_imagem',
                                'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/97/9GAG_new_logo.svg/320px-9GAG_new_logo.svg.png',
                                'default_action' => [
                                    'type' => 'web_url',
                                    'url' => 'http://www.9gag.com',
                                ],
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $this->assertEquals($expected, $actual);
    }

}