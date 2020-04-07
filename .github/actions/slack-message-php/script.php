<?php

require_once 'vendor/autoload.php';
Requests::register_autoloader();

// var_dump($argv);

echo "::group::ENV\n";
var_dump($_ENV);
echo "::endgroup::\n";

echo "::debug ::Sending a request to slack.\n";

$response = Requests::post(
    $_ENV['INPUT_SLACK_WEBHOOK'],
    array(
        "Content-type" => "application/json",
    ),
    // json_encode(array(
    //     'text' => 'Some message'
    // ))
    json_encode(array(
        'blocks' => array(
            array(
                'type' => 'section',
                'text' => array(
                    'type' => 'mrkdwn',
                    'text' => $_ENV['INPUT_MESSAGE'],
                ),
            ),
            array(
                'type' => 'section',
                'fields' => array(
                    array(
                        'type' => 'mrkdwn',
                        'text' => "*Respository:*\n{$_ENV['GITHUB_REPOSITORY']}",
                    ),
                    array(
                        'type' => 'mrkdwn',
                        'text' => "*Event:*\n{$_ENV['GITHUB_EVENT_NAME']}",
                    ),
                    array(
                        'type' => 'mrkdwn',
                        'text' => "*Ref:*\n{$_ENV['GITHUB_REF']}",
                    ),
                    array(
                        'type' => 'mrkdwn',
                        'text' => "*SHA:*\n{$_ENV['GITHUB_SHA']}",
                    ),
                ),
            ),
        ),
    ))
);

echo "::group::Slack Response\n";
var_dump($response);
echo "::endgroup::\n";

if (!$response->success) {
    echo "::group::Slack Response Error:\n";
    echo $response->body;
    echo "::endgroup::\n";
    exit(1);
}

// $response = Requests::post(
//     "https://hooks.slack.com/services/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",
//     array(
//         "Content-type" => "application/json",
//     ),
//     // json_encode(array(
//     //     'text' => 'Some message'
//     // ))
//     json_encode(array(
//         'blocks' => array(
//             0 => array(
//                 'type' => 'section',
//                 'text' => array(
//                     'type' => 'mrkdwn',
//                     'text' => 'You have a new request:
// *<fakeLink.toEmployeeProfile.com|Fred Enriquez - New device request>*',
//                 ),
//             ),
//             1 => array(
//                 'type' => 'section',
//                 'fields' => array(
//                     0 => array(
//                         'type' => 'mrkdwn',
//                         'text' => '*Type:*
// Computer (laptop)',
//                     ),
//                     1 => array(
//                         'type' => 'mrkdwn',
//                         'text' => '*When:*
// Submitted Aut 10',
//                     ),
//                     2 => array(
//                         'type' => 'mrkdwn',
//                         'text' => '*Last Update:*
// Mar 10, 2015 (3 years, 5 months)',
//                     ),
//                     3 => array(
//                         'type' => 'mrkdwn',
//                         'text' => '*Reason:*
// All vowel keys aren\'t working.',
//                     ),
//                     4 => array(
//                         'type' => 'mrkdwn',
//                         'text' => '*Specs:*
// "Cheetah Pro 15" - Fast, really fast"',
//                     ),
//                 ),
//             ),
//             2 => array(
//                 'type' => 'actions',
//                 'elements' => array(
//                     0 => array(
//                         'type' => 'button',
//                         'text' => array(
//                             'type' => 'plain_text',
//                             'emoji' => true,
//                             'text' => 'Approve',
//                         ),
//                         'style' => 'primary',
//                         'value' => 'click_me_123',
//                     ),
//                     1 => array(
//                         'type' => 'button',
//                         'text' => array(
//                             'type' => 'plain_text',
//                             'emoji' => true,
//                             'text' => 'Deny',
//                         ),
//                         'style' => 'danger',
//                         'value' => 'click_me_123',
//                     ),
//                 ),
//             ),
//         ),
//     ))
// );

// var_dump($response);

// if (!$response->success) {
//     echo $response->body;
// }
