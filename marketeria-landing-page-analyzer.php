<?php
/**
 * Plugin Name: Marketeria Landing Page Analyzer
 * Plugin URI: https://www.marketeria.net.br
 * Description: Incorpora o workflow de análise de landing pages da Marketeria em qualquer página WordPress através de shortcode. Oferece análise gratuita com auditoria técnica e de conteúdo.
 * Version: 1.0.0
 * Author: Marketeria
 * Author URI: https://www.marketeria.net.br
 * Text Domain: marketeria-lp-analyzer
 * Domain Path: /languages
 * Requires at least: 5.8
 * Requires PHP: 7.4
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin constants
define('MLPA_VERSION', '1.0.0');
define('MLPA_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MLPA_PLUGIN_URL', plugin_dir_url(__FILE__));
define('MLPA_PLUGIN_BASENAME', plugin_basename(__FILE__));

/**
 * Main Plugin Class
 */
class Marketeria_LP_Analyzer {
    
    /**
     * Instance of this class
     */
    private static $instance = null;
    
    /**
     * Get the singleton instance
     */
    public static function get_instance() {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     */
    private function __construct() {
        $this->init_hooks();
    }
    
    /**
     * Initialize WordPress hooks
     */
    private function init_hooks() {
        // Activation and deactivation hooks
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
        
        // Admin hooks
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
        
        // Frontend hooks
        add_action('wp_enqueue_scripts', array($this, 'enqueue_frontend_assets'));
        add_shortcode('marketeria_analyzer', array($this, 'render_analyzer_form'));
        
        // AJAX hooks
        add_action('wp_ajax_mlpa_submit_analysis', array($this, 'handle_form_submission'));
        add_action('wp_ajax_nopriv_mlpa_submit_analysis', array($this, 'handle_form_submission'));
    }
    
    /**
     * Plugin activation
     */
    public function activate() {
        // Set default options
        if (!get_option('mlpa_webhook_url')) {
            add_option('mlpa_webhook_url', '');
        }
        if (!get_option('mlpa_form_title')) {
            add_option('mlpa_form_title', 'Análise Gratuita da Sua Landing Page');
        }
        if (!get_option('mlpa_form_description')) {
            add_option('mlpa_form_description', 'Descubra os 3 Maiores Problemas que Impedem sua Página de Converter');
        }
    }
    
    /**
     * Plugin deactivation
     */
    public function deactivate() {
        // Cleanup if needed
    }
    
    /**
     * Add admin menu
     */
    public function add_admin_menu() {
        add_options_page(
            'Marketeria Landing Page Analyzer',
            'LP Analyzer',
            'manage_options',
            'marketeria-lp-analyzer',
            array($this, 'render_admin_page')
        );
    }
    
    /**
     * Register plugin settings
     */
    public function register_settings() {
        register_setting('mlpa_settings', 'mlpa_webhook_url', array(
            'type' => 'string',
            'sanitize_callback' => 'esc_url_raw',
            'default' => ''
        ));
        
        register_setting('mlpa_settings', 'mlpa_form_title', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 'Análise Gratuita da Sua Landing Page'
        ));
        
        register_setting('mlpa_settings', 'mlpa_form_description', array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_textarea_field',
            'default' => 'Descubra os 3 Maiores Problemas que Impedem sua Página de Converter'
        ));
    }
    
    /**
     * Render admin settings page
     */
    public function render_admin_page() {
        if (!current_user_can('manage_options')) {
            return;
        }
        
        include MLPA_PLUGIN_DIR . 'admin/settings-page.php';
    }
    
    /**
     * Enqueue frontend assets
     */
    public function enqueue_frontend_assets() {
        // Enqueue CSS
        wp_enqueue_style(
            'mlpa-frontend-style',
            MLPA_PLUGIN_URL . 'assets/css/frontend.css',
            array(),
            MLPA_VERSION
        );
        
        // Enqueue JavaScript
        wp_enqueue_script(
            'mlpa-frontend-script',
            MLPA_PLUGIN_URL . 'assets/js/frontend.js',
            array('jquery'),
            MLPA_VERSION,
            true
        );
        
        // Localize script with AJAX URL and nonce
        wp_localize_script('mlpa-frontend-script', 'mlpaData', array(
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('mlpa_nonce'),
            'messages' => array(
                'processing' => __('Analisando sua landing page...', 'marketeria-lp-analyzer'),
                'success' => __('Análise enviada com sucesso! Verifique seu email.', 'marketeria-lp-analyzer'),
                'error' => __('Erro ao enviar análise. Tente novamente.', 'marketeria-lp-analyzer'),
                'invalidUrl' => __('Por favor, insira uma URL válida.', 'marketeria-lp-analyzer'),
                'requiredFields' => __('Por favor, preencha todos os campos obrigatórios.', 'marketeria-lp-analyzer')
            )
        ));
    }
    
    /**
     * Render analyzer form shortcode
     */
    public function render_analyzer_form($atts) {
        $atts = shortcode_atts(array(
            'title' => get_option('mlpa_form_title'),
            'description' => get_option('mlpa_form_description')
        ), $atts, 'marketeria_analyzer');
        
        ob_start();
        include MLPA_PLUGIN_DIR . 'templates/analyzer-form.php';
        return ob_get_clean();
    }
    
    /**
     * Handle AJAX form submission
     */
    public function handle_form_submission() {
        // Verify nonce
        check_ajax_referer('mlpa_nonce', 'nonce');
        
        // Validate and sanitize input
        $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
        $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
        $url = isset($_POST['url']) ? esc_url_raw($_POST['url']) : '';
        $challenge = isset($_POST['challenge']) ? sanitize_text_field($_POST['challenge']) : '';
        
        // Validate required fields
        if (empty($name) || empty($email) || empty($url)) {
            wp_send_json_error(array(
                'message' => __('Por favor, preencha todos os campos obrigatórios.', 'marketeria-lp-analyzer')
            ));
        }
        
        // Validate email
        if (!is_email($email)) {
            wp_send_json_error(array(
                'message' => __('Por favor, insira um email válido.', 'marketeria-lp-analyzer')
            ));
        }
        
        // Get webhook URL
        $webhook_url = get_option('mlpa_webhook_url');
        if (empty($webhook_url)) {
            wp_send_json_error(array(
                'message' => __('Webhook não configurado. Entre em contato com o administrador.', 'marketeria-lp-analyzer')
            ));
        }
        
        // Prepare data for n8n webhook
        $webhook_data = array(
            'Seu Nome' => $name,
            'Seu Melhor Email' => $email,
            'URL da Landing Page' => $url,
            'Qual seu maior desafio?' => $challenge
        );
        
        // Send to n8n webhook
        $response = wp_remote_post($webhook_url, array(
            'method' => 'POST',
            'headers' => array(
                'Content-Type' => 'application/json'
            ),
            'body' => wp_json_encode($webhook_data),
            'timeout' => 30
        ));
        
        // Check for errors
        if (is_wp_error($response)) {
            wp_send_json_error(array(
                'message' => __('Erro ao conectar com o serviço. Tente novamente.', 'marketeria-lp-analyzer')
            ));
        }
        
        $response_code = wp_remote_retrieve_response_code($response);
        
        if ($response_code >= 200 && $response_code < 300) {
            // Success
            wp_send_json_success(array(
                'message' => __('Análise enviada com sucesso! Você receberá os resultados por email em breve.', 'marketeria-lp-analyzer')
            ));
        } else {
            // Error
            wp_send_json_error(array(
                'message' => __('Erro ao processar análise. Tente novamente.', 'marketeria-lp-analyzer')
            ));
        }
    }
}

// Initialize the plugin
Marketeria_LP_Analyzer::get_instance();
