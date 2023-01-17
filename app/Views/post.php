<?php print_r($comments);?>
<!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <?php $imgUrl=base_url()."/uploads/".$post[0]['banner'];?>
                    <img src="<?= $imgUrl?>" />
                         
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    <?= $post[0]['tittle']?>
                </h1>
                <ul class="entry__header-meta">
                    <li class="date"><?= $post[0]['created_at']?></li>
                    <li class="byline">
                        By
                        <a href="#0">Jonathan Doe</a>
                    </li>
                </ul>
            </div>

            <div class="col-full entry__main">

                <p class="lead drop-cap">
                    <?= $post[0]['intro']?>
                </p>

                <p>
                <img src="images/wheel-1000.jpg" srcset="images/wheel-2000.jpg 2000w, images/wheel-1000.jpg 1000w, images/wheel-500.jpg 500w" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                </p>

                
                <p> <?= $post[0]['content']?></p>

<pre><code>
    code {
        font-size: 1.4rem;
        margin: 0 .2rem;
        padding: .2rem .6rem;
        white-space: nowrap;
        background: #F1F1F1;
        border: 1px solid #E1E1E1;
        border-radius: 3px;
    }
</code></pre>

                <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa.</p>

                <ul>
                    <li>Donec nulla non metus auctor fringilla.
                        <ul>
                            <li>Lorem ipsum dolor sit amet.</li>
                            <li>Lorem ipsum dolor sit amet.</li>
                            <li>Lorem ipsum dolor sit amet.</li>
                        </ul>
                    </li>
                    <li>Donec nulla non metus auctor fringilla.</li>
                    <li>Donec nulla non metus auctor fringilla.</li>
                </ul>

                <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.</p>

                <div class="entry__taxonomies">
                    <div class="entry__cat">
                        <h5>Posted In: </h5>
                        
                        <span class="entry__tax-list">
                            <a href="<?= base_url()?>/index.php/Dashboard/category/<?=$category[0]['id']?>"><?= $category[0]['name'];?></a>
                        </span>
                    </div> <!-- end entry__cat -->

                    <div class="entry__tags">
                        <h5>Tags: </h5>
                        <span class="entry__tax-list entry__tax-list--pill">
                            <?php 
                            $tags=$post[0]['tags'];
                            $singletag=explode(",",$tags);

                            foreach($singletag as $row){
                                echo '<a href="#0">'.$row.'</a>';
                            }
                            ?>
                        </span>
                    </div> <!-- end entry__tags -->
                </div> <!-- end s-content__taxonomies -->

                <div class="entry__author">
                    <img src="images/avatars/user-03.jpg" alt="">

                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span>Posted by</span>
                            <a href="#0">Jonathan Doe</a>
                        </h5>

                        <div class="entry__author-desc">
                            <p>
                            Alias aperiam at debitis deserunt dignissimos dolorem doloribus, fuga fugiat 
                            impedit laudantium magni maxime nihil nisi quidem quisquam sed ullam voluptas 
                            voluptatum. Lorem ipsum dolor sit.
                            </p>
                        </div>
                    </div>
                </div>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->

                            <?php
                            //post previos y siguientes de forma random
                            $db=\Config\Database::connect();
                            $query=$db->query("SELECT * FROM posts WHERE id <>".$post[0]['id']." ORDER BY RAND() LIMIT 2");
                            $result=$query->getResultArray();
                            ?>
        <div class="s-content__entry-nav">
            <div class="row s-content__nav">
                <div class="col-six s-content__prev">
                    <a href="<?= base_url()?>/index.php/Dashboard/post/<?= $result[0]['slug'] ?>/<?= $result[0]['id'] ?>" rel="prev">
                        <span>Previous Post</span>
                        <?= $result[0]['tittle']?>
                    </a>
                </div>
                <div class="col-six s-content__next">
                    <a href="<?= base_url()?>/index.php/Dashboard/post/<?= $result[1]['slug'] ?>/<?= $result[1]['id'] ?>" rel="next">
                        <span>Next Post</span>
                        <?= $result[1]['tittle']?>
                    </a>
                </div>
            </div>
        </div> <!-- end s-content__pagenav -->

        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2"><?= $countcomments?> Comments</h3>

                    <!-- START commentlist -->
                    <ol class="commentlist">
                        <?php 
                            foreach($comments as $com){
                        ?>

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="images/avatars/user-01.jpg" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <div class="comment__author"><?= $com['name']?></div>

                                    <div class="comment__meta">
                                        <div class="comment__time">Jun 15, 2018</div>
                                        <div class="comment__reply">
                                            <a class="comment-reply-link" href="#0">Reply</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p><?= $com['comment']?></p>
                                </div>

                            </div>

                        </li> <!-- end comment level 1 -->
                                <?php } ?>
                        
                    </ol>
                    <!-- END commentlist -->           

                </div> <!-- end col-full -->
            </div> <!-- end comments -->

            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="col-full">

                    <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

                    <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                        <fieldset>

                            <div class="form-field">
                                <input name="cName" id="cName" class="full-width" placeholder="Your Name*" value="" type="text">
                            </div>

                            <div class="form-field">
                                <input name="cEmail" id="cEmail" class="full-width" placeholder="Your Email*" value="" type="text">
                            </div>


                            <div class="message form-field">
                                <textarea name="cMessage" id="cMessage" class="full-width" placeholder="Your Message*"></textarea>
                            </div>

                            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width" value="Add Comment" type="submit">

                        </fieldset>
                    </form> <!-- end form -->

                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->

    </section> <!-- end s-content -->
