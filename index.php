<?php

    use Elasticsearch\ClientBuilder;

    require 'vendor/autoload.php';

    $client = ClientBuilder::create()->build();
    
    echo "ES client has been created.<br>";
    
    /*$params = [
        'index' => 'my_index',
        'id'    => 'my_id',
        'body'  => ['testField' => 'abc']
    ];

    $response = $client->index($params);
    print_r($response);
    */
    
    $params = [
    'index' => 'my_index',
    'id'    => 'my_id'
    ];

    $response = $client->get($params);
    print_r($response);
    
?>