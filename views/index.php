<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educação para Todos - Cursos Gratuitos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    
</head>
<body>

    <?php
        require_once 'components/cabecalho.php';
    ?>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="hero-content text-center">
                <h1 class="hero-title">Educação de Qualidade para Todos</h1>
                <p class="hero-subtitle">Cursos preparatórios 100% gratuitos para vestibulares e concursos públicos</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                </div>
            </div>
        </div>
    </section>

    <!-- Destaques -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card card-feature text-center p-4 h-100">
                        <div class="icon-container">
                            <i class="bi bi-currency-dollar"></i>
                        </div>
                        <h4>Totalmente Gratuito</h4>
                        <p class="card-text">Nossos cursos são 100% gratuitos, sem taxas ou mensalidades escondidas.</p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card card-feature text-center p-4 h-100">
                        <div class="icon-container">
                            <i class="bi bi-award"></i>
                        </div>
                        <h4>Professores Qualificados</h4>
                        <p class="card-text">Equipe de mestres e doutores com experiência em educação pública.</p>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card card-feature text-center p-4 h-100">
                        <div class="icon-container">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h4>Alto Índice de Aprovação</h4>
                        <p class="card-text">Mais de 80% dos nossos alunos são aprovados nas melhores instituições.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Cursos -->
    <section class="courses-section" id="cursos">
        <div class="container">
            <h2 class="section-title">Nossos Cursos</h2>
            <p class="section-subtitle">Escolha o curso ideal para o seu objetivo acadêmico</p>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Pré-Vestibulinho">
                        <div class="card-body">
                            <span class="badge">GRATUITO</span>
                            <h3 class="card-title">Pré-Vestibulinho</h3>
                            <h6 class="card-subtitle">Para alunos do Ensino Fundamental</h6>
                            <p class="card-text">
                                Preparação completa para os vestibulinhos das melhores escolas técnicas do país. 
                                Cobre todo o conteúdo do 6º ao 9º ano com foco nas provas.
                            </p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Matemática e Lógica</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Português e Redação</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Ciências da Natureza</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Simulados periódicos</li>
                            </ul>
                            <a href="formulario_inscricao.php" class="btn btn-primary-custom w-100">Quero me inscrever</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card course-card h-100">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" class="card-img-top" alt="Pré-Vestibular">
                        <div class="card-body">
                            <span class="badge">GRATUITO</span>
                            <h3 class="card-title">Pré-Vestibular Popular</h3>
                            <h6 class="card-subtitle">Para alunos do Ensino Médio</h6>
                            <p class="card-text">
                                Preparação intensiva para os principais vestibulares e ENEM. 
                                Abordagem completa de todas as áreas do conhecimento com material atualizado.
                            </p>
                            <ul class="list-unstyled mb-4">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Todas as áreas do conhecimento</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Redação com correção individual</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Plantão de dúvidas</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i>Simulados no formato ENEM</li>
                            </ul>
                            <a href="formulario_inscricao.php" class="btn btn-primary-custom w-100">Quero me inscrever</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Depoimentos -->
    <section class="testimonials-section" id="depoimentos">
        <div class="container">
            <h2 class="section-title">Depoimentos de Alunos</h2>
            <p class="section-subtitle">Veja o que dizem sobre nossa instituição</p>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="testimonial-text">"Graças ao curso preparatório gratuito, consegui passar no vestibulinho da ETEC que eu queria. Os professores são incríveis e o material é muito completo!"</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Aluna">
                            <div class="testimonial-author-info">
                                <h6>Ana Clara Santos</h6>
                                <small>Aprovada na ETEC</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="testimonial-text">"O pré-vestibular popular me deu a base que eu precisava para entrar na USP. Nunca imaginei que poderia ter acesso a um ensino de qualidade assim, de graça."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Aluno">
                            <div class="testimonial-author-info">
                                <h6>Pedro Henrique Lima</h6>
                                <small>Aprovado na USP</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <div class="rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <p class="testimonial-text">"Melhor oportunidade que já tive! A metodologia de ensino e os simulados me prepararam muito bem para o vestibular da UNICAMP, tudo sem custo algum."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Aluna">
                            <div class="testimonial-author-info">
                                <h6>Juliana Oliveira</h6>
                                <small>Aprovada na UNICAMP</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção CTA -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Pronto para transformar seu futuro?</h2>
            <p class="cta-text">Nossos cursos gratuitos estão abertos para todos que querem se preparar para vestibulares e concursos públicos. Não perca essa oportunidade!</p>
            <a href="formulario_inscricao.php" class="btn btn-primary-custom btn-lg px-5">
                <i class="bi bi-pencil-square me-2"></i>Quero me inscrever
            </a>
        </div>
    </section>

    <?php
        require_once 'components/rodape.php';
    ?>
    
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>