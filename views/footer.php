 <section id="map" class="map full-page ">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="head-text">CONTACT US</h1>
                    <h2 class="title-text"><strong>GET IN TOUCH</strong></h2>
                    <h4>
                        Ruko Atc jl. Raya Parung <br> Parung, Bogor, Jawa Barat <br> 16330
                    </h4>
                    <br>

                    <div>
                        <ul class="social-bottom">
                            <li>
                                <a href="#">
                                    <span class="fa-stack fa-md">
                                        <i class="fa fa-circle fa-stack-2x soc-out"></i>
                                        <i class="fa fa-facebook fa-stack-1x social"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa-stack fa-md">
                                        <i class="fa fa-circle fa-stack-2x soc-out"></i>
                                        <i class="fa fa-twitter fa-stack-1x social"></i>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="fa-stack fa-md">
                                        <i class="fa fa-circle fa-stack-2x soc-out"></i>
                                        <i class="fa fa-youtube fa-stack-1x social"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>

                        <br>
                        <h4>Have a message?</h4>
                        <br>

                        <form class="form-horizontal" role="form" method="post">
                          <div class="form-group" id="sucsess">
                          <?php if(isset($_GET['sucsess'])){?>
                          <div class="col-md-10">
                              <div class="alert alert-success" role="alert">Thank You Very Much</div>
                          </div>    
                          <?php } ?>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-10">
                              <input type="text" name="username" class="form-control" placeholder="Your Name">
                            </div>
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-10">
                              <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            </div>
                          </div>
                          <div class="form-group">
                          <div class="row">
                            <div class="col-md-10">
                                <textarea class="form-control" name="message" rows="3" placeholder="Message"></textarea>
                            </div>
                            </div>
                          </div>
                           <div class="form-group" id="failed">
                           <?php if(isset($_GET['failed'])){?>
                            <div class="col-md-10">
                                 <div class="alert alert-warning" role="alert">Data Harus Di Isi</div>
                            </div>
                            <?php } ?>
                          </div>
                          
                          <div class="form-group">
                            <div class="col-sm-10">
                              <button type="submit" name="submit" class="btn-form"><strong>SUBMIT</strong> <span class="glyphicon glyphicon-chevron-right soc-in"></span></button>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="img/loc.png">
            </div>
                </div>
                
        </div>
        </section>

    <footer>
        <div class="text-center">
            <p class="text-muted">Copyright &copy; LICHT <?php echo date("Y");?></p>
        </div>
    </footer>