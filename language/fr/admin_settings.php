<?php

/**
* @Project NUKEVIET 3.x
* @Author VINADES.,JSC (contact@vinades.vn)
* @Copyright (C) 2012 VINADES.,JSC. All rights reserved
* @Language Français
* @Createdate Jun 21, 2010, 12:30:00 PM
*/

if( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$lang_translator['author'] = 'Phạm Chí Quang';
$lang_translator['createdate'] = '21/6/2010, 19:30';
$lang_translator['copyright'] = '@Copyright (C) 2010 VINADES.,JSC. Tous droits réservés.';
$lang_translator['info'] = 'Langue française pour NukeViet 3';
$lang_translator['langtype'] = 'lang_module';

$lang_module['metaTagsConfig'] = 'Configuration de Meta-Tags';
$lang_module['metaTagsGroupName'] = 'Group type';
$lang_module['metaTagsGroupValue'] = 'Group Name';
$lang_module['metaTagsNote'] = 'The Meta-Tags: "%s" is determined automatically';
$lang_module['metaTagsVar'] = 'Accept the following variables';
$lang_module['metaTagsContent'] = 'Contenu';
$lang_module['googleAnalyticsSetDomainName_title'] = 'Domain properties when declared with Google Analytics';
$lang_module['googleAnalyticsSetDomainName_0'] = 'A single domain';
$lang_module['googleAnalyticsSetDomainName_1'] = 'One domain with multiple subdomains';
$lang_module['googleAnalyticsSetDomainName_2'] = 'Multiple top-level domains';
$lang_module['googleAnalyticsID'] = 'Google Analytics ID<br />(UA-XXXXX-X, <a href="http://www.google.com/analytics/" target="_blank">Detail</a>)';
$lang_module['global_config'] = 'Configuration générale';
$lang_module['site_config'] = 'Configuration du site';
$lang_module['lang_site_config'] = 'Configuration selon langue: %s';
$lang_module['bots_config'] = 'Moteurs de recherche';
$lang_module['optActive'] = 'Activer la fonction Optimisation du site';
$lang_module['optActive_no'] = 'inactif';
$lang_module['optActive_all'] = 'Activer sur le site entier';
$lang_module['optActive_site'] = 'Activer à l\'interface d\'utilisateur';
$lang_module['optActive_admin'] = 'Activer au section d\'administration';
$lang_module['sitename'] = 'Nom du site';
$lang_module['theme'] = 'Thème par défaut';
$lang_module['themeadmin'] = 'Thème de l\'Administration';
$lang_module['default_module'] = 'Module par défaut à l\'Accueil';
$lang_module['description'] = 'Description du site';
$lang_module['rewrite'] = 'Activer rewrite';
$lang_module['rewrite_optional'] = 'Filtrer les accents sur url';
$lang_module['disable_content'] = 'Notification de fermeture du site';
$lang_module['submit'] = 'Sauver';
$lang_module['err_writable'] = 'Erreur: impossible d\'entregister le fichier: %s merci de vérifier les permissions (chmod) de ce fichier.';
$lang_module['err_supports_rewrite'] = 'Erreur: le serveur ne supporte pas le module rewrite';
$lang_module['captcha'] = 'Configuration de captcha';
$lang_module['captcha_0'] = 'Masqué';
$lang_module['captcha_1'] = 'Lors de l\'identification de l\'admin';
$lang_module['captcha_2'] = 'Lors de l\'identification d\'utilisateur';
$lang_module['captcha_3'] = 'Lors de l\'inscription d\'utilisateur';
$lang_module['captcha_4'] = 'Lors de l\'identification d\'utilisateur ou à l\'inscription';
$lang_module['captcha_5'] = 'Lors de l\'identification de l\'admin ou de l\'utilisateur';
$lang_module['captcha_6'] = 'Lors de l\'identification de l\'admin ou l\'inscription de l\'utilisateur';
$lang_module['captcha_7'] = 'Toujours';
$lang_module['ftp_config'] = 'Configuration de FTP';
$lang_module['smtp_config'] = 'Configuration de SMTP';
$lang_module['server'] = 'Serveur ou Lien';
$lang_module['port'] = 'Porte';
$lang_module['username'] = 'Identifiant';
$lang_module['password'] = 'Mot de passe';
$lang_module['ftp_path'] = 'Chemin d\'accès';
$lang_module['mail_config'] = 'Méthode d\'envoie d\'e-mail';
$lang_module['type_smtp'] = 'SMTP';
$lang_module['type_linux'] = 'Linux Mail';
$lang_module['type_phpmail'] = 'PHPmail';
$lang_module['smtp_server'] = 'Infos du serveur';
$lang_module['incoming_ssl'] = 'Connexion sécurisée';
$lang_module['outgoing'] = 'Outgoing mail server (SMTP)';
$lang_module['outgoing_port'] = 'Outgoing port(SMTP)';
$lang_module['smtp_username'] = 'Infos du compte';
$lang_module['smtp_login'] = 'Nom d\'utilisateur';
$lang_module['smtp_pass'] = 'Mot de passe';
$lang_module['bot_name'] = 'Moteurs de recherche';
$lang_module['bot_agent'] = 'Agent du serveur';
$lang_module['bot_ips'] = 'IP du serveur';
$lang_module['bot_allowed'] = 'Autoriser';
$lang_module['site_keywords'] = 'Mots clés pour les moteurs de recherche';
$lang_module['site_logo'] = 'Nom du fichier logo';
$lang_module['site_email'] = 'E-mail du site';
$lang_module['error_send_email'] = 'E-mail recevant les notifications d\'erreurs';
$lang_module['site_phone'] = 'Téléphone du site';
$lang_module['lang_multi'] = 'Activer le multi-langage';
$lang_module['site_lang'] = 'Langue par défaut';
$lang_module['site_timezone'] = 'Fuseau horaire';
$lang_module['date_pattern'] = 'Format de la date';
$lang_module['time_pattern'] = 'Type d\'affichage: Heure Minute';
$lang_module['online_upd'] = 'Activer le compteur de visiteurs en ligne';
$lang_module['gzip_method'] = 'Activer gzip';
$lang_module['statistic'] = 'Activer  les statistiques';
$lang_module['proxy_blocker'] = 'Contrôler et bloquer les ordiateurs utilisant le proxy';
$lang_module['proxy_blocker_0'] = 'Sans contrôle';
$lang_module['proxy_blocker_1'] = 'Contrôle léger';
$lang_module['proxy_blocker_2'] = 'Contrôle moyen';
$lang_module['proxy_blocker_3'] = 'Contrôle strict';
$lang_module['str_referer_blocker'] = 'Activer le contrôle des liens vers le site depuis l\'exterieur';
$lang_module['my_domains'] = 'Les domaines du site';
$lang_module['cookie_prefix'] = 'Préfixe de cookie';
$lang_module['session_prefix'] = 'Préfixe de session';
$lang_module['is_user_forum'] = 'Confier la gestion d\'utilisateurs au forum';
$lang_module['banip'] = 'IPs interdits';
$lang_module['banip_ip'] = 'IP';
$lang_module['banip_timeban'] = 'Commencer';
$lang_module['banip_timeendban'] = 'Terminer';
$lang_module['banip_funcs'] = 'Fonctions';
$lang_module['banip_checkall'] = 'Sélectionner tout';
$lang_module['banip_uncheckall'] = 'Desélectionner tout';
$lang_module['banip_add'] = 'Ajouter';
$lang_module['banip_address'] = 'Adresse IP';
$lang_module['banip_begintime'] = 'Commencer';
$lang_module['banip_endtime'] = 'Terminer';
$lang_module['banip_notice'] = 'Note';
$lang_module['banip_confirm'] = 'Confirmer';
$lang_module['banip_mask_select'] = 'Sélectionnez';
$lang_module['banip_area'] = 'Zone interdite';
$lang_module['banip_nolimit'] = 'Perpétuel';
$lang_module['banip_area_select'] = 'Séletionnez la zone';
$lang_module['banip_noarea'] = 'pas encore déterminé';
$lang_module['banip_del_success'] = 'Suppression avec succès!';
$lang_module['banip_area_front'] = 'Site';
$lang_module['banip_area_admin'] = 'Administration';
$lang_module['banip_area_both'] = 'Site et Administration';
$lang_module['banip_delete_confirm'] = 'Êtes-vous sûr de vouloir supprimer cette IP de la liste des IPs interdits?';
$lang_module['banip_mask'] = 'Masque IP';
$lang_module['banip_edit'] = 'Éditer';
$lang_module['banip_delete'] = 'Supprimer';
$lang_module['banip_error_ip'] = 'Saisissez IP à interdire';
$lang_module['banip_error_area'] = 'Merci de sélectionner la zone';
$lang_module['banip_error_validip'] = 'Erreur: Adresse IP invalide';

$lang_module['nv_admin_add'] = 'Ajouter une tâche';
$lang_module['nv_admin_edit'] = 'Modifier la tâche';
$lang_module['nv_admin_del'] = 'Supprimer la tâche';
$lang_module['cron_name_empty'] = 'Vous n\'avez pas encore donné le nom de la tâche';
$lang_module['file_not_exist'] = 'Fichier inexistant';
$lang_module['func_name_invalid'] = 'Vous n\'avez pas déclaré la fonction ou le nom de fonction est invalide';
$lang_module['nv_admin_add_title'] = 'Pour ajouter une tâche, remplissez les champs ci-dessous';
$lang_module['nv_admin_edit_title'] = 'Pour modifier la tâche, remplissez les champs ci-dessous';
$lang_module['cron_name'] = 'Nom de la tâche';
$lang_module['file_none'] = 'Pas d\'accès';
$lang_module['run_file'] = 'Accès au fichier d\'exécution';
$lang_module['run_file_info'] = 'Fichier d\'exécution est un des fichiers dans le répertoire &ldquo;<strong>includes/cronjobs/</strong>&rdquo;';
$lang_module['run_func'] = 'Accès à la fonction';
$lang_module['run_func_info'] = 'Fonction doit être commencée par &ldquo;<strong>cron_</strong>&rdquo;';
$lang_module['params'] = 'Paramètre';
$lang_module['params_info'] = 'Séparer par la virgule';
$lang_module['interval'] = 'Répêter la tâche après';
$lang_module['interval_info'] = 'Si vous entrez &ldquo;<strong>0</strong>&rdquo;, la tâche est faite une seule fois';
$lang_module['start_time'] = 'Commencer à';
$lang_module['min'] = 'minutes';
$lang_module['hour'] = 'heures';
$lang_module['day'] = 'jours';
$lang_module['month'] = 'mois';
$lang_module['year'] = 'an';
$lang_module['is_del'] = 'Supprimer après avoir terminé';
$lang_module['isdel'] = 'Supprimer';
$lang_module['notdel'] = 'Non';
$lang_module['is_sys'] = 'Tâche créée par';
$lang_module['system'] = 'Système';
$lang_module['client'] = 'Administrateur';
$lang_module['act'] = 'Status';
$lang_module['act0'] = 'Inactif';
$lang_module['act1'] = 'Actif';
$lang_module['last_time'] = 'Dernière exécution';
$lang_module['next_time'] = 'Prochaine exécution';
$lang_module['last_time0'] = 'Jamais exécuté';
$lang_module['last_result'] = 'Résultat de la dernière exécution';
$lang_module['last_result_empty'] = 'non déterminé';
$lang_module['last_result0'] = 'Mauvais';
$lang_module['last_result1'] = 'Terminé';
$lang_module['closed_site'] = 'Mode de maintenance';
$lang_module['closed_site_0'] = 'Mode normal';
$lang_module['closed_site_1'] = 'Fermeture du site, seulement l\'administrateur suprême peut se connecter';
$lang_module['closed_site_2'] = 'Fermeture du site - les administrateurs générales peuvent se connecter';
$lang_module['closed_site_3'] = 'Fermeture du site - les administrateur peuvent se connecter';
$lang_module['pagetitle'] = 'Configuration tag "title"';
$lang_module['pagetitle2'] = 'Méthode d\'affichage de tag "title"';
$lang_module['pagetitleNote'] = '<strong>Variables acceptés:</strong><br /><br />- <strong>pagetitle</strong>: Titre de page pour des cas définis,<br />- <strong>funcname</strong>: Nom de la function,<br />- <strong>modulename</strong>: Nom de module,<br />- <strong>sitename</strong>: Nom du site';
$lang_module['func_name_not_exist'] = 'Cette fonction n\'existe pas';
$lang_module['robots'] = 'Config. de robots.txt';
$lang_module['robots_number'] = 'Ordre';
$lang_module['robots_filename'] = 'Nom du fichier';
$lang_module['robots_type'] = 'Mode';
$lang_module['robots_type_0'] = 'Accès interdit';
$lang_module['robots_type_1'] = 'Ne pas afficher dans le fichier robots.txt';
$lang_module['robots_error_writable'] = 'Erreur: impossible d\'enregistrer le fichier robots.txt, veuillez créer un fichier robots.txt avec le contenu ci-dessous et mettre dans la répertoire parente du site';
$lang_module['lang_geo'] = 'Activer la définition de langue selon pays';
$lang_module['lang_geo_config'] = 'Configuration de la fonctionnalité de définir la langue selon pays';
$lang_module['searchEngineUniqueID'] = 'ID de moteur de recherche Google<br />(forma 000329275761967753447:sr7yxqgv294 , <a href="http://nukeviet.vn/vi/faq/Su-dung-Google-Custom-Search-tren-NukeViet/" target="_blank">voir détails</a>)';
$lang_module['timezoneAuto'] = 'Selon l\'ordinateur du visiteur';
$lang_module['banip_error_write'] = 'Erreur: Vous n\'avez pas donné au système le droit de modifier les fichiers. Merci de CHMOD le dossier <strong>%s</strong> à 0777 ou "Changer la permission" pour que le système puisse modifier les fichiers, sinon, créer un fichier banip.php avec le contenu ci-dessous et mettre dans le dossier <strong>%s</strong>';
$lang_module['timezoneByCountry'] = 'Selon le pays du visiteur';
$lang_module['global_statistics'] = 'Config. de Statistiques';
$lang_module['statistics_timezone'] = 'Fuseau horaire pour les statistiques';
$lang_module['captcha_type'] = 'Type de captcha';
$lang_module['captcha_type_0'] = 'Défaut captcha';
$lang_module['captcha_type_1'] = 'Cool php captcha';
$lang_module['allow_switch_mobi_des'] = 'Échange possible de thème de mobile et de bureau';
$lang_module['ftp_auto_detect_root'] = 'Détection automatique';
$lang_module['ftp_error_full'] = 'Rentrer complètement les infos pour détecter automatiquement Remote path';
$lang_module['ftp_error_detect_root'] = 'Il est impossible de déterminer, merci de vérifier l\'identifiant et le mot de passe';
$lang_module['ftp_error_support'] = 'Votre hébergeur a bloqué FTP, veuillez leur contacter pour l\'activer';
$lang_module['smtp_error_openssl'] = 'Erreur: Voitre serveur ne supporte pas d\'envoyer les e mails par ssl';

?>