<?php

/**
 * Template Name: Database Files
 * Description: Custom page template to display Database files.
 */

get_header();
?>

<div class="database-products-container" style="max-width: 1200px; margin: 0 auto; padding: 20px;">
  <h1><?php the_title(); ?></h1>

  <div id="database-products-grid" class="database-grid" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: 20px; margin-bottom: 30px;">
    <!-- Products will be loaded here -->
  </div>

  <div class="load-more-container" style="text-align: center;">
    <button id="load-more-products" class="load-more-btn" style="background: #e74c3c; color: white; padding: 12px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; display: none;">
      <?php echo esc_html__('Load More', 'hello-elementor'); ?>
    </button>
    <div id="loading-spinner" style="display: none; margin-top: 10px;">
      <span><?php echo esc_html__('Loading...', 'hello-elementor'); ?></span>
    </div>
  </div>
</div>

<style>
  .database-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    margin-bottom: 30px;
  }

  .product-card {
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  }

  .product-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
  }

  .product-content {
    padding: 15px;
  }

  .product-title {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #333;
    line-height: 1.4;
  }

  .more-details-btn {
    background: #e74c3c;
    color: white;
    padding: 8px 20px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    transition: background 0.3s ease;
  }

  .more-details-btn:hover {
    background: #c0392b;
    color: white;
    text-decoration: none;
  }

  .load-more-btn:hover {
    background: #c0392b;
  }

  @media (max-width: 1024px) {
    .database-grid {
      grid-template-columns: repeat(3, 1fr);
    }
  }

  @media (max-width: 768px) {
    .database-grid {
      grid-template-columns: repeat(2, 1fr);
      gap: 15px;
    }
  }

  @media (max-width: 480px) {
    .database-grid {
      grid-template-columns: 1fr;
    }
  }
</style>

<script>
  jQuery(document).ready(function($) {
    let currentPage = 1;
    let isLoading = false;

    // Load initial products
    loadProducts(1);

    // Load more button click
    $('#load-more-products').on('click', function() {
      if (!isLoading) {
        currentPage++;
        loadProducts(currentPage);
      }
    });

    function loadProducts(page) {
      isLoading = true;
      $('#loading-spinner').show();
      $('#load-more-products').hide();

      $.ajax({
        url: '<?php echo admin_url('admin-ajax.php'); ?>',
        type: 'POST',
        data: {
          action: 'load_database_products',
          page: page,
          nonce: '<?php echo wp_create_nonce('load_database_products_nonce'); ?>'
        },
        success: function(response) {
          if (response.success) {
            if (page === 1) {
              $('#database-products-grid').html(response.data.html);
            } else {
              $('#database-products-grid').append(response.data.html);
            }

            if (response.data.has_more) {
              $('#load-more-products').show();
            } else {
              $('#load-more-products').hide();
            }
          } else {
            console.error('Error loading products:', response.data);
          }

          $('#loading-spinner').hide();
          isLoading = false;
        },
        error: function(xhr, status, error) {
          console.error('AJAX error:', error);
          $('#loading-spinner').hide();
          isLoading = false;
        }
      });
    }
  });
</script>

<?php
get_footer();
