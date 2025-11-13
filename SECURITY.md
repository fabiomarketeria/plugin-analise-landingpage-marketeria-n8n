# Segurança - Boas Práticas e Implementação

## 🔒 Visão Geral de Segurança

Este plugin implementa múltiplas camadas de segurança para proteger tanto o site WordPress quanto os dados dos usuários.

## ✅ Recursos de Segurança Implementados

### 1. Proteção Contra Acesso Direto

**Todos os arquivos PHP incluem:**
```php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
```

**O que protege:**
- Impede execução direta de arquivos PHP
- Só permite acesso via WordPress
- Previne revelação de estrutura de código

---

### 2. Validação de Nonce (CSRF Protection)

**No JavaScript:**
```javascript
nonce: wp_create_nonce('mlpa_nonce')
```

**No PHP:**
```php
check_ajax_referer('mlpa_nonce', 'nonce');
```

**O que protege:**
- Cross-Site Request Forgery (CSRF)
- Requisições não autorizadas
- Ataques de replay

**Como funciona:**
1. WordPress gera token único (nonce)
2. Token enviado em cada requisição AJAX
3. Servidor valida token antes de processar
4. Token expira em 24h

---

### 3. Sanitização de Inputs

**Implementado em todas as entradas:**
```php
$name = sanitize_text_field($_POST['name']);
$email = sanitize_email($_POST['email']);
$url = esc_url_raw($_POST['url']);
$challenge = sanitize_text_field($_POST['challenge']);
```

**Funções WordPress usadas:**
- `sanitize_text_field()`: Remove HTML e caracteres especiais
- `sanitize_email()`: Valida e limpa emails
- `esc_url_raw()`: Valida e sanitiza URLs
- `sanitize_textarea_field()`: Para textos maiores

**O que protege:**
- SQL Injection
- XSS (Cross-Site Scripting)
- Code Injection
- HTML Injection

---

### 4. Escape de Outputs

**Todas as saídas são escapadas:**
```php
echo esc_html($text);
echo esc_url($url);
echo esc_attr($attribute);
echo esc_textarea($content);
```

**Funções WordPress usadas:**
- `esc_html()`: Para conteúdo HTML
- `esc_url()`: Para URLs
- `esc_attr()`: Para atributos HTML
- `esc_textarea()`: Para textareas
- `wp_kses_post()`: Para conteúdo rich (quando necessário)

**O que protege:**
- XSS (Cross-Site Scripting)
- Injeção de código malicioso
- Manipulação de DOM

---

### 5. Validação de Permissões

**No painel admin:**
```php
if (!current_user_can('manage_options')) {
    return;
}
```

**O que protege:**
- Acesso não autorizado às configurações
- Modificação de configurações por usuários sem permissão
- Privilege escalation

**Requisitos:**
- Usuário deve estar logado
- Usuário deve ter capability 'manage_options'
- Geralmente = Administrator role

---

### 6. Validação Server-Side

**Sempre valida no servidor:**
```php
// Validação de campos obrigatórios
if (empty($name) || empty($email) || empty($url)) {
    wp_send_json_error(...);
}

// Validação de formato de email
if (!is_email($email)) {
    wp_send_json_error(...);
}
```

**O que protege:**
- Bypass de validação client-side
- Dados inválidos no sistema
- Injeção de dados malformados

**Nunca confiar apenas em validação JavaScript!**

---

### 7. Comunicação Segura

**Implementado:**
```php
// Timeout de 30 segundos
'timeout' => 30

// Headers seguros
'headers' => array(
    'Content-Type' => 'application/json'
)
```

**Recomendações:**
- ✅ Use HTTPS no site WordPress
- ✅ Use HTTPS no servidor n8n
- ✅ Configure SSL válido
- ✅ Force HTTPS no WordPress (wp-config.php):
  ```php
  define('FORCE_SSL_ADMIN', true);
  ```

---

### 8. Rate Limiting

**Não implementado no plugin, mas recomendado:**

Configure no servidor ou use plugin:
- WP Limit Login Attempts
- Wordfence Security
- iThemes Security

**Por que é importante:**
- Previne brute force
- Previne DDoS
- Previne spam de formulários

---

## 🚨 Vulnerabilidades Conhecidas

### Nenhuma Conhecida (v1.0.0)

O plugin foi desenvolvido seguindo WordPress Security Best Practices.

---

## 🛡️ Recomendações Adicionais

### 1. Configuração do WordPress

**wp-config.php:**
```php
// Desabilitar edição de arquivos
define('DISALLOW_FILE_EDIT', true);

// Desabilitar instalação de plugins
define('DISALLOW_FILE_MODS', true);

// Forçar SSL
define('FORCE_SSL_ADMIN', true);

// Limitar tentativas de login
// Use plugin específico
```

---

### 2. Servidor n8n

**Boas práticas:**
- ✅ Use HTTPS com certificado válido
- ✅ Configure firewall para permitir apenas IPs conhecidos
- ✅ Use autenticação em webhooks (se possível)
- ✅ Monitore logs de requisições
- ✅ Configure rate limiting no nginx/apache
- ✅ Mantenha n8n atualizado

**Exemplo nginx rate limiting:**
```nginx
limit_req_zone $binary_remote_addr zone=webhook:10m rate=10r/m;

location /webhook/ {
    limit_req zone=webhook burst=5;
    proxy_pass http://n8n:5678;
}
```

---

### 3. Proteção de Dados Sensíveis

**Webhook URL:**
- ❌ Não commite em código (use environment variables)
- ✅ Armazene no banco de dados WordPress (opção do plugin)
- ✅ Use .env ou wp-config.php para produção

**Credenciais n8n:**
- ❌ Nunca exponha credenciais de APIs
- ✅ Use credentials manager do n8n
- ✅ Rotacione credenciais periodicamente

---

### 4. Monitoramento e Logs

**WordPress:**
```php
// Ativar debug apenas em desenvolvimento
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);
define('WP_DEBUG_DISPLAY', false);
```

**n8n:**
- Configure logs de execução
- Monitore falhas
- Configure alertas para erros

**Recomendações:**
- Use plugin de segurança (Wordfence, Sucuri)
- Configure backups diários
- Monitore atividades suspeitas
- Configure alertas de segurança

---

### 5. Compliance (LGPD/GDPR)

**Obrigações:**
1. **Consentimento**
   - Adicione checkbox de consentimento (veja FAQ.md)
   - Link para política de privacidade
   - Termos de uso

2. **Transparência**
   - Informe quais dados são coletados
   - Explique como serão usados
   - Informe período de retenção

3. **Direitos do Titular**
   - Implementar direito de acesso
   - Implementar direito de exclusão
   - Implementar direito de portabilidade

**Exemplo de consentimento:**
```php
<div class="mlpa-form-group">
    <label>
        <input type="checkbox" name="consent" required>
        Li e aceito a 
        <a href="/politica-privacidade" target="_blank">
            Política de Privacidade
        </a>
        e 
        <a href="/termos-uso" target="_blank">
            Termos de Uso
        </a>
    </label>
</div>
```

---

### 6. Headers de Segurança

**Configure no servidor (nginx/apache):**

```nginx
# X-Frame-Options
add_header X-Frame-Options "SAMEORIGIN" always;

# X-Content-Type-Options
add_header X-Content-Type-Options "nosniff" always;

# X-XSS-Protection
add_header X-XSS-Protection "1; mode=block" always;

# Referrer-Policy
add_header Referrer-Policy "strict-origin-when-cross-origin" always;

# Content-Security-Policy
add_header Content-Security-Policy "default-src 'self' https:; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline';" always;
```

---

### 7. Anti-Spam

**Recomendações:**

**Opção 1: Google reCAPTCHA**
```html
<!-- Adicione antes do botão -->
<div class="g-recaptcha" 
     data-sitekey="YOUR_SITE_KEY">
</div>
```

**Opção 2: Honeypot**
```html
<!-- Campo invisível para bots -->
<input type="text" 
       name="website" 
       style="display:none" 
       tabindex="-1" 
       autocomplete="off">
```

```php
// Validação server-side
if (!empty($_POST['website'])) {
    // É um bot, rejeite
    wp_send_json_error('Spam detected');
}
```

**Opção 3: Time-based validation**
```javascript
// Timestamp quando formulário carregou
const formLoadTime = Date.now();

// No envio
const timeSpent = Date.now() - formLoadTime;

// Humanos levam pelo menos 5 segundos
if (timeSpent < 5000) {
    // Provavelmente bot
}
```

---

## 🔍 Auditoria de Segurança

### Checklist de Segurança

- [x] Proteção contra acesso direto
- [x] Validação de nonce (CSRF)
- [x] Sanitização de inputs
- [x] Escape de outputs
- [x] Validação de permissões
- [x] Validação server-side
- [x] Comunicação via HTTPS (recomendado)
- [ ] Rate limiting (recomendado adicionar)
- [ ] Anti-spam (recomendado adicionar)
- [ ] Logging de segurança (recomendado adicionar)

### Ferramentas de Auditoria

**Recomendadas:**

1. **WPScan**
   ```bash
   wpscan --url https://seusite.com --enumerate p
   ```

2. **Sucuri SiteCheck**
   - https://sitecheck.sucuri.net

3. **OWASP ZAP**
   - Scanner de vulnerabilidades

4. **Wordfence**
   - Plugin WordPress com scanner

---

## 📋 Procedimentos de Segurança

### Em Caso de Vulnerabilidade Descoberta

1. **Reporte imediatamente:**
   - Email: fabio@marketeria.net.br
   - Assunto: [SECURITY] Vulnerabilidade no Plugin

2. **Informe:**
   - Descrição detalhada
   - Passos para reproduzir
   - Impacto potencial
   - Sugestão de correção (se tiver)

3. **Não divulgue publicamente** até correção ser lançada

---

### Processo de Atualização de Segurança

1. Vulnerabilidade reportada
2. Equipe valida e confirma
3. Correção desenvolvida
4. Testes de segurança realizados
5. Versão corrigida lançada (PATCH)
6. Notificação aos usuários
7. Divulgação pública após 30 dias

---

## 🎯 Melhores Práticas para Usuários

### Para Administradores

1. **Mantenha atualizado:**
   - WordPress core
   - Todos os plugins
   - Tema
   - PHP

2. **Use senhas fortes:**
   - Mínimo 12 caracteres
   - Letras maiúsculas e minúsculas
   - Números e símbolos
   - Gerenciador de senhas

3. **Autenticação 2FA:**
   - Use plugin de 2FA
   - Google Authenticator
   - SMS (menos seguro)

4. **Backups regulares:**
   - Diário ou semanal
   - Armazene fora do servidor
   - Teste restauração periodicamente

5. **Monitore atividades:**
   - Instale plugin de segurança
   - Configure alertas
   - Revise logs regularmente

---

### Para Desenvolvedores

1. **Code Review:**
   - Revise todo código antes de commit
   - Use ferramentas de análise estática
   - Siga WordPress Coding Standards

2. **Teste de Segurança:**
   - Testes automatizados
   - Testes manuais de penetração
   - Use staging environment

3. **Documentação:**
   - Documente recursos de segurança
   - Mantenha changelog atualizado
   - Informe usuários sobre boas práticas

---

## 📚 Recursos Adicionais

**WordPress Security:**
- https://wordpress.org/support/article/hardening-wordpress/
- https://developer.wordpress.org/apis/security/

**OWASP:**
- https://owasp.org/www-project-top-ten/
- https://cheatsheetseries.owasp.org/

**Compliance:**
- LGPD: https://www.gov.br/cidadania/pt-br/acesso-a-informacao/lgpd
- GDPR: https://gdpr.eu/

---

## 🔐 Contato de Segurança

**Para reportar vulnerabilidades:**
- 📧 Email: fabio@marketeria.net.br
- 🔒 Assunto: [SECURITY] + descrição breve
- ⏱️ Resposta esperada: 48h úteis

**Desenvolvido com foco em segurança por Marketeria**  
www.marketeria.net.br
