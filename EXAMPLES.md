# Exemplos de Uso do Plugin

## 📝 Exemplos de Shortcode

### Exemplo 1: Uso Básico
O mais simples - usa as configurações padrão do plugin:

```
[marketeria_analyzer]
```

### Exemplo 2: Com Título Personalizado
Apenas personaliza o título:

```
[marketeria_analyzer title="Análise Gratuita de Conversão"]
```

### Exemplo 3: Com Descrição Personalizada
Apenas personaliza a descrição:

```
[marketeria_analyzer description="Descubra como triplicar suas conversões em 30 dias"]
```

### Exemplo 4: Totalmente Personalizado
Personaliza título e descrição:

```
[marketeria_analyzer 
  title="🎯 Auditoria Gratuita da Sua Página" 
  description="Análise completa de performance, SEO e conversões em minutos"]
```

## 🎨 Exemplos de Páginas

### Landing Page de Captura

```html
<div class="hero-section">
  <h1>Aumente suas Conversões em até 300%</h1>
  <p>Descubra GRATUITAMENTE os 3 maiores problemas que impedem sua landing page de converter</p>
  
  [marketeria_analyzer]
  
  <div class="benefits">
    <h2>O que você vai receber:</h2>
    <ul>
      <li>✅ Análise técnica completa</li>
      <li>✅ Auditoria de conteúdo</li>
      <li>✅ Recomendações acionáveis</li>
      <li>✅ Oportunidades de otimização</li>
    </ul>
  </div>
</div>
```

### Página de Serviços

```html
<div class="service-page">
  <h1>Otimização de Landing Pages</h1>
  
  <div class="service-description">
    <p>Ajudamos empresas a aumentar suas taxas de conversão através de análises detalhadas e otimizações comprovadas.</p>
  </div>
  
  <div class="cta-section">
    <h2>Comece com uma Análise Gratuita</h2>
    <p>Veja o que podemos fazer pela sua empresa</p>
    
    [marketeria_analyzer 
      title="Análise Gratuita da Sua Landing Page" 
      description="Sem compromisso • Resposta em minutos"]
  </div>
  
  <div class="testimonials">
    <!-- Depoimentos de clientes -->
  </div>
</div>
```

### Sidebar Widget

No Appearance → Widgets, adicione um widget de texto HTML:

```html
<div class="sidebar-analyzer">
  <h3>📊 Análise Gratuita</h3>
  [marketeria_analyzer 
    title="Quick Audit" 
    description="3 problemas críticos identificados em minutos"]
</div>
```

### Post de Blog

```html
<article>
  <h1>Como Otimizar Landing Pages para Conversão</h1>
  
  <p>Neste artigo, vou mostrar técnicas comprovadas para aumentar suas conversões...</p>
  
  <!-- Conteúdo do artigo -->
  
  <div class="article-cta">
    <h3>🎁 Quer uma análise personalizada da SUA landing page?</h3>
    
    [marketeria_analyzer 
      title="Análise Gratuita Personalizada" 
      description="Aplique essas técnicas na SUA página - análise grátis!"]
  </div>
</article>
```

## 🎯 Casos de Uso

### 1. Lead Magnet
Use como isca digital para capturar leads qualificados:

```
[marketeria_analyzer 
  title="🎁 BÔNUS: Análise Gratuita" 
  description="Além do ebook, receba uma análise completa da sua página"]
```

### 2. Onboarding de Clientes
Para novos clientes experimentarem seu serviço:

```
[marketeria_analyzer 
  title="Bem-vindo! Comece sua Jornada" 
  description="Primeira análise gratuita para novos clientes"]
```

### 3. Reativação de Leads
Em email marketing ou remarketing:

```
[marketeria_analyzer 
  title="Voltamos com Novidades!" 
  description="Análise melhorada com IA - teste agora"]
```

### 4. Upsell/Cross-sell
Para clientes existentes:

```
[marketeria_analyzer 
  title="Análise de Landing Page Adicional" 
  description="Otimize outra página gratuitamente"]
```

## 🖼️ Exemplos com HTML/CSS

### Card Destacado

```html
<div style="max-width: 800px; margin: 40px auto; padding: 40px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 20px; color: white;">
  <h2 style="color: white; text-align: center; margin-bottom: 10px;">
    ⚡ Análise Express da Sua Landing Page
  </h2>
  <p style="text-align: center; opacity: 0.9; margin-bottom: 30px;">
    Resultados em minutos • 100% Gratuito • Sem Cadastro
  </p>
  
  <div style="background: white; border-radius: 15px; padding: 20px;">
    [marketeria_analyzer 
      title="Preencha e Receba sua Análise" 
      description="3 problemas críticos + soluções práticas"]
  </div>
</div>
```

### Seção com Background

```html
<section style="background: #f8f9fa; padding: 60px 20px;">
  <div style="max-width: 1200px; margin: 0 auto;">
    <div style="text-align: center; margin-bottom: 40px;">
      <h2>Não Deixe Dinheiro na Mesa</h2>
      <p style="font-size: 18px; color: #666;">
        Uma landing page mal otimizada pode estar custando milhares em vendas perdidas
      </p>
    </div>
    
    <div style="background: white; border-radius: 20px; padding: 40px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
      [marketeria_analyzer]
    </div>
    
    <div style="text-align: center; margin-top: 30px;">
      <p style="color: #999; font-size: 14px;">
        🔒 Seus dados estão seguros • ⚡ Resposta instantânea • 💯 Sem compromisso
      </p>
    </div>
  </div>
</section>
```

### Two Column Layout

```html
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; max-width: 1200px; margin: 60px auto; padding: 0 20px;">
  <div>
    <h2>Por Que Fazer Esta Análise?</h2>
    <ul style="list-style: none; padding: 0;">
      <li style="padding: 15px 0; border-bottom: 1px solid #eee;">
        ✅ Identifica problemas ocultos
      </li>
      <li style="padding: 15px 0; border-bottom: 1px solid #eee;">
        ✅ Recomendações acionáveis
      </li>
      <li style="padding: 15px 0; border-bottom: 1px solid #eee;">
        ✅ Análise de IA avançada
      </li>
      <li style="padding: 15px 0;">
        ✅ 100% grátis e sem compromisso
      </li>
    </ul>
  </div>
  
  <div>
    [marketeria_analyzer 
      title="Solicite Sua Análise" 
      description="Preencha em 30 segundos"]
  </div>
</div>
```

## 📱 Exemplos Mobile-Optimized

### Popup/Modal
Use com plugin de popup (ex: Popup Maker):

```html
<div class="popup-content">
  <div style="text-align: center; margin-bottom: 20px;">
    <h2>🎯 Oferta Especial!</h2>
    <p>Análise gratuita por tempo limitado</p>
  </div>
  
  [marketeria_analyzer 
    title="Garanta Sua Análise" 
    description="Últimas vagas disponíveis"]
</div>
```

### Sticky Bottom Bar
```html
<div style="position: fixed; bottom: 0; left: 0; right: 0; background: #667eea; padding: 10px; text-align: center; z-index: 999;">
  <p style="color: white; margin: 0;">
    🎁 Análise Gratuita Disponível - 
    <a href="#analyzer-form" style="color: white; text-decoration: underline;">Clique Aqui</a>
  </p>
</div>

<div id="analyzer-form">
  [marketeria_analyzer]
</div>
```

## 🎨 Integração com Page Builders

### Elementor
1. Adicione um widget "Shortcode"
2. Cole: `[marketeria_analyzer]`
3. Estilize a seção ao redor conforme necessário

### Divi
1. Adicione um módulo "Code"
2. No conteúdo, adicione o shortcode
3. Ajuste padding e margem na seção

### Beaver Builder
1. Adicione um módulo "HTML"
2. Insira o shortcode
3. Configure espaçamento

### WPBakery
1. Adicione elemento "Raw HTML"
2. Cole o shortcode
3. Ajuste configurações de design

## 🔧 Truques e Dicas

### Múltiplos Formulários
Você pode usar múltiplos shortcodes na mesma página:

```
<!-- Topo da página -->
[marketeria_analyzer title="Análise Rápida"]

<!-- Meio do conteúdo -->
[marketeria_analyzer title="Análise Completa" description="Versão detalhada"]

<!-- Rodapé -->
[marketeria_analyzer title="Última Chance" description="Não perca esta oportunidade"]
```

### A/B Testing
Teste diferentes títulos/descrições:

**Versão A (direta):**
```
[marketeria_analyzer 
  title="Análise Gratuita" 
  description="Preencha o formulário abaixo"]
```

**Versão B (benefícios):**
```
[marketeria_analyzer 
  title="Aumente Suas Conversões Hoje" 
  description="Descubra os 3 problemas que impedem suas vendas"]
```

### Urgência/Escassez
```
[marketeria_analyzer 
  title="⏰ Últimas 24 Horas!" 
  description="Análise gratuita termina em breve - garanta a sua agora"]
```

---

**Desenvolvido por Marketeria**  
www.marketeria.net.br | fabio@marketeria.net.br
