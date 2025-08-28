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

<!-- Database Files Search Section -->
<div class="database-search-container" style="max-width: 1200px; margin: 50px auto 0; padding: 20px;">
    <div class="search-header" style="text-align: center; margin-bottom: 30px;">
        <h2 style="font-size: 36px; font-weight: bold; margin-bottom: 10px;">100 CR OLDER DATABASE</h2>
        <p style="color: #888; font-size: 18px;">Top in India Database Service Provider</p>
    </div>
    
    <div class="search-box-container" style="margin-bottom: 30px;">
        <div class="search-input-wrapper" style="display: flex; max-width: 800px; margin: 0 auto;">
            <input type="text" id="database-search-input" placeholder="Type to start searching..." 
                   style="flex: 1; padding: 15px 20px; font-size: 16px; border: 2px solid #ddd; border-right: none; outline: none;">
            <button id="database-search-btn" style="padding: 15px 30px; background: #333; color: white; border: none; font-size: 16px; cursor: pointer;">
                Search
            </button>
        </div>
        <div id="search-autocomplete" style="position: relative; max-width: 800px; margin: 0 auto;">
            <!-- Autocomplete suggestions will appear here -->
        </div>
    </div>
    
    <div id="database-results-container" style="display: none;">
        <table id="database-files-table" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <thead>
                <tr style="background: #ff5555; color: white;">
                    <th style="padding: 15px; text-align: left; font-weight: bold;">Database Name</th>
                    <th style="padding: 15px; text-align: left; font-weight: bold;">Category</th>
                    <th style="padding: 15px; text-align: left; font-weight: bold;">State</th>
                    <th style="padding: 15px; text-align: left; font-weight: bold;">Downloads</th>
                </tr>
            </thead>
            <tbody id="database-results-body">
                <!-- Results will be loaded here -->
            </tbody>
        </table>
    </div>
</div>

<style>
.search-input-wrapper input:focus {
    border-color: #ff5555;
}

#database-search-btn:hover {
    background: #555;
}

#search-autocomplete {
    position: relative;
}

.autocomplete-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    right: 80px;
    background: white;
    border: 1px solid #ddd;
    border-top: none;
    max-height: 200px;
    overflow-y: auto;
    z-index: 1000;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.autocomplete-item {
    padding: 10px 15px;
    cursor: pointer;
    border-bottom: 1px solid #eee;
}

.autocomplete-item:hover {
    background: #f5f5f5;
}

.autocomplete-item:last-child {
    border-bottom: none;
}

#database-files-table tbody tr {
    border-bottom: 1px solid #ddd;
}

#database-files-table tbody tr:nth-child(even) {
    background: #f9f9f9;
}

#database-files-table tbody td {
    padding: 12px 15px;
}

.download-btn {
    background: #ff5555;
    color: white;
    padding: 8px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
}

.download-btn:hover {
    background: #e74c3c;
    color: white;
    text-decoration: none;
}
</style>

<script>
jQuery(document).ready(function($) {
    let searchTimeout;
    
    // Don't load initial database files - table should be hidden initially
    
    // Search input autocomplete
    $('#database-search-input').on('input', function() {
        const query = $(this).val().trim();
        
        clearTimeout(searchTimeout);
        
        if (query.length >= 2) {
            searchTimeout = setTimeout(function() {
                getAutocomplete(query);
            }, 300);
        } else {
            $('#search-autocomplete .autocomplete-dropdown').remove();
        }
    });
    
    // Search button click
    $('#database-search-btn').click(function() {
        const query = $('#database-search-input').val().trim();
        searchDatabaseFiles(query);
        $('#database-results-container').show();
    });
    
    // Enter key search
    $('#database-search-input').keypress(function(e) {
        if (e.which == 13) {
            $('#database-search-btn').click();
        }
    });
    
    function getAutocomplete(query) {
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'get_database_autocomplete',
                query: query,
                nonce: '<?php echo wp_create_nonce('database_autocomplete_nonce'); ?>'
            },
            success: function(response) {
                if (response.success) {
                    showAutocomplete(response.data);
                }
            }
        });
    }
    
    function showAutocomplete(items) {
        $('#search-autocomplete .autocomplete-dropdown').remove();
        
        if (items.length > 0) {
            let dropdown = $('<div class="autocomplete-dropdown"></div>');
            
            items.forEach(function(item) {
                let autocompleteItem = $('<div class="autocomplete-item"></div>')
                    .text(item.title)
                    .click(function() {
                        $('#database-search-input').val(item.title);
                        dropdown.remove();
                        searchDatabaseFiles(item.title);
                    });
                dropdown.append(autocompleteItem);
            });
            
            $('#search-autocomplete').append(dropdown);
        }
    }
    
    function searchDatabaseFiles(query = '') {
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'search_database_files',
                query: query,
                nonce: '<?php echo wp_create_nonce('search_database_files_nonce'); ?>'
            },
            success: function(response) {
                if (response.success) {
                    $('#database-results-body').html(response.data.html);
                }
            }
        });
    }
    
    function loadDatabaseFiles() {
        searchDatabaseFiles('');
    }
    
    // Handle download clicks
    $(document).on('click', '.download-btn', function(e) {
        <?php if (!is_user_logged_in()): ?>
        e.preventDefault();
        alert('You need to login first to download files.');
        return false;
        <?php endif; ?>
    });
    
    // Hide autocomplete when clicking outside
    $(document).click(function(e) {
        if (!$(e.target).closest('#search-autocomplete, #database-search-input').length) {
            $('#search-autocomplete .autocomplete-dropdown').remove();
        }
    });
});
</script><style>
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
