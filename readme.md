# Ellison

Ellison is a simple library that helps identify complex sentences and poor word choices. It uses similar heuristics to Hemingway, but it doesn't include any calls to third-party APIs or LLMs. Just a bit of PHP.

You can install it with:

```sh
composer require assertchris/ellison
```

...And, use it with:

```php
$ellison = new AC\Ellison\Ellison();

$ellison->getSentenceDifficulty('This is a paragraph of text. It may include some moderately complex sentences, with slightly complex words. It might also include verbose sentences that tax the brain, tire the eyes, and exhaust the brain; all in an attempt to make the writer sound amazing.');

//  => [
//   [text => 'This is...of text', type => 'simple']
//   [text => 'It may...complex words', type => 'moderate']
//   [text => 'It might...sound amazing', type => 'complex']
// ]

$ellison->getPassivePhrases('This sentence may have been written by a corgi');

// => [
//   [text => 'been written', type => 'passive'] 
// ]
```

Feel free to submit PRs for more phrases and words that interest you. I have no interest in supporting non-english languages at this time.
