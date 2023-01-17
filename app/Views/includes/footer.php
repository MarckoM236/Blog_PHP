<!-- s-extra
    ================================================== -->
    <section class="s-extra">

        <div class="row">

            <div class="col-seven md-six tab-full popular">
                <h3>Popular Posts</h3>
                
                <div class="block-1-2 block-m-full popular__posts">
                <?php 
                        //Consulta directa a la DB
                        $db=\Config\Database::connect();
                        $query=$db->query("SELECT * FROM posts WHERE show_home=1" );
                        $res=$query->getResult();

                        //recorrer array
                        foreach($res as $row){
                            
                            ?>
                    <article class="col-block popular__post">
                        <a href="<?= base_url()?>/index.php/Dashboard/post/<?= $row->slug ?>/<?= $row->id ?>" class="popular__thumb">
                            <img src="<?php echo base_url(); ?>/uploads/<?= $row->banner?>" alt="">
                        </a>
                        <h5><?= $row->tittle ?></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                            <span class="popular__date"><span>on</span> <time datetime="2018-06-14"><?= $row->created_at ?></time></span>
                        </section>
                    </article>
                    <?php } ?>
                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->

            <div class="col-four md-six tab-full end">
                <div class="row">
                    <div class="col-six md-six mob-full categories">
                        <h3>Categories</h3>
        
                        <ul class="linklist">
                            <?php 
                            //Consulta directa a la DB
                            $db=\Config\Database::connect();
                            $query=$db->query("SELECT * FROM categories" );
                            $res=$query->getResult();

                            //recorrer array
                            foreach($res as $row){
                                
                                ?>
                            <li><a href="#0"><?= $row->name?></a></li>
                            <?php } ?>
                        </ul>
                    </div> <!-- end categories -->
        
                    <div class="col-six md-six mob-full sitelinks">
                        <h3>Site Links</h3>
        
                        <ul class="linklist">
                            <li><a href="<?= base_url()?>/index.php/Dashboard/index">Home</a></li>
                            <li><a href="<?= base_url()?>/index.php/Dashboard/uploadPost">Blog</a></li>
                        </ul>
                    </div> <!-- end sitelinks -->
                </div>
            </div>
        </div> <!-- end row -->

    </section> <!-- end s-extra -->


    <!-- s-footer
    ================================================== -->
    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">
                
                <div class="col-six tab-full s-footer__about">
                        
                    <h4>About Wordsmith</h4>

                    <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut occaecati placeat at. 
                    Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia consequatur.
                    Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa error 
                    temporibus magnam est voluptatem.</p>

                </div> <!-- end s-footer__about -->

                <div class="col-six tab-full s-footer__subscribe">
                        
                    <h4>Our Newsletter</h4>

                    <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>

                    <div class="subscribe-form">
                        <form action="" id="newsletter-form"  method="post">

                            <input type="email"  name="email"  id="newsletter-input" placeholder="Email Address" >
                
                            <input type="button" id="sendNewsletter" value="SEND">

                            <label for="" id="res" style="color:white;"></label>
                
                        </form>
                    </div>

                </div> <!-- end s-footer__subscribe -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">

                <div class="col-six">
                    <ul class="footer-social">
                        <li>
                            <a href="#0"><i class="fab fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#0"><i class="fab fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="col-six">
                    <div class="s-footer__copyright">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</span>
                    </div>
                </div>
                
            </div>
        </div> <!-- end s-footer__bottom -->

        <div class="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>

    </footer> <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/main.js"></script>

    <script>
        $("#sendNewsletter").click(function(){
            console.log("SE HA ENVIADO");
            var inputemail=$("#newsletter-input").val();
            $.post("<?= base_url()?>/Dashboard/add_newsletter",{email:inputemail}).done(function(data){
                console.log(data);
                $("#res").html(data);
            });
        });
    </script>

</body>

</html>