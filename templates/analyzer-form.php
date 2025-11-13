<?php
/**
 * Analyzer Form Template
 * 
 * Variables available:
 * $atts - Shortcode attributes with title and description
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="mlpa-analyzer-wrapper">
    <div class="mlpa-analyzer-container">
        <div class="mlpa-analyzer-header">
            <h2 class="mlpa-title"><?php echo esc_html($atts['title']); ?></h2>
            <p class="mlpa-description"><?php echo esc_html($atts['description']); ?></p>
        </div>
        
        <form id="mlpa-analyzer-form" class="mlpa-form">
            <div class="mlpa-form-group">
                <label for="mlpa-name" class="mlpa-label">
                    <?php _e('Seu Nome', 'marketeria-lp-analyzer'); ?>
                    <span class="mlpa-required">*</span>
                </label>
                <input 
                    type="text" 
                    id="mlpa-name" 
                    name="name" 
                    class="mlpa-input" 
                    placeholder="<?php _e('Como gostaria de ser chamado?', 'marketeria-lp-analyzer'); ?>"
                    required
                />
            </div>
            
            <div class="mlpa-form-group">
                <label for="mlpa-email" class="mlpa-label">
                    <?php _e('Seu Melhor Email', 'marketeria-lp-analyzer'); ?>
                    <span class="mlpa-required">*</span>
                </label>
                <input 
                    type="email" 
                    id="mlpa-email" 
                    name="email" 
                    class="mlpa-input" 
                    placeholder="<?php _e('seu@email.com', 'marketeria-lp-analyzer'); ?>"
                    required
                />
            </div>
            
            <div class="mlpa-form-group">
                <label for="mlpa-url" class="mlpa-label">
                    <?php _e('URL da Landing Page', 'marketeria-lp-analyzer'); ?>
                    <span class="mlpa-required">*</span>
                </label>
                <input 
                    type="url" 
                    id="mlpa-url" 
                    name="url" 
                    class="mlpa-input" 
                    placeholder="<?php _e('https://www.seusite.com.br', 'marketeria-lp-analyzer'); ?>"
                    required
                />
            </div>
            
            <div class="mlpa-form-group">
                <label for="mlpa-challenge" class="mlpa-label">
                    <?php _e('Qual seu maior desafio?', 'marketeria-lp-analyzer'); ?>
                </label>
                <select id="mlpa-challenge" name="challenge" class="mlpa-select">
                    <option value=""><?php _e('Selecione uma opção', 'marketeria-lp-analyzer'); ?></option>
                    <option value="Aumentar Leads"><?php _e('Aumentar Leads', 'marketeria-lp-analyzer'); ?></option>
                    <option value="Reduzir o Ciclo de Vendas"><?php _e('Reduzir o Ciclo de Vendas', 'marketeria-lp-analyzer'); ?></option>
                    <option value="Aumentar as Taxas de Conversão"><?php _e('Aumentar as Taxas de Conversão', 'marketeria-lp-analyzer'); ?></option>
                </select>
            </div>
            
            <div class="mlpa-form-actions">
                <button type="submit" class="mlpa-submit-btn">
                    <span class="mlpa-btn-text"><?php _e('Analisar Minha Landing Page', 'marketeria-lp-analyzer'); ?></span>
                    <span class="mlpa-btn-loader" style="display:none;">
                        <svg class="mlpa-spinner" viewBox="0 0 50 50">
                            <circle class="mlpa-spinner-path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                        </svg>
                    </span>
                </button>
            </div>
            
            <div id="mlpa-message" class="mlpa-message" style="display:none;"></div>
        </form>
        
        <!-- Progress Indicator -->
        <div id="mlpa-progress" class="mlpa-progress" style="display:none;">
            <div class="mlpa-progress-header">
                <h3><?php _e('🔍 Analisando sua Landing Page...', 'marketeria-lp-analyzer'); ?></h3>
                <p><?php _e('Isso pode levar alguns segundos', 'marketeria-lp-analyzer'); ?></p>
            </div>
            <div class="mlpa-progress-steps">
                <div class="mlpa-progress-step active">
                    <div class="mlpa-step-icon">
                        <svg class="mlpa-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <div class="mlpa-step-label"><?php _e('Dados Enviados', 'marketeria-lp-analyzer'); ?></div>
                </div>
                <div class="mlpa-progress-step processing">
                    <div class="mlpa-step-icon">
                        <svg class="mlpa-spinner-small" viewBox="0 0 50 50">
                            <circle class="mlpa-spinner-path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
                        </svg>
                    </div>
                    <div class="mlpa-step-label"><?php _e('Auditoria Técnica', 'marketeria-lp-analyzer'); ?></div>
                </div>
                <div class="mlpa-progress-step">
                    <div class="mlpa-step-icon">3</div>
                    <div class="mlpa-step-label"><?php _e('Análise de Conteúdo', 'marketeria-lp-analyzer'); ?></div>
                </div>
                <div class="mlpa-progress-step">
                    <div class="mlpa-step-icon">4</div>
                    <div class="mlpa-step-label"><?php _e('Enviando Relatório', 'marketeria-lp-analyzer'); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Success State -->
        <div id="mlpa-success" class="mlpa-success" style="display:none;">
            <div class="mlpa-success-icon">
                <svg viewBox="0 0 52 52">
                    <circle cx="26" cy="26" r="25" fill="none"/>
                    <path fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
            </div>
            <h3><?php _e('✅ Análise Enviada com Sucesso!', 'marketeria-lp-analyzer'); ?></h3>
            <p><?php _e('Você receberá os resultados da análise da sua landing page por email em breve.', 'marketeria-lp-analyzer'); ?></p>
            <div class="mlpa-success-details">
                <p><strong><?php _e('O que você vai receber:', 'marketeria-lp-analyzer'); ?></strong></p>
                <ul>
                    <li><?php _e('🔍 Análise técnica detalhada', 'marketeria-lp-analyzer'); ?></li>
                    <li><?php _e('📝 Análise de conteúdo e copywriting', 'marketeria-lp-analyzer'); ?></li>
                    <li><?php _e('💡 Recomendações acionáveis', 'marketeria-lp-analyzer'); ?></li>
                    <li><?php _e('🎯 Oportunidades de otimização', 'marketeria-lp-analyzer'); ?></li>
                </ul>
            </div>
        </div>
        
        <div class="mlpa-footer">
            <p class="mlpa-footer-text">
                <?php _e('Análise 100% gratuita • Sem compromisso • Resposta em minutos', 'marketeria-lp-analyzer'); ?>
            </p>
        </div>
    </div>
</div>
