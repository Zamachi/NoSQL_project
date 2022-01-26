<?php
    use Laudis\Neo4j\Databags\TransactionConfiguration;
    $client = Laudis\Neo4j\ClientBuilder::create()->withDriver('bolt','bolt://neo4j:1234@localhost')->build();

    $clientNosql = Laudis\Neo4j\ClientBuilder::create()->withDriver('bolt','bolt://neo4j:1234@localhost?database=nosql') ->withDefaultTransactionConfiguration(TransactionConfiguration::default()->withTimeout(300))->build();
?>