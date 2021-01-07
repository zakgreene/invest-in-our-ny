<?php
return function($kirby, $pages, $page, $site) {

    $alert = null;

    if($kirby->request()->is('POST') && get('submit')) {

        // check the honeypot
        if(empty(get('website')) === false) {
            go($page->url());
            exit;
        }

        $data = [
            'name'  => get('name'),
            'email' => get('email'),
            'phone' => get('phone'),
            'contact' => get('contact'),
            'text'  => get('text')
        ];

        $rules = [
            'name'  => ['required', 'minLength' => 3],
            'email' => ['required', 'email'],
            'phone' => ['minLength' => 10, 'maxLength' => 18],
            'text'  => ['required', 'minLength' => 3, 'maxLength' => 3000],
        ];

        $messages = [
            'name'  => 'Please enter a valid name',
            'email' => 'Please enter a valid email address',
            'phone' => 'Please enter a valid phone number',
            'text'  => 'Your message must be between 3 and 3000 characters'
        ];

        // some of the data is invalid
        if($invalid = invalid($data, $rules, $messages)) {
            $alert = $invalid;

            // the data is fine, let's send the email
        } else {
            try {
                $kirby->email([
                    'template' => 'email',
                    'from'     => 'info@investinourny.com',
                    'replyTo'  => $data['email'],
                    'to'       => $page->email()->toString(),
                    'subject'  => $site->title() . ': Message from ' . esc($data['name']),
                    'data'     => [
                        'email'   => esc($data['email']),
                        'sender' => esc($data['name']),
                        'contact' => esc($data['contact']),
                        'phone'  => esc($data['phone']),
                        'text'   => esc($data['text'])
                    ]
                ]);

            } catch (Exception $error) {
                if(option('debug')):
                    $alert['error'] = 'The form could not be sent-: <strong>' . $error->getMessage() . '</strong>';
                else:
                    $alert['error'] = 'The form could not be sent!';
                endif;
            }

            // no exception occurred, let's send a success message
            if (empty($alert) === true) {
                $success = $page->success()->kt();
                $data = [];
            }
        }
    }

    return [
        'alert'   => $alert,
        'data'    => $data ?? false,
        'success' => $success ?? false
    ];
};