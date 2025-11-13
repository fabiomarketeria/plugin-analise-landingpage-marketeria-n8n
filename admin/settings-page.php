<?php
/**
 * Admin Settings Page
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Save settings message
$message = '';
if (isset($_GET['settings-updated'])) {
    $message = '<div class="notice notice-success is-dismissible"><p>' . __('Configurações salvas com sucesso!', 'marketeria-lp-analyzer') . '</p></div>';
}
?>

<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    
    <?php echo $message; ?>
    
    <div class="mlpa-admin-container">
        <div class="mlpa-admin-main">
            <form method="post" action="options.php">
                <?php
                settings_fields('mlpa_settings');
                do_settings_sections('mlpa_settings');
                ?>
                
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row">
                                <label for="mlpa_webhook_url"><?php _e('URL do Webhook n8n', 'marketeria-lp-analyzer'); ?></label>
                            </th>
                            <td>
                                <input 
                                    type="url" 
                                    id="mlpa_webhook_url" 
                                    name="mlpa_webhook_url" 
                                    value="<?php echo esc_url(get_option('mlpa_webhook_url')); ?>" 
                                    class="regular-text"
                                    placeholder="https://seu-servidor-n8n.com/webhook/..."
                                />
                                <p class="description">
                                    <?php _e('Cole aqui a URL do webhook do seu workflow n8n. Esta é a URL que o formulário chamará para processar as análises.', 'marketeria-lp-analyzer'); ?>
                                </p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="mlpa_form_title"><?php _e('Título do Formulário', 'marketeria-lp-analyzer'); ?></label>
                            </th>
                            <td>
                                <input 
                                    type="text" 
                                    id="mlpa_form_title" 
                                    name="mlpa_form_title" 
                                    value="<?php echo esc_attr(get_option('mlpa_form_title')); ?>" 
                                    class="regular-text"
                                />
                                <p class="description">
                                    <?php _e('Título exibido no topo do formulário de análise.', 'marketeria-lp-analyzer'); ?>
                                </p>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">
                                <label for="mlpa_form_description"><?php _e('Descrição do Formulário', 'marketeria-lp-analyzer'); ?></label>
                            </th>
                            <td>
                                <textarea 
                                    id="mlpa_form_description" 
                                    name="mlpa_form_description" 
                                    rows="3" 
                                    class="large-text"
                                ><?php echo esc_textarea(get_option('mlpa_form_description')); ?></textarea>
                                <p class="description">
                                    <?php _e('Descrição exibida abaixo do título do formulário.', 'marketeria-lp-analyzer'); ?>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <?php submit_button(__('Salvar Configurações', 'marketeria-lp-analyzer')); ?>
            </form>
        </div>
        
        <div class="mlpa-admin-sidebar">
            <div class="mlpa-admin-box">
                <h3><?php _e('Como Usar', 'marketeria-lp-analyzer'); ?></h3>
                <ol>
                    <li><?php _e('Configure a URL do webhook n8n acima', 'marketeria-lp-analyzer'); ?></li>
                    <li><?php _e('Adicione o shortcode em qualquer página:', 'marketeria-lp-analyzer'); ?>
                        <code style="display:block;padding:10px;background:#f5f5f5;margin:10px 0;">[marketeria_analyzer]</code>
                    </li>
                    <li><?php _e('Personalize o título e descrição se desejar', 'marketeria-lp-analyzer'); ?></li>
                </ol>
            </div>
            
            <div class="mlpa-admin-box">
                <h3><?php _e('Shortcode Personalizado', 'marketeria-lp-analyzer'); ?></h3>
                <p><?php _e('Você também pode personalizar o formulário usando atributos:', 'marketeria-lp-analyzer'); ?></p>
                <code style="display:block;padding:10px;background:#f5f5f5;margin:10px 0;word-break:break-all;">
                    [marketeria_analyzer title="Seu Título" description="Sua Descrição"]
                </code>
            </div>
            
            <div class="mlpa-admin-box">
                <h3><?php _e('Suporte', 'marketeria-lp-analyzer'); ?></h3>
                <p>
                    <strong><?php _e('Marketeria', 'marketeria-lp-analyzer'); ?></strong><br>
                    <a href="https://www.marketeria.net.br" target="_blank">www.marketeria.net.br</a><br>
                    <a href="mailto:fabio@marketeria.net.br">fabio@marketeria.net.br</a>
                </p>
            </div>
        </div>
    </div>
</div>

<style>
.mlpa-admin-container {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.mlpa-admin-main {
    flex: 1;
}

.mlpa-admin-sidebar {
    width: 300px;
}

.mlpa-admin-box {
    background: #fff;
    border: 1px solid #ccd0d4;
    box-shadow: 0 1px 1px rgba(0,0,0,.04);
    padding: 20px;
    margin-bottom: 20px;
}

.mlpa-admin-box h3 {
    margin-top: 0;
    padding-top: 0;
}

.mlpa-admin-box ol {
    padding-left: 20px;
}

.mlpa-admin-box code {
    font-size: 13px;
}
</style>
