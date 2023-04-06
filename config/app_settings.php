<?php

return [

    // All the sections for the settings page
    'sections' => [
        'app' => [
            'title' => 'Réglages généraux',
            'descriptions' => 'Réglages généraux du site.', // (optional)
            'icon' => 'fa fa-cog', // (optional)

            'inputs' => [
                [
                    'name' => 'site_name', // unique key for setting
                    'type' => 'text', // type of input can be text, number, textarea, select, boolean, checkbox etc.
                    'label' => 'Nom du site', // label for input
                    // optional properties
                    'placeholder' => 'Entrer le nom du site', // placeholder for input
                    'class' => 'form-control', // override global input_class
                    'style' => '', // any inline styles
                    'rules' => 'required|min:2|max:255', // validation rules for this input
                    'value' => 'SYNHA-CI', // any default value
                    'hint' => 'Vous pouvez ajouter le nom du site ici' // help block text for input
                ],
                [
                    'name' => 'site_logo',
                    'type' => 'file',
                    'label' => 'Téléverser le logo',
                    'hint' => 'Il doit s\'agir d\'une image, rognée à la taille souhaitée.',
                    'rules' => 'image|max:500',
                    'disk' => 'public', // which disk you want to upload
                    'path' => 'app', // path on the disk,
                    'preview_class' => 'thumbnail',
                    'preview_style' => 'height:40px'
                ]
            ]
        ],
        'contact' => [
            'title' => 'Téléphone et contacts',
            'icon' => 'fa fa-envelope',

            'inputs' => [
                [
                    'name' => 'contact_mobile',
                    'type' => 'text',
                    'label' => 'Mobile',
                    'placeholder' => 'Enter mobile number',
                    'rules' => 'nullable|string|max:255',
                ],
                [
                    'name' => 'contact_email',
                    'type' => 'email',
                    'label' => 'Email',
                    'placeholder' => 'Enter email address',
                    'rules' => 'nullable|string|max:255',
                ]
            ]
        ],
        'social' => [
            'title' => 'Liens des réseaux sociaux',
            'icon' => 'fa fa-share',
            'inputs' => [
                [
                    'name' => 'social_facebook',
                    'type' => 'text',
                    'label' => 'Facebook',
                    'placeholder' => 'Saisir le lien du profil Facebook',
                    'rules' => 'nullable|string|max:255',
                ],
                [
                    'name' => 'social_twitter',
                    'type' => 'text',
                    'label' => 'Twitter',
                    'placeholder' => 'Saisir le lien du profil Twitter',
                    'rules' => 'nullable|string|max:255',
                ],
                [
                    'name' => 'social_linkedin',
                    'type' => 'text',
                    'label' => 'LinkedIn',
                    'placeholder' => 'Saisir le lien du profil LinkedIn',
                    'rules' => 'nullable|string|max:255',
                ]
            ]
        ],
    ],
    

    // Setting page url, will be used for get and post request
    'url' => 'settings',

    // Any middleware you want to run on above route
    'middleware' => ["auth","role:admin"],

    // Route Names
    'route_names' => [
        'index' => 'settings.index',
        'store' => 'settings.store',
    ],
    
    // View settings
    'setting_page_view' => 'app_settings::settings_page',
    // 'setting_page_view' => 'dashboard.site-settings',
    'flash_partial' => 'app_settings::_flash',

    // Setting section class setting
    'section_class' => 'card mb-3',
    'section_heading_class' => 'card-header',
    'section_body_class' => 'card-body',

    // Input wrapper and group class setting
    'input_wrapper_class' => 'form-group',
    'input_class' => 'form-control',
    'input_error_class' => 'has-error',
    'input_invalid_class' => 'is-invalid',
    'input_hint_class' => 'form-text text-muted',
    'input_error_feedback_class' => 'text-danger',

    // Submit button
    'submit_btn_text' => 'Sauvegarder les paramètres',
    'submit_success_message' => 'Les réglages ont été enregistrés.',

    // Remove any setting which declaration removed later from sections
    'remove_abandoned_settings' => false,

    // Controller to show and handle save setting
    // 'controller' => '\QCod\AppSettings\Controllers\AppSettingController',
   // change the controller in config/app_settings.php at the bottom

    // Controller to show and handle save setting
    'controller' => 'App\Http\Controllers\SettingsController',

    // settings group
    'setting_group' => function() {
        // return 'user_'.auth()->id();
        return 'default';
    }
];
