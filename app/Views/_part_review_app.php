<div class="feedback-content" id="feedback-content">
    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-md-4">
            <div class="rating-overview">
                <div class="big-number"><?= number_format($stars, 1) ?></div>
                <div class="star-row">
                    <?= printStars($stars) ?>
                </div>
                <span class="count-label"><?= lang('System.store.business-tab.reviews.review-count', [number_format($review_count)]) ?></span>
            </div>
        </div>
        <div class="col-lg-9 col-md-8">
            <?php
            $review_breakdown = explode(';', $review_breakdown);
            $stars_bd[5]      = $review_breakdown[0];
            $stars_bd[4]      = $review_breakdown[1];
            $stars_bd[3]      = $review_breakdown[2];
            $stars_bd[2]      = $review_breakdown[3];
            $stars_bd[1]      = $review_breakdown[4];
            $max_count        = max($stars_bd);
            ?>
            <div class="distribution-chart">
                <?php for ($i = 5; $i > 0; $i--) : ?>
                    <div class="dist-row">
                        <span class="dist-label"><?= $i ?> <i class="bi bi-star-fill"></i></span>
                        <div class="dist-track">
                            <div class="dist-fill" style="width:<?= $max_count > 0 ? floor($stars_bd[$i]/$max_count*100) : 0 ?>%;"></div>
                        </div>
                        <span class="dist-count"><?= number_format($stars_bd[$i]) ?></span>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div><!-- End Rating Overview -->
    <div class="reviews-list">
        <div class="mb-3">
            <label for="sort-dropdown" class="form-label d-none"><?= lang('System.store.business-tab.reviews.sort-by') ?></label>
            <select id="sort-dropdown" class="form-select w-auto">
                <option value="relevant"><?= lang('System.store.business-tab.reviews.sort-relevant') ?></option>
                <option value="most-recent-first"><?= lang('System.store.business-tab.reviews.sort-recent') ?></option>
                <option value="oldest-first"><?= lang('System.store.business-tab.reviews.sort-oldest') ?></option>
                <option value="highest-rating-first"><?= lang('System.store.business-tab.reviews.sort-highest') ?></option>
                <option value="lowest-rating-first"><?= lang('System.store.business-tab.reviews.sort-lowest') ?></option>
            </select>
        </div>
        <div id="reviews-section"></div>
        <div class="text-center">
            <button id="load-more-btn" class="btn btn-otternaut" style="display: none;"><?= lang('System.store.business-tab.reviews.load-more') ?></button>
        </div>
    </div><!-- End Reviews List -->
</div>
<script>
    const apiEndpoint = '<?= base_url('@' . $business['business_slug'] . '/get-reviews') ?>';
    // App state
    let currentPage = 1;
    let currentSort = 'relevant';

    const $container = document.getElementById('reviews-section');
    const $sortDropdown = document.getElementById('sort-dropdown'); // Assumes this ID for your select element
    const $loadMoreBtn = document.getElementById('load-more-btn');   // Assumes this ID for your button

    // Core fetch and render function
    async function loadReviews(isAppending = false) {
        try {
            // 1. Build the query parameters string
            const params = new URLSearchParams({
                page: currentPage,
                sort: currentSort,
                entity: '<?= $entity ?>',
                entity_id: '<?= $entity_id ?>'
            });

            // Example resulting URL: https://api.example.com/reviews?page=1&sort=most-recent-first
            const response = await fetch(`${apiEndpoint}?${params.toString()}`);

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const reviews = await response.json();

            // 2. If we aren't appending (i.e., sort changed), wipe the old reviews clean
            if (!isAppending) {
                $container.innerHTML = '';
            }

            // Optional: Hide load more button if API returns empty array (no more pages)
            if (reviews.length === 0) {
                if ($loadMoreBtn) $loadMoreBtn.style.display = 'none';
                if (!isAppending) $container.innerHTML = '<p>No reviews found.</p>';
                return;
            } else if ($loadMoreBtn) {
                $loadMoreBtn.style.display = 'inline-block'; // Ensure it's visible if data exists
            }

            // 3. Process and map data to your HTML template
            reviews.forEach(review => {
                let starsHtml = '';
                for (let i = 1; i <= 5; i++) {
                    starsHtml += i <= review.stars ? '<i class="bi bi-star-fill"></i>' : '<i class="bi bi-star"></i>';
                }

                const titleHtml = review.title ? `<h5>${escapeHTML(review.title)}</h5>` : '';
                const bodyHtml = review.body ? `<p>${escapeHTML(review.body)}</p>` : '';

                const reviewElement = document.createElement('article');
                reviewElement.className = 'review-entry';
                reviewElement.innerHTML = `
        <div class="entry-top">
            <div class="entry-meta">
                <strong>${escapeHTML(review.customer_name)}</strong>
                <div class="meta-line">
                    <span class="inline-stars">${starsHtml}</span>
                    <span class="entry-date">${escapeHTML(review.date)}</span>
                </div>
            </div>
        </div>
        ${titleHtml}
        ${bodyHtml}
      `;
                $container.appendChild(reviewElement);
            });
            // 4. Increment page number after a successful load sequence
            currentPage++;
        } catch (error) {
            console.error('Error fetching or rendering reviews:', error);
        }
    }

    // --- Event Listeners ---

    // Dropdown Change: Reset state, pull page 1, and overwrite UI
    $sortDropdown.addEventListener('change', (e) => {
        currentSort = e.target.value;
        currentPage = 1;
        loadReviews(false); // false means "replace content"
    });

    // Load More Click: Fetch next page and append
    $loadMoreBtn.addEventListener('click', () => {
        // Only triggers load if currentPage state has moved past page 1 initialization
        if (currentPage > 1) {
            loadReviews(true); // true means "append content"
        }
    });

    // XSS Sanitizer helper
    function escapeHTML(str) {
        if (!str) return '';
        return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#039;');
    }

    // Initial page load invocation
    document.addEventListener('DOMContentLoaded', () => {
        loadReviews(false);
    });
</script>