<?php 

return [
    'title' => 'Laravel Installer',
    'next' => 'L\'étape suivante',
    'back' => 'précédent',
    'finish' => 'Installer',
    'forms' => [
        'errorTitle' => 'Les erreurs suivantes sont survenues:',
    ],
    'welcome' => [
        'templateTitle' => 'Bienvenue',
        'title' => 'Laravel Installer',
        'message' => 'Assistant d\'installation et de configuration facile.',
        'next' => 'Vérifier les exigences',
    ],
    'requirements' => [
        'templateTitle' => 'Étape 1 | Configuration requise pour le serveur',
        'title' => 'Configuration requise pour le serveur',
        'next' => 'Vérifier les autorisations',
    ],
    'permissions' => [
        'templateTitle' => 'Étape 2 | Les permissions',
        'title' => 'Les permissions',
        'next' => 'Configurer l\'environnement',
    ],
    'environment' => [
        'menu' => [
            'templateTitle' => 'Étape 3 | Paramètres de l\'environnement',
            'title' => 'Paramètres de l\'environnement',
            'desc' => 'Veuillez sélectionner le mode de configuration du fichier <code> .env </ code> des applications.',
            'wizard-button' => 'Configuration de l\'assistant de formulaire',
            'classic-button' => 'Éditeur de texte classique',
        ],
        'wizard' => [
            'templateTitle' => 'Étape 3 | Paramètres de l\'environnement | Assistant guidé',
            'title' => 'Assistant <code> .env </ code> guidé',
            'tabs' => [
                'environment' => 'Environnement',
                'database' => 'Base de données',
                'application' => 'Application',
            ],
            'form' => [
                'name_required' => 'Un nom d\'environnement est requis.',
                'app_name_label' => 'Nom de l\'application',
                'app_name_placeholder' => 'Nom de l\'application',
                'app_environment_label' => 'Environnement d\'application',
                'app_environment_label_local' => 'Local',
                'app_environment_label_developement' => 'Développement',
                'app_environment_label_qa' => 'Qa',
                'app_environment_label_production' => 'Production',
                'app_environment_label_other' => 'Autre',
                'app_environment_placeholder_other' => 'Entrez votre environnement ...',
                'app_debug_label' => 'Debug App',
                'app_debug_label_true' => 'Vrai',
                'app_debug_label_false' => 'Faux',
                'app_log_level_label' => 'Niveau du journal de l\'application',
                'app_log_level_label_debug' => 'déboguer',
                'app_log_level_label_info' => 'Info',
                'app_log_level_label_notice' => 'remarquer',
                'app_log_level_label_warning' => 'Attention',
                'app_log_level_label_error' => 'Erreur',
                'app_log_level_label_critical' => 'critique',
                'app_log_level_label_alert' => 'alerte',
                'app_log_level_label_emergency' => 'urgence',
                'app_url_label' => 'URL de l\'application',
                'app_url_placeholder' => 'URL de l\'application',
                'db_connection_label' => 'Connexion à la base de données',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Hôte de base de données',
                'db_host_placeholder' => 'Hôte de base de données',
                'db_port_label' => 'Port de base de données',
                'db_port_placeholder' => 'Port de base de données',
                'db_name_label' => 'Nom de la base de données',
                'db_name_placeholder' => 'Nom de la base de données',
                'db_username_label' => 'Nom d\'utilisateur de la base de données',
                'db_username_placeholder' => 'Nom d\'utilisateur de la base de données',
                'db_password_label' => 'Mot de passe de base de données',
                'db_password_placeholder' => 'Mot de passe de base de données',
                'app_tabs' => [
                    'more_info' => 'Plus d\'informations',
                    'broadcasting_title' => 'Diffusion, mise en cache, session, & amp; Queue',
                    'broadcasting_label' => 'Pilote de diffusion',
                    'broadcasting_placeholder' => 'Pilote de diffusion',
                    'cache_label' => 'Pilote de cache',
                    'cache_placeholder' => 'Pilote de cache',
                    'session_label' => 'Pilote de session',
                    'session_placeholder' => 'Pilote de session',
                    'queue_label' => 'Pilote de file d\'attente',
                    'queue_placeholder' => 'Pilote de file d\'attente',
                    'redis_label' => 'Redis Driver',
                    'redis_host' => 'Redis Host',
                    'redis_password' => 'Redis mot de passe',
                    'redis_port' => 'Port de redis',
                    'mail_label' => 'Courrier',
                    'mail_driver_label' => 'Pilote de courrier',
                    'mail_driver_placeholder' => 'Pilote de courrier',
                    'mail_host_label' => 'Mail Host',
                    'mail_host_placeholder' => 'Mail Host',
                    'mail_port_label' => 'Port de messagerie',
                    'mail_port_placeholder' => 'Port de messagerie',
                    'mail_username_label' => 'Mail Nom d\'utilisateur',
                    'mail_username_placeholder' => 'Mail Nom d\'utilisateur',
                    'mail_password_label' => 'Mot de passe mail',
                    'mail_password_placeholder' => 'Mot de passe mail',
                    'mail_encryption_label' => 'Chiffrement du courrier',
                    'mail_encryption_placeholder' => 'Chiffrement du courrier',
                    'pusher_label' => 'Poussoir',
                    'pusher_app_id_label' => 'Pusher App Id',
                    'pusher_app_id_palceholder' => 'Pusher App Id',
                    'pusher_app_key_label' => 'Poussoir App Key',
                    'pusher_app_key_palceholder' => 'Poussoir App Key',
                    'pusher_app_secret_label' => 'Pusher App Secret',
                    'pusher_app_secret_palceholder' => 'Pusher App Secret',
                ],
                'buttons' => [
                    'setup_database' => 'Base de données d\'installation',
                    'setup_application' => 'Application d\'installation',
                    'install' => 'Installer',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Étape 3 | Paramètres de l\'environnement | Éditeur classique',
            'title' => 'Editeur d\'environnement classique',
            'save' => 'Enregistrer .env',
            'back' => 'Utiliser l\'assistant de formulaire',
            'install' => 'Enregistrer et installer',
        ],
        'success' => 'Les paramètres de votre fichier .env ont été enregistrés.',
        'errors' => 'Impossible d\'enregistrer le fichier .env, veuillez le créer manuellement.',
    ],
    'install' => 'Installer',
    'installed' => [
        'success_log_message' => 'Laravel Installer a été installé avec succès',
    ],
    'final' => [
        'title' => 'Installation terminée',
        'templateTitle' => 'Installation terminée',
        'finished' => 'L\'application a été installée avec succès.',
        'migration' => 'Migration & amp; Sortie de la console de semences:',
        'console' => 'Sortie de la console d\'application:',
        'log' => 'Entrée du journal d\'installation:',
        'env' => 'Fichier final .env:',
        'exit' => 'Cliquez ici pour sortir',
    ],
    'updater' => [
        'title' => 'Laravel Updater',
        'welcome' => [
            'title' => 'Bienvenue dans le programme de mise à jour',
            'message' => 'Bienvenue dans l\'assistant de mise à jour.',
        ],
        'overview' => [
            'title' => 'Vue d\'ensemble',
            'message' => 'Il y a 1 mise à jour. | Il y a: nombre de mises à jour.',
            'install_updates' => 'Installer les mises à jour',
        ],
        'final' => [
            'title' => 'Fini',
            'finished' => 'La base de données de l\'application a été mise à jour avec succès.',
            'exit' => 'Cliquez ici pour sortir',
        ],
        'log' => [
            'success_message' => 'Laravel Installer a été mis à jour avec succès',
        ],
    ],
];