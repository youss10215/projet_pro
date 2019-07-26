<footer id="footer">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12 col-lg-3 col-xl-3">
                <div class="contact_container text-center">
                    <div class="sopin mb-3">
                    Sop'in
                    </div>
                    <address>14, rue de Foix<br> 31500 TOULOUSE</address>
                    <span>Tél : 06 12 60 49 44</span>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row">
					<div class="footer_right offset-xl-2 col-xl-10 pt-4">
						<div class="row pl-lg-5">
							<div class="col-4 p-lg-0">
								<div class="block-links text-center text-lg-left">
									<span>Shop</span>
								    <div class="menu-menu-footer-left-container">
                                        <ul id="menu-menu-footer-left" class="menu">
                                        <?php foreach ($tabCategorie as $categorie) {?>
                                            <li>
                                                <a href="javascript:categorie(<?= $categorie->id_categorie ?>)"><?= $categorie->nom ?></a>
                                            </li>
                                        <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 p-lg-0">
								<div class="block-links text-center text-lg-left">
									<span>Service client</span>
									<div class="menu-menu-footer-middle-container">
                                        <ul id="menu-menu-footer-middle" class="menu">
                                            <li><a href="">Mentions légales</a></li>
                                            <li><a href="">CG prestations de service</a></li>
                                            <li><a href="">Conditions générales de vente</a></li>
                                        </ul>
                                    </div>											
                                </div>
							</div>
                            <div class="col-4 p-lg-0">
								<div class="block-links text-center text-lg-left">
									<span>Sites</span>
										<div class="menu-menu-footer-right-container">
                                            <ul id="menu-menu-footer-right" class="menu">
                                                <li><a href="https://www.pinterest.fr" target="_blank">Pinterest</a></li>
                                                <li><a href="https://www.houzz.fr" target="_blank">Houzz</a></li>  
                                                <li><a href="https://www.france.tv/france-5/la-maison-france-5" target="_blank">Maison france 5</a></li>
                                            </ul>
                                        </div>										
                                    </div>
								</div>
							</div>
					    </div>
					</div>
                </div>
            </div>
    </div>
</footer>