# Capturas de Tela e Guia Visual

## 📸 Galeria de Imagens

Este documento descreve visualmente como o plugin aparece em diferentes estados e contextos.

## 🎨 Estados do Formulário

### 1. Estado Inicial (Formulário Vazio)

**Localização:** Quando o usuário acessa a página com o shortcode

**Elementos visíveis:**
- Título: "Análise Gratuita da Sua Landing Page"
- Descrição: "Descubra os 3 Maiores Problemas..."
- 4 campos de entrada:
  - Nome (obrigatório) *
  - Email (obrigatório) *
  - URL da Landing Page (obrigatório) *
  - Maior desafio (opcional, dropdown)
- Botão: "Analisar Minha Landing Page" (gradiente roxo/azul)
- Rodapé: "Análise 100% gratuita • Sem compromisso..."

**Design:**
```
┌─────────────────────────────────────────┐
│  🎯 Análise Gratuita da Sua Landing    │
│     Page                                │
│                                         │
│  Descubra os 3 Maiores Problemas que   │
│  Impedem sua Página de Converter        │
│                                         │
│  ┌───────────────────────────────────┐ │
│  │ Seu Nome *                        │ │
│  │ [Como gostaria de ser chamado?]   │ │
│  └───────────────────────────────────┘ │
│                                         │
│  ┌───────────────────────────────────┐ │
│  │ Seu Melhor Email *                │ │
│  │ [seu@email.com]                   │ │
│  └───────────────────────────────────┘ │
│                                         │
│  ┌───────────────────────────────────┐ │
│  │ URL da Landing Page *             │ │
│  │ [https://www.seusite.com.br]      │ │
│  └───────────────────────────────────┘ │
│                                         │
│  ┌───────────────────────────────────┐ │
│  │ Qual seu maior desafio?           │ │
│  │ [Selecione uma opção ▼]           │ │
│  └───────────────────────────────────┘ │
│                                         │
│  ┌───────────────────────────────────┐ │
│  │  Analisar Minha Landing Page      │ │
│  └───────────────────────────────────┘ │
│     [Botão gradiente roxo/azul]        │
│                                         │
│  Análise 100% gratuita • Sem          │
│  compromisso • Resposta em minutos     │
└─────────────────────────────────────────┘
```

---

### 2. Estado de Validação (Erro)

**Quando aparece:** Campo inválido perde o foco

**Elementos visíveis:**
- Campo com borda vermelha (#e74c3c)
- Mensagem de erro acima do botão

**Exemplo - Email Inválido:**
```
┌───────────────────────────────────┐
│ Seu Melhor Email *                │
│ [emailinvalido]                   │ ← Borda vermelha
└───────────────────────────────────┘

⚠️ Por favor, insira um email válido.
```

---

### 3. Estado de Loading (Processando)

**Quando aparece:** Após clicar no botão

**Elementos visíveis:**
- Formulário desaparece com fade out
- Aparece indicador de progresso
- 4 etapas visuais

**Design:**
```
┌─────────────────────────────────────────┐
│  🔍 Analisando sua Landing Page...      │
│  Isso pode levar alguns segundos        │
│                                         │
│  ┌─────┐  ┌─────┐  ┌─────┐  ┌─────┐  │
│  │  ✓  │  │  🔄 │  │  3  │  │  4  │  │
│  └─────┘  └─────┘  └─────┘  └─────┘  │
│   Dados    Audit.   Análise  Enviando │
│  Enviados  Técnica  Conteúdo Relatório│
│  [Verde]   [Azul]   [Cinza]  [Cinza]  │
└─────────────────────────────────────────┘

Etapa 1: ✓ Completa (verde)
Etapa 2: 🔄 Processando (azul, spinner)
Etapa 3: Aguardando (cinza)
Etapa 4: Aguardando (cinza)
```

**Animação:**
- Spinner rotativo na etapa atual
- Checkmark aparece quando etapa completa
- Transição suave entre etapas (2s cada)

---

### 4. Estado de Sucesso

**Quando aparece:** Após processamento bem-sucedido

**Elementos visíveis:**
- Ícone de sucesso animado (checkmark circular)
- Mensagem de confirmação
- Lista de benefícios

**Design:**
```
┌─────────────────────────────────────────┐
│              ┌───────┐                  │
│              │   ✓   │  ← Animado       │
│              └───────┘                  │
│         [Círculo verde]                 │
│                                         │
│  ✅ Análise Enviada com Sucesso!       │
│                                         │
│  Você receberá os resultados da        │
│  análise da sua landing page por       │
│  email em breve.                        │
│                                         │
│  ┌───────────────────────────────────┐ │
│  │ O que você vai receber:           │ │
│  │                                   │ │
│  │ 🔍 Análise técnica detalhada      │ │
│  │ 📝 Análise de conteúdo            │ │
│  │ 💡 Recomendações acionáveis       │ │
│  │ 🎯 Oportunidades de otimização    │ │
│  └───────────────────────────────────┘ │
└─────────────────────────────────────────┘
```

**Animação do Checkmark:**
1. Círculo verde desenha (0-0.6s)
2. Checkmark aparece (0.6-0.9s)
3. Pulsa suavemente

---

### 5. Estado de Erro

**Quando aparece:** Falha na comunicação

**Elementos visíveis:**
- Mensagem de erro em caixa vermelha
- Formulário visível novamente
- Botão reativado

**Design:**
```
┌─────────────────────────────────────────┐
│  ⚠️ Erro ao conectar com o serviço.    │
│     Tente novamente.                    │
│  [Fundo vermelho claro #f8d7da]         │
└─────────────────────────────────────────┘

[Formulário aparece novamente abaixo]
```

---

## 📱 Responsividade

### Desktop (>768px)
```
Largura máxima: 700px
Padding: 40px
Grid de progresso: 4 colunas
Fonte título: 32px
```

### Tablet (768px)
```
Largura: 100% - 40px
Padding: 30px
Grid de progresso: 4 colunas
Fonte título: 28px
```

### Mobile (<768px)
```
Largura: 100% - 40px
Padding: 30px 20px
Grid de progresso: 2 colunas
Fonte título: 26px
Touch targets: 44x44px
```

**Layout Mobile:**
```
┌───────────────────┐
│  Título (26px)    │
│                   │
│  Descrição        │
│                   │
│  ┌─────────────┐ │
│  │ Nome        │ │
│  └─────────────┘ │
│                   │
│  ┌─────────────┐ │
│  │ Email       │ │
│  └─────────────┘ │
│                   │
│  ┌─────────────┐ │
│  │ URL         │ │
│  └─────────────┘ │
│                   │
│  ┌─────────────┐ │
│  │ Desafio     │ │
│  └─────────────┘ │
│                   │
│  ┌─────────────┐ │
│  │   Botão     │ │
│  └─────────────┘ │
│  [Largura 100%] │
└───────────────────┘
```

---

## ⚙️ Painel Administrativo

**Localização:** WordPress Admin → Configurações → LP Analyzer

### Layout Principal

```
┌────────────────────────────────────────────────────────────┐
│  Marketeria Landing Page Analyzer                          │
├────────────────────────────────────────────────────────────┤
│                                                            │
│  ┌─────────────────────────┐  ┌─────────────────────────┐│
│  │ Configurações           │  │ Como Usar               ││
│  │                         │  │                         ││
│  │ URL do Webhook n8n *    │  │ 1. Configure URL        ││
│  │ [___________________]   │  │ 2. Adicione shortcode:  ││
│  │                         │  │    [marketeria_...]     ││
│  │ Cole aqui a URL do      │  │ 3. Personalize texto    ││
│  │ webhook do seu workflow │  │                         ││
│  │                         │  ├─────────────────────────┤│
│  │ Título do Formulário    │  │ Shortcode Personalizado ││
│  │ [Análise Gratuita...]   │  │                         ││
│  │                         │  │ [marketeria_analyzer    ││
│  │ Título exibido no topo  │  │  title="..." ...]       ││
│  │                         │  │                         ││
│  │ Descrição do Form.      │  ├─────────────────────────┤│
│  │ [____________________   │  │ Suporte                 ││
│  │  ____________________   │  │                         ││
│  │  _______________]       │  │ Marketeria              ││
│  │                         │  │ www.marketeria.net.br   ││
│  │ Descrição exibida...    │  │ fabio@marketeria...     ││
│  │                         │  │                         ││
│  │  [Salvar Configurações] │  │                         ││
│  └─────────────────────────┘  └─────────────────────────┘│
│  [70% width]                   [30% width]               │
└────────────────────────────────────────────────────────────┘
```

---

## 🎨 Paleta de Cores

### Cores Principais
```
Primary Gradient: 
  Start: #667eea (Roxo-azulado)
  End:   #764ba2 (Roxo)

Success: #27ae60 (Verde)
Error:   #e74c3c (Vermelho)
Info:    #3498db (Azul)

Text Primary:   #1a1a1a (Preto)
Text Secondary: #666666 (Cinza)
Text Muted:     #999999 (Cinza claro)

Background: #ffffff (Branco)
Border:     #e1e8ed (Cinza claro)
Shadow:     rgba(0,0,0,0.1)
```

### Aplicação de Cores
```
Botão Principal:
  Background: gradient(#667eea → #764ba2)
  Hover: Mesma + translateY(-2px)
  Shadow: rgba(102,126,234,0.4)

Input Focus:
  Border: #3498db
  Shadow: rgba(52,152,219,0.1)

Sucesso:
  Icon: #27ae60
  Background: #d4edda
  Border: #c3e6cb

Erro:
  Background: #f8d7da
  Text: #721c24
  Border: #f5c6cb
```

---

## 🎭 Animações

### 1. Fade In/Out
```css
Duration: 400ms
Easing: ease
Effect: opacity 0 → 1 ou 1 → 0
```

### 2. Button Hover
```css
Duration: 300ms
Easing: ease
Effect: translateY(-2px) + shadow increase
```

### 3. Spinner Rotation
```css
Duration: 2s
Easing: linear
Effect: rotate 0deg → 360deg (infinite)
```

### 4. Checkmark Draw
```css
Duration: 900ms total
  - Circle: 600ms (stroke-dashoffset)
  - Check: 300ms (stroke-dashoffset)
Easing: cubic-bezier(0.65, 0, 0.45, 1)
```

### 5. Progress Steps
```css
Transition: opacity 300ms ease
Effect: opacity 0.4 → 1.0
Delay: 2s entre etapas
```

---

## 📐 Dimensões

### Container
```
Max-width: 700px
Margin: 40px auto
Padding: 40px
Border-radius: 16px
Shadow: 0 10px 40px rgba(0,0,0,0.1)
```

### Inputs
```
Width: 100%
Padding: 14px 16px
Font-size: 16px
Border: 2px solid #e1e8ed
Border-radius: 10px
```

### Botão
```
Width: 100%
Padding: 16px 32px
Font-size: 18px
Border-radius: 10px
Shadow: 0 4px 15px rgba(102,126,234,0.4)
```

### Progress Icons
```
Width: 48px
Height: 48px
Border-radius: 50%
Font-size: 18px (número)
```

---

## 🖱️ Estados Interativos

### Input States
```
Default:
  Border: 2px #e1e8ed
  Background: #fff

Focus:
  Border: 2px #3498db
  Shadow: 0 0 0 3px rgba(52,152,219,0.1)

Error:
  Border: 2px #e74c3c

Disabled:
  Opacity: 0.7
  Cursor: not-allowed
```

### Button States
```
Default:
  Background: gradient
  Shadow: 0 4px 15px rgba(102,126,234,0.4)

Hover:
  Transform: translateY(-2px)
  Shadow: 0 6px 20px rgba(102,126,234,0.5)

Active:
  Transform: translateY(0)

Disabled:
  Opacity: 0.7
  Cursor: not-allowed
```

---

## 📊 Hierarquia Tipográfica

```
H2 (Título Principal):
  Size: 32px (mobile: 26px)
  Weight: 700
  Line-height: 1.3
  Color: #1a1a1a

P (Descrição):
  Size: 18px
  Weight: 400
  Line-height: 1.6
  Color: #666

Label:
  Size: 15px
  Weight: 600
  Color: #333

Input:
  Size: 16px
  Weight: 400
  Color: #333

Button:
  Size: 18px
  Weight: 600
  Color: #fff

Footer:
  Size: 14px
  Weight: 400
  Color: #999
```

---

## 💡 Dicas de Uso Visual

### Para Screenshots do Plugin:

1. **Estado Inicial**: Capture formulário limpo
2. **Preenchido**: Mostre formulário com dados
3. **Loading**: Capture estado de progresso
4. **Sucesso**: Mostre confirmação
5. **Mobile**: Capture em tela 375px

### Para Documentação:

- Use fundo branco ou contexto real do site
- Mostre diferentes temas WordPress
- Inclua estados de hover
- Demonstre responsividade

### Para Marketing:

- Destaque gradiente do botão
- Mostre animações (GIF/video)
- Compare antes/depois
- Mostre em contexto de landing page real

---

**Para criar screenshots reais do plugin, instale em WordPress e capture as telas descritas acima.**

**Desenvolvido por Marketeria**  
www.marketeria.net.br
