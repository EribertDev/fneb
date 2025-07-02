@extends('master')
@section('title')
    A propos
@endsection
@section('extra-style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="{{asset('css/about.css')}}">
@endsection
@section('content')



<div class="fneb-about">
        <div class="header">
            <h1>Fédération Nationale des Étudiants du Bénin (FNEB)</h1>
            <p>L'organisation représentative de tous les étudiants béninois, œuvrant pour une éducation de qualité, la justice et l'unité dans la diversité.</p>
        </div>
        
        <div class="mission-box">
            <h2>Notre Mission</h2>
            <p>La FNEB a pour mission fondamentale de défendre les droits et intérêts des étudiants béninois, de promouvoir un enseignement supérieur de qualité, et de cultiver l'esprit de solidarité et de responsabilité chez les étudiants.</p>
            
            <div class="motto">Unité - Justice - Action</div>
            <p>Notre devise guide chacune de nos actions et représente les valeurs fondamentales de notre organisation.</p>
            
            <div class="logo-explanation">
                <div class="logo-preview">
                   <img src="{{asset('img/fneb-logo.png')}}" alt="Emblème FNEB" class="img-rounded mb-4" style="max-height: 120px;">

                </div>
                
                <div class="logo-symbolism">
                    <h3>Symbolisme de notre emblème</h3>
                    <ul>
                        <li><strong>Les deux mains</strong> représentent la force et la dynamique de la FNEB</li>
                        <li><strong>La colombe</strong> symbolise la paix, l'unité et la mission de croissance</li>
                        <li><strong>Le bleu</strong> sur fond blanc évoque la paix et le bonheur que chaque membre doit préserver</li>
                        <li><strong>Le logo entier</strong> incarne notre engagement pour une communauté étudiante unie et prospère</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="structure-section">
            <h2 class="section-title">Structure Organisationnelle</h2>
            
            <div class="structure-grid">
                <div class="structure-card">
                    <div class="card-header">Sections Fédérales</div>
                    <div class="card-body">
                        <ul>
                            <li><i class="fas fa-university"></i>Université d'Abomey-Calavi</li>
                            <li><i class="fas fa-university"></i>Université Nationale d'Agriculture</li>
                            <li><i class="fas fa-university"></i>Université Nationale des Sciences, Technologies, Ingénierie et Mathématiques</li>
                            <li><i class="fas fa-university"></i>Université de Parakou</li>
                            <li><i class="fas fa-globe-africa"></i>Sections par pays étranger (avec ≥20 étudiants béninois)</li>
                        </ul>
                    </div>
                </div>
                
                <div class="structure-card">
                    <div class="card-header">Unions d'Entités (UAC)</div>
                    <div class="card-body">
                        <ul>
                            <li><i class="fas fa-graduation-cap"></i>Ecole Polytechnique d'Abomey-Calavi (EPAC)</li>
                            <li><i class="fas fa-graduation-cap"></i>Ecole Nationale d'Administration (ENA)</li>
                            <li><i class="fas fa-graduation-cap"></i>Faculté des Sciences Techniques (FAST)</li>
                            <li><i class="fas fa-graduation-cap"></i>Faculté des Sciences Economiques et de Gestion (FASEG)</li>
                            <li><i class="fas fa-graduation-cap"></i>Faculté de Droit et de Sciences Politiques (FADESP)</li>
                            <li><i class="fas fa-graduation-cap"></i>Faculté des Sciences Humaines et Sociales (FASHS)</li>
                            <li><i class="fas fa-plus-circle"></i>Et 15 autres entités académiques</li>
                        </ul>
                    </div>
                </div>
                
                <div class="structure-card">
                    <div class="card-header">Institutions Spécialisées</div>
                    <div class="card-body">
                        <ul>
                            <li><i class="fas fa-music"></i>Ensemble Artistique et Culturel des Etudiants (EACE)</li>
                            <li><i class="fas fa-newspaper"></i>Le Héraut (Journal étudiant)</li>
                            <li><i class="fas fa-futbol"></i>Ensemble Sportif des Etudiants (ESE)</li>
                            <li><i class="fas fa-microphone-alt"></i>Radio Univers</li>
                            <li><i class="fas fa-flask"></i>Comité de Recherches Scientifiques et de Publications (CRSP)</li>
                            <li><i class="fas fa-home"></i>Comité des Résidents (CR)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="objectives-duties">
            <div class="objectives">
                <h3>Nos Objectifs</h3>
                <ul>
                    <li>Défendre les droits et intérêts matériels et moraux des étudiants</li>
                    <li>Militer pour un enseignement supérieur de qualité et accessible à tous</li>
                    <li>Promouvoir la culture, la littérature, les arts et le sport universitaire</li>
                    <li>Encourager l'esprit de solidarité, d'entraide et de responsabilité</li>
                    <li>Œuvrer pour le respect des franchises universitaires</li>
                    <li>Créer une communauté unie de tous les étudiants béninois</li>
                    <li>Coopérer avec les organisations étudiantes nationales et internationales</li>
                    <li>Développer une conscience historique panafricaine chez les étudiants</li>
                </ul>
            </div>
            
            <div class="duties">
                <h3>Nos devoirs</h3>
                <ul>
                    <li>Connaître et respecter les textes fondamentaux de la FNEB</li>
                    <li>Respecter la discipline de groupe et d'action des étudiants</li>
                    <li>Travailler à acquérir une conscience politique fondée sur la démocratie</li>
                    <li>Cultiver l'amour de la patrie et l'esprit de sacrifice</li>
                    <li>Respecter les biens publics et les installations universitaires</li>
                    <li>Servir la communauté avec ses capacités physiques et intellectuelles</li>
                    <li>Placer l'intérêt général au-dessus des intérêts personnels</li>
                    <li>Servir la Fédération en toute objectivité, honnêteté et loyauté</li>
                </ul>
            </div>
        </div>
        
        <div class="values-section">
            <h2 class="section-title">Nos Valeurs Fondamentales</h2>
            
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h4>Unité</h4>
                    <p>Nous croyons en la force de la communauté étudiante unie, malgré nos diversités.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-scale-balanced"></i>
                    </div>
                    <h4>Justice</h4>
                    <p>Nous luttons pour un traitement équitable et le respect des droits de chaque étudiant.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h4>Action</h4>
                    <p>Nous transformons nos paroles en actes concrets pour améliorer la condition étudiante.</p>
                </div>
                
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h4>Excellence Académique</h4>
                    <p>Nous promouvons la recherche du savoir et de la connaissance scientifique.</p>
                </div>
            </div>
        </div>
        
        
    </div>


 
 
</section>

 





  


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            


  


    <section class="members-section">
        <div class="container-xxl py-5">
            <div class="container">
                <div class="section-header">
                    <div class="section-badge">
                        <i class="fas fa-users me-2"></i>Le Bureau Exécutif National
                    </div>
                  
                    <p>Découvrez les membres dévoués qui composent notre équipe dirigeante et travaillent sans relâche pour la communauté étudiante.</p>
                </div>
                
                <div class="members-container">
                    <div class="decoration dec-1"></div>
                    <div class="decoration dec-2"></div>
                    
                    <div class="team-row">
                        @foreach($members as $member)
                        <div class="team-card">
                            <div class="image-container">
                                <img src="{{ asset('storage/' . ($member->photo ?? 'img/default-avatar.png')) }}" 
                                    class="team-img" alt="{{ $member->name }}">
                                <div class="position-badge">{{ $member->position }}</div>
                                
                                <div class="social-links">
                                   
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                   
                                   
                                   <a href="tel:{{ $member->phone }}" >
                                        <i class="fas fa-phone"></i>
                                    </a>
                                   
                                   
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                   
                                    
                                    <a href="mailto:{{ $member->email }}"><i class="fas fa-envelope"></i></a>
                                    
                                </div>
                            </div>
                            
                            <div class="member-info">
                                <h3>{{ $member->name }}</h3>
                                <p>{{ $member->role }}</p>
                                <a href="#" class="contact-btn">Contacter</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
        </div>
    </div>
    <!-- Team End -->
    
    
@endsection

@section('extra-script')
     <script>
        // Animation pour les cartes au chargement
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.team-card');
            
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 300 + (index * 150));
            });
        });
    </script>

@endsection


 