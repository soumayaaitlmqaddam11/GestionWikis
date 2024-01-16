<?php
use App\Models\TagModel;

?>

<div id="results">
    <section class="light">
        <h2 class="text-center py-3">Latest Job Listings</h2>
        <div class="container py-2" id="search">
    <?php
    
    if (isset($wikis) && !empty($wikis)) {
        foreach ($wikis as $wikiResult) {
            $wiki = $wikiResult[0]; 
            ?>
            <article class="postcard light green">
                <a class="postcard__img_link" href="#">
                    <img class="postcard__img" src="/assets/img/logowiki.jpg" alt="Image Title" />
                </a>
                <div class="postcard__text t-dark">
                    <h3 class="postcard__title green">
                        <a href="#">
                            <?php echo isset($wiki['titre']) ? $wiki['titre'] : 'Titre non défini'; ?>
                        </a>
                    </h3>
                    <div class="postcard__subtitle small">
                        <time datetime="2020-05-25 12:00:00">
                            <i class="fas fa-calendar-alt mr-2"></i>
                            <?php echo isset($wiki['categorie']) ? $wiki['categorie'] : 'Catégorie non définie'; ?>                        </time>
                    </div>
                    <div class="postcard__bar"></div>
                    <div class="postcard__preview-txt">
                        <?php echo isset($wiki['contenu']) ? $wiki['contenu'] : 'Contenu non défini'; ?>
                    </div>
                    <ul class="postcard__tagbox">
                        <?php
                        $tagModel = new TagModel();
                        $tags = $tagModel->getTagsByWikiId($wiki['id']);

                        foreach ($tags as $tag): ?>
                            <li class="tag__item">
                                <i class="fas fa-tag mr-2"></i><?php echo isset($tag['nom']) ? $tag['nom'] : 'Nom non défini'; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </article>
        <?php
        }
    } else {
       
        echo '<p>Aucun résultat trouvé.</p>';
    }
    ?>
</div>


    </section>
</div>