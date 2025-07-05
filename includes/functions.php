<?php 

if (!defined('ABSPATH')){exit;}



function is_shortcode_enabled($shortcode) {
    $enabled_shortcodes = get_option('wpcontentvariables_enabled_shortcodes', []);
    return in_array($shortcode, $enabled_shortcodes);
}

// fonctions vérifiant l'état des shortcodes avant de les exécuter
function wpcontentvariables_email_shortcode() {
    if (is_shortcode_enabled('email')) {
        return is_user_logged_in() ? wp_get_current_user()->user_email : '';
    }
    return '';
}

function wpcontentvariables_nom_shortcode() {
    if (is_shortcode_enabled('nom')) {
        return is_user_logged_in() ? wp_get_current_user()->last_name : '';
    }
    return '';
}

function wpcontentvariables_prenom_shortcode() {
    if (is_shortcode_enabled('prenom')) {
        return is_user_logged_in() ? wp_get_current_user()->first_name : '';
    }
    return '';
}

function wpcontentvariables_pseudo_shortcode() {
    if (is_shortcode_enabled('pseudo')) {
        return is_user_logged_in() ? wp_get_current_user()->user_login : '';
    }
    return '';
}

function wpcontentvariables_date_inscription_shortcode() {
    if (is_shortcode_enabled('date_inscription')) {
        return is_user_logged_in() ? date_i18n(get_option('date_format'), strtotime(wp_get_current_user()->user_registered)) : '';
    }
    return '';
}

function wpcontentvariables_image_shortcode() {
    if (is_shortcode_enabled('image')) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $avatar = get_avatar($current_user->ID, 96);
            return $avatar;
        }
    }
    return '';
}

function wpcontentvariables_image_url_shortcode() {
    if (is_shortcode_enabled('image_url')) {
        if (is_user_logged_in()) {
            $current_user = wp_get_current_user();
            $avatar_url = get_avatar_url($current_user->ID, array('size' => 96));
            return $avatar_url;
        }
    }
    return '';
}



function wpcontentvariables_role_shortcode() {
    if (is_shortcode_enabled('role')) {
        $user = wp_get_current_user();
        return is_user_logged_in() ? implode(', ', $user->roles) : '';
    }
    return '';
}

function wpcontentvariables_user_url_shortcode() {
    if (is_shortcode_enabled('user_url')) {
        return is_user_logged_in() ? wp_get_current_user()->user_url : '';
    }
    return '';
}

function wpcontentvariables_annee_shortcode() {
    if (is_shortcode_enabled('annee')) {
        return date_i18n('Y');
    }
    return '';
}

function wpcontentvariables_mois_shortcode() {
    if (is_shortcode_enabled('mois')) {
        return date_i18n('F');
    }
    return '';
}

function wpcontentvariables_jour_shortcode() {
    if (is_shortcode_enabled('jour')) {
        return date_i18n('d');
    }
    return '';
}

function wpcontentvariables_heure_shortcode() {
    if (is_shortcode_enabled('heure')) {
        return date_i18n('H');
    }
    return '';
}

function wpcontentvariables_minute_shortcode() {
    if (is_shortcode_enabled('minute')) {
        return date_i18n('i');
    }
    return '';
}

function wpcontentvariables_seconde_shortcode() {
    if (is_shortcode_enabled('seconde')) {
        return date_i18n('s');
    }
    return '';
}

function wpcontentvariables_mois_num_shortcode() {
    if (is_shortcode_enabled('mois_num')) {
        return date_i18n('m');
    }
    return '';
}

function wpcontentvariables_jour_semaine_shortcode() {
    if (is_shortcode_enabled('jour_semaine')) {
        return date_i18n('l');
    }
    return '';
}

function wpcontentvariables_jour_annee_shortcode() {
    if (is_shortcode_enabled('jour_annee')) {
        return date_i18n('z') + 1;  
    }
    return '';
}


function wpcontentvariables_titre_article_shortcode() {
    if (is_shortcode_enabled('titre_article')) {
        return is_singular() ? get_the_title() : '';
    }
    return '';
}

function wpcontentvariables_slug_article_shortcode() {
    if (is_shortcode_enabled('slug_article')) {
        global $post;
        return is_singular() ? $post->post_name : '';
    }
    return '';
}

function wpcontentvariables_date_publication_shortcode() {
    if (is_shortcode_enabled('date_publication')) {
        return is_singular() ? get_the_date() : '';
    }
    return '';
}

function wpcontentvariables_date_modification_shortcode() {
    if (is_shortcode_enabled('date_modification')) {
        return is_singular() ? get_the_modified_date() : '';
    }
    return '';
}

function wpcontentvariables_categorie_shortcode() {
    if (is_shortcode_enabled('categorie')) {
        if (is_singular()) {
            $category = get_the_category();
            return !empty($category) ? $category[0]->name : '';
        }
    }
    return '';
}

function wpcontentvariables_categorie_avec_lien_shortcode() {
    if (is_shortcode_enabled('categorie_avec_lien')) {
        return is_singular() ? get_the_category_list(', ') : '';
    }
    return '';
}

function wpcontentvariables_categorie_ids_shortcode() {
    if (is_shortcode_enabled('categorie_ids')) {
        if (is_singular()) {
            $categories = get_the_category();
            $cat_ids = array();
            foreach ($categories as $category) {
                $cat_ids[] = $category->term_id;
            }
            return implode(', ', $cat_ids);
        }
    }
    return '';
}

function wpcontentvariables_tags_shortcode() {
    if (is_shortcode_enabled('tags')) {
        return is_singular() ? get_the_tag_list('', ', ') : '';
    }
    return '';
}

function wpcontentvariables_url_site_shortcode() {
    if (is_shortcode_enabled('url_site')) {
        return get_site_url();
    }
    return '';
}

function wpcontentvariables_url_page_shortcode() {
    if (is_shortcode_enabled('url_page')) {
        return get_permalink();
    }
    return '';
}

function wpcontentvariables_excerpt_shortcode() {
    if (is_shortcode_enabled('extrait')) {
        return is_singular() ? get_the_excerpt() : '';
    }
    return '';
}

function wpcontentvariables_auteur_shortcode() {
    if (is_shortcode_enabled('auteur')) {
        return is_singular() ? get_the_author() : '';
    }
    return '';
}


function wpcontentvariables_nbr_commentaires_shortcode() {
    if (is_shortcode_enabled('nbr_commentaires')) {
        return is_singular() ? get_comments_number() : '';
    }
    return '';
}

function wpcontentvariables_nbr_mots_shortcode() {
    if (is_shortcode_enabled('nbr_mots')) {
        return is_singular() ? str_word_count(strip_tags(get_post_field('post_content', get_the_ID()))) : '';
    }
    return '';
}


// forcer affichage shortcode activé dans le titre
function wpcontentvariables_init_title_filter() {
    $enabled_shortcodes = get_option('wpcontentvariables_enabled_shortcodes', []);
    if (!empty($enabled_shortcodes)) {
        add_filter('the_title', 'do_shortcode');
    }
}
add_action('init', 'wpcontentvariables_init_title_filter');