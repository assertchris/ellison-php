<?php

test('simple sentences are identified', function() {
    $ellison = new AC\Ellison\Ellison();
    $result = $ellison->getSentenceDifficulty('This is a simple sentence');

    expect($result)
        ->toBeArray()
        ->toHaveLength(1)
        ->and($result[0])
        ->toMatchArray([
            'type' => 'simple',
        ]);
});

test('moderate sentences are identified', function() {
    $ellison = new AC\Ellison\Ellison();
    $result = $ellison->getSentenceDifficulty('This is a complex sentence because it includes longer, more complex words');

    expect($result)
        ->toBeArray()
        ->toHaveLength(1)
        ->and($result[0])
        ->toMatchArray([
            'type' => 'moderate',
        ]);
});

test('complex sentences are identified', function() {
    $ellison = new AC\Ellison\Ellison();
    $result = $ellison->getSentenceDifficulty('This is a complex sentence because it includes longer words of greater complexity, and an altogether unbearable length');

    expect($result)
        ->toBeArray()
        ->toHaveLength(1)
        ->and($result[0])
        ->toMatchArray([
            'type' => 'complex',
        ]);
});

test('passive phrases are identified', function() {
    $ellison = new AC\Ellison\Ellison();
    $result = $ellison->getPassivePhrases('This sentence was made poorly');

    expect($result)
        ->toBeArray()
        ->toHaveLength(1)
        ->and($result[0])
        ->toMatchArray([
            'text' => 'was made',
            'type' => 'passive',
        ]);
});

test('adverb phrases are identified', function() {
    $ellison = new AC\Ellison\Ellison();
    $result = $ellison->getAdverbPhrases('This sentence is literally awful');

    expect($result)
        ->toBeArray()
        ->toHaveLength(1)
        ->and($result[0])
        ->toMatchArray([
            'text' => 'literally',
            'type' => 'adverb',
        ]);
});

test('complex phrases are identified', function() {
    $ellison = new AC\Ellison\Ellison();
    $result = $ellison->getComplexPhrases('There are multiple problems');

    expect($result)
        ->toBeArray()
        ->toHaveLength(1)
        ->and($result[0])
        ->toMatchArray([
            'text' => 'multiple',
            'type' => 'complex',
            'alternatives' => ['many'],
        ]);
});

test('qualified phrases are identified', function() {
    $ellison = new AC\Ellison\Ellison();
    $result = $ellison->getQualifiedPhrases('I believe this sucks');

    expect($result)
        ->toBeArray()
        ->toHaveLength(1)
        ->and($result[0])
        ->toMatchArray([
            'text' => 'i believe',
            'type' => 'qualified',
        ]);
});
