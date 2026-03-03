# Especificações do Projeto

<span style="color:red">Pré-requisitos: <a href="1-Documentação de Contexto.md"> Documentação de Contexto</a></span>

Este capítulo detalha as especificações do projeto **Silver** a partir da perspectiva do usuário. A definição do problema e a concepção da solução são aprofundadas por meio da criação de personas, histórias de usuário, requisitos funcionais e não funcionais, além das restrições e da arquitetura distribuída que nortearão o desenvolvimento.

## Personas

Para compreender as necessidades e dores dos usuários, foram desenvolvidas três personas baseadas no público-alvo identificado.

| Foto | Perfil | Detalhes | Motivações e Comportamento |
| :------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------ | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| ![Maria](https://i.pravatar.cc/150?u=maria) | **Nome:** Maria da Silva<br>**Idade:** 38 anos<br>**Profissão:** Auxiliar Administrativa | **Renda:** R$ 2.400,00<br>**Tecnologia:** Familiarizada com WhatsApp e utiliza celular Android. | **Dores:** Esquece de anotar pequenos gastos e acha planilhas complicadas.<br>**Objetivos:** Usar o WhatsApp para registros instantâneos e ver relatórios simples no celular. |
| ![João](https://i.pravatar.cc/150?u=joao) | **Nome:** João Pereira<br>**Idade:** 24 anos<br>**Profissão:** Vendedor Autônomo | **Renda:** R$ 1.800,00<br>**Tecnologia:** Usuário ativo de aplicativos e redes sociais. | **Dores:** Dificuldade em separar gastos pessoais de profissionais no dia a dia.<br>**Objetivos:** Registrar tudo rápido pelo WhatsApp e usar o Dashboard Web para planejamento mensal. |
| ![Carlos](https://i.pravatar.cc/150?u=carlos) | **Nome:** Carlos Santos<br>**Idade:** 32 anos<br>**Profissão:** Técnico de TI | **Renda:** R$ 4.500,00<br>**Tecnologia:** Confortável com Dashboards complexos e múltiplas janelas. | **Dores:** Precisa de uma visão analítica potente para gerir investimentos e metas.<br>**Objetivos:** Usar o Dashboard Web para análises profundas e integração total entre dispositivos. |

## Histórias de Usuários

|EU COMO... `PERSONA`| QUERO/PRECISO ... `FUNCIONALIDADE` |PARA ... `MOTIVO/VALOR` |
|--------------------|------------------------------------|----------------------------------------|
|Maria da Silva | Registrar uma despesa enviando um valor pelo WhatsApp | Não esquecer o gasto logo após a compra. |
|João Pereira | Visualizar meu Dashboard Web consolidado | Analisar meus lucros e despesas do mês em uma tela grande. |
|Carlos Santos | Definir metas de economia para o final do ano | Acompanhar meu progresso de forma automática. |
|João Pereira | Receber um resumo diário via WhatsApp | Ter consciência do quanto ainda posso gastar no dia. |
|Maria da Silva | Categorizar minhas contas por cor e ícone | Facilitar a identificação visual dos meus gastos no app. |

## Requisitos

### Requisitos Funcionais

| ID | Descrição | Prioridade |
| :--- | :--- | :--- |
| **RF01** | O sistema deve permitir o registro de transações (receitas e despesas) via comandos no WhatsApp. | `Alta` |
| **RF02** | O sistema deve fornecer um Dashboard Web para visualização analítica (gráficos e tabelas). | `Alta` |
| **RF03** | O sistema deve permitir a sincronização em tempo real entre todas as interfaces (WhatsApp, Web e Mobile). | `Alta` |
| **RF04** | O sistema deve permitir a criação e gestão de categorias financeiras personalizadas. | `Média` |
| **RF05** | O sistema deve exibir o saldo atualizado de diferentes contas e cartões de crédito. | `Alta` |
| **RF06** | O sistema deve permitir o cadastro de metas financeiras com acompanhamento de progresso. | `Média` |
| **RF07** | O sistema deve permitir o login e gerenciamento de perfil do usuário. | `Alta` |
| **RF08** | O sistema deve possibilitar a exportação de relatórios em formato CSV ou PDF através do Dashboard Web. | `Baixa` |
| **RF09** | O sistema deve enviar alertas de orçamentos excedidos via WhatsApp. | `Média` |
| **RF10** | O sistema deve permitir a anexação de comprovantes de pagamento no Dashboard Web. | `Baixa` |

### Requisitos Não Funcionais

| ID | Descrição | Prioridade |
| :--- | :--- | :--- |
| **RNF01** | O backend da aplicação deve ser desenvolvido utilizando o framework Laravel (PHP). | `Alta` |
| **RNF02** | O Dashboard Web deve ser responsivo e otimizado para navegadores modernos. | `Alta` |
| **RNF03** | O sistema deve adotar uma arquitetura de microsserviços ou serviços distribuídos para garantir escalabilidade. | `Média` |
| **RNF04** | Todas as comunicações entre as interfaces e o servidor devem ser via HTTPS (TLS). | `Alta` |
| **RNF05** | O tempo de processamento de uma transação enviada pelo WhatsApp não deve exceder 5 segundos. | `Alta` |
| **RNF06** | O banco de dados centralizado deve garantir a persistência e atomicidade das transações. | `Alta` |

## Restrições

|ID| Restrição |
|--|-------------------------------------------------------|
|01| O projeto deve ser entregue até o final do semestre acadêmico. |
|02| A integração com WhatsApp depende das cotas gratuitas fornecidas pela API Business ou provedores. |
|03| O desenvolvimento do backend é obrigatório utilizando Laravel. |
|04| O grupo deve ser composto por 5 a 6 alunos. |

## Arquitetura Distribuída

O **Silver** utiliza uma arquitetura distribuída composta pelos seguintes componentes:
1. **API Gateway / Backend (Laravel)**: Núcleo central que processa regras de negócio e gerencia o banco de dados.
2. **Dashboard Web (Frontend)**: Interface para análise densa de dados, consumindo a API Laravel.
3. **WhatsApp Bridge (Node.js/Webhook)**: Serviço que escuta mensagens do WhatsApp e as encaminha para a API Laravel.
4. **App Mobile (React Native)**: Interface móvel para consulta e registros rápidos em trânsito.

# Gerenciamento de Projeto

## Gerenciamento de Tempo

O cronograma de 16 semanas será dividido em:
- **Semanas 1-4**: Concepção, Especificação e Setup da API Laravel.
- **Semanas 5-8**: Desenvolvimento do Dashboard Web e Integração WhatsApp.
- **Semanas 9-12**: Desenvolvimento do App Mobile e Sincronização.
- **Semanas 13-16**: Testes integrados, Correções e Apresentação.

## Gerenciamento de Equipe

- **Backend/API (Laravel)**: 2 desenvolvedores.
- **Web Dashboard**: 2 desenvolvedores.
- **WhatsApp Integration / Mobile**: 2 desenvolvedores.

