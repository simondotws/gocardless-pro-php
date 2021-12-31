<?php
//
// WARNING: Do not edit by hand, this file was generated by Crank:
// https://github.com/gocardless/crank
//

namespace GoCardlessPro\Integration;

class PaymentsIntegrationTest extends IntegrationTestBase
{
    public function testResourceModelExists()
    {
        $obj = new \GoCardlessPro\Resources\Payment(array());
        $this->assertNotNull($obj);
    }
    
    public function testPaymentsCreate()
    {
        $fixture = $this->loadJsonFixture('payments')->create;
        $this->stub_request($fixture);

        $service = $this->client->payments();
        $response = call_user_func_array(array($service, 'create'), (array)$fixture->url_params);

        $body = $fixture->body->payments;
    
        $this->assertInstanceOf('\GoCardlessPro\Resources\Payment', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->amount_refunded, $response->amount_refunded);
        $this->assertEquals($body->charge_date, $response->charge_date);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->description, $response->description);
        $this->assertEquals($body->fx, $response->fx);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->reference, $response->reference);
        $this->assertEquals($body->retry_if_possible, $response->retry_if_possible);
        $this->assertEquals($body->status, $response->status);
    

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    public function testPaymentsCreateWithIdempotencyConflict()
    {
        $fixture = $this->loadJsonFixture('payments')->create;

        $idempotencyConflictResponseFixture = $this->loadFixture('idempotent_creation_conflict_invalid_state_error');

        // The POST request responds with a 409 to our original POST, due to an idempotency conflict
        $this->mock->append(new \GuzzleHttp\Psr7\Response(409, [], $idempotencyConflictResponseFixture));

        // The client makes a second request to fetch the resource that was already
        // created using our idempotency key. It responds with the created resource,
        // which looks just like the response for a successful POST request.
        $this->mock->append(new \GuzzleHttp\Psr7\Response(200, [], json_encode($fixture->body)));

        $service = $this->client->payments();
        $response = call_user_func_array(array($service, 'create'), (array)$fixture->url_params);
        $body = $fixture->body->payments;

        $this->assertInstanceOf('\GoCardlessPro\Resources\Payment', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->amount_refunded, $response->amount_refunded);
        $this->assertEquals($body->charge_date, $response->charge_date);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->description, $response->description);
        $this->assertEquals($body->fx, $response->fx);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->reference, $response->reference);
        $this->assertEquals($body->retry_if_possible, $response->retry_if_possible);
        $this->assertEquals($body->status, $response->status);
        

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $conflictRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $conflictRequest->getUri()->getPath());
        $getRequest = $this->history[1]['request'];
        $this->assertEquals($getRequest->getUri()->getPath(), '/payments/ID123');
    }
    
    public function testPaymentsList()
    {
        $fixture = $this->loadJsonFixture('payments')->list;
        $this->stub_request($fixture);

        $service = $this->client->payments();
        $response = call_user_func_array(array($service, 'list'), (array)$fixture->url_params);

        $body = $fixture->body->payments;
    
        $records = $response->records;
        $this->assertInstanceOf('\GoCardlessPro\Core\ListResponse', $response);
        $this->assertInstanceOf('\GoCardlessPro\Resources\Payment', $records[0]);

        $this->assertEquals($fixture->body->meta->cursors->before, $response->before);
        $this->assertEquals($fixture->body->meta->cursors->after, $response->after);
    

    
        foreach (range(0, count($body) - 1) as $num) {
            $record = $records[$num];
            $this->assertEquals($body[$num]->amount, $record->amount);
            $this->assertEquals($body[$num]->amount_refunded, $record->amount_refunded);
            $this->assertEquals($body[$num]->charge_date, $record->charge_date);
            $this->assertEquals($body[$num]->created_at, $record->created_at);
            $this->assertEquals($body[$num]->currency, $record->currency);
            $this->assertEquals($body[$num]->description, $record->description);
            $this->assertEquals($body[$num]->fx, $record->fx);
            $this->assertEquals($body[$num]->id, $record->id);
            $this->assertEquals($body[$num]->links, $record->links);
            $this->assertEquals($body[$num]->metadata, $record->metadata);
            $this->assertEquals($body[$num]->reference, $record->reference);
            $this->assertEquals($body[$num]->retry_if_possible, $record->retry_if_possible);
            $this->assertEquals($body[$num]->status, $record->status);
            
        }

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    
    public function testPaymentsGet()
    {
        $fixture = $this->loadJsonFixture('payments')->get;
        $this->stub_request($fixture);

        $service = $this->client->payments();
        $response = call_user_func_array(array($service, 'get'), (array)$fixture->url_params);

        $body = $fixture->body->payments;
    
        $this->assertInstanceOf('\GoCardlessPro\Resources\Payment', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->amount_refunded, $response->amount_refunded);
        $this->assertEquals($body->charge_date, $response->charge_date);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->description, $response->description);
        $this->assertEquals($body->fx, $response->fx);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->reference, $response->reference);
        $this->assertEquals($body->retry_if_possible, $response->retry_if_possible);
        $this->assertEquals($body->status, $response->status);
    

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    
    public function testPaymentsUpdate()
    {
        $fixture = $this->loadJsonFixture('payments')->update;
        $this->stub_request($fixture);

        $service = $this->client->payments();
        $response = call_user_func_array(array($service, 'update'), (array)$fixture->url_params);

        $body = $fixture->body->payments;
    
        $this->assertInstanceOf('\GoCardlessPro\Resources\Payment', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->amount_refunded, $response->amount_refunded);
        $this->assertEquals($body->charge_date, $response->charge_date);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->description, $response->description);
        $this->assertEquals($body->fx, $response->fx);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->reference, $response->reference);
        $this->assertEquals($body->retry_if_possible, $response->retry_if_possible);
        $this->assertEquals($body->status, $response->status);
    

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    
    public function testPaymentsCancel()
    {
        $fixture = $this->loadJsonFixture('payments')->cancel;
        $this->stub_request($fixture);

        $service = $this->client->payments();
        $response = call_user_func_array(array($service, 'cancel'), (array)$fixture->url_params);

        $body = $fixture->body->payments;
    
        $this->assertInstanceOf('\GoCardlessPro\Resources\Payment', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->amount_refunded, $response->amount_refunded);
        $this->assertEquals($body->charge_date, $response->charge_date);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->description, $response->description);
        $this->assertEquals($body->fx, $response->fx);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->reference, $response->reference);
        $this->assertEquals($body->retry_if_possible, $response->retry_if_possible);
        $this->assertEquals($body->status, $response->status);
    

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    
    public function testPaymentsRetry()
    {
        $fixture = $this->loadJsonFixture('payments')->retry;
        $this->stub_request($fixture);

        $service = $this->client->payments();
        $response = call_user_func_array(array($service, 'retry'), (array)$fixture->url_params);

        $body = $fixture->body->payments;
    
        $this->assertInstanceOf('\GoCardlessPro\Resources\Payment', $response);

        $this->assertEquals($body->amount, $response->amount);
        $this->assertEquals($body->amount_refunded, $response->amount_refunded);
        $this->assertEquals($body->charge_date, $response->charge_date);
        $this->assertEquals($body->created_at, $response->created_at);
        $this->assertEquals($body->currency, $response->currency);
        $this->assertEquals($body->description, $response->description);
        $this->assertEquals($body->fx, $response->fx);
        $this->assertEquals($body->id, $response->id);
        $this->assertEquals($body->links, $response->links);
        $this->assertEquals($body->metadata, $response->metadata);
        $this->assertEquals($body->reference, $response->reference);
        $this->assertEquals($body->retry_if_possible, $response->retry_if_possible);
        $this->assertEquals($body->status, $response->status);
    

        $expectedPathRegex = $this->extract_resource_fixture_path_regex($fixture);
        $dispatchedRequest = $this->history[0]['request'];
        $this->assertRegExp($expectedPathRegex, $dispatchedRequest->getUri()->getPath());
    }

    
}
