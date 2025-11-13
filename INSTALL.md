# Guia Rápido de Instalação

## ⚡ Instalação em 5 Minutos

### Passo 1: Baixar o Plugin
Faça o download do plugin como arquivo ZIP ou clone o repositório.

### Passo 2: Instalar no WordPress

**Opção A - Via Painel Admin:**
1. Acesse: WordPress Admin → Plugins → Adicionar Novo
2. Clique em "Enviar Plugin"
3. Selecione o arquivo ZIP
4. Clique em "Instalar Agora"
5. Clique em "Ativar Plugin"

**Opção B - Via FTP:**
1. Extraia os arquivos do ZIP
2. Faça upload da pasta para `/wp-content/plugins/`
3. Vá em Plugins e ative "Marketeria Landing Page Analyzer"

### Passo 3: Configurar o Webhook

1. Vá em **Configurações → LP Analyzer**
2. Cole a URL do webhook do n8n:
   ```
   https://seu-servidor-n8n.com/webhook/afe067a5-4878-4c9d-b746-691f77190f54
   ```
3. Clique em "Salvar Configurações"

### Passo 4: Adicionar na Página

1. Edite ou crie uma página
2. Adicione o shortcode:
   ```
   [marketeria_analyzer]
   ```
3. Publique a página

### Passo 5: Testar

1. Acesse a página publicada
2. Preencha o formulário de teste
3. Verifique se o email foi recebido

## 🎯 Obtendo a URL do Webhook n8n

### No seu Workflow n8n:

1. Abra o workflow: **"Isca - Auditoria Técnica e de Conteúdo no site"**
2. Clique no nó **"Formulário de Captura"** (primeiro nó)
3. Na aba do nó, encontre o campo **"Webhook URL"**
4. Copie a URL completa (exemplo):
   ```
   https://n8n.seudominio.com/webhook/afe067a5-4878-4c9d-b746-691f77190f54
   ```
5. Cole essa URL nas configurações do plugin WordPress

### Testando a Conexão:

Você pode testar o webhook diretamente com curl:

```bash
curl -X POST https://seu-servidor-n8n.com/webhook/seu-webhook-id \
  -H "Content-Type: application/json" \
  -d '{
    "Seu Nome": "Teste",
    "Seu Melhor Email": "teste@exemplo.com",
    "URL da Landing Page": "https://exemplo.com",
    "Qual seu maior desafio?": "Aumentar Leads"
  }'
```

## 🎨 Personalização Rápida

### Customizar Título e Descrição

No shortcode:
```
[marketeria_analyzer 
  title="Análise Gratuita de Conversão" 
  description="Descubra como aumentar suas vendas"]
```

Ou nas Configurações do plugin.

### Customizar Cores

Edite `assets/css/frontend.css`:

```css
/* Linha 193 - Cor do botão */
background: linear-gradient(135deg, #SEU_COR1 0%, #SUA_COR2 100%);

/* Linha 207 - Sombra do botão */
box-shadow: 0 4px 15px rgba(SUA_COR_RGB, 0.4);
```

## 📋 Checklist de Instalação

- [ ] Plugin instalado e ativado
- [ ] URL do webhook configurada
- [ ] Workflow n8n está ativo
- [ ] Shortcode adicionado na página
- [ ] Teste realizado com sucesso
- [ ] Email de teste recebido
- [ ] Design verificado em mobile
- [ ] Formulário funciona corretamente

## 🔧 Solução Rápida de Problemas

### Problema: Formulário não aparece
**Solução:** 
- Verifique se o plugin está ativo
- Confirme que digitou `[marketeria_analyzer]` corretamente
- Limpe o cache do WordPress

### Problema: Erro ao enviar
**Solução:**
- Verifique a URL do webhook nas configurações
- Confirme que o workflow n8n está ativo
- Teste o webhook com curl (comando acima)

### Problema: Estilos quebrados
**Solução:**
- Limpe o cache do navegador (Ctrl+F5)
- Desative outros plugins temporariamente
- Verifique conflitos com tema

## 📞 Precisa de Ajuda?

**Suporte Marketeria:**
- 📧 Email: fabio@marketeria.net.br
- 🌐 Site: www.marketeria.net.br
- 📱 WhatsApp: [número do suporte]

## 🚀 Próximos Passos

Após instalar:

1. **Integre com suas Landing Pages**: Adicione o formulário em páginas estratégicas
2. **Personalize o Design**: Ajuste cores para combinar com sua marca
3. **Configure Analytics**: Adicione tracking para medir conversões
4. **Promova o Serviço**: Divulgue a análise gratuita nas redes sociais

---

**Pronto para começar! 🎉**

Em menos de 5 minutos você terá um formulário de análise profissional funcionando no seu site!
