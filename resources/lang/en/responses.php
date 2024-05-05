<?php

return [
    'login' => [
        'success' => [
            'message' => 'Login Successful!',
            'caption' => 'Welcome Back, Please click to continue.',
            'button' => 'Continue',
        ],
        'error' => [
            'message' => 'Login Failed!',
            'caption' => 'Email or Password maybe wrong.',
            'button' => 'Close',
        ],
    ],
    'forgot-password' => [
        'success' => [
            'message' => 'Success!',
            'caption' => 'We Have Emailed Your Password Reset Link.',
            'button' => 'Close',
        ],
        'error' => [
            'message' => 'Failed!',
            'caption' => 'We Can\'t Find A User With That Email Address.',
            'button' => 'Close',
        ],
    ],
    'reset-password' => [
        'success' => [
            'message' => 'Success!',
            'caption' => 'Your Password Has Been Changed.',
            'button' => 'Close',
        ],
        'error' => [
            'message' => 'Failed!',
            'caption' => 'Your Token Is Invalid.',
            'button' => 'Close',
        ],
    ],
    'data' => [
        'created' => [
            'message' => 'Success!',
            'caption' => 'Data has been created.',
        ],
        'updated' => [
            'message' => 'Success!',
            'caption' => 'Data has been updated.',
        ],
        'destroyed' => [
            'message' => 'Success!',
            'caption' => 'Data has been deleted.',
        ],
    ],
];
