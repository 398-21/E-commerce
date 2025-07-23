jQuery(document).ready(function ($) {
    let page = 2; // Start from the second page
    const loadMoreButton = $('#load-more');
    const countryGrid = $('#country-grid');
    const postsPerPage = load_more_params.posts_per_page; // Posts per page from PHP
    const maxPages = load_more_params.max_pages; // Maximum number of pages from PHP

    loadMoreButton.on('click', function () {
        if (page > maxPages) {
            loadMoreButton.text('No More Products').prop('disabled', true);
            return; // Exit if no more pages
        }

        $.ajax({
            url: load_more_params.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_products',
                query: load_more_params.query,
                page: page,
                posts_per_page: postsPerPage, // Pass posts_per_page for consistency
            },
            beforeSend: function () {
                loadMoreButton.text('Loading...').prop('disabled', true);
            },
            success: function (data) {
                if (data.trim()) {
                    countryGrid.append(data); // Append new products
                    page++;
                    loadMoreButton.text('Load More').prop('disabled', false);

                    // Check if we've reached the last page
                    if (page > maxPages) {
                        loadMoreButton.text('No More Products').prop('disabled', true);
                    }
                } else {
                    // Handle no data or end of products
                    loadMoreButton.text('No More Products').prop('disabled', true);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error loading more products:', error);
                loadMoreButton.text('Load More').prop('disabled', false); // Re-enable button on error
            },
        });
    });
});
