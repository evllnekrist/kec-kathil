<style>
section figure {
    position: relative;
    margin: 0 auto; /* to center it */
}

section figure img {
    max-width: 100%;
    vertical-align: middle; /* to make sure images behave like blocks */
}

section figure figcaption {
    position: absolute;
    right: 0; bottom: 0; left: 0;
}
    </style>
<section class="bg-single-blog">
    <div class="container">
        <div class="row">
            <div class="single-blog">
                <div class="row">
                    <div class="col-md-12">

                        <div class="blog-items">
                           
                            <!-- .blog-img -->
                            <div class="blog-content-box">
                                <div class="meta-box">
                                    <div class="event-author-option">
                                        
                                        <!-- .author-name -->
                                    </div>
                                    <!-- .author-option -->
                                   
                                </div>
                                <!-- .meta-box -->
                                <div class="blog-content">
                                    <h4><?php echo $bidang->nama_bidang; ?></h4>

                                    <p class="text-justify"><?php echo $bidang->isi; ?></p>
                                </div>
                                <!-- .blog-content -->
                            </div>
                            <!-- .blog-content-box -->
                        </div>
                        <!-- .blog-items -->
                    </div>
                    <!-- .col-md-8 -->
                   
                    <!-- .col-md-4 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .single-blog -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</section>