<?php
if (!defined('ABSPATH')) {
    exit;
}

function wpcontentvariables_register_settings() {
    // Sanitize and store the settings
    register_setting('wpcontentvariables_settings_group', 'wpcontentvariables_enabled_shortcodes', 'wpcontentvariables_sanitize_enabled_shortcodes');
}

function wpcontentvariables_sanitize_enabled_shortcodes($input) {
    if (!is_array($input)) {
        return [];
    }
    return array_map('sanitize_text_field', $input);
}

function wpcontentvariables_options_page() {
    $shortcodes = array(
        'email' => 'Email de l\'utilisateur',
        'nom' => 'Nom de l\'utilisateur',
        'prenom' => 'Prénom de l\'utilisateur',
        'pseudo' => 'Pseudo de l\'utilisateur',
        'date_inscription' => 'Date d\'inscription de l\'utilisateur',
        'image' => 'Image de l\'utilisateur',
        'image_url' => 'URL de l\'image de l\'utilisateur',
        
        'role' => 'Rôle de l\'utilisateur',
        'user_url' => 'URL du profil de l\'utilisateur',
        'annee' => 'Année actuelle',
        'mois' => 'Mois actuel',
        'jour' => 'Jour actuel',
        'heure' => 'Heure actuelle',
        'minute' => 'Minute actuelle',
        'seconde' => 'Seconde actuelle',
        'mois_num' => 'Mois actuel (numérique)',
        'jour_semaine' => 'Nom du jour de la semaine',
        'jour_annee' => 'Jour de l\'année',
      
        'titre_article' => 'Titre de l\'article',
        'slug_article' => 'Slug de l\'article',
        'date_publication' => 'Date de publication de l\'article',
        'date_modification' => 'Date de dernière modification de l\'article',
        'categorie' => 'Catégorie principale de l\'article (sans lien)',
        'categorie_avec_lien' => 'Catégorie principale de l\'article (avec lien)',
        'categorie_ids' => 'IDs des catégories de l\'article',
        'tags' => 'Tags de l\'article',
        'url_site' => 'URL du site',
        'url_page' => 'URL de la publication actuelle',
        'extrait' => 'Extrait de l\'article',
        'auteur' => 'Auteur de l\'article',

        'nbr_commentaires' => 'Nombre de commentaires de l\'article',
        'nbr_mots' => 'Nombre de mots dans le contenu de l\'article',

    );

    $enabled_shortcodes = get_option('wpcontentvariables_enabled_shortcodes', []);
    
    ?>
    <div class="wrap">
        <h1>WP Content Variables</h1>
        <p>Vous pouvez utiliser ces éléments dans le titre et le contenu de vos publications pour faire apparaître une donnée dynamique.</p>
        
        <form method="post" action="options.php">
            <?php settings_fields('wpcontentvariables_settings_group'); ?>
            <?php do_settings_sections('wpcontentvariables_settings_group'); ?>
            
            <?php foreach($shortcodes as $shortcode => $description): ?>
                <p>
                    <input type="checkbox" name="wpcontentvariables_enabled_shortcodes[]" value="<?php echo $shortcode; ?>" <?php if(in_array($shortcode, $enabled_shortcodes)) echo 'checked="checked"'; ?> />
                    <strong class="wpcontentvariables-shortcode" data-shortcode="[<?php echo esc_attr($shortcode); ?>]">[<?php echo esc_attr($shortcode); ?>]</strong> = <?php echo esc_html($description); ?>
                </p>
            <?php endforeach; ?>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function wpcontentvariables_add_admin_menu() {
    add_management_page('WP Content Variables', 'WP Content Variables', 'manage_options', 'wpcontentvariables', 'wpcontentvariables_options_page');
}

add_action('admin_menu', 'wpcontentvariables_add_admin_menu');
add_action('admin_init', 'wpcontentvariables_register_settings');