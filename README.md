# Marketeria Landing Page Analyzer - Plugin WordPress

Plugin WordPress que incorpora o workflow de análise de landing pages da Marketeria, oferecendo análises técnicas e de conteúdo gratuitas através de um formulário moderno e responsivo.

## 🎯 Funcionalidades

- ✅ Formulário responsivo e moderno com validação em tempo real
- ✅ Integração completa com workflow n8n
- ✅ Indicadores de progresso para melhor experiência do usuário
- ✅ Animações suaves e feedback visual
- ✅ Configuração simples através do painel do WordPress
- ✅ Shortcode flexível para uso em qualquer página
- ✅ Validação de email e URL
- ✅ Estados de loading e sucesso
- ✅ 100% traduzível (i18n ready)

## 📋 Requisitos

- WordPress 5.8 ou superior
- PHP 7.4 ou superior
- jQuery (incluído no WordPress)
- Workflow n8n configurado e ativo

## 🚀 Instalação

### Método 1: Upload Manual

1. Baixe o plugin como arquivo ZIP
2. No painel do WordPress, vá em **Plugins > Adicionar Novo**
3. Clique em **Enviar Plugin**
4. Selecione o arquivo ZIP e clique em **Instalar Agora**
5. Após a instalação, clique em **Ativar Plugin**

### Método 2: FTP

1. Descompacte o arquivo ZIP
2. Faça upload da pasta `marketeria-landing-page-analyzer` para `/wp-content/plugins/`
3. Ative o plugin através do menu **Plugins** no WordPress

## ⚙️ Configuração

1. Após ativar o plugin, vá em **Configurações > LP Analyzer**
2. Configure os seguintes campos:
   - **URL do Webhook n8n**: Cole a URL do webhook do seu workflow n8n
   - **Título do Formulário**: Personalize o título (opcional)
   - **Descrição do Formulário**: Personalize a descrição (opcional)
3. Clique em **Salvar Configurações**

### Obtendo a URL do Webhook n8n

1. Abra seu workflow n8n
2. Localize o nó "Formulário de Captura" (formTrigger)
3. Copie a URL do webhook gerada
4. Cole no campo correspondente nas configurações do plugin

## 📝 Como Usar

### Uso Básico

Adicione o shortcode em qualquer página, post ou widget:

```
[marketeria_analyzer]
```

### Uso Avançado com Atributos

Personalize o título e descrição diretamente no shortcode:

```
[marketeria_analyzer title="Seu Título Personalizado" description="Sua descrição personalizada"]
```

### Exemplo em Editor de Blocos (Gutenberg)

1. Adicione um bloco de **Shortcode**
2. Insira: `[marketeria_analyzer]`
3. Publique ou atualize a página

### Exemplo em Editor Clássico

1. No editor de texto, insira: `[marketeria_analyzer]`
2. Publique ou atualize a página

## 🎨 Melhorias de UX Implementadas

### 1. Design Moderno e Responsivo
- Interface limpa e profissional
- Totalmente responsivo para mobile, tablet e desktop
- Gradientes e sombras modernas
- Animações suaves

### 2. Validação em Tempo Real
- Validação de email ao sair do campo
- Auto-completar https:// em URLs
- Feedback visual instantâneo
- Mensagens de erro claras

### 3. Indicadores de Progresso
- Estados de loading animados
- Progresso em 4 etapas:
  1. Dados Enviados ✓
  2. Auditoria Técnica 🔄
  3. Análise de Conteúdo
  4. Enviando Relatório
- Spinners animados

### 4. Estado de Sucesso
- Animação de checkmark
- Informações sobre o que será recebido
- Lista de benefícios
- Design celebratório

### 5. Mensagens de Feedback
- Mensagens de sucesso destacadas
- Erros claros e acionáveis
- Estados de timeout tratados
- Scroll automático para mensagens

## 🔧 Estrutura de Arquivos

```
marketeria-landing-page-analyzer/
├── marketeria-landing-page-analyzer.php  # Arquivo principal do plugin
├── admin/
│   └── settings-page.php                 # Página de configurações
├── templates/
│   └── analyzer-form.php                 # Template do formulário
├── assets/
│   ├── css/
│   │   └── frontend.css                  # Estilos do frontend
│   └── js/
│       └── frontend.js                   # JavaScript do frontend
└── README.md                             # Este arquivo
```

## 🔌 Integração com n8n

O plugin envia os dados para o webhook n8n no seguinte formato JSON:

```json
{
  "Seu Nome": "Nome do usuário",
  "Seu Melhor Email": "email@exemplo.com",
  "URL da Landing Page": "https://exemplo.com",
  "Qual seu maior desafio?": "Aumentar Leads"
}
```

Certifique-se de que seu workflow n8n está configurado para receber esses campos.

## 🎯 Campos do Formulário

1. **Seu Nome** (obrigatório)
   - Campo de texto simples
   - Placeholder: "Como gostaria de ser chamado?"

2. **Seu Melhor Email** (obrigatório)
   - Validação de formato de email
   - Placeholder: "seu@email.com"

3. **URL da Landing Page** (obrigatório)
   - Validação de URL
   - Auto-adiciona https:// se necessário
   - Placeholder: "https://www.seusite.com.br"

4. **Qual seu maior desafio?** (opcional)
   - Dropdown com opções:
     - Aumentar Leads
     - Reduzir o Ciclo de Vendas
     - Aumentar as Taxas de Conversão

## 🎨 Personalização

### Customizar Cores

Edite o arquivo `assets/css/frontend.css` e modifique as variáveis de cor:

```css
/* Botão principal */
background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);

/* Cores de sucesso */
color: #27ae60;

/* Cores de erro */
color: #e74c3c;
```

### Customizar Mensagens

As mensagens podem ser traduzidas ou modificadas editando os arquivos:
- `marketeria-landing-page-analyzer.php`
- `templates/analyzer-form.php`

## 🌐 Suporte a Tradução

O plugin está preparado para tradução com o text domain `marketeria-lp-analyzer`.

Para traduzir:
1. Use ferramentas como Poedit ou Loco Translate
2. Traduza as strings do domínio `marketeria-lp-analyzer`
3. Salve os arquivos de tradução em `/wp-content/languages/plugins/`

## 📱 Compatibilidade

- ✅ WordPress 5.8+
- ✅ PHP 7.4+
- ✅ Navegadores modernos (Chrome, Firefox, Safari, Edge)
- ✅ Dispositivos móveis (iOS, Android)
- ✅ Tablets
- ✅ Desktop

## 🐛 Resolução de Problemas

### O formulário não aparece
- Verifique se o plugin está ativado
- Confirme que o shortcode está digitado corretamente
- Limpe o cache do WordPress/servidor

### Erro ao enviar análise
- Verifique a URL do webhook nas configurações
- Confirme que o workflow n8n está ativo
- Verifique os logs de erro do WordPress

### Webhook não recebe dados
- Confirme que a URL do webhook está correta
- Verifique se o n8n está acessível publicamente
- Teste o webhook diretamente com Postman/curl

### Estilos não aplicados
- Limpe o cache do navegador
- Verifique conflitos com outros plugins
- Desative temporariamente outros plugins de CSS

## 🔒 Segurança

- ✅ Validação de nonce em requisições AJAX
- ✅ Sanitização de todos os inputs
- ✅ Escape de outputs
- ✅ Verificação de permissões no admin
- ✅ Proteção contra acesso direto aos arquivos

## 📊 Performance

- CSS e JS minificados (recomendado para produção)
- Carregamento assíncrono de scripts
- Cache de configurações
- Requisições otimizadas

## 🔄 Atualizações Futuras

Sugestões de melhorias para versões futuras:

1. **Analytics Dashboard**
   - Visualizar número de análises solicitadas
   - Taxa de conversão
   - Gráficos de uso

2. **Integração com Google Analytics**
   - Tracking de eventos
   - Conversões personalizadas

3. **Multi-idioma**
   - Detecção automática de idioma
   - Arquivos de tradução pré-configurados

4. **Captcha/Anti-spam**
   - Integração com Google reCAPTCHA
   - Honeypot fields

5. **Notificações por Email**
   - Alertas para administradores
   - Confirmação automática

## 💡 Sugestões de Uso

### Landing Pages
Ideal para páginas de captura de leads oferecendo análise gratuita.

### Páginas de Serviço
Adicione em páginas de serviços de marketing digital.

### Blog Posts
Incorpore em artigos relacionados a otimização de conversão.

### Popups/Modais
Use em conjunto com plugins de popup para maior visibilidade.

## 📞 Suporte

**Marketeria**
- Website: [www.marketeria.net.br](https://www.marketeria.net.br)
- Email: fabio@marketeria.net.br

## 📄 Licença

GPL v2 or later - https://www.gnu.org/licenses/gpl-2.0.html

## 🙏 Créditos

Desenvolvido por [Marketeria](https://www.marketeria.net.br)

---

**Versão:** 1.0.0  
**Última Atualização:** 2024
