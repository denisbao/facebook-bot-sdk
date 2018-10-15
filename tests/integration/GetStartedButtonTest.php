<?php

namespace CodeBot;

use PHPUnit\Framework\TestCase;

class GetStartedButtonTest extends TestCase
{
    public function testAddGetStartedButton()
    {
        $data = (new GetStartedButton())->add('iniciar');
        $callSendApi = new CallSendApi('EAAEditZB3cqcBAPEpqjlggSVUaDKFMELkwfYnhYSnZAyshD6WF4SulPO7sXwUZA7kiBd7jBMDHJJZBnLArOixLRuYYhrQqbaXD9kfaTgdQqZBTxHbbiUfDyLOZC38MVeJX537KYf32brqwyUdiCc306QljhVdUXbH1c2YRZCb76QQupHRDal0K7');
        $result = $callSendApi->make($data, CallSendApi::URL_PROFILE);

        $this->assertTrue(is_string($result));

    }
}