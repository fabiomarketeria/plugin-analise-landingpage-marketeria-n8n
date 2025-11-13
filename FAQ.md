# Perguntas Frequentes (FAQ)

## 📌 Geral

### O que é o Marketeria Landing Page Analyzer?
É um plugin WordPress que integra um formulário de análise de landing pages ao seu site. Os visitantes preenchem o formulário e recebem uma análise técnica e de conteúdo por email, gerada por IA através de um workflow n8n.

### Como funciona?
1. Visitante preenche formulário no seu site
2. Plugin envia dados para workflow n8n via webhook
3. n8n analisa a landing page com IA (DeepSeek)
4. Usuário recebe análise detalhada por email
5. Lead é criado automaticamente no Odoo

### É gratuito?
O plugin é gratuito. Porém, você precisa:
- Ter um servidor n8n configurado
- Ter API do DeepSeek (ou outro modelo de IA)
- Ter conta Gmail configurada no n8n
- (Opcional) Ter Odoo para CRM

### Preciso saber programar?
Não! O plugin é plug-and-play:
1. Instale o plugin
2. Configure o webhook
3. Adicione o shortcode
4. Pronto!

## 🔧 Instalação e Configuração

### Como instalo o plugin?
Veja o arquivo [INSTALL.md](INSTALL.md) para guia completo de instalação em 5 minutos.

### Onde encontro a URL do webhook?
No seu workflow n8n:
1. Abra o workflow "Isca - Auditoria Técnica e de Conteúdo no site"
2. Clique no nó "Formulário de Captura"
3. Copie a "Webhook URL"
4. Cole nas configurações do plugin (Configurações → LP Analyzer)

### O plugin funciona sem n8n?
Não. O plugin foi desenvolvido especificamente para integrar com o workflow n8n fornecido. Sem o n8n configurado, o formulário não funcionará.

### Posso usar outro serviço de email além do Gmail?
Sim, mas você precisará modificar o workflow n8n para usar outro provedor de email.

### Onde está o arquivo de configuração?
Não há arquivo de configuração. Todas as configurações são feitas através do painel WordPress em **Configurações → LP Analyzer**.

## 🎨 Uso e Personalização

### Como adiciono o formulário na minha página?
Use o shortcode:
```
[marketeria_analyzer]
```

Em qualquer página, post ou widget.

### Posso personalizar o título e descrição?
Sim! De duas formas:

**Nas Configurações:**
Configurações → LP Analyzer → edite os campos

**No Shortcode:**
```
[marketeria_analyzer title="Seu Título" description="Sua Descrição"]
```

### Posso mudar as cores do formulário?
Sim! Edite o arquivo `assets/css/frontend.css`:

```css
/* Linha ~193 - Gradiente do botão */
background: linear-gradient(135deg, #SUA_COR1 0%, #SUA_COR2 100%);
```

Veja mais detalhes no [README.md](README.md) seção "Personalização".

### Posso adicionar/remover campos do formulário?
Sim, mas requer edição de código:

1. Edite `templates/analyzer-form.php` para adicionar campo HTML
2. Edite `assets/js/frontend.js` para incluir validação
3. Edite `marketeria-landing-page-analyzer.php` para processar o novo campo
4. Atualize o workflow n8n para receber o novo campo

**Recomendação:** Mantenha o formulário simples para maior taxa de conversão.

### Posso usar em múltiplas páginas?
Sim! Adicione o shortcode em quantas páginas quiser. Cada formulário funciona independentemente.

### O plugin funciona com meu tema?
Sim! O plugin é compatível com qualquer tema WordPress padrão. Os estilos são isolados para não conflitar com seu tema.

### Funciona com page builders?
Sim! Testado com:
- ✅ Elementor
- ✅ Divi
- ✅ Beaver Builder
- ✅ WPBakery
- ✅ Gutenberg (Editor de blocos)

Veja exemplos em [EXAMPLES.md](EXAMPLES.md).

## 🔒 Segurança e Privacidade

### Os dados dos usuários são seguros?
Sim! O plugin implementa:
- Validação de nonce em requisições AJAX
- Sanitização de todos os inputs
- Escape de outputs
- Verificação de permissões
- HTTPS recomendado

### Onde os dados são armazenados?
- **WordPress:** Não armazena dados de formulários (apenas configurações)
- **n8n:** Processa e encaminha dados (não armazena por padrão)
- **Gmail:** Envia emails com análises
- **Odoo:** Armazena leads (se configurado)

### O plugin é compatível com LGPD/GDPR?
O plugin em si não coleta ou armazena dados pessoais. Porém, você deve:
1. Adicionar política de privacidade na sua página
2. Informar que dados serão enviados por email
3. Permitir opt-out se necessário
4. Ter base legal para processamento (ex: consentimento)

### Posso adicionar checkbox de consentimento?
Sim! Edite `templates/analyzer-form.php` e adicione:

```php
<div class="mlpa-form-group">
    <label>
        <input type="checkbox" name="consent" required>
        Li e aceito a <a href="/politica-privacidade">Política de Privacidade</a>
    </label>
</div>
```

## 🐛 Problemas Comuns

### O formulário não aparece na página
**Possíveis causas:**
1. Plugin não está ativado
2. Shortcode digitado incorretamente
3. Cache não foi limpo
4. Conflito com outro plugin

**Solução:**
1. Verifique em Plugins se está ativo
2. Confirme `[marketeria_analyzer]` está correto
3. Limpe cache do WordPress e navegador
4. Desative outros plugins temporariamente

### Erro "Webhook não configurado"
**Causa:** URL do webhook não foi configurada

**Solução:**
1. Vá em Configurações → LP Analyzer
2. Cole a URL do webhook do n8n
3. Salve as configurações

### Formulário enviado mas email não chega
**Possíveis causas:**
1. Workflow n8n não está ativo
2. Credenciais do Gmail no n8n expiradas
3. Email caiu na caixa de spam
4. URL do webhook incorreta

**Solução:**
1. Verifique se workflow está ativo no n8n
2. Reconecte conta Gmail no n8n
3. Verifique pasta de spam
4. Teste webhook com curl (veja INSTALL.md)

### Estilos CSS não aplicados
**Possíveis causas:**
1. Cache não limpo
2. Conflito com tema
3. Outro plugin CSS sobrescrevendo

**Solução:**
1. Limpe cache (Ctrl+F5 no navegador)
2. Verifique no inspetor de elementos
3. Aumente especificidade CSS se necessário

### Erro "Timeout" ao enviar
**Causa:** Requisição demorou mais de 60 segundos

**Solução:**
1. Verifique se servidor n8n está respondendo
2. Otimize workflow n8n (remova delays desnecessários)
3. Verifique conexão de internet

### Validação de email/URL não funciona
**Causa:** JavaScript não carregado ou conflito

**Solução:**
1. Verifique se jQuery está ativado
2. Verifique console do navegador por erros
3. Desative outros plugins JavaScript

## ⚙️ Workflow n8n

### Preciso ter o workflow exato do repositório?
Sim, para compatibilidade total. O plugin envia dados em formato específico que o workflow espera.

### Posso modificar o workflow?
Sim! Mas certifique-se de:
1. Manter o nó "formTrigger" recebendo os mesmos campos
2. Testar após modificações
3. Atualizar plugin se mudar campos

### Como ativo o workflow?
No n8n:
1. Abra o workflow
2. Clique em "Active" no canto superior direito
3. Aguarde ativar (ícone verde)

### O workflow funciona com outro modelo além do DeepSeek?
Sim! Você pode substituir por:
- OpenAI GPT-3.5/4
- Anthropic Claude
- Google Gemini
- Qualquer outro modelo compatível com n8n

Apenas substitua o nó do modelo no workflow.

### Posso usar workflow autohosted ou na nuvem?
Ambos funcionam! Apenas certifique-se de que:
- Webhook está acessível publicamente
- HTTPS está configurado (recomendado)
- Firewall permite requisições do WordPress

## 📊 Performance e Otimização

### O plugin deixa o site lento?
Não! O plugin é leve:
- CSS: ~7KB
- JavaScript: ~7KB
- Zero dependências externas (usa jQuery do WordPress)
- Carregamento assíncrono

### Funciona com cache plugins?
Sim! Compatível com:
- WP Super Cache
- W3 Total Cache
- WP Rocket
- LiteSpeed Cache

Certifique-se de limpar cache após configurar.

### Quantas requisições posso processar?
Depende da capacidade do seu servidor n8n. O plugin não limita requisições.

### Posso adicionar reCAPTCHA?
Não está incluído, mas você pode adicionar:

1. Instale plugin de reCAPTCHA
2. Adicione reCAPTCHA ao formulário
3. Valide no handler AJAX antes de enviar ao webhook

## 🌐 Compatibilidade

### WordPress
- ✅ WordPress 5.8+
- ✅ WordPress 6.x
- ✅ Multisite (testado)

### PHP
- ✅ PHP 7.4
- ✅ PHP 8.0
- ✅ PHP 8.1
- ✅ PHP 8.2

### Navegadores
- ✅ Chrome (últimas 2 versões)
- ✅ Firefox (últimas 2 versões)
- ✅ Safari (últimas 2 versões)
- ✅ Edge (últimas 2 versões)
- ⚠️ IE11 (funciona mas sem animações)

### Dispositivos
- ✅ Desktop
- ✅ Tablets
- ✅ Smartphones (iOS/Android)

## 📞 Suporte

### Onde consigo ajuda?
- 📧 Email: fabio@marketeria.net.br
- 🌐 Site: www.marketeria.net.br
- 📝 Issues: GitHub do projeto

### Encontrei um bug, o que fazer?
1. Verifique se não está na lista de problemas conhecidos
2. Tente soluções do FAQ
3. Abra uma issue no GitHub com:
   - Versão do WordPress
   - Versão do PHP
   - Descrição do problema
   - Passos para reproduzir
   - Screenshots se possível

### Posso contratar suporte personalizado?
Sim! Entre em contato através do email fabio@marketeria.net.br para:
- Customizações específicas
- Integração com outros sistemas
- Suporte prioritário
- Desenvolvimento de features

### O plugin tem documentação técnica?
Sim! Veja:
- [README.md](README.md) - Documentação geral
- [INSTALL.md](INSTALL.md) - Guia de instalação
- [UX-IMPROVEMENTS.md](UX-IMPROVEMENTS.md) - Detalhes de UX
- [EXAMPLES.md](EXAMPLES.md) - Exemplos de uso
- [CHANGELOG.md](CHANGELOG.md) - Histórico de versões

## 🔄 Atualizações

### Como atualizo o plugin?
Atualmente é manual:
1. Baixe a nova versão
2. Desative o plugin antigo
3. Substitua os arquivos
4. Reative o plugin

**Futuro:** Sistema de atualização automática via repositório WordPress.

### Com que frequência há atualizações?
Seguimos semantic versioning:
- **Patches** (bug fixes): Conforme necessário
- **Minor** (features): Trimestralmente
- **Major** (breaking changes): Anualmente

### Minhas configurações são mantidas após atualização?
Sim! As configurações ficam no banco de dados do WordPress e não são afetadas por atualizações.

### Preciso atualizar o workflow n8n também?
Depende. Verificar CHANGELOG para mudanças que requerem atualização de workflow.

---

**Não encontrou sua resposta?**  
Entre em contato: fabio@marketeria.net.br

**Desenvolvido por Marketeria**  
www.marketeria.net.br
