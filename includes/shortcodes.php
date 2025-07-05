<?php
if (!defined('ABSPATH')) {
    exit;
}

// autres fonctions shortcode
require_once plugin_dir_path(__FILE__) . 'functions.php';

function wpcontentvariables_register_shortcodes() {
    $variables = array(

        'annee' => 'wpcontentvariables_annee_shortcode',
        'mois' => 'wpcontentvariables_mois_shortcode',
        'jour' => 'wpcontentvariables_jour_shortcode',
        'heure' => 'wpcontentvariables_heure_shortcode',
        'minute' => 'wpcontentvariables_minute_shortcode',
        'seconde' => 'wpcontentvariables_seconde_shortcode',
        'mois_num' => 'wpcontentvariables_mois_num_shortcode',
        'jour_semaine' => 'wpcontentvariables_jour_semaine_shortcode',
        'jour_annee' => 'wpcontentvariables_jour_annee_shortcode',
      
        'titre_article' => 'wpcontentvariables_titre_article_shortcode',
        'slug_article' => 'wpcontentvariables_slug_article_shortcode',
        'date_publication' => 'wpcontentvariables_date_publication_shortcode',
        'date_modification' => 'wpcontentvariables_date_modification_shortcode',
        'categorie' => 'wpcontentvariables_categorie_shortcode',
        'categorie_avec_lien' => 'wpcontentvariables_categorie_avec_lien_shortcode',
        'categorie_ids' => 'wpcontentvariables_categorie_ids_shortcode',
        'tags' => 'wpcontentvariables_tags_shortcode',
        'url_site' => 'wpcontentvariables_url_site_shortcode',
        'url_page' => 'wpcontentvariables_url_page_shortcode',
        'extrait' => 'wpcontentvariables_excerpt_shortcode',
        'auteur' => 'wpcontentvariables_auteur_shortcode',

        
        'nbr_commentaires' => 'wpcontentvariables_nbr_commentaires_shortcode',
        'nbr_mots' => 'wpcontentvariables_nbr_mots_shortcode',


                'email' => 'wpcontentvariables_email_shortcode',
        'nom' => 'wpcontentvariables_nom_shortcode',
        'prenom' => 'wpcontentvariables_prenom_shortcode',
        'pseudo' => 'wpcontentvariables_pseudo_shortcode',
        'date_inscription' => 'wpcontentvariables_date_inscription_shortcode',
        'image' => 'wpcontentvariables_image_shortcode',
        'image_url' => 'wpcontentvariables_image_url_shortcode',
       
        'role' => 'wpcontentvariables_role_shortcode',
        'user_url' => 'wpcontentvariables_user_url_shortcode',
        
    );

    $enabled_shortcodes = get_option('wpcontentvariables_enabled_shortcodes', []);

    foreach ($variables as $shortcode => $function) {
        if (in_array($shortcode, $enabled_shortcodes)) {
            add_shortcode($shortcode, $function);
        }
    }
}

add_action('init', 'wpcontentvariables_register_shortcodes');