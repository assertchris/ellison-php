<?php

namespace AC\Ellison;

class Ellison
{
    private const QualifiedWords = [
        'i believe',
        'i consider',
        'i don\'t believe',
        'i don\'t consider',
        'i don\'t feel',
        'i don\'t suggest',
        'i don\'t think',
        'i feel',
        'i hope to',
        'i might',
        'i suggest',
        'i think',
        'i was wondering',
        'i will try',
        'i wonder',
        'in my opinion',
        'is kind of',
        'is sort of',
        'just',
        'maybe',
        'perhaps',
        'possibly',
        'we believe',
        'we consider',
        'we don\'t believe',
        'we don\'t consider',
        'we don\'t feel',
        'we don\'t suggest',
        'we don\'t think',
        'we feel',
        'we hope to',
        'we might',
        'we suggest',
        'we think',
        'we were wondering',
        'we will try',
        'we wonder',
    ];

    private const NonAdverbs = [
        'actually',
        'additionally',
        'allegedly',
        'ally',
        'alternatively',
        'anomaly',
        'apply',
        'approximately',
        'ashely',
        'ashly',
        'assembly',
        'awfully',
        'baily',
        'belly',
        'bely',
        'billy',
        'bradly',
        'bristly',
        'bubbly',
        'bully',
        'burly',
        'butterfly',
        'carly',
        'charly',
        'chilly',
        'comely',
        'completely',
        'comply',
        'consequently',
        'costly',
        'courtly',
        'crinkly',
        'crumbly',
        'cuddly',
        'curly',
        'currently',
        'daily',
        'dastardly',
        'deadly',
        'deathly',
        'definitely',
        'dilly',
        'disorderly',
        'doily',
        'dolly',
        'dragonfly',
        'early',
        'elderly',
        'elly',
        'emily',
        'especially',
        'exactly',
        'exclusively',
        'family',
        'finally',
        'firefly',
        'folly',
        'friendly',
        'frilly',
        'gadfly',
        'gangly',
        'generally',
        'ghastly',
        'giggly',
        'globally',
        'goodly',
        'gravelly',
        'grisly',
        'gully',
        'haily',
        'hally',
        'harly',
        'hardly',
        'heavenly',
        'hillbilly',
        'hilly',
        'holly',
        'holy',
        'homely',
        'homily',
        'horsefly',
        'hourly',
        'immediately',
        'instinctively',
        'imply',
        'italy',
        'jelly',
        'jiggly',
        'jilly',
        'jolly',
        'july',
        'karly',
        'kelly',
        'kindly',
        'lately',
        'likely',
        'lilly',
        'lily',
        'lively',
        'lolly',
        'lonely',
        'lovely',
        'lowly',
        'luckily',
        'mealy',
        'measly',
        'melancholy',
        'mentally',
        'molly',
        'monopoly',
        'monthly',
        'multiply',
        'nightly',
        'oily',
        'only',
        'orderly',
        'panoply',
        'particularly',
        'partly',
        'paully',
        'pearly',
        'pebbly',
        'polly',
        'potbelly',
        'presumably',
        'previously',
        'pualy',
        'quarterly',
        'rally',
        'rarely',
        'recently',
        'rely',
        'reply',
        'reportedly',
        'roughly',
        'sally',
        'scaly',
        'shapely',
        'shelly',
        'shirly',
        'shortly',
        'sickly',
        'silly',
        'sly',
        'smelly',
        'sparkly',
        'spindly',
        'spritely',
        'squiggly',
        'stately',
        'steely',
        'supply',
        'surly',
        'tally',
        'timely',
        'trolly',
        'ugly',
        'underbelly',
        'unfortunately',
        'unholy',
        'unlikely',
        'usually',
        'waverly',
        'weekly',
        'wholly',
        'willy',
        'wily',
        'wobbly',
        'wooly',
        'worldly',
        'wrinkly',
        'yearly',
    ];

    private const ComplexWords = [
        'a number of' => ['many', 'some'],
        'abundance' => ['enough', 'plenty'],
        'accede to' => ['allow', 'agree to'],
        'accelerate' => ['speed up'],
        'accentuate' => ['stress'],
        'accompany' => ['go with', 'with'],
        'accomplish' => ['do'],
        'accorded' => ['given'],
        'accrue' => ['add', 'gain'],
        'acquiesce' => ['agree'],
        'acquire' => ['get'],
        'additional' => ['more', 'extra'],
        'adjacent to' => ['next to'],
        'adjustment' => ['change'],
        'admissible' => ['allowed', 'accepted'],
        'advantageous' => ['helpful'],
        'adversely impact' => ['hurt'],
        'advise' => ['tell'],
        'aforementioned' => ['remove'],
        'aggregate' => ['total', 'add'],
        'aircraft' => ['plane'],
        'all of' => ['all'],
        'alleviate' => ['ease', 'reduce'],
        'allocate' => ['divide'],
        'along the lines of' => ['like', 'as in'],
        'already existing' => ['existing'],
        'alternatively' => ['or'],
        'ameliorate' => ['improve', 'help'],
        'anticipate' => ['expect'],
        'apparent' => ['clear', 'plain'],
        'appreciable' => ['many'],
        'as a means of' => ['to'],
        'as of yet' => ['yet'],
        'as to' => ['on', 'about'],
        'as yet' => ['yet'],
        'ascertain' => ['find out', 'learn'],
        'assistance' => ['help'],
        'at this time' => ['now'],
        'attain' => ['meet'],
        'attributable to' => ['because'],
        'authorize' => ['allow', 'let'],
        'because of the fact that' => ['because'],
        'belated' => ['late'],
        'benefit from' => ['enjoy'],
        'bestow' => ['give', 'award'],
        'by virtue of' => ['by', 'under'],
        'cease' => ['stop'],
        'close proximity' => ['near'],
        'commence' => ['begin or start'],
        'comply with' => ['follow'],
        'concerning' => ['about', 'on'],
        'consequently' => ['so'],
        'consolidate' => ['join', 'merge'],
        'constitutes' => ['is', 'forms', 'makes up'],
        'demonstrate' => ['prove', 'show'],
        'depart' => ['leave', 'go'],
        'designate' => ['choose', 'name'],
        'discontinue' => ['drop', 'stop'],
        'due to the fact that' => ['because', 'since'],
        'each and every' => ['each'],
        'economical' => ['cheap'],
        'eliminate' => ['cut', 'drop', 'end'],
        'elucidate' => ['explain'],
        'employ' => ['use'],
        'endeavor' => ['try'],
        'enumerate' => ['count'],
        'equitable' => ['fair'],
        'equivalent' => ['equal'],
        'evaluate' => ['test', 'check'],
        'evidenced' => ['showed'],
        'exclusively' => ['only'],
        'expedite' => ['hurry'],
        'expend' => ['spend'],
        'expiration' => ['end'],
        'facilitate' => ['ease', 'help'],
        'factual evidence' => ['facts', 'evidence'],
        'feasible' => ['workable'],
        'finalize' => ['complete', 'finish'],
        'first and foremost' => ['first'],
        'for the purpose of' => ['to'],
        'forfeit' => ['lose', 'give up'],
        'formulate' => ['plan'],
        'honest truth' => ['truth'],
        'however' => ['but', 'yet'],
        'if and when' => ['if', 'when'],
        'impacted' => ['affected', 'harmed', 'changed'],
        'implement' => ['install', 'put in place', 'tool'],
        'in a timely manner' => ['on time'],
        'in accordance with' => ['by', 'under'],
        'in addition' => ['also', 'besides', 'too'],
        'in all likelihood' => ['probably'],
        'in an effort to' => ['to'],
        'in between' => ['between'],
        'in excess of' => ['more than'],
        'in lieu of' => ['instead'],
        'in light of the fact that' => ['because'],
        'in many cases' => ['often'],
        'in order to' => ['to'],
        'in regard to' => ['about', 'concerning', 'on'],
        'in some instances ' => ['sometimes'],
        'in terms of' => ['omit'],
        'in the near future' => ['soon'],
        'in the process of' => ['omit'],
        'inception' => ['start'],
        'incumbent upon' => ['must'],
        'indicate' => ['say', 'state', 'or show'],
        'indication' => ['sign'],
        'initiate' => ['start'],
        'is applicable to' => ['applies to'],
        'is authorized to' => ['may'],
        'is responsible for' => ['handles'],
        'it is essential' => ['must', 'need to'],
        'literally' => ['omit'],
        'magnitude' => ['size'],
        'maximum' => ['greatest', 'largest', 'most'],
        'methodology' => ['method'],
        'minimize' => ['cut'],
        'minimum' => ['least', 'smallest', 'small'],
        'modify' => ['change'],
        'monitor' => ['check', 'watch', 'track'],
        'multiple' => ['many'],
        'necessitate' => ['cause', 'need'],
        'nevertheless' => ['still', 'besides', 'even so'],
        'not certain' => ['uncertain'],
        'not many' => ['few'],
        'not often' => ['rarely'],
        'not unless' => ['only if'],
        'not unlike' => ['similar', 'alike'],
        'notwithstanding' => ['in spite of', 'still'],
        'null and void' => ['use either null or void'],
        'numerous' => ['many'],
        'objective' => ['aim', 'goal'],
        'obligate' => ['bind', 'compel'],
        'obtain' => ['get'],
        'on the contrary' => ['but', 'so'],
        'on the other hand' => ['omit', 'but', 'so'],
        'one particular' => ['one'],
        'optimum' => ['best', 'greatest', 'most'],
        'overall' => ['omit'],
        'owing to the fact that' => ['because', 'since'],
        'participate' => ['take part'],
        'particulars' => ['details'],
        'pass away' => ['die'],
        'pertaining to' => ['about', 'of', 'on'],
        'point in time' => ['time', 'point', 'moment', 'now'],
        'portion' => ['part'],
        'possess' => ['have', 'own'],
        'preclude' => ['prevent'],
        'previously' => ['before'],
        'prior to' => ['before'],
        'prioritize' => ['rank', 'focus on'],
        'procure' => ['buy', 'get'],
        'proficiency' => ['skill'],
        'provided that' => ['if'],
        'purchase' => ['buy', 'sale'],
        'put simply' => ['omit'],
        'readily apparent' => ['clear'],
        'refer back' => ['refer'],
        'regarding' => ['about', 'of', 'on'],
        'relocate' => ['move'],
        'remainder' => ['rest'],
        'remuneration' => ['payment'],
        'require' => ['must', 'need'],
        'requirement' => ['need', 'rule'],
        'reside' => ['live'],
        'residence' => ['house'],
        'retain' => ['keep'],
        'satisfy' => ['meet', 'please'],
        'shall' => ['must', 'will'],
        'should you wish' => ['if you want'],
        'similar to' => ['like'],
        'solicit' => ['ask for', 'request'],
        'span across' => ['span', 'cross'],
        'strategize' => ['plan'],
        'subsequent' => ['later', 'next', 'after', 'then'],
        'substantial' => ['large', 'much'],
        'successfully complete' => ['complete', 'pass'],
        'sufficient' => ['enough'],
        'terminate' => ['end', 'stop'],
        'the month of' => ['omit'],
        'therefore' => ['thus', 'so'],
        'this day and age' => ['today'],
        'time period' => ['time', 'period'],
        'took advantage of' => ['preyed on'],
        'transmit' => ['send'],
        'transpire' => ['happen'],
        'until such time as' => ['until'],
        'utilization' => ['use'],
        'utilize' => ['use'],
        'validate' => ['confirm'],
        'various different' => ['various', 'different'],
        'whether or not' => ['whether'],
        'with respect to' => ['on', 'about'],
        'with the exception of' => ['except for'],
        'witnessed' => ['saw', 'seen'],
    ];

    private const PastTenseVerbs = [
        'ate',
        'bent',
        'blew',
        'broke',
        'built',
        'caught',
        'chose',
        'came',
        'did',
        'drew',
        'drank',
        'drove',
        'ate',
        'fell',
        'flew',
        'forgot',
        'forgave',
        'froze',
        'gave',
        'went',
        'grew',
        'had',
        'heard',
        'hid',
        'hit',
        'held',
        'hurt',
        'kept',
        'knew',
        'lay',
        'led',
        'left',
        'lent',
        'lost',
        'made',
        'meant',
        'met',
        'paid',
        'put',
        'read',
        'rode',
        'ran',
        'rose',
        'said',
        'saw',
        'sold',
        'sent',
        'set',
        'shook',
        'sang',
        'sank',
        'sat',
        'slept',
        'slid',
        'spoke',
        'spent',
        'stood',
        'swam',
        'took',
        'taught',
        'told',
        'thought',
        'threw',
        'understood',
        'woke',
        'wore',
        'won',
        'wrote',
    ];

    private function getSentencesFromParagraph(string $paragraph): array
    {
        return array_filter(
            explode('. ', $paragraph),
            fn(string $sentence) => mb_strlen($sentence) > 0,
        );
    }

    private function getComplexityLevel(int $numberOfWords, int $numberOfLetters, int $numberOfSentences): float
    {
        if ($numberOfWords < 1 || $numberOfSentences < 1) {
            return 0.0;
        }

        $level = 4.71 * ($numberOfLetters / $numberOfWords) + 0.5 * ($numberOfWords / $numberOfSentences) - 21.43;

        if ($level <= 0) {
            return 0.0;
        }

        return $level;
    }

    public function getSentenceDifficulty(string $paragraph): array
    {
        return array_map(function(string $sentence) {
            $stripped = strip_tags($sentence);

            $numberOfWords = count(explode(' ', $stripped));
            $numberOfLetters = mb_strlen(implode('', explode(' ', $stripped)));

            $level = $this->getComplexityLevel($numberOfLetters, $numberOfWords, 1);

            if ($level >= 14) {
                return [
                    'text' => $sentence,
                    'type' => 'complex',
                ];
            }

            if ($level >= 10) {
                return [
                    'text' => $sentence,
                    'type' => 'moderate',
                ];
            }

            return [
                'text' => $sentence,
                'type' => 'simple',
            ];
        }, $this->getSentencesFromParagraph($paragraph));
    }

    public function getPassivePhrases(string $sentence): array
    {
        $words = explode(' ', $sentence);
        $prefixes = ['is', 'are', 'was', 'were', 'be', 'been', 'being'];

        return array_values(
            array_filter(
                array_map(
                    function($word) use ($words, $prefixes) {
                        $index = array_search($word, $words) ?? -1;
                        $cleaned = strtolower(preg_replace('/\W+/i', '', $word));

                        preg_match('/ed$/', $cleaned, $matches);

                        if ($index > 0 && (count($matches) > 0 || in_array($cleaned, static::PastTenseVerbs)) && in_array($previousWord = $words[$index - 1], $prefixes)) {
                            return [
                                'text' => $previousWord . ' ' . $cleaned,
                                'type' => 'passive',
                            ];
                        }

                        return null;
                    },
                    $words,
                ),
                fn($type) => $type,
            )
        );
    }

    public function getAdverbPhrases(string $sentence): array
    {
        return array_values(
            array_filter(
                array_map(
                    function($word) {
                        $cleaned = strtolower(preg_replace('/\W+/i', '', $word));

                        preg_match('/ly$/', $cleaned, $matches);

                        if (count($matches) > 0 && !in_array($cleaned, static::NonAdverbs)) {
                            return [
                                'text' => $word,
                                'type' => 'adverb',
                            ];
                        }

                        return null;
                    },
                    explode(' ', $sentence),
                ),
                fn($type) => $type,
            ),
        );
    }

    public function getComplexPhrases(string $sentence): array
    {
        return array_values(
            array_filter(
                array_map(
                    function(string $word) {
                        $cleaned = strtolower(preg_replace('/\W+/i', '', $word));

                        if (isset(static::ComplexWords[$cleaned])) {
                            return [
                                'text' => $word,
                                'type' => 'complex',
                                'alternatives' => static::ComplexWords[$word],
                            ];
                        }

                        return null;
                    },
                    explode(' ', $sentence),
                ),
                fn($type) => $type,
            ),
        );
    }

    public function getQualifiedPhrases(string $sentence): array
    {
        return array_values(
            array_map(
                fn(string $phrase) => [
                    'text' => $phrase,
                    'type' => 'qualified',
                ],
                array_filter(
                    static::QualifiedWords,
                    fn(string $phrase) => str_contains(strtolower($sentence), $phrase),
                )
            )
        );
    }
}
