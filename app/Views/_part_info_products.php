<section id="product-details" class="product-details section py-3">
    <div class="container">
        <div class="row g-4">
            <!-- Product Gallery -->
            <div class="col-12">
                <p><i class="bi bi-chevron-right"></i> <a href="<?= base_url($locale . '/@' . $business['business_slug']) ?>"><?= $business['business_name'] ?></a> <i class="bi bi-chevron-right"></i> <b>(product name)</b> <i class="bi bi-chevron-right"></i></p>
            </div>
            <div class="col-lg-7">
                <div class="image-showcase">
                    <div class="main-image-container">
                        <!-- <span class="discount-badge">-21%</span> -->
                        <img id="main-product-image" src="assets/img/product/product-details-7.webp" data-zoom="assets/img/product/product-details-7.webp" alt="Product" class="img-fluid">
                        <?php /* <div class="image-zoom-container"></div>
                                <button class="image-nav-btn prev-image" type="button"><i class="bi bi-chevron-left"></i></button>
                                <button class="image-nav-btn next-image" type="button"><i class="bi bi-chevron-right"></i></button> */ ?>
                    </div>
                    <?php /* <div class="thumb-strip d-none">
                                <div class="thumb-cell thumbnail-item" data-image="assets/img/product/product-details-3.webp">
                                    <img src="#" alt="View 1" class="img-fluid">
                                </div>
                                <div class="thumb-cell thumbnail-item" data-image="assets/img/product/product-details-4.webp">
                                    <img src="#" alt="View 2" class="img-fluid">
                                </div>
                                <div class="thumb-cell thumbnail-item" data-image="assets/img/product/product-details-5.webp">
                                    <img src="#" alt="View 3" class="img-fluid">
                                </div>
                                <div class="thumb-cell thumbnail-item" data-image="assets/img/product/product-details-6.webp">
                                    <img src="#" alt="View 4" class="img-fluid">
                                </div>
                                <div class="thumb-cell thumbnail-item active" data-image="assets/img/product/product-details-7.webp">
                                    <img src="#" alt="View 5" class="img-fluid">
                                </div>
                            </div><!-- End Thumb Strip --> */ ?>
                </div>
            </div><!-- End Product Gallery -->
            <!-- Product Details -->
            <div class="col-lg-5">
                <div class="product-detail-card">
                    <div class="detail-header">
                        <span class="type-badge">(type)</span>
                        <span class="stock-indicator d-none"><i class="bi bi-circle-fill"></i> In Stock</span>
                    </div>
                    <h1 class="product-heading">(Product / Service Title)</h1>
                    <div class="review-summary">
                        <div class="stars-inline">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                        </div>
                        <span class="score-text">(stars)</span>
                        <span class="divider-dot">·</span>
                        <a href="#" class="reviews-anchor">(ratings) ratings</a>
                        <span class="divider-dot">·</span>
                        <span class="units-left">(count) remaining / (count) booked</span>
                    </div>
                    <div class="pricing-area">
                        <div class="price-row">
                            <span class="price-now">(from price)</span>
                        </div>
                    </div>
                    <p class="summary-text">(summary)</p>
                    <div class="separator"></div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Accordion Item #1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="summary-text">(description)</p>
                                    <p>SKU: MNHG1</p>
                                    <p>Price: ฿150.00 ฿180.00</p>
                                    <div class="action-row">
                                        <div class="quantity-selector">
                                            <label for="quantity-input" class="d-none">quantity</label>
                                            <button class="quantity-btn decrease" type="button"><i class="bi bi-dash"></i></button>
                                            <input type="number" class="quantity-input" id="quantity-input" value="1" min="1" max="18">
                                            <button class="quantity-btn increase" type="button"><i class="bi bi-plus"></i></button>
                                        </div>
                                        <button class="btn primary-action-btn">
                                            <i class="bi bi-bag-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Accordion Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="summary-text">(description)</p>
                                    <p>SKU: MNHG1</p>
                                    <p>Price: ฿150.00 ฿180.00</p>
                                    <div class="action-row">
                                        <div class="quantity-selector">
                                            <label for="quantity-input" class="d-none">quantity</label>
                                            <button class="quantity-btn decrease" type="button"><i class="bi bi-dash"></i></button>
                                            <input type="number" class="quantity-input" id="quantity-input" value="1" min="1" max="18">
                                            <button class="quantity-btn increase" type="button"><i class="bi bi-plus"></i></button>
                                        </div>
                                        <button class="btn primary-action-btn">
                                            <i class="bi bi-bag-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Accordion Item #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p class="summary-text">(description)</p>
                                    <p>SKU: MNHG1</p>
                                    <p>Price: ฿150.00 ฿180.00</p>
                                    <div class="action-row">
                                        <div class="quantity-selector">
                                            <label for="quantity-input" class="d-none">quantity</label>
                                            <button class="quantity-btn decrease" type="button"><i class="bi bi-dash"></i></button>
                                            <input type="number" class="quantity-input" id="quantity-input" value="1" min="1" max="18">
                                            <button class="quantity-btn increase" type="button"><i class="bi bi-plus"></i></button>
                                        </div>
                                        <button class="btn primary-action-btn">
                                            <i class="bi bi-bag-plus"></i> Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>